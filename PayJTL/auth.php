<?php
session_start();
include "base.php";

$nombre = $_POST["uname"];
$pass = $_POST["psw"];

$login = mysqli_fetch_array($mysqli->query('SELECT count(usuario_id) as conteo, usuario_id, PRnombre, PRapellido, rol_id FROM usuarios WHERE identificacion = '.$nombre.' AND password = "'.$pass.'"'));

if ($login['conteo'] > 0) {
	session_start();
	$_SESSION["usuario"] = $login['PRnombre']." ".$login['PRapellido'];
	$_SESSION["rol"] = $login['rol_id'];
	$_SESSION["usuario_id"] = $login['usuario_id'];
	header("Location: index.php");
} else {
	header("Location: login.php");
}

?>