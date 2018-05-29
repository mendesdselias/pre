<?php
include 'conexion.php';
session_start();

if ( !empty( $_GET[ 'val1' ] ) && !empty( $_GET[ 'val2' ] ) ) {
	$usuario = $_GET[ 'val1' ];
	$password = $_GET[ 'val2' ];
	$instruccion = "select * from usuarios where USUARIO = '$usuario' and CLAVE ='$password' ";
	$consulta = $conexion->query( $instruccion );
	$res = $consulta->fetch_object();
	$nfilas = $conexion->affected_rows;
	if ( $nfilas > 0 ) {
		$tipo_usuario = $res->TIPO;
		$usuario_valido = $usuario;
		$_SESSION[ "usuario_valido" ] = $usuario_valido;
		$_SESSION[ 'tipo_usuario' ] = $tipo_usuario;
		$respuesta = [
			'resultado' => 'Exito',
			'mensaje' => 'Te has logado correctamente',
			'TipoUsuario' => $tipo_usuario
		];


		echo json_encode( $respuesta );
		exit();
		//header('Location: clientes.php');
		//die("usuario: ".$usuario." - clave: ".$password);
	} else {
		$respuesta = [
			'resultado' => 'Error',
			'mensaje' => 'Credenciales invalidas'
		];
		echo json_encode( $respuesta );
		exit();


		//header( 'Location: formularioAlta.html' );
		//die( "Usuario o contraseña incorrecta!" );
	}
} else {
	$respuesta = [
		'resultado' => 'Error',
		'mensaje' => 'No has completa los campos'
	];
	echo json_encode( $respuesta );
	exit();
}
?>