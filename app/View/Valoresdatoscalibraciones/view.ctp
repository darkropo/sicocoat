<div class="valoresdatoscalibraciones view">
<h2><?php  
$this->Html->addCrumb('Tabla Datos de Calibracion');
$this->Html->addCrumb('Ver');
echo __('Valores datos de calibracion'); ?></h2>
	<dl>
		
            <dt><?php print_r($valoresdatoscalibracione); echo __('Lmo'); ?></dt>
		<dd>
			<?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['lmo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lro'); ?></dt>
		<dd>
			<?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['lro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcf'); ?></dt>
		<dd>
			<?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['qcf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcm'); ?></dt>
		<dd>
			<?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['qcm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcms'); ?></dt>
		<dd>
			<?php echo h($valoresdatoscalibracione['Valoresdatoscalibracione']['qcms']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Valor'), array('action' => 'edit', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo']), null, __('Seguro deseas borrar # %s?', $valoresdatoscalibracione['Valoresdatoscalibracione']['lmo'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Valores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Valor'), array('action' => 'add')); ?> </li>
	</ul>
</div>
