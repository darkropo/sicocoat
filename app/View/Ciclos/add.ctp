<div class="ciclos form">
<?php 
$this->Html->addCrumb('Ciclo', '/ciclos');
$this->Html->addCrumb('Agregar Ciclo', '/ciclos/add');
echo $this->Form->create('Ciclo'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Ciclo'); ?></legend>
	<?php
		echo $this->Form->input('temporada_id');
		echo $this->Form->input('nombre');
		//echo $this->Form->input('fecha_inicio', array('id' => 'fecha_inicio','type' => 'text'));
               // echo $this->Form->input('fecha_fin', array('id' => 'fecha_fin','type' => 'text'));
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Temporadas'), array('controller' => 'temporadas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Temporada'), array('controller' => 'temporadas', 'action' => 'add')); ?> </li>
	</ul>
</div>
