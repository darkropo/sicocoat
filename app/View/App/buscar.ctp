<?php 
/******************************************************************************/
/******************************************************************************/
/****agregar esta linea de codigo para cargar el modulo de buscar**************/
/*<li><?php echo $this->Html->link(__('Buscar'), array('controller' => 'app','action' => 'buscar',1),array('class' => 'example4demo')); ?> </li>**********************************/
/****El numero quiere decir: **************************************************/
/****1 : Datos de calibracion**************************************************/
/****2 : Muestreos PTS*********************************************************/
/****3 : Muestreos PM10********************************************************/
/****4 : Muestreos PM2.5********************************************************/
?>
<div >
<?php 
$this->Html->addCrumb($titulo );
$this->Html->addCrumb('Buscar');
    echo $this->Form->create('buscar'); ?>
	<fieldset>
		<legend><?php echo __('Buscar '.$titulo); ?></legend>
            <TABLE> 
                <TR> 
                  <TD><?php echo $this->Form->input('proyectos_id', array('id' => 'proyecto')); ?></TD> 
                  <TD><?php echo $this->Form->input('estaciones_id', array('id' => 'estacionesid')); ?></TD> 
                </TR>
                <TR>
                  <TD><?php echo $this->Form->input('ciclos_id', array('id' => 'ciclosid')); ?></TD>
                  <TD><?php  echo $this->Form->input('anio', array('label' => 'Año',
                                                              'type' => 'datetime',
                                                              'dateFormat' => 'Y',
                                                              'timeFormat' => null,  
                                                              'minYear' => date('Y') - 100,
                                                              'maxYear' => date('Y'))); 

                        ?>
                  </TD>
                </TR> 
                <TR>
                   <TD><?php echo $this->Form->end(__('Buscar')); ?></TD> 
                </TR>
            </TABLE>
	</fieldset>
<?php 
//Script para el auto llenado del combo estaciones al cambiar el proyecto                
 $this->Js->get('#proyecto')->event('change', 
	$this->Js->request(array(
		'controller'=>'App',
		'action'=>'getestacionesselect'
		), array(
		'update'=>'#estacionesid',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
 
?>
</div>
<!--<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
                
		<li><?php //echo $this->Html->link(__('Listar Datos'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
</div>-->
<?php 

switch ($from){
    case 1: echo $this->element('datoscalibracion');
        break;
    case 2: echo $this->element('datosmuestreopts');
        break;
    case 3: echo $this->element('datosmuestreopm10');
        break;
    case 4: echo $this->element('datosmuestreopm25');
        break;
}



?>