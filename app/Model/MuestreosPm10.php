<?php
App::uses('AppModel', 'Model');
/**
 * MuestreosPm10 Model
 *
 * @property Ciclos $Ciclos
 * @property Estaciones $Estaciones
 * @property Elemento $Elemento
 */
class MuestreosPm10 extends AppModel {

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
		'numero_muestreo' => array(
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
		'Ciclo' => array(
			'className' => 'Ciclo',
			'foreignKey' => 'ciclos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estacione' => array(
			'className' => 'Estacione',
			'foreignKey' => 'estaciones_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Elemento' => array(
			'className' => 'Elemento',
			'foreignKey' => 'elemento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
