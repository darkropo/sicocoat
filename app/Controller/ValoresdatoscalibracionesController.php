<?php
App::uses('AppController', 'Controller');
/**
 * Valoresdatoscalibraciones Controller
 *
 * @property Valoresdatoscalibracione $Valoresdatoscalibracione
 */
class ValoresdatoscalibracionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Valoresdatoscalibracione->recursive = 0;
		$this->set('valoresdatoscalibraciones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = NULL) {
            
            $this->_isAuthorized(array('admin','invitado','usuario'));
		
                $this->Valoresdatoscalibracione->id = $id;
                //print_r($this->Valoresdatoscalibracione->re);
		if (!$this->Valoresdatoscalibracione->exists()) {
			throw new NotFoundException(__('Valor no existe'));
		}
		$this->set('valoresdatoscalibracione', $this->Valoresdatoscalibracione->read(array('lmo','lro','qcf','qcm','qcms')));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
		if ($this->request->is('post')) {
			$this->Valoresdatoscalibracione->create();
			if ($this->Valoresdatoscalibracione->save($this->request->data)) {
				$this->Session->setFlash(__('Ha sido Guardado con exito'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No pudo ser Guardado'));
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
            //echo $id.'<BR><BR>';
            
            
		$this->Valoresdatoscalibracione->id = $id;
                
		if (!$this->Valoresdatoscalibracione->exists()) {
			throw new NotFoundException(__('Valor no existe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Valoresdatoscalibracione->save($this->request->data)) {
				$this->Session->setFlash(__('Ha sido guardado con exito'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No pudo ser guardado'));
			}
		} else {
			$this->request->data = $this->Valoresdatoscalibracione->read(array('lmo','lro','qcf','qcm','qcms'));
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
		$this->Valoresdatoscalibracione->id = $id;
		if (!$this->Valoresdatoscalibracione->exists()) {
			throw new NotFoundException(__('Valor no existe'));
		}
		if ($this->Valoresdatoscalibracione->delete()) {
			$this->Session->setFlash(__('Valor borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Valor no pudo ser borrado'));
		$this->redirect(array('action' => 'index'));
	}
}
