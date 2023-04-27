<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<H2>Concentracion de Particulas y sus Especificos</h2>";
echo $this->Html->link("Muestreos Pm 10", '/muestreospm10s');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Muestreos Pm 2.5", '/muestreospm25s');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Muestreos Pts", '/muestreospts');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Datos de Calibracion", '/datosdecalibraciones');
echo "<H2>Graficas Particulares</h2>";
echo $this->Html->link("Graficar Promedios generales", '/app/graficapromedio');
echo "<H2>Tablas de Mantenimiento.</h2>";
echo $this->Html->link("Proyectos", '/proyectos');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Estaciones - Lugares", '/estaciones');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Estaciones - Temporada", '/temporadas');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Ciclos", '/ciclos');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Parametros", '/elementos');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Flujo Volumetrico", '/flujovolumetricos');
//echo "<BR>";
//echo "<BR>";
//echo $this->Html->link("Tabla Datos de calibraciones", '/valoresdatoscalibraciones');
echo "<BR>";
echo "<BR>";
echo $this->Html->link("Usuarios", '/users');

?>
