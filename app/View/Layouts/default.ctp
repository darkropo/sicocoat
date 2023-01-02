<?php
/**
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
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('localhost','Sicocoat');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                
               
                
		echo $this->Html->css('cake.generic');
                echo $this->Html->css('style');
                
                //css de Jquery ui
                echo $this->Html->css('ui.lightness/jquery');
                //css de Jquery ui     
                //css para los cuadros de dialogo
                echo $this->Html->css('jqdialog');         
                 //JavaScript de Jquery UI           
                
                echo $this->Html->script('jquery-1.9.1');
                echo $this->Html->script('jquery-migrate-1.1.1');
                echo $this->Html->script('jquery.popupWindow');
                echo $this->Html->script('jquery-ui-1.10.1.custom');
                echo $this->Html->script('jqueryui-es');
                echo $this->Html->script('mask-plugin');
                echo $this->Html->script('jqdialog');
                
                
                //datepicker default
//                echo $this->Html->scriptBlock(" $.datepicker.setDefaults({
//                                                 defaultDate: null,
//                                                 dateFormat: 'yy-mm-dd',
//                                                 appendText: '(yyyy-mm-dd)',
//                                                 yearRange: '2002:2013',
//                                                 changeYear: true
//                                                }); ");
                //datepicker default
                
                //mask default
                echo $this->Html->scriptBlock(" $.mask.masks.int = {mask: '99999'} ");
                echo $this->Html->scriptBlock(" $.mask.masks.dec = {mask: '99.999,999,999,999', type: 'reverse', defaultValue: '0000'}");
                echo $this->Html->scriptBlock(" $.mask.masks.decesp = {mask: '999.999,999,999,999', type: 'reverse', defaultValue: '0000'}");
                //mask default
                //JavaScript de Jquery UI
                //Datepicker Jquery UI
//                echo $this->Html->scriptBlock("$(function() { $('#fecha').datepicker(); });");
//                echo $this->Html->scriptBlock("$(function() { $('#fecha_inicio').datepicker(); });");
//                echo $this->Html->scriptBlock("$(function() { $('#fecha_fin').datepicker(); });");
//                echo $this->Html->scriptBlock("$(function() { $('#fecha_montaje').datepicker(); });");
//                echo $this->Html->scriptBlock("$(function() { $('#fecha_recoleccion').datepicker(); });");
                //Datepicker Jquery UI
                // Masacara para la carga de la hora
                    echo $this->Html->scriptBlock("$(function() {  $('#hora_montaje').setMask('time'); });");
                    echo $this->Html->scriptBlock("$(function() {  $('#hora_recoleccion').setMask('time'); });");
                    echo $this->Html->scriptBlock("$(function() {  $('#numero_muestreo').setMask('int'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#microgramopm25').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm25VolumenFinal').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm25Flujo').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm25Temperatura').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm25MicrogramoMetroCubico').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10PulgadasAgua').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10PulgadasHg').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10P1PoP').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10P1Po').setMask('decesp'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10TemperaturaInicial').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10TemperaturaFinal').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10Volumen').setMask('dec'); });");
//                    echo $this->Html->scriptBlock("$(function() {  $('#MuestreosPm10MicrogramoMetroCubico').setMask('dec'); });");
                    
                    //Prueba de mascara para la fecha por si acaso no gusta el datepicker
                    echo $this->Html->scriptBlock("$(function() {  $('#fecha').setMask('date'); });");
                    echo $this->Html->scriptBlock("$(function() {  $('#fecha_montaje').setMask('date'); });");
                    echo $this->Html->scriptBlock("$(function() {  $('#fecha_recoleccion').setMask('date'); });");
                    echo $this->Html->scriptBlock("$(function() {  $('#fecha_inicio').setMask('date'); });");
                    echo $this->Html->scriptBlock("$(function() {  $('#fecha_fin').setMask('date'); });");
                    
                    ////Prueba de mascara para la fecha por si acaso no gusta el datepicker
                // Masacara para la carga de la hora
                //Autocomplete Valor LMO Datos calibraciones Jquery UI
                echo $this->Html->scriptBlock("$(function() { $( '#lmo' ).autocomplete({
                    source: function( request, response ) {
                        var matcher = new RegExp( '^' + $.ui.autocomplete.escapeRegex( request.term ), 'i' );
                        //alert($lmo);
                        response( $.grep( $lmo, function( item ){
                        return matcher.test( item );}));},
                    focus: function(event, ui) { var text = ui.item.value; 
                                $('#lmo').val(text); 
                                return false; 
                            },
                    select: function( event, ui ) { 
                        var x = document.getElementById('lmo').value;
                            $.ajax({
                               url: '/sicocoat/datosdecalibraciones/autoRellena/'+x,
                               type: 'POST',
                               data: {id : x},
                               dataType: 'json',
                               contentType: 'application/json',
                               success: function(data){

                                    //alert(data['result']['0']['Valoresdatoscalibracione']['lro']);
                                   $('#DatosdecalibracioneLro').val(data.result[0]['Valoresdatoscalibracione']['lro']);
                                   $('#DatosdecalibracioneQcf').val(data.result[0]['Valoresdatoscalibracione']['qcf']);
                                   $('#DatosdecalibracioneQcm').val(data.result[0]['Valoresdatoscalibracione']['qcm']);
                                   $('#DatosdecalibracioneQcms').val(data.result[0]['Valoresdatoscalibracione']['qcms']);
                               }
                     });}
                    }); });");
                //Autocomplete Jquery UI
                //Autocompletador de formulario pts
                
                echo $this->Html->scriptBlock("$(function() { 
                    $('#microgramo').blur(function() {

                        var ciclo = document.getElementById('ciclosid').value;
                        var estacion = document.getElementById('estacionesid').value;
                        var fechai = document.getElementById('fecha_montaje').value;
                        var fechaf = document.getElementById('fecha_recoleccion').value;
                        var horai = document.getElementById('hora_montaje').value;
                        var horaf = document.getElementById('hora_recoleccion').value;
                        var micro = document.getElementById('microgramo').value; 

                        horai = horai.replace(/:/g,'-');
                        horaf = horaf.replace(/:/g,'-');
                        //alert(horai+' '+horaf+' '+fecha);
                        $.ajax({
                        url: '/sicocoat/muestreospts/getptsdataform/'+ciclo+'/'+estacion+'/'+fechai+'/'+fechaf+'/'+horai+'/'+horaf+'/'+micro,
                        type: 'POST',
                        data: {ciclo : ciclo, estacion : estacion,fechai : fechai,fechaf : fechaf,horai : horai, horaf : horaf,micro : micro},
                        dataType: 'json',
                        context: 'application/json',
                        success: function(data){
                                if(!data['flujocr']){
                                    $.jqDialog.confirm('Debe Ingresar primero los Datos de calibracion Correspondientes. Escoja SI para redirigirlo a datos de calibracion, NO para quedarse en este Formulario',
                                        function() { self.location='http://localhost/sicocoat/datosdecalibraciones/add'; },		// callback function for 'YES' button
                                        function() {  }		// callback function for 'NO' button
                                        );
                                  }
                                  document.getElementById('MuestreosPtPeriodoMinutos').value = data['periodo'];
                                  document.getElementById('MuestreosPtFlujoCr').value = data['flujocr'];
                                  document.getElementById('MuestreosPtQcm').value = data['qcm'];
                                  document.getElementById('MuestreosPtVolumen').value = data['volumen'];
                                  document.getElementById('MuestreosPtMicrogramoMetroCubico').value = data['micro'];

                       }
                        }).done(function() {
                        $(this).addClass('done');
                        });
                     })
                 });");

//Autocompletador de formulario pts
//Autocompletador de formulario pm2.5
                
                echo $this->Html->scriptBlock("$(function() { 
                    $('#MuestreosPm25VolumenFinal').blur(function() {

                       var micro = document.getElementById('microgramopm25').value; 
                       var volumen = document.getElementById('MuestreosPm25VolumenFinal').value; 

                        //alert(horai+' '+horaf+' '+fecha);
                        $.ajax({
                        url: '/sicocoat/muestreospm25s/getpm25dataform/'+micro+'/'+volumen,
                        type: 'POST',
                        data: {micro : micro,volumen : volumen},
                        dataType: 'json',
                        context: 'application/json',
                        success: function(data){
//                                if(!data['micro']){
//                                    $.jqDialog.alert('This is a non intrusive alert', function() {	// callback function for 'OK' button
//                                              //  alert('This intrusive alert says you clicked OK');
//});
//                                  }
                                  var micrometrocubico = Math.round(data['micro']*100)/100; //COnvierte el valor a un entero con dos decimales  
                                  document.getElementById('MuestreosPm25MicrogramoMetroCubico').value = micrometrocubico;

                       }
                        }).done(function() {
                        $(this).addClass('done');
                        });
                     })
                 });");

                //Autocompletador de formulario pm2.5
                ////Autocompletador de formulario pm10
                echo $this->Html->scriptBlock("$(function() {
                    
                  $('#MuestreosPm10PulgadasAgua').change(function() {
                        //alert('ChANGE'); 
                        var PA = document.getElementById('MuestreosPm10PulgadasAgua').value; 
                        var CONSTANTE_PRESION = 13.6;
                        var CONSTANTE_PRESION_P1_P0 = 29.92;
                        PA = parseFloat(PA);

                        //PULGADAS AGUA

                        document.getElementById('MuestreosPm10PulgadasAgua').value = (PA*2);

                        //PULGADAS HG

                        var PAHG = document.getElementById('MuestreosPm10PulgadasAgua').value; 
                        PAHG = parseFloat(PAHG);
                        PAHG = (PAHG/CONSTANTE_PRESION);
                        PAHG = Math.round(PAHG*100)/100; //COnvierte el valor a un entero con dos decimales
                        document.getElementById('MuestreosPm10PulgadasHg').value = PAHG;

                        //P1=P0-P

                        var P1_P0_P = document.getElementById('MuestreosPm10PulgadasHg').value;
                        P1_P0_P = (CONSTANTE_PRESION_P1_P0 - P1_P0_P);
                        P1_P0_P = Math.round(P1_P0_P*100)/100; //COnvierte el valor a un entero con dos decimales
                        document.getElementById('MuestreosPm10P1PoP').value = P1_P0_P;

                        //P1/P0

                        var P1_P0 = document.getElementById('MuestreosPm10P1PoP').value;
                        P1_P0 = ( P1_P0 / CONSTANTE_PRESION_P1_P0 );
                        P1_P0 = Math.round(P1_P0*1000)/1000; //COnvierte el valor a un entero con dos decimales
                        document.getElementById('MuestreosPm10P1Po').value = P1_P0;

                  }); //change 
                  $('#MuestreosPm10TemperaturaFinal').blur(function() {
                        
                            var tempinicial = document.getElementById('MuestreosPm10TemperaturaInicial').value;
                            var tempfinal = document.getElementById('MuestreosPm10TemperaturaFinal').value;
                            var P1_P0 = document.getElementById('MuestreosPm10P1Po').value;

                            if(P1_P0 == '0.000'){
                                $.jqDialog.alert('Verifique los valores ingresados en el Formulario y ingreselos Correctamente', function() {	// callback function for 'OK' button
                                                      //  alert('This intrusive alert says you clicked OK');
                                                      document.getElementById('MuestreosPm10TemperaturaInicial').value = '0.00';
                                                      document.getElementById('MuestreosPm10TemperaturaFinal').value = '0.00';

                                                });//alert jquery
                            }else{

                                $.ajax({
                                url: '/sicocoat/muestreospm10s/getpm10dataform/'+tempinicial+'/'+tempfinal+'/'+P1_P0,
                                type: 'POST',
                                data: {tempinicial : tempinicial,tempfinal : tempfinal,P1_P0 : P1_P0},
                                dataType: 'json',
                                context: 'application/json',
                                success: function(data){
                                          document.getElementById('MuestreosPm10Volumen').value = data['volumen'];                      }
                                }).done(function() {
                                $(this).addClass('done');
                                });

                            }//else        
                    }); //blur pm10
                    $('#MuestreosPm10Microgramo').blur(function() { 
                        var volumen =  document.getElementById('MuestreosPm10Volumen').value;
                        var microgramo = document.getElementById('MuestreosPm10Microgramo').value;
                        var micrometrocubico = 0;
                        if(volumen == '0.00'){
                            $.jqDialog.alert('Verifique los valores ingresados en el Formulario en el campo volumen y ingreselos Correctamente', function() {	// callback function for 'OK' button
                                                      //  alert('This intrusive alert says you clicked OK');
                                                });//alert jquery
                        }//if
                        else{
                            micrometrocubico = microgramo / volumen;
                             micrometrocubico = Math.round(micrometrocubico*100)/100; //COnvierte el valor a un entero con dos decimales
                            document.getElementById('MuestreosPm10MicrogramoMetroCubico').value = micrometrocubico;
                        }
                    });//blur microgramo   








               });"); //scriptblock pm10
                
                
                ////Autocompletador de formulario pm10
                //proyecto
//                echo $this->Html->scriptBlock("$('#proyecto').val();
//                                                 $('#proyecto option:selected').text();
//                                                 $('#proyecto').change(function() { alert('habemus papam'); });
//                    ");
                //proyecto
                //print_r($lmo);
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="wrapper">
            <div class="left-gap1">
                <?php echo $this->Html->image('spacer.gif', array('alt' => '#', 'border' => 0,'width' => '6', 'height' => '1' )); ?>
            </div>
            <div class="main">

                <?php echo $this->element('cabecera'); ?>

                <div class="mid">
<!--                    <div class="mid-left">
                        <h3>
                        <ul class="left-item">
                        <h3>Resources</h3>
                        <ul class="left-item">
                    </div>-->
                    <div class="content">

                            <?php echo $this->Session->flash(); ?>
                                
                            <?php echo $this->fetch('content');
                             ?>
                    </div>
                </div>
                       
		<?php echo $this->element('pie'); ?>
                
            </div> 
            <div class="right-gap1">
                       <?php echo $this->Html->image('spacer.gif', array('alt' => '#', 'border' => 0,'width' => '6', 'height' => '1' )); ?>
            </div>
	</div>
   
</body>
    
     <?php echo $this->Html->scriptBlock("$('.example4demo').popupWindow({ 
                                                   centerScreen:1,
                                                   resizable:1,
                                                   scrollbars:1,
                                                   height:800, 
                                                   width:975,
                                                   windowName:'$titulo'
                                                  }); "); ?>
	<?php echo $this->element('sql_dump'); ?>
        <?php //para que el jquery funcione
              echo $this->Js->writeBuffer();
        ?>
</html>
