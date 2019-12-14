<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	session_destroy();
	header("Location: login.php");
}
include "base.php";
include "head.php";
?>
<h2>Seleccione una opción</h2>
<ul class="list-group">
	<?php if ($_SESSION["rol"] == 1) { ?>
	<li class="list-group-item"><a href="user/index.php">Administrar usuarios</a></li>
	<?php } ?>
	<?php if ($_SESSION["rol"] == 2) { ?>
	<li class="list-group-item"><a href="payment/index.php">Registrar pago</a></li>
	<?php } ?>
	<?php if ($_SESSION["rol"] == 3) { ?>
	<li class="list-group-item"><a href="report/index.php">Verificar pagos</a></li>
	<?php } ?>
</ul>
<?php include "foot.php"; ?>