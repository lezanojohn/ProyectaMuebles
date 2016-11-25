<?php
	require_once("../conexion.php");

	echo'<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';

	$consulta = "SELECT i.nombre_proyecto, i.id_ideaproyecto, i.imagen, u.nombre, u.apellido, u.foto_perfil FROM idea_proyecto i, usuario u, publica p WHERE i.id_ideaproyecto = p.id_ideaproyecto and p.id_usuario = u.id_usuario";
	$resultado = mysqli_query($con, $consulta);
	$numFilas = mysqli_num_rows($resultado);

    echo "<div class='container'>";
	echo 	"<h3>Ideas de Proyecto Publicadas:</h3>";
    echo    "<div class='row'>";
    echo         "</br>";
    
    while($fila = mysqli_fetch_assoc($resultado)){
        echo '<div onclick="verIdeaProyecto(\'' . $fila['id_ideaproyecto'] . '\',\'' . $fila['nombre_proyecto'] . '\')" class="col-md-4">';
        echo    "<div class='panel panel-default' id='panelMueblistas' style='cursor:pointer;'>";
        echo        "<div class='panel-body'> 
						<center><img src='../../". $fila['imagen'] . "'  id='imgPerfilGrande' class='img-circle' alt='Responsive image' ></center>
                    	<center><h4><strong>" . utf8_encode($fila['nombre_proyecto']) . "</strong></h4></center>    
						<center><h6>Creado por: <a href='#'>". utf8_encode($fila['nombre']) ." ". utf8_encode($fila['apellido']) ."</a></h6></center>
					</div>";
        echo    "</div>"; 
        echo "</div>";
    }

    echo    "</div>"; //row
    echo "</div>"; //container

	if($numFilas == 0){
		echo "<h3>NO SE ENCONTRARON RESULTADOS</h3>";
	}

	mysqli_free_result($resultado);

	mysqli_close($con);

?>