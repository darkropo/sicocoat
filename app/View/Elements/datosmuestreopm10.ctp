<?php if(!empty($muestreosPm10s)){ //print_r($muestreosPm10s); ?>
<div class="buscar" >
	<h2><?php echo __('Muestreos Pm10s'); ?></h2>
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
			<th><?php echo 'pulgadas_agua'; ?></th>
			<th><?php echo 'pulgadas_hg'; ?></th>
			<th><?php echo 'p1_po_p'; ?></th>
			<th><?php echo 'p1_po'; ?></th>
			<th><?php echo 'volumen'; ?></th>
			<th><?php echo 'microgramo'; ?></th>
			<th><?php echo 'microgramo_metro_cubico'; ?></th>
			<th><?php echo 'microgramo_elemento'; ?></th>
			<th><?php echo 'microgramo_metro_cubico_elemento'; ?></th>
                        <th><?php echo 'temperatura_inicial'; ?></th>
                        <th><?php echo 'temperatura_final'; ?></th>
                        
			
	</tr>
	<?php
	foreach ($muestreosPm10s as $muestreosPm10): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPm10['MuestreosPm10']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('controller' => 'MuestreosPm10s','action' => 'edit', $muestreosPm10['MuestreosPm10']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'MuestreosPm10s','action' => 'delete', $muestreosPm10['MuestreosPm10']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPm10['MuestreosPm10']['id'])); ?>
		</td>
                <td><?php echo h($muestreosPm10['MuestreosPm10']['id']); ?>&nbsp;</td>
<!--		<td>
			<?php ///echo $this->Html->link($muestreosPm10['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPm10['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php //echo $this->Html->link($muestreosPm10['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPm10['Estacione']['id'])); ?>
		</td>-->
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
	

	
</div>

<?php } //if principal?>
