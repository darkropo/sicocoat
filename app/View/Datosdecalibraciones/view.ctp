<div class="datosdecalibraciones view">
<h2><?php  
$this->Html->addCrumb('Datos de Calibracion', '/datosdecalibraciones');
$this->Html->addCrumb('Ver Dato', '/datosdecalibraciones/view');
echo __('Datosdecalibracione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciclos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($datosdecalibracione['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $datosdecalibracione['Ciclo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estaciones'); ?></dt>
		<dd>
			<?php echo $this->Html->link($datosdecalibracione['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $datosdecalibracione['Estacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperatura'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['temperatura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lmo'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['lmo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lro'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['lro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcf'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['qcf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcm'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['qcm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcms'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['qcms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsables'); ?></dt>
		<dd>
			<?php echo h($datosdecalibracione['Datosdecalibracione']['responsables']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Buscar'), array('controller' => 'app','action' => 'buscar',1),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Editar Dato'), array('action' => 'edit', $datosdecalibracione['Datosdecalibracione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Dato'), array('action' => 'delete', $datosdecalibracione['Datosdecalibracione']['id']), null, __('Are you sure you want to delete # %s?', $datosdecalibracione['Datosdecalibracione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Datos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Dato'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',1),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
