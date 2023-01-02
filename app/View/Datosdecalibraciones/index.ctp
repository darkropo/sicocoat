<div class="datosdecalibraciones index">
	<h2><?php
        $this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');

        echo __('Datos de calibracion'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ciclos_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estaciones_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('temperatura'); ?></th>
			<th><?php echo $this->Paginator->sort('lmo'); ?></th>
			<th><?php echo $this->Paginator->sort('lro'); ?></th>
			<th><?php echo $this->Paginator->sort('qcf'); ?></th>
			<th><?php echo $this->Paginator->sort('qcm'); ?></th>
			<th><?php echo $this->Paginator->sort('qcms'); ?></th>
			<th><?php echo $this->Paginator->sort('responsables'); ?></th>
	</tr>
	<?php
	foreach ($datosdecalibraciones as $datosdecalibracione): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $datosdecalibracione['Datosdecalibracione']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $datosdecalibracione['Datosdecalibracione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $datosdecalibracione['Datosdecalibracione']['id']), null, __('Seguro desea Borrar # %s?', $datosdecalibracione['Datosdecalibracione']['id'])); ?>
		</td>
                <td><?php echo h($datosdecalibracione['Datosdecalibracione']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($datosdecalibracione['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $datosdecalibracione['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($datosdecalibracione['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $datosdecalibracione['Estacione']['id'])); ?>
		</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['temperatura']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['lmo']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['lro']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['qcf']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['qcm']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['qcms']); ?>&nbsp;</td>
		<td><?php echo h($datosdecalibracione['Datosdecalibracione']['responsables']); ?>&nbsp;</td>
		
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Datos de {:count} total')   
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
		<li><?php echo $this->Html->link(__('Buscar'), array('controller' => 'app','action' => 'buscar',1),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Agregar Dato'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estacion'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Regresion Lineal '), array('action' => 'graficadatoscal')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',1),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
