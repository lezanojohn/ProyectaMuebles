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
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <link rel="stylesheet" href="../css/estilosBotones.css" type="text/css">
 	
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

                <a href="../index.php" class="navbar-brand">Proyecta Muebles</a>
            </div>

            <!--MENU-->
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mueblistas <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="navegante.php">Ver la comunidad</a></li>
                    	<li><a href="phpnavegante/buscarMueblistas.php">Buscar un mueblista</a></li>
					  </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ideas de proyecto <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="phpnavegante/verProyectos.php">Proyectos publicados</a></li>
						</ul>
					</li>
                    <li><a href="../index.php">Iniciar Sesión</a></li>
                    <li><a href="registrar.php">Regístrate</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
  	
  	<div class="container-fluid">
  		<div class="row">
    		<div class="col-md-12">
    			<h6 id="volverAtras"><a href="navegante.php"><span class="glyphicon glyphicon-home"></span>  Ver la Comunidad </a></h6>
    		</div>
    	</div>
  	</div>
  
    <div class="container">
		<div class="row">
			<div id="verComunidad"></div>
		</div>
    </div>
  
  
    <!-- scripts -->
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  
    <script type="text/javascript">
        $.ajax({
            type: 'POST',
			url: 'phpnavegante/listarMueblistas.php',
			data: '',
			success: function(resp){
				$('#verComunidad').html(resp);
			}
        });
    </script>
  
</body>
</html>