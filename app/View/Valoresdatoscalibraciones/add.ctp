<div class="valoresdatoscalibraciones form">
<?php 
$this->Html->addCrumb('Tabla Datos de Calibracion');
$this->Html->addCrumb('Agregar');
echo $this->Form->create('Valoresdatoscalibracione'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Valor dato de calibracion'); ?></legend>
	<?php
		echo $this->Form->input('lmo');
		echo $this->Form->input('lro');
		echo $this->Form->input('qcf');
		echo $this->Form->input('qcm');
		echo $this->Form->input('qcms');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Valores'), array('action' => 'index')); ?></li>
	</ul>
</div>
