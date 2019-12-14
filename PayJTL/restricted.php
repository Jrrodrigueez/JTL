<html>
<head>
	<title>Acceso denegado</title>
</head>
<body>
	<?php
		session_start();
		if (!isset($_SESSION['usuario'])) {
			session_destroy();
			header("Location: login.php");
		}
		include "base.php";
	?>
	<div>
		<h1>Acceso denegado</h1>
		<p>No está autorizado a ver esta página.</p>
		<a href="index.php">Volver al inicio</a>
	</div>
	<div>
		<?php echo $_SESSION["usuario"]; ?>
		<?php echo "rol: ".$_SESSION["rol"]; ?>
		<a href="logout.php">Cerrar sesión</a>
	</div>
</body>
</html>