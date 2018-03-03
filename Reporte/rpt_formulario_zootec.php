<?php

ini_set('display_errors', '1');

include_once("mpdf/mpdf.php");

include_once ('../clsServicio_matenimiento.php');
include_once ('../clsInspeccion_visual.php');
include_once ('../clsInspeccion_funcionamiento.php');
include_once ('../clsLimpieza.php');
include_once ('../clsDetalle_inspeccion_visual.php');
include_once ('../clsDetalle_inspeccion_funcionamiento.php');
include_once ('../clsDetalle_limpieza.php');



rpt_servicio_mantenimiento("51");

function rpt_servicio_mantenimiento($id_inspeccion)
{ 

$id_servicio=$_GET['id'];

$servicio_mantenimiento=New Servicio_mantenimiento();
$inspeccion_visual= New Inspeccion_visual();
$inspeccion_funcionamiento=New Inspeccion_funcionamiento();
$detalle_inspeccion_visual=New Detalle_inspeccion_visual();
$detalle_inspeccion_funcionamiento=New Detalle_inspeccion_funcionamiento();
$limpieza=New Limpieza();
$detalle_limpieza=New Detalle_limpieza();

$rpt_sm=$servicio_mantenimiento->get_formulario_por_id_y_maquina($id_servicio);
$rpt_inspeccion_visual=$inspeccion_visual->get_formulario_por_id_sm($id_servicio);
$rpt_inspeccion_funcionamiento=$inspeccion_funcionamiento->get_formulario_por_id_sm($id_servicio);
$rpt_limpieza=$limpieza->get_formulario_por_id_sm($id_servicio);
//$rpt_detalle_puntuacion=$detalle_puntuacion->get_formulario_detalle_puntuacion_por_id_sim_y_puntuacion($id_sistema,$id_puntuacion);


$html.='
<!DOCTYPE html>
<html lang="es">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <title>INFORME DE MANTENIMIENTO (Spravac)</title>
     <style type="text/css">
      
      #tabla_contenido{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
      width: 100%;
table-layout: fixed;
display: block;
align-content=center
           table-layout: fixed;
vertical-align: middle;
display: block;
    margin-left: auto;
    margin-right: auto;


               }

               #tabla_contenido2{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
        width: 80%;
align-content=center
           table-layout: fixed;
vertical-align: middle;
display: block;
    margin-left: auto;
    margin-right: auto;


               }


      #tabla_firmajefe{
     left: 500px; top: 200px;    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    align-content=center
           table-layout: fixed;
      vertical-align: middle;
    display: block;
    margin-left: auto;
    margin-right: auto;

             }

      #tabla_puntuacion{
        border:1px solid #000; 
        align-content: top;
        background: #d9ffcc;
        width: 100%;
           table-layout: fixed;
                 }
      
      #tabla_puntuacion2{
        border:1px solid #000; 
        background: #025522";
        width: 100%;
           }

      #tabla_puntuacion3{
        border:1px solid #000; 
        align-content: top;
        color: white;
        background: #025522";

}
       #tabla_puntuacion4{

      width: 100%;

           }

                     #puntajetotal {
            width: 700px;

}


       #tamaño{
                   border:1px solid #000; 

           table-layout: fixed;
      vertical-align: top;
      border

         }


       th{
        color: white;
        height: 50px;
        text-align: center;
                    

       }
       
        #1{
        background-color: #4CAF50;
        color: white;
        height: 75px;
        width: 70px;
        text-align: center;
        font-size: 17px;
        font-family: Times New Roman", Times, serif;

       }

       #2{
        
        text-align: center;
        font-size: 17px;
        font-family: Times New Roman", Times, serif;

       }
       
      #izquierda{
       float: left;
       padding :10px;

     }
       #derecha{
        float: left;
       padding :10px;

   }
      


      
       td{
        height: 40px;
       }
       div{
        height: 100%;
       }
       table
       {
        border-collapse: collapse;
        font-family: arial;
       }
       img
       {
         border: 0px solid #000;
       }
       h4{
          text-align: center;
          font-size: 20px;
          color: #5c59a0;
          border-color= red;

       }
       
       img.center {
 margin: auto;
    display: block; 


}


                 
     </style>
  </head>
  <body>
    <header class="clearfix">
    <table width="100%" style="border-bottom: 0px solid #fffff; vertical-align: middle; font-family: serif; font-size: 9pt; color: #5c59a0;"><tr>
