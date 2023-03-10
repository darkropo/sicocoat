<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('nombredeusuario'); ?></th>
			<th><?php echo $this->Paginator->sort('contrasena'); ?></th>
			<th><?php echo $this->Paginator->sort('cargo'); ?></th>
			<th><?php echo $this->Paginator->sort('gerencia'); ?></th>
			<th><?php echo $this->Paginator->sort('coordinacion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nombredeusuario']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['contrasena']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['cargo']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['gerencia']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['coordinacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
	</ul>
</div>
