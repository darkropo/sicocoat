<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('Funcionescargadedatosmasivos', 'Lib');
App::uses('Graficasgenerales','Lib');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $backurl;
    public $helpers = array('Html','Js' => array('Jquery'));    
    public $components = array('Session','Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            //'authorize' => array('Controller'), 
            'authError' => 'Debes iniciar sesion para ingresar al sistema.'),
            'RequestHandler');


    public function beforeFilter() {
        parent::beforeFilter();

//        if (isset($user['role']) && $user['role'] === 'invitado') {
//                $this->Auth->allow('home','view','index');
//        }
        
        $lmo = null;
        $ciclo = null;
        $estacion = null;
        $elemento = null;
        $year = null;
        //$datareglin = null;
        //print_r($this->Auth->user());
        
        if($this->Auth->loggedIn()){
            $logueado = $this->Auth->loggedIn();
            $usuario = $this->Auth->user();
        }else{
            $logueado = 0;
            $usuario = 0;
        }
        //$this->backurl = 'url';
        
        $this->set(compact('lmo','ciclo','estacion','elemento','year','logueado','usuario'));
    }
   
   protected function _isAuthorized($role) {
          if (!in_array($this->Auth->user('role'), $role)) {
                 $this->Session->setFlash("Para acceder a esa opcion debes tener permiso.");
                 $this->redirect(array('action' => 'index'));
            }
   }

    public function buscar($from = NULL){
        $this->_isAuthorized(array('admin','invitado','usuario'));
        switch ($from){
           case 1: $titulo = 'Datos de calibracion';
                   $modelo = 'Datosdecalibracione'; 
                   $campo_fecha = 'fecha';
                   $variable = 'datosdecalibraciones';
                   $order = "Datosdecalibracione.lmo ASC";
               break;
           case 2: $titulo = 'Muestreos PTS';
                   $modelo = 'MuestreosPt'; 
                   $campo_fecha = 'fecha_montaje';
                   $variable = 'muestreosPts';
                   $order = 'MuestreosPt.elemento_id'.','.'MuestreosPt.numero_muestreo ASC';
               break;
           case 3: $titulo = 'Muestreos PM10';
                   $modelo = 'MuestreosPm10'; 
                   $campo_fecha = 'fecha_montaje';
                   $variable = 'muestreosPm10s';
                   $order = 'MuestreosPm10.elemento_id'.','.'MuestreosPm10.numero_muestreo ASC';
               break;
           case 4: $titulo = 'Muestreos PM2.5';
                   $modelo = 'MuestreosPm25'; 
                   $campo_fecha = 'fecha_montaje';
                   $variable = 'muestreosPm25s';
                   $order = 'MuestreosPm25.numero_muestreo ASC';
               break;
           
        }
        if ($this->request->is('post')) {
              //print_r($this->request->data);
               $ciclosid =     $this->request->data['buscar']['ciclos_id'];
               $estacionesid = $this->request->data['buscar']['estaciones_id'];
               $anio =         $this->request->data['buscar']['anio']['year'];
               /*******realiza la busqueda************************************/
               $this->loadModel($modelo);
               $$variable = $this->$modelo->find('all',array(
                         'conditions' => array($modelo.'.ciclos_id' => $ciclosid,
                                               $modelo.'.estaciones_id' => $estacionesid,
                                               $modelo.'.'.$campo_fecha.' LIKE' => $anio."%"),
                          'order' => array($order )   ));
                                        //print_r($data);
               
               
	}
        $this->loadModel("Estacione");
                $proyectos = array('Escoja un Proyecto'); 
               $push = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
                //print_r($push);
                for($i = 1; $i<= count($push); $i++){
                    array_push($proyectos,$push[$i]);
                }
               
                //carga las estaciones
                //print_r($this->request);
                if($this->request->data['buscar']['proyectos_id'] != 0){
                    $estaciones = $this->Estacione->find('list', array(
                        'fields'     => array('Estacione.nombre'),
                        'conditions' => array('Estacione.proyecto_id' => $this->request->data['buscar']['proyectos_id'] )));
                }else{
                    $estaciones = array('Escoja una Estacion');
                } 
                
        $this->loadModel("Ciclo");
                $ciclostemp = $this->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
                if($estaciones == 'Escoja una Estacion'){
                    $proyectos = array('Escoja un Proyecto'); 
                }
       $this->set(compact('from', 'titulo','proyectos','estaciones','ciclos',$variable,'variable')); 
    }

