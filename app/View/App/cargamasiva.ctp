<?php 
/******************************************************************************/
/******************************************************************************/
/****agregar esta linea de codigo para cargar el modulo de buscar**************/
/*<li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',1),array('class' => 'example4demo')); ?> </li>
/****El numero quiere decir: **************************************************/
/****1 : Datos de calibracion**************************************************/
/****2 : Muestreos PTS*********************************************************/
/****3 : Muestreos PM10********************************************************/
/****4 : Muestreos PM2.5********************************************************/
?>
<div class=" form" >
<?php 
$this->Html->addCrumb($titulo );
$this->Html->addCrumb('Buscar');
echo $this->Form->create('cargamasiva',array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Carga Masiva de '.$titulo); ?></legend>
	<TABLE> 
            <TR> 
              <TD><span >Pulse examinar para buscar</span></TD> 
            </TR>
            <TR>
                <TD><?php echo $this->Form->input('archivo', array('id' => 'file','name' => 'file','type' => 'File')); ?></TD>
            </TR>
            <TR>
               <TD><?php echo $this->Form->end(__('Cargar')); ?></TD> 
            </TR>
        </TABLE>
	</fieldset>

</div>
