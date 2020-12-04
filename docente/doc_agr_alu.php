<?php require_once('../conexion/conexion.php'); ?>
<script>
	function myFunction() {
  		alert("Email o contraseña incorrectos");

	}
</script>
<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

	$sql = "SELECT * FROM carreras";
	$resultado = $mysqli->query($sql);

	if(isset($_POST['save'])){


			$num_ctrl = $_POST['num_ctrl'];


			$sql = "SELECT num_ctrl FROM alumnos WHERE num_ctrl='$num_ctrl'";
			//echo $sql;
			$resultado1 = $mysqli->query($sql);
			$num = $resultado1->num_rows;

			if($num>0){

					/*echo "<script>";
	  				echo "myFunction();";
					echo "</script>";*/


				} else {
						$num_ctrl = $_POST['num_ctrl'];
						$nombre1  = $_POST['nombre'];
						$carrera  = $_POST['carrera'];
						$num_tel  = $_POST['num_tel'];
						$email     = $_POST['email'];

						$sql        = "INSERT INTO alumnos(num_ctrl,nombre,id_carr,num_tel,email)
						VALUES ('$num_ctrl','$nombre1','$carrera','$num_tel','$email')";

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
<html ><!-- InstanceBegin template="/Templates/doce_pla.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta charset="UTF-8" />
        <title>Control de acceso</title>
        <link href="../estilos/estilos.css" rel="stylesheet" />

	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Control de acceso </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
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
                            <a class="nav-link" href="inicio_doc.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Inicio</a>
							<a class="nav-link" href="doc_reg_ent_sal.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Control acceso</a>
							<a class="nav-link" href="doc_registros.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Registros</a>
							<a class="nav-link" href=""
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Reportes</a>
							<a class="nav-link" href="doc_alu_list.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Alumnos</a>

					</div>

				</nav>
			</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!-- InstanceBeginEditable name="contenidoeditable" -->

						<h1>Agregar alumno</h1>
						<form class="mt33" action="" method = "post"><!--form -->

								<!-- First name -->
								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Número de control:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Ingrese el número de control" required>
									</div>
								</div>

								  <!-- last name -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Nombre del alumno:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del alumno" required>
									</div>
								</div>

								<!-- City name  -->
								<div class="form-group row">
									<label for="rootCause" class="control-label col-sm-3">Carrera:</label>
									<div class="col-sm-9">
										<select class="custom-select" id="carrera" name="carrera" aria-label="city_name" required>
											<option value=""> -Selecione una carrera-</option>
											<?php foreach($resultado as $opcion1): ?>

													<option value="<?php echo $opcion1['id_carr']; ?>"><?php echo $opcion1['carrera']; ?></option>

											<?php endforeach ?>
										</select>
									</div>
								</div>
								  <div class="form-group row">
										<label for="description" class="control-label col-sm-3">Número de teléfono:</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="num_tel" name="num_tel" placeholder="Ingrese el número de teléfono" required>
										</div>
									</div>
								  <!-- Email -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">E-mail:</label>
									<div class="col-sm-9">
									<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el e-mail" required>
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
	</body>

<!-- InstanceEnd --></html>
