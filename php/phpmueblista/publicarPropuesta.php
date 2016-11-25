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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <nav class="nav navbar-default navbar-fixed-top barra">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="verProyectos.php" class="navbar-brand">Proyecta Muebles</a>
            </div>

            <!--MENU-->
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mueblistas <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="verComunidad.php">Ver la comunidad</a></li>
                    	<li><a href="buscarMueblistas.php">Buscar un mueblista</a></li>
					  </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ideas de proyecto <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="verProyectos.php">Proyectos publicados</a></li>
							<li><a href="verMisPropuestas.php">Mis propuestas</a></li>
						</ul>
					</li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre'];  ?>  <span class="caret"></span></a>
						<ul class="dropdown-menu" style="position: absolute; left:-55px;">
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-push-6">
				<h6 id="bienvenido">Bienvenido: <a href="verPerfilUsuario.php"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
			</div>
			<div class="col-md-6 col-md-pull-6">
				<h6 id="volverAtras"><span class="glyphicon glyphicon-home"></span><a href="verProyectos.php">  Proyectos publicados </a><span class="glyphicon glyphicon-chevron-right"></span><a href="#" onclick="verIdeaProyecto('<?php echo $_GET['id_ideaproyecto'] ?>','<?php echo $_GET['nombre_proyecto'] ?>')" id="nombre_proyecto"></a><span class="glyphicon glyphicon-chevron-right"></span><a href="#">  Publicar propuesta </a></h6>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="cuadro_formulario col-md-12">  
				<h3>Publicar una propuesta:</h3>      
				<form action="conex_registro_propuesta.php" method="post" class="form-horizontal">
				
					<input type="text" value="<?php echo $_GET['id_ideaproyecto'] ?>" name="id_ideaproyecto" style="display: none;">
					<div class="form-group has-success " >
						<label for="nombre" class="control-label col-md-2">Dias de trabajo:</label>
						<div class="col-md-5 ">
							<input name="dias"   type="text" class=" form-control nombre" id="btnValidar" placeholder="ingrese los días que tardaría en fabricar el mueble">
							<span class="help-block">Debe ingresar números </span>
						</div>
					</div>

					<div class="form-group has-success " >
						<label for="nombre" class="control-label col-md-2">Presupuesto $:</label>
						<div class="col-md-5 ">
							<input name="monto" type="text" class=" form-control nombre" id="btnValidarDia" placeholder="ingrese la cantidad de dinero que cobraría por fabricar el mueble">
							<span class="help-block">Debe ingresar números </span>
						</div>
					</div>

					<div class="form-group has-success">
						<label for="comentario" class="control-label col-md-2">Descripción:</label>
						<div class="col-md-5">
							<textarea name="comentario" class="form-control nombre" id="btnValidarCom" placeholder="comentarios"></textarea>
							<span class="help-block">Debe ingresar letras </span>
						</div>
					</div>  
					
					<div class="form-group has-success" style="display:none;">
						<label for="nom_proy" class="control-label col-md-2">Nombre Proyecto:</label>
						<div class="col-md-5">
							<input name="nom_proy" id="nom_proy" class="form-control nombre" value="">  
						</div>
					</div>  

					<div class="form-group">
						<div class="col-md-2 col-md-offset-3">
							<button  id="enviar" type="submit" value="validar"  name="boton" id="btnValidarPresupuesto" class="btn btn-personalizado btn-lg ">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/redirigir.js"></script> 
    <script src="../../js/validar.js"></script> 
    
    <script type="text/javascript">
		var nombre_proyecto = '<?php echo $_GET['nombre_proyecto'] ?>';
		var cambiostr = nombre_proyecto.replace(/\%/g,' ');
		cambiostr = ' ' + cambiostr;
		$('#nombre_proyecto').text(cambiostr);
		$('#nom_proy').val(cambiostr);
    </script>
</body>
</html>