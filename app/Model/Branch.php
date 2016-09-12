<?php
App::uses('AuthComponent', 'Controller/Component');

class Branch extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Branch name is required',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 5, 50),
				'required' => true, 
				'message' => 'Branch name must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueValue'),
				'message' => 'This branch is already in use',
                                 'on' => 'create'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'Username can only be letters, numbers and underscores'
			),
        ),

		'code' => array(
			'min_length' => array(
				'rule' => array('minLength', '3'),
				'message' => 'branch code must have a mimimum of 3 characters',
				'allowEmpty' => true,
				'required' => false
			)
        ),
    );

    public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }

    function isUniqueValue($check) {

        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'Branch.id',
                    'Branch.name'
                ),
                'conditions' => array(
                    'Branch.name' => $check['name']
                )
            )
        );

        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['Branch']['id']){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }

    function getBranchCode($bch_id){
        $code = $this->find('first', array('conditions'=>array('Branch.id'=>$bch_id)));
        return $code['Branch']['code'];
    }

    function getBranchZone($bch_id){
        $code = $this->find('first', array('conditions'=>array('Branch.id'=>$bch_id)));
        return $code['Branch']['zone_id'];
    }

    function getBranchState($bch_id){
        $code = $this->find('first', array('conditions'=>array('Branch.id'=>$bch_id)));
        return $code['Branch']['state_id'];
    }

    function getBranchName(){
        $name = null;
        $orderBy = array('Branch.name');
        $name = $this->find('list', array('order'=>$orderBy, 'fields' => array('Branch.name')));
        if (!$name) $name=array();
        return $name;
    }


}
?>