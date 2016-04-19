<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property SmsPlan $SmsPlan
 * @property Contact $Contact
 * @property CreditHistory $CreditHistory
 * @property Credit $Credit
 * @property SmsOutbox $SmsOutbox
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isunique' => array(
				'rule' => array('isunique'),
				'message' => 'Looks like that email is already registered',
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', 6),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'confirm_password' => array(
			'notEmpty' => array(
				'rule' => array('notempty'),
				'message' => 'Enter a matching password',
			),
			'matching' => array(
				'rule' => array('matchingPassword'),
				'message' => 'Enter a matching password',
			),
		),
		'number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern' => array(
				'rule' => '/^(?:\+?61|0)4(?:[01]\d{3}|(?:2[1-9]|3[0-57-9]|4[7-9]|5[0-35-9]|6[679]|7[078]|8[178]|9[7-9])\d{2}|(?:20[2-9]|444|68[3-9]|79[01]|820|901)\d|(?:200[01]|2010|8984))\d{4}$/',
				'message' => 'Mobile number isn\'t valid',
			),
			'isunique' => array(
				'rule' => array('isunique'),
				'message' => 'That mobile number is already registered',
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sms_plan_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'agree' => array(
			'notEmpty' => array(
				'rule' => array('comparison', 'equal to', 1),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'You must agree to the Terms of Use',
				'required' => true,
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SmsPlan' => array(
			'className' => 'SmsPlan',
			'foreignKey' => 'sms_plan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		/*'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CreditHistory' => array(
			'className' => 'CreditHistory',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Credit' => array(
			'className' => 'Credit',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SmsOutbox' => array(
			'className' => 'SmsOutbox',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function matchingPassword() {
		if ($this->data['User']['password'] == $this->data['User']['confirm_password']) {
			return true;
		}
		return false;
	}

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
        		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    		}
    		return true;
	}
	
	public function generateCode() {
		$uniqid = uniqid();
		$randStart = rand(1,5);
		return substr($uniqid, $randStart, 5);
	}
}
