<div class="proyectos form">
<?php 
$this->Html->addCrumb('Proyecto', '/proyectos');
$this->Html->addCrumb('Agregar Proyecto', '/proyectos/add');
echo $this->Form->create('Proyecto'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Proyecto'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Proyectos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
