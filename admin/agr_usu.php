<?php require_once('../conexion/conexion.php'); ?>
<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

	if(isset($_POST['save'])){


			$user1 = $_POST['user'];


			$sql = "SELECT * FROM usuarios WHERE usuario='$user1'";
			//echo $sql;
			$resultado1 = $mysqli->query($sql);
			$num = $resultado1->num_rows;

			if($num>0){

					/*echo "<script>";
	  				echo "myFunction();";
					echo "</script>";*/


				} else {
						$usuario1 = $_POST['user'];
						$password1  = $_POST['password'];
						$nombre1 = $_POST['nombre'];
						$tipo_usuario1  = $_POST['tipo_usuario'];


						$sql ="INSERT INTO usuarios(usuario,password,nombre,tipo_usuario)
						VALUES ('$usuario1','$password1','$nombre1','$tipo_usuario1')";

						if (mysqli_query($mysqli, $sql))
						{
							$sucess = "Insert has been successfully.!";
						}
						else
						{
					 echo "Error: " . $sql . "
						" . mysqli_error($mysqli);
					 }
				}



	}

?>

<!DOCTYPE html>
<html ><!-- InstanceBegin template="/Templates/admin_pla.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta charset="UTF-8" />
        <title>Control de acceso</title>
        <link href="../estilos/estilos.css" rel="stylesheet" />

	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="inicio.php">Control de acceso </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


				</li>

					<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php">Salir</a>
					</div>

			</ul>
		</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="inicio.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Inicio</a>
							<a class="nav-link" href="reg_ent_sal.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Control acceso</a>
							<a class="nav-link" href="registros.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Registros</a>
							
							<a class="nav-link" href="alu_list.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Alumnos</a>
							<a class="nav-link" href="usu_list.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Usuarios</a>

					</div>

				</nav>
			</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!-- InstanceBeginEditable name="contenidoeditable" -->
						<h1>Agregar usuario</h1>
						<form class="mt33" action="" method = "post"><!--form -->

								<!-- First name -->
								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Usuario:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="user" name="user" placeholder="Ingrese el nombre de usuario" required>
									</div>
								</div>

								  <!-- last name -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Contraseña:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña" required>
									</div>
								</div>

								<!-- City name  -->

								  <div class="form-group row">
										<label for="description" class="control-label col-sm-3">Nombre:</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
										</div>
									</div>

								<div class="form-group row">
									<label for="rootCause" class="control-label col-sm-3">Tipo de usuario:</label>
									<div class="col-sm-9">
										<select class="custom-select" id="tipo_usuario" name="tipo_usuario" aria-label="tipo_usuario" required>
											<option value=""> -Selecione una opción-</option>
											<option value="1"> Administrador</option>
											<option value="2"> Docente</option>
											<option value="3"> Encargado</option>

										</select>
									</div>
								</div>


								<!-- Show Message -->
								<div class="text-success text-center d-none" id="msg_div">
									<h4 id="res_message">Insert has been successfully.</h4>

								</div>

								<!-- btn insert data -->
								<div class="form-group row">
									<div class="offset-sm-3 col-sm-9 pull-right">
										<button type="submit"id="save" name="save" class="btn btn-primary">Guardar</button>
									</div>
								</div>
            			</form>


						<!-- InstanceEndEditable -->
					</div>
				</main>

			</div>
		</div>
			<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script src="../js/sweetAlert.js"></script>	-->
			 <!-- InstanceBeginEditable name="contenidoeditable2" -->contenidoeditable<!-- InstanceEndEditable -->
	</body>

<!-- InstanceEnd --></html>
