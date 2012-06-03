<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'OpentokAPIConfig', array('file' => 'Opentok/API_Config.php'));
App::import('Vendor', 'OpenTokSDK', array('file' => 'Opentok/OpenTokSDK.php'));

/**
 * Answers Controller
 *
 * @property Answer $Answer
 */
class AnswersController extends AppController {

    public function add($id) {
        $this->Answer->Question->id = $id;
		if (!$this->Answer->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Answer']['question_id'] = $id;
            $this->request->data['Answer']['user_id'] = $this->Auth->user('id');
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('Thanks, Your video has been saved and sent.'));
				$this->redirect(array('controller' => 'questions', 'action' => 'view', $id));
			} else {
				$this->redirect($this->here);
			}
		}

        $question = $this->Answer->Question->find('first', array (
                'conditions' => array (
                    'Question.id' => $id,
                ),
                'contain' => array (
                    'User',
                ),
            )
        );
		$this->set('question', $question);
		$apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
		$opentok['token'] = $apiObj->generate_token(null, RoleConstants::MODERATOR);
		$this->set(compact('opentok'));
    }
}
