<div class="flujoVolumetricos index">
	<h2><?php 
        $this->Html->addCrumb('Flujo Volumetrico');
        
        echo __('Flujo Volumetricos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('p1_po'); ?></th>
			<th><?php echo $this->Paginator->sort('temperatura'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			
	</tr>
	<?php
	foreach ($flujoVolumetricos as $flujoVolumetrico): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $flujoVolumetrico['FlujoVolumetrico']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $flujoVolumetrico['FlujoVolumetrico']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $flujoVolumetrico['FlujoVolumetrico']['id']), null, __('Seguro deseas borrar # %s?', $flujoVolumetrico['FlujoVolumetrico']['id'])); ?>
		</td>
                <td><?php echo h($flujoVolumetrico['FlujoVolumetrico']['id']); ?>&nbsp;</td>
		<td><?php echo h($flujoVolumetrico['FlujoVolumetrico']['p1_po']); ?>&nbsp;</td>
		<td><?php echo h($flujoVolumetrico['FlujoVolumetrico']['temperaturac']); ?>&nbsp;</td>
		<td><?php echo h($flujoVolumetrico['FlujoVolumetrico']['valorc']); ?>&nbsp;</td>
		
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Valores de {:count} total')
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
		<li><?php echo $this->Html->link(__('Nuevo Flujo'), array('action' => 'add')); ?></li>
	</ul>
</div>
