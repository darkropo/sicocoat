<div class="estaciones index">
	<h2><?php 
        $this->Html->addCrumb('Estaciones', '/estaciones');
        
        echo __('Verificar Pedidos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th class="actions"><?php echo __(''); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>                        
			<th><?php echo $this->Paginator->sort('Ejecutor pedido'); ?></th>
			<th><?php echo $this->Paginator->sort('tienda'); ?></th>
			
	</tr>
	<?php
//foreach ($estaciones as $estacione): ?>
	<tr>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
			<!--<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $estacione['Estacione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $estacione['Estacione']['id']), null, __('Seguro deseas borrar # %s?', $estacione['Estacione']['nombre'])); ?>
		-->
		</td>
                <td><?php echo h('035'); ?>&nbsp;</td>               
		<td><?php echo h('carmen salazar'); ?>&nbsp;</td>
		<td><?php echo h('Makro Norte T-35'); ?>&nbsp;</td>
		
	</tr>

	<tr>
		
		<td class="actions">
		<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
		<?php echo $this->Html->link(__('Eliminar'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
			
		</td>
                <td><?php echo h('037'); ?>&nbsp;</td>               
		<td><?php echo h('jon Vasquez'); ?>&nbsp;</td>
		<td><?php echo h('Makro Norte T-35'); ?>&nbsp;</td>
		
	</tr>

	<tr>
		
		<td class="actions">
		<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
		<?php echo $this->Html->link(__('Eliminar'), array('action' => 'view', $estacione['Estacione']['id'])); ?>
			
		</td>
                <td><?php echo h('038'); ?>&nbsp;</td>               
		<td><?php echo h('Alirio Herrera'); ?>&nbsp;</td>
		<td><?php echo h('Makro Norte T-35'); ?>&nbsp;</td>
		
	</tr>
<?php //endforeach; ?>
	</table>
	<p>
	<!--<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} Estaciones de {:count} total')
	));
	?> -->	</p>

	<div class="paging">
	<!-- <?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>-->
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Pedido'), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Verificar Pedidos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('Eliminar Pedidos'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
