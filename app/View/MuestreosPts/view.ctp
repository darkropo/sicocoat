<div class="muestreosPts view">
<h2><?php
$this->Html->addCrumb('Muestreos Pts', '/muestreospts');
$this->Html->addCrumb('Ver Muestreos Pts', '/muestreospts/view');
echo __('Muestreos Pts'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciclos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPt['Ciclo']['nombre'], array('controller' => 'ciclos', 'action' => 'view', $muestreosPt['Ciclo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estaciones'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPt['Estacione']['nombre'], array('controller' => 'estaciones', 'action' => 'view', $muestreosPt['Estacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parametro'); ?></dt>
		<dd>
			<?php echo $this->Html->link($muestreosPt['Elemento']['nombre'], array('controller' => 'elementos', 'action' => 'view', $muestreosPt['Elemento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Muestreo'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['numero_muestreo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Montaje'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['fecha_montaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Montaje'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['hora_montaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Recoleccion'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['fecha_recoleccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Recoleccion'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['hora_recoleccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperatura'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['temperatura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodo Minutos'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['periodo_minutos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flujo Cr'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['flujo_cr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qcm'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['qcm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volumen'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['volumen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperatura Inicio'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['temperatura_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperatura Fin'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['temperatura_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['microgramo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Metro Cubico'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['microgramo_metro_cubico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Elemento'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['microgramo_elemento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microgramo Metro Cubico Elemento'); ?></dt>
		<dd>
			<?php echo h($muestreosPt['MuestreosPt']['microgramo_metro_cubico_elemento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Pts'), array('action' => 'edit', $muestreosPt['MuestreosPt']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $muestreosPt['MuestreosPt']['id']), null, __('Are you sure you want to delete # %s?', $muestreosPt['MuestreosPt']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Pts'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Parametros'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Parametro'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Carga Masiva'), array('controller' => 'app','action' => 'cargamasiva',2),array('class' => 'example4demo')); ?> </li>
                
	</ul>
</div>
