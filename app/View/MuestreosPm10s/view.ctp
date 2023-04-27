<div class="muestreosPm10s view">
<h2><?php
$this->Html->addCrumb('Muestreos Pm10', '/muestreospm10s');
$this->Html->addCrumb('Ver Pm10', '/muestreospm10s/view');
echo __('Muestreos Pm10'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciclos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPm10['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPm10['Ciclo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estaciones'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPm10['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPm10['Estacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elemento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPm10['Elemento']['nombre'], array('controller' => 'elementos', 'action' => 'view', $muestreosPm10['Elemento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Muestreo'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['numero_muestreo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Montaje'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['fecha_montaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Montaje'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['hora_montaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Recoleccion'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['fecha_recoleccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Recoleccion'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['hora_recoleccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pulgadas Agua'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['pulgadas_agua']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pulgadas Hg'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['pulgadas_hg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P1 Po P'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['p1_po_p']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P1 Po'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['p1_po']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volumen'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['volumen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['microgramo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Metro Cubico'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['microgramo_metro_cubico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Elemento'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['microgramo_elemento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Metro Cubico Elemento'); ?></dt>
		<dd>
			<?php echo h($muestreosPm10['MuestreosPm10']['microgramo_metro_cubico_elemento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Pm10'), array('action' => 'edit', $muestreosPm10['MuestreosPm10']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPm10['MuestreosPm10']['id']), null, __('Seguro desea Borrar # %s?', $muestreosPm10['MuestreosPm10']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pm10'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pm10'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Elementos'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Elemento'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',3),array('class' => 'example4demo')); ?> </li>
	</ul>
</div>
