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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('cake.generic');
                echo $this->Html->css('csspropios');
                echo $this->Html->css('style');
                echo $this->Html->css('jquery.jqplot');
                //Javascript
                echo $this->Html->script('jquery-1.9.1');
                echo $this->Html->script('jquery-migrate-1.1.1');
                echo $this->Html->script('jquery.popupWindow'); 
                echo $this->Html->script('jquery.jqplot'); 
                echo $this->Html->script('jqplot.cursor.min'); 
                echo $this->Html->script('jqplot.dateAxisRenderer'); 
                echo $this->Html->script('jqplot.highlighter.min'); 
                echo $this->Html->script('jqplot.canvasAxisLabelRenderer.min'); 
                echo $this->Html->script('jqplot.canvasTextRenderer.min'); 
                //popup window
                
                
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
                       echo $this->Html->scriptBlock("$.jqplot('reglineal',".$_GET['grafreglin'].",
                           { title:'Regresion Lineal',
                             
                              axesDefaults: {
                                labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                                min: 0
                              },
                              axes:{
                                xaxis: {
                                     label: 'QCM',
                                     tickOptions:{
                                        formatString:'%.2f'
                                        }
                                    },
                                 yaxis: {
                                     label: 'Pulgadas de Agua',
                                     tickOptions:{
                                        formatString:'%.2f'
                                        }
                                     }},
                                highlighter: {
                                  show: true,
                                  sizeAdjust: 7.5
                                },
                                cursor: {
                                  show: false
                                }
                           });");
                        
                
                
            echo $this->Html->scriptBlock("$('.reglineal').popupWindow({ 
                                                windowName:'Regresion Lineal',
                                                height:800, 
                                                width:939, 
                                                });");
    ?>
    <?php echo $this->element('sql_dump'); ?>
        <?php //para que el jquery funcione
              echo $this->Js->writeBuffer();
        ?>
</html>