<td width="10%"><img style="width: 30%" src="imagen/incuba.jpg"></td>
<td width="80%" align="center" text-shadow: "2px 2px 4px #000000;"> <span style="font-size:25pt;"  color="#5c59a0" >INFORME DE MANTENIMIENTO (Spravac)</td>
<td width="20%" style="text-align: right;" ><img style="width: 20%"  src="imagen/cabecera.png" ></td></table>
<td width="10%" style="text-align: right;"><span style="font-weight: bold;"><img style="width: 100%" src="imagen/principal.png"></span></td></table>

    <table class="bpmTopnTailC">

      <tr class="headerrow">
        
        <td class="evenrow" >
         <b >COMPAÑIA:</b> Invetsa  <br>
         <b>PLANTA DE INCUBACIÓN:</b>Sofia Planta <br>
         <b>DIRECCIÓN: </b>Santa Cruz - Positos años<br>
         <b >JEFE DE PLANTA: </b>Alfredo B.<br>
         <b >ENCARGADO DE MÁQUINAS: </b>Dr. Carlos<br>
        </td>

        <td  >
         <b>FECHA:</b> 12-Febrero-2018<br>
         <b>HORA DE INGRESO:</b> 02:00:00<br>
         <b>CÓDIGO MÁQUINA:</b> 03:25:00<br>
         <b>ÚLTIMA VISITA:</b> 10-Febrero-2018</br>


        </td>

         <td width="50%" style="text-align: right;">        
         <b>Codigo:</b> R.52<br>
         <b>Revision:</b>00<br>
        </td>
      </tr>
    </TABLE>
     

     
    </header>
  <br><br>  <br>';

   $html.='<main>
      <table style="font-size:26px" cellPadding="40">
         
          <tr>            
            <th  colspan="10" style="background-color: #025522">   <h3>1.- Inpección Visual</h3>
</th> 

</tr>

           
           
           <tr  style="background-color: #4CAF50" >
              <th   style="color: white">Código Sistema</th>
              <th style="color: white">Código Máquina</th>
              <th  width="500" style="color: white" >Descripción</th>
              <th  text-rotate="45" style="color: white"  >Bueno</th>
              <th text-rotate="45" style="color: white">Malo</th>
              <th  style="color: white">Código Sistema</th>
              <th tyle="color: white">Código Máquina</th>
              <th width="500"  style="color: white" >Descripción</th>
              <th text-rotate="25"  style="color: white">Bueno</th>
              <th text-rotate="25"  style="color: white">Malo</th>
            </tr>
            
  

  
         <tr  style=background-color:#E7F3EB>
         <th  border-left="1px solid" colspan="5" style="color: black" align=center>Gabinete</th>  
          <th  colspan="5" style="color: black" align=center>Neomatica</th>

        </tr>



            <tr >
            <td></td>
            <td>ZT50</td>
            <td  width="200" >Plato Divisor del Medio del Gabinete</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT26</td>
            <td width="200">Empaque P/Conector Macho Aire(x10)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


          <tr >
            <td></td>
            <td>ZT51M-ZT51D</td>
            <td  width="200" >Cubierta Trasera con Logo de Merial</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT30</td>
            <td width="200">Plato de MOntaje C/ Tornillos-Manometro</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


          <tr >
            <td>RPTO-00477</td>
            <td>ZT52</td>
            <td  width="200" >Bisagra para la Cubierta del Frente</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPO-00501</td>
            <td>ZT14</td>
            <td width="200">Botón de Reinicio del Contador</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


          <tr >
            <td></td>
            <td>ZT53S-ZT53DNS</td>
            <td  width="200">Cubierta Trasera en Acero Inox</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00502</td>
            <td>ZT16</td>
            <td width="200">Mecanismo Interno Botón Reiniciador</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


          <tr >
            <td></td>
            <td>ZT54-2T54D</td>
            <td  width="200" >Tapa Inferior del Gabinete</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00496</td>
            <td>ZT08</td>
            <td width="200">Interruptor Encendido/Apagado</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


          <tr >
            <td>RPTO-00478</td>
            <td>ZT55</td>
            <td  width="200" >Pata de Goma</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00499</td>
            <td>ZT10</td>
            <td width="200">Mecanismo Interno P/Interruptor On/Off</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


        


        <tr >
            <td></td>
            <td></td>
            <td  width="200" >PLATO DE COLOCACIÓN</td>
            <td></td>
            <td></td>
            <td >RPTO-00469</td>
            <td>ZT11</td>
            <td width="200">Botón de Prueba</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>




