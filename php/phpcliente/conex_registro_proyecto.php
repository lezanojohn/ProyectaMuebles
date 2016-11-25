<html>
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

     <?php
			require_once("../conexion.php");

			$destino = 'C:\wamp\www\proyectamuebles\img';
  
            if ($_REQUEST['imagen'] == NULL) {
              $origen = "Predeterminada.jpg";
         
            }
            else {
              $origen = $_REQUEST['imagen'];
              
            }
			
            $foto="img/" . $origen;
			move_uploaded_file( $origen, $destino );
			
			$nomp = utf8_decode($_REQUEST['nombre_proyecto']);
			$come = utf8_decode($_REQUEST['comentario']);
			
			mysqli_query($con,"insert into idea_proyecto(nombre_proyecto,descripcion,imagen) values ('$nomp','$come','$foto')")
			  or die("Problemas en el select".mysqli_error($con));
  
            $id = $_SESSION['id_usuario'];
            $max_id = mysqli_query($con, "SELECT MAX(id_ideaproyecto) AS id FROM publica");
            $row=mysqli_fetch_array($max_id);
        
            $id_proyecto=$row['id'];
  
            mysqli_query($con, "UPDATE publica SET id_usuario= ". $id ." WHERE id_ideaproyecto = ". $id_proyecto ."");

            mysqli_close($con);
      ?>

   <div class="container-fluid">
   		<div class="row">
    		<div class="col-md-12 pull-right ctn_bienvenido">
    			<h6 id="bienvenido">Bienvenido: <a href="verPerfilUsuario.php"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
    		</div>
    	</div>
   </div>
   
    <div class="container">
    	<div class="row">
    		<div class="container col-md-12 text-center" style="margin-top: 40px;">
				<h3>Datos registrados correctamente!</h3>
				<a href="verMisIdeas.php" class="btn btn-personalizado btn-lg" style="margin-top: 30px;">Aceptar</a>
			</div>
    	</div>
    </div>

    
    
    <!-- scripts -->
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script> 
</body>
</html>
