<div class="usuarios view">
<h2><?php  echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['apellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombredeusuario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombredeusuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contrasena'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['contrasena']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['cargo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gerencia'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['gerencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordinacion'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['coordinacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
