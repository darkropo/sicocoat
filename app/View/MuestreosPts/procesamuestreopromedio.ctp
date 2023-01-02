<?php
$this->Html->addCrumb('Muestreos Pts', '/muestreospts');
$this->Html->addCrumb('Grafica Promedios', '/muestreospts/graficapromedio');
$this->Html->addCrumb('Grafica');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * '[[[1, 2],[3,5.12],[5,13.1],[7,33.6],[9,85.9],[11,219.9]]]'
 */

//print_r($datareglin);

//echo $this->Html->link('Grafica', '/muestreospm10s/popup?grafpm10='.$grafpts.'&xaxis='.$xaxis
//                                    .'&yaxis='.$yaxis.'&correl='.$correl.'&slope='.$slope
//                                    .'&intercept='.$intercept.'&ciclo='.$ciclo.'&estacion='.$estacion
//                                    .'&fecha='.$fecha, array('class' => 'procesamuestreo'));
echo $this->Html->link('Grafica Promedio de Particulas', '/muestreospts/popuppromedio?grafpts='.$grafpts.'&estacion='.$estacion.'&elemento='.$elemento, 
                                          array('class' => 'procesamuestreopromedio'));

?>

