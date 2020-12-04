<?php

	require "conexion/conexion.php";

	session_start();

	if($_POST){

		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		$sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;

		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];

			$pass_c = $password;

			if($password_bd == $pass_c){

				if($row['tipo_usuario']==1 ){
					$_SESSION['id'] = $row['id'];
					$_SESSION['nombre'] = $row['nombre'];
					$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

					header("Location: admin/inicio.php");
				}else{
						if($row['tipo_usuario']==2 ){
						$_SESSION['id'] = $row['id'];
						$_SESSION['nombre'] = $row['nombre'];
						$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

						header("Location: docente/inicio_doc.php");
						}else{
							$_SESSION['id'] = $row['id'];
							$_SESSION['nombre'] = $row['nombre'];
							$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
							header("Location: encargado/inicio_enc.php");
						}

				}
			} else {

			echo "La contraseña no coincide";

			}


			} else {
			echo "NO existe usuario";
		}



	}



?>
<html >
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
       <link href="estilos/estilos.css" rel="stylesheet" />
         <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script> -->
	</head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar sesión</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label><input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Ingrese el usuario" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Ingrese el password" /></div>


                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a></a>
											<button type="submit" class="btn btn-primary">Iniciar sesión</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>
       <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>-->
	</body>
</html>
