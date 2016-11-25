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

                <a href="../../index.php" class="navbar-brand">Proyecta Muebles</a>
            </div> 

            <!--MENU-->
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mueblistas <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="../navegante.php">Ver la comunidad</a></li>
                    	<li><a href="buscarMueblistas.php">Buscar un mueblista</a></li>
					  </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ideas de proyecto <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="verProyectos.php">Proyectos publicados</a></li>
						</ul>
					</li>
                    <li><a href="../../index.php">Iniciar Sesión</a></li>
                    <li><a href="../registrar.php">Regístrate</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
  
  	<div class="container-fluid">
  		<div class="row">
    		<div class="col-md-12">
    			<h6 id="volverAtras"><a href="../navegante.php"><span class="glyphicon glyphicon-home"></span> Ver la Comunidad </a> <span class="glyphicon glyphicon-chevron-right"></span><a href="buscarMueblistas.php"> Buscar un mueblista </a></h6>
    		</div>
    	</div>
  	</div>
    
    <!--  AQUÍ SE CARGA LA FUNCION MOSTRAR MUEBLISTAS EN UN MAPA -->
    <div class="container">
        <div class="row">
            <h3 class="col-md-12">Seleccione un marcador para ver más información</h3>
            <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                
                <!-- MAPA -->
                <div id="canvas"></div>
            </section>
            

            <!-- CUADRO DE INFORMACIÓN -->
            <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h2>Información</h2>
                <p>Nombre:  <b><input type="text" id="nombre" class="info"></b></p>
                <p>Dirección:  <b><input type="text" id="direccion" class="info"></b></p>
                <p>Telefono:  <b><input type="text" id="telefono" class="info"></b></p>
                <p>Email:  <b><input type="text" id="email" class="info"></b></p>
            </aside>
        </div>
        <div class="row">
        	<p id="simbologia"><img src="../../icons/mueblista.png" alt="" class="img_marcador">Mueblista <img src="../../icons/proveedor.png" alt="" class="img_marcador">Placacentro</p>
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
                    styles: [{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"simplified"},{"hue":"#1300ff"}]}]
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