<?php

class ApisController extends AppController {

    public $uses = array('Role','User','YouthConference','OldUser','Licence','Branch','Zone','Committee','Profession','PersonalProfile','MembershipStatus','Qualification');
    public $components = array('Resources','RequestHandler');
    var $api_key = '5495EB2D32657A699A876F34BF5D5';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','change_password','validate_licence');
    }

    public function checkAuthKey($auth_key){
        $chk = $this->User->find('first', array('conditions'=>array('User.uri'=>$auth_key)));
        return $chk;
    }

    public function checkApiKey($header_key){
            if($this->api_key !== $header_key){
                return false;
            }else{
                return true;
            }
    }

    public function change_password(){
        $this->layout = 'api';
        $data = $this->request->data;
        $auth_key = $this->request->data['AuthKey'];
        if($this->request->is('post') || $this->request->is('put')){
            $this->checkAuthKey($auth_key);
            $user = $this->request->data['User']['id'];
            $user_details = $this->User->findById($user);
            $current_pwd = $user_details['User']['password'];
            $current_password = $data['User']['old_password'];
            $new_password = $data['User']['password'];
            $confirm_password = $data['User']['password_update'];
            $current_password_hashed = $this->Auth->password($current_password);
            if($current_pwd !== $current_password_hashed){
                $msg = 'Incorrect Password';
                $response = $this->return_json_response(409, $msg);
            }elseif($new_password !== $confirm_password){
                $msg = 'Passwords does not match';
                $response = $this->return_json_response(409, $msg);
            }else{
                $this->User->id = $user;
                if($this->User->saveField('password', $new_password)){
                    $response = $this->return_json_response(201);
                }else{
                    $msg = 'Passwords could not be changed';
                    $response = $this->return_json_response(501, $msg);
                }
            }
            return $response;
        }
    }

	public function login() {
        $this->layout = 'api';
        // if we get the post information, try to authenticate
		if ($this->request->is('post')) {
            $headers = getallheaders();
            $check_api_key = $this->checkApiKey($headers['Api-Key']);
            if($check_api_key !== true){
            $u_name = $this->request->data['username'];
            $password = $this->Auth->password($this->request->data['password']);
            $check = $this->User->find('first', array('conditions'=>array('User.username'=>$u_name, 'User.password'=>$password)));
            if ($check){
                if(!empty($check['User']['uri'])){
                    $response = array(
                        'message' => 'User is logged in on another device!'
                    );
                    $status = 409;
                }else{
                    $random_key = $this->portalNo(20);
                    $auth_key = sha1($password.$u_name.$random_key);
                    $this->request->data['User']['id'] = $check['User']['id'];
                    $this->request->data['User']['uri'] = $auth_key;
                    $this->request->data['User']['last_login'] = date('Y-m-d H:i:s');
                    $this->User->save($this->request->data);
                    $branch = $this->Branch->getBranchName();
                    $username = $check['User']['username'];
                    $u_id = $check['User']['id'];
                    $bch = $check['User']['branch_id'];
                    $reg_no = $this->PersonalProfile->getMemberDetails($username);
                    $response = array(
                        'auth_key' => $auth_key,
                        'portal_access_code' => $username,
                        'user_id' => $u_id,
                        'branch' => $branch[$bch],
                        'membership_no' => $reg_no['PersonalProfile']['reg_no'],
                        'name' => $reg_no['PersonalProfile']['first_name'].', '.$reg_no['PersonalProfile']['last_name'].' '.$reg_no['PersonalProfile']['other_name'],
                        'phone' => $reg_no['PersonalProfile']['phone'],
                        'mar_status' => $reg_no['PersonalProfile']['mar_status'],
                        'picture' => $reg_no['PersonalProfile']['picture'],
                        'profession' => $reg_no['PersonalProfile']['profession']
                    );
                    $status = 200;
                }
            } else {
                $response = array(
                    'message' => 'Invalid Authentication Parameters!'
                );
                $status = 401;
			}
        }else{
                $response = array(
                    'message' => 'Invalid API Key!'
                );
                $status = 401;
            }
        }else{
            $response = array(
                'message' => 'Wrong Request Method!'
            );
            $status = 401;
        }
        $this->serialize_response($status, $response);
    }

	public function logout($auth_key) {
        $this->layout = 'api';
        if ($this->request->is('delete')) {
            $headers = getallheaders();
            $check_api_key = $this->checkApiKey($headers['Api-Key']);
            if($check_api_key == true){
                $check = $this->checkAuthKey($auth_key);
                if(!$check){
                    $response = array(
                        'error' => 'Invalid Authentication Key!'
                    );
                    $status = 401;
                }else{
                    $this->request->data['User']['id'] = $check['User']['id'];
                    $this->request->data['User']['uri'] = null;
                    $this->User->save($this->request->data);
                    $response = array(
                        'message' => 'Logged Out Successfully!'
                    );
                    $status = 200;
                }
                }else{
                    $response = array(
                        'message' => 'Invalid API Key!'
                    );
                    $status = 401;
                }
        }else{
            $response = array(
                'message' => 'Wrong Request Method!'
            );
            $status = 401;
        }
        $this->serialize_response($status, $response);
    }

    public function validate_licence(){
        $this->layout = 'api';
        if ($this->request->is('post')) {
            $licence = $this->request->data['licence'];
            $name = $this->request->data['name'];
            $check = $this->Licence->find('first', array('conditions'=>array('Licence.code'=>$licence)));
            if(!$check){
                $response = array(
                    'error' => 'Invalid Licence Key!'
                );
                $status = 401;
            }elseif($check['Licence']['used'] == 1){
                $response = array(
                    'error' => 'Licence is already used on another device!'
                );
                $status = 401;
            }else{
                $this->request->data['Licence']['id'] = $check['Licence']['id'];
                $this->request->data['Licence']['date_used'] = date('Y-m-d H:i:s');
                $this->request->data['Licence']['used'] = 1;
                $this->request->data['Licence']['used_by'] = $name;
                $this->Licence->save($this->request->data);
                $response = array(
                    'licence' => $licence,
                    'batch_code' => $check['Licence']['batch'],
                    'date_created' => $check['Licence']['created'],
                    'date_used' => $check['Licence']['date_used']
                );
                $status = 200;
            }
        }else{
            $response = array(
                'message' => 'Wrong Request Method!'
            );
            $status = 401;
        }
        $this->serialize_response($status, $response);
    }

    public function serialize_response($type, $response = null){
            $json = $this->set(array(
                'response' => $response,
                'status' => $type,
                '_serialize' => array('response', 'status')
            ));

        return $json;
    }



}

?>