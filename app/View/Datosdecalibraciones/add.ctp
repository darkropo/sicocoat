<div class="datosdecalibraciones form">
<?php 
$this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');
$this->Html->addCrumb('Agregar Dato', '/datosdecalibraciones/add');
echo $this->Form->create('Datosdecalibracione')?>
	<fieldset>
		<legend><?php echo __('Agregar Dato de calibracion'); ?></legend>
	<?php
		echo $this->Form->input('proyectos_id', array('id' => 'proyecto','empty' => true));
                echo $this->Form->input('ciclos_id');
		echo $this->Form->input('estaciones_id');
		echo $this->Form->input('fecha', array('id' => 'fecha','type' => 'text'));
		echo $this->Form->input('temperatura');
		echo $this->Form->input('lmo', array('id' => 'lmo'));
		echo $this->Form->input('lro', array('readonly' => 'readonly'));
		echo $this->Form->input('qcf', array('readonly' => 'readonly'));
		echo $this->Form->input('qcm', array('readonly' => 'readonly'));
		echo $this->Form->input('qcms', array('readonly' => 'readonly'));
		echo $this->Form->input('responsables');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); 
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
		<li><?php echo $this->Html->link(__('Listar Datos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Regresion Lineal '), array('action' => 'graficadatoscal')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',1),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
