<?php require_once('conexion/conexion.php'); ?>
<?php
session_start();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

if(isset($_POST['save'])){

			$num_ctrl = $_POST['num_ctrl'];
			$nombre  = $_POST['nombre'];
			$carrera  = $_POST['carrera'];
			$num_tel  = $_POST['num_tel'];
			$email     = $_POST['email'];

			$sql        = "INSERT INTO alumnos(num_ctrl,nombre,carrera,num_tel,email)
			VALUES ('$num_ctrl','$nombre','$carrera','$num_tel','$email')";

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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<h1>Agregar alumno</h1>
						<form class="mt33" action="" method = "post"><!--form -->

								<!-- First name -->
								<div class="form-group row">
									<label for="description" class="control-label col-sm-3">Numero de control:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Enter first name" required>
									</div>
								</div>

								  <!-- last name -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Nombre del alumno:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter last name" required>
									</div>
								</div>

								<!-- City name  -->
								<div class="form-group row">
									<label for="rootCause" class="control-label col-sm-3">Carrera:</label>
									<div class="col-sm-9">
										<select class="custom-select" id="carrera" name="carrera" aria-label="city_name" required>
											<option value=""> Plase select city name</option>
											<option value="Toky">Toky</option>
											<option value="Phnom Penh">Phnom Penh</option>
											<option value="USA">USA</option>
										</select>
									</div>
								</div>
								  <div class="form-group row">
										<label for="description" class="control-label col-sm-3">Numero de telefono:</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="num_tel" name="num_tel" placeholder="Enter email" required>
										</div>
									</div>
								  <!-- Email -->
								  <div class="form-group row">
									<label for="description" class="control-label col-sm-3">Email:</label>
									<div class="col-sm-9">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
									</div>
								</div>


								<!-- Show Message -->
								<div class="text-success text-center d-none" id="msg_div">
									<h4 id="res_message">Insert has been successfully.</h4>
								</div>

								<!-- btn insert data -->
								<div class="form-group row">
									<div class="offset-sm-3 col-sm-9 pull-right">
										<button type="submit"id="save" name="save" class="btn btn-primary">Save</button>
									</div>
								</div>
            			</form>
</body>
</html>
