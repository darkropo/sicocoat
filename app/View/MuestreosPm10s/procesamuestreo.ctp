<?php
$this->Html->addCrumb('Muestreos Pm10', '/muestreospm10s');
$this->Html->addCrumb('Grafica Parametro', '/muestreospm10s/graficadatospm10');
$this->Html->addCrumb('Grafica');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * '[[[1, 2],[3,5.12],[5,13.1],[7,33.6],[9,85.9],[11,219.9]]]'
 */

//print_r($datareglin);

//echo $this->Html->link('Grafica', '/muestreospm10s/popup?grafpm10='.$grafpm10.'&xaxis='.$xaxis
//                                    .'&yaxis='.$yaxis.'&correl='.$correl.'&slope='.$slope
//                                    .'&intercept='.$intercept.'&ciclo='.$ciclo.'&estacion='.$estacion
//                                    .'&fecha='.$fecha, array('class' => 'procesamuestreo'));
echo $this->Html->link('Grafica PM10', '/muestreospm10s/popup?grafpm10='.$grafpm10.'&estacion='.$estacion.'&elemento='.$elemento, 
                                          array('class' => 'procesamuestreo'));

?>

