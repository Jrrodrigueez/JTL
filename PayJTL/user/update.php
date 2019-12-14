<?php
session_start();
include "base.php";

$nombre = $_POST["uname"];
$pass = $_POST["psw"];

$login = mysqli_fetch_array($mysqli->query('SELECT count(ID_usuario) as conteo FROM usuarios WHERE identificacion_EST = '.$nombre.' AND PASSWORD = "'.$pass.'"'));

if ($login['conteo'] > 0) {
	session_start();
	$_SESSION["usuario"] = $nombre;
	header("Location: index.php");
} else {
	header("Location: login.php");
}

?>