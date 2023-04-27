<div class="ciclohasestaciones view">
<h2><?php  echo __('Ciclohasestacione'); ?></h2>
	<dl>
		<dt><?php echo __('Ciclos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ciclohasestacione['Ciclos']['id'], array('controller' => 'ciclos', 'action' => 'view', $ciclohasestacione['Ciclos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estaciones'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ciclohasestacione['Estaciones']['id'], array('controller' => 'estaciones', 'action' => 'view', $ciclohasestacione['Estaciones']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ciclohasestacione'), array('action' => 'edit', $ciclohasestacione['Ciclohasestacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ciclohasestacione'), array('action' => 'delete', $ciclohasestacione['Ciclohasestacione']['id']), null, __('Are you sure you want to delete # %s?', $ciclohasestacione['Ciclohasestacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciclohasestaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciclohasestacione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estaciones'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
