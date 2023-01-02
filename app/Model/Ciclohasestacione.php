<?php
App::uses('AppModel', 'Model');
/**
 * Ciclohasestacione Model
 *
 * @property Ciclos $Ciclos
 * @property Estaciones $Estaciones
 */
class Ciclohasestacione extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ciclos_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estaciones_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ciclos' => array(
			'className' => 'Ciclos',
			'foreignKey' => 'ciclos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estaciones' => array(
			'className' => 'Estaciones',
			'foreignKey' => 'estaciones_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
