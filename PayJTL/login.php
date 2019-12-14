<html>
<head>
	<title>Iniciar sesión</title>
	<link href="assets/img/ijtl.png" rel="icon" type="image/x-icon"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- 	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/modernizr.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<?php
	session_start();
	include "base.php";
	?>
	<form action="auth.php" method="post">
		<div class="login-form">
			<div class="text-center">
				<img src="img/login.png" alt="">
				<h1>Iniciar sesión</h1>
			</div>
			<div class="form-group">
				<label for="uname"><b>Usuario</b></label>
				<input class='form-control' type="text" placeholder="Escriba usuario" name="uname" required>
			</div>
			<div class="form-group">
				<label for="psw"><b>Contraseña</b></label>
				<input class='form-control' type="password" placeholder="Escriba contraseña" name="psw" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg">Iniciar sesión</button>
			</div>
		</div>
	</form>
</body>
</html>