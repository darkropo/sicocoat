<div class="temporadas index">
	<h2><?php 
        $this->Html->addCrumb('Temporada', '/temporadas');
        echo __('Temporadas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
	</tr>
	<?php
	foreach ($temporadas as $temporada): ?>
	<tr>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $temporada['Temporada']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $temporada['Temporada']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $temporada['Temporada']['id']), null, __('Seguro desea Borrar # %s?', $temporada['Temporada']['nombre'])); ?>
		</td>
                <td><?php echo h($temporada['Temporada']['id']); ?>&nbsp;</td>
		<td><?php echo h($temporada['Temporada']['nombre']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Temporadas de {:count} total')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Temporada'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
	</ul>
</div>
