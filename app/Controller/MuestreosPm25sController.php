<?php
App::uses('AppController', 'Controller');
/**
 * MuestreosPm25s Controller
 *
 * @property MuestreosPm25 $MuestreosPm25
 */
class MuestreosPm25sController extends AppController {

/**
 * index method
 *
 * @return void
 */
        public $helpers = array('Html','Js' => array('Jquery'));    
        public $components = array('RequestHandler');
        
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->MuestreosPm25->recursive = 0;
                $this->paginate = array('limit' => 11);
		$this->set('muestreosPm25s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->MuestreosPm25->id = $id;
		if (!$this->MuestreosPm25->exists()) {
			throw new NotFoundException(__('Muestreo pm 2.5 Invalido'));
		}
		$this->set('muestreosPm25', $this->MuestreosPm25->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
            $ciclos = array();
		if ($this->request->is('post')) {
			$this->MuestreosPm25->create();
			if ($this->MuestreosPm25->save($this->request->data)) {
                            $ciclo = $this->request->data['MuestreosPm25']['ciclos_id'];
                            $estacion = $this->request->data['MuestreosPm25']['estaciones_id'];
                            $year = $this->request->data['MuestreosPm25']['fecha_montaje'];
                            $this->set(compact('ciclo','estacion','year'));
				$this->Session->setFlash(__('El muestreo ha sido Guardado'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El muestreo no pudo ser Guardado.'));
			}
		}
                $this->loadModel("Estacione");
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		 $ciclostemp = $this->MuestreosPm25->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }

		$estaciones = $this->MuestreosPm25->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
		$this->set(compact('ciclos', 'estaciones','proyectos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->_isAuthorized(array('admin','usuario'));
		$this->MuestreosPm25->id = $id;
		if (!$this->MuestreosPm25->exists()) {
			throw new NotFoundException(__('Muestreo pm 2.5 Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MuestreosPm25->save($this->request->data)) {
				$this->Session->setFlash(__('El muestreo ha sido Guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El muestreo no pudo ser Guardado.'));
			}
		} else {
			$this->request->data = $this->MuestreosPm25->read(null, $id);
		}
                $this->loadModel("Estacione");
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		$ciclostemp = $this->MuestreosPm25->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }

		$estaciones = $this->MuestreosPm25->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
		$this->set(compact('ciclos', 'estaciones','proyectos'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
            $this->_isAuthorized(array('admin','usuario'));
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->MuestreosPm25->id = $id;
		if (!$this->MuestreosPm25->exists()) {
			throw new NotFoundException(__('Muestreo pm 2.5 Invalido'));
		}
		if ($this->MuestreosPm25->delete()) {
			$this->Session->setFlash(__('Muestreo Pm 2.5 Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Muestreo Pm 2.5 no pudo ser Borrado'));
		$this->redirect(array('action' => 'index'));
	}
            /******Listar PTS*******/
        public function listpm25($ciclo = NULL, $estacion = NULL, $year = NULL){
                     
                $pm25 = null;
               // print_r($this->request->params);
               $year = substr($year, 0, 4); 
               //echo 'aqui'.$year.'aqui';
               if($ciclo){
                   $sql = "SELECT `MuestreosPm25`.`id`, `MuestreosPm25`.`ciclos_id`,
                       `MuestreosPm25`.`estaciones_id`, `MuestreosPm25`.`numero_muestreo`,
                       `MuestreosPm25`.`fecha_montaje`, `MuestreosPm25`.`hora_montaje`,
                       `MuestreosPm25`.`fecha_recoleccion`, `MuestreosPm25`.`hora_recoleccion`,
                       `MuestreosPm25`.`tiempo_total`, `MuestreosPm25`.`flujo`,
                       `MuestreosPm25`.`volumen_final`, `MuestreosPm25`.`microgramo`,
                       `MuestreosPm25`.`microgramo_metro_cubico`, 
                       `MuestreosPm25`.`temperatura`,`Ciclo`.`id`, `Ciclo`.`temporada_id`,
                       `Ciclo`.`nombre`, `Ciclo`.`fecha_inicio`, `Ciclo`.`fecha_fin`, `Estacione`.`id`,
                       `Estacione`.`proyecto_id`, `Estacione`.`nombre`, `Estacione`.`ubicacion`,
                       `Estacione`.`coordenadas` 
                       FROM `sicocoat`.`muestreos_pm25s` AS `MuestreosPm25` 
                       LEFT JOIN `sicocoat`.`ciclos` AS `Ciclo` 
                       ON (`MuestreosPm25`.`ciclos_id` = `Ciclo`.`id`) 
                       LEFT JOIN `sicocoat`.`estaciones` AS `Estacione` 
                       ON (`MuestreosPm25`.`estaciones_id` = `Estacione`.`id`) 
                       WHERE (`MuestreosPm25`.`ciclos_id` = ". $ciclo .") 
                       AND (`MuestreosPm25`.`estaciones_id` = ". $estacion .")    
                       AND (`MuestreosPm25`.`fecha_montaje` LIKE '". $year ."%') ";
                    $pm25 = $this->MuestreosPm25->query($sql);
                   
               } 
                
    
                     
                 
                  
                            if (!empty($this -> request -> params['requested'])){
                                   return $pm25;
                            }
                            else{
                                
                                $this->set('pm25');
                            }

                }
    //Funcion encargada de llenar los datos del formulario para escoger la grafica
        public function graficaDatosPm25(){
           $this->layout = 'graficapm25'; 
           if ($this->request->is('post')) {
               //print_r($this->request->data);
               $ciclosid = $this->request->data['MuestreosPm25']['ciclos_id'];
               //$estacionesid = $this->request->data['Estacione']['estaciones_id'];
               $estacionesid =$this->request->data['estaciones'];
               $anio = $this->request->data['MuestreosPm25']['anio']['year'];
               $datafechaxmuestreo = $this->getData($ciclosid, $estacionesid, $anio);
               $this->procesaMuestreo($datafechaxmuestreo);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));

           $ciclostemp = $this->MuestreosPm25->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
                foreach ($proyectos as $key => $value) {
                    $proyectoid = $key;
                    break;
                }
                
//            $estaciones = $this->Estacione->find('list', array(
//                    'conditions' => array('Estacione.proyecto_id' => $proyectoid),
//                    'fields'     => array('Estacione.nombre')));
           $this->set(compact('proyectos','ciclos','estaciones'));
           
            
           
       }
//grafica promedio funcion encargada de llenar los datos del formulario
    public function graficapromedio(){
         $this->layout = 'graficapm25'; 
           if ($this->request->is('post')) {
              //print_r($this->request->data);
               $ciclosid =     $this->request->data['MuestreosPm25']['ciclos_id'];
               $estacionesid = $this->request->data['estaciones'];
               $anio =         $this->request->data['MuestreosPm25']['anio']['year'];
               //$elementoid =   $this->request->data['MuestreosPm25']['elementos_id']; //no es un elemento es en la tabla elementos el numero 3 que corresponde a PTS
               $datagrafpromedio = $this->getDataPromedio($ciclosid, $estacionesid, $anio);
               //print_r($datafechaxmuestreo);
               $this->procesaMuestreoPromedio($datagrafpromedio);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
                //print_r($elementos);

           $ciclostemp = $this->MuestreosPm25->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
                foreach ($proyectos as $key => $value) {
                    $proyectoid = $key;
                    break;
                }
                
           $this->set(compact('proyectos','ciclos'));
           
            
    }

//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
       public function getestacionescheck(){
           //print_r($this->request->data);
           $estaciones = $this->MuestreosPm25->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre'),
                    'conditions' => array('Estacione.proyecto_id' => $this->request->data['MuestreosPm25']['proyectos_id'] )));
           //print_r($estaciones);
                $this->set(compact('estaciones'));
       }
//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
       public function getestacionesselect(){
           //print_r($this->request->data);
           $estaciones = $this->MuestreosPm25->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre'),
                    'conditions' => array('Estacione.proyecto_id' => $this->request->data['MuestreosPm25']['proyectos_id'] )));
           //print_r($estaciones);
                $this->set(compact('estaciones'));
       }
//Obtiene la data para crear la grafica
       public function getData($ciclosid,$estacionesid,$anio) {
           //print_r($this->request);
           $datafechaxmuestreo = NULL;
           $i= 0;
           foreach ($estacionesid as $key => $value) {
               $datafechaxmuestreo[$i] = $this->MuestreosPm25->find('all', array(
                    'conditions' => array('MuestreosPm25.ciclos_id' => $ciclosid,
                                          'MuestreosPm25.estaciones_id' => $value,
                                          'MuestreosPm25.fecha_recoleccion LIKE ' => $anio."%")));
               $i++;
           }
           //print_r($datafechaxmuestreo);
           return $datafechaxmuestreo;
       }
//Obtiene la data para crear la grafica del promedio
       public function getDataPromedio($ciclosid,$estacionesid,$anio) {
           //print_r($elementoid);
           $datagrafpromedio = NULL;
           $i= 0;
             foreach ($estacionesid as $key => $value) {
               $datagrafpromedio[$i] = $this->MuestreosPm25->find('all', array(
                    'conditions' => array('MuestreosPm25.ciclos_id' => $ciclosid,
                                          'MuestreosPm25.estaciones_id' => $value,
                                          'MuestreosPm25.fecha_recoleccion LIKE ' => $anio."%"),
                    'order' => array('MuestreosPm25.estaciones_id', 'MuestreosPm25.ciclos_id', 'MuestreosPm25.numero_muestreo ASC' ),));
               $i++;
           }
           //print_r($datafechaxmuestreo);
           return $datagrafpromedio;
       }
//Obtiene la data para el auto llenado del formulario de agregar un muestreo de pm2.5
public function getpm25dataform($micro = NULL, $volumen = NULL){
    
    $microsmcubico = ( $micro / $volumen );
    if(empty($microsmcubico)){
        $microsmcubico = NULL;
    }
     die(json_encode(array('micro' => $microsmcubico)));  
}
//Procesa la data y la envia para crear la grafica       
       public function procesaMuestreo($datafechaxmuestreo){
           $this->layout = 'graficapm25';
           //print_r($datafechaxmuestreo);
           $grafpm25 = NULL;
           $estacion = NULL;
           //DATA GRAFICO PM2.5
           $grafpm25 = "[";
           for($i = 0;$i < count($datafechaxmuestreo); $i++){
               $temp = $datafechaxmuestreo[$i][0];
               if(!empty($temp)){ //entra si hay datos en la consulta a la base de datos
                    $estacion .= $temp['Estacione']['nombre'].',';              
                    $grafpm25 .= "[";   

                    foreach ($datafechaxmuestreo[$i] as $value) {
                         //print_r($value);
                       //$grafpm25 .= "[".$value['MuestreosPm25']['numero_muestreo'].",";
                       $grafpm25 .= round($value['MuestreosPm25']['microgramo_metro_cubico'],2,PHP_ROUND_HALF_DOWN).",";
                     }
                    $grafpm25 .= "],";
                }//if temp
           }//for
           
            $grafpm25 = rtrim($grafpm25, ',');
            $grafpm25 .= ']';
            $estacion = rtrim($estacion, ',');
            //DATA GRAFICO PM2.5
           
           $this->set(compact('datafechaxmuestreo','ciclo','estacion','fecha','grafpm25','xaxis','yaxis','correl','slope','intercept'));
           $this->render('procesamuestreo');
          
       }
//Procesa la data y la envia para crear la grafica       
       public function procesaMuestreoPromedio($datagrafpromedio){
           $this->layout = 'graficapromediopm25';
           //print_r($datagrafpromedio);
           $grafpm25 .= "["; 
           $estacion = "[";
           $promedio = 0;
           //DATA GRAFICO PTS promedio
           $contpromedio = 0;
           for($i = 0;$i < count($datagrafpromedio); $i++){
               
               $temp = $datagrafpromedio[$i][0];
               if(!empty($temp)){ //entra si hay datos en la consulta a la base de datos
                    //print_r($temp);
                    //echo '/*******************************************************/';
                    //echo '<BR>';
                    $estaciontemp = $temp['MuestreosPm25']['estaciones_id'];
                    /// If para no repetir el nombre de las estaciones en la grafica(no tiene que ver con valores numericos)        
                    if(!empty($temp['Estacione']['nombre'])){
                        $busca = strpos($estacion, $temp['Estacione']['nombre']);
                        if($busca === FALSE){
                            $estacion .= '"'.$temp['Estacione']['nombre'].'",';
                            //echo "paso if1".$estacion."<BR>";
                        }  else {
                            //echo "ya esta <BR>";
                        }
                    }// fin if
                    
                    //$grafpm25 .= "[";   
                        
                    foreach ($datagrafpromedio[$i] as $value) {
                         //print_r($value);
                            $contpromedio = $contpromedio + 1;  
                            $promedio = $promedio + $value['MuestreosPm25']['microgramo_metro_cubico'];
                           
                     }//foreach promedio
                     if($contpromedio != 0){
                        $promedio = ($promedio / $contpromedio);
                        $contpromedio = 0;
                        if(!empty($promedio)){
                                 $grafpm25 .= "".round($promedio,2,PHP_ROUND_HALF_DOWN).",";
                                 //echo $grafpm25 . "=[fuera foreach".$promedio.", <BR>";
                             }  

                     }
                //$grafpm25 .= ",";

               }//if no vacio temp
           }//for
           //echo $grafpm25;
            $grafpm25 = rtrim($grafpm25, ',');
            $grafpm25 = str_replace(",[]", "" , $grafpm25);
            $grafpm25 .= ']';
            $estacion = rtrim($estacion, ',');
            $estacion .= "]";
           
            //DATA GRAFICO promedio

           $this->set(compact('grafpm25','estacion'));
           $this->render('procesamuestreopromedio');
          
       }
//Asigna e layout para la ventana emergente de la grafica
       public function popup() {
           $this->layout = 'graficapm25';
           //print_r($datafechaxmuestreo);
	}
        public function popupPromedio() {
           
           $this->layout = 'graficapromediopm25';
           //print_r($datafechaxmuestreo);
	}
}
