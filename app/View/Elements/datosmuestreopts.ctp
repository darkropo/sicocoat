<?php if(!empty($muestreosPts)){ //print_r($muestreosPts); ?>
<div class="buscar">
	
	<table cellpadding="0" cellspacing="0">
	<tr>
                        <th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo 'id'; ?></th>
<!--			<th><?php //echo 'ciclos_id'; ?></th>
			<th><?php //echo 'estaciones_id'; ?></th>-->
			<th><?php echo 'elemento_id'; ?></th>
			<th><?php echo 'numero_muestreo'; ?></th>
			<th><?php echo 'fecha_montaje'; ?></th>
			<th><?php echo 'hora_montaje'; ?></th>
			<th><?php echo 'fecha_recoleccion'; ?></th>
			<th><?php echo 'hora_recoleccion'; ?></th>
			<th><?php echo 'temperatura'; ?></th>
			<th><?php echo 'periodo_minutos'; ?></th>
			<th><?php echo 'flujo_cr'; ?></th>
			<th><?php echo 'qcm'; ?></th>
			<th><?php echo 'volumen'; ?></th>
			<th><?php echo 'temperatura_inicio'; ?></th>
			<th><?php echo 'temperatura_fin'; ?></th>
			<th><?php echo 'microgramo'; ?></th>
			<th><?php echo 'microgramo_metro_cubico'; ?></th>
			<th><?php echo 'microgramo_elemento'; ?></th>
			<th><?php echo 'microgramo_metro_cubico_elemento'; ?></th>
			
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
<!--		<td>
			<?php //echo $this->Html->link($muestreosPt['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPt['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php //echo $this->Html->link($muestreosPt['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPt['Estacione']['id'])); ?>
		</td>-->
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
	

	
</div>

<?php } //if principal?>
