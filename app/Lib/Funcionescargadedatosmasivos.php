<?php



class Funcionescargadedatosmasivos{
    //Procesa el arcvhivo para carga masiva de los datos de calibracion
     
    
   public function cargadatoscalibracion($archivo = NULL,$query = NULL){
        $linea = fgets($archivo);
        if(!empty($linea)){
            $valores = explode(";", $linea);

            $ciclo = $valores[0];
            $estacion = $valores[1];
            $fecha = $valores[2];
            $temperatura = $valores[3];
            $responsables = $valores[4];
        }
        while (!feof($archivo)) {
           $linea = fgets($archivo);
//                                           print_r($linea);
//                                           echo "<BR>";
           if($linea == 0){
               $linea = fgets($archivo);
               $valores = explode(";", $linea);
               $ciclo = $valores[0];
               $estacion = $valores[1];
               $fecha = $valores[2];
               $temperatura = $valores[3];
               $responsables = $valores[4];
               //$query .= 'INSERT INTO datosdecalibraciones VALUES ';
           }else{
               //print_r($valores);
               $valores = explode(";", $linea);
                $query .= "(".$ciclo.", ".$estacion.", '".$fecha."', ".$temperatura.", ".round($valores[0],2,PHP_ROUND_HALF_DOWN).", ".round($valores[1],2,PHP_ROUND_HALF_DOWN).", ".round($valores[2],2,PHP_ROUND_HALF_DOWN).", ".round($valores[3],2,PHP_ROUND_HALF_DOWN).", ".round($valores[4],2,PHP_ROUND_HALF_DOWN).", '".$responsables."') , ";
           }

        }
       
        fclose($archivo);
        $query = rtrim($query, ' , ');
        $query .= ';';
        return ($query);
    }//fin caraga datos calibracion 
    //procesa el archivo para la carga masiva de los muestreos de pts
    public function cargadatospts($archivo = NULL,$query = NULL){
        $linea = fgets($archivo);
        if(!empty($linea)){
            $valores = explode(";", $linea);

            $ciclo = trim($valores[0]);
            $estacion = trim($valores[1]);
            $elemento = trim($valores[2]);
            
        }
        while (!feof($archivo)) {
           $linea = fgets($archivo);
//              print_r($linea);
//              echo "<BR>";
           if($linea == 0){
               $linea = fgets($archivo);
               $valores = explode(";", $linea);
               $ciclo = trim($valores[0]);
               $estacion = trim($valores[1]);
               $elemento = trim($valores[2]);
               //$query .= 'INSERT INTO datosdecalibraciones VALUES ';
           }else{
               //print_r($valores);
               
               $valores = explode(";", $linea);
               for($i = 0; $i < count($valores); $i++){
                   if(empty($valores[$i]) || $valores[$i] == ' '){
                       $valores[$i] = 'NULL';
                   }
               }
               // Guia para saber la posicion de los valores        0NúmeroMuestreo;  1FechaMontaje;  2HoraMontaje;       3FechaRecolección;   4HoraRecolección;   5PeríodoMinutos; 6FlujoC.R; 7Qcm; 8Volumen; 9(µg); 10(µg/m³); 11Temperatura; 12TempInicial; 13TempFinal 	
               //'INSERT    (`ciclos_id`, `estaciones_id`, `elemento_id`numero_muestreo`  fecha_montaje`, `hora_montaje`,     `fecha_recoleccion`, `hora_recoleccion`,`temperatura`,  `periodo_minutos` `flujo_cr`,                                `qcm`,                                          `volumen`,                                    `temperatura_inicio   `temperatura_fin`, `microgramo`,                                `microgramo_metro_cubico`, `microgramo_elemento`, `microgramo_metro_cubico_elemento`)
                $query .= "(".$ciclo.", ".$estacion.", ".$elemento.", ".$valores[0].", '".$valores[1]."', '".$valores[2]."', '".$valores[3]."', '".$valores[4]."', ".$valores[11].", ".$valores[5].", ".round($valores[6],2,PHP_ROUND_HALF_DOWN).", ".round($valores[7],2,PHP_ROUND_HALF_DOWN).", ".round($valores[8],2,PHP_ROUND_HALF_DOWN).", '".$valores[12]."', '".$valores[13]."', ".round($valores[9],2,PHP_ROUND_HALF_DOWN).", ".round($valores[10],2,PHP_ROUND_HALF_DOWN).", NULL, NULL) , ";
           }

        }
        
        fclose($archivo);
        $query = rtrim($query, ' , ');
        $query .= ';';
        //print_r($query);
        return ($query);
    }
    //procesa el archivo para la carga masiva de los muestreos de PM 10
    public function cargadatospm10($archivo = NULL,$query = NULL){
        $linea = fgets($archivo);
        if(!empty($linea)){
            $valores = explode(";", $linea);

            $ciclo = trim($valores[0]);
            $estacion = trim($valores[1]);
            $elemento = trim($valores[2]);
            
        }
        
        while (!feof($archivo)) {
           $linea = fgets($archivo);
              //print_r($linea);
             
              //echo "<BR>";
           if($linea == 0){
               $linea = fgets($archivo);
               $valores = explode(";", $linea);
               $ciclo = trim($valores[0]);
               $estacion = trim($valores[1]);
               $elemento = trim($valores[2]);
               //$query .= 'INSERT INTO datosdecalibraciones VALUES ';
           }else{
               //print_r($valores);
               
               $valores = explode(";", $linea);
               for($i = 0; $i < count($valores); $i++){
                   if(empty($valores[$i]) || $valores[$i] == ' '){
                       $valores[$i] = 'NULL';
                   }else{
                       $valores[$i] = str_replace(',','.',$valores[$i]);
                   }
                   
               }
              
               // Guia para saber la posicion de los valores           0NúmeroMuestreo;   1FechaMontaje;   2HoraMontaje;    3FechaRecolección;   4HoraRecolección;   5pulgadasdeagua; 6pulgadas_hg;     7p1_po_p;                                    8`p1_po`;                                      9volumen;                                     10(µg);                                          11microgramo_metro_cubico`;                                                                            12TempInicial;           13TempFinal 	
               //           `ciclos_id`,`estaciones_id`,`elemento_id`, `numero_muestreo`, `fecha_montaje`, `hora_montaje`, `fecha_recoleccion`, `hora_recoleccion`, `pulgadas_agua`, `pulgadas_hg`,    `p1_po_p`,                                     `p1_po`,                                       `volumen`,                                  `microgramo`,                                      microgramo_metro_cubico`,                microgramo_elemento``microgramo_metro_cubico_elemento`, `temperatura_inicial`, `temperatura_final`)
                $query .= "(".$ciclo.", ".$estacion.", ".$elemento.", ".$valores[0].", '".$valores[1]."', '".$valores[2]."', '".$valores[3]."', '".$valores[4]."', ".round($valores[5],2,PHP_ROUND_HALF_DOWN).", ".round($valores[6],2,PHP_ROUND_HALF_DOWN).", ".round($valores[7],2,PHP_ROUND_HALF_DOWN).", ".round($valores[8],3,PHP_ROUND_HALF_DOWN).", ".round($valores[9],2,PHP_ROUND_HALF_DOWN).", ".round($valores[10],2,PHP_ROUND_HALF_DOWN).", ".round($valores[11],2,PHP_ROUND_HALF_DOWN).", NULL , NULL, ".round($valores[15],2,PHP_ROUND_HALF_DOWN).", ".round($valores[16],2,PHP_ROUND_HALF_DOWN).") , ";
           }

        }
        
        fclose($archivo);
        $query = rtrim($query, ' , ');
        $query .= ';';
        //print_r($query);
        return ($query);
    }
     //procesa el archivo para la carga masiva de los muestreos de PM 2.5
    public function cargadatospm25($archivo = NULL,$query = NULL){
        $linea = fgets($archivo);
        if(!empty($linea)){
            $valores = explode(";", $linea);

            $ciclo = trim($valores[0]);
            $estacion = trim($valores[1]);
           
            
        }
        
        while (!feof($archivo)) {
           $linea = fgets($archivo);
              //print_r($linea);
              
              //echo "<BR>";
           if($linea == 0){
               $linea = fgets($archivo);
               $valores = explode(";", $linea);
               $ciclo = trim($valores[0]);
               $estacion = trim($valores[1]);
               
               //$query .= 'INSERT INTO datosdecalibraciones VALUES ';
           }else{
               //print_r($valores);
               
               $valores = explode(";", $linea);
               for($i = 0; $i < count($valores); $i++){
                   if(empty($valores[$i]) || $valores[$i] == ' '){
                       $valores[$i] = 'NULL';
                   }else{
                       $valores[$i] = str_replace(',','.',$valores[$i]);
                   }
                   
               }
              
               // Guia para saber la posicion de los valores     
               //                                       0NúmeroMuestreo;   1FechaMontaje;   2HoraMontaje;    3FechaRecolección;   4HoraRecolección;  5tiempototal;   6flujo;                                          7Volumen final;                               8microgramo                                      9microgramo_metro_cubico;                  10temperatura
               //           `ciclos_id``estaciones_id`  numero_muestreo`,`fecha_montaje`, `hora_montaje`, `fecha_recoleccion`, `hora_recoleccion`,  `tiempo_total`,   `flujo`,                                     `volumen_final`,                                `microgramo`,                                   `microgramo_metro_cubico`,                  `temperatura`) VALUES ';
                $query .= "(".$ciclo.", ".$estacion.", ".$valores[0].", '".$valores[1]."', '".$valores[2]."', '".$valores[3]."', '".$valores[4]."', ".$valores[5].", ".round($valores[6],2,PHP_ROUND_HALF_DOWN).", ".round($valores[7],2,PHP_ROUND_HALF_DOWN).", ".round($valores[8],2,PHP_ROUND_HALF_DOWN).", ".round($valores[9],2,PHP_ROUND_HALF_DOWN).", ".round($valores[10],2,PHP_ROUND_HALF_DOWN).") , ";
           }

        }
        
        fclose($archivo);
        $query = rtrim($query, ' , ');
        $query .= ';';
        print_r($query);
        return ($query);
    }
}
 
    
?>
