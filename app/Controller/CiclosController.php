<?php
App::uses('AppController', 'Controller');
/**
 * Ciclos Controller
 *
 * @property Ciclo $Ciclo
 */
class CiclosController extends AppController {

/**
 * index method
 *
 * @return void
 */
        public $helpers = array('Html','Js');
    
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Ciclo->recursive = 0;
                $this->paginate = array('limit' => 5);
		$this->set('ciclos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Ciclo->id = $id;
		if (!$this->Ciclo->exists()) {
			throw new NotFoundException(__('Ciclo Invalido'));
		}
		$this->set('ciclo', $this->Ciclo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Ciclo->create();
			if ($this->Ciclo->save($this->request->data)) {
				$this->Session->setFlash(__('El ciclo fue guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El ciclo no pudo ser guardado. Por favor intente de nuevo.'));
			}
		}
		$temporadas = $this->Ciclo->Temporada->find('list', array(
                    'fields'     => array('Temporada.nombre')));
		$this->set(compact('temporadas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->_isAuthorized(array('admin','usuario'));
		$this->Ciclo->id = $id;
		if (!$this->Ciclo->exists()) {
			throw new NotFoundException(__('Ciclo Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciclo->save($this->request->data)) {
				$this->Session->setFlash(__('El ciclo fue guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El ciclo no pudo ser guardado. Por favor intente de nuevo.'));
			}
		} else {
			$this->request->data = $this->Ciclo->read(null, $id);
		}
		$temporadas = $this->Ciclo->Temporada->find('list', array(
                    'fields'     => array('Temporada.nombre')));
		$this->set(compact('temporadas'));
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
            $this->_isAuthorized(array('admin','usuario'));
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ciclo->id = $id;
		if (!$this->Ciclo->exists()) {
			throw new NotFoundException(__('Ciclo Invalido'));
		}
		if ($this->Ciclo->delete()) {
			$this->Session->setFlash(__('Ciclo Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciclo no pudo ser Borrado'));
		$this->redirect(array('action' => 'index'));
	}
}
