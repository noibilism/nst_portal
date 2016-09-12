<?php
App::uses('AuthComponent', 'Controller/Component');

class YouthConference extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required',
				'allowEmpty' => false,
                'on' => 'create'
            ),
			'between' => array( 
				'rule' => array('between', 5, 50),
				'required' => true, 
				'message' => 'name must be between 1 to 30 letters',
                'on' => 'create'
			),

            'unique' => array(
                'rule'    => array('isUniqueValue'),
                'message' => 'This name has already been registered!',
                'on' => 'create'
            )

        ),

        'email' => array(
            'required' => array(
                'rule' => array('email', true),
                'message' => 'Please provide a valid email address.'
            ),

        ),

        'phone' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Phone no is required',
                'on' => 'create'
            ),
        ),
		'gender' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please choose a sex',
                'on' => 'create'
            )
        ),
        'zone' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please choose a your zone',
                'on' => 'create'
            )
        ),
        'branch' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please choose a branch',
                'on' => 'create'
            )
        ),
        'payment_details' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter your payment information',
                'on' => 'create'
            ),
            'between' => array(
                'rule' => array('between', 5, 250),
                'required' => true,
                'message' => ' name must be between 1 to 230 letters',
                'on' => 'create'
            ),
        ),

        'next_of_kin' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter your next of kin information',
                'on' => 'create'
            ),
            'between' => array(
                'rule' => array('between', 5, 250),
                'required' => true,
                'message' => ' next of kin must be between 1 to 230 letters',
                'on' => 'create'
            ),
        ),


    );


    function isUniqueValue($check) {

        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'YouthConference.id',
                    'YouthConference.name'
                ),
                'conditions' => array(
                    'YouthConference.name' => $check['name']
                )
            )
        );

        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['YouthConference']['id']){
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

}

?>