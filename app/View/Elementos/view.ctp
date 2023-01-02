<div class="elementos view">
<h2><?php  
$this->Html->addCrumb('Parametros', '/elementos');
$this->Html->addCrumb('Ver Parametro', '/elementos/view');
echo __('Parametros'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($elemento['Elemento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($elemento['Elemento']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Parametro'), array('action' => 'edit', $elemento['Elemento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $elemento['Elemento']['id']), null, __('Are you sure you want to delete # %s?', $elemento['Elemento']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Parametros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Parametro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pts'), array('controller' => 'muestreos_pts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pts'), array('controller' => 'muestreos_pts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Muestreos Pm10 Relacionados'); ?></h3>
	<?php if (!empty($elemento['MuestreosPm10'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th class="actions"><?php echo __('Opciones'); ?></th>
<!--                <th><?php //echo __('Id'); ?></th>-->
		<th><?php echo __('Ciclo'); ?></th>
		<th><?php echo __('Estacion'); ?></th>
		<th><?php echo __('Parametro'); ?></th>
		<th><?php echo __('Numero Muestreo'); ?></th>
		<th><?php echo __('Fecha Montaje'); ?></th>
		<th><?php echo __('Hora Montaje'); ?></th>
		<th><?php echo __('Fecha Recoleccion'); ?></th>
		<th><?php echo __('Hora Recoleccion'); ?></th>
		<th><?php echo __('Pulgadas Agua'); ?></th>
		<th><?php echo __('Pulgadas Hg'); ?></th>
		<th><?php echo __('P1 Po P'); ?></th>
		<th><?php echo __('P1 Po'); ?></th>
		<th><?php echo __('Volumen'); ?></th>
		<th><?php echo __('Microgramo'); ?></th>
		<th><?php echo __('Microgramo Metro Cubico'); ?></th>
		<th><?php echo __('Microgramo Elemento'); ?></th>
		<th><?php echo __('Microgramo Metro Cubico Elemento'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($elemento['MuestreosPm10'] as $muestreosPm10): ?>
		<tr>
			
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'muestreos_pm10s', 'action' => 'view', $muestreosPm10['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'muestreos_pm10s', 'action' => 'edit', $muestreosPm10['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'muestreos_pm10s', 'action' => 'delete', $muestreosPm10['id']), null, __('Are you sure you want to delete # %s?', $muestreosPm10['id'])); ?>
			</td>
<!--                        <td><?php //echo $muestreosPm10['id']; ?></td>-->
			<td><?php echo $muestreosPm10['ciclos_id']; ?></td>
			<td><?php echo $muestreosPm10['estaciones_id']; ?></td>
			<td><?php echo $muestreosPm10['elemento_id']; ?></td>
			<td><?php echo $muestreosPm10['numero_muestreo']; ?></td>
			<td><?php echo $muestreosPm10['fecha_montaje']; ?></td>
			<td><?php echo $muestreosPm10['hora_montaje']; ?></td>
			<td><?php echo $muestreosPm10['fecha_recoleccion']; ?></td>
			<td><?php echo $muestreosPm10['hora_recoleccion']; ?></td>
			<td><?php echo $muestreosPm10['pulgadas_agua']; ?></td>
			<td><?php echo $muestreosPm10['pulgadas_hg']; ?></td>
			<td><?php echo $muestreosPm10['p1_po_p']; ?></td>
			<td><?php echo $muestreosPm10['p1_po']; ?></td>
			<td><?php echo $muestreosPm10['volumen']; ?></td>
			<td><?php echo $muestreosPm10['microgramo']; ?></td>
			<td><?php echo $muestreosPm10['microgramo_metro_cubico']; ?></td>
			<td><?php echo $muestreosPm10['microgramo_elemento']; ?></td>
			<td><?php echo $muestreosPm10['microgramo_metro_cubico_elemento']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Pm10'), array('controller' => 'muestreos_pm10s', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Muestreos Pts Relacionados'); ?></h3>
	<?php if (!empty($elemento['MuestreosPt'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
                
		<th class="actions"><?php echo __('Opciones'); ?></th>
<!--		<th><?php //echo __('Id'); ?></th>-->
		<th><?php echo __('Ciclo'); ?></th>
		<th><?php echo __('Estacion'); ?></th>
		<th><?php echo __('Parametro'); ?></th>
		<th><?php echo __('Numero Muestreo'); ?></th>
		<th><?php echo __('Fecha Montaje'); ?></th>
		<th><?php echo __('Hora Montaje'); ?></th>
		<th><?php echo __('Fecha Recoleccion'); ?></th>
		<th><?php echo __('Hora Recoleccion'); ?></th>
		<th><?php echo __('Temperatura'); ?></th>
		<th><?php echo __('Periodo Minutos'); ?></th>
		<th><?php echo __('Flujo Cr'); ?></th>
		<th><?php echo __('Qcm'); ?></th>
		<th><?php echo __('Volumen'); ?></th>
		<th><?php echo __('Temperatura Inicio'); ?></th>
		<th><?php echo __('Temperatura Fin'); ?></th>
		<th><?php echo __('Microgramo'); ?></th>
		<th><?php echo __('Microgramo Metro Cubico'); ?></th>
		<th><?php echo __('Microgramo Elemento'); ?></th>
		<th><?php echo __('Microgramo Metro Cubico Elemento'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($elemento['MuestreosPt'] as $muestreosPt): ?>
		<tr>
                        
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'muestreos_pts', 'action' => 'view', $muestreosPt['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'muestreos_pts', 'action' => 'edit', $muestreosPt['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'muestreos_pts', 'action' => 'delete', $muestreosPt['id']), null, __('Are you sure you want to delete # %s?', $muestreosPt['id'])); ?>
			</td>
<!--			<td><?php //echo $muestreosPt['id']; ?></td>-->
			<td><?php echo $muestreosPt['ciclos_id']; ?></td>
			<td><?php echo $muestreosPt['estaciones_id']; ?></td>
			<td><?php echo $muestreosPt['elemento_id']; ?></td>
			<td><?php echo $muestreosPt['numero_muestreo']; ?></td>
			<td><?php echo $muestreosPt['fecha_montaje']; ?></td>
			<td><?php echo $muestreosPt['hora_montaje']; ?></td>
			<td><?php echo $muestreosPt['fecha_recoleccion']; ?></td>
			<td><?php echo $muestreosPt['hora_recoleccion']; ?></td>
			<td><?php echo $muestreosPt['temperatura']; ?></td>
			<td><?php echo $muestreosPt['periodo_minutos']; ?></td>
			<td><?php echo $muestreosPt['flujo_cr']; ?></td>
			<td><?php echo $muestreosPt['qcm']; ?></td>
			<td><?php echo $muestreosPt['volumen']; ?></td>
			<td><?php echo $muestreosPt['temperatura_inicio']; ?></td>
			<td><?php echo $muestreosPt['temperatura_fin']; ?></td>
			<td><?php echo $muestreosPt['microgramo']; ?></td>
			<td><?php echo $muestreosPt['microgramo_metro_cubico']; ?></td>
			<td><?php echo $muestreosPt['microgramo_elemento']; ?></td>
			<td><?php echo $muestreosPt['microgramo_metro_cubico_elemento']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Pts'), array('controller' => 'muestreos_pts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