<!--123123!-->


 <tr >
            <td>RPTO-00363</td>
            <td>ZT46</td>
            <td  width="200" >Tornillo P/L Cubierta del Plato</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00500</td>
            <td>ZT13</td>
            <td width="200">Mecanismo Interno Botón de Prueba</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

 <tr >
            <td>RPTO-00508</td>
            <td>ZT45</td>
            <td  width="200" >Tuercar Montaje del Plato de Colocación</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00497</td>
            <td>ZT091</td>
            <td width="200">Interruptor Pre-Selección Metodo INY.</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

 <tr >
            <td>RPTO-00362</td>
            <td>ZT44</td>
            <td  width="200" >Botón de Toque</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00498</td>
            <td>ZT092</td>
            <td width="200">Mecanismo Interno P/Interruptor Pre-Selección</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

 <tr >
            <td>RPTO-00349</td>
            <td>ZT43</td>
            <td  width="200" >Micro Válvula P. Activar Cilindro de Aire</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00504</td>
            <td>ZT27</td>
            <td width="200">Válvula Neumática de la Aguja</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

 <tr >
            <td></td>
            <td>ZT42</td>
            <td  width="200" >Cubierta del Plato de Colocación</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00505</td>
            <td>ZT37</td>
            <td width="200">Célula Lógica Azul</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

 
 <tr >
            <td></td>
            <td>ZT41</td>
            <td  width="200" > Plato de Colocación</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00506</td>
            <td>ZT38</td>
            <td width="200">Célula Lógica Gris</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

      <tr >
            <td></td>
            <td>ZT40</td>
            <td  width="200" > Plato de Colocación Ensamblaje Cubierta</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00507</td>
            <td>ZT39</td>
            <td width="200">Célula Lógica Amarilla</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

      <tr >
            <td></td>
            <td>ZT410</td>
            <td  width="200" >Tornillo Para ZT409NS</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00476</td>
            <td>ZT355</td>
            <td width="200">Válvula de Activación para el ZT35</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

      <tr >
            <td></td>
            <td>ZT409</td>
            <td  width="200" >Placa de Montaje para TTP</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT367</td>
            <td width="200">On-Off Interruptor de Prueba</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


      <tr >
            <td></td>
            <td>ZT407</td>
            <td  width="200" >Conector Y (4mm)</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT3665</td>
            <td width="200">On-Off Mecanismo de Cambio de Prueba</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


      <tr >
            <td></td>
            <td>ZT406</td>
            <td  width="200" >Sensor de Sangrado</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT368</td>
            <td width="200">Simple/Doble Mecanismo (Interruptor de Modo)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


      <tr >
            <td></td>
            <td>ZT405</td>
            <td  width="200" >Tornillo para ZT403NS (x2)</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT366</td>
            <td width="200">Simple/Doble Mecanismo del Interruptor</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


      <tr >
            <td></td>
            <td>ZT403</td>
            <td  width="200" >Botón Táctil</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT363</td>
            <td width="200">Conector Recto 4MM</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


      <tr >
            <td></td>
            <td>ZT401</td>
            <td  width="200" >TTP Cuerpo de la Placa</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT370</td>
            <td width="200">Válvula Retencion en Linea(Val. Flujo Libre)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


      <tr >
            <td></td>
            <td>ZT400</td>
            <td  width="200" >Conjunto de Placa Táctil Doble TTP</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT362</td>
            <td width="200">Válvula Unidireccional</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>





  <tr >
            <td></td>
            <td></td>
            <td  width="200" >JERINGAS/TUBERÍAS</td>
            <td></td>
            <td></td>
            <td ></td>
            <td>ZT357</td>
            <td width="200">Conector T (4MM)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


        <tr >
            <td></td>
            <td>ZT57SM</td>
            <td  width="200" >Jeringa Secundaria de 0.1 ML</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT356</td>
            <td width="200">Distribuidor de Aire Multiple</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

  <tr >
            <td>RPTO-00457</td>
            <td>ZT58SM</td>
            <td  width="200" >Jeringa Secundaria de 0.2 ML</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT358</td>
            <td width="200">Conector en Cruz (4 MM)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

        <tr >
            <td>RPTO-00512</td>
            <td>ZT63M</td>
            <td  width="200" >Tuerca de Seguridad Punta Jeringa</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT361</td>
            <td width="200">Válvula de Tres Salidas (Valvula MAC)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

        <tr >
            <td></td>
            <td>ZT626</td>
            <td  width="200" >Conector para ZT621NS-ZT625NS</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT360</td>
            <td width="200">Célula + Base (Rele Sensor Amarillo)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

        <tr >
            <td></td>
            <td>ZT623NS</td>
            <td  width="200" >Tubería para Conectar Jeringas P/S (x10)NS</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT369</td>
            <td width="200">Válvula de Impulso+Conector</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


        <tr >
            <td>RPTO-00351</td>
            <td>ZT623</td>
            <td  width="200" >Tubería para Conectar Jeringas P/S (x10)</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00511</td>
            <td>ZT625NS</td>
            <td width="200">Espaciador Entrada D/L Segunda Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>




        <tr >
            <td></td>
            <td></td>
            <td  width="200" >Kit Inyección</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00357</td>
            <td>ZT19</td>
            <td width="200">Cilindro de Aire con Tuerca de Montaje</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>


        <tr >
            <td>RPTO-00358</td>
            <td>ZT661M</td>
            <td  width="200" >Juego Empaques 1 Millon INY. 0.1 ML</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00503</td>
            <td>ZT20</td>
            <td width="200">Conector de 4mm P/Cilindro Aire</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

 <tr >
            <td>RPTO-00359</td>
            <td>ZT681M</td>
            <td  width="200" >Juego Empaques 1 Millon INY. 0.2 ML</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00471</td>
            <td>ZT191</td>
            <td width="200">Detector Magnético de Posición P/Cilindro Aire</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>






