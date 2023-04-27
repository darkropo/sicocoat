<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    
        public function beforeFilter() {
            parent::beforeFilter();
            
          
                $this->Auth->allow('login','logout'); //Allow delete
               
            
           
        }
/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario ya Existe'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin'));
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario fue guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Usuario no pudo ser guardado. Por favor, Intenta de nuevo.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario ya Existe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario fue guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Usuario no pudo ser guardado. Por favor, Intenta de nuevo.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario ya Existe'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario Eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function login() {
           // $this->_isAuthorized(array('admin','invitado','usuario'));
                if ($this->request->is('post')) {
                    if ($this->Auth->login()) {
                        //$usuario = $this->User->find('list');
                        return $this->redirect($this->Auth->redirect());
                    }
                    $this->Session->setFlash(__('Nombre de Usuario o Contraseña Incorrectos, Prueba de nuevo.'));
                }
        }

        public function logout() {
            //$this->_isAuthorized(array('admin','invitado','usuario'));
            return $this->redirect($this->Auth->logout());
        }
        
}
