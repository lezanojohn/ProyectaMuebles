<?php

	require_once("../conexion.php");
  $id_ideaproyecto=$_GET['id_ideaproyecto'];

	$consulta = "DELETE  FROM idea_proyecto WHERE id_ideaproyecto='$id_ideaproyecto'";
	$resultado = mysqli_query($con,$consulta);
  header('Location: ../admin.php');





?>
