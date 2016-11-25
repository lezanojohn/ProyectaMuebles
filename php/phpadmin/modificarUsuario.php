<?php

	require_once("../conexion.php");


	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
  $id_usuario = $_POST['id_usuario'];
	$region = $_POST['region'];
	$email = $_POST['correo'];
  $direccion = $_POST['direccion'];



	$consulta = "UPDATE usuario SET nombre='$nombre', apellido='$apellidos',telefono ='$telefono',region='$region',direccion='$direccion',email='$email' WHERE id_usuario='$id_usuario'";
	$resultado = mysqli_query($con,$consulta);
  header('Location: ../admin.php');





?>
