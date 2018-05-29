	<?php
	
	$conexion = new mysqli("localhost", "root", "", "reservaya");
	$conexion -> set_charset("utf8");

	if($conexion -> connect_errno){
		die("Conexion con la base de datos erronea: ".$conexion->connect_error);
	}
?>
	
