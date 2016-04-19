<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
        	'Session',
        	'Auth' => array(
            		'loginRedirect' => array('controller' => 'Files', 'action' => 'index'),
            		'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
        		'authenticate' => array(
            			'Form' => array(
               	 			'fields' => array('username' => 'email')
            			)
        		)
		)
    	);
	

	public $helpers = array('Session', 'Html', 'Form');

	public function beforeFilter() {

		if ($this->Auth->User()) {
			$cr = ClassRegistry::init('Credit');
			$credit = $cr->find('first', array(
				'conditions' => array(
					'user_id' => $this->Auth->User('id'),
				)
			));
			$this->set('creditAmount', $credit['Credit']['amount']);
		}

		if ($this->Auth->User() && !$this->Auth->User('verified')) {
			$prms = $this->params->params;
			$allowed = array('terms', 'logout', 'verifyAccount', 'display');
			if (($prms['controller'] != 'users' || $prms['controller'] != 'pages') &&
				!in_array($prms['action'], $allowed)
			) {
				$this->Session->setFlash(__('Please verify your account.'), 'message', array('class' => 'error'));
				$this->redirect(array('controller' => 'users', 'action' => 'verifyAccount'));
			}
		}

		//Lock down the admin
		if ($this->params->params['plugin'] == 'admin') {
			if (!in_array($this->Auth->User('email'), Configure::read('Admin.emails'))) {
				$this->redirect('/');
			}
		}
		return parent::beforeFilter();
	}
}
