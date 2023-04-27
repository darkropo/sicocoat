<div class="elementos form">
<?php 
$this->Html->addCrumb('Parametros', '/elementos');
$this->Html->addCrumb('Agregar Parametro', '/elementos/add');
echo $this->Form->create('Elemento'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Parametro'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
            <li><?php echo $this->Html->link(__('Listar Parametros'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Listar Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('Listar Pts'), array('controller' => 'muestreos_pts', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Pts'), array('controller' => 'muestreos_pts', 'action' => 'add')); ?> </li>
	</ul>
</div>
