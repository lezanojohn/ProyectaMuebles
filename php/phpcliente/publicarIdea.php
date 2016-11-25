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

                <a href="../cliente.php" class="navbar-brand">Proyecta Muebles</a>
            </div>

            <!--MENU-->
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mueblistas <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="../cliente.php">Ver la comunidad</a></li>
                    	<li><a href="buscarMueblistas.php">Buscar un mueblista</a></li>
					  </ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ideas de proyecto <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="verProyectos.php">Proyectos publicados</a></li>
							<li><a href="verMisIdeas.php">Mis proyectos</a></li>
							<li><a href="publicarIdea.php">Publicar idea de proyecto</a></li>
						</ul>
					</li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre'];  ?>  <span class="caret"></span></a>
						<ul class="dropdown-menu" style="position: absolute; left:-52px;">
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
    		<div class="col-md-12 pull-right ctn_bienvenido">
    			<h6 id="bienvenido">Bienvenido: <a href="verPerfilUsuario.php"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
    		</div>
    	</div> 
	</div>

 	<div class="container"> 
    	<div class="row">
    		<h3>Publicar una idea de proyecto:</h3>  
    		<center>
				<div class="cuadro_formulario col-md-12"> 
					<div class="container"><br>
						<form action="conex_registro_proyecto.php" method="post" class="form-horizontal">
							<div class="form-group" >
								<label for="nombre" class="control-label col-md-2">Nombre proyecto:</label>
								<div class="col-md-5  has-success">
									<input name="nombre_proyecto"   type="text" class=" form-control nombre" id="texto" placeholder="ingrese nombre">
									<span class="help-block">Debe ingresar letras </span>
								</div>
							</div>

							<div class="form-group">
								<label for="comentario" class="control-label col-md-2">Descripción:</label>
								<div class="col-md-5  has-success">
									<textarea name="comentario" rows="10" class="form-control" id="btnValidarNombre" placeholder="comentarios"></textarea>
									<span class="help-block">Debe ingresar letras </span>
								</div>
							</div>

							<div class="form-group has-warning">
								<label for="imagenes" class="control-label col-md-2" ></label>
								<div class="col-md-5">
									<input name="imagen" class="" type="file" id="btnValidarComentario">
									<span class="help-block">Debe ingresar letras </span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									<center><button id="enviar" value="validar"  name="boton"  class="btn btn-personalizado btn-lg">Publicar</button></center>
								</div>
							</div>
						</form>
					</div> 
				</div>   
			</center>
    	</div>  
	</div> 

    <!-- scripts -->
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script> 
    <script src="../../js/validar.js"></script> 
</body>
</html>