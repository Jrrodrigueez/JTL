<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	session_destroy();
	header("Location: login.php");
}
include "../base.php";
include "../head.php";

$cursos = $mysqli->query("select * from curso");
$usuarios = $mysqli->query("select * from usuarios");
$tipo_pagos = $mysqli->query("select * from tipo_pago");
$subtipos = $mysqli->query("select * from subtipo_pago");


$pagos = $mysqli->query("SELECT c.cursos, CONCAT(u.PRnombre,' ',u.PRapellido) AS nombre, tp.nombre AS tipo_pago, sp.nombre AS subtipo, p.fecha_pago, p.valor FROM pago p JOIN curso c ON p.ID_curso = c.ID_curso JOIN usuarios u ON id_estudiante = u.usuario_id JOIN tipo_pago tp ON p.tipo_pago = tp.id JOIN subtipo_pago sp ON p.subtipo_pago = sp.id");

?>
<h1>Ingresar Pago</h1>
<div>
	<?php
		if (isset($_POST['add'])) {

			$identificacion = $_POST['identificacion'];
			$password = $_POST['password'];
			$rol_id = $_POST['rol_id'];
			$PRnombre = $_POST['PRnombre'];
			$SGnombre = $_POST['SGnombre'];
			$PRapellido = $_POST['PRapellido'];
			$SGapellido = $_POST['SGapellido'];
			$tipo_identificacion = $_POST['tipo_identificacion'] ? $_POST['tipo_identificacion'] : 1;
			$direccion = $_POST['direccion'];
			$telefono = $_POST['telefono'] ? $_POST['telefono'] : 0;
			$celular = $_POST['celular'] ? $_POST['celular'] : 0;
			$fecha_nacimiento = $_POST['fecha_nacimiento'];
			$dpto_nacimiento = $_POST['dpto_nacimiento'] ? $_POST['dpto_nacimiento'] : 1;
			$mun_nacimiento = $_POST['mun_nacimiento'] ? $_POST['mun_nacimiento'] : 1;
			$dpto_expedicion = $_POST['dpto_expedicion'] ? $_POST['dpto_expedicion'] : 1;
			$mun_expedicion = $_POST['mun_expedicion'] ? $_POST['mun_expedicion'] : 1;
			$genero = $_POST['genero'] ? $_POST['genero'] : 1;
			$sangre = $_POST['sangre'] ? $_POST['sangre'] : 1;
			$lugar_residencia = $_POST['lugar_residencia'];
			$zona = $_POST['zona'];
			$estrato = $_POST['estrato'] ? $_POST['estrato'] : 0;
			$barrio_corr = $_POST['barrio_corr'];
			$localidad_vered = $_POST['localidad_vered'];
			$sede = $_POST['sede'] ? $_POST['sede'] : 1;
			$jornada = $_POST['jornada'] ? $_POST['jornada'] : 1;
			$id_curso = $_POST['id_curso'] ? $_POST['id_curso'] : 1;
            $usuario_id = $_POST['usuario_id'] ? $_POST['usuario_id'] : 1;
			$grupo = $_POST['grupo'] ? $_POST['grupo'] : 0;
			$estado = $_POST['estado'] ? $_POST['estado'] : 4;
			$caracter = $_POST['caracter'] ? $_POST['caracter'] : 1;
			$especialidad = $_POST['especialidad'];
			$modalidad = $_POST['modalidad'] ? $_POST['modalidad'] : 1;
			$nuevo = $_POST['nuevo'] ? $_POST['nuevo']: 0;
			$metodologia = $_POST['metodologia'];
			$repitente = $_POST['repitente'] ? $_POST['repitente']: 0;
			$fmatricula = $_POST['fmatricula'] ? $_POST['fmatricula'] : '1990-01-01';
			$fretiro = $_POST['fretiro'] ? $_POST['fretiro'] : '1990-01-01';
			$email = $_POST['email'];
			$sisben = $_POST['sisben'] ? $_POST['sisben']: 0;
			$puntaje_sisben = $_POST['puntaje_sisben'] ? $_POST['puntaje_sisben'] : 0;

			$consulta = "INSERT INTO `usuarios` (`identificacion`,`password`,`rol_id`,`PRnombre`,`SGnombre`,`PRapellido`,`SGapellido`,`tipo_identificacion`,`direccion`,`telefono`,`celular`,`fecha_nacimiento`,`dpto_nacimiento`,`mun_nacimiento`,`dpto_expedicion`,`mun_expedicion`,`genero`,`sangre`,`lugar_residencia`,`zona`,`estrato`,`barrio_corr`,`localidad_vered`,`sede`,`jornada`,`id_curso`,`grupo`,`estado`,`caracter`,`especialidad`,`modalidad`,`nuevo`,`metodologia`,`repitente`,`fmatricula`,`fretiro`,`email`,`sisben`,`puntaje_sisben`,`dateadd`) VALUES  ('$identificacion','$password','$rol_id','$PRnombre','$SGnombre','$PRapellido','$SGapellido','$tipo_identificacion','$direccion','$telefono','$celular','$fecha_nacimiento','$dpto_nacimiento','$mun_nacimiento','$dpto_expedicion','$mun_expedicion','$genero','$sangre','$lugar_residencia','$zona','$estrato','$barrio_corr','$localidad_vered','$sede','$jornada','$id_curso','$grupo','$estado','$caracter','$especialidad','$modalidad','$nuevo','$metodologia','$repitente','$fmatricula','$fretiro','$email','$sisben','$puntaje_sisben',now())";

			$insert = $mysqli->query($consulta) or die(mysqli_error($mysqli));

			if($insert){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
				header("Location: index.php");
			}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
			}

		}
	?>
