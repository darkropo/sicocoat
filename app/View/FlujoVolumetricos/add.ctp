<div class="flujoVolumetricos form">
<?php 
$this->Html->addCrumb('Flujo Volumetrico');
$this->Html->addCrumb('Agregar');
echo $this->Form->create('FlujoVolumetrico'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Flujo Volumetrico'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('Listar Flujos'), array('action' => 'index')); ?></li>
	</ul>
</div>
