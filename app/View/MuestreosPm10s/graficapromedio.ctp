<?php 
$this->Html->addCrumb('Muestreos Pm10', '/muestreospm10s');
$this->Html->addCrumb('Grafica Promedio', '/muestreospm10s/graficapromedio');
$estaciones = NULL; ?>
<div class="form">
<?php echo $this->Form->create('MuestreosPm10')?>
	<fieldset>
		<legend><?php echo __('Graficas PM10 Promedio de partículas.'); ?></legend>
	<?php
                echo $this->Form->input('proyectos_id', array('id' => 'proyecto','empty' => true)); ?>
                <div class="grupochecks" >
                <label for="elemento">Elementos</label>
                <?php
                echo $this->Form->select('elementos_id', $elementos, array(
                                                    'id' => 'elemento',    
                                                    'div' => false,
                                                    'default' => true,    
                                                    'multiple' => 'checkbox',
                                                    'label' => 'Parametro'    
                                                ));
                 ?>
                </div>
                <div class="grupochecks" >
                <label for="ciclo">Ciclos</label>
                <?php
                echo $this->Form->select('ciclos_id', $ciclos, array(
                                                    'id' => 'ciclo',    
                                                    'div' => false,
                                                    'default' => true,    
                                                    'multiple' => 'checkbox'
                                                ));
                 ?>
                </div>    
                <div class="grupochecks"> 
                    <label for="estacione">Estaciones</label> 
                    <div id ="EstacioneEstacionesId" ></div>

                </div>
                <?php  echo $this->Form->input('anio', array('label' => 'Año',
                                                      'type' => 'datetime',
                                                      'dateFormat' => 'Y',
                                                      'timeFormat' => null,  
                                                      'minYear' => date('Y') - 100,
                                                      'maxYear' => date('Y'))); 
                
                ?>

	</fieldset>
<?php
$options = array('label' => 'Procesar',
                 'type' => 'submit',
                 );
                echo $this->Form->end($options); 
//echo $this->Form->postutton('Procesar', array('type' => 'submit','class' => 'reglineal'));
//Script para el auto llenado del combo estaciones al cambiar el proyecto                
 $this->Js->get('#proyecto')->event('change', 
	$this->Js->request(array(
		'controller'=>'Muestreospm10s',
		'action'=>'getestacionescheck'
		), array(
		'update'=>'#EstacioneEstacionesId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
 //Script para el auto llenado del combo estaciones al cambiar el proyecto   
?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',3),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Nuevo PM10'), array('action' => 'add')); ?></li>    
		<li><?php echo $this->Html->link(__('Listar PM10'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Parametros'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Parametro'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                 <li><?php echo $this->Html->link(__('Graficar PM10'), array('action' => 'graficadatospm10')); ?> </li>
	</ul>
</div>
