<?php require_once('../conexion/conexion.php'); ?>
<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

	$sql = "SELECT * FROM alumnos";
	$resultado = $mysqli->query($sql);
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
						<h1>Alumnos</h1>
						<div class="offset-sm-10 col-sm-9 pull-right">
							<button type="button"  onclick="location.href='../admin/agr_alu.php'" class="btn btn-primary">Agregar alumno</button>

						</div>
						<br>
						<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Número de control</th>
												<th>Nombre</th>
												<th>Carrera</th>
												<th>Número de teléfono</th>
												<th>Email</th>
												<th>Acción</th>
											</tr>
										</thead>

										<tbody>
											<?php while($row = $resultado->fetch_assoc()) { ?>

												<tr>
													<td><?php echo $row['num_ctrl']; ?></td>
													<td><?php echo $row['nombre']; ?></td>
													<!--<td><?php echo $row['carrera']; ?></td>-->
													<td><?php
															$idcarr1 = $row['id_carr'];
															$sql = "SELECT * FROM carreras where id_carr='$idcarr1'";
															$rescarr = $mysqli->query($sql);
															while($row3 = $rescarr->fetch_assoc()) {
																echo $row3['carrera'];
															}
														?></td>
													<td><?php echo $row['num_tel']; ?></td>
													<td><?php echo $row['email']; ?></td>
													<td><a href="../docente/doc_edi_alu.php?recordID=<?php echo $row['id']; ?>">Editar</a>-<a href="../docente/doc_del_alu.php?recordID=<?php echo $row['id']; ?>">Eliminar</a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
						<!-- InstanceEndEditable -->
					</div>
				</main>

			</div>
		</div>
			<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script src="../js/sweetAlert.js"></script>	-->
	</body>

<!-- InstanceEnd --></html>
