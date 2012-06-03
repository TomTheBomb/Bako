<?php
App::uses('AppController', 'Controller');
/**
 * Politicians Controller
 *
 * @property Politician $Politician
 */
class PoliticiansController extends AppController {

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'view'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Politician->id = $id;
		if (!$this->Politician->exists()) {
			throw new NotFoundException(__('Invalid politician'));
		}
        $politician = $this->Politician->find('first', array (
                'conditions' => array (
                    'Politician.id' => $id,
                ),
                'contain' => array (
                    'Question',
                    'Electorate' => array (
                        'Location',
                    ),
                ),
            )
        );
		$this->set('politician', $politician);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Politician->create();
			if ($this->Politician->save($this->request->data)) {
				$this->Session->setFlash(__('The politician has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The politician could not be saved. Please, try again.'));
			}
		}
		$users = $this->Politician->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Politician->id = $id;
		if (!$this->Politician->exists()) {
			throw new NotFoundException(__('Invalid politician'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Politician->save($this->request->data)) {
				$this->Session->setFlash(__('The politician has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The politician could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Politician->read(null, $id);
		}
		$users = $this->Politician->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Politician->id = $id;
		if (!$this->Politician->exists()) {
			throw new NotFoundException(__('Invalid politician'));
		}
		if ($this->Politician->delete()) {
			$this->Session->setFlash(__('Politician deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Politician was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
