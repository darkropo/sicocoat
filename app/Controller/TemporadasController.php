<?php
App::uses('AppController', 'Controller');
/**
 * Temporadas Controller
 *
 * @property Temporada $Temporada
 */
class TemporadasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Temporada->recursive = 0;
                $this->paginate = array('limit' => 5);
		$this->set('temporadas', $this->paginate());
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
		$this->Temporada->id = $id;
		if (!$this->Temporada->exists()) {
			throw new NotFoundException(__('Invalid temporada'));
		}
		$this->set('temporada', $this->Temporada->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Temporada->create();
			if ($this->Temporada->save($this->request->data)) {
				$this->Session->setFlash(__('The temporada has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temporada could not be saved. Please, try again.'));
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
		$this->Temporada->id = $id;
		if (!$this->Temporada->exists()) {
			throw new NotFoundException(__('Invalid temporada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Temporada->save($this->request->data)) {
				$this->Session->setFlash(__('The temporada has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temporada could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Temporada->read(null, $id);
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
		$this->Temporada->id = $id;
		if (!$this->Temporada->exists()) {
			throw new NotFoundException(__('Invalid temporada'));
		}
		if ($this->Temporada->delete()) {
			$this->Session->setFlash(__('Temporada deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Temporada was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
