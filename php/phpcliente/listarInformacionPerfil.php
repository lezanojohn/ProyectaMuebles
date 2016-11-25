<?php  

	require_once("../conexion.php");

	session_start();

	$id_usuario = $_SESSION['id_usuario'];
    $foto = $_SESSION['foto_perfil'];
    $nombre = $_SESSION['nombre'];
	$apellido = $_SESSION['apellido'];
    $correo = $_SESSION['email'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
	

	$consulta = "SELECT telefono, direccion FROM usuario WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_assoc($resultado);



                    
echo "<div class='container-fluid'>";
echo 	"<div class='column'>";
echo    	"<div class='col-md-5' style='margin-top: 30px;'>";
echo    		"<a href='#' class='thumbnail'>";
echo        		'<img  src="../../'. $foto .'" alt="">';
echo        	"</a>";
echo    	"</div>";      
echo    "</div>";  
echo 	"<div class='column'>";
echo    	"<div class='well col-md-7' style='margin-top: 30px;'>";
echo			"<form class='form-horizontal'>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='nombre'>Nombre:</label>";
echo					'<p class="form-control" type="text" id="nombre" name="nombre">' . utf8_encode($nombre) . ' ' .  utf8_encode($apellido) .'</p>';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='correo'>Correo:</label>";
echo					'<p class="form-control" type="text" id="correo" name="correo">' . utf8_encode($correo) . '</p';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='telefono'>Teléfono:</label>";
echo					'<p class="form-control" type="text" id="telefono" name="telefono">' . $fila['telefono'] . '</p>';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='direccion'>Dirección:</label>";
echo					'<p class="form-control" type="text" id="direccion" name="direccion">' .  utf8_encode($fila['direccion']) . '</p>';
echo				"</div>";
echo            "</form>";
echo		"</div>";
echo    "</div>";  
echo "</div>";
 
 



  
?>