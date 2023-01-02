<div class="estaciones view">
<h2><?php 
$this->Html->addCrumb('Estaciones', '/estaciones');
$this->Html->addCrumb('Ver Estacion', '/estaciones/view');
echo __('Estacion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estacione['Estacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proyecto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estacione['Proyecto']['nombre'], array('controller' => 'proyectos', 'action' => 'view', $estacione['Proyecto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($estacione['Estacione']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubicacion'); ?></dt>
		<dd>
			<?php echo h($estacione['Estacione']['ubicacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordenadas'); ?></dt>
		<dd>
			<?php echo h($estacione['Estacione']['coordenadas']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Estacion'), array('action' => 'edit', $estacione['Estacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $estacione['Estacione']['id']), null, __('Seguro desea borrar # %s?', $estacione['Estacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
