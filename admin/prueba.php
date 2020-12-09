<?php require_once('../conexion/conexion.php'); ?>
<?php

	session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];

	$tipo_usuario = $_SESSION['tipo_usuario'];

	if($_GET['del'])
    {
        $id=$_GET['del'];
       $sql= "DELETE FROM alumnos  WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)){
			$sucess = "Insert has been successfully.!";
			header("Location: alu_list.php");
		}else{
			echo "Error: " . $sql . "
						" . mysqli_error($mysqli);
		}
    }


	$sql = "SELECT * FROM alumnos";
	$resultado = $mysqli->query($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
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
													<td><a href="../admin/edi_alu.php?recordID=<?php echo $row['id']; ?>">Editar</a>-<a href="" onclick="preguntar(<?php echo $row['id'] ?>)">Eliminar</a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
            			</form>
            			</form>
</body>
<script type="text/javascript">
            function preguntar(id)
            {
                if(confirm('¿Estás seguro que deseas borrar?'))
                {
                    window.location.href = "prueba.php?del="+id;
					
                }
            }
        </script>
</html>
