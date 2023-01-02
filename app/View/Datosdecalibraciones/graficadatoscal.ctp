<div class="form">
<?php 
$this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');
$this->Html->addCrumb('Graficar Reg Lineal', '/datosdecalibraciones/graficadatoscal');
echo $this->Form->create('Datosdecalibracione')?>
	<fieldset>
		<legend><?php echo __('Graficar Regresion Lineal'); ?></legend>
	<?php
		echo $this->Form->input('proyectos_id', array('id' => 'proyecto','empty' => true));
                echo $this->Form->input('ciclos_id');
		echo $this->Form->input('estaciones_id'); 
                echo $this->Form->input('anio', array('label' => 'Año',
                                                      'type' => 'datetime',
                                                      'dateFormat' => 'Y',
                                                      'timeFormat' => null,  
                                                      'minYear' => date('Y') - 100,
                                                      'maxYear' => date('Y'))); 
                
                ?>

	</fieldset>
<?php
$options = array('label' => 'Procesar',
                 'type' => 'submit',
                 );
                echo $this->Form->end($options); 
//echo $this->Form->postutton('Procesar', array('type' => 'submit','class' => 'reglineal'));
                
//Script para el auto llenado del combo estaciones al cambiar el proyecto                
 $this->Js->get('#proyecto')->event('change', 
	$this->Js->request(array(
		'controller'=>'Datosdecalibraciones',
		'action'=>'getestaciones'
		), array(
		'update'=>'#DatosdecalibracioneEstacionesId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
 //Script para el auto llenado del combo estaciones al cambiar el proyecto   
?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Buscar'), array('controller' => 'app','action' => 'buscar',1),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Nuevo Dato'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Datos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
