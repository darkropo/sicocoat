<div class="temporadas form">
<?php 
$this->Html->addCrumb('Temporada', '/temporadas');
$this->Html->addCrumb('Editar Temporada', '/temporadas/edit');
echo $this->Form->create('Temporada'); ?>
	<fieldset>
		<legend><?php echo __('Editar Temporada'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Temporada.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Temporada.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Temporadas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
	</ul>
</div>
