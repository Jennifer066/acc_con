<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];


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

						<h1>Registrar entrada/salida</h1>
						<form class="mt33" action="reg_ent_sal2.php" method = "get">


								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Número de control:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Ingresa el número de control" required onKeyPress="function()">
									</div>
								</div>
						</form>
						<form class="mt33" action="" method = "post">

								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Nombre del alumno:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="nombre" name="nombre"  disabled >
									</div>
								</div>


								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Carrera:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="carerra" name="carerra"  disabled>
									</div>
								</div>

								  <div class="form-group row">
										<label for="description" class="control-label col-sm-3">Hora de entrada:</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="num_tel" name="num_tel"  disabled>
										</div>
									</div>

								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Hora de salida:</label>
									<div class="col-sm-9">
									<input type="email" class="form-control" id="email" name="email"  disabled >
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
			 <!-- InstanceBeginEditable name="contenidoeditable2" -->contenidoeditable<!-- InstanceEndEditable -->
	</body>

<!-- InstanceEnd --></html>
