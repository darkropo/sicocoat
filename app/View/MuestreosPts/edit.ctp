<div class="muestreosPts form">
<?php 
$this->Html->addCrumb('Muestreos Pts', '/muestreospts');
$this->Html->addCrumb('Editar Muestreos Pts', '/muestreospts/edit');
echo $this->Form->create('MuestreosPt'); ?>
	<fieldset>
		<legend><?php echo __('Editar Muestreos Pts'); ?></legend>
<TABLE> 
        <TR> 
          <TD><?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text')); ?></TD> 
          <TD><?php echo $this->Form->input('proyectos_id'); ?></TD> 
        </TR> 
        <TR> 
          <TD><?php echo $this->Form->input('ciclos_id', array('id' => 'ciclosid')); ?></TD> 
          <TD><?php echo $this->Form->input('estaciones_id', array('id' => 'estacionesid', 'empty' => true)); ?></TD>  
        </TR>
        <TR> 
          <TD><?php echo $this->Form->input('elemento_id', array('label' => 'Parametro')); ?></TD> 
          <TD><?php echo $this->Form->input('fecha_montaje', array('id' => 'fecha_montaje','type' => 'text'));  ?>
                    <span >(AAAA/MM/DD)</span></TD> 
        </TR> 
        <TR> 
          <TD><?php echo $this->Form->input('hora_montaje', array('id' => 'hora_montaje','type' => 'text','alt' => 'time' )); ?>
                    <span >(HH:MM)</span></TD> 
          <TD><?php echo $this->Form->input('fecha_recoleccion', array('id' => 'fecha_recoleccion','type' => 'text'));
                 ?> <span >(AAAA/MM/DD)</span> </TD>  
        </TR>
        <TR> 
          <TD><?php echo $this->Form->input('hora_recoleccion', array('id' => 'hora_recoleccion','type' => 'text','alt' => 'time' )); ?>
                    <span >(HH:MM)</span></TD> 
          <TD><?php echo $this->Form->input('microgramo', array('id' => 'microgramo','type' => 'text')); ?></TD>  
        </TR>
        <TR> 
          <TD><?php echo $this->Form->input('temperatura'); ?> </TD> 
          <TD><?php echo $this->Form->input('periodo_minutos', array('readonly' => 'readonly')); ?></TD>  
        </TR>
         <TR> 
          <TD><?php echo $this->Form->input('flujo_cr', array('readonly' => 'readonly')); ?></TD> 
          <TD><?php echo $this->Form->input('qcm', array('readonly' => 'readonly')); ?></TD>  
        </TR>
         <TR> 
          <TD><?php echo $this->Form->input('volumen', array('readonly' => 'readonly')); ?>  </TD> 
          <TD><?php  echo $this->Form->input('microgramo_metro_cubico', array('readonly' => 'readonly')); ?></TD>  
        </TR>
        <TR> 
          <TD><?php echo $this->Form->input('temperatura_inicio'); ?>
                  </TD> 
          <TD><?php echo $this->Form->input('temperatura_fin'); ?></TD>  
        </TR>
        
</TABLE>
                    
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); 
//Script para el auto llenado del combo estaciones al cambiar el proyecto                
 $this->Js->get('#proyecto')->event('change', 
	$this->Js->request(array(
		'controller'=>'Muestreospts',
		'action'=>'getestacionesselect'
		), array(
		'update'=>'#MuestreosPtEstacionesId',
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

		<li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',2),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('MuestreosPt.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MuestreosPt.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Elementos'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Elemento'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar PTS'), array('action' => 'graficadatospts')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',2),array('class' => 'example4demo')); ?> </li>
                
	</ul>
</div>