//    //Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
public function getestacionesselect(){
    //print_r($this->request);
    $this->loadModel("Estacione");
    if($this->request->data['buscar']['proyectos_id'] != 0){
    $estaciones = $this->Estacione->find('list', array(
             'fields'     => array('Estacione.nombre'),
             'conditions' => array('Estacione.proyecto_id' => $this->request->data['buscar']['proyectos_id'] )));
    }else{
        $estaciones = array('Escoja una Estacion');
    }
         $this->set(compact('estaciones','proyectos'));
}

  //CARGA MASIVA
    public function cargamasiva($from = NULL){
        $this->_isAuthorized(array('admin','usuario'));
        $cargadatos = new Funcionescargadedatosmasivos();
        $respuesta = 'NULL';
        switch ($from){
           case 1: $titulo = 'Datos de calibracion';
                   $modelo = 'Datosdecalibracione';
                   $funcion = 'cargadatoscalibracion';
                   $query = 'INSERT INTO datosdecalibraciones (`ciclos_id`, `estaciones_id`, `fecha`, `temperatura`, `lmo`, `lro`, `qcf`, `qcm`, `qcms`, `responsables`) VALUES ';
               break;
           case 2: $titulo = 'Muestreos PTS';
                   $modelo = 'MuestreosPt';
                   $funcion = 'cargadatospts';
                   $query = 'INSERT INTO `muestreos_pts` (`ciclos_id`, `estaciones_id`, `elemento_id`, `numero_muestreo`, `fecha_montaje`, `hora_montaje`, `fecha_recoleccion`, `hora_recoleccion`, `temperatura`, `periodo_minutos`, `flujo_cr`, `qcm`, `volumen`, `temperatura_inicio`, `temperatura_fin`, `microgramo`, `microgramo_metro_cubico`, `microgramo_elemento`, `microgramo_metro_cubico_elemento`) VALUES ';
               break;
           case 3: $titulo = 'Muestreos PM10';
                   $modelo = 'MuestreosPm10'; 
                   $funcion = 'cargadatospm10';
                   $query = 'INSERT INTO `muestreos_pm10s` (`ciclos_id`, `estaciones_id`, `elemento_id`, `numero_muestreo`, `fecha_montaje`, `hora_montaje`, `fecha_recoleccion`, `hora_recoleccion`, `pulgadas_agua`, `pulgadas_hg`, `p1_po_p`, `p1_po`, `volumen`, `microgramo`, `microgramo_metro_cubico`, `microgramo_elemento`, `microgramo_metro_cubico_elemento`, `temperatura_inicial`, `temperatura_final`) VALUES ';
               break;
           case 4: $titulo = 'Muestreos PM2.5';
                   $modelo = 'MuestreosPm25'; 
                   $funcion = 'cargadatospm25';
                   $query = 'INSERT INTO `muestreos_pm25s` (`ciclos_id`, `estaciones_id`, `numero_muestreo`, `fecha_montaje`, `hora_montaje`, `fecha_recoleccion`, `hora_recoleccion`, `tiempo_total`, `flujo`, `volumen_final`, `microgramo`, `microgramo_metro_cubico`, `temperatura`) VALUES ';
               break;
           
        }//end switch
         if ($this->request->is('post')) {
              //print_r();
                //print_r($_FILES);
                $name= $_FILES["file"]["name"];
                $allowedExts = array("csv","txt");
                $extension = end(explode(".", $_FILES["file"]["name"]));
                
                //$newFileName= $name;

                if (in_array($extension, $allowedExts)){
                        if ($_FILES["file"]["error"] > 0){
                          echo "Codigo error: " . $_FILES["file"]["error"] . "<br>";
                        }else{
                                        move_uploaded_file($_FILES["file"]["tmp_name"],WWW_ROOT .'files\\'. $_FILES["file"]["name"]);
                                        $moved_file=WWW_ROOT .'files\\'.$_FILES["file"]["name"];
                                        $archivo = fopen($moved_file, "r");
                                        
                                       //llamo a la funcion que procesa la carga masiva de datos de calibracion
                                       if($archivo){
                                          $query = $cargadatos->$funcion($archivo,$query);
                                          $this->loadModel($modelo);
                                                 $respuesta = $this->$modelo->query($query,$cachequeries = false);
                                                //echo $respuesta;
                                       }
                                      
                                       if(empty($respuesta)){
                                               $this->Session->setFlash(__('La carga Masiva se proceso Efectivamente'));
                                           }else{
                                               $this->Session->setFlash(__('La carga Masiva no se proceso Efectivamente'));
                                           }
     
                        }
                }else{
                    
                    $this->Session->setFlash(__('Debe seleccionar un archivo correcto.'));
                    
                }


        }               
               
	
        $this->set(compact('from', 'titulo','respuesta')); 
    }//end cargamasiva
    //Forma parte de las graficas generales osea que involucran todos los muestreos y tipos de particulas.
    public function graficapromedio() {
        
             $this->layout = 'graficasgeneralespromedios'; 
             $grafprom = New Graficasgenerales();
           if ($this->request->is('post')) {
               //print_r($this->request->data);
               
               $anio = $this->request->data['anio']['year'];
               $proyecto = $this->request->data['proyectos_id'];
               $promedios = $grafprom->getDataPromedios($anio, $proyecto); 
               
               $grafpromediogeneral = $grafprom->procesaPromediosGenerales($promedios);
               
               $this->loadModel("Estacione");
               $proyectonombre = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre'),
                    'conditions' => array('Proyecto.id' => $proyecto)));
                foreach ($proyectonombre as $value) {
                    $proyecto = $value;
                    
                }
                
               $this->set(compact('grafpromediogeneral','proyecto','anio'));
               $this->render('procesapromediogeneral');
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
           

           $this->set(compact('proyectos','elementos'));

            
    }
    public function popupPromedioGeneral() {
           
           $this->layout = 'graficasgeneralespromedios';
           //print_r($datafechaxmuestreo);
    }
        


   
    
}
