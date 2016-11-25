<?php
    require_once("../conexion.php");

    echo'<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';
	
	$varidp = $_POST["id_ideaproyecto"];
	$varnomp = $_POST["nombre_proyecto"];
	
    $consulta = "SELECT p.id_propuesta, p.dias, p.id_usuario, u.nombre, u.apellido, p.monto, p.descripcion, u.foto_perfil, t.estado FROM propuesta p, mueblista m, usuario u, tiene t WHERE u.id_usuario = m.id_usuario and m.id_usuario = p.id_usuario and t.id_propuesta = p.id_propuesta and t.id_ideaproyecto = '$varidp'";

	
    $resultado = mysqli_query($con, $consulta);
    $numFilas = mysqli_num_rows($resultado);

	function darColor($estado){
		if ($estado == "Aceptado") {
			$valor_devuelto = "#5bce6e";
  		}else {
			if($estado == "Rechazado"){
				$valor_devuelto = "#ec9494";
			}else{
				$valor_devuelto = "#eaf08a";
			}
		}
		return $valor_devuelto;
	}	


    echo "<div class='col-md-12'>";
    echo 	"<div class='column'>";
    echo 		"<div class='col-md-12'><h3>Propuestas de Mueblistas</h3></div>";
    echo 		"<div class='col-md-12 panel panel-default' style='height:400px; overflow-y:scroll;'>";
    echo "</br>";

    while($fila = mysqli_fetch_assoc($resultado)){
		$color = darColor($fila['estado']);
        echo "<div class='row'>";
        echo 	"<div class='col-md-12'>";
        echo 		"<div class='panel panel-default'>";
        echo 			'<div  onclick="Redirigir_Propuesta(\'' .$varidp .'\',\'' .$varnomp . '\',\'' .$fila['id_propuesta'] . '\')" class="panel-body btn" style="background-color:'. $color .'; width: 100%; text-align: left;"> 
          					<div class="col-md-6">
          						<img src="../../'.$fila['foto_perfil'] .'" class="img-circle" id="imgPerfilPropuesta" alt="Responsive image">
          						<strong style="margin-left:10px; line-height:40px;">'.utf8_encode($fila['nombre']) .' ' . utf8_encode($fila['apellido']) . '</strong> 
							</div>
							<div class= "col-md-3" >Entrega: </br> Precio: </div>
          					<div class= "col-md-3"> 
            					<h8>'.$fila['dias'] .' dias</h8></br>
            					<h8>$ '.$fila['monto'] .'</h8> 
          					</div>
          
        				</div>';
        echo		"</div>"; //panel panel-default
        echo	"</div>"; //col-md-12
        echo "</div>"; //row
        
        

        
    }
	
	 if($numFilas == 0){
        echo "<h5>Este proyecto aun no recibe propuestas.</h5>";
    }

    echo                "</div>"; // col-md-12 panel panel-default
    echo            "</div>"; //column
     echo        "</div>"; //col-md-6
    echo    "</div>"; //row
    echo "</div>"; //container

   

    mysqli_free_result($resultado);

    mysqli_close($con);

?>