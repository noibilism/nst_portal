<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // added the debug toolkit
    // sessions support
    // authorization for login and logut redirect
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('dashboard'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'You must be logged in to view this page.',
            'loginError' => 'Invalid Username or Password entered, please try again.'

        ));
    public $uses = array('Country','State','Branch','Qualification','Zone','MembershipStatus','Profession','Committee','Lga');
    // only allow the login controllers only
    public function beforeFilter() {
        $this->Auth->allow('login');
        $user_id = $this->Auth->user('id');
        if(isset($user_id)){
            $logged_user = $user_id;
            $role = $this->Auth->user('role_id');
            $username = $this->Auth->user('username');
            $branch_id = $this->Auth->user('branch_id');
            $zone_id = $this->Auth->user('zone_id');
            if($branch_id == 0 || $branch_id == null){
                $bch = null;
            }else{
                $bch = $branch_id;
            }

            if($zone_id == 0 || $zone_id == null){
                $zone = null;
            }else{
                $zone = $zone_id;
            }
        }else{
            $logged_user = 'guest';
            $role = null;
            $branch_id = null;
            $zone_id = null;
            $bch = null;
            $zone = null;
            $username = null;
        }
        $countries = $this->Country->find('list');
        $states = $this->State->find('list',array('conditions'=>array('State.country_id'=>161)));
        if($role == 2){
            $branches = $this->Branch->find('list', array('conditions'=>array('Branch.zone_id'=>$zone_id)));
        }else{
            $branches = $this->Branch->find('list');
        }
        $zones = $this->Zone->find('list');
        $quals = $this->Qualification->find('list');
        $profs = $this->Profession->find('list');
        $statuses = $this->MembershipStatus->find('list');
        $committees = $this->Committee->find('list');
        $lgas = $this->Lga->find('list', array('order'=>array('Lga.name ASC')));
        $current_action = $this->action;
        $z_name = $this->Zone->getZoneName();
        $b_name = $this->Branch->getBranchName();
        $p_name = $this->Profession->getProfessionName();
        $s_name = $this->MembershipStatus->getStatusname();
        $q_name = $this->getQualName();
        $lg_name = $this->getLgaName();
        $st_name = $this->getStateName();
        $ct_name = $this->getCountryName();
        $view_data = array(
            'countries'=>$countries,
            'branch_id'=>$branch_id,
            'zone_id'=>$zone_id,
            'bch'=>$bch,
            'zone'=>$zone,
            'zones'=>$zones,
            'states'=>$states,
            'branches'=>$branches,
            'quals'=>$quals,
            'profs'=>$profs,
            'statuses'=>$statuses,
            'committees'=>$committees,
            'role'=>$role,
            'logged_user'=>$logged_user,
            'lgas'=>$lgas,
            'current_action'=>$current_action,
            'z_name' => $z_name,
            'b_name' => $b_name,
            'p_name' => $p_name,
            's_name' => $s_name,
            'q_name' => $q_name,
            'lg_name' => $lg_name,
            'st_name' => $st_name,
            'ct_name' => $ct_name,
            'username' => $username
        );
        $this->set($view_data);
    }

    public function isAuthorized(array $roles) {
        $role = $this->Auth->user('role_id');
        if(!in_array($role, $roles)){
            $this->Session->setFlash('Sorry, You are not allowed to use that resource!');
            $this->redirect($this->referer());
        }
    }

    public function portalNo($length){
        $result = '';
        for($i = 0; $i < $length; $i++){
            $result .= rand(1,9);
        }
        return $result;
    }

    function getQualName(){
        $name = null;
        $orderBy = array('Qualification.name');
        $name = $this->Qualification->find('list', array('order'=>$orderBy, 'fields' => array('Qualification.name')));
        if (!$name) $name=array();
        return $name;
    }

    function getStateName(){
        $name = null;
        $orderBy = array('State.name');
        $name = $this->State->find('list', array('order'=>$orderBy, 'fields' => array('State.name')));
        if (!$name) $name=array();
        return $name;
    }

    function getCountryName(){
        $name = null;
        $orderBy = array('Country.name');
        $name = $this->Country->find('list', array('order'=>$orderBy, 'fields' => array('Country.name')));
        if (!$name) $name=array();
        return $name;
    }

    function getLgaName(){
        $name = null;
        $orderBy = array('Lga.name');
        $name = $this->Lga->find('list', array('order'=>$orderBy, 'fields' => array('Lga.name')));
        if (!$name) $name=array();
        return $name;
    }

}
