<?php
App::uses('AuthComponent', 'Controller/Component');

class Profession extends AppModel {

	public $avatarUploadDir = 'img/avatars';

	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A profession is required',
				'allowEmpty' => false
            ),
			'between' => array(
				'rule' => array('between', 5, 100),
				'required' => true,
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueValue'),
				'message' => 'This Profession is already in use'
			)
        )
    );

    function isUniqueValue($check) {

        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'Profession.id',
                    'Profession.name'
                ),
                'conditions' => array(
                    'Profession.name' => $check['name']
                )
            )
        );

        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['Profession']['id']){
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

    function getProfessionName(){
        $name = null;
        $orderBy = array('Profession.name');
        $name = $this->find('list', array('order'=>$orderBy, 'fields' => array('Profession.name')));
        if (!$name) $name=array();
        return $name;
    }

}

?>