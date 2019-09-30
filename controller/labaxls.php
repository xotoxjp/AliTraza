<?session_start();
include_once("funciones.php");
$nivel_dato=$_SESSION["acceso_acc"];
$ccli=$_SESSION["acceso_sector"];
$id_usuario=$_SESSION["id_usuario"];
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$a='SELECT acceso,alta,baja,modifica FROM '.$_SESSION["tabla_acc_op"].' where id_usuario='.$id_usuario.' and proceso="Procesos" and orden=4 and acceso="on"';
$r=mysql_query($a,$cx_validar);$i=0;
while ($v = mysql_fetch_array($r)) {
  $acceso=$v[0];
  $alta=$v[1];
  $baja=$v[2];
  $modifica=$v[3];
  $i++;break;
}
/*****************************************************************************************************************************************/

$last_ing = date("Y-m-d H:i:s"); ;
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$actualizar="UPDATE ".$_SESSION["tabla_acc"]." SET fec_ult_ut='$last_ing' ,prog_utl='labaxls.php'  WHERE id_usuario=".$_SESSION["id_usuario"];
mysql_query($actualizar,$cx_validar);

// Camino a los include

// PHPExcel
require_once 'plugins/PHPExcel.php';
// PHPExcel_IOFactory
include 'plugins/PHPExcel/IOFactory.php';
// Creamos un objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Leemos un archivo Excel 2003 -- 'Excel2007' para xlsx
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("../view/resources/lab.xls");
// Indicamos que se pare en la hoja uno del libro
$objPHPExcel->setActiveSheetIndex(0);
/*****************************  agregado por nosotros ********************************************************/

$otra = $_GET['muestras'];
$otra2 = explode(",", $otra);
$largo = count($otra2);
$vueltas = 0;
$i=0; 
$fila = 14;
  
while($vueltas < $largo) {
    $col = 0;

    $SQL="SELECT laboratorio.num_presupuesto, provedores.razon_social, laboratorio.hmf, laboratorio.color, laboratorio.humedad,laboratorio.acidez, laboratorio.resultado, laboratorio.fecha_analisis
            FROM laboratorio
            INNER JOIN provedores ON laboratorio.id_productor = provedores.prov_id
            WHERE laboratorio.id_tambor =".$otra2[$i]."
            GROUP BY laboratorio.id_tambor
            ORDER BY laboratorio.id_tambor ";
    $respu = mysql_query($SQL,$cx_validar);

    while($datosTabla = mysql_fetch_array($respu)){
      $numpres = $datosTabla[0];
      $razon = $datosTabla[1];
      $hmf = $datosTabla[2];
      $color = $datosTabla[3];
      $humedad = $datosTabla[4];
      $acidez = $datosTabla[5];
      $cumple = $datosTabla[6];
      $fecha = $datosTabla[7];
    }
    
    $fecha = new DateTime($fecha);
    $formattedfecha = date_format($fecha, 'd/m/Y');
    $fechaTit="Fecha de Ingreso: $formattedfecha";
    $objPHPExcel->getActiveSheet()->setCellValue('F3',$fechaTit);
    
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila, $otra2[$i]);
    $col++;
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila , $razon);
    $col++;

    //ver decimales de 3 digitos
    $objPHPExcel->getActiveSheet()->getStyle($col, $fila)->getNumberFormat()->setFormatCode('#,##0.000');
    //ver decimales de 3 digitos   

    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila , $hmf);
    $col++;
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila , $color);
    $col++;

    //ver decimales de 3 digitos
    $objPHPExcel->getActiveSheet()->getStyle($col, $fila)->getNumberFormat()->setFormatCode('#,##0.000');
    //ver decimales de 3 digitos   

    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila, $humedad);
    $col++;

    //ver decimales de 3 digitos
    $objPHPExcel->getActiveSheet()->getStyle($col, $fila)->getNumberFormat()->setFormatCode('#,##0.000');
    //ver decimales de 3 digitos   

    
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila , $acidez);
    $col++;
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $fila , $cumple);
    $col++;
    $fila++;
    
    if($fila>16){
      //You can insert/remove rows/columns at a specific position. The following code inserts 1 new rows, right before row 18:
      $objPHPExcel->getActiveSheet()->insertNewRowBefore($fila, 1);
    }

    $vueltas++;
    $i++; 
} 
/***************************************** fin del while *****************************************/


$numeroPresupuest='P.M.:'.$numpres;//variable de numero de presuuesto
$objPHPExcel->getActiveSheet()->setCellValue('D7',$numeroPresupuest);


//Guardamos el archivo en formato Excel 2007
//Si queremos trabajar con Excel 2003, basta cambiar el 'Excel2007' por 'Excel5' y el nombre del archivo de salida cambiar su formato por '.xls'
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

//prepare download
$filename='informe_labo.xls'; //just some random filename
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //downloadable file is in Excel 2003 format (.xls)
$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!
?>