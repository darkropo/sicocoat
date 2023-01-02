<?php if(!empty($datosdecalibraciones)){ //print_r($datosdecalibraciones); ?>
<div class="buscar">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Opciones'); ?></th>
                        <th><?php echo 'id'; ?></th>
<!--			<th><?php //echo 'ciclos_id'; ?></th>
			<th><?php// echo 'estaciones_id'; ?></th>-->
			<th><?php echo 'fecha'; ?></th>
			<th><?php echo 'temperatura'; ?></th>
			<th><?php echo 'lmo'; ?></th>
			<th><?php echo 'lro'; ?></th>
			<th><?php echo 'qcf'; ?></th>
			<th><?php echo 'qcm'; ?></th>
			<th><?php echo 'qcms'; ?></th>
			<th><?php echo 'responsables'; ?></th>
	</tr>
	<?php
	foreach ($datosdecalibraciones as $datosdecalibracione): ?>
	<tr>
		<td class="actions">
			<?php //echo $this->Html->link(__('Ver'), array('action' => 'view', $datosdecalibracione['Datosdecalibracione']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('controller' => 'Datosdecalibraciones','action' => 'edit', $datosdecalibracione['Datosdecalibracione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'Datosdecalibraciones','action' => 'delete', $datosdecalibracione['Datosdecalibracione']['id']), null, __('Are you sure you want to delete # %s?', $datosdecalibracione['Datosdecalibracione']['id'])); ?>
		</td>
                <td><?php echo h($datosdecalibracione['Datosdecalibracione']['id']); ?>&nbsp;</td>
<!--		<td>
			<?php //echo $this->Html->link($datosdecalibracione['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $datosdecalibracione['Ciclo']['id'])); ?>
		</td>
		<td>
			<?php //echo $this->Html->link($datosdecalibracione['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $datosdecalibracione['Estacione']['id'])); ?>
		</td>-->
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
	

	
</div>

<?php } //if principal?>