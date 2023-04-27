<div class="valoresdatoscalibraciones index">
	<h2><?php 
        $this->Html->addCrumb('Tabla Datos de Calibracion');

        echo __('Valores datos de calibracion'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th class="actions"><?php echo __('Opciones'); ?></th>
<!--                        <th><?php // echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('lmo'); ?></th>
			<th><?php echo $this->Paginator->sort('lro'); ?></th>
			<th><?php echo $this->Paginator->sort('qcf'); ?></th>
			<th><?php echo $this->Paginator->sort('qcm'); ?></th>
			<th><?php echo $this->Paginator->sort('qcms'); ?></th>
	</tr>
	<?php
         
	foreach ($valoresdatoscalibraciones as $valoresdatoscalibracione): ?>
	<tr>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo']), null, __('Seguro deseas Borrar # %s?', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo'])); ?>
		</td>
                <!--<td><?php // echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['lmo']); ?>&nbsp;</td>
		<td><?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['lro']); ?>&nbsp;</td>
		<td><?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['qcf']); ?>&nbsp;</td>
		<td><?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['qcm']); ?>&nbsp;</td>
		<td><?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['qcms']); ?>&nbsp;</td>
	</tr>
<?php endforeach; 

//print_r($valoresdatoscalibracione); ?>
        
        
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} Valores de {:count} total')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Valor'), array('action' => 'add')); ?></li>
	</ul>
</div>
