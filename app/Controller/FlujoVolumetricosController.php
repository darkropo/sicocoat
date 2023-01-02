<?php
App::uses('AppController', 'Controller');
/**
 * FlujoVolumetricos Controller
 *
 * @property FlujoVolumetrico $FlujoVolumetrico
 */
class FlujoVolumetricosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->FlujoVolumetrico->recursive = 0;
		$this->set('flujoVolumetricos', $this->paginate());
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
		$this->FlujoVolumetrico->id = $id;
		if (!$this->FlujoVolumetrico->exists()) {
			throw new NotFoundException(__('Valor no existe'));
		}
		$this->set('flujoVolumetrico', $this->FlujoVolumetrico->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin'));
		if ($this->request->is('post')) {
			$this->FlujoVolumetrico->create();
			if ($this->FlujoVolumetrico->save($this->request->data)) {
				$this->Session->setFlash(__('Valor guardado con exito'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Valor no pudo ser guardado'));
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
            $this->_isAuthorized(array('admin'));
		$this->FlujoVolumetrico->id = $id;
		if (!$this->FlujoVolumetrico->exists()) {
			throw new NotFoundException(__('Valor no existe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FlujoVolumetrico->save($this->request->data)) {
				$this->Session->setFlash(__('Valor guardado con exito'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Valor no pudo ser guardado'));
			}
		} else {
			$this->request->data = $this->FlujoVolumetrico->read(null, $id);
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
            $this->_isAuthorized(array('admin'));
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FlujoVolumetrico->id = $id;
		if (!$this->FlujoVolumetrico->exists()) {
			throw new NotFoundException(__('Valor no existe'));
		}
		if ($this->FlujoVolumetrico->delete()) {
			$this->Session->setFlash(__('Valor Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Valor no pudo ser borrado'));
		$this->redirect(array('action' => 'index'));
	}
}
