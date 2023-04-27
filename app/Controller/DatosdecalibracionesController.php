<?php
App::uses('AppController', 'Controller');
App::uses('Funcionesmatematicas', 'Lib');

/**
 * Datosdecalibraciones Controller
 *
 * @property Datosdecalibracione $Datosdecalibracione
 */
class DatosdecalibracionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
   
        
        public $helpers = array('Html','Js' => array('Jquery'));    
        public $components = array('RequestHandler');
    
    
	public function index() {
            $this->_isAuthorized(array('admin','invitado','usuario'));
		$this->Datosdecalibracione->recursive = 0;
                $this->paginate = array('limit' => 5);
		$this->set('datosdecalibraciones', $this->paginate());
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
		$this->Datosdecalibracione->id = $id;
		if (!$this->Datosdecalibracione->exists()) {
			throw new NotFoundException(__('Datos de calibraciones Invalido'));
		}
		$this->set('datosdecalibracione', $this->Datosdecalibracione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->_isAuthorized(array('admin','usuario'));
              
		if ($this->request->is('post')) {
			$this->Datosdecalibracione->create();
			if ($this->Datosdecalibracione->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos de calibracion se han Guardado exitosamente'));
                                //print_r($this->request->data);
                                $this->redirect(array('action' => 'add'));
                                
			} else {
				$this->Session->setFlash(__('Los datos de calibracion no se han Guardado exitosamente'));
			}
		}
                $this->loadModel("Estacione");
                $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));
		 $ciclostemp = $this->Datosdecalibracione->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
//		$estaciones = $this->Datosdecalibracione->Estacione->find('list', array(
//                    'fields'     => array('Estacione.nombre')));
                $this->loadModel("Valoresdatoscalibracione");
                $lmo = $this->Valoresdatoscalibracione->find('list', array(
                    'fields'     => array('Valoresdatoscalibracione.lmo')));
                $lmoTemp = "[";
                foreach ($lmo as $key) {
                    $lmoTemp .= '"'.$key.'",'; 
                }
                $lmo = trim($lmoTemp,'Array,');
                $lmo .= "]";
//                

		$this->set(compact('ciclos', 'estaciones','lmo','proyectos'));
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
		$this->Datosdecalibracione->id = $id;
		if (!$this->Datosdecalibracione->exists()) {
			throw new NotFoundException(__('Datos de calibraciones Invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Datosdecalibracione->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos de calibracion se han Guardado exitosamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Los datos de calibracion no se han Guardado exitosamente'));
			}
		} else {
			$this->request->data = $this->Datosdecalibracione->read(null, $id);
		}
		$ciclostemp = $this->Datosdecalibracione->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
                                                                `Ciclo`.`nombre`,`Temporada`.`nombre` 
                                                                FROM `sicocoat`.`ciclos` AS `Ciclo`
                                                                LEFT JOIN `sicocoat`.`temporadas` AS `Temporada` 
                                                                ON (`Ciclo`.`temporada_id` = `Temporada`.`id`)
                                                                WHERE 1 = 1 ");
                foreach ($ciclostemp as $valor) {

                        $ciclos[$valor['Ciclo']['id']] =  $valor['Ciclo']['nombre'].' => '.$valor['Temporada']['nombre'];
                }
		$estaciones = $this->Datosdecalibracione->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre')));
                $this->loadModel("Valoresdatoscalibracione");
                $lmo = $this->Valoresdatoscalibracione->find('list', array(
                    'fields'     => array('Valoresdatoscalibracione.lmo')));
                $lmoTemp = "[";
                foreach ($lmo as $key) {
                    $lmoTemp .= '"'.$key.'",'; 
                }
                $lmo = trim($lmoTemp,'Array,');
                $lmo .= "]";
//                

		$this->set(compact('ciclos', 'estaciones','lmo'));
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
		$this->Datosdecalibracione->id = $id;
		if (!$this->Datosdecalibracione->exists()) {
			throw new NotFoundException(__('Datos de calibraciones Invalido'));
		}
		if ($this->Datosdecalibracione->delete()) {
			$this->Session->setFlash(__('Datos de calibraciones Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Datos de calibraciones no pudo ser Borrado'));
		$this->redirect(array('action' => 'index'));
	}
        
//Autocompletador del formulario de agregar dato de calibracion
       public function autoRellena($lmo = null) {
       $this->layout = 'ajax';

       $this->loadModel("Valoresdatoscalibracione");
       $autorellena = $this->Valoresdatoscalibracione->find('all', array('fields' => array('lro','qcf','qcm','qcms'),
                    'conditions' => array('lmo' => $lmo)    
               ));
           

       die(json_encode(array('result' => $autorellena)));

       }
