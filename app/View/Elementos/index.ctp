<div class="elementos index">
	<h2><?php 
        $this->Html->addCrumb('Parametros', '/elementos');
        
        echo __('Parametros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
	</tr>
	<?php
	foreach ($elementos as $elemento): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $elemento['Elemento']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $elemento['Elemento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $elemento['Elemento']['id']), null, __('Seguro desea Borrar # %s?', $elemento['Elemento']['nombre'])); ?>
		</td>
                <td><?php echo h($elemento['Elemento']['id']); ?>&nbsp;</td>
		<td><?php echo h($elemento['Elemento']['nombre']); ?>&nbsp;</td>
		
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Parametros de {:count} total')
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
		<li><?php echo $this->Html->link(__('Nuevo Parametro'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pts'), array('controller' => 'muestreos_pts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pts'), array('controller' => 'muestreos_pts', 'action' => 'add')); ?> </li>
	</ul>
</div>
