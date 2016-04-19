<?php
class ProcessShell extends AppShell {
	public $uses = array('SmsOutbox', 'Sms', 'Credit');

	public function main() {
		$msgs = $this->SmsOutbox->find('all', array(
			'conditions' => array(
				'status' => 'sending',
				'send_datetime <=' => date('Y-m-d H:i'),
			),
		));
		
		if (empty($msgs)) {
			return;
		}


		foreach ($msgs as $msg) {
			$smsData = array(
				'sms_from' => $msg['SmsOutbox']['from'],
				'sms_to' => preg_replace('/^04/', '614', $msg['SmsOutbox']['to']),
				'msg_content' => $msg['SmsOutbox']['contents'],
			);
			
			$this->SmsOutbox->id = $msg['SmsOutbox']['id'];
			try { 
				$response = $this->Sms->sendSms($smsData);
			} catch (Exception $e) {
				$this->creditBack($msg['User']['id']);
				$this->SmsOutbox->save(array(
					'status' => 'failed',
					'data' => serialize($e),
				));
				continue;
			}

			if ($error = $this->Sms->getError()) {
				//Future add error msg recording
				$this->creditBack($msg['User']['id']);
				$this->SmsOutbox->save(array(
					'status' => 'failed',
					'data' => serialize($error),
				));
				continue;
			}
			$this->SmsOutbox->save(array(
				'status' => 'sent',
				'data' => serialize($response),
			));
		}
	}

	public function creditBack($userId) {
		$credit = $this->Credit->find('first', array(
			'conditions' => array(
				'user_id' => $userId,
			),
		));

		$this->Credit->id = $credit['Credit']['id'];
		$this->Credit->saveField('amount', $credit['Credit']['amount'] + 1);
	}
}
