<?php
	session_start();

	if (!isset($_SESSION['usuario'])) {
		session_destroy();
		header("Location: ../login.php");
	}
	if ($_SESSION["rol"] != 1) {
		header("Location: ../restricted.php");
	}

	include "../base.php";
	include "../head.php";
	$usuarios = $mysqli->query("SELECT * from matr");

?>
<h2>Usuarios</h2>
<a class="btn btn-success" href="user/create.php"><i class="fa fa-plus"></i> Nuevo usuario</a>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombres</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($matriculas as $matr) { ?>
			<tr>
				<td><?php echo $matr['nombre']; ?></td>
				<td>
					<a class="btn btn-warning" href="edit.php"><i class="fa fa-edit"></i> Editar</a>
					<a class="btn btn-danger" href="delete.php"><i class="fa fa-trash"></i> Eliminar</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php include "../foot.php"; ?>