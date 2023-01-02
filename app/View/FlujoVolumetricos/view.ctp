<div class="flujoVolumetricos view">
<h2><?php  echo __('Flujo Volumetrico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($flujoVolumetrico['FlujoVolumetrico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P1 Po'); ?></dt>
		<dd>
			<?php echo h($flujoVolumetrico['FlujoVolumetrico']['p1_po']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperatura'); ?></dt>
		<dd>
			<?php echo h($flujoVolumetrico['FlujoVolumetrico']['temperaturac']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($flujoVolumetrico['FlujoVolumetrico']['valorc']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Volumetrico'), array('action' => 'edit', $flujoVolumetrico['FlujoVolumetrico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $flujoVolumetrico['FlujoVolumetrico']['id']), null, __('Are you sure you want to delete # %s?', $flujoVolumetrico['FlujoVolumetrico']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Flujos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Flujo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
