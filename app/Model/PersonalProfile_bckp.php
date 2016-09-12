<?php
App::uses('AuthComponent', 'Controller/Component');

class PersonalProfile extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
/*	public $validate = array(
        'first_name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A First name is required',
				'allowEmpty' => false,
                'on' => 'create'
            ),
			'between' => array( 
				'rule' => array('between', 5, 50),
				'required' => true, 
				'message' => 'First name must be between 1 to 30 letters',
                'on' => 'create'
			),

        ),

        'last_name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Last name is required',
                'allowEmpty' => false,
                'on' => 'create'
            ),
            'between' => array(
                'rule' => array('between', 5, 50),
                'required' => true,
                'message' => 'Last name must be between 1 to 50 letters',
                'on' => 'create'
            ),

        ),

        'dob' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A date of birth is required',
                'on' => 'create'
            ),
        ),
		'sex' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please choose a sex',
                'on' => 'create'
            )
        ),
        'mar_status' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please choose a marital status',
                'on' => 'create'
            )
        ),
        'picture' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please upload a picture',
                'on' => 'create'
            )
        ),
        'prof_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select a profession',
                'on' => 'create'
            )
        ),

        'phone' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a phone number',
                'on' => 'create'
            )
        ),

        'unique' => array(
            'rule'    => array('isUniqueValue'),
            'message' => 'This Phone Number is already in use',
            'on' => 'create'
        )
    );*/


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

    public function all_members(){
        $result = $this->find('all');
        return $result;
    }

    public function zone_members($zone_id){
        $result = $this->find('all', array('conditions'=>array('PersonalProfile.zone_id'=>$zone_id)));
        return $result;
    }

    public function branch_members($bch_id){
        $result = $this->find('all', array('conditions'=>array('PersonalProfile.branch_id'=>$bch_id)));
        return $result;
    }

    public function update_members($status,$email){
        $this->email = $email;
        return $this->saveField('mar_status',$status);
    }

    public function update_members_dob($dob,$email){
        $this->email = $email;
        return $this->saveField('dob',$dob);
    }

}

?>