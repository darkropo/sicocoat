<div class="muestreosPts index">
	<h2><?php 
        $this->Html->addCrumb('Muestreos Pts', '/muestreospts');
        echo __('Muestreos Pts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
                        <th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ciclos_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estaciones_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Parametro'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_muestreo'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_montaje'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_montaje'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_recoleccion'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_recoleccion'); ?></th>
			<th><?php echo $this->Paginator->sort('temperatura'); ?></th>
			<th><?php echo $this->Paginator->sort('periodo_minutos'); ?></th>
			<th><?php echo $this->Paginator->sort('flujo_cr'); ?></th>
			<th><?php echo $this->Paginator->sort('qcm'); ?></th>
			<th><?php echo $this->Paginator->sort('volumen'); ?></th>
			<th><?php echo $this->Paginator->sort('temperatura_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('temperatura_fin'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_metro_cubico'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_elemento'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_metro_cubico_elemento'); ?></th>
			
	</tr>
	<?php
	foreach ($muestreosPts as $muestreosPt): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPt['MuestreosPt']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $muestreosPt['MuestreosPt']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPt['MuestreosPt']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPt['MuestreosPt']['id'])); ?>
		</td>
                <td><?php echo h($muestreosPt['MuestreosPt']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($muestreosPt['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPt['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($muestreosPt['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPt['Estacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($muestreosPt['Elemento']['nombre'], array('controller' => 'elementos', 'action' => 'view', $muestreosPt['Elemento']['id'])); ?>
		</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['numero_muestreo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['fecha_montaje']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['hora_montaje']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['fecha_recoleccion']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['hora_recoleccion']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['temperatura']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['periodo_minutos']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['flujo_cr']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['qcm']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['volumen']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['temperatura_inicio']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['temperatura_fin']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['microgramo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['microgramo_metro_cubico']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['microgramo_elemento']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPt['MuestreosPt']['microgramo_metro_cubico_elemento']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Pm10 de {:count} total')
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
		<li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',2),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Nuevo Pts'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Parametros'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Elemento'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
               <li><?php echo $this->Html->link(__('Graficar PTS'), array('action' => 'graficadatospts')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',2),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