//Funcion para llenar el combo de las estaciones automaticamente cuando cambia el proyecto       
       public function getestaciones(){
           print_r($this->request->data);
           $estaciones = $this->Datosdecalibracione->Estacione->find('list', array(
                    'fields'     => array('Estacione.nombre'),
                    'conditions' => array('Estacione.proyecto_id' => $this->request->data['Datosdecalibracione']['proyectos_id'] )));
                $this->set(compact('estaciones'));
       }

              public function graficaDatosCal(){
           $this->layout = 'graficas'; 
           if ($this->request->is('post')) {
               //$this->RequestHandler->setContent('json');
               $ciclosid = $this->request->data['Datosdecalibracione']['ciclos_id'];
               $estacionesid = $this->request->data['Datosdecalibracione']['estaciones_id'];
               $anio = $this->request->data['Datosdecalibracione']['anio']['year'];
               $datareglin = $this->getData($ciclosid, $estacionesid, $anio);
               $this->reglineal($datareglin);
               
	   }
           $this->loadModel("Estacione");
           $proyectos = $this->Estacione->Proyecto->find('list', array(
                    'fields'     => array('Proyecto.nombre')));

           $ciclostemp = $this->Datosdecalibracione->Ciclo->query("SELECT `Ciclo`.`id`, `Ciclo`.`temporada_id`,
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
//Obtiene la data para crear la grafica
       public function getData($ciclosid,$estacionesid,$anio) {
           //print_r($this->request);
           $datareglin = $this->Datosdecalibracione->find('all', array(
                    'conditions' => array('Datosdecalibracione.ciclos_id' => $ciclosid,
                                          'Datosdecalibracione.estaciones_id' => $estacionesid,
                                          'Datosdecalibracione.fecha LIKE ' => $anio."%")));
           
           return $datareglin;
       }
//Procesa la data y la envia para crear la grafica       
       public function reglineal($datareglin){
           $this->layout = 'graficas';
           //print_r($datareglin);
           $ciclo = $datareglin[0]['Ciclo']['nombre'];
           $estacion = $datareglin[0]['Estacione']['nombre'];
           $fecha = $datareglin[0]['Datosdecalibracione']['fecha'];
           //echo $ciclo;
           $xaxis = NULL;
           $yaxis = NULL;
           $lro = NULL;
           $qcf = NULL;
           $qcms = null;
           $xcorrel;
           $ycorrel;
           $cont = 0;
           $numpos = 0;
           $grafreglin = null;
           //DATA REGRESION LINEAL
           $grafreglin = '[[';
           foreach ($datareglin as $value) {
             $xaxis .= round($value['Datosdecalibracione']['lmo'],2,PHP_ROUND_HALF_DOWN).',';
             $yaxis .= round($value['Datosdecalibracione']['qcm'],2,PHP_ROUND_HALF_DOWN).',';
             $lro   .= round($value['Datosdecalibracione']['lro'],2,PHP_ROUND_HALF_DOWN).',';
             $qcf   .= round($value['Datosdecalibracione']['qcf'],2,PHP_ROUND_HALF_DOWN).',';
             $qcms  .= round($value['Datosdecalibracione']['qcms'],2,PHP_ROUND_HALF_DOWN).',';
             $grafreglin .= '['.round($value['Datosdecalibracione']['lmo'],2,PHP_ROUND_HALF_DOWN).',';
             $grafreglin .= round($value['Datosdecalibracione']['qcm'],2,PHP_ROUND_HALF_DOWN).'],';
           }
           
            $grafreglin = rtrim($grafreglin, ',');
            $grafreglin .= ']]';
            //DATA REGRESION LINEAL
            $xaxis = rtrim($xaxis,',');
            $yaxis = rtrim($yaxis,',');
            $lro   = rtrim($lro,',');
            $qcf   = rtrim($qcf,',');
            $qcms  = rtrim($qcms,',');
            //echo $xaxis.'-'.$yaxis;
            //CORREL echo $xaxis-$yaxis;
            $correlation = new Funcionesmatematicas();
            $xaxistemp = explode(",",$xaxis);
            $yaxistemp = explode(",",$yaxis);
            $numpos = count($xaxistemp);
            for($i = 0,$y = 3;$i < 3;  $i++,$y-- ){
                
                //echo $numpos.'-';
                $xcorrel[$i] = round($xaxistemp[$numpos-$y],2,PHP_ROUND_HALF_DOWN); 
                $ycorrel[$i] = round($yaxistemp[$numpos-$y],2,PHP_ROUND_HALF_DOWN); 
                
           }
           //print_r($datareglin);
           //print_r($ycorrel);
           $correl = round($correlation->Correlation($xcorrel, $ycorrel),2,PHP_ROUND_HALF_DOWN);
           //echo $correl;
           //CORREL
           //SLOPE
           $slope = round($correlation->GetSlope($xcorrel, $ycorrel),2,PHP_ROUND_HALF_DOWN);
           //SLOPE
           //INTERCEPT
           $intercept = round($correlation->Intercept($xcorrel, $ycorrel),2,PHP_ROUND_HALF_DOWN);
           //INTERCEPT
           
           $this->set(compact('datareglin','ciclo','estacion','fecha','grafreglin','xaxis','yaxis','correl','slope','intercept','lro','qcf','qcms'));
           $this->render('reglineal');
          
       }
//Asigna e layout para la ventana emergente de la grafica
       public function popup() {
           $this->layout = 'graficas';
           //print_r($datareglin);
	}
}
