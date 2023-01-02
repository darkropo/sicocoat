<div class="muestreosPm25s form">
<?php echo $this->Form->create('MuestreosPm25'); ?>
	<fieldset>
		<legend><?php echo __('Editar Muestreos Pm25'); ?></legend>
<TABLE> 
   <TR> 
     <TD> <?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text')); ?> </TD> 
     <TD> <?php echo $this->Form->input('proyectos_id', array('id' => 'proyecto','empty' => true)); ?> </TD> 
   </TR>
   <TR> 
     <TD> <?php echo $this->Form->input('ciclos_id'); ?> </TD> 
     <TD> <?php echo $this->Form->input('estaciones_id', array('empty' => true)); ?> </TD> 
   </TR>
   <TR> 
     <TD> <?php echo $this->Form->input('fecha_montaje', array('id' => 'fecha_montaje','type' => 'text'));  ?>
                <span >(AAAA/MM/DD)</span></TD> 
     <TD> <?php echo $this->Form->input('hora_montaje', array('id' => 'hora_montaje','type' => 'text','alt' => 'time' )); ?> 
                <span >(HH:MM)</span></TD> 
   </TR>
   <TR> 
     <TD> <?php echo $this->Form->input('fecha_recoleccion', array('id' => 'fecha_recoleccion','type' => 'text')); ?> 
                <span >(AAAA/MM/DD)</span> </TD> 
     <TD> <?php echo $this->Form->input('hora_recoleccion', array('id' => 'hora_recoleccion','type' => 'text','alt' => 'time' )); ?> 
                 <span >(HH:MM)</span> </TD> 
   </TR>
   <TR> 
     <TD> <?php echo $this->Form->input('microgramo', array('id' => 'microgramopm25','empty' => true)); ?> </TD> 
     <TD> <?php echo $this->Form->input('volumen_final'); ?> </TD> 
   </TR>
   <TR> 
     <TD> <?php echo $this->Form->input('flujo');  ?> </TD> 
     <TD> <?php echo $this->Form->input('temperatura') ?> </TD> 
   </TR>
   <TR> 
     <TD> <?php echo $this->Form->input('microgramo_metro_cubico', array('readonly' => 'readonly')); ?> </TD> 
     <TD> <?php  ?> </TD> 
   </TR>
  
</TABLE> 

	</fieldset>
<?php echo $this->Form->end(__('Guardar')); 
//Script para el auto llenado del combo estaciones al cambiar el proyecto                
 $this->Js->get('#proyecto')->event('change', 
	$this->Js->request(array(
		'controller'=>'Muestreospm25s',
		'action'=>'getestacionesselect'
		), array(
		'update'=>'#MuestreosPm25EstacionesId',
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

		<li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',4),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('MuestreosPm25.id')), null, __('Seguro deseas Borrar # %s?', $this->Form->value('MuestreosPm25.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pm25s'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar PM 2.5'), array('action' => 'graficadatospm25')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                
	</ul>
</div>
