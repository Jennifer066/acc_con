<?php require_once('../conexion/conexion.php'); ?>
<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];

	$tipo_usuario = $_SESSION['tipo_usuario'];

	$num_ctrl = $_GET['num_ctrl'];
	date_default_timezone_set("America/Mexico_City");

			$sql = "SELECT * FROM alumnos WHERE num_ctrl='$num_ctrl'";
			//echo $sql;
			$resultado1 = $mysqli->query($sql);
			$num = $resultado1->num_rows;

			if($num>0){
						$fechaact =  date("Y-m-d");
						$sql = "select id,num_ctrl,nombre,id_carr,TIME_FORMAT(fecha_reg,'%r') as Hora from reg_ent_sal  where datediff(fecha_reg, '$fechaact') = 0 and fecha_sal IS NULL and num_ctrl='$num_ctrl'";
						$resultado2 = $mysqli->query($sql);
						$num2 = $resultado2->num_rows;
						if($num2>0){
								//actualiza
								while($row3 = $resultado2->fetch_assoc()) {
									$id1 = $row3['id'];
									$num_ctrl1 =  $row3['num_ctrl'];
									$nombre1  =  $row3['nombre'];
									$idcarr1 = $row3['id_carr'];
									$sql = "SELECT * FROM carreras where id_carr='$idcarr1'";
									$rescarr = $mysqli->query($sql);
									while($row4 = $rescarr->fetch_assoc()) {
												$carrera1  = $row4['carrera'];
									}
									$hora_ent1 =  $row3['Hora'];
									$hora_sal1 =  date("h:i:s A");
									$fecha_sal1 =  date("Y-m-d H:i:s ");
								}

								$sql= "UPDATE reg_ent_sal SET fecha_sal='$fecha_sal1' WHERE id='$id1'";

								if (mysqli_query($mysqli, $sql)){
									$sucess = "Insert has been successfully.!";

									header("refresh:5;url=http://localhost/con_acc/admin/reg_ent_sal.php");
								}
								else{
							 		echo "Error: " . $sql . "
									" . mysqli_error($mysqli);
							 	}
						}else{
							//inserta
								while($row2 = $resultado1->fetch_assoc()) {
									//$id1 = $row['id'];

									$num_ctrl1 =  $row2['num_ctrl'];
									$nombre1  =  $row2['nombre'];
									$idcarr1 = $row2['id_carr'];
									$sql = "SELECT * FROM carreras where id_carr='$idcarr1'";
									$rescarr = $mysqli->query($sql);
									while($row4 = $rescarr->fetch_assoc()) {
												$carrera1  = $row4['carrera'];
									}
									$hora_ent1 =  date("h:i:s A");
									$fecha_reg1 =  date("Y-m-d H:i:s ");
									$hora_sal1 =  "";
								}

								$sql        = "INSERT INTO reg_ent_sal(num_ctrl,nombre,id_carr,fecha_reg,nom_usa)
								VALUES ('$num_ctrl1','$nombre1','$idcarr1','$fecha_reg1','$nombre')";

								if (mysqli_query($mysqli, $sql)){
									$sucess = "Insert has been successfully.!";

									header("refresh:5;url=http://localhost/con_acc/admin/reg_ent_sal.php");
								}
								else{
							 		echo "Error: " . $sql . "
									" . mysqli_error($mysqli);
							 	}
						}


				} else {
						$num_ctrl1 =  $num_ctrl;
						$nombre1  =  "Este alumno no esta registrado";
						$carrera1  =  "";
						$hora_ent1 =  "";
						$fecha_reg1 =  "";
						$hora_sal1 =  "";
						header("refresh:5;url=http://localhost/con_acc/admin/reg_ent_sal.php");
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
							<a class="nav-link" href=""
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Reportes</a>
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
						<h1>Registrar entrada/salida</h1>
						<form class="mt33" action="" method = "post">


								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Número de control:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="num_ctrl" name="num_ctrl" value="<?php echo $num_ctrl ?>" required >
									</div>
								</div>


								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Nombre del alumno:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="nombre" name="nombre"  disabled value="<?php echo $nombre1 ?>">
									</div>
								</div>


								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Carrera:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="carerra" name="carerra"  disabled									   value="<?php echo $carrera1 ?>">
									</div>
								</div>

								  <div class="form-group row">
										<label for="description" class="control-label col-sm-3">Hora de entrada:</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="num_tel" name="num_tel"  disabled value="<?php echo $hora_ent1  ?>">
										</div>
									</div>

								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Hora de salida:</label>
									<div class="col-sm-9">
									<input type="email" class="form-control" id="email" name="email"  disabled
										   value="<?php echo $hora_sal1 ?>">
									</div>
								</div>

								<div class="form-group row">
									<div class="offset-sm-3 col-sm-9 pull-right invisible">
										<button type="submit"id="save" name="save" class="btn btn-primary"  >Guardar</button>
									</div>
								</div>

								<div class="text-success text-center d-none" id="msg_div">
									<h4 id="res_message">Insert has been successfully.</h4>

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
