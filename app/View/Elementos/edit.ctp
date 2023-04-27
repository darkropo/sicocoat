<div class="elementos form">
<?php 
$this->Html->addCrumb('Parametros', '/elementos');
$this->Html->addCrumb('Editar Parametro', '/elementos/edit');
echo $this->Form->create('Elemento'); ?>
	<fieldset>
		<legend><?php echo __('Editar Parametro'); ?></legend>
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

		<li><?php //echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Elemento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Elemento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Paramtetros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pts'), array('controller' => 'muestreos_pts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pt'), array('controller' => 'muestreos_pts', 'action' => 'add')); ?> </li>
	</ul>
</div>
