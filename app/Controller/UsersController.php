<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('login', 'logout', 'register'));
    }

    /**
     * Login action
     * @return void
     */
    public function login()
    {
        if ($this->Auth->User()) {
            $this->Session->setFlash(__('You\'re logged in'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        
        if ($this->request->isPost()) {
            //$this->User->set($this->data);
            //if ($this->User->validates()) {
                if ($this->Auth->login()) {
                    $this->Session->setFlash(__('Logged in.'));
                    $this->redirect('/');
                } else {
                    $this->Session->setFlash(__('Looks like those details wern\'t correct.'), 'message', array('class' => 'error'));
                    $this->redirect($this->here);
                }
            //}
        }
    }

    /**
     * Logout action
     * @return void
     */
    public function logout()
    {
        $this->Session->destroy();
        $this->Auth->logout();
        $this->Session->setFlash('Logged out.', 'message', array('class' => 'success'));
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

    /**
     * Register action
     * @return void
     */
    public function register()
    {
        //Already logged in??
        if ($this->Auth->User()) {
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->validates()) {
                //Find the location for the user
                $location = $this->User->Location->findLocation($this->data['User']['postcode']);
                if (empty($location)) {
                    $this->Session->setFlash(__('Please enter a postcode within NSW.', 'message', array('class' => 'error')));
                    $this->redirect($this->here);
                }
                //Save the user
                $group = $this->data;
                $group['User']['group_id'] = $this->User->Group->userGroupId();
                $group['User']['location_id'] = $location;
                $user = $this->User->save($group);
                $this->Auth->login($user['User']);
                $this->redirect('/');
            }
        }
    }

}
