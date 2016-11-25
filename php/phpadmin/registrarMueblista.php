<?php

require_once("../conexion.php");
$tipo =3;
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$region=$_POST['region'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$pass=$_POST['pass'];
$especialidad=$_POST['especialidad'];
$direccion=$_POST['direccion'];


$origen = $_REQUEST['imagen'];
   if($origen==""){
   $imagen="img/user-predeterminado.png";
    mysqli_query($con,"insert into usuario (nombre,id_tipo_usuario, apellido, region, email, telefono, contrasena,foto_perfil,direccion) values ('$nombre','$tipo','$apellido','$region','$correo','$telefono','$pass','$imagen','$direccion')")
     or die("Problemas en el select".mysqli_error($con));

   }else{

   //$origen1 = $_FILES['imagen']['tmp_name'];
   move_uploaded_file( $origen, $destino );
   $aux="img/";
   mysqli_query($con,"insert into usuario (nombre,id_tipo_usuario, apellido, region, email, telefono, contrasena,foto_perfil,direccion) values (''$nombre','$tipo','$apellido','$region','$correo','$telefono','$pass','$aux$imagen','$direccion')")
     or die("Problemas en el select".mysqli_error($con));


}


  header('Location: ../admin.php');
 ?>
