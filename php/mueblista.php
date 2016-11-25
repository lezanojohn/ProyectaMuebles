 <?php  
		session_start();
	
		if($_SESSION['id_usuario'] == NULL) {
			header("Location: ../../index.php");
		} else {
			header("Location: phpmueblista/verProyectos.php");
		}
?>