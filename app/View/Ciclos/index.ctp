 

<div class="ciclos index">
	<h2><?php 
        $this->Html->addCrumb('Ciclo', '/ciclos');

        echo __('Ciclos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('temporada_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>

	</tr>
	<?php
	foreach ($ciclos as $ciclo): ?>
	<tr>
		

		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ciclo['Ciclo']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ciclo['Ciclo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $ciclo['Ciclo']['id']), null, __('Seguro desea Borrar # %s?', $ciclo['Ciclo']['nombre'])); ?>
		</td>
                <td><?php echo h($ciclo['Ciclo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ciclo['Temporada']['nombre'], array('controller' => 'temporadas', 'action' => 'view', $ciclo['Temporada']['id'])); ?>
		</td>
		<td><?php echo h($ciclo['Ciclo']['nombre']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Ciclos de {:count} total')
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
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Temporadas'), array('controller' => 'temporadas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Temporada'), array('controller' => 'temporadas', 'action' => 'add')); ?> </li>
	</ul>
</div>
