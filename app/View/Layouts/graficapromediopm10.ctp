<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('localhost','SICOCOAT');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="language" content="es" /> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('cake.generic.graph');
                echo $this->Html->css('csspropios');
                echo $this->Html->css('style');
                echo $this->Html->css('jquery.jqplot');
                //Javascript
                echo $this->Html->script('jquery-1.9.1');
                echo $this->Html->script('jquery-migrate-1.1.1');
                echo $this->Html->script('jquery.popupWindow'); 
                echo $this->Html->script('jquery.jqplot'); 
                //echo $this->Html->script('jqplot.cursor.min'); 
                echo $this->Html->script('jqplot.barRenderer'); 
                echo $this->Html->script('jqplot.categoryAxisRenderer');
                echo $this->Html->script('jqplot.pointLabels');
                
                
                //popup windowecho 
                
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                
	?>
</head>
<body>
	<div class="wrapper">
            <div class="left-gap1">
                <?php echo $this->Html->image('spacer.gif', array('alt' => '#', 'border' => 0,'width' => '6', 'height' => '1' )); ?>
            </div>
            <div class="main">

                <?php echo $this->element('cabecera'); ?>

                <div class="mid">
<!--                    <div class="mid-left">
                        <h3>
                        <ul class="left-item">
                        <h3>Resources</h3>
                        <ul class="left-item">
                    </div>-->
                    <div class="content">

                            <?php echo $this->Session->flash(); ?>
                                
                            <?php echo $this->fetch('content');
                             ?>
                    </div>
                </div>
                       
		<?php echo $this->element('pie'); ?>
                
            </div> 
            <div class="right-gap1">
                       <?php echo $this->Html->image('spacer.gif', array('alt' => '#', 'border' => 0,'width' => '6', 'height' => '1' )); ?>
            </div>
	</div>
	
</body>
    <?php 
                        echo $this->Html->scriptBlock("$('.procesamuestreopromedio').popupWindow({ 
                                                windowName:'Grafico PTS Promedio',
                                                height:800, 
                                                width:975, 
                                                });");
                        
                        echo $this->Html->scriptBlock(" 
                                        //var estaciontemp = '".$_GET['estacion']."';    
                                        //var estacion = estaciontemp.split(',');");
                                            
                        
                       echo $this->Html->scriptBlock("
                                            $(document).ready(function(){
                                            
                                                //var ticks = ['May', 'June', 'July', 'August'];
                                                 var ticks = ".$_GET['estacion'].";
                                                var plot1 = $.jqplot('procesamuestreopromedio', [".$_GET['grafpts']."], {
                                                    title:'Grafica Promedio PM 10',
                                                    // The 'seriesDefaults' option is an options object that will
                                                    // be applied to all series in the chart.
                                                    seriesDefaults:{
                                                        renderer:$.jqplot.BarRenderer,
                                                         pointLabels: { show: true, stackedValue: true,  edgeTolerance: -15 },
                                                        rendererOptions: {fillToZero: true,},
                                                        barMargin: 30,
                                                    },
                                                    // Custom labels for the series are specified with the 'label'
                                                    // option on the series option.  Here a series option object
                                                    // is specified for each series.
                                                    series:[".$_GET['elemento']."
                                                    ],
                                                    // Show the legend and put it outside the grid, but inside the
                                                    // plot container, shrinking the grid to accomodate the legend.
                                                    // A value of 'outside' would not shrink the grid and allow
                                                    // the legend to overflow the container.
                                                    legend: {
                                                        show: true,
                                                        placement: 'outsideGrid'
                                                    },
                                                    axes: {
                                                        // Use a category axis on the x axis and use our custom ticks.
                                                        xaxis: {
                                                            renderer: $.jqplot.CategoryAxisRenderer,
                                                            label: 'Estaciones',
                                                            ticks: ticks
                                                        },
                                                        // Pad the y axis just a little so bars can get close to, but
                                                        // not touch, the grid boundaries.  1.2 is the default padding.
                                                        yaxis: {
                                                            label: 'Microgramo X Metro Cubico',
                                                            pad: 1.05,
                                                            tickOptions: {formatString:'%.2f'}
                                                        }
                                                    }
                                                });
                                            });

"); //fin script grafico
                        ?>
    <?php echo $this->element('sql_dump'); ?>
        <?php //para que el jquery funcione
              echo $this->Js->writeBuffer();
        ?>
</html>
