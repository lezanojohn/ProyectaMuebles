<?php
    require_once("../conexion.php");
	
	$id = $_POST['id_propuesta'];

	$query = "UPDATE tiene SET estado = 'Rechazado' WHERE id_propuesta = '$id'";
	$res = mysqli_query($con, $query);
	
	mysqli_free_result($res);
    mysqli_close($con);
?>
