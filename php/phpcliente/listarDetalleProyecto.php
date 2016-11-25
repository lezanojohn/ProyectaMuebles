<?php
require_once("../conexion.php");

echo'<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';

$var=$_POST['id_ideaproyecto'];
$consulta = "SELECT ip.nombre_proyecto, ip.descripcion, ip.id_ideaproyecto, ip.imagen, u.nombre, u.apellido, u.foto_perfil FROM idea_proyecto ip join publica p using(id_ideaproyecto) join usuario u using(id_usuario) WHERE id_ideaproyecto = '$var'";
$resultado = mysqli_query($con, $consulta);
$numFilas = mysqli_num_rows($resultado);



$fila = mysqli_fetch_assoc($resultado);
echo '<div class="row">';
echo 	'<div class="col-md-12">';
echo 		"<div class='panel panel-default' id='panelMueblistas'>";
echo        	"<div class='panel-body'> 
					<center><h2><strong>" . utf8_encode($fila['nombre_proyecto']) . "</strong></h2></center> 
					<center><h5>Creado por: <img  src='../../".$fila['foto_perfil'] ."' class='img-circle'  id='imgPerfil' alt='Responsive image'><a href='#'> " . utf8_encode($fila['nombre']) . " " . utf8_encode($fila['apellido']) . " </a></h5></center> 
					<center><p><strong>Descripción: </strong>" . utf8_encode($fila['descripcion']) . "</p></center>
					<center><img src='../../". $fila['imagen'] . "'  class='img-responsive' alt='Responsive image' ></center>
				</div>";
echo    	"</div>"; 
echo 	"</div>";
echo "</div>";




if($numFilas == 0){
    echo "<h3>NO SE ENCONTRARON RESULTADOS</h3>";
}

mysqli_free_result($resultado);

mysqli_close($con);

?>