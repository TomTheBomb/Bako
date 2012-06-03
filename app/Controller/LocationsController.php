<?php
App::uses('AppController', 'Controller');
/**
 * Loactions Controller
 *
 * @property Answer $Answer
 */
class LocationsController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
        parent::beforeFilter();
            $this->Auth->allow(array(
                'search',
            ));
    }

/**
 * search method
 *
 * @return void
 */
	public function search() {
        $locations = null;
        if ($this->request->data) {
            $this->Location->set($this->data);
            if ($this->Location->validates()) {
                $params = array(
                    'conditions' => array(
                        'or' => array(
                            'Location.postcode' => $this->request->data['Location']['postcode'],
                            'Location.suburb LIKE ' => '%'.$this->request->data['Location']['postcode'].'%'
                            ),
                        ),
                    'contain' => array (
                        'Electorate' => array (
                                'Politician',
                        ),
                    ),
                );
                $locations = $this->Location->find("all",$params);
            }
        }
        $this->set(compact('locations'));
	}

}
