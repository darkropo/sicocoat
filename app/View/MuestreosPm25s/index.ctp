
<div class="muestreosPm25s index">
	<h2><?php 
        $this->Html->addCrumb('Muestreos Pm 2.5', '/muestreospm25s');
        echo __('Muestreos Pm 2.5');  ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ciclos_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estaciones_id'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_muestreo'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_montaje'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_montaje'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_recoleccion'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_recoleccion'); ?></th>
			<th><?php echo $this->Paginator->sort('tiempo_total'); ?></th>
			<th><?php echo $this->Paginator->sort('flujo'); ?></th>
			<th><?php echo $this->Paginator->sort('volumen_final'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_metro_cubico'); ?></th>
                        <th><?php echo $this->Paginator->sort('temperatura'); ?></th>
			
	</tr>
	<?php
	foreach ($muestreosPm25s as $muestreosPm25): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPm25['MuestreosPm25']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $muestreosPm25['MuestreosPm25']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPm25['MuestreosPm25']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPm25['MuestreosPm25']['id'])); ?>
		</td>
                <td><?php echo h($muestreosPm25['MuestreosPm25']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($muestreosPm25['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPm25['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($muestreosPm25['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPm25['Estacione']['id'])); ?>
		</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['numero_muestreo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['fecha_montaje']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['hora_montaje']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['fecha_recoleccion']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['hora_recoleccion']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['tiempo_total']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['flujo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['volumen_final']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['microgramo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm25['MuestreosPm25']['microgramo_metro_cubico']); ?>&nbsp;</td>
                <td><?php echo h($muestreosPm25['MuestreosPm25']['temperatura']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Pm2.5 de {:count} total')
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
		<li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',4),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Nuevo Pm25'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar PM 2.5'), array('action' => 'graficadatospm25')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',4),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
