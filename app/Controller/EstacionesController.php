<?php
App::uses('AppController', 'Controller');
/**
 * Estaciones Controller
 *
 * @property Estacione $Estacione
 */
class EstacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Estacione->recursive = 0;
                $this->paginate = array('limit' => 10);
		$this->set('estaciones', $this->paginate());
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
		$this->Estacione->id = $id;
		if (!$this->Estacione->exists()) {
			throw new NotFoundException(__('Estacion Invalida'));
		}
		$this->set('estacione', $this->Estacione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Estacione->create();
			if ($this->Estacione->save($this->request->data)) {
				$this->Session->setFlash(__('La estacion fue guardada.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La estacion no pudo ser guardada. Por favor, intente de nuevo.'));
			}
		}
		$proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		$this->set(compact('proyectos'));
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
		$this->Estacione->id = $id;
		if (!$this->Estacione->exists()) {
			throw new NotFoundException(__('Estacion Invalida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estacione->save($this->request->data)) {
				$this->Session->setFlash(__('La estacion fue guardada.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La estacion no pudo ser guardada. Por favor, intente de nuevo.'));
			}
		} else {
			$this->request->data = $this->Estacione->read(null, $id);
		}
		$proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		$this->set(compact('proyectos'));
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
		$this->Estacione->id = $id;
		if (!$this->Estacione->exists()) {
			throw new NotFoundException(__('Estacion Invalida'));
		}
		if ($this->Estacione->delete()) {
			$this->Session->setFlash(__('Estacion Borrada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Estacione no pudo ser Borrada.'));
		$this->redirect(array('action' => 'index'));
	}
}
