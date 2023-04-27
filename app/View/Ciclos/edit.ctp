<div class="ciclos form">
<?php 
$this->Html->addCrumb('Ciclo', '/ciclos');
$this->Html->addCrumb('Editar Ciclo', '/ciclos/edit');
echo $this->Form->create('Ciclo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Ciclo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('temporada_id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Ciclo.id')), null, __('Seguro desea Borrar # %s?', $this->Form->value('Ciclo.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Temporadas'), array('controller' => 'temporadas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Temporada'), array('controller' => 'temporadas', 'action' => 'add')); ?> </li>
	</ul>
</div>
