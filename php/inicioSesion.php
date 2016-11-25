<?php
	session_start();
	require_once("conexion.php");

	$email = $_POST['correo'];
	$pass = $_POST['pass'];
	$flag = 0;

	$consulta = "SELECT * FROM usuario";
	$resultado = mysqli_query($con,$consulta);

	while($fila = mysqli_fetch_assoc($resultado)) {
		if($fila["email"] == $email && $fila["contrasena"] == $pass) {
			$tipo_usuario=$fila["id_tipo_usuario"];
			$nombre = utf8_encode($fila["nombre"]);
			$apellido = utf8_encode($fila["apellido"]);
			$foto_perfil = $fila["foto_perfil"];
			$id = $fila["id_usuario"];
			
			$flag = 1;
		}
	}

	if($flag == 1) {
		$_SESSION['id_usuario'] = $id;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['apellido'] = $apellido;
		$_SESSION['tipo_usuario'] = $tipo_usuario;
		$_SESSION['email'] = $email;
		$_SESSION['foto_perfil'] = $foto_perfil;

		if($tipo_usuario == '1') {
		  header('Location: admin.php');
		} 
		else if ($tipo_usuario == '2') {
		  header('Location: mueblista.php');
		}
		else if ($tipo_usuario == '3') {
			header('Location: cliente.php');
		}
	} else {
		header('Location: ../index.php');
	}

?>