<?php
App::uses('AppController', 'Controller');
/**
 * Ciclohasestaciones Controller
 *
 * @property Ciclohasestacione $Ciclohasestacione
 */
class CiclohasestacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Ciclohasestacione->recursive = 0;
		$this->set('ciclohasestaciones', $this->paginate());
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
		$this->Ciclohasestacione->id = $id;
		if (!$this->Ciclohasestacione->exists()) {
			throw new NotFoundException(__('Invalid ciclohasestacione'));
		}
		$this->set('ciclohasestacione', $this->Ciclohasestacione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Ciclohasestacione->create();
			if ($this->Ciclohasestacione->save($this->request->data)) {
				$this->Session->setFlash(__('The ciclohasestacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciclohasestacione could not be saved. Please, try again.'));
			}
		}
		$ciclos = $this->Ciclohasestacione->Ciclo->find('list');
		$estaciones = $this->Ciclohasestacione->Estacione->find('list');
		$this->set(compact('ciclos', 'estaciones'));
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
		$this->Ciclohasestacione->id = $id;
		if (!$this->Ciclohasestacione->exists()) {
			throw new NotFoundException(__('Invalid ciclohasestacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciclohasestacione->save($this->request->data)) {
				$this->Session->setFlash(__('The ciclohasestacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciclohasestacione could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ciclohasestacione->read(null, $id);
		}
		$ciclos = $this->Ciclohasestacione->Ciclo->find('list');
		$estaciones = $this->Ciclohasestacione->Estacione->find('list');
		$this->set(compact('ciclos', 'estaciones'));
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
		$this->Ciclohasestacione->id = $id;
		if (!$this->Ciclohasestacione->exists()) {
			throw new NotFoundException(__('Invalid ciclohasestacione'));
		}
		if ($this->Ciclohasestacione->delete()) {
			$this->Session->setFlash(__('Ciclohasestacione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciclohasestacione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
