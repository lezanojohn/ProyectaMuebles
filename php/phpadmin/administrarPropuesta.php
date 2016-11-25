<!DOCTYPE html>
<html lang="es-CL">
<head>
    <title>Proyecta Muebles</title>

    <!-- meta -->
    <meta name="author" content="Equipo 2 - Ingenieria de Software 2016">
    <meta name="description" content="Proyecto Proyecta Muebles es una aplicación web que busca difundir la información de contacto de los mueblistas certificados por una empresa. El actual sitio web corresponde al prototipo N°2 del proyecto. Este prototipo comprende las funcionalidades del prototipo N°1, prototipo N°2 y se agregarán las siguientes: Inicio/cierre de sesion, recuperar contraseña, ver/modificar perfil de usuario, consultar todas las ideas de proyecto de un cliente, notificar al cliente que su proyecto recibio una propuesta, notificar al mueblista que su propuesta fue aceptada/rechazada/comentada, evaluar/comentar la propuesta de un mueblista, crear/modificar/eliminar usuario, modificar/eliminar idea de proyecto, medificar/eliminar propuesta de solucion">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- estilos -->
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
    <link rel="stylesheet" href="../../css/estilosBotones.css" type="text/css">
    <script src="../../js/redirigir.js"></script>


 	<?php
		session_start();

		if($_SESSION['id_usuario'] == NULL) {
			header("Location: ../../index.php");
		}
	?>

</head>
<body>

    <!--BARRA DE NAVEGACION -->
    <nav class="nav navbar-default navbar-fixed-top barra">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="../admin.php" class="navbar-brand">Proyecta Muebles</a>
            </div>

            <!--MENU-->
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
        					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mueblistas <span class="caret"></span></a>
        					  <ul class="dropdown-menu">
        						          <li><a href="../admin.php">Ver la comunidad</a></li>
                            	<li><a href="buscarMueblistas.php">Buscar un mueblista</a></li>
        					  </ul>
        					</li>
        					<li class="dropdown">
        						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ideas de proyecto <span class="caret"></span></a>
        						<ul class="dropdown-menu">
        							<li><a href="verProyectos.php">Proyectos publicados</a></li>
        						</ul>
        					</li>
        					<li class="dropdown">
        					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar <span class="caret"></span></a>
        					  <ul class="dropdown-menu">
                      <li><a href="administrarUsuario.php">Usuario</a></li>
                      <li><a href="administrarIdeas.php">Ideas de proyecto</a></li>
                      <li><a href="administrarPropuesta.php">Propuestas de mueblistas</a></li>
        					  </ul>
        					</li>
                  <li><button class="btn btn-inicio dropdown-toggle" type="button"  data-toggle="dropdown" style="line-height:38px; color:#fff;"><?php echo $_SESSION['nombre'];  ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" style="position: absolute; left:-70px;">
        							<li><a href="verPerfilUsuario.php">Ver Perfil</a></li>
        							<li><a href="#">Notificaciones</a></li>
        							<li class="divider"></li>
        							<li><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
        						</ul>
                  </li>
              </ul>
          </div>
      </div>
    </nav>
    <br>


    <div class="container">
    	<div class="row">
    		<div class="col-md-6 col-md-push-6">
    			<h6 id="bienvenido">Bienvenido Administrador: <a href="verPerfilUsuario.php"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
    		</div>
		  </div>
    </div>
    <br><br>
    <?php
    require_once("../conexion.php");
    echo'<script type="text/javascript" language="javascript" src="../../js/redirigir.js"></script>';

    $consulta = "SELECT * FROM propuesta";
    $resultado = mysqli_query($con, $consulta);
    $numFilas = mysqli_num_rows($resultado);


    echo    "<div class=' col-md-12' style='padding=0; margin:0; '>";
    echo      "<center><h3 style='text-align:rigth;'>Ideas de proyecto</h3></center>";
                while($fila = mysqli_fetch_assoc($resultado)){

    echo          "<div type='button'  class=' col-md-5 col-xs-12 col-sm-12 cuadro_ideas'  style='background-color:#b7d0ec; margin:20px;  border-radius: 5px; height: 210px;' >";
    echo            "<h3 style='text-align: center'>Monto:" . utf8_encode($fila['monto']) . "</h3>";
    echo             "<h4 style='text-align: center'>Dias:" . utf8_encode($fila['dias']) . "</h4>";
    echo             "<h5 style='text-align: center'>" . utf8_encode($fila['descripcion']) . "</h5>";
    echo            "<center><button type='button' class='btn btn-primary' onclick='eliminarPropuesta(".$fila['id_propuesta'] .")'>Eliminar</button></center>";
    echo          "</div>";

    }
    echo    "</div>"; //row
    echo "</div>"; //container

    if($numFilas == 0){
        echo "<h3>NO SE ENCONTRARON RESULTADOS</h3>";
    }

    mysqli_free_result($resultado);

    mysqli_close($con);

    ?>


    <!-- scripts -->
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>


    <script type="text/javascript">
        $.ajax({
            type: 'POST',
			url: 'listarMueblistas.php',
			data: '',
			success: function(resp){
				$('#verComunidad').html(resp);
			}
        });
    </script>

</body>
</html>
