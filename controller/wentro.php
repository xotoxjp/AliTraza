<?php
include_once("funciones.php");
flag();
$_SESSION["level_req"]="a";
$logg= $_SESSION["acceso_logg"];
$pass= $_SESSION["acceso_pass"];
validar ($logg,$pass);

$nivel_dato=$_SESSION["acceso_acc"];
$ccli=$_SESSION["acceso_sector"];
$last_ing = date("Y-m-d H:i:s"); ;
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$actualizar="update ".$_SESSION["tabla_acc"]." set fec_ult_ut='$last_ing'  where id_usuario=".$_SESSION["id_usuario"] ;
mysql_query($actualizar,$cx_validar);


$m = $_REQUEST["m"]*1;
if ( $_SESSION["mensaje"] == "NO TIENE ACCESO CON ESTA CLAVE" )
  {  header("Location: ../index.php");}
else
 {      header("Location: menu_1.php") ;}
?>
<head>


<title><?php echo $_SESSION["title"]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div align="center"><span class="Estilo48">
  <?php session_start();echo $_SESSION["acceso_nombre"];?>
</span></span> Bienvenido a
<?php echo $_SESSION["aquien"];?><br>
</div>
<br>
<span class="Estilo49">_*_</span>
  <?php $req="j"; if ((stristr($nivel_dato,$req) == TRUE)){ echo ("<a href='menu_1.php'>Stocks </a>");}?>
</span><br>
<span class="Estilo49">_*_</span> <?php $req="u"; if ((stristr($nivel_dato,$req) == TRUE)){ echo ("<a href='menu_1.php'>Balanza </a>");}?></span></span><br>
<span class="Estilo49">_*_</span> <?php  $req="z"; if ((stristr($nivel_dato,$req) == TRUE)){ echo ("<a href='menu_1.php' target='_blank'> Noticias para ADMINISTRADORES</a>");}?></span>
<br>
  <br>
  <br>
<div align="right"><span class="Estilo50"><?php echo ("<a href='soporte.php'>Soporte</a>");?></span></div>
</body>
</html>