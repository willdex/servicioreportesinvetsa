<?php

ini_set('display_errors', '1');

include_once("mpdf/mpdf.php");

include_once('../clsHoja_verificacion.php');
include_once('../clsAccion.php');
include_once('../clsDetalle_accion.php');
include_once('../clsManipulacion_dilucion.php');
include_once('../clsMantenimiento_limpieza.php');
include_once('../clsControl_indice.php');
include_once('../clsLinea_genetica.php');
include_once('../clsViabilidad_celular.php');
include_once('../clsAccion.php');


//rpt_sistema_integral("15");

rpt_hoja_verificacion("29");

function rpt_hoja_verificacion($id_verificacion)
{ 
$html='';


$hoja_verificacion=New Hoja_verificacion();

$accion= New Accion();

$manipulacion_dilucion=New Manipulacion_dilucion();

$control_indice=New Control_indice();

$linea_genetica=New Linea_genetica();

$viabilidad_celular=New Viabilidad_celular();

$mantenimiento_limpieza=New Mantenimiento_limpieza();

$detalle_accion=New Detalle_accion();

//*///

$id_hoja=$id_verificacion;
//**///

$rpt_hoja=$hoja_verificacion->get_formulario_por_id($id_hoja);

$rpt_accion=$accion->get_formulario_por_id_hoja($id_hoja);

$rpt_detalle=$detalle_accion->get_formulario_por_id_hoja_y_id_accion($id_hoja);


$rpt_manipulacion_dilucion=$manipulacion_dilucion->get_formulario_por_id_hoja($id_hoja);

$rpt_control_indice=$control_indice->get_formulario_por_id_hoja($id_hoja);
$rpt_viabilidad_celular=$viabilidad_celular->get_formulario_por_id_hoja($id_hoja);
$rpt_linea_genetica=$linea_genetica->get_formulario_por_id_hoja($id_hoja);
$rpt_mantenimiento_limpieza=$mantenimiento_limpieza->get_formulario_por_id_hoja($id_hoja);



$html.='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AUDITORIA DE VACUNACION</title>
    

     <style type="text/css">
       #tabla_contenido,#tabla_puntuacion{
        border:1px solid #000; 
        margin: 45px;
        align-content: top;
        background: #d9ffcc;
        table-layout: fixed;
      vertical-align: top;

       }
       #tabla_puntuacion
       {
        width: 50px;
       }
       th, #tr_cabecera{
         background-color: #4CAF50;
          color: white;
         border: 1px solid #000;
    table-layout: fixed;
      vertical-align: top;
       }

       th, #tr_lab{
          border: 1px;

       }

        .a1 {width:905px; text-align: left; border: 0px;  position: relative;
        padding-left: 20px; }

        .gordo{

          width: 800px;
        }

        .border-lb {border: 0px 0px 0px 0px; border-width: 0 2px 2px 0px; text-align: left;}
        
        .xmen{width: 912px; border: 0px 0px 0px 0px; border-width: 0 0 2px 2px; text-align: left;}
        
        .foto1 {position: relative; background-color: #025522; left: 500px; top: 200px;    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);}

          .foto2 {position: relative; background-color: #025522; left: 500px; top: 160px;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);}

        .volve {height: 30px;}

        .fuu {height: 40px}

       #tr_cabecera
       {
        width: 1200px;
        color: black;
       }
       #tabla_contenido tr ,#tabla_contenido tr td, #accion tr td,#control tr td
       {
        border: 1px solid #000;
           table-layout: fixed;

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

      #manipulacion tr td {
          width: 50px;
          border: 1px solid #000;
          font-size: 14px;
          margin-left: auto;
          margin-right: auto;
          text-align: left;
          height: 400px;
  }

     #mantenimiento{
      width: 850px;
      background-color: #025522;
}

           #manipulacion  {
            width: 850px;
            border: 1px solid #000;
            font-size:15px;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
            height: 400px;
  } 
        #input{
        width: 200px;
        height: 200px;
        align-content: right;
}

          #puntajetotal {
            width: 700px;

}



        #irregularidades tr th
       {

        border: 1px solid #000;
        padding-left: 8px;
        width: 30px;

       }

       #irregularidades tr td
       {

        border: 2px solid #000;
        padding-left: 8px;
        border-bottom: 1px;
        order-left: 1px;
        width: 30px;
       
       }

       #vacunador tr{
        width: 5220px;

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
       
       }
       body{
         font-family: arial;
       }
       #accion
       {
        width: 400px;
       }
       #ire ,#ire_l
       {
        border: 1px solid #000;
        text-align: center;
        padding: 0px;
       }

      #ul.demo {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

     </style>



  </head>
  <body>
    <header class="clearfix">
    <table width="100%" style="border-bottom: 0px solid #fffff; vertical-align: middle; font-family: serif; font-size: 9pt; color: #5c59a0;"><tr>
