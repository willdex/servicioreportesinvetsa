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

//*///

$id_hoja=$id_verificacion;
//**///

$rpt_hoja=$hoja_verificacion->get_formulario_por_id($id_hoja);

$rpt_accion=$accion->get_formulario_por_id_hoja($id_hoja);

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
        margin: 5px;
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

      #manipulacion tr td {
          width: 50px;
          border: 1px solid #000;
          font-size: 14px;
           margin-left: auto;
    margin-right: auto;
    text-align: left;
    height: 400px;
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
         <b >EMPRESA:</b>'.$rpt_hoja->empresa.'  <br>
         <b>GRANJA:</b>'.$rpt_hoja->unidad .'<br>
         <b>UNIDAD: </b>'.$rpt_hoja->tecnico.'<br>
         <b >RESPONSABLE DE INVETSA: </b>'. $rpt_hoja->responsable_invetsa.'<br>
        </td>

         <td style="text-align: center;"><b> HORA DE INGRESO:</b>'. $rpt_hoja->hora_ingreso .' <br>
         <b>HORA DE SALIDA:</b> '. $rpt_hoja->hora_salida .'<br>
         <b>RESPONSABLE DE INCUBADORA:</b> '. $rpt_hoja->responsable_incubadora .'<br>
         <b>FECHA:</b> '. $rpt_hoja->fecha .'<br>
        </td>

         <td width="50%" style="text-align: right;">        
         <b>Codigo:</b> R.50<br>
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
              <td colspan="22" text-align=center>'.$rpt_linea_genetica->hybro.'</td>
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
               <td>'.$rpt_accion->encontrado.'</td>
               <td>Humedad 65% HR</td>
               <td colspan="20">$VALOR</td>
            </tr>

            

            </tr>';

            if($rpt_accion!="-1"){
              while ($fila=mysqli_fetch_object($rpt_accion)) {
                if($fila->id=="1")
              {
                $html.='<tr style="background:#61579c;">';

              }  # code...
              else
              {
                  $html.='<tr>';

              }

              $html.='
              <tr>
              <td >Ventilación Forzada</td>
              <td >'.$fila->presion.'</td>
              <td >Presión Positiva</td>
              <td colspan="20"></td></tr>';
              }

            }';
                       


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
               <td>$VALOR</td>
               <td>T°27 a 37°C(Promedio 32°C)</td>
               <td colspan="20">$VALOR</td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Rompe Ampollas</td>
              <td>$VALOR</td>
              <td>Jeringas 5 y/o 10ml</td>
              <td colspan="20">$VALOR</td>

            </tr>

 <tr stylebackground-color:#E7F3EB>
              <td>ro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20">Ross - Cobb</td>
            </tr>
         

           <tr stylebackground-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
               <td>2(M y S)</td>
               <td>Ross - Cobb</td>
               <td colspan="20">Ross - Cobb</td>
            </tr>

            <tr stylebackground-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20"> Ross - Cobb</td>
            </tr>



<tr stylebackground-color:#E7F3EB>
              <td>hhNro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20">Ross - Cobb</td>
            </tr>

            <tr stylebackground-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20">Ross - Cobb</td>

            </tr>
<tr stylebackground-color:#E7F3EB>
              <td>hhNro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20">Ross - Cobb</td>
            </tr>



<tr id=tr_cabecera>
<th colspan="150" style="background-color: #025522" class="fuu">Sala de Vacunación</th></tr>

             <tr style="background-color: #4CAF50" >
              <td style="color: white" align=center>ESPERADO</td>
              <td style="color: white"  align=center>ENCONTRADO</td>
              <td style="color: white"  align=center>ESPERADO</td>
              <td style="color: white" colspan="20" align=center>ENCONTRADO</td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
               <td>2(M y S)</td>
               <td>Ross - Cobb</td>
               <td colspan="20">Ross - Cobb</td>
            </tr>

            <tr style=background-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20">Ross - Cobb</td>

            </tr>

    <tr style=background-color:#E7F3EB>
              <td>hhNro de nacimientos / semana</td>
              <td>2(M y S)</td>
              <td>Ross - Cobb</td>
              <td colspan="20">Ross - Cobb</td>
            </tr>

           <tr style=background-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
               <td>2(M y S)</td>
               <td>Ross - Cobb</td>
               <td colspan="20">Ross - Cobb</td>
            </tr>

            
           <tr style=background-color:#E7F3EB>
              <td>Nro de nacimientos / semana</td>
               <td>2(M y S)</td>
               <td>Ross - Cobb</td>
               <td colspan="20">Ross - Cobb</td>
            </tr>
       

      </table>
      <br>
      
        
      
     <br>
       
<br>
    <hr>
          <table id=manipulacion> 
          <tr>
          <th colspan=3 style="background-color: #025522" class="fuu">MANIPULACION Y DILUCION DE LA VACUNA CONGELADA</th>
          </tr>
    <tr>
        <td colspan="2" style="background-color:#E7F3EB"><b>Asigna con (x)si el procedimiento estuviese siendo seguido:(Puntaje M&aacute;ximo 2.0) <b>
      <ol >
            <li>Verificación del nivel de nitrógeno en formato (mínimo 6 pulgadas), obligatorio los días de vacunación </li>  





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

            
            
<td  style="background-color:#E7F3EB" >
<ul class="demo"  >
           <li id="demo" >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
            <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
            <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
            <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li>
           <li >  <input type="checkbox" /></li></ul>
         </td></tr>
        

</table>

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

