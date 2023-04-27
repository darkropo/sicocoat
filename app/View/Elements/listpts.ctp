<?php
    if(empty($year)){
        $year = 'NULL';
    }
    if(empty($ciclo)){
        $ciclo = 'NULL';
    }
    if(empty($estacion)){
        $estacion = 'NULL';
    }
    if(empty($elemento)){
        $elemento = 'NULL';
    }
    //echo $ciclo.','.$estacion.','.$elemento.','.$year; 
    $muestreosPts = $this->requestAction(array('controller' => 'MuestreosPts', 'action' => 'listpts',$ciclo,$estacion,$elemento,$year)); 
    //print_r($muestreosPts);
if($muestreosPts){        
?> 
<div class="muestreosPts index" >
	<h2><?php echo __('Muestreos Pts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
<!--			<th><?php // echo 'id'; ?></th>
			<th><?php // echo 'ciclos_id'; ?></th>
			<th><?php // echo 'estaciones_id'; ?></th>-->
			<th><?php echo 'Elemento'; ?></th>
			<th><?php echo 'Numero Muestreo'; ?></th>
			<th><?php echo 'Fecha Montaje'; ?></th>
			<th><?php echo 'Hora Montaje'; ?></th>
			<th><?php echo 'Fecha Recoleccion'; ?></th>
			<th><?php echo 'Hora Recoleccion'; ?></th>
			<th><?php echo 'Temperatura'; ?></th>
			<th><?php echo 'Periodo Minutos'; ?></th>
			<th><?php echo 'Flujo Cr'; ?></th>
			<th><?php echo 'Qcm'; ?></th>
			<th><?php echo 'Volumen'; ?></th>
			<th><?php echo 'Temperatura Inicio'; ?></th>
			<th><?php echo 'Temperatura Fin'; ?></th>
			<th><?php echo 'Microgramo'; ?></th>
			<th><?php echo 'Microgramo Metro Cubico'; ?></th>
			<th><?php echo 'Microgramo Elemento'; ?></th>
			<th><?php echo 'Microgramo Metro Cubico Elemento'; ?></th>
<!--			<th class="actions"><?php // echo __('Opciones'); ?></th>-->
	</tr>
	<?php
	foreach ($muestreosPts as $muestreosPt): ?>
	<tr>
<!--		<td><?php echo h($muestreosPt['MuestreosPt']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($muestreosPt['Ciclo']['nombre']); ?>
		</td>
		<td>
			<?php echo h($muestreosPt['Estacione']['nombre']); ?>
		</td>-->
		<td>
			<?php echo h($muestreosPt['Elemento']['nombre']); ?>
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
<!--		<td class="actions">
			<?php // echo $this->Html->link(__('Ver'), array('action' => 'view', $muestreosPt['MuestreosPt']['id'])); ?>
			<?php // echo $this->Html->link(__('Editar'), array('action' => 'edit', $muestreosPt['MuestreosPt']['id'])); ?>
			<?php // echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPt['MuestreosPt']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPt['MuestreosPt']['id'])); ?>
		</td>-->
	</tr>
<?php endforeach; ?>
        </table>
</div>

<?php } ?>