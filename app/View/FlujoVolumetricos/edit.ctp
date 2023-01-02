<div class="flujoVolumetricos form">
<?php 
$this->Html->addCrumb('Flujo Volumetrico');
$this->Html->addCrumb('Editar');
echo $this->Form->create('FlujoVolumetrico'); ?>
	<fieldset>
		<legend><?php echo __('Editar Flujo Volumetrico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('p1_po');
		echo $this->Form->input('temperaturac');
		echo $this->Form->input('valorc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<!--<li><?php //echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('FlujoVolumetrico.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FlujoVolumetrico.id'))); ?></li>-->
		<li><?php echo $this->Html->link(__('Listar Flujos'), array('action' => 'index')); ?></li>
	</ul>
</div>
