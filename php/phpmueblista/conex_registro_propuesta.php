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
    
    <?php
    	require_once("../conexion.php");
  
        $var_id_usuario = $_SESSION['id_usuario'];
		$nomp = utf8_decode($_REQUEST['nom_proy']);
		$come = utf8_decode($_REQUEST['comentario']);
  
     	mysqli_query($con,"insert into propuesta(id_propuesta,id_usuario,monto,descripcion,dias) values (NULL, '$var_id_usuario','$_REQUEST[monto]','$come','$_REQUEST[dias]')") or die("Problemas en el select".mysqli_error($con));  
        
        $max_id = mysqli_query($con, "SELECT MAX(id_propuesta) AS id FROM tiene");
        $row=mysqli_fetch_array($max_id);
        $id_propuesta=$row['id'];
  
        $id= $_POST['id_ideaproyecto'];
        mysqli_query($con, "UPDATE tiene SET id_ideaproyecto= ". $id ." WHERE id_propuesta = ". $id_propuesta ."");
        
        
        require "../phpmailer/class.phpmailer.php";
          
          $mail = new PHPMailer;
		  
          $mail->IsSMTP();
		  
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = "tls";

		  //indico el servidor de hotmail para SMTP
          $mail->Host = "smtp.live.com";

		  //indico el puerto que usa hotmail
          $mail->Port = 25;

		  //indico un usuario / clave de usuario de hotmail
          $mail->Username = "proyecta.muebles@hotmail.com";
          $mail->Password = "proyecta2";
       
          $mail->From = "proyecta.muebles@hotmail.com";
        
          $mail->FromName = "Administrador";
        
	
			// modificaciones
	
          $query=mysqli_query($con, "SELECT u.email FROM usuario u JOIN consumidor c USING (id_usuario) JOIN publica p USING (id_usuario) WHERE p.id_ideaproyecto = ". $id ."");
          $row=mysqli_fetch_array($query);
          $email=$row['email'];
        //  echo "$email";
          //$email = strval($email);
           // $success = settype($email, 'string');
  
          $nombre=mysqli_query($con, "SELECT u.nombre FROM usuario u JOIN consumidor c USING (id_usuario) JOIN publica p USING (id_ideaproyecto) WHERE p.id_ideaproyecto = ". $id ."");
  
          $asunto="Nueva propuesta para su idea de proyecto.";
          
          $dias= $_POST['dias'];
          $monto= $_POST['monto'];
          $comentario= $_POST['comentario'];
 
          $mensaje="<p>Estimado usuario, uno de nuestros mueblistas acaba de publicar una propuesta en su proyecto <b>". $nomp ."</b>.<br><br><u>Detalle de la propuesta:</u><br>Nombre Proyecto: " . $nomp . ".<br>Dias: " . $dias . ".<br>Monto: " . $monto .".<br>Comentario: " . $comentario .".<br><br>Proyecta Muebles.<br></p>";
         // $email="wclai@ing.ucsc.cl";
        
          $mail->Subject = $asunto;
        
          $mail->addAddress($email, $nombre);
        
          $mail->MsgHTML($mensaje);
  
          if($mail->Send()){
            $msg= "En hora buena el mensaje ha sido enviado con exito a $email";
          }
          
          else {
            $msg = "Lo siento, ha habido un error al enviar el mensaje a $email";
          }      
  
		mysqli_close($con);
    
	?>
    
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12 pull-right ctn_bienvenido">
    			<h6 id="bienvenido">Bienvenido: <a href="#"><?php echo "<img src='../../". $_SESSION['foto_perfil'] . "'  id='imgPerfil' class='img-circle' alt='Responsive image'>"; echo " ". $_SESSION['nombre'] ." ". $_SESSION['apellido'] ."";  ?></a>.</h6>
    		</div>
    	</div>
    </div>
    
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<center><h3>Datos registrados exitosamente!</h3></center>
			</div> 
			<div class="col-md-12">
				<center><a href="verProyectos.php" class="btn btn-personalizado">Aceptar</a></center>
			</div> 
		</div>
    </div>
    
	<script src="../../js/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script> 
</body>
</html>