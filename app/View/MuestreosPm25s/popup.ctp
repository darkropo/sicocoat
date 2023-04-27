<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($datareglin);
//$xaxis = explode(",",$_GET['xaxis']);
//$yaxis = explode(",",$_GET['yaxis']);
//$r = $_GET['correl'];
//$slope = $_GET['slope'];
//$intercept = $_GET['intercept'];
//$ciclo = $_GET['ciclo'];
//$estacion = $_GET['estacion'];
//$fecha = $_GET['fecha'];
////echo $datareglin; 
////$this->set('datareglin',$datareglin);
//$sumxpory = 0;
//$sumxcuadrado = 0;
?>
<div class="grafica">
     <div id="procesamuestreo" style="height:400px;width:939px; "></div>
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
<!--Aqui va la data-->
<!--Aqui los datos-->

    