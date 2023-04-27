<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Por favor Introduzca su Nombre de usuario y su contraseña.'); ?></legend>
        <?php echo $this->Form->input('username',array('label' => 'Nombre de Usuario'));
        echo $this->Form->input('password',array('label' => 'Contraseña'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Entrar')); ?>
</div>
