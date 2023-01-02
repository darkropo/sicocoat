<?php
App::uses('AppController', 'Controller');

class Graficasgenerales extends AppController {
    
    //Obtiene la data para crear la grafica del promedio 
       public function getDataPromedios($anio, $proyecto) {
           //print_r($elementoid);
           $datagrafpromedio = NULL;
           $i= 0;
           $particula = array('MuestreosPt','MuestreosPm10','MuestreosPm25');
           //Busca todas las estaciones relacionadas con el proyecto escogido
           $this->loadModel('Estacione');
           $estaciones = $this->Estacione->find('list', array(
             'fields'     => array('Estacione.id'),
             'conditions' => array('Estacione.proyecto_id' => $proyecto )));   
            //Busca todos los ciclos
            $this->loadModel('Ciclo');
            $ciclos = $this->Ciclo->find('list', array(
                'fields' => array('Ciclo.id')));
            $this->loadModel('Elemento');
            $elementos = $this->Elemento->find('list', array(
                'fields' => array('Elemento.id'),
                'conditions' => array('Elemento.nombre ' => array('Pts','Pm10'))
                ));
            foreach ($particula as $key => $modelo){
                $this->loadModel($modelo);
                 foreach ($estaciones as $key => $value) {
                     if($modelo == 'MuestreosPm25'){
                         $datagrafpromedio[$i] = $this->$modelo->find('all', array(
                        'conditions' => array($modelo.'.ciclos_id' => $ciclos,
                                              $modelo.'.estaciones_id' => $value,
                                              $modelo.'.fecha_recoleccion LIKE ' => $anio."%"),
                        'order' => array($modelo.'.estaciones_id', $modelo.'.ciclos_id', $modelo.'.numero_muestreo ASC' ),));
                        
                     }else{
                        $datagrafpromedio[$i] = $this->$modelo->find('all', array(
                             'conditions' => array($modelo.'.ciclos_id' => $ciclos,
                                                   $modelo.'.estaciones_id' => $value,
                                                   $modelo.'.elemento_id' => $elementos,
                                                   $modelo.'.fecha_recoleccion LIKE ' => $anio."%"),
                             'order' => array($modelo.'.estaciones_id', $modelo.'.ciclos_id', $modelo.'.numero_muestreo ASC' ),));
                        
                     }
                     $i++;
                } 
            }//foreach particula
           //print_r($datagrafpromedio);
           return $datagrafpromedio;
       }
//Procesa la data y la envia para crear la graficade los promedios generales       
       public function procesaPromediosGenerales($datagrafpromedio){
           $this->layout = 'graficasgeneralespromedios';
           //print_r($datagrafpromedio);
           
           //DATA GRAFICO promedio GENERAL
           $contpromediopts = 0;
           $contpromediopm10 = 0;
           $contpromediopm25 = 0;
           $prompts = 0;
           $prompm10 = 0;
           $prompm25 = 0;
           foreach($datagrafpromedio as $temp){
               
                       
                       foreach ($temp as $value) {
//                            echo "primero<BR>";
//                            print_r($value);
//                            echo "<BR>segundo";
                                if($value['MuestreosPt']){

                                 $prompts = $prompts + $value['MuestreosPt']['microgramo_metro_cubico'];
                                 $contpromediopts++;
                                }
                                if($value['MuestreosPm10']){
                                    $prompm10 = $prompm10 + $value['MuestreosPm10']['microgramo_metro_cubico']; 
                                    $contpromediopm10++;
                                }
                                if($value['MuestreosPm25']){
                                    $prompm25 = $prompm25 + $value['MuestreosPm25']['microgramo_metro_cubico']; 
                                    $contpromediopm25++;
                                }
                           
                       }
                        
     
           }//for
           
           $prompts = round($prompts / $contpromediopts,2,PHP_ROUND_HALF_DOWN);
           $prompm10 = round($prompm10 / $contpromediopm10,2,PHP_ROUND_HALF_DOWN);
           $prompm25 = round($prompm25 / $contpromediopm25,2,PHP_ROUND_HALF_DOWN);
           //echo 'pm10 ='.$contpromediopm10.'<BR> pm25 = '.$contpromediopm25.'<BR> pts = '.$contpromediopts;
            $grafpromediogeneral = "[['PTS - ".$prompts."', ".$prompts."],['PM10 - ".$prompm10."', ".$prompm10."],['PM25 - ".$prompm25."', ".$prompm25."]]" ;
            
            //DATA GRAFICO promedio

           //$this->set(compact('grafpromediogeneral'));
           
           return $grafpromediogeneral;
          
       }

    
}

?>
