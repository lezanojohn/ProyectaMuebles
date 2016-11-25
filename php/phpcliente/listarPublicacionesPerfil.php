<?php
    require_once("../conexion.php");

	session_start();
	
	$tipo_usuario = $_SESSION["tipo_usuario"];
    $id_usuario = $_SESSION["id_usuario"];
	$nombre = $_SESSION["nombre"];
	$apellido = $_SESSION["apellido"];
    $foto = $_SESSION["foto_perfil"];
    
    

    echo'<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';

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

	
    echo "<div class='container-fluid'>";
	echo 	"<div class='column'>";
	echo 		"<h3>Ideas de proyecto publicadas:</h3>";
	echo 	"</div>";
    echo 	"<div class='column'>";  
    echo 		"<div class='col-md-12 panel panel-default' style='height:400px; overflow-y:scroll;'>";
    echo 		"</br>";

         $consulta = "SELECT  i.nombre_proyecto, i.imagen, count(t.id_propuesta) as cantidad FROM publica p LEFT JOIN idea_proyecto i USING (id_ideaproyecto) LEFT JOIN tiene t USING(id_ideaproyecto) WHERE p.id_usuario = ". $id_usuario ." GROUP BY i.nombre_proyecto"; 
         $resultado = mysqli_query($con, $consulta);
         while($fila = mysqli_fetch_assoc($resultado)){
            echo "<div class='row'>";
			echo 	"<div class='col-md-12'>";
			echo 		"<div class='panel panel-default' id='panelMueblistas'>";
			echo 			'<div class="panel-body btn" style="width: 100%; text-align: left;"> 
								<div class="col-md-6">
									<img src="../../'. $fila["imagen"] .'" class="img-circle" id="imgPerfilPropuesta" alt="Responsive image">
									<strong style="margin-left:10px; line-height:40px;">'.$fila["nombre_proyecto"]. '</strong> 
								</div>
								<div class= "col-md-3"> 
									<h8 style="line-height:40px;"> tiene '.$fila['cantidad'] .' propuestas</h8></br>
								</div>

							</div>';
			echo		"</div>"; //panel panel-default
			echo	"</div>"; //col-md-12
			echo "</div>"; //row
        }    
        
        
        
    

    echo        "</div>"; // col-md-12 panel panel-default
    echo "</div>"; //col-md-8
    echo "</div>"; //col-md-8

    mysqli_free_result($resultado);
    mysqli_close($con);
?>