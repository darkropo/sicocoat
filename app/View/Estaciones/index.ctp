<div class="estaciones index">
	<h2><?php 
        $this->Html->addCrumb('Estaciones', '/estaciones');
        
        echo __('Estaciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('proyecto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('ubicacion'); ?></th>
			<th><?php echo $this->Paginator->sort('coordenadas'); ?></th>
	</tr>
	<?php
	foreach ($estaciones as $estacione): ?>
	<tr>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $estacione['Estacione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $estacione['Estacione']['id']), null, __('Seguro deseas borrar # %s?', $estacione['Estacione']['nombre'])); ?>
		</td>
                <td><?php echo h($estacione['Estacione']['id']); ?>&nbsp;</td>
                <td>
			<?php echo $this->Html->link($estacione['Proyecto']['nombre'], array('controller' => 'proyectos', 'action' => 'view', $estacione['Proyecto']['id'])); ?>
		</td>
		<td><?php echo h($estacione['Estacione']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($estacione['Estacione']['ubicacion']); ?>&nbsp;</td>
		<td><?php echo h($estacione['Estacione']['coordenadas']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} Estaciones de {:count} total')
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
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Listar Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
