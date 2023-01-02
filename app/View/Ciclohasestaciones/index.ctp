<div class="ciclohasestaciones index">
	<h2><?php echo __('Ciclohasestaciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ciclos_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estaciones_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($ciclohasestaciones as $ciclohasestacione): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($ciclohasestacione['Ciclos']['id'], array('controller' => 'ciclos', 'action' => 'view', $ciclohasestacione['Ciclos']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ciclohasestacione['Estaciones']['id'], array('controller' => 'estaciones', 'action' => 'view', $ciclohasestacione['Estaciones']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ciclohasestacione['Ciclohasestacione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ciclohasestacione['Ciclohasestacione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ciclohasestacione['Ciclohasestacione']['id']), null, __('Are you sure you want to delete # %s?', $ciclohasestacione['Ciclohasestacione']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ciclohasestacione'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estaciones'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
