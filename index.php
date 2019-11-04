<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Bienvenid@</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <link rel="stylesheet" href="view/plugins/css/bootstrap.min.css" />
</head>

<body onLoad='this.document.menu.logg.focus()'>

  <div class="container">    

  <div class="login">
    <h1>Iniciar Sesión</h1>
    <form name='menu' method="post" action="controller/wentro.php">

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nombre de Usuario:</label>
      <div class="col-sm-10">
        <input type="text" name="logg" class="form-control" id="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>

    <div>
      <p id="mensajefailsesion"> <?php echo $_SESSION["mensaje"];?></p>        
      <!--  <p class="submit"><input type="submit" name="B2" value="Login"></p> -->
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="B2" value="Login" class="btn btn-default submit">Login</button>
      </div>
    </div>





    <input name="flag" type="hidden" id="flag" value="1" size="15" />
    </form>
  </div> 
    
  </div>

</body>
</html>
