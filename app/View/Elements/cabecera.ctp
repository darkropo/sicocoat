<div class="header">
    <div class="nav-area">
        <ul class="nav">
          <li style="border: medium none ;"><?php echo $this->Html->link('Principal', '/'); ?></li>
          <li><?php if ($logueado == 1){ echo $this->Html->link('Salir', array('controller' => 'Users','action' => 'logout')); }
                    else{ echo $this->Html->link('Entrar', array('controller' => 'Users','action' => 'login')); }     ?>
            </li>
          
        </ul>
    </div>
    <div class="banner-area">
        <?php echo $this->Html->image('makro1.jpg', array('alt' => 'Sicocoat', 'border' => 0,'class' => 'banner1')); ?>
            <div class="banner-text">
                <h1>FRUVER</h1>
                <h4>Gestion de Pedido de Frutas y Vegetales</h3>
            </div> 
       <?php       echo $this->Html->image('fruver1.jpg', array('alt' => 'Sicocoat', 'border' => 0,'class' => 'banner2'));              
        ?>
    </div>
   
    
</div>

<div class="separador">
    <div > <p><?php if($usuario != 0){ echo 'Conectado '.$usuario['nombre'].' '.$usuario['apellido'];    }  else {
        echo 'Logueate para utlizar el sistema.'; }  ?>
    </p></div>
    
 </div>


