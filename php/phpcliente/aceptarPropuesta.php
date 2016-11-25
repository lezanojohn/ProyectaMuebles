<?php
    require_once("../conexion.php");
	

	$idp = $_POST['id_ideaproyecto'];
	$id = $_POST['id_propuesta'];

	$consulta = "SELECT id_propuesta, estado FROM tiene WHERE id_ideaproyecto = '$idp'";
    $resultado = mysqli_query($con, $consulta);

	while($fila = mysqli_fetch_assoc($resultado)){
		$estado = $fila['estado'];
		$idpr = $fila['id_propuesta'];
		
		if($idpr == $id){
			$query = "UPDATE tiene SET estado = 'Aceptado' WHERE id_propuesta = '$idpr'";
			$res = mysqli_query($con, $query);
		}else{
			$query = "UPDATE tiene SET estado = 'Rechazado' WHERE id_propuesta = '$idpr'";
			$res = mysqli_query($con, $query);
		}
	}

	

	mysqli_free_result($resultado);

    mysqli_close($con);
?>
