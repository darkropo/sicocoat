<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($datareglin);
$xaxis = explode(",",$_GET['xaxis']);
$yaxis = explode(",",$_GET['yaxis']);
$r = $_GET['correl'];
$slope = $_GET['slope'];
$intercept = $_GET['intercept'];
$ciclo = $_GET['ciclo'];
$estacion = $_GET['estacion'];
$fecha = $_GET['fecha'];
$lro =  explode(",",$_GET['lro']);
$qcf =  explode(",",$_GET['qcf']);
$qcms =  explode(",",$_GET['qcms']);
//echo $datareglin; 
//$this->set('datareglin',$datareglin);
$sumxpory = 0;
$sumxcuadrado = 0;
$this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');
$this->Html->addCrumb('Graficar Reg Lineal', '/datosdecalibraciones/graficadatoscal');
$this->Html->addCrumb('Grafica');
$this->Html->addCrumb('Regresion Lineal');

//
?>

<div class="grafica">
     <div id="reglineal" style="height:300px;width:400px; " ></div>
     
</div>
<div class ="datoscalibracion">

            <h2><?php echo __('Datos de calibracion'); ?></h2>
            <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo 'LMO'; ?></th>
                <th><?php echo 'LRO'; ?></th>
                <th><?php echo 'QCF'; ?></th>
                <th><?php echo 'QCM'; ?></th>
                <th><?php echo 'QCMS'; ?></th>
            </tr>
            <?php  for($i = 0; $i < 5 ; $i++){  ?>
            <tr>
                    <td><?php echo h($xaxis[$i]); ?>&nbsp;</td>
                    <td><?php echo h($lro[$i]); ?>&nbsp;</td>
                    <td><?php echo h($qcf[$i]); ?>&nbsp;</td>
                    <td><?php echo h($yaxis[$i]); ?>&nbsp;</td>
                    <td><?php echo h($qcms[$i]); ?>&nbsp;</td>

            </tr>
    <?php   } ?>
            </table>
    </div>
    <div class ="datos">

            <h2><?php echo __('Data'); ?></h2>
            <h3><?php echo $estacion.' '.$ciclo.' '.$fecha; ?></h3>
            <table cellpadding="0" cellspacing="0">
            <tr>
                <th></th>
                <th><?php echo 'x = LMO'; ?></th>
                <th><?php echo 'y = QCM'; ?></th>
                <th><?php echo 'x*y'; ?></th>
                <th><?php echo 'x^2'; ?></th>
            </tr>
            <?php
            foreach ($xaxis as $index => $x): 
            $sumxcuadrado = $sumxcuadrado +  pow($x, 2);
            $sumxpory = $sumxpory + ($x*$yaxis[$index]);        ?>
            <tr>
                    <td>&nbsp;</td>
                    <td><?php echo h($x); ?>&nbsp;</td>
                    <td><?php echo h($yaxis[$index]); ?>&nbsp;</td>
                    <td><?php echo h(round($x*$yaxis[$index],2,PHP_ROUND_HALF_DOWN)); ?>&nbsp;</td>
                    <td><?php echo h(round(pow($x, 2),2,PHP_ROUND_HALF_DOWN)); ?>&nbsp;</td>

            </tr>
    <?php endforeach; ?>
            <tr>
                <td><b>Sumatoria</b></td>
                <td><b><?php echo h(array_sum($xaxis)); ?></b>&nbsp;</td>
                <td><b><?php echo h(array_sum($yaxis)); ?></b>&nbsp;</td>
                <td><b><?php echo h($sumxpory); ?></b>&nbsp;</td>
                <td><b><?php echo h($sumxcuadrado); ?></b>&nbsp;</td>
            </tr>
            </table>
    </div>
    
<div class ="resultados">
    <h2><?php echo __('Valores Ecuacion y = mx+b' ); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'r'; ?></th>
			<th><?php echo 'R2'; ?></th>
			<th><?php echo 'm'; ?></th>
			<th><?php echo 'b'; ?></th>
        </tr>
        <tr>
		<td><?php echo h($r); ?>&nbsp;</td>
                <td><?php echo h(pow($r, 2)); ?>&nbsp;</td>
		<td><?php echo h($slope); ?>&nbsp;</td>
                <td><?php echo h($intercept); ?>&nbsp;</td>		
	</tr>
	</table>
</div>
<div class="imprimir"><?php echo $this->Html->image('impresora.png',array('alt' => 'Imprimir','id' => 'print')); ?></div>
 
 
 <?php 
  echo $this->Html->scriptBlock("$(document).ready(function() {
                                         $('img#print').click(function() {
                                                   window.print();
                                                   return false;
                                         });
                                 });  ");
 ?>    