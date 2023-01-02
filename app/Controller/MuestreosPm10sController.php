<?php
App::uses('AppController', 'Controller');
App::uses('Funcionesmatematicas', 'Lib');
/**
 * MuestreosPm10s Controller
 *
 * @property MuestreosPm10 $MuestreosPm10
 */
class MuestreosPm10sController extends AppController {

/**
 * index method
 *
 * @return void
 * 
 */
        public $helpers = array('Html','Js' => array('Jquery'));    
        public $components = array('RequestHandler');
        
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->MuestreosPm10->recursive = 0;
                $this->paginate = array('limit' => 11);
		$this->set('muestreosPm10s', $this->paginate());
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
		$this->MuestreosPm10->id = $id;
		if (!$this->MuestreosPm10->exists()) {
			throw new NotFoundException(__('Muestreo pm10 Invalido'));
		}
		$this->set('muestreosPm10', $this->MuestreosPm10->read(null, $id));
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
			$this->MuestreosPm10->create();
			if ($this->MuestreosPm10->save($this->request->data)) {
                            //print_r($this->request->data);
                            $ciclo = $this->request->data['MuestreosPm10']['ciclos_id'];
                            $estacion = $this->request->data['MuestreosPm10']['estaciones_id'];;
                            $elemento =$this->request->data['MuestreosPm10']['elemento_id'];
                            $year = $this->request->data['MuestreosPm10']['fecha_montaje'];
                            $this->set(compact('ciclo','estacion','year','elemento'));
				$this->Session->setFlash(__('El muestreo pm10 fue guardado.'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El muestreo pm10 no pudo ser guardado.'));
			}
		}
                $this->loadModel("Estacione");
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
                $ciclostemp = $this->MuestreosPm10->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
		$estaciones = $this->MuestreosPm10->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
		$elementos = $this->MuestreosPm10->Elemento->find('list', array(
                    'fields'     => array('Elemento.nombre')));
		$this->set(compact('ciclos', 'estaciones', 'elementos','proyectos'));
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
		$this->MuestreosPm10->id = $id;
		if (!$this->MuestreosPm10->exists()) {
			throw new NotFoundException(__('Muestreo pm10 Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MuestreosPm10->save($this->request->data)) {
				$this->Session->setFlash(__('El muestreo pm10 fue guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El muestreo pm10 no pudo ser guardado.'));
			}
		} else {
			$this->request->data = $this->MuestreosPm10->read(null, $id);
		}
		$this->loadModel("Estacione");
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
                $ciclostemp = $this->MuestreosPm10->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
		$estaciones = $this->MuestreosPm10->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
		$elementos = $this->MuestreosPm10->Elemento->find('list', array(
                    'fields'     => array('Elemento.nombre')));
		$this->set(compact('ciclos', 'estaciones', 'elementos','proyectos'));
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
		$this->MuestreosPm10->id = $id;
		if (!$this->MuestreosPm10->exists()) {
			throw new NotFoundException(__('Muestreo pm10 Invalido'));
		}
		if ($this->MuestreosPm10->delete()) {
			$this->Session->setFlash(__('Muestreo pm10 Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El Muestreo pm10 no pudo ser Borrado'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function listpm10($ciclo = NULL, $estacion = NULL, $year = NULL,$elemento = NULL){
                  //echo "pm10".$ciclo.','.$estacion.','.$year.','.$elemento;     
                $pm10 = null;
               // print_r($this->request->params);
               $year = substr($year, 0, 4); 
               //echo 'aqui'.$year.'aqui';
               if($ciclo){
                   $sql = "SELECT `MuestreosPm10`.`id`, `MuestreosPm10`.`ciclos_id`,
                                  `MuestreosPm10`.`estaciones_id`, `MuestreosPm10`.`elemento_id`,
                                  `MuestreosPm10`.`numero_muestreo`, `MuestreosPm10`.`fecha_montaje`,
                                  `MuestreosPm10`.`hora_montaje`, `MuestreosPm10`.`fecha_recoleccion`,
                                  `MuestreosPm10`.`hora_recoleccion`, `MuestreosPm10`.`pulgadas_agua`,
                                  `MuestreosPm10`.`pulgadas_hg`, `MuestreosPm10`.`p1_po_p`,
                                  `MuestreosPm10`.`p1_po`, `MuestreosPm10`.`volumen`,
                                  `MuestreosPm10`.`microgramo`, `MuestreosPm10`.`microgramo_metro_cubico`,
                                  `MuestreosPm10`.`microgramo_elemento`,
                                  `MuestreosPm10`.`microgramo_metro_cubico_elemento`,
                                  `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                  `Ciclo`.`nombre`, `Ciclo`.`fecha_inicio`, `Ciclo`.`fecha_fin`,
                                  `Estacione`.`id`, `Estacione`.`proyecto_id`, `Estacione`.`nombre`,
                                  `Estacione`.`ubicacion`, `Estacione`.`coordenadas`, `Elemento`.`id`,
                                  `Elemento`.`nombre` 
                                  FROM `sicocoat`.`muestreos_pm10s` AS `MuestreosPm10` 
                                  LEFT JOIN `sicocoat`.`ciclos` AS `Ciclo` 
                                  ON (`MuestreosPm10`.`ciclos_id` = `Ciclo`.`id`) 
                                  LEFT JOIN `sicocoat`.`estaciones` AS `Estacione` 
                                  ON (`MuestreosPm10`.`estaciones_id` = `Estacione`.`id`) 
                                  LEFT JOIN `sicocoat`.`elementos` AS `Elemento` 
                                  ON (`MuestreosPm10`.`elemento_id` = `Elemento`.`id`) 
                                  WHERE (`MuestreosPm10`.`ciclos_id` = ". $ciclo .") 
                                  AND (`MuestreosPm10`.`estaciones_id` = ". $estacion .")
                                  AND (`MuestreosPm10`.`elemento_id` = ". $elemento .")"; 
                                   //para cuando guarden un muestreo sin fecha
                                   if($year != 'NULL'){
                                       $sql .= " AND (`MuestreosPm10`.`fecha_montaje` LIKE '". $year ."%')";
                                   }
                                     
                                  
                    $pm10 = $this->MuestreosPm10->query($sql);
                   
               } 
                
    
                     
                 
                  
                            if (!empty($this -> request -> params['requested'])){
                                   return $pm10;
                            }
                            else{
                                
                                $this->set('pm10');
                            }

                }
//Funcion encargada de llenar los datos del formulario para escoger la grafica
        public function graficaDatosPm10(){
           $this->layout = 'graficapm10'; 
           if ($this->request->is('post')) {
               //print_r($this->request->data);
               $ciclosid = $this->request->data['MuestreosPm10']['ciclos_id'];
               $estacionesid = $this->request->data['estaciones'];
               $anio = $this->request->data['MuestreosPm10']['anio']['year'];
               $elementoid =  $this->request->data['MuestreosPm10']['elemento_id'];
               $datafechaxmuestreo = $this->getData($ciclosid, $estacionesid, $anio,$elementoid);
               $this->procesaMuestreo($datafechaxmuestreo);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
           $elementostemp = $this->MuestreosPm10->Elemento->query("
                            SELECT distinct `elementos`.`id`, `elementos`.`nombre`
                            FROM elementos, muestreos_pm10s 
                            WHERE (`elementos`.`id` = muestreos_pm10s.elemento_id)");
           foreach ($elementostemp as $value) {
               
               $elementos[$value['elementos']['id']] = $value['elementos']['nombre'];
               
           }         
           $ciclostemp = $this->MuestreosPm10->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
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
                //print_r($ciclos);
//            $estaciones = $this->Estacione->find('list', array(
//                    'conditions' => array('Estacione.proyecto_id' => $proyectoid),
//                    'fields'     => array('Estacione.nombre')));
           $this->set(compact('proyectos','ciclos','estaciones','elementos'));
           
            
           
       }
//grafica promedio funcion encargada de llenar los datos del formulario
    public function graficapromedio(){
         $this->layout = 'graficapm10'; 
           if ($this->request->is('post')) {
              //print_r($this->request->data);
               $ciclosid =     $this->request->data['MuestreosPm10']['ciclos_id'];
               $estacionesid = $this->request->data['estaciones'];
               $anio =         $this->request->data['MuestreosPm10']['anio']['year'];
               $elementoid =   $this->request->data['MuestreosPm10']['elementos_id']; //no es un elemento es en la tabla elementos el numero 3 que corresponde a PTS
               $datagrafpromedio = $this->getDataPromedio($ciclosid, $estacionesid, $anio,$elementoid);
               //print_r($datafechaxmuestreo);
               $this->procesaMuestreoPromedio($datagrafpromedio);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
           $elementostemp = $this->MuestreosPm10->Elemento->query("
                            SELECT distinct `elementos`.`id`, `elementos`.`nombre`
                            FROM elementos, muestreos_pm10s 
                            WHERE (`elementos`.`id` = muestreos_pm10s.elemento_id)");
           foreach ($elementostemp as $value) {
               
               $elementos[$value['elementos']['id']] = $value['elementos']['nombre'];
               
           }
                //print_r($elementos);

           $ciclostemp = $this->MuestreosPm10->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
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
                
           $this->set(compact('proyectos','ciclos','elementos'));
           
            
    }

//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
       public function getestacionescheck(){
           //print_r($this->request->data);
           $estaciones = $this->MuestreosPm10->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre'),
                    'conditions' => array('Estacione.proyecto_id' => $this->request->data['MuestreosPm10']['proyectos_id'] )));
                $this->set(compact('estaciones'));
       }
//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
       public function getestacionesselect(){
           //print_r($this->request->data);
           $estaciones = $this->MuestreosPm10->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre'),
                    'conditions' => array('Estacione.proyecto_id' => $this->request->data['MuestreosPm10']['proyectos_id'] )));
                $this->set(compact('estaciones'));
       }
//Obtiene la data para el auto llenado del campo volumen
       public function getpm10dataform($tempinicial = NULL , $tempfinal = NULL, $p1p0 = NULL){
           
          
           $temptemporal = 0;
           $temppromedio = (($tempinicial + $tempfinal) / 2);
           //$temppromedio = 40;
           

                for($i=0 ; $i<=40;$i = $i+2.5){
                    if($temppromedio >= 40 ){
                        $temptemporal = 40;
                        break;
                    }
                    if($temppromedio <= 0 ){
                        $temptemporal = 0;
                        break;
                    }
                    
                    if($temppromedio > $i && $temppromedio < $i+2.5){
                        if($temppromedio <= (($i+1.25))){
                            $temptemporal = $i;
                            break;
                        }
                        if($temppromedio >= (($i+1.25))){
                            $temptemporal = $i+2.5;
                            break;
                        } 
                    }
                    
                }//for
                $this->loadModel("FlujoVolumetrico");
                $volumen = $this->FlujoVolumetrico->find('all', array(
                      'fields'         => array('FlujoVolumetrico.valorc'),   
                      'conditions'     => array('FlujoVolumetrico.p1_po' => $p1p0,
                                              'FlujoVolumetrico.temperaturac' => $temptemporal)));
                                     
                //echo $volumen['FlujoVolumetrico']['valorc'];
                    
           die(json_encode(array('volumen' => $volumen[0]['FlujoVolumetrico']['valorc'])));
       }
//Obtiene la data para crear la grafica     
       public function getData($ciclosid,$estacionesid,$anio,$elementoid) {
          //print_r($estacionesid);
           $datafechaxmuestreo = NULL;
           $i= 0;
           foreach ($estacionesid as $key => $value) {
               $datafechaxmuestreo[$i] = $this->MuestreosPm10->find('all', array(
                    'conditions' => array('MuestreosPm10.ciclos_id' => $ciclosid,
                                          'MuestreosPm10.estaciones_id' => $value,
                                          'MuestreosPm10.elemento_id' => $elementoid,  
                                          'MuestreosPm10.fecha_recoleccion LIKE ' => $anio."%"),
                    'order' => array('MuestreosPm10.ciclos_id', 'MuestreosPm10.estaciones_id', 'MuestreosPm10.elemento_id', 'MuestreosPm10.numero_muestreo ASC' )));
               $i++;
           }
           //print_r($datafechaxmuestreo);
           return $datafechaxmuestreo;
       }
//Obtiene la data para crear la grafica del promedio
       public function getDataPromedio($ciclosid,$estacionesid,$anio,$elementoid) {
           //print_r($ciclosid);
           
           $datagrafpromedio = NULL;
           $i= 0;

             foreach ($elementoid as $key => $value) {
               $datagrafpromedio[$i] = $this->MuestreosPm10->find('all', array(
                    'conditions' => array('MuestreosPm10.ciclos_id' => $ciclosid,
                                          'MuestreosPm10.estaciones_id' => $estacionesid,
                                          'MuestreosPm10.elemento_id' => $value,
                                          'MuestreosPm10.fecha_recoleccion LIKE ' => $anio."%"),
                    'order' => array('MuestreosPm10.elemento_id', 'MuestreosPm10.estaciones_id', 'MuestreosPm10.ciclos_id', 'MuestreosPm10.numero_muestreo ASC' ),));
               $i++;
           }
           //print_r($datafechaxmuestreo);
           return $datagrafpromedio;
       }
//Procesa la data y la envia para crear la grafica       
       public function procesaMuestreo($datafechaxmuestreo){
           $this->layout = 'graficapm10';
           //print_r($datafechaxmuestreo);
           $grafpm10 = NULL;
           $estacion = NULL;
           //DATA GRAFICO PM10
           $grafpm10 = "[";
           for($i = 0;$i < count($datafechaxmuestreo); $i++){
               $temp = $datafechaxmuestreo[$i][0];
               if(!empty($temp)){ //entra si hay datos en la consulta a la base de datos
                        $estacion .= $temp['Estacione']['nombre'].','; 
                         $elemento = $temp['Elemento']['nombre'];
                        $grafpm10 .= "[";   

                        foreach ($datafechaxmuestreo[$i] as $value) {
                             //print_r($value);
                           //$grafpm10 .= "[".$value['MuestreosPm10']['numero_muestreo'].",";
                           $grafpm10 .= round($value['MuestreosPm10']['microgramo_metro_cubico'],2,PHP_ROUND_HALF_DOWN).",";
                         }
                    $grafpm10 .= "],";
                }//if
           }//for
           
            $grafpm10 = rtrim($grafpm10, ',');
            $grafpm10 .= ']';
            $estacion = rtrim($estacion, ',');
            //DATA GRAFICO PM10
           
           $this->set(compact('datafechaxmuestreo','ciclo','estacion','fecha','grafpm10','xaxis','yaxis','correl','slope','intercept','elemento'));
           $this->render('procesamuestreo');
          
       }
//Procesa la data y la envia para crear la grafica       
       public function procesaMuestreoPromedio($datagrafpromedio){
           $this->layout = 'graficapromediopm10';
           //print_r($datagrafpromedio);
           //$grafpm10 = "[";
           $estacion = "[";
           $elemento = "{label:";
           $promedioelemento = 0;
           //DATA GRAFICO PTS promedio
           $contpromedio = 0;
           for($i = 0;$i < count($datagrafpromedio); $i++){
               
               $temp = $datagrafpromedio[$i][0];
               if(!empty($temp)){ //entra si hay datos en la consulta a la base de datos
                    //print_r($temp);
                    //echo '/*******************************************************/';
                    //echo '<BR>';
                    $estaciontemp = $temp['MuestreosPm10']['estaciones_id'];
                    $elementotemp = $temp['MuestreosPm10']['elemento_id'];
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
                    if(!empty($temp['Elemento']['nombre'])){
                        $elemento .= '"'.$temp['Elemento']['nombre'].'"},{label:'; 
                    }
                    $grafpm10 .= "[";   
                        
                    foreach ($datagrafpromedio[$i] as $value) {
                         //print_r($value);

                       if( $estaciontemp == $value['MuestreosPm10']['estaciones_id'] ){
                            $contpromedio = $contpromedio + 1;  
                            $promedioelemento = $promedioelemento + $value['MuestreosPm10']['microgramo_metro_cubico'];
                            //echo $contpromedio." ".$value['Estacione']['nombre']."<BR>";

                        }
                        else{
                            //cambio la estacion
                           if($estaciontemp != $value['MuestreosPm10']['estaciones_id']){
                                 $estaciontemp = $value['MuestreosPm10']['estaciones_id']; 
                                 
                                 /// If para no repetir el nombre de las estaciones en la grafica(no tiene que ver con valores numericos)        
                                if(!empty($value['Estacione']['nombre'])){
                                    $busca = strpos($estacion, $value['Estacione']['nombre']);
                                    if($busca === FALSE){
                                        $estacion .= '"'.$value['Estacione']['nombre'].'",'; //asigna las estaciones para setearlas en la grafica
                                        //echo "paso if1".$estacion."<BR>";
                                    }  else {
                                        //echo "ya esta <BR>";
                                    }
                                }// fin if
                                 //echo "paso ifestacion ".$estacion."<BR>";
                                 if($contpromedio != 0){
                                     //echo $contpromedio.'<BR>';
                                     $temppromedioelemento = ($promedioelemento / $contpromedio);
                                     //$contpromedio lo coloco en 1 y le asigno el valor al $promedioelemento
                                     //para no saltarme el primer valor de la siguiente estacion
                                     $contpromedio = 1;
                                     $promedioelemento = $value['MuestreosPm10']['microgramo_metro_cubico'];
                                     if(!empty($temppromedioelemento)){
                                         $grafpm10 .= round($temppromedioelemento,2,PHP_ROUND_HALF_DOWN).",";
                                         //echo $grafpm10 . "=[estaxion".$promedioelemento.", <BR>";
                                     }
                                 }

                           }
                           
                        }//else
                       //echo $promedioelemento.'<BR>';
                       
                     }//foreach promedio
                     if($contpromedio != 0){
                        $promedioelemento = ($promedioelemento / $contpromedio);
                        $contpromedio = 0;
                        if(!empty($promedioelemento)){
                                 $grafpm10 .= "".round($promedioelemento,2,PHP_ROUND_HALF_DOWN)."],[";
                                 //echo $grafpm10 . "=[fuera foreach".$promedioelemento.", <BR>";
                             }  

                     }
                $grafpm10 .= "],";

               }//if no vacio temp
           }//for
           
            $grafpm10 = rtrim($grafpm10, ',');
            $grafpm10 = str_replace(",[]", "" , $grafpm10);
            //$grafpm10 .= ']';
            $estacion = rtrim($estacion, ',');
            $estacion .= "]";
            $elemento = rtrim($elemento, ',{label:');
           
            //DATA GRAFICO promedio

           $this->set(compact('grafpm10','estacion','elemento'));
           $this->render('procesamuestreopromedio');
          
       }
               
//Asigna e layout para la ventana emergente de la grafica
        public function popup() {
           $this->layout = 'graficapm10';
           //print_r($datafechaxmuestreo);
	}
        public function popupPromedio() {
           
           $this->layout = 'graficapromediopm10';
           //print_r($datafechaxmuestreo);
	}
}
