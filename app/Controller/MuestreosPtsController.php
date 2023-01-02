<?php
App::uses('AppController', 'Controller');
App::uses('Funcionesmatematicas', 'Lib');
/**
 * MuestreosPts Controller
 *
 * @property MuestreosPt $MuestreosPt
 */
class MuestreosPtsController extends AppController {

/**
 * index method
 *
 * @return void
 */
         public $helpers = array('Html','Js' => array('Jquery'));    
         public $components = array('RequestHandler');
        
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->MuestreosPt->recursive = 0;
                $this->paginate = array('limit' => 11);
		$this->set('muestreosPts', $this->paginate());
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
		$this->MuestreosPt->id = $id;
		if (!$this->MuestreosPt->exists()) {
			throw new NotFoundException(__('Muestreo Pts Invalido'));
		}
		$this->set('muestreosPt', $this->MuestreosPt->read(null, $id));
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
			$this->MuestreosPt->create();
                     
                        if ($this->MuestreosPt->save($this->request->data)) {
                            //print_r($this->request);
                            $ciclo = $this->request->data['MuestreosPt']['ciclos_id'];
                            $estacion = $this->request->data['MuestreosPt']['estaciones_id'];
                            $elemento =$this->request->data['MuestreosPt']['elementos_id'];
                            $year = $this->request->data['MuestreosPt']['fecha_montaje'];
                            $this->set(compact('ciclo','estacion','elemento','year'));
				$this->Session->setFlash(__('El muestreo ha sido Guardado.'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El muestreo no pudo ser Guardado'));
			} 
                      
                     
		}
                $this->loadModel("Estacione");
               
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		$ciclostemp = $this->MuestreosPt->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
		$estaciones = $this->MuestreosPt->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
		$elementos = $this->MuestreosPt->Elemento->find('list', array(
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
                $ciclos = array();
		$this->MuestreosPt->id = $id;
		if (!$this->MuestreosPt->exists()) {
			throw new NotFoundException(__('Muestreo Pts Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MuestreosPt->save($this->request->data)) {
				$this->Session->setFlash(__('El muestreo ha sido Guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El muestreo no pudo ser Guardado'));
			}
		} else {
			$this->request->data = $this->MuestreosPt->read(null, $id);
		}
		$this->loadModel("Estacione");
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		$ciclostemp = $this->MuestreosPt->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
		$estaciones = $this->MuestreosPt->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
		$elementos = $this->MuestreosPt->Elemento->find('list', array(
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
		$this->MuestreosPt->id = $id;
		if (!$this->MuestreosPt->exists()) {
			throw new NotFoundException(__('Muestreo Pts Invalido'));
		}
		if ($this->MuestreosPt->delete()) {
			$this->Session->setFlash(__('Muestreo Pts Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Muestreo Pts no pudo ser Borrado'));
		$this->redirect(array('action' => 'index'));
	}
        
        /******Listar PTS*******/
        public function listpts($ciclo = NULL, $estacion = NULL, $elemento = NULL,$year = NULL){
                 //echo $ciclo.','.$estacion.','.$elemento.','.$year;     
                $pts = null;
               // print_r($this->request->params);
               $year = substr($year, 0, 4); 
               //echo 'aqui'.$year.'aqui';
               if($ciclo){
                   $sql = "SELECT `MuestreosPt`.`id`, `MuestreosPt`.`ciclos_id`,
                                  `MuestreosPt`.`estaciones_id`, `MuestreosPt`.`elemento_id`,
                                  `MuestreosPt`.`numero_muestreo`, `MuestreosPt`.`fecha_montaje`,
                                  `MuestreosPt`.`hora_montaje`, `MuestreosPt`.`fecha_recoleccion`,
                                  `MuestreosPt`.`hora_recoleccion`, `MuestreosPt`.`temperatura`,
                                  `MuestreosPt`.`periodo_minutos`, `MuestreosPt`.`flujo_cr`,
                                  `MuestreosPt`.`qcm`, `MuestreosPt`.`volumen`,
                                  `MuestreosPt`.`temperatura_inicio`, `MuestreosPt`.`temperatura_fin`,
                                  `MuestreosPt`.`microgramo`, `MuestreosPt`.`microgramo_metro_cubico`,
                                  `MuestreosPt`.`microgramo_elemento`,
                                  `MuestreosPt`.`microgramo_metro_cubico_elemento`,
                                  `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                  `Ciclo`.`nombre`, `Ciclo`.`fecha_inicio`, `Ciclo`.`fecha_fin`,
                                  `Estacione`.`id`, `Estacione`.`proyecto_id`, `Estacione`.`nombre`,
                                  `Estacione`.`ubicacion`, `Estacione`.`coordenadas`, `Elemento`.`id`,
                                  `Elemento`.`nombre` 
                                  FROM `sicocoat`.`muestreos_pts` AS `MuestreosPt` 
                                  LEFT JOIN `sicocoat`.`ciclos` AS `Ciclo` 
                                  ON (`MuestreosPt`.`ciclos_id` = `Ciclo`.`id`) 
                                  LEFT JOIN `sicocoat`.`estaciones` AS `Estacione` 
                                  ON (`MuestreosPt`.`estaciones_id` = `Estacione`.`id`) 
                                  LEFT JOIN `sicocoat`.`elementos` AS `Elemento` 
                                  ON (`MuestreosPt`.`elemento_id` = `Elemento`.`id`) 
                                  WHERE (`MuestreosPt`.`ciclos_id` = ". $ciclo .") 
                                  AND (`MuestreosPt`.`estaciones_id` = ". $estacion .") 
                                  AND (`MuestreosPt`.`elemento_id` = ". $elemento .")";
                                  //para cuando guarden un muestreo sin fecha
                                   if($year != 'NULL'){
                                       $sql .= " AND (`MuestreosPt`.`fecha_montaje` LIKE '". $year ."%')";
                                   }    
                                  
                    $pts = $this->MuestreosPt->query($sql);
                   
               } 

                            if (!empty($this -> request -> params['requested'])){
                                   return $pts;
                            }
                            else{
                                
                                $this->set('pts');
                            }

                }
//FIN LISTPTS
                //Funcion encargada de llenar los datos del formulario para escoger la grafica
        public function graficaDatosPts(){
           $this->layout = 'graficapts'; 
           if ($this->request->is('post')) {
               //print_r($this->request->data);
               $ciclosid = $this->request->data['MuestreosPt']['ciclos_id'];
               //$estacionesid = $this->request->data['Estacione']['estaciones_id'];
               $estacionesid = $this->request->data['estaciones'];
               $anio = $this->request->data['MuestreosPt']['anio']['year'];
               $elementoid =  $this->request->data['MuestreosPt']['elemento_id']; //no es un elemento es en la tabla elementos el numero 3 que corresponde a PTS
               $datafechaxmuestreo = $this->getData($ciclosid, $estacionesid, $anio,$elementoid);
               //print_r($datafechaxmuestreo);
               $this->procesaMuestreo($datafechaxmuestreo);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
           $elementostemp = $this->MuestreosPt->Elemento->query("
                            SELECT distinct `elementos`.`id`, `elementos`.`nombre`
                            FROM elementos, muestreos_pts 
                            WHERE (`elementos`.`id` = muestreos_pts.elemento_id)");
           foreach ($elementostemp as $value) {
               
               $elementos[$value['elementos']['id']] = $value['elementos']['nombre'];
               
           }

           $ciclostemp = $this->MuestreosPt->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
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
           $this->set(compact('proyectos','ciclos','estaciones','proyectos','elementos'));
           
            
           
       }
//grafica promedio funcion encargada de llenar los datos del formulario
    public function graficapromedio(){
         $this->layout = 'graficapts'; 
           if ($this->request->is('post')) {
              //print_r($this->request->data);
               $ciclosid =     $this->request->data['MuestreosPt']['ciclos_id'];
               $estacionesid = $this->request->data['estaciones'];
               $anio =         $this->request->data['MuestreosPt']['anio']['year'];
               $elementoid =   $this->request->data['MuestreosPt']['elementos_id']; //no es un elemento es en la tabla elementos el numero 3 que corresponde a PTS
               $datagrafpromedio = $this->getDataPromedio($ciclosid, $estacionesid, $anio,$elementoid);
               //print_r($datafechaxmuestreo);
               $this->procesaMuestreoPromedio($datagrafpromedio);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
           $elementostemp = $this->MuestreosPt->Elemento->query("
                            SELECT distinct `elementos`.`id`, `elementos`.`nombre`
                            FROM elementos, muestreos_pts 
                            WHERE (`elementos`.`id` = muestreos_pts.elemento_id)");
           foreach ($elementostemp as $value) {
               
               $elementos[$value['elementos']['id']] = $value['elementos']['nombre'];
               
           }
                //print_r($elementos);

           $ciclostemp = $this->MuestreosPt->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
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

//Obtiene la data para crear la grafica
       public function getData($ciclosid,$estacionesid,$anio,$elementoid) {
           //print_r($this->request);
           $datafechaxmuestreo = NULL;
           $i= 0;
           foreach ($estacionesid as $key => $value) {
               $datafechaxmuestreo[$i] = $this->MuestreosPt->find('all', array(
                    'conditions' => array('MuestreosPt.ciclos_id' => $ciclosid,
                                          'MuestreosPt.estaciones_id' => $value,
                                          'MuestreosPt.elemento_id' => $elementoid,  
                                          'MuestreosPt.fecha_recoleccion LIKE ' => $anio."%"),
                    'order' => array('MuestreosPt.ciclos_id', 'MuestreosPt.estaciones_id', 'MuestreosPt.elemento_id', 'MuestreosPt.numero_muestreo ASC' ),));
               $i++;
           }
           //print_r($datafechaxmuestreo);
           return $datafechaxmuestreo;
       }
//Obtiene la data para crear la grafica del promedio
       public function getDataPromedio($ciclosid,$estacionesid,$anio,$elementoid) {
           //print_r($elementoid);
           $datagrafpromedio = NULL;
           $i= 0;
             foreach ($elementoid as $key => $value) {
               $datagrafpromedio[$i] = $this->MuestreosPt->find('all', array(
                    'conditions' => array('MuestreosPt.ciclos_id' => $ciclosid,
                                          'MuestreosPt.estaciones_id' => $estacionesid,
                                          'MuestreosPt.elemento_id' => $value,
                                          'MuestreosPt.fecha_recoleccion LIKE ' => $anio."%"),
                    'order' => array('MuestreosPt.elemento_id', 'MuestreosPt.estaciones_id', 'MuestreosPt.ciclos_id', 'MuestreosPt.numero_muestreo ASC' ),));
               $i++;
           }
           //print_r($datafechaxmuestreo);
           return $datagrafpromedio;
       }
//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
public function getestacionescheck(){
    //print_r($this->request);
    $estaciones = $this->MuestreosPt->Estacione->find('list', array(
             'fields'     => array('Estacione.nombre'),
             'conditions' => array('Estacione.proyecto_id' => $this->request->data['MuestreosPt']['proyectos_id'] )));
         $this->set(compact('estaciones'));
}
//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
public function getestacionesselect(){
    //print_r($this->request);
    $estaciones = $this->MuestreosPt->Estacione->find('list', array(
             'fields'     => array('Estacione.nombre'),
             'conditions' => array('Estacione.proyecto_id' => $this->request->data['MuestreosPt']['proyectos_id'] )));
         $this->set(compact('estaciones'));
}
//Funcion para obtener la data para autollenar el  formulario
public function getptsdataform($ciclo = NULL, $estacion = NULL, $fechai = NULL, $fechaf = NULL, $horai = NULL, $horaf = NULL, $micro = NULL){
    $this->layout = 'ajax';
    //print_r($this->request);
    $xaxis = NULL;
    $yaxis = NULL;
    $flujocr = NULL;
    $cont = 0;
    $qcm = NULL;
    $microsmcubico = NULL;
    $volumen = NULL;
    
    $func = new Funcionesmatematicas();
    $horai = str_replace("-",":",$horai);
    $horaf = str_replace("-",":",$horaf);
    $periodom = $func->date_diff($fechai." ".$horai, $fechaf." ".$horaf);
    $year = substr($fechaf, 0, 4);
    $datos = $this->getDatosCalibracion($ciclo, $estacion, $year);
    //$flujocr = $datos['Datosdecalibracione']['qcms'];
    if(empty($datos)){
    }else{
        foreach ($datos as $value) {
                 $xaxis .= round($value['Datosdecalibracione']['lmo'],2,PHP_ROUND_HALF_DOWN).',';
                 $yaxis .= round($value['Datosdecalibracione']['qcf'],2,PHP_ROUND_HALF_DOWN).',';
                 $flujocr[$cont] = round($value['Datosdecalibracione']['qcms'],2,PHP_ROUND_HALF_DOWN);

                 $cont++;
         }
          //Datos regresion lineal y pendiente de la curva se usan para hallar QCM
          $xaxis = rtrim($xaxis,',');
          $yaxis = rtrim($yaxis,',');     

          $xaxistemp = explode(",",$xaxis);
          $yaxistemp = explode(",",$yaxis);

          $numpos = count($xaxistemp);
                for($i = 0,$y = 3;$i < 3;  $i++,$y-- ){

                    //echo $numpos.'-';
                    $xcorrel[$i] = round($xaxistemp[$numpos-$y],2,PHP_ROUND_HALF_DOWN); 
                    $ycorrel[$i] = round($yaxistemp[$numpos-$y],2,PHP_ROUND_HALF_DOWN); 

               }
              // print_r($xcorrel); 
              // print_r($ycorrel); 
          //SLOPE
          $slope = round($func->GetSlope($xcorrel, $ycorrel),2,PHP_ROUND_HALF_DOWN);
          //SLOPE
          //INTERCEPT
          $intercept = round($func->Intercept($xcorrel, $ycorrel),2,PHP_ROUND_HALF_DOWN);
          //INTERCEPT
          //Datos regresion lineal y pendiente de la curva
          $qcm = round((( $slope * $flujocr[4])  + $intercept ),2,PHP_ROUND_HALF_DOWN);
          $volumen = ( $periodom['minutes_total'] * $qcm );
          $microsmcubico = round(( $micro / $volumen ),2,PHP_ROUND_HALF_DOWN);
    } 
      die(json_encode(array('periodo' => $periodom['minutes_total'],'flujocr' => $flujocr[4],'qcm' => $qcm,'volumen' => $volumen,'micro' => $microsmcubico)));    
}
//Obtiene la data autorellenar el formulario
       public function getDatosCalibracion($ciclosid,$estacionesid,$anio) {
           //print_r($this->request);
           //echo $ciclosid." $ ".$estacionesid." $ ".$anio;
           $this->loadModel("Datosdecalibracione");
           $datareglin = $this->Datosdecalibracione->find('all', array(
                    'conditions' => array('Datosdecalibracione.ciclos_id' => $ciclosid,
                                          'Datosdecalibracione.estaciones_id' => $estacionesid,
                                          'Datosdecalibracione.fecha LIKE ' => $anio."%"),
                    'order' => array('Datosdecalibracione.qcms ASC')));
           
           return $datareglin;
       }

//Procesa la data y la envia para crear la grafica       
       public function procesaMuestreo($datafechaxmuestreo){
           $this->layout = 'graficapts';
           //print_r($datafechaxmuestreo);
           $grafpts = NULL;
           $estacion = NULL;
           //DATA GRAFICO PTS
  
           $grafpts = "[";
           for($i = 0;$i < count($datafechaxmuestreo); $i++){
               $temp = $datafechaxmuestreo[$i][0];
                if(!empty($temp)){ //entra si hay datos en la consulta a la base de datos
               $estacion .= $temp['Estacione']['nombre'].',';
               $elemento = $temp['Elemento']['nombre'];
               $grafpts .= "[";   
                
               foreach ($datafechaxmuestreo[$i] as $value) {
                    //print_r($value);
//                    $xaxis .= $value['MuestreosPt']['fecha_recoleccion'].',';
//                    $yaxis .= round($value['MuestreosPt']['microgramo_metro_cubico'],2,PHP_ROUND_HALF_DOWN).',';
                  //$grafpts .= "[";
                  $grafpts .= round($value['MuestreosPt']['microgramo_metro_cubico'],2,PHP_ROUND_HALF_DOWN).",";
                }
           $grafpts .= "],";
            }//if temp != vacio
           }//for
           
            $grafpts = rtrim($grafpts, ',');
            $grafpts .= ']';
            $estacion = rtrim($estacion, ',');
            //DATA GRAFICO PTS
           
           $this->set(compact('datafechaxmuestreo','ciclo','estacion','fecha','grafpts','xaxis','yaxis','correl','slope','intercept','elemento'));
           $this->render('procesamuestreo');
          
       }
//Procesa la data y la envia para crear la grafica       
       public function procesaMuestreoPromedio($datagrafpromedio){
           $this->layout = 'graficapromediopts';
           //print_r($datagrafpromedio);
           //$grafpts = "[";
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
                    $estaciontemp = $temp['MuestreosPt']['estaciones_id'];
                    $elementotemp = $temp['MuestreosPt']['elemento_id'];
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
                    $grafpts .= "[";   
                        
                    foreach ($datagrafpromedio[$i] as $value) {
                         //print_r($value);

                       if( $estaciontemp == $value['MuestreosPt']['estaciones_id'] ){
                            $contpromedio = $contpromedio + 1;  
                            $promedioelemento = $promedioelemento + $value['MuestreosPt']['microgramo_metro_cubico'];
                            //echo $contpromedio." ".$value['Estacione']['nombre']."<BR>";

                        }
                        else{
                            //cambio la estacion
                           if($estaciontemp != $value['MuestreosPt']['estaciones_id']){
                                 $estaciontemp = $value['MuestreosPt']['estaciones_id']; 
                                 
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
                                     $promedioelemento = $value['MuestreosPt']['microgramo_metro_cubico'];
                                     if(!empty($temppromedioelemento)){
                                         $grafpts .= round($temppromedioelemento,2,PHP_ROUND_HALF_DOWN).",";
                                         //echo $grafpts . "=[estaxion".$promedioelemento.", <BR>";
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
                                 $grafpts .= "".round($promedioelemento,2,PHP_ROUND_HALF_DOWN)."],[";
                                 //echo $grafpts . "=[fuera foreach".$promedioelemento.", <BR>";
                             }  

                     }
                $grafpts .= "],";

               }//if no vacio temp
           }//for
           
            $grafpts = rtrim($grafpts, ',');
            $grafpts = str_replace(",[]", "" , $grafpts);
            //$grafpts .= ']';
            $estacion = rtrim($estacion, ',');
            $estacion .= "]";
            $elemento = rtrim($elemento, ',{label:');
           
            //DATA GRAFICO promedio

           $this->set(compact('grafpts','estacion','elemento'));
           $this->render('procesamuestreopromedio');
          
       }
//Asigna e layout para la ventana emergente de la grafica
       public function popup() {
           
           $this->layout = 'graficapts';
           //print_r($datafechaxmuestreo);
	}
        public function popupPromedio() {
           
           $this->layout = 'graficapromediopts';
           //print_r($datafechaxmuestreo);
	}
}
