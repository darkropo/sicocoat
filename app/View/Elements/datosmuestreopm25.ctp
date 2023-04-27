<?php if(!empty($muestreosPm25s)){ //print_r($muestreosPm10s); ?>
<div class="buscar">
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo 'id'; ?></th>
<!--			<th><?php //echo 'ciclos_id'; ?></th>
			<th><?php //echo 'estaciones_id'; ?></th>-->
			<th><?php echo 'numero_muestreo'; ?></th>
			<th><?php echo 'fecha_montaje'; ?></th>
			<th><?php echo 'hora_montaje'; ?></th>
			<th><?php echo 'fecha_recoleccion'; ?></th>
			<th><?php echo 'hora_recoleccion'; ?></th>
			<th><?php echo 'tiempo_total'; ?></th>
			<th><?php echo 'flujo'; ?></th>
			<th><?php echo 'volumen_final'; ?></th>
			<th><?php echo 'microgramo'; ?></th>
			<th><?php echo 'microgramo_metro_cubico'; ?></th>
                        <th><?php echo 'temperatura'; ?></th>
			
	</tr>
	<?php
	foreach ($muestreosPm25s as $muestreosPm25): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPm25['MuestreosPm25']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('controller' => 'MuestreosPm25s','action' => 'edit', $muestreosPm25['MuestreosPm25']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'MuestreosPm25s','action' => 'delete', $muestreosPm25['MuestreosPm25']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPm25['MuestreosPm25']['id'])); ?>
		</td>
                <td><?php echo h($muestreosPm25['MuestreosPm25']['id']); ?>&nbsp;</td>
<!--		<td>
			<?php //echo $this->Html->link($muestreosPm25['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPm25['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php //echo $this->Html->link($muestreosPm25['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPm25['Estacione']['id'])); ?>
		</td>-->
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
	
</div>

<?php } //if principal?>
