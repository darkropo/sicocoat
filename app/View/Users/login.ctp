<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __(''); ?></legend>
        <?php echo $this->Form->input('username',array('label' => 'Login'));
        echo $this->Form->input('password',array('label' => 'Password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Entrar')); ?>
</div>