</div>
<div class="form-group">
	<small><em>Los campos marcados con asterisco (*) son obligatorios</em></small>
</div>
<div class="form-group">
		<label>Identificacion:</label>
		<select name="id_curso" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($usuarios as $usuario) {
				echo '<option value="'.$usuario['usuario_id'].'">'.$usuario['identificacion'].'</option>';
			}?>
		</select>
	</div>
<div class="form-group">
		<label>Curso:</label>
		<select name="id_curso" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($cursos as $curso) {
				echo '<option value="'.$curso['ID_curso'].'">'.$curso['cursos'].'</option>';
			}?>
		</select>
	</div>
<div class="form-group">
		<label>* Primer Nombre:</label>
		<select name="id_curso" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($usuarios as $usuario) {
				echo '<option value="'.$usuario['usuario_id'].'">'.$usuario['PRnombre'].'</option>';
			}?>
		</select>
	</div>

<div class="form-group">
		<label>Segundo Nombre:</label>
		<select name="id_curso" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($usuarios as $usuario) {
				echo '<option value="'.$usuario['usuario_id'].'">'.$usuario['SGnombre'].'</option>';
			}?>
		</select>
	</div>

<div class="form-group">
		<label>* Primer Apellido:</label>
		<select name="id_curso" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($usuarios as $usuario) {
				echo '<option value="'.$usuario['usuario_id'].'">'.$usuario['SGnombre'].'</option>';
			}?>
		</select>
	</div>

<div class="form-group">
		<label>Segundo Apellido:</label>
		<select name="id_curso" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($usuarios as $usuario) {
				echo '<option value="'.$usuario['usuario_id'].'">'.$usuario['SGnombre'].'</option>';
			}?>
		</select>
	</div>
<div class="form-group">
		<label>Fecha de pago:</label>
		<input type="date" class="form-control" name="fecha_nacimiento" placeholder="Escriba el número">
	</div>

<form action="" method="post">
	
	
	<div class="form-group">
		<label>Tipo de pago:</label>
		<select name="tipo_identificacion" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($tipo_pagos as $tipo_pago) {
				echo '<option value="'.$tipo_pago['id'].'">'.$tipo_pago['nombre'].'</option>';
			}?>
		</select>
	</div>
    
    <div class="form-group">
		<label>Subtipo de pago:</label>
		<select name="tipo_identificacion" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($subtipos as $subtipo) {
				echo '<option value="'.$subtipo['id'].'">'.$subtipo['nombre'].'</option>';
			}?>
		</select>
	</div>
	
	
	
	<div class="form-group">
		<label>* Rol:</label>
		<select name="rol_id" class="form-control" required>
			<option value="">Seleccione...</option>
			<?php
			foreach ($roles as $rol) {
				echo '<option value="'.$rol['ID_rol'].'">'.$rol['roles'].'</option>';
			}?>
		</select>
	</div>
	
	<input type="submit" name="add" value="Registrar Pago">
</form>
<?php
	include "../foot.php";
?>