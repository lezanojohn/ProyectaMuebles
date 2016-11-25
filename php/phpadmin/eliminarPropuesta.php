<?php

	require_once("../conexion.php");
  $id_propuesta=$_GET['id_propuesta'];

	$consulta = "DELETE  FROM propuesta WHERE id_propuesta='$id_propuesta'";
	$resultado = mysqli_query($con,$consulta);
  header('Location: ../admin.php');





?>
