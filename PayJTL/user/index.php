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
	$usuarios = $mysqli->query("SELECT identificacion, PRnombre, SGnombre, PRapellido, SGapellido, roles FROM usuarios JOIN rol ON rol_id = ID_rol");

?>
<h2>Usuarios</h2>
<a class="btn btn-success" href="user/create.php"><i class="fa fa-plus"></i> Nuevo usuario</a>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombres</th>
			<th>Identificación</th>
			<th>Rol</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($usuarios as $usuario) { ?>
			<tr>
				<td><?php echo $usuario['PRnombre'].' '.$usuario['SGnombre'].' '.$usuario['PRapellido'].' '.$usuario['SGapellido']; ?></td>
				<td><?php echo $usuario['identificacion']; ?></td>
				<td><?php echo $usuario['roles']; ?></td>
				<td>
					<a class="btn btn-warning" href="user/edit.php"><i class="fa fa-edit"></i> Editar</a>
					<a class="btn btn-danger" href="user/delete.php"><i class="fa fa-trash"></i> Eliminar</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php include "../foot.php"; ?>