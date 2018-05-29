<?php
include "conexion.php";
session_start();

if ( empty( $_SESSION[ 'usuario_valido' ] ) ) {

	$usuario = [
		'usuario' => "No identificado"
	];

	//die("<p class='aviso'>Acceso SOLO para autorizados</p><p></p>");
} else {

	$usuario = [
		'usuario' => $_SESSION[ 'usuario_valido' ]
	];
}
echo json_encode( $usuario );
exit();

?>