<td width="10%"><img style="width: 30%" src="imagen/incuba.jpg"></td>
<td width="80%" align="center" text-shadow: "2px 2px 4px #000000;"> <span style="font-size:25pt;"  color="#5c59a0" >INFORME DE AUDITORÍA DE VACUNACION</td>
<td width="20%" style="text-align: right;" ><img style="width: 20%"  src="imagen/cabecera.png" ></td></table>
<td width="10%" style="text-align: right;"><span style="font-weight: bold;"><img style="width: 100%" src="imagen/principal.png"></span></td></table>

    <table class="bpmTopnTailC">

      <tr class="headerrow">
        
        <td class="evenrow" >
         <b >EMPRESA:</b>Avesca  <br>
         <b>GRANJA:</b>Granja 1<br>
         <b>UNIDAD: </b>Unidad 10<br>
         <b >RESPONSABLE DE INVETSA: </b>Carlos P.<br>
        </td>

         <td style="text-align: left;"><b> HORA DE INGRESO:</b>02:30:45 <br>
         <b>HORA DE SALIDA:</b> 03:45:39<br>
         <b>RESPONSABLE DE INCUBADORA:</b>Andres C.<br>
         <b>FECHA:</b>13-Marzo-2018<br>
        </td>

         
         <td width="50%" style="text-align: right;">        
         <b>Codigo:</b> R.51<br>
         <b>Revision:</b>00<br>
        </td>
      </tr>


      


    </TABLE>

    </header>




<main>
    <h3>1.- INSPECCION VISUAL</h3>
      <table id=tabla_contenido>
         
          <tr id=tr_cabecera>            
            <th colspan="150" style="background-color: #025522" class="fuu">Linea Genética</th> </tr>

            <tr style=background-color:#E7F3EB >
              <td>Nro de nacimientos / semana</td>
              <td>'.$rpt_linea_genetica->cobb.'</td>
              <td colspan="22" text-align=center>Ross-Cobb</td>
            </tr>
           
           <tr id=tr_cabecera>
            <th colspan="150" style="background-color: #025522" class="fuu">Laboratorio de Preparación de Vacuna</th>
            </tr>
            
           <tr style="background-color: #4CAF50" >
              <td style="color: white" align=center>ESPERADO</td>
              <td style="color: white"  align=center>ENCONTRADO</td>
              <td style="color: white"  align=center>ESPERADO</td>
              <td style="color: white" colspan="20" align=center>ENCONTRADO</td>
            </tr>
              
          
            <tr style=background-color:#E7F3EB>
              <td >Temperatura 24 a 27°C</td>
               <td></td>
               <td>Humedad 65% HR</td>
              <td colspan="20"></td>
            </tr>                
              <tr style=background-color:#E7F3EB>
              <td >Ventilación Forzada</td>
              <td >'.$rpt_detalle->esperado.'</td>
              <td >Presión Positiva</td>
              <td colspan="20">'.$rpt_detalle->id.'</td></tr>
                <tr style=background-color:#E7F3EB>
              <td >Limpieza después de c/ vacunación</td>
              <td ></td>
              <td >Desinfección Post Limpieza</td>
              <td colspan="20"></td></tr>

          

            

         
                       


