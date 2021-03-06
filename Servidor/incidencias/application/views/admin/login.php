<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Formulario Inicio Sesión</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php print base_url() ?>assets/login/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php print base_url() ?>assets/login/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
         <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h3 class="text-center">Iniciar sesión</h3>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="<?php echo site_url("Admin/validate_user"); ?>">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Acceder</button>
              <!--<span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>-->
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php print base_url() ?>assets/login/js/bootstrap.min.js"></script>
	</body>
</html>