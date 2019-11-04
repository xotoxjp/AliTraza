<body>			
	<div class="container">
		<div class="row text-center pad-top ">
			<div class="col-md-12">
			<h2> Modo Edici&oacute;n </h2>
		</div>
	</div>
	<div class="row  pad-top">               
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> Usuario <?php echo $id; ?> </strong>  
                </div>
                <div class="panel-body">
                    <form role="form" style="charset = utf-8;">
						<br/>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-circle-o-notch"  >Nombre </i></span>
							<input type="text" id="nombre" class="form-control" placeholder="Nombre Usuario" value="<?php echo $usuarioOtro->getNombre();?>"/>
						</div>						
						<div class="form-group input-group">
							<span class="input-group-addon">@ E-mail</span>
							<input type="text" id="email" class="form-control" placeholder="Email" value="<?php echo $usuarioOtro->getEmail();?>"/>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i>Login</span>
							<input type="text" id="login" class="form-control" placeholder="login" value="<?php echo $usuarioOtro->getLogin();?>"/>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i>Password</span>
							<input type="text" id="pass" class="form-control" placeholder="Password" value="<?php echo $usuarioOtro->getPass();?>"/>
						</div>

                    </form>
                    <?php
                        require 'modal.php'; 
                    ?>
                    <button id="guardar" class="btn btn-success ">Guardar</button>							
					<button id="volverM" class="btn btn-danger">Volver</button>	
					<button id="configuracion" class="btn btn-warning">Configurar Accesos</button>                     										
                </div>                           
              </div>
            </div>           
		</div>
	</div>
	<input type="hidden" id="id" value="<?php echo $id; ?>"/>
	<input type="hidden" id="modo" value="<?php echo $_GET['modo']; ?>"/>
</body>