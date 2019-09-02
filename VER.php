<?
  ECHO "DIRECCION ". $_SERVER["SERVER_ADDR"] . " <BR>" ;
  ECHO "NOMBRE" .  $_SERVER["SERVER_NAME"] . " <BR>" ;
  ECHO $PHPSESSID. " <BR>" ;
  IF ($_SERVER["SERVER_ADDR"] == "127.0.0.1")
  {
  ECHO "ES LOCAL" ;}
  ELSE
  {ECHO "REMOTO";}
  
  
?>

