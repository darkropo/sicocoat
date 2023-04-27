<div class="proyectos form">
<?php 
$this->Html->addCrumb('Proyecto', '/proyectos');
$this->Html->addCrumb('Editar Proyecto', '/proyectos/edit');
echo $this->Form->create('Proyecto'); ?>
	<fieldset>
		<legend><?php echo __('Editar Proyecto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Proyecto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Proyecto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Proyectos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
