<?php

	require_once("../conexion.php");
  $id_usuario=$_GET['id_usuario'];

	$consulta = "DELETE  FROM usuario WHERE id_usuario='$id_usuario'";
	$resultado = mysqli_query($con,$consulta);
  header('Location: ../admin.php');





?>
