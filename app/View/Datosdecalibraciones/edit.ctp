<div class="datosdecalibraciones form">
<?php 
$this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');
$this->Html->addCrumb('Editar Dato', '/datosdecalibraciones/edit');
echo $this->Form->create('Datosdecalibracione'); ?>
	<fieldset>
		<legend><?php echo __('Editar Datos de calibracion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ciclos_id');
		echo $this->Form->input('estaciones_id');
		echo $this->Form->input('fecha', array('id' => 'fecha','type' => 'text'));
		echo $this->Form->input('temperatura');
		echo $this->Form->input('lmo', array('id' => 'lmo'));
		echo $this->Form->input('lro');
		echo $this->Form->input('qcf');
		echo $this->Form->input('qcm');
		echo $this->Form->input('qcms');
		echo $this->Form->input('responsables');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Buscar'), array('controller' => 'app','action' => 'buscar',1),array('class' => 'example4demo')); ?> </li>
                <li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Datosdecalibracione.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Datosdecalibracione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Datos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estacion'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',1),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
