<?php
    require_once("../conexion.php");
	
	$id = $_POST['id_usuario'];

	echo'<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';

    $consulta = "select u.nombre, u.apellido, u.foto_perfil, i.nombre_proyecto, i.id_ideaproyecto, i.imagen from usuario u join consumidor c USING (id_usuario) join publica p USING (id_usuario) join idea_proyecto i USING (id_ideaproyecto) join tiene t USING (id_ideaproyecto) join propuesta pro using(id_propuesta) where pro.id_usuario =". $id .""; 

    $resultado = mysqli_query($con, $consulta);

    $numFilas = mysqli_num_rows($resultado);

	echo "<h3>Mis Propuestas:</h3>";
    echo "<div class='container'>";
    echo    "<div class='row'>";
    echo         "</br>";
                
    while($fila = mysqli_fetch_assoc($resultado)){
      
        echo '<div onclick="verIdeaProyecto(\'' . $fila['id_ideaproyecto'] . '\',\'' . $fila['nombre_proyecto'] . '\')" class="col-md-4">';
        echo    "<div class='panel panel-default' id='panelMueblistas' style='cursor:pointer;'>";
        echo        "<div class='panel-body'> 
					<center><img src='../../". $fila['imagen'] . "' id='imgPerfilGrande' class='img-circle' alt='Responsive image'></center>
                    <center><h4><strong>" . utf8_encode($fila['nombre_proyecto']) . "</strong></h4></center>    
					<center><h6>Creado por: <a href='#'>" . utf8_encode($fila['nombre']) . " " . utf8_encode($fila['apellido']) . "</a></h6></center>";
		echo    "</div>"; //col-md-12
        echo    "</div>"; //col-md-12
        echo "</div>"; //panel panel-default
      
      
    }

    echo    "</div>"; //row
    echo "</div>"; //container

    if($numFilas == 0){
        echo "<h3>NO SE ENCONTRARON RESULTADOS</h3>";
    }

    mysqli_free_result($resultado);

    mysqli_close($con);

?>