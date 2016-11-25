<?php
    require_once("../conexion.php");

    $consulta = "SELECT u.email, u.direccion, u.telefono, m.acerca_de_mi, m.id_usuario, u.foto_perfil, u.nombre, u.apellido, e.nombre_especialidad FROM usuario u, mueblista m, posee p, especialidad e WHERE u.id_usuario = m.id_usuario and m.id_usuario = p.id_usuario and p.id_especialidad = e.id_especialidad";
    $resultado = mysqli_query($con, $consulta);
    $numFilas = mysqli_num_rows($resultado);
	
	
    echo "<div class='container'>";
	echo 	"<h3></span>Le presentamos nuestra comunidad de mueblistas:</h3>";
    echo    "<div class='row'>";
    echo         "</br>";
    while($fila = mysqli_fetch_assoc($resultado)){
        echo        "<div class='col-md-4'>";
        echo            "<div class='panel panel-default' id='panelMueblistas' style='cursor:pointer;'>";
        echo                    "<div class='panel-body'<a href='#". $fila['id_usuario'] ."' class='btn btn-primary btn-md'  data-toggle='modal'></a>";
		echo						"<div class='container-fluid'>";
		echo							"<div class='row'>";
		echo								"<div class='col-xs-4 col-sm-4 col-md-4'>";
        echo                        			"<img src='../". $fila['foto_perfil'] . "'  id='imgPerfilGrande' class='img-circle' alt='Responsive image'>";
		echo								"</div>";
		echo								"<div class='col-xs-8 col-sm-8 col-md-8'>";
		echo									"<center>";
        echo                        			"<h4 id='nombreMueblista'>" . utf8_encode($fila['nombre']) . " " . utf8_encode($fila['apellido']) . "</h4>";
        echo                        			"<small class='text-left'><em>" . utf8_encode($fila['nombre_especialidad']) . "</em></small>";
		echo									"</center>";
		echo								"</div>";
		echo							"</div>";
		echo						"</div>";
        echo                    "</div>"; //panel body
//        echo                "</h3>";  // text center
        echo                "<div class='modal fade' id='". $fila['id_usuario'] ."'> ";
        echo                    "<div class='modal-dialog'>";
        
        echo                        "<div class='modal-content'>";
     
        echo                            "<div class='modal-header'>";
        echo                      "<div class='pull-right'> <button type='button' class='btn btn-personalizado' data-dismiss='modal'>Cerrar</button> </div>" ;
        echo                                "<h2 class='text-center'>". utf8_encode($fila['nombre']) .  " " . utf8_encode($fila['apellido']) . "</h2>";
        echo                            "</div>"; //modal-header
        echo                            "<div class='modal-body'>";
        //echo                                "<h4>INFORMACION DEL MUEBLISTA</h4>";
        echo                                "<figure>";
        echo                                    "<img src='../". $fila['foto_perfil'] . "' id='imgPerfilDetallado' class='img-thumbnail center-block' class='center-block'  alt='Responsive image' >";
        echo                                "</figure>";
        echo                                "<br>";
        echo                                "<div class='panel panel-default'>";
        echo                                    "<div class='panel-heading' role='tab' id='heading1' >";
        echo                                        "<h4 class='panel-title'>";
        echo                                            "<h5><strong>DESCRIPCION PERSONAL</strong> </h5>";
        echo                                            "<div class='panel-body'><em>". utf8_encode($fila['acerca_de_mi']) ."</em></div>";
        echo                                        "</h4>";
        echo                                    "</div>"; //panel heading   
        echo                                "</div>"; //panel panel-default
        echo                                "<div class='panel panel-default'>";
        echo                                    "<div class='panel-heading' role='tab' id='heading1' >";
        echo                                        "<h4 class='panel-title'>";
        echo                                            "<h5><strong>CONTACTO</strong></h5>"; 
        echo                                            "<div class='panel-body'><b>Dirección:</b> ". utf8_encode($fila['direccion']) . "</div>";
        echo                                            "<div class='panel-body'><b>Fono:</b> +56 9 ". ($fila['telefono']) . "</div>";
        echo                                            "<div class='panel-body'><b>Email:</b> ". utf8_encode($fila['email']) . "</div>";
        echo                                        "</h4>";
        echo                                    "</div>"; //panel heading   
        echo                                "</div>"; //panel panel-default
        echo                            "</div>"; //modal-body
        echo                        "</div>"; //modal-content
        echo                    "</div>"; //modal-dialog
        echo                "</div>"; // modal-fade
        echo            "</div>"; //panel panel-default
        echo        "</div>"; //col-md-8

        
    }
    echo    "</div>"; //row
    echo "</div>"; //container

    if($numFilas == 0){
        echo "<h3>NO SE ENCONTRARON RESULTADOS</h3>";
    }

    mysqli_free_result($resultado);

    mysqli_close($con);

?>