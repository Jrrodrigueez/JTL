<?php
	session_start();

	if (!isset($_SESSION['usuario'])) {
		session_destroy();
		header("Location: ../login.php");
	}
	if ($_SESSION["rol"] != 3) {
		header("Location: ../restricted.php");
	}

	include "../base.php";
	include "../head.php";
	$pagos = $mysqli->query("SELECT c.`cursos`, p.`fecha_pago`, tp.`nombre` AS tipo_pago, sp.`nombre` AS subtipo, p.`valor` FROM pago p JOIN `curso` c ON p.ID_curso = c.ID_curso JOIN `tipo_pago` tp ON p.`tipo_pago` = tp.`id` JOIN `subtipo_pago` sp ON sp.`id` = p.`subtipo_pago` WHERE `id_estudiante` = ".$_SESSION["usuario_id"]);

?>
<h2>Pagos</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Curso</th>
			<th>Fecha</th>
			<th>Tipo pago</th>
			<th>Subtipo pago</th>
			<th>Valor</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pagos as $pago) { ?>
			<tr>
				<td><?php echo $pago['cursos']; ?></td>
				<td><?php echo $pago['fecha_pago']; ?></td>
				<td><?php echo $pago['tipo_pago']; ?></td>
				<td><?php echo $pago['subtipo']; ?></td>
				<td><?php echo $pago['valor']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php include "../foot.php"; ?>