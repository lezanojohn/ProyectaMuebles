<?php  

	require_once("../conexion.php");

	session_start();


    $foto = $_SESSION['foto_perfil'];
    $nombre = $_SESSION['nombre'];
	$apellido = $_SESSION['apellido'];
    $correo = $_SESSION['email'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
	




                    
echo "<div class='container-fluid'>";
echo 	"<div class='column'>";
echo    	"<div class='col-md-3' style='margin-top: 30px;'>";
echo    		"<a href='#' class='thumbnail'>";
echo        		'<img  src="../../'. $foto .'" alt="">';
echo        	"</a>";
echo    	"</div>";      
echo    "</div>";  
echo 	"<div class='column'>";
echo    	"<div class='well col-md-6' style='margin-top: 30px;'>";
echo			"<form class='form-horizontal'>";
echo				"<div class='form-group'>";
echo					"<label class='control-label' for='nombre'>Nombre:</label>";
echo					'<input class="form-control" type="text" id="nombre" value ="' . utf8_encode($nombre) . ' ' .  utf8_encode($apellido) .'" name="nombre">';
echo				"</div>";
echo					"<div class='form-group'>";
echo						"<label class='control-label' for='correo'>Correo:</label>";
echo						'<input class="form-control" type="text" id="correo" value ="' . utf8_encode($correo) . '" name="correo">';
echo				"</div>";
echo            "</form>";
echo		"</div>";
echo    "</div>";  
echo "</div>";
 
 



  
?>