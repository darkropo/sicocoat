<?php
    if($year == ' '){
        $year = 'NULL';
    }
    if($ciclo == ' '){
        $ciclo = 'NULL';
    }
    if($estacion == ' '){
        $estacion = 'NULL';
    }
    if($elemento == ' '){
        $elemento = 'NULL';
    }
    
    //echo $ciclo.','.$estacion.','.$year.','.$elemento; 
    $muestreosPm10s = $this->requestAction(array('controller' => 'MuestreosPm10s', 'action' => 'listpm10',$ciclo,$estacion,$year,$elemento)); 
    //print_r($pts);
      
if($muestreosPm10s){        
?> 
<div class="muestreosPm10s index">
	<h2><?php echo __('Muestreos Pm10s'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
<!--			<th><?php //echo 'id'; ?></th>
			<th><?php //echo 'ciclos_id'; ?></th>
			<th><?php //echo 'estaciones_id'; ?></th>-->
			<th><?php echo 'Elemento'; ?></th>
			<th><?php echo 'Numero Muestreo'; ?></th>
			<th><?php echo 'Fecha Montaje'; ?></th>
			<th><?php echo 'Hora Montaje'; ?></th>
			<th><?php echo 'Fecha Recoleccion'; ?></th>
			<th><?php echo 'Hora Recoleccion'; ?></th>
			<th><?php echo 'Pulgadas Agua'; ?></th>
			<th><?php echo 'Pulgadas Hg'; ?></th>
			<th><?php echo 'P1=Po-P'; ?></th>
			<th><?php echo 'P1/Po'; ?></th>
			<th><?php echo 'Volumen'; ?></th>
			<th><?php echo 'Microgramo'; ?></th>
			<th><?php echo 'Microgramo Metro Cubico'; ?></th>
			<th><?php echo 'Microgramo Elemento'; ?></th>
			<th><?php echo 'Microgramo Metro Cubico Elemento'; ?></th>
<!--			<th class="actions"><?php //echo __('Opciones'); ?></th>-->
	</tr>
	<?php
	foreach ($muestreosPm10s as $muestreosPm10): ?>
	<tr>
<!--		<td><?php //echo h($muestreosPm10['MuestreosPm10']['id']); ?>&nbsp;</td>
		<td>
			<?php //echo $h($muestreosPm10['Ciclo']['nombre']); ?>
		</td>
		<td>
			<?php //echo $h($muestreosPm10['Estacione']['nombre']); ?>
		</td>-->
		<td>
			<?php echo h($muestreosPm10['Elemento']['nombre']); ?>
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
<!--		<td class="actions">
			<?php //echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPm10['MuestreosPm10']['id'])); ?>
			<?php //echo $this->Html->link(__('Editar'), array('action' => 'edit', $muestreosPm10['MuestreosPm10']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $muestreosPm10['MuestreosPm10']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPm10['MuestreosPm10']['id'])); ?>
		</td>-->
	</tr>
<?php endforeach; ?>
	</table>
</div>

<?php } ?>