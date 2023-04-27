<div class="valoresdatoscalibraciones form">
<?php 
$this->Html->addCrumb('Tabla Datos de Calibracion');
$this->Html->addCrumb('Editar');
echo $this->Form->create('Valoresdatoscalibracione'); ?>
	<fieldset>
		<legend><?php echo __('Editar Valor'); ?></legend>
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

		<!--<li><?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Valoresdatoscalibracione.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Valoresdatoscalibracione.id'))); ?></li>-->
		<li><?php echo $this->Html->link(__('Listar Valores'), array('action' => 'index')); ?></li>
	</ul>
</div>
