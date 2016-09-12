<?php
App::uses('AuthComponent', 'Controller/Component');

class Zone extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 5, 50),
				'required' => true, 
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueValue'),
				'message' => 'This zone is already in use'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'Username can only be letters, numbers and underscores'
			),
        ),
        'code' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Zone Code is required'
            ),
			'min_length' => array(
				'rule' => array('minLength', '3'),
				'message' => 'Zone must have a mimimum of 3 characters'
			)
        ),
		
		'country_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select a country'
            )
        ),
    );

    function isUniqueValue($check) {

        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'Zone.id',
                    'Zone.name'
                ),
                'conditions' => array(
                    'Zone.name' => $check['name']
                )
            )
        );

        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['Zone']['id']){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }

    public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }

    function getZoneCode($zone_id){
        $code = $this->find('first', array('conditions'=>array('Zone.id'=>$zone_id)));
        return $code['Zone']['code'];
    }

    function getZoneName(){
        $name = null;
        $orderBy = array('Zone.name');
        $name = $this->find('list', array('order'=>$orderBy, 'fields' => array('Zone.name')));
        if (!$name) $name=array();
        return $name;
    }

}

?>