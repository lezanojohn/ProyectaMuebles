<?php
	session_start();
	require_once("conexion.php");
	
	$tipo_usuario = 3;
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$pass = $_POST['pass'];
	$telefono = $_POST['telefono'];
	$direccion = "";
	$region = "";
	$email = $_POST['correo'];
	$foto_perfil = "img/user-predeterminado.png";
	$flag = 0;

	$consulta = "SELECT * FROM usuario";
	$resultado = mysqli_query($con,$consulta);

	while($fila = mysqli_fetch_assoc($resultado)) {
		if($fila["email"] == $email) {
			$flag = -1;
		} else {
			$flag = 1;
		}
	}


	if($flag == 1) {
		
		$consultaInsersion = "INSERT INTO usuario(id_usuario, id_tipo_usuario, nombre, apellido, contrasena, telefono, direccion, region, email, foto_perfil) values(NULL,'". $tipo_usuario ."','". $nombre ."','". $apellidos ."','". $pass ."','". $telefono ."', NULL, NULL,'". $email ."','". $foto_perfil ."')";
		$resultadoInsersion = mysqli_query($con,$consultaInsersion);
		
		
		$newConsulta = "SELECT id_usuario FROM usuario WHERE email = " . $email . "";
		$newResultado = mysqli_query($con,$newConsulta);
		$fila = mysqli_fetch_assoc($newResultado);
		$id = $nombre = utf8_encode($fila["id_usuario"]);
		

		$_SESSION['id_usuario'] = $id;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['apellido'] = $apellidos;
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
	} else if ($flag == -1){
		echo "<script type='text/javascript'> alert('El correo ingresado ya existe.'); </script>";
		//header('Location: registrar.php');
		echo "<script type='text/javascript'> console.log('El correo ingresado ya existe.'); </script>";
	} else {
		header('Location: ../index.php');
	}

?>