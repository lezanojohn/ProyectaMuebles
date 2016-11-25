<!DOCTYPE html>
<html lang="en">
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
	<!--BARRA DE NAVEGACION -->
    <nav class="nav navbar-default navbar-fixed-top">
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
	
	<div class="respuesta"></div>
   
    <div class="container">    
		<div class="modal fade" id="aceptarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="aceptarmodal">Está seguro que desea aceptar esta propuesta?</h4>
			  </div>
			  <div class="modal-body">
				Si presiona aceptar, se rechazarán todas las demas propuestas. ¿Desea continuar?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="aceptar_propuesta(<?php echo $_GET['id_ideaproyecto'] ?>,<?php echo $_GET['id_propuesta'] ?>)">Aceptar</button>
			  </div>
			</div>
		  </div>
		</div>
       
		<div class="modal fade" id="rechazarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="rechazarmodal">Está seguro que quiere rechazar esta propuesta?</h4>
			  </div>
			  <div class="modal-body">
				Si presiona aceptar, se eliminará esta propuesta de la lista. ¿Desea continuar?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="rechazar_propuesta(<?php echo $_GET['id_propuesta'] ?>)">Aceptar</button>
			  </div>
			</div>
		  </div>
		</div>
                    
                   
        <div class="row">
        	<div class="col-md-6 col-md-push-6">
    			<h6 id="bienvenido">Bienvenido Administrador: <a href="verPerfilUsuario.php"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
    		</div>
    		<div class="col-md-6 col-md-pull-6">
    			<h6 id="volverAtras"><span class="glyphicon glyphicon-home"></span><a href="verProyectos.php">  Proyectos publicados </a><span class="glyphicon glyphicon-chevron-right"></span><a href="#" onclick="verIdeaProyecto('<?php echo $_GET['id_ideaproyecto'] ?>','<?php echo $_GET['nombre_proyecto'] ?>')" id="nombre_proyecto"></a><span class="glyphicon glyphicon-chevron-right"></span><a href="#">  Propuesta </a></h6>
    		</div>
        </div>
        
        <div class="row">
        	<div id="propuesta"></div>
        </div>
    </div>
    
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/redirigir.js"></script>
    
    <script type="text/javascript">
		var nombre_proyecto = '<?php echo $_GET['nombre_proyecto'] ?>';
		var cambiostr = nombre_proyecto.replace(/\%/g,' ');
		cambiostr = ' ' + cambiostr;
		$('#nombre_proyecto').text(cambiostr);
		
		var id_ideaproyecto = '<?php echo $_GET['id_ideaproyecto'] ?>';
        var id_propuesta = '<?php echo $_GET['id_propuesta'] ?>';
        $.ajax({
            type: 'POST',
			url: 'listarDetallePropuesta.php',
			data: {id_propuesta: id_propuesta},
            
			success: function(resp){
				$('#propuesta').html(resp);
			}
        });
        


    </script>

</body>
</html>