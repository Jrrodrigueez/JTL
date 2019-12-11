<?php 
	
	$host = 'localhost';
	$user = 'root';
	$password = 'Dark,93.';
	$db = 'jtl';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexión";
	}

?>