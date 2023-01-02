<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {
    
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'LLene este campo'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'No olvide colocar una contraseña.'
            )
        ),
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'LLene este campo'
            )
        ),
        'apellido' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'LLene este campo'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'usuario','invitado')),
                'message' => 'Coloque un rol valido.',
                'allowEmpty' => false
            )
        )
    );
    
    
}
