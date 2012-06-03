<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'OpentokAPIConfig', array('file' => 'Opentok/API_Config.php'));
App::import('Vendor', 'OpenTokSDK', array('file' => 'Opentok/OpenTokSDK.php'));
/**
 * Questions Controller
 *
 * @property Question $Question
 */
class QuestionsController extends AppController {
    
    public function index() {

    }

    public function add($politician_id) {
        $this->Question->Politician->id = $politician_id;
		if (!$this->Question->Politician->exists()) {
			throw new NotFoundException(__('Invalid local member'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Question']['politician_id'] = $politician_id;
            $this->request->data['Question']['user_id'] = $this->Auth->user('id');
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('Thanks, Your video has been saved and sent. We will email you once a response has been made.'));
				$this->redirect(array('action' => 'view', $this->Question->getInsertId()));
			} else {
				$this->redirect($this->here);
			}
		}

        $this->set('politician', $this->Question->Politician->read(null, $politician_id));
		$apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
		$opentok['token'] = $apiObj->generate_token(null, RoleConstants::MODERATOR);
		$this->set(compact('opentok'));
		$this->set('title_for_layout', __('Record Your 2 minute Question'));
    }

    public function view($id) {
        $this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('Thanks, Your video has been saved and sent. We will email you once a response has been made.'));
				$this->redirect(array('action' => 'view', $this->Question->getInsertId()));
			} else {
				$this->redirect($this->here);
			}
		}

		$apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
		$opentok['token'] = $apiObj->generate_token(null, RoleConstants::MODERATOR);
		$this->set(compact('opentok'));
        $question = $this->Question->find('first', array (
                'conditions' => array (
                    'Question.id' => $id,
                ),
                'contain' => array (
                    'Answer',
                    'Politician',
                    'User',
                ),
            )
        );
		$this->set('question', $question);
        if ($this->Auth->User('group_id') == 2 || $this->Auth->User('group_id') == 3) {
            $this->set('canRecord', true);
        }
    }
}
