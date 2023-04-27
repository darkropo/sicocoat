<div class="header">
    <div class="nav-area">
        <ul class="nav">
          <li style="border: medium none ;"><?php echo $this->Html->link('Principal', '/'); ?></li>
          <li><?php echo $this->Html->link('Iclam', 'http://www.iclam.gov.ve/'); ?></li>
          <li><?php echo $this->Html->link('Min Ambiente', 'http://www.minamb.gob.ve/'); ?></li>
          <li><?php if ($logueado == 1){ echo $this->Html->link('Salir', array('controller' => 'Users','action' => 'logout')); }
                    else{ echo $this->Html->link('Entre para Utilizar el sistema.', array('controller' => 'Users','action' => 'login')); }     ?>
            </li>
          
        </ul>
    </div>
    <div class="banner-area">
        <?php echo $this->Html->image('banner-1.jpg', array('alt' => 'Sicocoat', 'border' => 0,'class' => 'banner1')); ?>
            <div class="banner-text">
                <h1>SICOCOAT</h1>
                <h4>Simulador del Comportamiento de la Contaminacion Atmosferica</h3>
            </div> 
       <?php       echo $this->Html->image('banner-2.jpg', array('alt' => 'Sicocoat', 'border' => 0,'class' => 'banner2'));              
        ?>
    </div>
   
    
</div>

<div class="separador">
    <div > <?php echo $this->Html->getCrumbs(' > ', 'Principal'); ?> <p><?php if($usuario != 0){ echo 'Bienvenido '.$usuario['nombre'].' '.$usuario['apellido'];    }  else {
        echo 'Debes entrar para utlizar el sistema.'; }  ?>
    </p></div>
    
 </div>


