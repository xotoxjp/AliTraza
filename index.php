<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Bienvenid@</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
</head>

<body onLoad='this.document.menu.logg.focus()'>

  <div class="container">    

  <div class="login">
    <h1>Iniciar Sesión</h1>
    <form name='menu' method="post" action="controller/wentro.php">
      <p><input type="text" name="logg" value="" placeholder="Nombre de Usuario"></p>
      <p><input type="password" name="pass" value="" placeholder="Password"></p>
      <p id="mensajefailsesion"> <?php echo $_SESSION["mensaje"];?></p>        
      <p class="submit"><input type="submit" name="B2" value="Login"></p>
    <input name="flag" type="hidden" id="flag" value="1" size="15" />
    </form>
  </div> 
    
  </div>

</body>
</html>
