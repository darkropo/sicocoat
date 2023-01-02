<div class="ciclos view">
<h2><?php  
$this->Html->addCrumb('Ciclo', '/ciclos');
$this->Html->addCrumb('Ver Ciclo', '/ciclos/view');
echo __('Ciclo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ciclo['Ciclo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temporada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ciclo['Temporada']['nombre'], array('controller' => 'temporadas', 'action' => 'view', $ciclo['Temporada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ciclo['Ciclo']['nombre']); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Ciclo'), array('action' => 'edit', $ciclo['Ciclo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Ciclo'), array('action' => 'delete', $ciclo['Ciclo']['id']), null, __('Seguro desea Borrar # %s?', $ciclo['Ciclo']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Temporadas'), array('controller' => 'temporadas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Temporada'), array('controller' => 'temporadas', 'action' => 'add')); ?> </li>
	</ul>
</div>
