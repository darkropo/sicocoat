<div class="proyectos view">
<h2><?php  
$this->Html->addCrumb('Proyecto', '/proyectos');
$this->Html->addCrumb('Ver Proyecto', '/proyectos/view');
echo __('Proyecto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proyecto['Proyecto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($proyecto['Proyecto']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Proyecto'), array('action' => 'edit', $proyecto['Proyecto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Proyecto'), array('action' => 'delete', $proyecto['Proyecto']['id']), null, __('Are you sure you want to delete # %s?', $proyecto['Proyecto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proyectos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proyecto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Estaciones Relacionadas'); ?></h3>
	<?php if (!empty($proyecto['Estacione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th class="actions"><?php echo __('Opciones'); ?></th>
                <th><?php echo __('Id'); ?></th>
		<th><?php echo __('Proyecto Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Ubicacion'); ?></th>
		<th><?php echo __('Coordenadas'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($proyecto['Estacione'] as $estacione): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'estaciones', 'action' => 'view', $estacione['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'estaciones', 'action' => 'edit', $estacione['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'estaciones', 'action' => 'delete', $estacione['id']), null, __('Are you sure you want to delete # %s?', $estacione['id'])); ?>
			</td>
                        <td><?php echo $estacione['id']; ?></td>
			<td><?php echo $estacione['proyecto_id']; ?></td>
			<td><?php echo $estacione['nombre']; ?></td>
			<td><?php echo $estacione['ubicacion']; ?></td>
			<td><?php echo $estacione['coordenadas']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
