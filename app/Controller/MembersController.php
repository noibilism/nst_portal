<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller', 'CakeEmail', 'Network/Email');

class MembersController extends AppController {

    public $uses = array('Country', 'Zone', 'Licence','OldUser','YouthConference','State','Committee','Branch','BranchState','Qualification','MembershipStatus','Profession','PersonalProfile','Address','User');
    public $components = array('Resources','Notification','ExcelReader');
    var $paginate = array(
            'limit' => 2000
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('youth_conference_registration','donate');
    }

    public function create_member(){
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $role = $this->Auth->user('role_id');
        $branch_id = $this->Auth->user('branch_id');
        $form_data = $this->request->data;
        if (!empty($form_data)) {
            $personal_data = $this->request->data['PersonalProfile'];
            $chkduplicate = $this->PersonalProfile->find('first', array('conditions'=>array('PersonalProfile.first_name'=>$personal_data['first_name'],'PersonalProfile.last_name'=>$personal_data['last_name'],'PersonalProfile.dob'=>$personal_data['dob'],'PersonalProfile.sex'=>$personal_data['sex'])));
            if(!empty($chkduplicate)){
                $this->Session->SetFlash('This member already exist');
            }else{
                $p_i_n = $this->portalNo(9);
                $last_reg_n = $this->PersonalProfile->find('first',array('conditions'=>array('PersonalProfile.branch_id'=>$personal_data['branch_id']),'order'=>array('PersonalProfile.id DESC'),'fields'=>array('PersonalProfile.reg_no')));
                if(empty($last_reg_n)){
                    $last_reg_no = 0;
                    $new_reg_no = $last_reg_no + 1;
                }else{
                    $last_reg_no = $last_reg_n['PersonalProfile']['reg_no'];
                    $new_reg_no = $last_reg_no + 1;
                }
                $reg_no = str_pad($new_reg_no, 4, '0', STR_PAD_LEFT);
                $picture = $personal_data['picture'];
                $permitted = array('image/jpeg','image/png');
                $upload_picture = $this->Resources->uploadFiles('img/pictures', $picture, $itemId = null, $permitted);
                $zone_id = $this->Branch->findById($personal_data['branch_id']);
                if($upload_picture){
                    $pix = explode('/', $upload_picture['urls'][0]);
                    $this->request->data['PersonalProfile']['reg_no'] = $new_reg_no;
                    $this->request->data['PersonalProfile']['access_code'] = $p_i_n;
                    $this->request->data['PersonalProfile']['picture'] = $pix[2];
                    $this->request->data['PersonalProfile']['created_by'] = $this->Auth->user('id');
                    $this->request->data['PersonalProfile']['zone_id'] = $zone_id['Branch']['zone_id'];
                    $this->request->data['User']['branch_id'] = $personal_data['branch_id'];
                    $this->request->data['User']['username'] = $p_i_n;
                    $this->request->data['User']['password'] = 'password';
                    $this->request->data['User']['role_id'] = 4;
                    $this->request->data['User']['branch_id'] = $personal_data['branch_id'];
                    $this->request->data['User']['zone_id'] = $zone_id['Branch']['zone_id'];
                    $branch_code = $this->Branch->getBranchCode($personal_data['branch_id']);
                    $zone_code = $this->Zone->getZoneCode($zone_id['Branch']['zone_id']);
                    $bch_state = $this->Branch->getBranchState($personal_data['branch_id']);
                    $state_code = $this->BranchState->findById($bch_state);
                    if(!empty($state_code)){
                        $code_state = $state_code['BranchState']['code'];
                    }else{
                        $code_state = '00';
                    }
                    $this->request->data['PersonalProfile']['state_id'] = $bch_state;
                    $full_reg_no = $zone_code.'/'.$code_state.'/'.$branch_code.'/'.$reg_no;
                    $save_profile = $this->PersonalProfile->save($this->request->data);
                    $save_user = $this->User->save($this->request->data);
                    $email = $personal_data['PersonalProfile']['email'];
                    $name = $personal_data['PersonalProfile']['first_name'];
                    $b_id = $personal_data['PersonalProfile']['branch_id'];
                    $phone = $personal_data['PersonalProfile']['phone'];
                    $branch = $this->Branch->getBranchName();
                    $zone = $this->Zone->getZoneName();
                    $details = array(
                        'name'=>$name,
                        'zone'=>$zone[$zone_id['Branch']['zone_id']],
                        'branch'=>$branch[$b_id],
                        'phone'=>$phone,
                        'reg'=>$full_reg_no,
                        'pin'=>$p_i_n
                    );
                    $msg = 'Salam '.$name.', You have been registered successfully in the NASFAT membership database ';
                    $msg .= 'Your new membership no is '.$full_reg_no;
                    if($save_profile && $save_user){
                        $this->Session->setFlash('Member created successfully! Membership No is: '.$full_reg_no);
                        $this->Notification->SendRegistrationDetailsToMember($details, $email);
                        $this->Notification->sendSMS($phone, $msg);
                        $this->redirect('list_members');
                    }else{
                        $this->Session->setFlash('Member could not be created!');
                        unlink(WWW_ROOT.'img'.'/'.'pictures'.'/'.$pix[2]);
                    }
                }

            }
        }
    }

