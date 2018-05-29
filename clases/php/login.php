<?php
include'conexion.php';
echo "<link rel='stylesheet' href='estilo.css' />";
session_start();

if (isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
	$instruccion = "select * from clientes where idCliente = '$usuario' ";
	$consulta = $conexion->query ($instruccion);
	$res=$consulta->fetch_object();
	$nfilas = $conexion -> affected_rows;
	if ($nfilas > 0)
      {
		  	$nombre=$res->NombreContacto;

         $usuario_valido = $usuario;
         $_SESSION["usuario_valido"] = $usuario_valido;
         $_SESSION['nombreusuario']=$nombre;
		 $_SESSION["momento_inicial"]=date("H:i:s");

		 header('Location: index.php');
      }
}else{
	echo "<P CLASS='parrafocentrado'>Esta zona tiene el acceso restringido.<BR> " .
        " Para entrar debe identificarse</P>";
		
     echo "<FORM CLASS='entrada' NAME='login' ACTION='login.php' METHOD='POST'>";
	 echo "<fieldset>";
	  echo "<table>";
	}  
		if (!isset ($usuario)){
    	 	echo  "<tr><td>Usuario:</td>";
			echo "<td><INPUT TYPE='TEXT' NAME='usuario' SIZE='15'></td></tr></P>";
			
			echo "<tr><td><INPUT TYPE='SUBMIT' VALUE='entrar'></td></tr>";
		}
		else{
			echo "<tr><td><p>Usuario no autorizado</p></td></tr>";
			echo "<tr><td>[ <A HREF='login.php'>Conectar</A> ]</td></tr>";		
			
		}

     
    echo"</table>";
   echo"</fieldset>";
    echo "</FORM>";
?>
</body>
</html>
