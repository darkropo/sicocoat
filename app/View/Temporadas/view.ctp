<div class="temporadas view">
<h2><?php
$this->Html->addCrumb('Temporada', '/temporadas');
$this->Html->addCrumb('Ver Temporada', '/temporadas/view');
echo __('Temporada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($temporada['Temporada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($temporada['Temporada']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Temporada'), array('action' => 'edit', $temporada['Temporada']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Temporada'), array('action' => 'delete', $temporada['Temporada']['id']), null, __('Seguro desea Borrar # %s?', $temporada['Temporada']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Temporadas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Temporada'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Ciclos Relacionados'); ?></h3>
	<?php if (!empty($temporada['Ciclo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th class="actions"><?php echo __('Opciones'); ?></th>
                <th><?php echo __('Id'); ?></th>
		<th><?php echo __('Temporada Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($temporada['Ciclo'] as $ciclo): ?>
		<tr>
			
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'ciclos', 'action' => 'view', $ciclo['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'ciclos', 'action' => 'edit', $ciclo['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'ciclos', 'action' => 'delete', $ciclo['id']), null, __('Are you sure you want to delete # %s?', $ciclo['id'])); ?>
			</td>
                        <td><?php echo $ciclo['id']; ?></td>
			<td><?php echo $ciclo['temporada_id']; ?></td>
			<td><?php echo $ciclo['nombre']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
