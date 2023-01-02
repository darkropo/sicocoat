<div class="muestreosPm10s index">
	<h2><?php
        $this->Html->addCrumb('Muestreos Pm10', '/muestreospm10s');
        echo __('Muestreos Pm10s'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ciclos'); ?></th>
			<th><?php echo $this->Paginator->sort('estaciones'); ?></th>
			<th><?php echo $this->Paginator->sort('Parametro'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_muestreo'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_montaje'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_montaje'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_recoleccion'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_recoleccion'); ?></th>
			<th><?php echo $this->Paginator->sort('pulgadas_agua'); ?></th>
			<th><?php echo $this->Paginator->sort('pulgadas_hg'); ?></th>
			<th><?php echo $this->Paginator->sort('p1_po_p'); ?></th>
			<th><?php echo $this->Paginator->sort('p1_po'); ?></th>
			<th><?php echo $this->Paginator->sort('volumen'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_metro_cubico'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_elemento'); ?></th>
			<th><?php echo $this->Paginator->sort('microgramo_metro_cubico_elemento'); ?></th>
                        <th><?php echo $this->Paginator->sort('temperatura_inicial'); ?></th>
                        <th><?php echo $this->Paginator->sort('temperatura_final'); ?></th>
                        
			
	</tr>
	<?php
	foreach ($muestreosPm10s as $muestreosPm10): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPm10['MuestreosPm10']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $muestreosPm10['MuestreosPm10']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPm10['MuestreosPm10']['id']), null, __('Seguro deseas Borrar # %s?', $muestreosPm10['MuestreosPm10']['id'])); ?>
		</td>
                <td><?php echo h($muestreosPm10['MuestreosPm10']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($muestreosPm10['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPm10['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($muestreosPm10['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPm10['Estacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($muestreosPm10['Elemento']['nombre'], array('controller' => 'elementos', 'action' => 'view', $muestreosPm10['Elemento']['id'])); ?>
		</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['numero_muestreo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['fecha_montaje']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['hora_montaje']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['fecha_recoleccion']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['hora_recoleccion']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['pulgadas_agua']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['pulgadas_hg']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['p1_po_p']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['p1_po']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['volumen']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['microgramo']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['microgramo_metro_cubico']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['microgramo_elemento']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['microgramo_metro_cubico_elemento']); ?>&nbsp;</td>
		<td><?php echo h($muestreosPm10['MuestreosPm10']['temperatura_inicial']); ?>&nbsp;</td>
                <td><?php echo h($muestreosPm10['MuestreosPm10']['temperatura_final']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',3),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Nuevo Pm10'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Elementos'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Elemento'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                 <li><?php echo $this->Html->link(__('Graficar PM10'), array('action' => 'graficadatospm10')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',3),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
