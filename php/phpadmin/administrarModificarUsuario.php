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

    <link rel="stylesheet" href="../../css/estilosRegistrar.css" type="text/css">



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
        						          <li><a href=".../admin.php">Ver la comunidad</a></li>
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
    		<div class="col-md-6 col-md-pull-6">
    			<h6 id="volverAtras"><a href="admin.php"><span class="glyphicon glyphicon-home"></span>  Ver la Comunidad </a></h6>
    		</div>
    	</div>
		<div>


      <?php
      $var=$_GET['id_usuario'];
      require_once("../conexion.php");
      $consulta = "SELECT * FROM usuario WHERE id_usuario=$var";
      $resultado = mysqli_query($con,$consulta);
      while($fila = mysqli_fetch_assoc($resultado)){







    echo "
    <div class='container'>
 <div class='row'>
   <div class='col-md-12' style='padding-left: 0px;'>
     <div class='contenedor-formulario'>
       <div class='wrap'>
         <center><h3>Modificar usuario</h3></center>
       <form action='modificarUsuario.php' class='formulario' name='formulario_registro' method='post'>

         <div class='col-md-6'>
           <div class='input-group'>
             <input type='text' id='nombre' name='nombre' placeholder='' Value='" . utf8_encode($fila['nombre']) . "' >
             <label >Nombre</label>
           </div>
           <div class='input-group'>

             <input type='email' id='correo' name='correo' Value='" . utf8_encode($fila['email']) . "'>
             <label >Correo</label>
           </div>
           <div class='input-group'>

             <input type='text' id='pass' name='region'  Value='" . utf8_encode($fila['region']) . "'>
             <label >Region</label>
           </div>
         </div>
         <div class='col-md-6'>
           <div class='input-group'>

             <input type='text' id='apellidos' name='apellidos'  Value='" . utf8_encode($fila['apellido']) . "'>
             <label >Apellidos</label>
           </div>
           <div class='input-group'>
             <input type='text' id='telefono' name='telefono'  Value='" . utf8_encode($fila['telefono']) . "'>
             <label >Teléfono</label>
           </div>

           <div class='input-group'>
             <input type='text' id='' name='direccion' Value='" . utf8_encode($fila['direccion']) . "'>
             <label >Direccion</label>
           </div>
         </div>

         <div class='input-group checkbox'>
           <input type='checkbox' name='terminos' id='terminos' value='true'>
           <label for='terminos'>Acepto los Terminos y Condiciones</label>
         </div>
         <input type='text' name='id_usuario' Value ='" . utf8_encode($var) . "'>

         <input type='submit' id='btn-submit' value='Enviar' >

       </form>
       </div>
     </div>

   </div>
 </div>
 </div>



    ";

}


       ?>




    <!-- scripts -->
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/formularioRegistro.js"></script>

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
