<?php
    require_once("../conexion.php");

    $idpr=$_POST['id_propuesta'];

     echo '<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';

    $consulta = "select u.nombre, u.apellido, u.telefono, u.email, p.monto, p.dias, p.descripcion, t.estado FROM usuario u join mueblista m USING(id_usuario) join propuesta p USING (id_usuario) join tiene t USING (id_propuesta) WHERE p.id_propuesta = '$idpr' ";
    $resultado = mysqli_query($con, $consulta);
    $numFilas = mysqli_num_rows($resultado);

    function deshabilitar($estado){
		if ($estado == "Aceptado") {
			$valor_devuelto = "disabled";
  		}else {
			if($estado == "Rechazado"){
				$valor_devuelto = "disabled";
			}else{
				$valor_devuelto = 0;
			}
		}
		return $valor_devuelto;
	}	
    
		
        $fila = mysqli_fetch_assoc($resultado);
		$dis = deshabilitar($fila['estado']);

        echo "<div class='container'>";
        echo 	"<div class='row'>";
        echo 		"<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3' id='cuadroPropuesta' style='margin-right:5px; margin-top:5px'>";	
		echo			"<h3 style='margin-bottom:30px; margin-top:20px; text-align:center;'>Información de contacto</h3>";
		echo			"<p><b>Nombre del mueblista: </b><input type='text' style='margin-bottom:15px; id='nombre' value='". utf8_encode($fila['nombre']) ." " . utf8_encode($fila['apellido']) . "'></p>";
        echo        	"<p><b>Correo Electrónico: </b><input type='text' style='margin-bottom:15px; id='nombre' value='". utf8_encode($fila['email']) ."'></p>";
		echo 			"<p><b>Teléfono: </b><input type='text' style='margin-bottom:15px; id='nombre' value='". utf8_encode($fila['telefono']) ."'></p>";
        echo			"<div class='col-md-12' style='margin-top:10px;'>";
		echo				"<center><button type=button' class='btn btn-success btn-md' data-toggle='modal' data-target='#aceptarmodal'". $dis .">Aceptar</button>";
        echo        		"<button type='button' class='btn btn-danger btn-md' style='margin-left: 10px;' data-toggle='modal' data-target='#rechazarmodal'". $dis .">Rechazar</button></center>";
        echo    		"</div>";
        echo        "</div>";
        echo    	"<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8' id='cuadroPropuesta' style='margin-top:5px'>";
		echo			"<h3 style='margin-bottom:30px; margin-top:20px;'>Propuesta hecho por el mueblista</h3>";
		echo			"<div class='col-md-5'>";
        echo            	"<p><b>Precio: </b> <input type='text' style='width: 200px;' id='Monto' value='". utf8_encode($fila['monto']) ."'></p>";
		echo			"</div>";
		echo			"<div class='col-md-5'>";
        echo            	"<p><b>Dias:  </b> <input type='text' style='width: 200px; id='Dias' class'col-md-6' value='". $fila['dias'] ."'></p>";
		echo			"</div>";
		echo			"<div class='col-md-12'>";
		echo				"<p style='margin-top:15px;'><b>Descripcion:</b></p>";
		echo				"<textarea class='form-control col-md-12' rows='7' >". utf8_encode($fila['descripcion']) ."</textarea>";
		echo			"</div>";
		echo 		"</div>";
        echo 	"</div>";
		echo "</div>";


         
    if($numFilas == 0){
        echo "<h3>NO SE ENCONTRARON RESULTADOS</h3>";
    }
        
	mysqli_free_result($resultado);

    mysqli_close($con);
?>
