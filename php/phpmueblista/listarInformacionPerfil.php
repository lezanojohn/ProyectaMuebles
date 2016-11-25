<?php  

	require_once("../conexion.php");

	session_start();

	$id_usuario = $_SESSION['id_usuario'];
    $foto = $_SESSION['foto_perfil'];
    $nombre = $_SESSION['nombre'];
	$apellido = $_SESSION['apellido'];
    $correo = $_SESSION['email'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
	

	$consulta = "SELECT u.telefono, u.direccion, m.acerca_de_mi FROM usuario u JOIN mueblista m USING(id_usuario) WHERE id_usuario = '$id_usuario'";
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
echo					'<input class="form-control" type="text" id="nombre" value ="' . utf8_encode($nombre) . ' ' .  utf8_encode($apellido) .'" name="nombre">';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='correo'>Correo:</label>";
echo					'<input class="form-control" type="text" id="correo" value ="' . utf8_encode($correo) . '" name="correo">';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='telefono'>Teléfono:</label>";
echo					'<input class="form-control" type="text" id="telefono" value ="' . $fila['telefono'] . '" name="telefono">';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='direccion'>Dirección:</label>";
echo					'<input class="form-control" type="text" id="direccion" value ="' .  utf8_encode($fila['direccion']) . '" name="direccion">';
echo				"</div>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='acerca_de_mi'>Acerca de mi:</label>";
echo					'<input class="form-control" type="text" id="acerca_de_mi" value ="' .  utf8_encode($fila['acerca_de_mi']) . '" name="acerca_de_mi">';
echo				"</div>";
echo            "</form>";
echo		"</div>";
echo    "</div>";  
echo "</div>";
 
 



  
?>