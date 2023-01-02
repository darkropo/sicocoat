<?php
App::uses('AppController', 'Controller');
/**
 * Elementos Controller
 *
 * @property Elemento $Elemento
 */
class ElementosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Elemento->recursive = 0;
                $this->paginate = array('limit' => 10);
		$this->set('elementos', $this->paginate());
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
		$this->Elemento->id = $id;
		if (!$this->Elemento->exists()) {
			throw new NotFoundException(__('Elemento Invalido'));
		}
		$this->set('elemento', $this->Elemento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Elemento->create();
			if ($this->Elemento->save($this->request->data)) {
				$this->Session->setFlash(__('El elemento ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El elemento no pudo ser guardado'));
			}
		}
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
		$this->Elemento->id = $id;
		if (!$this->Elemento->exists()) {
			throw new NotFoundException(__('Elemento Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Elemento->save($this->request->data)) {
				$this->Session->setFlash(__('El elemento ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El elemento no pudo ser guardado'));
			}
		} else {
			$this->request->data = $this->Elemento->read(null, $id);
		}
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
		$this->Elemento->id = $id;
		if (!$this->Elemento->exists()) {
			throw new NotFoundException(__('Elemento Invalido'));
		}
		if ($this->Elemento->delete()) {
			$this->Session->setFlash(__('Elemento Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Elemento no pudo ser Borrado'));
		$this->redirect(array('action' => 'index'));
	}
}
