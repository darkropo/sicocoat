<div class="ciclohasestaciones form">
<?php echo $this->Form->create('Ciclohasestacione'); ?>
	<fieldset>
		<legend><?php echo __('Add Ciclohasestacione'); ?></legend>
	<?php
		echo $this->Form->input('ciclos_id');
		echo $this->Form->input('estaciones_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ciclohasestaciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estaciones'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
