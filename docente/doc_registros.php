<?php require_once('../conexion/conexion.php'); ?>
<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	$sql = "SELECT * FROM carreras";
	$resultado4 = $mysqli->query($sql);

	$sql = "select id,num_ctrl,nombre,id_carr,left((fecha_reg),10) as fecha,TIME_FORMAT(fecha_reg,'%r') as Hora_ent,TIME_FORMAT(fecha_sal,'%r') as Hora_sal from reg_ent_sal";
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
						<h1>Registros</h1>
						<div class="offset-sm-10 col-sm-9 pull-right">
							
							<button type="button"  onclick="location.href='../reportes/reporte3.php'" class="btn btn-primary">Imprimir reporte</button>

						</div>
						<div class="offset-sm-0 col-sm-9 pull-left">
							<form class="" action="doc_registros_bus.php" method = "get">
										Desde: <input type="date" id="de" name="de" value="" >
										Hasta: <input type="date" id="hasta" name="hasta" value="" >
										<select class="" id="carrera" name="carrera" aria-label="city_name" >
											<option value=""> -Selecione una carrera-</option>
											<?php foreach($resultado4 as $opcion1): ?>

													<option value="<?php echo $opcion1['id_carr']; ?>"><?php echo $opcion1['carrera']; ?></option>

											<?php endforeach ?>
										</select>
								<button type="submit"   class="btn btn-primary">Filtrar</button>
								<button type="button"  onclick="location.href='../docente/doc_registros.php'" class="btn btn-primary">Todos</button>
							</form>	
							
						</div>
						<br>

						<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Número de control</th>
												<th>Nombre</th>
												<th>Carrera</th>
												<th>Fecha registro</th>
												<th>Hora entrada</th>
												<th>Hora salida</th>
												<th>Acción</th>
											</tr>
										</thead>

										<tbody>
											<?php while($row = $resultado->fetch_assoc()) { ?>

												<tr>
													<td><?php echo $row['num_ctrl']; ?></td>
													<td><?php echo $row['nombre']; ?></td>
													<td><?php
															$idcarr1 = $row['id_carr'];
															$sql = "SELECT * FROM carreras where id_carr='$idcarr1'";
															$rescarr = $mysqli->query($sql);
															while($row3 = $rescarr->fetch_assoc()) {
																echo $row3['carrera'];
															}
														?></td>
													<td><?php echo $row['fecha']; ?></td>
													<td><?php echo $row['Hora_ent']; ?></td>
													<td><?php echo $row['Hora_sal']; ?></td>
													<td><a href="" onclick="preguntar(<?php echo $row['id'] ?>)">Eliminar</a></td>

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
			<!-- InstanceBeginEditable name="contenidoeditable2" -->
			<script type="text/javascript">
            function preguntar(id)
            {
                if(confirm('¿Estás seguro que deseas borrar?'))
                {
                    window.location.href = "doc_del_reg.php?recordID="+id;
					alert("Se elimino con exito el registro");
					
                }
            }
        </script>
			<!-- InstanceEndEditable -->
	</body>

<!-- InstanceEnd --></html>
