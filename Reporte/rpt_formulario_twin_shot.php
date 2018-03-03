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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <title>INFORME DE MANTENIMIENTO (TWIN SHOT)</title>
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
        background-color: #4CAF50;
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
<td width="80%" align="center" text-shadow: "2px 2px 4px #000000;"> <span style="font-size:25pt;"  color="#5c59a0" >INFORME DE MANTENIMIENTO (TWIN SHOT)</td>
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
      <table id=tabla_contenido style="font-size:12px">
         
          <tr id=tr_cabecera  >            
            <th colspan="16" style="background-color: #025522">   <h3>1.- Inpección Visual</h3>
</th> </tr>

           
                   
           <tr  style="background-color: #4CAF50" >
              <td style="color: white" align=center>Código</td>
              <td colspan="4" style="color: white" align=center>Descripción</td>
              <td style="color: white" align=center >Bueno</td>
              <td style="color: white" align=center>Malo</td>
              <td style="color: white" align=center>Código</td>
              <td colspan="4" style="color: white" align=center>Descripción</td>
              <td style="color: white" align=center>Bueno</td>
              <td style="color: white" align=center>Malo</td>
            </tr>
              

              <tr  style=background-color:#E7F3EB>

              <td colspan="7" style="color: black" align=center>ESTRUCTURA</td>  
              <td colspan="7" style="color: black" align=center>ACCESORIOS</td>

            </tr>


             <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-131</td>
              <td colspan="4" align=center>Base de Aluminio</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>AV-1376</td>
              <td colspan="4"  align=center>Resortes</td>
              <td  align=center>0</td>
              <td  align=center>0</td>
            </tr>
             <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1331</td>
              <td colspan="4" align=center>Bloque Posterior</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>AV-1377</td>
              <td colspan="4"  align=center>Bolitas de Acero</td>
              <td  align=center>0</td>
              <td  align=center>0</td>
            </tr>
             <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-13413</td>
              <td colspan="4" align=center>Bloque de Cilindro de Fuerza</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>AV-13523</td>
              <td colspan="4"  align=center>Reguladores Salida De Aguja</td>
            <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>
             <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-13421</td>
              <td colspan="4" align=center>Bloque de Jeringa</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>AV-230</td>
              <td colspan="4"  align=center>Acopladura Colder Hembra</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>
             <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-13511</td>
              <td colspan="4" align=center>Bloque Delantero Guia</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>AV-230</td>
              <td colspan="4"  align=center>Distribuidor de Aire</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

               <tr  style=background-color:#E7F3EB>
              <td colspan="7" style="color: green" align=center >ACCESORIOS</td>  
              <td  align=center>AV-1032</td>
              <td colspan="4" align=center>Conector Rápido de Entrada</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

                <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-137</td>
              <td colspan="4" align=center>Válvula de Control</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5430</td>
              <td colspan="4"  align=center>Silbato</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1378</td>
              <td colspan="4" align=center>Rpto. de Valvula de Control</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center>5443</td>
              <td colspan="4"  align=center>Conector Rápido Hembra</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-111</td>
              <td colspan="4" align=center>Placa Twin Shot</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5445</td>
              <td colspan="4"  align=center>Conector Rápido Macho</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-114</td>
              <td colspan="4" align=center>Bolita de Teflon</td>
                 <td  align=center>0</td>
              <td  align=center>0</td>
              <td  align=center>5728</td>
              <td colspan="4"  align=center>Válvula Cuatro Salidas</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-117</td>
              <td colspan="4" align=center>Conector de Aire Twin Shot</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5700</td>
              <td colspan="4"  align=center>Válvula de Una Salida</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-121</td>
              <td colspan="4" align=center>Seguro de Tapa</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5709</td>
              <td colspan="4"  align=center>Subplaca Sencilla</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-118</td>
              <td colspan="4" align=center>Tuercas de Base de Aluminio</td>
                  <td  align=center>0</td>
              <td  align=center>0</td>
              <td  align=center>5730</td>
              <td colspan="4"  align=center>Relay Sensor</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>5647</td>
              <td colspan="4" align=center>Clamp de Tubería de 1/2</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5701</td>
              <td colspan="4"  align=center>Célula Negativa</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>5548</td>
              <td colspan="4" align=center>Clamp de Tubería de 5/6</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center>5738</td>
              <td colspan="4"  align=center>Válvula de la Aguja</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>5732</td>
              <td colspan="4" align=center>Detector de Posición</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5703</td>
              <td colspan="4"  align=center>Válvula de Impulso</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>3543</td>
              <td colspan="4" align=center>Conector de 5/32</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5600</td>
              <td colspan="4"  align=center>Patas de Caucho</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1346</td>
              <td colspan="4" align=center>Acopladura Colder Macho</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5710</td>
              <td colspan="4"  align=center>Switch de Tres Posiciones</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1344</td>
              <td colspan="4" align=center>Cilindro de Fuerza</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5726</td>
              <td colspan="4"  align=center>Regulador de Aire</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1345</td>
              <td colspan="4" align=center>Cilindro de Ajuste</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center>5724</td>
              <td colspan="4"  align=center>Manometro</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

 <tr  style=background-color:#E7F3EB>
              <td  align=center>5720</td>
              <td colspan="4" align=center>Conector Rápido 5/32</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center>5423</td>
              <td colspan="4"  align=center>Contador Total</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>5641</td>
              <td colspan="4" align=center>Conector de Aire de Bronce</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5422</td>
              <td colspan="4"  align=center>Protector de Contador Total</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-13411</td>
              <td colspan="4" align=center>Sello de Cilindro de Fuerza</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>5422</td>
              <td colspan="4"  align=center>Contador Prefijado</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  align=center>AV-13422</td>
              <td colspan="4" align=center>Tuerca Collarin de Aguja</td>
                 <td  align=center>0</td>
              <td  align=center>0</td>
              <td colspan="8" align=center style=color:green>JERINGAS Y TUBERIAS</td>
            </tr>

<tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1374</td>
              <td colspan="4" align=center>Empaque o Asiento</td>
                   <td  align=center>0</td>
              <td  align=center>0</td>
              <td  align=center>AV-138</td>
              <td colspan="4"  align=center>Jeringa Descartable</td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

<tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1375</td>
              <td colspan="4" align=center>Empaque o Captura</td>
                 <td  align=center>0</td>
              <td  align=center>0</td>
              <td  align=center>3520</td>
              <td colspan="4"  align=center>Tubería Pequeña</td>
                  <td  align=center>0</td>
              <td  align=center>0</td>
            </tr>

<tr  style=background-color:#E7F3EB>
              <td  align=center>AV-1357</td>
              <td colspan="4" align=center>Seguro de Válvula</td>
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center>SV-11155</td>
              <td colspan="4"  align=center>Tubería Latex</td>
                 <td  align=center>0</td>
              <td  align=center>0</td>
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

           
                   
           <tr  style="background-color: #4CAF50" >
              <td style="color: white" align=center>Criterios de Evaluación</td>
              <td style="color: white" align=center>Bueno</td>
              <td style="color: white" align=center>Malo</td>
            </tr>
              

              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Ubicación de la Máquina</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Presión Compresora</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Presión de Máquina</td>  
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Activación</td>  
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>

              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Funciones de Contadores</td>  
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Funciones de Silbato</td>  
              <td  align=center><input type="checkbox" checked></td>
              <td  align=center><input type="checkbox" checked="yes"></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Salida de Agua</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>


              <tr  style=background-color:#E7F3EB>
              <td  style="color: black" align=center>Calibración</td>  
              <td  align=center><input type="checkbox" checked="yes"></td>
              <td  align=center><input type="checkbox" checked></td>
            </tr>

            
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