    public function update_profile($id){
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $form_data = $this->request->data;
        $personal_data = $this->PersonalProfile->findById($id);
        if (!empty($form_data)) {
                    $this->PersonalProfile->id = $id;
                    $save_profile = $this->PersonalProfile->save($this->request->data);
                    if($save_profile){
                        $this->Session->setFlash('Member profile details updated successfully!');
                        $this->redirect('list_members');
                    }else{
                        $this->Session->setFlash('Member profile details could not be updated!');
                    }
        }else{
            $this->request->data = $personal_data;
            $picture = $personal_data['PersonalProfile']['picture'];
            $this->set('picture', $picture);
            $this->set('personal_data', $personal_data);

        }
    }



    public function update_picture($id){
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $form_data = $this->request->data;
        $personal_data = $this->PersonalProfile->findById($id);
        if (!empty($form_data)) {
            $picture = $form_data['PersonalProfile']['picture'];
            $type = $picture['type'];
            $size = $picture['size'];
            $permitted = array('image/jpeg','image/png');

            if(!in_array($type, $permitted)){
                $this->Session->setFlash('You can only upload JPEG or PNG Files!');
                $this->redirect($this->referer());
            }elseif($size > '100000'){
                $this->Session->setFlash('You can only upload Files less than 100KB!');
                $this->redirect($this->referer());
            }
            $upload_picture = $this->Resources->uploadFiles('img/pictures', $picture, $itemId = null, $permitted);
            if($upload_picture){
                $pix = explode('/', $upload_picture['urls'][0]);
                $old_pix = $personal_data['PersonalProfile']['picture'];
                unlink(WWW_ROOT.'img'.'/'.'pictures'.'/'.$old_pix);
                $this->PersonalProfile->id = $id;
                $this->PersonalProfile->saveField('picture',$pix[2]);
                $this->Session->setFlash('Member picture updated successfully!');
                $this->redirect('update_picture/'.$id);
            }else{
                $this->Session->setFlash('Member picture details could not be updated!');
            }
        }else{
            $this->request->data = $personal_data;
            $picture = $personal_data['PersonalProfile']['picture'];
            $this->set('picture', $picture);
        }
    }

    public function list_members(){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $role_id = $this->Auth->user('role_id');
        $branch_id = $this->Auth->user('branch_id');
        $zone_id = $this->Auth->user('zone_id');
        if($role_id == 1){
            $mems = $this->PersonalProfile->all_members();
            $no_mems = count($mems);
            if($no_mems<2000){
                $members = $mems;
            }else{
                $members = $this->paginate('PersonalProfile');
            }
        }elseif($role_id == 2){
            $mems = $this->PersonalProfile->zone_members($zone_id);
            $no_mems = count($mems);
            if($no_mems < 2000){
                $members = $mems;
            }else{
                $members = $this->paginate('PersonalProfile');
            }
        }elseif($role_id == 3){
            $members = $this->PersonalProfile->branch_members($branch_id);
        }
        $this->set('mem', $no_mems);
        $this->set('members', $members);
    }

