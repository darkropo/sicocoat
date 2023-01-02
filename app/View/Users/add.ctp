<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label' => 'Nombre de Usuario'));
		echo $this->Form->input('password',array('label' => 'Contraseña'));
                echo $this->Form->input('nombre');
                echo $this->Form->input('apellido');
		echo $this->Form->input('role', array('label' => 'Rol',
                    'options' => array('admin' => 'Administrador', 'usuario' => 'Usuario','invitado' => 'Invitado')
        ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
