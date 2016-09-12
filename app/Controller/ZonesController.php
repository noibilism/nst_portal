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

class ZonesController extends AppController {

	public $uses = array('Country', 'Zone', 'State');

    public function list_zones(){
        $zones = $this->Zone->find('all');
        $this->set('zones', $zones);
    }

    public function add_zone(){
        $allowed = array(1);
        $this->isAuthorized($allowed);
        $countries = $this->Country->find('list');
        $this->set('countries', $countries);
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $this->Zone->create();
            if($this->Zone->save($form_data)){
                $this->Session->setFlash(__('Zone created successfully!'));
                $this->redirect('list_zones');
            }else{
                $this->Session->setFlash(__('Zone could not be created!'));
            }
        }
    }

    public function update_zone($id){
        $allowed = array(1);
        $this->isAuthorized($allowed);
        $countries = $this->Country->find('list');
        $states = $this->State->find('list');
        $this->set('countries', $countries);
        $this->set('states', $states);
        $form_data = $this->request->data;
        if(!empty($form_data)){
            $this->Zone->create();
            $this->Zone->id = $id;
            if($this->Zone->save($form_data)){
                $this->Session->setFlash(__('Zone updated successfully!'));
                $this->redirect('list_zones');
            }else{
                $this->Session->setFlash(__('Zone could not be updated!'));
            }
        }else{
            $this->request->data = $this->Zone->findById($id);
        }
    }

}
