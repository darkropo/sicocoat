<div class="muestreosPm10s form">
<?php 
$this->Html->addCrumb('Muestreos Pm10', '/muestreospm10s');
$this->Html->addCrumb('Editar Pm10', '/muestreospm10s/edit');
echo $this->Form->create('MuestreosPm10'); ?>
	<fieldset>
		<legend><?php echo __('Editar Muestreos Pm10'); ?></legend>
	<TABLE>
     <TR> 
        <TD> <?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text')); ?> </TD> 
        <TD> <?php echo $this->Form->input('proyectos_id');  ?> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('ciclos_id'); ?> </TD> 
        <TD> <?php echo $this->Form->input('estaciones_id'); ?> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('elemento_id', array('label' => 'Parametro')); ?> </TD> 
        <TD> <?php echo $this->Form->input('fecha_montaje', array('id' => 'fecha_montaje','type' => 'text'));  ?> 
                    <span >(AAAA/MM/DD)</span> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('hora_montaje', array('id' => 'hora_montaje','type' => 'text','alt' => 'time' )); ?> 
                    <span >(HH:MM)</span></TD> 
        <TD> <?php echo $this->Form->input('fecha_recoleccion', array('id' => 'fecha_recoleccion','type' => 'text')); ?> 
                    <span >(AAAA/MM/DD)</span> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('hora_recoleccion', array('id' => 'hora_recoleccion','type' => 'text','alt' => 'time' )); ?> 
                    <span >(HH:MM)</span> </TD> 
        <TD> <?php echo $this->Form->input('pulgadas_agua'); ?> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('pulgadas_hg', array('readonly' => 'readonly')); ?> </TD> 
        <TD> <?php echo $this->Form->input('p1_po_p', array('label' => 'P1 = Po - P','readonly' => 'readonly')); ?> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('p1_po', array('label' => 'P1 / Po','readonly' => 'readonly')); ?> </TD> 
        <TD> <?php echo $this->Form->input('temperatura_inicial'); ?> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('temperatura_final'); ?> </TD> 
        <TD> <?php echo $this->Form->input('volumen'); ?> </TD> 
     </TR>
     <TR> 
        <TD> <?php echo $this->Form->input('microgramo'); ?> </TD> 
        <TD> <?php echo $this->Form->input('microgramo_metro_cubico', array('readonly' => 'readonly')); ?> </TD> 
     </TR>
</TABLE>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); 
//Script para el auto llenado del combo estaciones al cambiar el proyecto                
 $this->Js->get('#proyecto')->event('change', 
	$this->Js->request(array(
		'controller'=>'Muestreospm10s',
		'action'=>'getestacionesselect'
		), array(
		'update'=>'#MuestreosPm10EstacionesId',
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
                <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('MuestreosPm10.id')), null, __('Seguro deseas Borrar # %s?', $this->Form->value('MuestreosPm10.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pm10s'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Parametros'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Parametro'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar PM10'), array('action' => 'graficadatospm10')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',3),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
