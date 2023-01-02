<?php
    $muestreosPm25s = $this->requestAction(array('controller' => 'MuestreosPm25s', 'action' => 'listpm25',$ciclo,$estacion,$year)); 
    //print_r($pts);
if($muestreosPm25s){        
?> 
<div class="muestreosPm25s index">
	<h2><?php echo __('Muestreos Pm 2.5'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
<!--			<th><?php //echo 'id'; ?></th>
			<th><?php //echo 'ciclos_id'; ?></th>
			<th><?php //echo 'estaciones_id'; ?></th>-->
			<th><?php echo 'Nnumero Muestreo'; ?></th>
			<th><?php echo 'Fecha Montaje'; ?></th>
			<th><?php echo 'Hora Montaje'; ?></th>
			<th><?php echo 'Fecha Recoleccion'; ?></th>
			<th><?php echo 'Hora Recoleccion'; ?></th>
			<th><?php echo 'Tiempo Total'; ?></th>
			<th><?php echo 'Flujo'; ?></th>
			<th><?php echo 'Volumen Final'; ?></th>
			<th><?php echo 'Microgramo'; ?></th>
			<th><?php echo 'Microgramo Metro Cubico'; ?></th>
                        <th><?php echo 'Temperatura'; ?></th>
			
	</tr>
	<?php
	foreach ($muestreosPm25s as $muestreosPm25): ?>
	<tr>
<!--		<td><?php //echo h($muestreosPm25['MuestreosPm25']['id']); ?>&nbsp;</td>
		<td>
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


<?php } ?>
