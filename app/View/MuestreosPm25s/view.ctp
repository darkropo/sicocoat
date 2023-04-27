<div class="muestreosPm25s view">
<h2><?php  
$this->Html->addCrumb('Muestreos Pm 2.5', '/muestreospm25s');
$this->Html->addCrumb('Ver Muestreos Pm 2.5', '/muestreospm25s/view');
echo __('Muestreos Pm25'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciclo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPm25['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPm25['Ciclo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPm25['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPm25['Estacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Muestreo'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['numero_muestreo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Montaje'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['fecha_montaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Montaje'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['hora_montaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Recoleccion'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['fecha_recoleccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Recoleccion'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['hora_recoleccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo Total'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['tiempo_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flujo'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['flujo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volumen Final'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['volumen_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['microgramo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Metro Cubico'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['microgramo_metro_cubico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperatura'); ?></dt>
		<dd>
			<?php echo h($muestreosPm25['MuestreosPm25']['temperatura']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',4),array('class' => 'example4demo')); ?> </li>
                <li><?php echo $this->Html->link(__('Editar Pm25'), array('action' => 'edit', $muestreosPm25['MuestreosPm25']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPm25['MuestreosPm25']['id']), null, __('Seguro deseas Borrar # %s?', $muestreosPm25['MuestreosPm25']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pm25s'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pm25'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacio'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',4),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
