<?php
App::uses('AppController', 'Controller');
App::uses('CakePdf', 'CakePdf.Pdf');
/**
 * Proyectos Controller
 *
 * @property Proyecto $Proyecto
 */
class ProyectosController extends AppController {

    public $components = array('RequestHandler');
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        
    }
    
    
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Proyecto->recursive = 0;
                $this->paginate = array('limit' => 10);
		$this->set('proyectos', $this->paginate());
                
              
                
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
		$this->Proyecto->id = $id;
		if (!$this->Proyecto->exists()) {
			throw new NotFoundException(__('Proyecto Invalido'));
		}
		$this->set('proyecto', $this->Proyecto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Proyecto->create();
			if ($this->Proyecto->save($this->request->data)) {
				$this->Session->setFlash(__('El proyecto fue guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El proyecto no pudo ser guardado. Por favor intente de nuevo.'));
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
		$this->Proyecto->id = $id;
		if (!$this->Proyecto->exists()) {
			throw new NotFoundException(__('Proyecto Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Proyecto->save($this->request->data)) {
				$this->Session->setFlash(__('El proyecto fue guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El proyecto no pudo ser guardado. Por favor intente de nuevo.'));
			}
		} else {
			$this->request->data = $this->Proyecto->read(null, $id);
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
		$this->Proyecto->id = $id;
		if (!$this->Proyecto->exists()) {
			throw new NotFoundException(__('Proyecto Invalido'));
		}
		if ($this->Proyecto->delete()) {
			$this->Session->setFlash(__('Proyecto fue Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Proyecto no pudo ser borrado.'));
		$this->redirect(array('action' => 'index'));
	}
}
