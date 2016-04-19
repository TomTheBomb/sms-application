<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow(array('register', 'resetPassword'));
		if ($this->Auth->User() && !$this->Auth->User('verified') && !in_array($this->action, array('verifyAccount', 'logout'))) {
			$this->Session->setFlash(__('Please verify your account with the SMS sent.'), 'message', array('class' => 'error'));
			$this->redirect(array('controller' => 'users', 'action' => 'verifyAccount'));
		}
		return parent::beforeFilter();
	}

	public function login() {
		if ($this->request->is('post')) {
        		if ($this->Auth->login()) {
            			$this->redirect($this->Auth->redirect());
        		} else {
            			$this->Session->setFlash(__('Invalid username or password, try again'), 'message', array('class' => 'error'));
        		}
    		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function register() {
		if ($this->request->is('post')) {
			$data = $this->data;
			$data['User']['ip_address'] = (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$data['User']['number']  = preg_replace('/^04/', '614', $data['User']['number']);
			if ($user = $this->User->save($data)) {
				$code = $this->User->generateCode();
				$this->Auth->login($user['User']);
				$this->Session->write('Auth.User.verficication_code', $code);
				$this->User->id = $this->Auth->User('id');
				$this->User->saveField('verficication_code', $code);

				//Cleanup

				$sms = ClassRegistry::init('Sms');
				$smsData = array(
					'sms_from' => 'Spoof dot IM',
					'sms_to' => $this->Auth->User('number'),
					'msg_content' => 'Your verification code is: ' . $code,
				);	
				$sms->sendSms($smsData);

				$this->Session->setFlash(__('Thanks for registering'), 'message', array('class' => 'success'));
				$this->redirect(array('controller' => 'users', 'action' => 'verifyAccount'));
			}
		}
	}

	public function verifyAccount($userId = null, $resend = false) {
		if ($this->Auth->User()) {
			$userId = $this->Auth->User('id');
			$this->Set('number', $this->Auth->User('number'));
		}

		if ($this->Auth->User('verified')) {
			$this->redirect(array('controller' => 'SmsOutboxes', 'action' => 'index'));
		}

		if ($this->request->is('post')) {
			if ($this->data['User']['code'] != $this->Auth->User('verficication_code')) {
				$this->Session->setFlash(__('Incorrect code'), 'message', array('class' => 'error'));
			} else {
				$this->Session->setFlash(__('Account verified'), 'message', array('class' => 'success'));
				$this->Session->write('Auth.User.verified', 1);
				$this->User->id = $this->Auth->User('id');
				$this->User->saveField('verified', 1);

				//Give 7 free SMS credits				
				$this->User->Credit->save(array(
					'amount' => 7,
					'type' => 'sms',
					'user_id' => $this->Auth->User('id'),
				));
				$this->redirect(array('controller' => 'SmsOutboxes', 'action' => 'index'));
			}
		}
	}

	public function resetPassword() {

	}
/*
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$smsPlans = $this->User->SmsPlan->find('list');
		$this->set(compact('smsPlans'));
	}
*/
}
