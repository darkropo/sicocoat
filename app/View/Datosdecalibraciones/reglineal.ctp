<?php
$this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');
$this->Html->addCrumb('Graficar Reg Lineal', '/datosdecalibraciones/graficadatoscal');
$this->Html->addCrumb('Grafica');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * '[[[1, 2],[3,5.12],[5,13.1],[7,33.6],[9,85.9],[11,219.9]]]'
 */

//print_r($datareglin);

echo $this->Html->link('Grafica', '/datosdecalibraciones/popup?grafreglin='.$grafreglin.'&xaxis='.$xaxis
                                    .'&yaxis='.$yaxis.'&correl='.$correl.'&slope='.$slope
                                    .'&intercept='.$intercept.'&ciclo='.$ciclo.'&estacion='.$estacion
                                    .'&fecha='.$fecha.'&lro='.$lro.'&qcf='.$qcf.'&qcms='.$qcms, array('class' => 'reglineal'));

?>

