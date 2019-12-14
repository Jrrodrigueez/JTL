<?php
	session_start();

	if (!isset($_SESSION['usuario'])) {
		session_destroy();
		header("Location: ../login.php");
	}
	if ($_SESSION["rol"] != 2) {
		header("Location: ../restricted.php");
	}

	include "../base.php";
	include "../head.php";
	$pagos = $mysqli->query("SELECT c.cursos, CONCAT(u.PRnombre,' ',u.PRapellido) AS nombre, tp.nombre AS tipo_pago, sp.nombre AS subtipo, p.fecha_pago, p.valor FROM pago p JOIN curso c ON p.ID_curso = c.ID_curso JOIN usuarios u ON id_estudiante = u.usuario_id JOIN tipo_pago tp ON p.tipo_pago = tp.id JOIN subtipo_pago sp ON p.subtipo_pago = sp.id");

?>
<h2>Pagos</h2>
<a class="btn btn-success" href="payment/create.php"><i class="fa fa-plus"></i> Nuevo pago</a>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Curso</th>
			<th>Estudiante</th>
			<th>Fecha</th>
			<th>Tipo pago</th>
			<th>Subtipo pago</th>
			<th>Valor</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pagos as $pago) { ?>
			<tr>
				<td><?php echo $pago['cursos']; ?></td>
				<td><?php echo $pago['nombre']; ?></td>
				<td><?php echo $pago['fecha_pago']; ?></td>
				<td><?php echo $pago['tipo_pago']; ?></td>
				<td><?php echo $pago['subtipo']; ?></td>
				<td><?php echo $pago['valor']; ?></td>
				<td>
					<a class="btn btn-warning" href="payment/update.php"><i class="fa fa-edit"></i> Editar</a>
					<a class="btn btn-danger" href="payment/delete.php"><i class="fa fa-trash"></i> Eliminar</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php include "../foot.php"; ?>