<tr >
            <td></td>
            <td></td>
            <td  width="200" >NEUMÁTICA</td>
            <td></td>
            <td></td>
            <td >RPTO-00348</td>
            <td>ZT21B</td>
            <td width="200">Conector para Acople de la Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>






 <tr >
            <td></td>
            <td>ZT01-ZT01NS</td>
            <td  width="200" >ManometroL</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT212</td>
            <td width="200">Impulsador/Espaciador D/L Jeringa Secundaria</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td></td>
            <td>ZT02</td>
            <td  width="200" >Contador de Lote</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00474</td>
            <td>ZT33</td>
            <td width="200">Resortes P/Sostenedor de la Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00466</td>
            <td>ZT03</td>
            <td  width="200" >Contador Totalizador</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00369</td>
            <td>ZT311</td>
            <td width="200">Sostenedor de la Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td></td>
            <td>ZT04</td>
            <td  width="200" >Cubierta del Cont. Lote</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT91</td>
            <td width="200">Tornillos de Fijación 6x20 para zt31(x2)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00468</td>
            <td>ZT05</td>
            <td  width="200" >Cubierta Cont. Totalizador</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT911</td>
            <td width="200">Tornillos de Fijación 6x50</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td></td>
            <td>ZT06</td>
            <td  width="200" >Placa para Fijar el Cont. Lote</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00475</td>
            <td>ZT34</td>
            <td width="200">Placa P/Mont del Sostenedor D/L. Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td></td>
            <td>ZT07</td>
            <td  width="200" >Placa para Fijar el Cont. Totalizador</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT49</td>
            <td width="200">Plato Guía P/Sostenedor D/L Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00364</td>
            <td>ZT17</td>
            <td  width="200" >Filtro Regulador</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT84</td>
            <td width="200">Probeta Calibrador</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00470</td>
            <td>ZT18</td>
            <td  width="200" >Conector Espigado en Codo 1/4 P/Filtro</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT83M</td>
            <td width="200">Pieza Final del Piston de la Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00472</td>
            <td>ZT23</td>
            <td  width="200" >Conector Macho Para Aire</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT82M</td>
            <td width="200">Resortes del Embolo D/L Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00355</td>
            <td>ZT24</td>
            <td  width="200" >Conector Hembra para Aire</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT81M</td>
            <td width="200">Tuerca Tapa D/Embolo D/L Jeringa</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td></td>
            <td>ZT25</td>
            <td  width="200" >Acople Reductor Conector del Manometro</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td ></td>
            <td>ZT90</td>
            <td width="200">Tornillo 4x16 P/L Pieza Final D/L Jeringa ZT83M</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>

       <tr >
            <td>RPTO-00473</td>
            <td>ZT28</td>
            <td  width="200" >Tapón de Goma (Valaguja)</td>
            <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
            <td >RPTO-00368</td>
            <td>ZT101</td>
            <td width="200">Aceite Vaselina en Spray (Vegetal)</td>
             <td><input type="checkbox"></input></td>
            <td><input type="checkbox"></input></td>
      </tr>














          </table>
          </main>
          <br>          ';

 $html.='<br><b>Observaciones:</b><br><br><br><br>';
 $html.='<br><br><b>Piezas Cambiadas:</b><br><br><br><br>';


        $html.='

 <br><br><br> <table id=tabla_contenido2 style="font-size:12px">
         
          <tr id=tr_cabecera  >            
            <th colspan="3" style="background-color: #025522" class="fuu">    <h3>2.- Inspección del Funcionamiento</h3>
