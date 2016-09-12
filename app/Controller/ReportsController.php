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

class ReportsController extends AppController {

    public $uses = array('Country', 'Zone', 'State','Committee','Branch','BranchState','Qualification','MembershipStatus','Profession','PersonalProfile','Address','User');
    public $components = array('Resources');

    public function getCommitteeMembers($comm_id, $zone_id = null, $bch_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.committee_id'=>$comm_id, 'PersonalProfile.zone_id'=>$zone_id)));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.committee_id'=>$comm_id, 'PersonalProfile.branch_id'=>$bch_id)));
        }else{
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.committee_id'=>$comm_id)));
        }
        $this->set('members', $members);
        return $members;
    }

    public function getTotalMembers( $zone_id = null, $bch_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.zone_id'=>$zone_id)));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.branch_id'=>$bch_id)));
        }else{
            $members = $this->PersonalProfile->find('all');
        }
        $this->set('members', $members);
        return $members;
    }

    function countBranch($branch_id){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        $members = $this->PersonalProfile->find('all',array('conditions'=>array('PersonalProfile.branch_id'=>$branch_id),'fields'=>array('PersonalProfile.id')));
        $no = count($members);
        return $no;
    }

    public function getBranchMembers($bch_id){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        $members = $this->PersonalProfile->branch_members($bch_id);
        $this->set('members', $members);
        return $members;
    }

    public function getZoneMembers($zone_id){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.zone_id'=>$zone_id)));
        $this->set('members', $members);
        return $members;
    }

    public function getGenderMembers($sex, $bch_id = null, $zone_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0); //Infinite
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.sex'=>$sex, 'PersonalProfile.zone_id'=>$zone_id)));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.sex'=>$sex, 'PersonalProfile.branch_id'=>$bch_id)));
        }else{
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.sex'=>$sex)));
        }
        $this->set('members', $members);
        return $members;
    }

    public function getProfMembers($prof, $zone_id = null, $bch_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array(
                'conditions'=>array(
                    'PersonalProfile.profession'=>$prof,
                    'PersonalProfile.zone_id'=>$zone_id
                )));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.profession'=>$prof, 'PersonalProfile.branch_id'=>$bch_id)));
        }else{
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.profession'=>$prof)));
        }
        $this->set('members', $members);
        return $members;
    }

    public function getQualMembers($prof, $name, $zone_id = null, $bch_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>
                array(
                'OR'=>array(
                        'PersonalProfile.qual_id'=>$prof,
                        'PersonalProfile.qualification'=>$name
                        ),
                 'AND'=>array(
                     'PersonalProfile.zone_id'=>$zone_id
                 )
                )));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>
                array(
                    'OR'=>array(
                        'PersonalProfile.qual_id'=>$prof,
                        'PersonalProfile.qualification'=>$name
                    ),
                    'AND'=>array(
                        'PersonalProfile.branch_id'=>$bch_id
                    )
                    )));
        }else{
            $members = $this->PersonalProfile->find('all', array('conditions'=>array(
                'OR'=>array(
                    'PersonalProfile.qual_id'=>$prof,
                    'PersonalProfile.qualification'=>$name
                )            )));
        }
        $this->set('members', $members);
        return $members;
    }

    public function getStatusMembers($stat, $zone_id = null, $bch_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.membership_status_id'=>$stat, 'PersonalProfile.zone_id'=>$zone_id)));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.membership_status_id'=>$stat, 'PersonalProfile.branch_id'=>$bch_id)));
        }else{
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.membership_status_id'=>$stat)));
        }
        $this->set('members', $members);
        return $members;
    }

    public function getMaritalStatusMembers($ms, $zone_id = null, $bch_id = null){
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        if(isset($zone_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.mar_status'=>$ms, 'PersonalProfile.zone_id'=>$zone_id)));
        }elseif(isset($bch_id)){
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.mar_status'=>$ms, 'PersonalProfile.branch_id'=>$bch_id)));
        }else{
            $members = $this->PersonalProfile->find('all', array('conditions'=>array('PersonalProfile.mar_status'=>$ms)));
        }
        $this->set('members', $members);
        return $members;
    }

    public function membership_statuses() {
        $MembershipStatuses = $this->MembershipStatus->find('all');
        $this->set('MembershipStatuses',$MembershipStatuses);
    }

    public function qualifications() {
        $qualifications = $this->Qualification->find('all');
        $this->set('qualifications',$qualifications);
    }

    public function professional_groups() {
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $professions = $this->Profession->find('all');
        $this->set('professions',$professions);
    }

    public function committees() {
        $allowed = array(1,2,3);
        $this->isAuthorized($allowed);
        $committees = $this->Committee->find('all');
        $this->set('committees',$committees);
    }


}