    public function list_birthday_members(){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $role_id = $this->Auth->user('role_id');
        $branch_id = $this->Auth->user('branch_id');
        $zone_id = $this->Auth->user('zone_id');
        if($role_id == 1){
            $mems = $this->PersonalProfile->all_b_members();
            $no_mems = count($mems);
            if($no_mems<2000){
                $members = $mems;
            }else{
                $members = $this->paginate('PersonalProfile');
            }
        }elseif($role_id == 2){
            $mems = $this->PersonalProfile->zone_b_members($zone_id);
            $no_mems = count($mems);
            if($no_mems < 2000){
                $members = $mems;
            }else{
                $members = $this->paginate('PersonalProfile');
            }
        }elseif($role_id == 3){
            $members = $this->PersonalProfile->branch_b_members($branch_id);
        }
        $this->set('mem', $no_mems);
        $this->set('members', $members);
    }

    public function list_branch_members($bch_id){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $members = $this->PersonalProfile->branch_members($bch_id);
        $no_mems = count($members);
        if($no_mems<2000){
            $members = $no_mems;
        }else{
            $members = $this->paginate('PersonalProfile');
        }
        $this->set('mem', $no_mems);
        $this->set('members', $members);
    }

    public function export_members(){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $role_id = $this->Auth->user('role_id');
        $branch_id = $this->Auth->user('branch_id');
        $zone_id = $this->Auth->user('zone_id');
        if($role_id == 1){
            $members = $this->PersonalProfile->all_members();
        }elseif($role_id == 2){
            $members = $this->PersonalProfile->zone_members($zone_id);
        }elseif($role_id == 3){
            $members = $this->PersonalProfile->branch_members($branch_id);
        }
        $bch = $this->Branch->getBranchName();
        $zone = $this->Zone->getZoneName();
        $qu = $this->getQualName();
        $pr = $this->Profession->getProfessionName();
        $st = $this->MembershipStatus->getStatusName();
        $this->ExcelReader->export_excel($members, $bch, $zone, $qu, $pr, $st);
        $this->redirect($this->referer());
    }

    public function view_profile($id){
        $profile = $this->PersonalProfile->findById($id);
        $this->set('profile', $profile);
    }

    public function birthdays(){
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $today = date('m-d');
        array('MONTH(User.birthdate)' => date('m') );

    }

    public function conference_closed(){

    }

    public function checkClosingDate(){
        $today = date('Y-m-d');
        if($today > '2016-3-18'){
            $this->redirect('conference_closed');
        }
    }

