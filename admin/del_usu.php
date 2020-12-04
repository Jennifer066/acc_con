<?php require_once('../conexion/conexion.php'); ?>
<?php

    session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	$recordID= $_GET["recordID"];

	$sql= "DELETE FROM usuarios WHERE id='$recordID'";

	if (mysqli_query($mysqli, $sql)){
			$sucess = "Insert has been successfully.!";
			header("Location: usu_list.php");
	}else{
			echo "Error: " . $sql . "
						" . mysqli_error($mysqli);
	}


?>