</th> </tr>

           
         

            
</table><br><br>
        ';

         $html.='<br><b>Observaciones:</b><br><br>'; 
         $html.='<br><b>Frecuencia de Uso:</b><br>';


        $html.='

   <br><table id=tabla_contenido style="font-size:12px">
         
          <tr id=tr_cabecera  >            
            <th colspan="3" style="background-color: #025522" class="fuu">    <h3>3.-Limpieza y Desinfección</h3>
</th> </tr>

           
                   
           <tr  style="background-color: #4CAF50" >
              <td style="color: white" align=center>Criterios de Evaluación</td>
              <td style="color: white" align=center>Bueno</td>
              <td style="color: white" align=center>Malo</td>
            </tr>
              

              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Materiales Utilizados</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Cambio Piezas Descartables</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>LImpieza de Placa Twin Shot</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Esterilizado de Válvula</td>  
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Limpieza Módulo o Inyector</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Limpieza del Cerebro</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Secado</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Protección</td>  
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

            
</table>
        ';
         $html.='<br><b>Observaciones:</b><br><br>'; 
         $html.='<br><br><b>Cantidad de Aves Vacunadas / Dia:</b><br>';

        $html.='<br><br><th><h3>IMAGENES</h3></th>';

$html.="<table id=tabla_firmajefe><tr><td><img src='imagen/jefe.jpg' width=150px/></td>";

$html.="<td><img src='imagen/jefe.jpg' width=150px/></td>";

$html.="<td><img src='imagen/jefe.jpg' width=150px/></td>";

$html.="<td><img src='imagen/jefe.jpg' width=150px/></td>";

$html.="<td><img src='imagen/jefe.jpg' width=150px/></td></tr></table>";

$html.="<br><br><br><table id=tabla_firmajefe>




<tr >
<th style='background-color: #025522'>IMAGEN DE JEFE DE PLANTA</th>
</tr>
<tr>
<td >
<img src='imagen/jefe.jpg' width=300px />
</td>
</tr>
</table>
<br>
<br>
<br>
";

$html.="<table >
<tr >
<th style='background-color: #025522'>FIRMA INVETSA</th>
<th style='background-color: #025522'>FIRMA EMPRESA</th>
</tr>
<tr>
<td>
<img src='imagen/firma1.jpg' width=300px/>
</td>
<td>
<img src='imagen/firma1.jpg' width=300px/>
</td>
</tr>
</table>
";
   /*
if(file_exists("../".$rpt_sim->firma_invetsa))
{
  $contenido=file_get_contents("../".$rpt_sim->firma_invetsa);

header("Content-Type: image/png");
echo $contenido;
}
else
{
  echo "no existe";
}
?>
*/
$html.='
    <footer>
  <table id=tabla_firmajefe>
  <tr>
<td > <img src="imagen/pollito1.png" align="center" width="20%"></td></tr>
</table>
    </footer>
  </body>
 
</html>
';





$mPDF=new mPDF("c","A4");
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mPDF->writeHTML($html);

//$mPDF->Output("reporte.pdf","D");
$mPDF->Output("reporte.pdf","I");
if(isset($_POST['descargar']))
{
  $mPDF->Output("reporte.pdf","D");
}
}


?>


    </main>
    <footer>
  
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
 
</html>
