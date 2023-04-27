<?php 
$this->Html->addCrumb('Graficas Generales', '/app/graficapromedio');

$estaciones = NULL; ?>
<div class="form">
    <?php echo $this->Form->create(FALSE) ?>
    <fieldset>
        <legend><?php echo __('Grafica Promedios Generales'); ?></legend>
        <?php
        echo $this->Form->input('proyectos_id', array('id' => 'proyecto', 'empty' => true)); 
        ?>
         
       <?php echo $this->Form->input('anio', array('label' => 'Año',
            'type' => 'datetime',
            'dateFormat' => 'Y',
            'timeFormat' => null,
            'minYear' => date('Y') - 100,
            'maxYear' => date('Y')));
        ?>

    </fieldset>
    <?php
    $options = array('label' => 'Procesar',
        'type' => 'submit',
    );
    echo $this->Form->end($options);

    ?>
</div>
<div class="actions">
    <h3><?php echo __('Opciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Buscar'),array('controller' => 'app','action' => 'buscar',3),array('class' => 'example4demo')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Ciclos'), array('controller' => 'ciclos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Ciclos'), array('controller' => 'ciclos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Estaciones'), array('controller' => 'estaciones', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Estacion'), array('controller' => 'estaciones', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Parametros'), array('controller' => 'elementos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Parametro'), array('controller' => 'elementos', 'action' => 'add')); ?> </li>
    </ul>
</div>
