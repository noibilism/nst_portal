<?php
App::uses('AuthComponent', 'Controller/Component');

class Qualification extends AppModel {

	public $avatarUploadDir = 'img/avatars';

	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A qualification is required',
				'allowEmpty' => false
            ),
			'between' => array(
				'rule' => array('between', 2, 100),
				'required' => true,
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueValue'),
				'message' => 'This Qualification is already in use'
			)
        )
    );

    function isUniqueValue($check) {

        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'Qualification.id',
                    'Qualification.name'
                ),
                'conditions' => array(
                    'Qualification.name' => $check['name']
                )
            )
        );

        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['Qualification']['id']){
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

    function getQualificationName(){
        $name = null;
        $orderBy = array('Qualification.name');
        $name = $this->find('list', array('order'=>$orderBy, 'fields' => array('Qualification.name')));
        if (!$name) $name=array();
        return $name;
    }

}

?>