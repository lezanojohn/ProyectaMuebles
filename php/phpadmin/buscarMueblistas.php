<!DOCTYPE html>
<html lang="es">
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
 
 	<?php  
		session_start();
	
		if($_SESSION['id_usuario'] == NULL) {
			header("Location: ../../index.php");
		}
	?>
 	
</head>
<body>
  
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
                    <li>
                    	<button class="btn btn-inicio dropdown-toggle" type="button"  data-toggle="dropdown" style="line-height:38px; color:#fff;"><?php echo $_SESSION['nombre'];  ?> <span class="caret"></span></button>
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
  
    
    <!--  AQUÍ SE CARGA LA FUNCION MOSTRAR MUEBLISTAS EN UN MAPA -->
    <div class="container">
        <div class="row">
        	<div class="col-md-6 col-md-push-6">
    			<h6 id="bienvenido">Bienvenido Administrador: <a href="verPerfilUsuario.php"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
    		</div>
    		<div class="col-md-6 col-md-pull-6">
    			<h6 id="volverAtras"><a href="../admin.php"><span class="glyphicon glyphicon-home"></span> Ver la Comunidad </a> <span class="glyphicon glyphicon-chevron-right"></span><a href="buscarMueblistas.php"> Buscar un mueblista </a></h6>
    		</div>
        </div>
        <div class="row">
            <h3 class="col-md-12">Seleccione un marcador para ver más información:</h3>
            <p id="simbologia"><img src="../../icons/mueblista.png" alt="">Mueblista <img src="../../icons/proveedor.png" alt="">Placacentro</p>
            <section class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                
                <!-- MAPA -->
                <div id="canvas"></div>
            </section>

            <!-- CUADRO DE INFORMACIÓN -->
            <aside class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <h2>Información</h2>
                <p>Nombre:  <b><input type="text" id="nombre" class="info"></b></p>
                <p>Dirección:  <b><input type="text" id="direccion" class="info"></b></p>
                <p>Telefono:  <b><input type="text" id="telefono" class="info"></b></p>
                <p>Email:  <b><input type="text" id="email" class="info"></b></p>
            </aside>
        </div>
    </div>
    

    <!-- scripts -->
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmOidXYZUcTp2zCkUiUQBaoOX3UMdFU0U&callback=initialize" async defer></script>
    <script src="../../js/mapa.js" type="text/javascript"></script>
  
    <script type="text/javascript">    
        var mapa = null;
        function initialize() {
			
			var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng(-36.7907127, -73.0766053), // Gran Concepción
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.land_parcel","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#69be00"},{"lightness":"0"},{"saturation":"0"},{"weight":"1.82"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":"3.59"},{"gamma":"0.36"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#006a4d"},{"weight":"0.14"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.airport","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.bus","elementType":"geometry","stylers":[{"color":"#912e2e"},{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#00b2dd"},{"weight":"0.31"},{"lightness":"0"}]}]
            };
			
            mapa = new google.maps.Map(document.getElementById('canvas'), mapOptions);

            <?php
                require_once("../conexion.php");
                
                // CONSULTA DE MUEBLISTAS
                $consultaM = "SELECT u.nombre, u.apellido, u.telefono, u.direccion, u.email, m.latitud, m.longitud FROM usuario u, mueblista m WHERE u.id_usuario = m.id_usuario";
                $resultadoM = mysqli_query($con, $consultaM);
                $numFilasM = mysqli_num_rows($resultadoM);

                while($filaM = mysqli_fetch_assoc($resultadoM)){
                    $nomM = utf8_encode($filaM["nombre"]);
					$apeM = utf8_encode($filaM["apellido"]);
                    $dirM = utf8_encode($filaM["direccion"]);
                    $telM = $filaM["telefono"];
                    $emaM = utf8_encode($filaM["email"]);
                    $latM = $filaM["latitud"];
                    $lonM = $filaM["longitud"]; 
					
					$nomM = "". $nomM . " " . $apeM ."";

                    echo ("crearMarcador('$nomM','$dirM',$telM,'$emaM',$latM,$lonM,'mueblista');\n\t");
                }

                mysqli_free_result($resultadoM);
                
            
                // CONSULTA DE PROVEEDORES
               $consultaP = "SELECT u.nombre, u.apellido, u.direccion, u.telefono, p.latitud, p.longitud FROM proveedor p, usuario u where u.id_usuario = p.id_usuario";
                $resultadoP = mysqli_query($con, $consultaP);
                $numFilasP = mysqli_num_rows($resultadoP);

                while($filaP = mysqli_fetch_assoc($resultadoP)){
                    $nomP = utf8_encode($filaP["nombre"]);
					$apeP = utf8_encode($filaP["apellido"]);
                    $dirP = utf8_encode($filaP["direccion"]);
                    $telP = $filaP["telefono"];
                    $latP = $filaP["latitud"];
                    $lonP = $filaP["longitud"]; 
					
					$nomP = "". $nomP . " " . $apeP ."";
					
                    echo ("crearMarcador('$nomP','$dirP',$telP,'',$latP,$lonP,'proveedor');\n\t");
                }

                mysqli_free_result($resultadoP);
            
                mysqli_close($con);
            ?>
        } 
    </script>
  
</body>
</html>