    public function youth_conference_registration(){
        //$this->checkClosingDate();
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $email = $form_data['YouthConference']['email'];
            $name = $form_data['YouthConference']['name'];
            $z_id = $form_data['YouthConference']['zone'];
            $b_id = $form_data['YouthConference']['branch'];
            $phone = $form_data['YouthConference']['phone'];
            $payment = $form_data['YouthConference']['payment_details'];
            $branch = $this->Branch->getBranchName();
            $zone = $this->Zone->getZoneName();
            $save_reg = $this->YouthConference->save($this->request->data);
            /*$details = array(
                'name'=>$name,
                'zone'=>$zone[$z_id],
                'branch'=>$branch[$b_id],
                'phone'=>$phone,
                'payment'=>$payment
            );*/
            if($save_reg){
                $this->Session->setFlash('Jazakumllahu Khaeran!Your registration details captured successfully! Please wait while we verify your payment information. Once your payment is verified, you will get your Tag No as an SMS on your provided phone number and email address!');
                //$this->Notification->SendRequestDetailsToMember($details, $email);
                //$this->Notification->SendRequestDetailsToAdmin($details, 'youthconference@nasfat.org');
            }else{
                $this->Session->setFlash('Ooopssss!!!...Your registration details could not be captured, please try again!');
            }
        }
    }

    public function donate(){
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $email = $form_data['Donation']['email'];
            $name = $form_data['Donation']['name'];
            $amt = $form_data['Donation']['amount'];
            $phone = $form_data['Donation']['phone'];
            $payment = $form_data['Donation']['payment_details'];
            $save_reg = $this->Donation->save($this->request->data);
            $details = array(
                'name'=>$name,
                'phone'=>$phone,
                'amt'=>$amt,
                'payment'=>$payment
            );
            if($save_reg){
                $this->Session->setFlash('Jazakummullahu Khaeran, your details recieved');
                $this->Notification->SendRequestDetailsToMember($details, $email);
                $this->Notification->SendRequestDetailsToAdmin($details, 'info@nasfat.org');
            }else{
                $this->Session->setFlash('Ooopssss!!!...Your donation details could not be captured, please try again!');
            }
        }
    }

    public function registerBulkMembers($zone){


    }

    public function approve_registration($id, $tg){

        $delegate = $this->YouthConference->find('first',array('conditions'=>array('YouthConference.id'=>$id, 'YouthConference.verified'=>0)));
        $new_tag_no = $tg;
        $group = array(
            'Ibraheem Hakeem',
            'Badmus Kamorudeen',
            'Tiamiyu Mutiu',
            'Modinat Ibraheem',
            'Saidat Oloyede',
            'Halimah',
            'AbdulRahman Abd Wahab',
            'Sheriff Yusuf',
            'Abu Abdulsalam',
            'Mikail Banji Sarumoh'
        );
        $k = array_rand($group);
        $v = $group[$k];
        $this->request->data['YouthConference']['id'] = $id;
        $this->request->data['YouthConference']['tag']  = $new_tag_no;
        $this->request->data['YouthConference']['verified'] = 1;
        $this->request->data['YouthConference']['group'] = $v;
        if($this->YouthConference->save($this->request->data)){
            $details = array(
                'name'=>$delegate['YouthConference']['name'],
                'tag'=>str_pad($new_tag_no, 4, '0', STR_PAD_LEFT),
                'group'=>$v
            );
            /*$msg = 'Salam '.$delegate['YouthConference']['name'].', Your registration for d 2016 Youth Conference has been verified successfully.';
            $msg .= 'Your TAG no is '.str_pad($new_tag_no, 4, '0', STR_PAD_LEFT).' and U belong to d '.$v.' Group.Pls call 08034957503 for any questions.';
            $phone = $delegate['YouthConference']['phone'];
            $email = $delegate['YouthConference']['email'];
            $this->Notification->SendVerificationDetailsToMember($details, $email);
            $this->Notification->sendSMS($phone, $msg);*/
            $this->Session->setFlash('Delegate verified successfully!');
            $this->redirect($this->referer());
        }else{
            $this->Session->setFlash('Delegate could not be verified successfully!');
            $this->redirect($this->referer());
        }
    }

    public function notifyDelegates(){

            $last_tag_n = $this->YouthConference->find('first',array('conditions'=>array('YouthConference.verified'=>1, 'YouthConference.sms'=>1),'order'=>array('YouthConference.tag DESC'),'fields'=>array('YouthConference.tag')));
            $delegates = $this->YouthConference->find('all',array('conditions'=>array('YouthConference.verified'=>1, 'YouthConference.sms'=>0)));
            $_i = $last_tag_n['YouthConference']['tag'];
            $i = $_i + 1;
            foreach($delegates as $delegate){
                $new_tag_no = $i++;
                $this->request->data['YouthConference']['id'] = $delegate['YouthConference']['id'];
                $this->request->data['YouthConference']['tag']  = $new_tag_no;
                $this->request->data['YouthConference']['sms'] = 1;
                $this->YouthConference->saveAll($this->request->data);
                    $v = $delegate['YouthConference']['group'];
                    $msg = 'Salam '.$delegate['YouthConference']['name'].', Your registration for d 2016 Youth Conference has been verified successfully.';
                    $msg .= 'Your TAG no is '.str_pad($new_tag_no, 4, '0', STR_PAD_LEFT).' and U belong to d '.$v.' Group.Pls call 08034957503 for any questions.';
                    $phone = $delegate['YouthConference']['phone'];
                    $email = $delegate['YouthConference']['email'];
                    $details = array(
                        'name'=>$delegate['YouthConference']['name'],
                        'tag'=>str_pad($new_tag_no, 4, '0', STR_PAD_LEFT),
                        'group'=>$v
                    );
                    $this->Notification->SendVerificationDetailsToMember($details, $email);
                    $this->Notification->sendSMS($phone, $msg);
            }
            $this->Session->setFlash('Total of '.$i.' Delegates processed');
            $this->redirect($this->referer());

    }

    public function updateDelegates($i){
        $delegates = $this->YouthConference->find('all',array('conditions'=>array('YouthConference.tag'=>'NULL', 'YouthConference.verified'=>1)));
        foreach($delegates as $delegate){
            $new_tag_no = $i++;
            $this->request->data['YouthConference']['id'] = $delegate['YouthConference']['id'];
            $this->request->data['YouthConference']['tag']  = $new_tag_no;
            $this->request->data['YouthConference']['sms'] = 1;
            $this->YouthConference->saveAll($this->request->data);
        }
        $this->Session->setFlash('Total of '.count($delegates).' Delegates processed');
        $this->redirect($this->referer());
    }

    public function normaliseDelegates($i){

        $delegates = $this->YouthConference->find('all',array('conditions'=>array('YouthConference.verified'=>1, 'YouthConference.sms'=>0)));
        foreach($delegates as $delegate){
            /*$group = array(
                'Ibraheem Hakeem',
                'Badmus Kamorudeen',
                'Tiamiyu Mutiu',
                'Modinat Ibraheem',
                'Saidat Oloyede',
                'Halimah',
                'AbdulRahman Abd Wahab',
                'Sheriff Yusuf',
                'Abu Abdulsalam',
                'Mikail Banji Sarumoh'
            );
            $k = array_rand($group);
            $v = $group[$k];*/
            $new_tag_no = $i++;
            //  $tag = $delegate['YouthConference']['tag'];
                $this->request->data['YouthConference']['id'] = $delegate['YouthConference']['id'];
                $this->request->data['YouthConference']['tag']  = $new_tag_no;
                $this->request->data['YouthConference']['sms'] = 1;
                $this->request->data['YouthConference']['verified'] = 1;
                //$this->request->data['YouthConference']['group'] = $v;
                $this->YouthConference->saveAll($this->request->data);
                /*$v = $delegate['YouthConference']['group'];
                $msg = 'Salam '.$delegate['YouthConference']['name'].', Your registration for d 2016 Youth Conference has been verified successfully.';
                $msg .= 'Your TAG no is '.str_pad($new_tag_no, 4, '0', STR_PAD_LEFT).' and U belong to d '.$v.' Group.Pls call 08034957503 for any questions. Pls disregard earlier msgs!';
                $phone = $delegate['YouthConference']['phone'];
                $email = $delegate['YouthConference']['email'];
                $details = array(
                    'name'=>$delegate['YouthConference']['name'],
                    'tag'=>str_pad($new_tag_no, 4, '0', STR_PAD_LEFT),
                    'group'=>$v
                );*/
               //$this->Notification->SendVerificationDetailsToMember($details, $email);
                //$this->Notification->sendSMS($phone, $msg);
        }
        $this->Session->setFlash('Total of '.count($delegates).' Delegates processed');
        $this->redirect($this->referer());

    }


    public function normaliseBranchDelegates($id,$i){

        $delegates = $this->YouthConference->find('all',array('conditions'=>array('YouthConference.payment_details LIKE'=>'%'.$id.'%', 'YouthConference.verified'=>0)));
        foreach($delegates as $delegate){
            $group = array(
                'Ibraheem Hakeem',
                'Badmus Kamorudeen',
                'Tiamiyu Mutiu',
                'Modinat Ibraheem',
                'Saidat Oloyede',
                'Halimah',
                'AbdulRahman Abd Wahab',
                'Sheriff Yusuf',
                'Abu Abdulsalam',
                'Mikail Banji Sarumoh'
            );
            $k = array_rand($group);
            $v = $group[$k];
            $new_tag_no = $i++;
            // $tag = $delegate['YouthConference']['tag'];
            $this->request->data['YouthConference']['id'] = $delegate['YouthConference']['id'];
            $this->request->data['YouthConference']['tag']  = $new_tag_no;
            $this->request->data['YouthConference']['sms'] = 1;
            $this->request->data['YouthConference']['verified'] = 1;
            $this->request->data['YouthConference']['group'] = $v;
            $this->YouthConference->saveAll($this->request->data);
            /*$v = $delegate['YouthConference']['group'];
            $msg = 'Salam '.$delegate['YouthConference']['name'].', Your registration for d 2016 Youth Conference has been verified successfully.';
            $msg .= 'Your TAG no is '.str_pad($new_tag_no, 4, '0', STR_PAD_LEFT).' and U belong to d '.$v.' Group.Pls call 08034957503 for any questions. Pls disregard earlier msgs!';
            $phone = $delegate['YouthConference']['phone'];
            $email = $delegate['YouthConference']['email'];
            $details = array(
                'name'=>$delegate['YouthConference']['name'],
                'tag'=>str_pad($new_tag_no, 4, '0', STR_PAD_LEFT),
                'group'=>$v
            );*/
            //$this->Notification->SendVerificationDetailsToMember($details, $email);
            //$this->Notification->sendSMS($phone, $msg);
        }
        $this->Session->setFlash('Total of '.count($delegates).' Delegates processed');
        $this->redirect($this->referer());

    }

    public function sendToDelegates(){
        $delegates = $this->YouthConference->find('all',array('conditions'=>array('YouthConference.verified'=>1,'YouthConference.sms'=>1 )));
        $i = 0;
        foreach($delegates as $delegate){
            $new_tag_no = $delegate['YouthConference']['tag'];
            $v = $delegate['YouthConference']['group'];
            $msg = 'Salam '.$delegate['YouthConference']['name'].', Your registration for d 2016 Youth Conference has been verified successfully.';
            $msg .= 'Your TAG no is '.str_pad($new_tag_no, 4, '0', STR_PAD_LEFT).' and U belong to d '.$v.' Group.Pls call 08034957503 for any questions. Pls disregard earlier msgs!';
            $phone = $delegate['YouthConference']['phone'];
            $email = $delegate['YouthConference']['email'];
            $this->request->data['YouthConference']['id'] = $delegate['YouthConference']['id'];
            $this->request->data['YouthConference']['sms'] = 2;
            $this->YouthConference->saveAll($this->request->data);
            $details = array(
                'name'=>$delegate['YouthConference']['name'],
                'tag'=>str_pad($new_tag_no, 4, '0', STR_PAD_LEFT),
                'group'=>$v
            );
            //$this->Notification->SendVerificationDetailsToMember($details, $email);
                $this->Notification->sendSMS($phone, $msg);
                $sent[] = $new_tag_no;
        }
        $this->Session->setFlash('Total of '.count($sent).' Delegates processed');
        $this->redirect($this->referer());
    }

    public function setSMS(){
            $delegates = $this->YouthConference->find('all',array('conditions'=>array('YouthConference.verified'=>1, 'YouthConference.sms'=>0)));
            foreach($delegates as $delegate){
                $tag = $delegate['YouthConference']['tag'];
                if(!empty($tag)){
                    $this->request->data['YouthConference']['id'] = $delegate['YouthConference']['id'];
                    $this->request->data['YouthConference']['sms'] = 1;
                    $this->YouthConference->saveAll($this->request->data);
                }
            }
            $this->Session->setFlash('Processed');
            $this->redirect($this->referer());

    }

    public function prayer_book_licences($batch = null){
        if(isset($batch)){
            $lices = $this->Licence->find('all',array('conditions'=>array('Licence.batch'=>$batch)));
        }else{
            $lices = $this->Licence->find('all');
        }
        $mem = count($lices);
        $this->set('lices', $lices);
        $this->set('mem', $mem);
    }

    public function generate_licences(){
        $batch = $this->portalNo(10);
        $this->set('batch', $batch);
        if(!empty($this->request->data)){
            $no = $this->request->data['Licence']['no'];
            for($i=1; $i<=$no; $i++){
                $this->request->data['Licence']['code'] = $this->portalNo(15);
                $this->request->data['Licence']['batch'] = $batch;
                $this->Licence->saveAll($this->request->data);
            }
            $this->redirect('prayer_book_licences/'.$batch);
        }
    }

}