<tr id=tr_cabecera>
 <th colspan="150" style="background-color: #025522" class="fuu">Equipo Invetsa-Temp y Otros</th></tr>

          <tr style="background-color: #4CAF50" >
              <td style="color: white" align=center>ESPERADO</td>
              <td style="color: white"  align=center>ENCONTRADO</td>
              <td style="color: white"  align=center>ESPERADO</td>
              <td style="color: white" colspan="20" align=center>ENCONTRADO</td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Guantes y Lentes</td>
               <td></td>
               <td>Calentador de Agua</td>
               <td colspan="20"></td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Recipiente de Agua</td>
              <td></td>
              <td>Termómetro</td>
              <td colspan="20"></td>

            </tr>

 <tr style=background-color:#E7F3EB>
              <td>T°27 a 37° C(Promedio 32°C)</td>
              <td></td>
              <td>Soporte de Ampollas</td>
              <td colspan="20"></td>
            </tr>
         

           <tr style=background-color:#E7F3EB>
              <td>Rompe Ampollas</td>
               <td></td>
               <td>Jeringa 5y/o 10 ml</td>
               <td colspan="20"></td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Aguja 18 Gx 18.1 1/2(rosada)</td>
              <td></td>
              <td>Alcohol</td>
              <td colspan="20"> </td>
            </tr>



<tr style=background-color:#E7F3EB>
              <td>Algodón</td>
              <td></td>
              <td>Papel Toalla</td>
              <td colspan="20"></td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Colorante Marek Dosis</td>
              <td></td>
              <td>Tubería nueva para vacuna</td>
              <td colspan="20"></td>

            </tr>
<tr style=background-color:#E7F3EB>
              <td>Conectores "Y"</td>
              <td></td>
              <td>Esterilizador/Autoclave</td>
              <td colspan="20"></td>
            </tr>

      

      </table>
      <br>
      <br>
      
        
      
     <br>
       
