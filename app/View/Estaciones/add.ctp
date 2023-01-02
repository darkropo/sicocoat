<div class="estaciones form">
<?php 
$this->Html->addCrumb('Estaciones', '/estaciones');
$this->Html->addCrumb('Agregar Estacion', '/estaciones/add');
echo $this->Form->create('Estacione'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Estaciones'); ?></legend>
	<?php
		echo $this->Form->input('proyecto_id');
                echo $this->Form->input('nombre');
		echo $this->Form->input('ubicacion');
		echo $this->Form->input('coordenadas');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Listar Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>