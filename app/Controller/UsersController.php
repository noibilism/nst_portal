<?php

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
    public $uses = array('Role','User','YouthConference','OldUser','Branch','Zone','Committee','Profession','MembershipStatus','Qualification');
    public $components = array('Resources');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }

    public function add_super_admin(){
        $allowed = array(1);
        $this->isAuthorized($allowed);
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $form_data['User']['role_id'] = 1;
            $form_data['User']['hq'] = 1;
            if($this->User->save($form_data)){
                $this->Session->setFlash('User added successfully!');
                $this->redirect('index');
            }else{
                $this->Session->setFlash('User could not be added!');
            }
        }
    }

    public function add_zone_admin(){
        $allowed = array(1);
        $this->isAuthorized($allowed);
        $form_data = $this->request->data;
        $zones = $this->Zone->find('list');
        $this->set('zones',$zones);
        if(!empty($form_data)){
            $form_data['User']['role_id'] = 2;
            if($this->User->save($form_data)){
                $this->Session->setFlash('User added successfully!');
                $this->redirect('index');
            }else{
                $this->Session->setFlash('User could not be added!');
            }
        }
    }

    public function update_user($id, $role){
        $allowed = array(1);
        $this->isAuthorized($allowed);
        $form_data = $this->request->data;
        $user_data = $this->User->findById($id);
        $zones = $this->Zone->find('list');
        $branches = $this->Branch->find('list');
        $this->set('zones',$zones);
        $this->set('branches',$branches);
        $this->set('role_id',$role);
        if(!empty($form_data)){
            $this->User->id = $id;
            if($this->User->save($form_data)){
                $this->Session->setFlash('User added successfully!');
                $this->redirect('index');
            }else{
                $this->Session->setFlash('User could not be added!');
            }
        }else{
            $this->request->data = $user_data;
        }
    }

    public function add_branch_admin(){
        $allowed = array(1,2);
        $this->isAuthorized($allowed);
        $form_data = $this->request->data;
        $branches = $this->Branch->find('list');
        $this->set('branches',$branches);
        if(!empty($form_data)){
            $form_data['User']['role_id'] = 3;
            if($this->User->save($form_data)){
                $this->Session->setFlash('User added successfully!');
                $this->redirect('index');
            }else{
                $this->Session->setFlash('User could not be added!');
            }
        }
    }

    public function change_password(){
        $data = $this->request->data;
        if(!empty($data)){
            $user = $this->Auth->user('id');
            $user_details = $this->User->findById($user);
            $current_pwd = $user_details['User']['password'];
            $current_password = $data['User']['old_password'];
            $new_password = $data['User']['password'];
            $confirm_password = $data['User']['password_update'];
            $current_password_hashed = $this->Auth->password($current_password);
            if($current_pwd !== $current_password_hashed){
                $this->Session->setFlash(__('Sorry, Current password is not correct!'));
            }elseif($new_password !== $confirm_password){
                $this->Session->setFlash(__('Passwords does not match!'));
            }else{
                $this->User->id = $user;
                if($this->User->saveField('password', $new_password)){
                    $this->Session->setFlash(__('Password changed successfully!'));
                    $this->redirect('dashboard');
                }else{
                    $this->Session->setFlash(__('Error! Password could not be changed!'));
                }
            }
        }
    }

	public function login() {
		
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'dashboard'));
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
                $this->request->data['User']['id'] = $this->Auth->user('id');
                $this->request->data['User']['last_login'] = date('Y-m-d H:i:s');
                $this->User->save($this->request->data);
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect('dashboard');
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
        $allowed = array(1);
        $this->isAuthorized($allowed);
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->User->find('all',array('conditions'=>array("OR" => array(
            'User.role_id !='=>4,
        ),)));
		$this->set(compact('users'));
    }

    public function committees() {
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $committees = $this->Committee->find('all');
        $this->set('committees',$committees);
    }

    public function add_committee() {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if ($this->request->is('post')) {
            $this->Committee->create();
            if ($this->Committee->save($this->request->data)) {
                $this->Session->setFlash(__('The committee has been created'));
                $this->redirect(array('action' => 'committees'));
            } else {
                $this->Session->setFlash(__('The committee could not be created. Please, try again.'));
            }
        }
    }

    public function update_committee($id) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if (!empty($this->request->data)) {
            $this->Committee->id = $id;
            if ($this->Committee->save($this->request->data)) {
                $this->Session->setFlash(__('The committee has been created'));
                $this->redirect(array('action' => 'committees'));
            } else {
                $this->Session->setFlash(__('The committee could not be created. Please, try again.'));
            }
        }else{
            $this->request->data = $this->Committee->findById($id);
        }
    }

    public function professional_groups() {
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
       $professions = $this->Profession->find('all');
        $this->set('professions',$professions);
    }

    public function add_professional_group() {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if ($this->request->is('post')) {
            $this->Profession->create();
            if ($this->Profession->save($this->request->data)) {
                $this->Session->setFlash(__('The Professional group has been created'));
                $this->redirect(array('action' => 'professional_groups'));
            } else {
                $this->Session->setFlash(__('The Professional group could not be created. Please, try again.'));
            }
        }
    }

    public function update_professional_group($id) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if (!empty($this->request->data)) {
            $this->Profession->id = $id;
            if ($this->Profession->save($this->request->data)) {
                $this->Session->setFlash(__('The Professional group has been created'));
                $this->redirect(array('action' => 'professional_groups'));
            } else {
                $this->Session->setFlash(__('The Professional group could not be created. Please, try again.'));
            }
        }else{
            $this->request->data = $this->Profession->findById($id);
        }
    }

    public function membership_statuses() {
        $MembershipStatuses = $this->MembershipStatus->find('all');
        $this->set('MembershipStatuses',$MembershipStatuses);
    }

    public function add_Membership_status() {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if ($this->request->is('post')) {
            $this->MembershipStatus->create();
            if ($this->MembershipStatus->save($this->request->data)) {
                $this->Session->setFlash(__('The Membership status has been created'));
                $this->redirect(array('action' => 'Membership_statuses'));
            } else {
                $this->Session->setFlash(__('The Membership status could not be created. Please, try again.'));
            }
        }
    }

    public function update_membership_status($id) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if (!empty($this->request->data)) {
            $this->MembershipStatus->id = $id;
            if ($this->MembershipStatus->save($this->request->data)) {
                $this->Session->setFlash(__('The Membership status has been updated'));
                $this->redirect(array('action' => 'membership_statuses'));
            } else {
                $this->Session->setFlash(__('The Membership status could not be updated. Please, try again.'));
            }
        }else{
            $this->request->data = $this->MembershipStatus->findById($id);
        }
    }

    public function qualifications() {
        $qualifications = $this->Qualification->find('all');
        $this->set('qualifications',$qualifications);
    }

    public function genders(){

    }

    public function add_qualification() {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if ($this->request->is('post')) {
            $this->Qualification->create();
            if ($this->Qualification->save($this->request->data)) {
                $this->Session->setFlash(__('The Professional Qualification has been created'));
                $this->redirect(array('action' => 'qualifications'));
            } else {
                $this->Session->setFlash(__('The Professional Qualification could not be created. Please, try again.'));
            }
        }
    }

    public function update_qualification($id) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        if (!empty($this->request->data)) {
            $this->Qualification->id = $id;
            if ($this->Qualification->save($this->request->data)) {
                $this->Session->setFlash(__('The Professional Qualification has been created'));
                $this->redirect(array('action' => 'qualifications'));
            } else {
                $this->Session->setFlash(__('The Professional Qualification could not be created. Please, try again.'));
            }
        }else{
            $this->request->data = $this->Qualification->findById($id);
        }
    }


    public function dashboard(){
        $zones = $this->Zone->find('all');
        $this->set('zones', $zones);

    }

    public function add() {
        $allowed = array(1);
        $this->isAuthorized($allowed);
        $roles = $this->Roles->find('list');
        $this->set('roles', $roles);
        if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }
    }

    public function edit($id = null) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

    public function delete($id = null) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
        $allowed = array(1);
        $this->isAuthorized($allowed);
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

    public function migrate_users(){
        $users = $this->OldUser->find('all', array('conditions'=>array('OldUser.Is_BranchAdmin'=>1)));
        foreach($users as $user){
            $this->request->data['User']['username'] = $user['OldUser']['email'];
            $this->request->data['User']['email'] = $user['OldUser']['email'];
            $this->request->data['User']['branch_id'] = $user['OldUser']['branch_id'];
            $this->request->data['User']['password'] = 'password';
            $this->request->data['User']['role_id'] = 3;
            $this->User->saveAll($this->request->data);
        }
        $this->Session->setFlash(__('Users migrated!'));
        $this->redirect('index');
    }

    public function youth_conference(){
        $attendees = $this->YouthConference->find('all');
        $this->set('attendees', $attendees);
    }



}

?>