<br>
    <hr>
          <table id=manipulacion> 
          

          <tr>
          <th colspan="4" style="background-color: #025522" class="fuu">MANIPULACION Y DILUCION DE LA VACUNA CONGELADA</th>
          </tr>




 <tr>
        <td colspan="3" style="background-color:#E7F3EB"><b>Asigna con (x)si el procedimiento estuviese siendo seguido:(Puntaje M&aacute;ximo 2.0) <b>
      <ol >
            <li>Verificación del nivel de nitrógeno en formato (mínimo 6 pulgadas), obligatorio los ías de vacunación </li>  
           <li>Diluyente usado en buenas condiciones rojo y transparente </li>
            <li>Jeringas descartables individuales para cada tipo de vacuna, colorante y antibiótico (no usan) </li>
            <li>Tiempo mínimo para añadir antibiótico y colorante antes de preparar la vacuna  15 minutos </li>
            <li>Uso de colorante y dosis de 0.5 ml para bolsas 200 y 400 ml , 1 ml para 800 ml y 1.5 ml para 1200 y 1600 ml </li>
            <li>Jeringa cargada con 2 ml de diluyente para extraer la vacuna ya descongelada </li>
            <li>Uso de guantes y protector ocular para manipulación de vacunas congeladas al retirar la vacuna del tanque </li>
            <li>Buenas condiciones de funcionamiento del Invetsa-temp de 27 a 37 º C (promedio 32º C) </li>
            <li>Número de ampollas retiradas por vez para descongelación, máximo 2 ampollas </li>
            <li>Tiempo máximo para descongelamiento de la ampolla de 1 minuto y reconstitución en diluyente 30 segundos </li>
            <li>Uso de pajilla de aluminio para descongelamiento de las ampollas en el agua, evita introducir la mano en el agua </li>
            <li>Favorecer el descongelamiento de la ampolla en forma suave (movimiento circulares y verticales) </li>
            <li>Secar las ampollas con papel toalla y usar el rompe ampollas </li>
            <li>Uso del soporte de ampollas, absorción y reconstitución de la vacuna en el diluyente suave y sin presión en Jeringa </li>
            <li>Uso de aguja adecuada para la extracción de la vacuna, 18 G x 1 ½” (color rosado) </li>
            <li>Realización de enjuague de ampollas (incluye cuerpo y tapa de la ampolla </li>
            <li>Secuencia correcta de preparación de la vacuna (antibiótico, colorante y 15 minutos después vacunas congeladas) </li>
            <li>Tiempo de consumo de la solución vacunal preparada máximo 45 minutos y homogenizar la vacuna cada 10 minutos</li>
            <li>Perfecta distribución de las mangueras que conducen la vacuna (levemente estiradas, evitando el "efecto hamaca") </li>
            <li>Conteo celular - % de Viabilidad mayor a 86 % </li>
          </ol>
          </td>

            
            
<td  style="background-color:#E7F3EB" colspan="2">
<ol class="demo">
           <li >  <input type="checkbox" checked="yes" /></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
            <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
            <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
            <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li>
           <li >  <input type="checkbox" checked="yes"/></li></ol>
         </td></tr>
        
   



</table>
          <br>

          <td><b>PUNTAJE:</b></td>


            

            <hr>

<h3>MANTENIMIENTO Y LIMPIEZA DE LAS VACUNADORAS ACCUVAC</h3>
     Asignar con una (x) kas irregularidades encontradas: (Puntaje Máximo Promedio 1.5)<br><br>


             <table id=mantenimiento> 
          <tr colspan="15">
          <th style="background-color: #025522" colspan="10 ">Nombre del Vacunador</th>
          <th style="background-color: #025522" colspan="4">Nº de Maquina</th>
          <th colspan="15">
          <th style="background-color: #025522" colspan="15" class="fuu">IRREGULARIDADES</th>
          <tr style="background-color: #025522" colspan="15" class="fuu">
                    <table id="irregularidades" >

            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            </tr></table>
          </th>
          </tr>
          </table>
          ';

          $html.='



      <h3>IRREGULARIDADES</h3>
      1.-Acumulo de suciedad o puntos en sucios en la placa de sensores Twin Touch<br>
      2.-Falta de uno o mas tornillos visibles.<br>
      3.-Presi&oacute;n de aire comprimido fuera de rango recomendado(65-75 psi para Twin Shot/Zootec)<br>
      4.-Colocación incorrecta de la aguja (bisel hacia arriba)<br>
      5.-Inadecuada regulación de la salida de la aguja o agujas, que provoca que vacuna quede en la parte interna de la maquina.<br> 
6.-Colocación inadecuada de las jeringas y/o mangueras descartables.<br>
7.-Falta de calibración de la dosis 0.2 ml en Marek y 0.1 ml en Oleosas.<br> 
8.-No verificar la calibración de la dosis de la maquina cada 2,000 pollos vacunados.<br>
9.-No cumplen con el cambio de agujas de la maquina cada 2,000 pollos vacunados.<br>
10.-No tienen asperjadores con alcohol para la limpieza de la maquina cada 500 pollos vacunados.<br>
11.-No se lavan las manos y desinfectan antes de  realizar el cambio de agujas de las maquinas.<br>
12.-Acumulo de suciedad entre el modulo inyector y el modulo inferior de la maquina.<br>
13.-Desarmado incorrecto y lavado inadecuado de las maquinas, uso de detergente y material abrasivos.<br>
14.-Inadecuada esterilización de la válvula de control, debe ser a 121° C, a 15 psi de presión por 20 minutos envuelto en papel craf.<br>
15.-Otras irregularidades. Especificar : <b></b><br>
      

<hr>
<br>
<br>
         <br>
<br> ';


          $html.='
<br>
<br>
          <h3>CONTROL DE INDICE DE EFICIENCIA DE VACUNACIONY PRODUCTIVIDAD</h3>
     (Puntaje Máximo Índice de Eficiencia  5.5)     
          <table id=control> 
          <tr width="40" height="40">
          <th width="150" style="background-color:#025522" >Nombre del Vacunador</th>
          <th width="150" style="background-color:#025522">Nº Pollos Vacunados/Hora</th>
          <th width="150" style="background-color:#025522">Puntaje</th>
          <th width="150" style="background-color:#025522">Nº Pollos controlados</th>
          <th width="150" style="background-color:#025522">Nº Pollos no vacunado</th>
          <th width="150" style="background-color:#025522">Heridos</th>
          <th width="150" style="background-color:#025522">Mojados</th>
          <th width="150" style="background-color:#025522">Mala posición</th>
          <th width="150" style="background-color:#025522">Nº Pollos vacunad correctame</th>
          <th width="150" style="background-color:#025522">% de Eficiencia</th>
          </tr>

      <tr>
        <td style="background-color:#E7F3EB" >Promedio</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
      </tr>
    
       <tr>
        <td style="background-color:#E7F3EB">Sumatoria</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
        <td style="background-color:#E7F3EB">0</td>
      </tr>
      

          
      </TABLE>
          
          <br>
          PUNTAJE:  5  
          <br>
          <br>

          ';

 
          $html.='

          <br>
<hr>
<br>

<table id=puntajetotal>
<tr >
  <th  colspan="2" style="background-color:#025522" > PUNTAJE TOTAL OBTENIDO</th>
</tr>
<tr>
  <td style="background-color:#E7F3EB">MANIPULACION Y DILUCION DE LA VACUNA CONGELADA</td>
  <td style="background-color:#E7F3EB"> 0</td>
</tr>
<tr>
  <td style="background-color:#E7F3EB">MANTENIMIENTO Y LIMPIEZA DE LAS VACUNADORAS ACCUVAC</td>
  <td style="background-color:#E7F3EB" > 1</td>
</tr>
<tr>
  <td  style="background-color:#E7F3EB">INDICE DE EFICIENCIA DE VACUNACION</td>
  <td  style="background-color:#E7F3EB">1</td>
</tr>
<tr >
  <td style="background-color:#E7F3EB">PRODUCTIVIDAD</td>
  <td style="background-color:#E7F3EB">1</td>
</tr>
<tr>
  <td style="background-color:#E7F3EB">PUNTAJE TOTAL </td>
  <td style="background-color:#E7F3EB">1</td>
</tr>
</table>


          ';

          $html.='

          <br>
<hr>
<h3>VIABILIDAD CELULAR</h3>
<table id=control>
<tr class="fuu">
  <th style="background-color:#025522" width=250px>ANTIBIOTICO</th>
  <th style="background-color:#025522" width=250px>DOSIS</th>
  <th style="background-color:#025522" width=250px>TIEMPO (min)</th>
  <th style="background-color:#025522" width=250px>VC % </th>
</tr>

 <tr>
  <th style="background-color:#E7F3EB"><p style=color:black;>ANTIBIOTICO # 1</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  </tr>

   <tr>
    <th style="background-color:#E7F3EB"><p style=color:black;>ANTIBIOTICO # 2</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  </tr>


   <tr>
    <th style="background-color:#E7F3EB"><p style=color:black;>ANTIBIOTICO # 3</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  </tr>

   <tr>
    <th style="background-color:#E7F3EB"><p style=color:black;>ANTIBIOTICO # 4</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  <th style="background-color:#E7F3EB"><p style=color:black;>0</th>
  </tr>

</table>
<table>
<tr class="fuu">
  <th style="background-color:#E7F3EB" text-align:left width=650px><p style=color:black; >VC: Viabilidad Celular</th>
 <th style="background-color:#E7F3EB" width=150px><p style=color:black;>0</th></tr></table>

<hr>
<h3>RECOMENDACIONES</h3>
recomendaciones
<br>

<hr>';






$html.="<br><br><br><table id=tabla_firmajefe>




<tr  >
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



$mPDF=new mPDF("c","LEGAL");
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
