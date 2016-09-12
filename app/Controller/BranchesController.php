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

App::uses('AppController', 'Controller');

class BranchesController extends AppController {

	public $uses = array('Country', 'Branch', 'State','Zone','PersonalProfile','OldUser');

    public function list_branches(){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        $allowed = array(1,2);
        $this->isAuthorized($allowed);
        $branches = $this->Branch->find('all');
        $this->set('branches', $branches);
    }

    public function add_branch(){
        $allowed = array(1,2);
        $this->isAuthorized($allowed);
        $zones = $this->Zone->find('list');
        $states = $this->State->find('list');
        $this->set('states', $states);
        $this->set('zones', $zones);
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $this->Branch->create();
            if($this->Branch->save($form_data)){
                $this->Session->setFlash(__('Branch created successfully!'));
                $this->redirect('list_branches');
            }else{
                $this->Session->setFlash(__('Branch could not be created!'));
            }
        }
    }

    public function update_branch($id){
        $allowed = array(1,2);
        $this->isAuthorized($allowed);
        $zones = $this->Zone->find('list');
        $states = $this->State->find('list');
        $this->set('zones', $zones);
        $this->set('states', $states);
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $this->Branch->create();
            $this->Branch->id = $id;
            if($this->Branch->save($form_data)){
                $this->Session->setFlash(__('Branch updated successfully!'));
                $this->redirect('list_branches');
            }else{
                $this->Session->setFlash(__('Branch could not be updated!'));
            }
        }else{
            $this->request->data = $this->Branch->findById($id);
        }
    }

    public function normalize_numbering(){
        $branch_id = $this->Auth->user('branch_id');
        $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.branch_id'=>$branch_id),'field'=>array('PersonalProfile.id','PersonalProfile.reg_no')));
        $i = 1;
        foreach($members as $member){
            $id = $member['PersonalProfile']['id'];
            $this->request->data['PersonalProfile']['id'] = $id;
            $this->request->data['PersonalProfile']['reg_no'] = $i++;
            $this->PersonalProfile->saveAll($this->request->data);
        }
        $this->Session->setFlash('Membership Numbering Reset was successful!');
        $this->redirect($this->referer());
    }

    public function correct_status_errors(){
        $branch_id = $this->Auth->user('branch_id');
        $old_data = $this->OldUser->find('all', array('conditions'=>array('OldUser.Is_Member'=>1,'OldUser.branch_id'=>$branch_id),'fields'=>array('OldUser.mar_status', 'OldUser.dob', 'OldUser.branch_id', 'OldUser.email' )));
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(!empty($old_data)){
            foreach($old_data as $data){
                $email = $data['OldUser']['email'];
                $status = $data['OldUser']['mar_status'];
                $id = $this->PersonalProfile->findByEmail($email);
                $this->request->data['PersonalProfile']['id'] = $id['PersonalProfile']['id'];;
                $this->request->data['PersonalProfile']['mar_status'] = $status;
                $this->PersonalProfile->saveAll($this->request->data);
            }
            $this->Session->setFlash('Errors corrected successfully!');
            $this->redirect($this->referer());
        }
    }

    public function correct_professions(){
        $branch_id = $this->Auth->user('branch_id');
        $old_data = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.branch_id'=>$branch_id)));
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(!empty($old_data)){
            foreach($old_data as $data){
                $this->request->data['PersonalProfile']['id'] = $data['PersonalProfile']['id'];
                $this->request->data['PersonalProfile']['profession'] = $data['PersonalProfile']['prof_id'];;
                $this->PersonalProfile->saveAll($this->request->data);
            }
            $this->Session->setFlash('Professisons Migrated successfully!');
            $this->redirect($this->referer());
        }
    }




}
