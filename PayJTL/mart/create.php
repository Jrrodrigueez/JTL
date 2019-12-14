<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	session_destroy();
	header("Location: login.php");
}
include "../base.php";
include "../head.php";
$roles = $mysqli->query("select * from rol");
$generos = $mysqli->query("select * from genero");
$docs = $mysqli->query("select * from tipo_identificacion");
$deptos = $mysqli->query("select * from departamentos");
$mpos = $mysqli->query("select * from municipios");
$sangres = $mysqli->query("select * from tipo_sangre");
$sedes = $mysqli->query("select * from sede");
$jornadas = $mysqli->query("select * from jornada");
$cursos = $mysqli->query("select * from curso");
$estados = $mysqli->query("select * from estado");
$caracteres = $mysqli->query("select * from caracter");
$modalidades = $mysqli->query("select * from modalidad");

?>
<h1>Crear usuario</h1>
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
<form action="" method="post">
	<div class="form-group">
		<label>* Primer Nombre:</label>
		<input type="text" class="form-control" name="PRnombre" placeholder="Escriba el nombre" required>
	</div>
	<div class="form-group">
		<label>Segundo Nombre:</label>
		<input type="text" class="form-control" name="SGnombre" placeholder="Escriba el nombre">
	</div>
	<div class="form-group">
		<label>* Primer Apellido:</label>
		<input type="text" class="form-control" name="PRapellido" placeholder="Escriba el apellido" required>
	</div>
	<div class="form-group">
		<label>Segundo Apellido:</label>
		<input type="text" class="form-control" name="SGapellido" placeholder="Escriba el apellido" >
	</div>
	<div>
		<label>* Contraseña:</label>
		<input type="password" class="form-control" name="password" placeholder="Escriba la contraseña" required>
	</div>
	<div class="form-group">
		<label>Tipo identificación:</label>
		<select name="tipo_identificacion" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($docs as $doc) {
				echo '<option value="'.$doc['id'].'">'.$doc['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>* Número Identificación:</label>
		<input type="number" class="form-control" name="identificacion" placeholder="Escriba el número" required>
	</div>
	<div class="form-group">
		<label>Departamento de expedición:</label>
		<select name="dpto_expedicion" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($deptos as $depto) {
				echo '<option value="'.$depto['id_depto'].'">'.$depto['nombre_dep'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Municipio de expedición:</label>
		<select name="mun_expedicion" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($mpos as $mpo) {
				echo '<option value="'.$mpo['codigo_municipio'].'">'.$mpo['nombre_municipio'].'</option>';
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
	<div class="form-group">
		<label>Dirección:</label>
		<input type="text" class="form-control" name="direccion" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Teléfono:</label>
		<input type="number" class="form-control" name="telefono" placeholder="Escriba el número" >
	</div>
	<div class="form-group">
		<label>Celular:</label>
		<input type="number" class="form-control" name="celular" placeholder="Escriba el número" >
	</div>
	<div class="form-group">
		<label>Fecha de nacimiento:</label>
		<input type="date" class="form-control" name="fecha_nacimiento" placeholder="Escriba el número">
	</div>
	<div class="form-group">
		<label>Departamento de nacimiento:</label>
		<select name="dpto_nacimiento" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($deptos as $depto) {
				echo '<option value="'.$depto['id_depto'].'">'.$depto['nombre_dep'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Municipio de nacimiento:</label>
		<select name="mun_nacimiento" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($mpos as $mpo) {
				echo '<option value="'.$mpo['codigo_municipio'].'">'.$mpo['nombre_municipio'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Género:</label>
		<select name="genero" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($generos as $genero) {
				echo '<option value="'.$genero['id'].'">'.$genero['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Tipo de sangre:</label>
		<select name="sangre" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($sangres as $sangre) {
				echo '<option value="'.$sangre['id'].'">'.$sangre['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Lugar de residencia:</label>
		<input type="text" class="form-control" name="lugar_residencia" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Zona:</label>
		<input type="text" class="form-control" name="zona" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Estrato:</label>
		<input type="number" class="form-control" name="estrato" placeholder="Escriba el número" >
	</div>
	<div class="form-group">
		<label>Barrio/Corregimiento:</label>
		<input type="text" class="form-control" name="barrio_corr" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Localidad/Vereda:</label>
		<input type="text" class="form-control" name="localidad_vered" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Sede:</label>
		<select name="sede" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($sedes as $sede) {
				echo '<option value="'.$sede['id'].'">'.$sede['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Jornada:</label>
		<select name="jornada" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($jornadas as $jornada) {
				echo '<option value="'.$jornada['id'].'">'.$jornada['nombre'].'</option>';
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
		<label>Grupo:</label>
		<input type="number" class="form-control" name="grupo" placeholder="Escriba el número" >
	</div>
	<div class="form-group">
		<label>Estado:</label>
		<select name="estado" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($estados as $estado) {
				echo '<option value="'.$estado['id'].'">'.$estado['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Caracter:</label>
		<select name="caracter" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($caracteres as $caracter) {
				echo '<option value="'.$caracter['id'].'">'.$caracter['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Especialidad:</label>
		<input type="text" class="form-control" name="especialidad" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Modalidad:</label>
		<select name="modalidad" class="form-control">
			<option value="">Seleccione...</option>
			<?php
			foreach ($modalidades as $modalidad) {
				echo '<option value="'.$modalidad['id'].'">'.$modalidad['nombre'].'</option>';
			}?>
		</select>
	</div>
	<div class="form-group">
		<label>Nuevo:</label>
		<select name="nuevo" class="form-control">
			<option value="">Seleccione...</option>
			<option value="1">Si</option>
			<option value="0">No</option>
		</select>
	</div>
	<div class="form-group">
		<label>Metodología:</label>
		<input type="text" class="form-control" name="metodologia" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Repitente:</label>
		<select name="repitente" class="form-control">
			<option value="">Seleccione...</option>
			<option value="1">Si</option>
			<option value="0">No</option>
		</select>
	</div>
	<div class="form-group">
		<label>Fecha de matricula:</label>
		<input type="date" class="form-control" name="fmatricula" placeholder="Escriba el número" >
	</div>
	<div class="form-group">
		<label>Fecha de retiro:</label>
		<input type="date" class="form-control" name="fretiro" placeholder="Escriba el número" >
	</div>
	<div class="form-group">
		<label>Email:</label>
		<input type="text" class="form-control" name="email" placeholder="Escriba el apellido" >
	</div>
	<div class="form-group">
		<label>Sisben:</label>
		<select name="sisben" class="form-control">
			<option value="">Seleccione...</option>
			<option value="1">Si</option>
			<option value="0">No</option>
		</select>
	</div>
	<div class="form-group">
		<label>Puntaje Sisben:</label>
		<input type="number" class="form-control" name="puntaje_sisben" placeholder="Escriba el número" >
	</div>
	<input type="submit" name="add" value="Crear usuario">
</form>
<?php
	include "../foot.php";
?>