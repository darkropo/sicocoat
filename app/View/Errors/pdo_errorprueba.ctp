

<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo __d('cake', 'Ha ocurrido un error relacionado con la base de datos.'); ?>
        <?php echo __d('cake', 'Configure el debug mayor a Cero para ver una traza del error.'); ?>
        
</p>
<?php
echo $name."<BR>"; 

if (Configure::read('debug') > 0 ):
        
	echo $this->element('exception_stack_trace');

endif;
?>
