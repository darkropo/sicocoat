<?php //echo $this->element('listpm10'); ?>
<div class="muestreosPm10s form">
<?php 
$this->Html->addCrumb('Muestreos Pm10', '/muestreospm10s');
$this->Html->addCrumb('Agregar Pm10', '/muestreospm10s/add');
echo $this->Form->create('MuestreosPm10'); ?>
	<fieldset>
<legend><?php echo __(''); ?></legend>
<TABLE>
    <TR> 
        <TD> <?php echo $this->Form->input('proyecto_id', array('id' => 'proyecto','empty' => true, 'label' => 'Articulo'));  ?> </TD> 
        <TD> <?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text','label' => 'Cantidad (Kg)')); ?>  </TD>
     </TR>

	 <TR> 
        <TD> <?php echo $this->Form->input('proyecto_id', array('id' => 'proyecto','empty' => true, 'label' => 'Articulo'));  ?> </TD> 
        <TD> <?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text','label' => 'Cantidad (Kg)')); ?>  </TD>
     </TR>

	 <TR> 
        <TD> <?php echo $this->Form->input('proyecto_id', array('id' => 'proyecto','empty' => true, 'label' => 'Articulo'));  ?> </TD> 
        <TD> <?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text','label' => 'Cantidad (Kg)')); ?>  </TD>
     </TR>

	 <TR> 
        <TD> <?php echo $this->Form->input('proyecto_id', array('id' => 'proyecto','empty' => true, 'label' => 'Articulo'));  ?> </TD> 
        <TD> <?php echo $this->Form->input('numero_muestreo', array('id' => 'numero_muestreo','type' => 'text','label' => 'Cantidad (Kg)')); ?>  </TD>
     </TR>
    
</TABLE>
<TABLE>
     <TR> 
       
        <TD> <?php echo $this->Html->image('agrega.jpg', array('class' => 'mas'));    ?> </TD> 
        <TD> <?php echo $this->Html->image('menos.jpg' ,  array('class' => 'mas'));  ?> </TD> 
          
     </TR> 
    
</TABLE>

	
	</fieldset>
    <?php echo $this->Form->end(__('Generar')); 


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
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Agregar Pedido'),array('controller' => 'app','action' => 'buscar',3),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Verificar pedidos'), array('action' => 'index')); ?></li>
		








	<!--	<li><?php echo $this->Html->link(__('Nuevo Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Parametros'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Parametro'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar PM10'), array('action' => 'graficadatospm10')); ?> </li>
                <li><?php echo $this->Html->link(__('Graficar Promedio'), array('action' => 'graficapromedio')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',3),array('class' => 'example4demo')); ?> </li> 
	-->			

	</ul>
</div>
