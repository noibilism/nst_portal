<?php
App::uses('AuthComponent', 'Controller/Component');

class MembershipStatus extends AppModel {

	public $avatarUploadDir = 'img/avatars';

	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required',
				'allowEmpty' => false
            ),
			'between' => array(
				'rule' => array('between', 5, 100),
				'required' => true,
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueValue'),
				'message' => 'This committee is already in use'
			)
        )
    );

    function isUniqueValue($check) {

        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'MembershipStatus.id',
                    'MembershipStatus.name'
                ),
                'conditions' => array(
                    'MembershipStatus.name' => $check['name']
                )
            )
        );

        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['MembershipStatus']['id']){
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

    function getStatusName(){
        $name = null;
        $orderBy = array('MembershipStatus.name');
        $name = $this->find('list', array('order'=>$orderBy, 'fields' => array('MembershipStatus.name')));
        if (!$name) $name=array();
        return $name;
    }

}

?>