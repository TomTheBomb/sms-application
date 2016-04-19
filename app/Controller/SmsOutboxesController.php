<?php
App::uses('AppController', 'Controller');
/**
 * SmsOutboxes Controller
 *
 * @property SmsOutbox $SmsOutbox
 */
class SmsOutboxesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = array(
			'conditions' => array('user_id' => $this->Auth->User('id')),
			'limit' => 10
		);
		$this->SmsOutbox->recursive = 0;
		$this->set('smsOutboxes', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$credit = ClassRegistry::init('Credit');
		$findCredit = $credit->find('first', array(
			'conditions' => array(
				'user_id' => $this->Auth->User('id'),
			)
		));

		if (empty($findCredit['Credit']) || $findCredit['Credit']['amount'] <= 0) {
			$this->Session->setFlash(__('You\'ve run out of credits, your account will be topped up next week.'), 'message', array('class' => 'error'));
			$this->redirect(array('controller' => 'SmsOutboxes', 'action' => 'index'));
		}

		if ($this->request->is('post')) {
				
			
			$this->SmsOutbox->create();
			$data = array(
				'type' => 'sms',
				'user_id' => $this->Auth->User('id'),
				'send_datetime' => date('Y-m-d H:i', strtotime('NOW')),
				'status' => 'sending',
			);
			$mgData['SmsOutbox'] = array_merge($data, $this->request->data['SmsOutbox']);
			if ($msg = $this->SmsOutbox->save($mgData)) {
					$credit->id = $findCredit['Credit']['id'];
					$credit->saveField('amount', $findCredit['Credit']['amount'] - 1);
					$this->Session->setFlash(__('SMS added to queue'), 'message', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('SMS failed to send. Please, try again.'), 'message', array('class' => 'error'));
			}
		}
	}
}
