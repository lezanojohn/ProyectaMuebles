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
    		<div class="col-md-6 col-md-pull-6">
    			<h6 id="volverAtras"><a href="admin.php"><span class="glyphicon glyphicon-home"></span>  Ver la Comunidad </a></h6>
    		</div>
    	</div>

        <div class="container">
       <div class="row">
         <div class="col-md-12" style="padding-left: 0px;">
           <div class="contenedor-formulario " style="height:1200px;">
             <div class="wrap">
               <center><h3>Registrar mueblista</h3></center>
             <form action="registrarMueblista.php" class="formulario" name="formulario_registro" method="post">

               <div class="col-md-6">
                 <div class="input-group">
                   <input type="text" id="nombre" name="nombre" >
                    <label class="label" for="nombre" >Nombre</label>
                 </div>

                 <div class="input-group">
                   <input type="email" id="correo" name="correo" >
                   <label class="label" for="correo" >Correo</label>
                 </div>



                 <div class="input-group">
                  <input type="password" id="pass" name="pass">
                  <label class="label" for="pass">Contraseña</label>
                </div>

                <div class="input-group">
                 <input type="password" id="pass2" name="pass2">
                 <label class="label" for="pass2">Repetir Contraseña</label>
               </div>





                <div class="input-group">
                  <select name="region" class="option btn btn-primary">
                     <option value="Tarapaca">Tarapaca</option>
                     <option value="Antofagasta">Antofagasta</option>
                     <option value="Calama">Calama</option>
                     <option value="Coquimbo">Coquimbo</option>
                     <option value="Valparaiso">Valparaiso</option>
                     <option value="Libertador Bdo. Ohiggins">Ohiggins</option>
                     <option value="Maule">Maule</option>
                     <option value="Bio Bio">Bio Bio</option>
                     <option value="Araucania">Araucania</option>
                     <option value="Los lagos">Los lagos</option>
                     <option value="Aysen">Aysen</option>
                     <option value="Magallanes">Magallanes</option>
                     <option value="Metropolitana">Metropolitana</option>
                     <option value="Los Ríos">Los Ríos</option>
                     <option value="Arica y Parinacota">Arica</option>
                     <option value="" selected>Region</option>
                   </select>


                </div>

                <div class="">
                  <input class="btn " style="border :none;" type="FILE" name="imagen" id="archivos">
                  <label for="archivo"></label>
                </div>

              </div>

               <div class="col-md-6">
                 <div class="input-group">
                   <input type="text" id="apellidos" name="apellido"  >
                   <label class="label" for="apellidos"  >Apellidos</label>
                 </div>


                </div>

                 <div class="input-group">
                   <input type="text" id="" name="direccion" >
                  <label class="label" for="direccion" >Direccion</label>
                 </div>




               <div class="input-group">
                 <input type="text" id="telefono" name="telefono" >
                  <label class="label" for="telefono"  >Teléfono</label>
               </div>



               <div class="input-group">
                 <select name="especialidad" class="option btn btn-primary">
                    <option value="Baños e interiores">Baños e interiores</option>
                    <option value="Cocina">Cocina</option>
                    <option value="Comedor">Comedor</option>
                    <option value="Exterior">Exterior</option>
                    <option value="Almacenamiento">Almacenamiento</option>
                    <option value="" selected>Especialidad</option>
                  </select>


               </div>





               <div class="input-group checkbox">
                 <input type="checkbox" name="terminos" id="terminos" value="true">
                 <label for="terminos">Acepto los Terminos y Condiciones</label>
               </div>



               <input type="submit" id="btn-submit" value="Enviar" >

             </form>
             </div>
           </div>

         </div>
       </div>
       </div>


    </div>


    <!-- scripts -->
    <script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
     <script src="../../js/formularioRegistro.js"></script>


</body>
</html>
