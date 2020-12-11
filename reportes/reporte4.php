<?php require_once('../conexion/conexion.php'); ?>
<?php
	include '../plantilla2.php';
	
	
	$carr = $_GET['carr'];
	$de1 = $_GET['de'];
	$hasta1 = $_GET['hasta'];

	if($_GET['carr'] && empty($de1)){
		$sql = "select id,num_ctrl,nombre,id_carr,left((fecha_reg),10) as fecha,TIME_FORMAT(fecha_reg,'%r') as Hora_ent,TIME_FORMAT(fecha_sal,'%r') as Hora_sal from reg_ent_sal where id_carr='$carr'";
			$resultado = $mysqli->query($sql);
	}else{
		if($_GET['de'] && empty($carr)){
			$sql = "select id,num_ctrl,nombre,id_carr,left((fecha_reg),10) as fecha,TIME_FORMAT(fecha_reg,'%r') as Hora_ent,TIME_FORMAT(fecha_sal,'%r') as Hora_sal from reg_ent_sal where fecha_reg >= '$de1' and fecha_reg <= '$hasta1'";
			$resultado = $mysqli->query($sql);
		}else{
			if($_GET['carr'] && $_GET['de'] ){
				$sql = "select id,num_ctrl,nombre,id_carr,left((fecha_reg),10) as fecha,TIME_FORMAT(fecha_reg,'%r') as Hora_ent,TIME_FORMAT(fecha_sal,'%r') as Hora_sal from reg_ent_sal where fecha_reg >= '$de1' and fecha_reg <= '$hasta1' and id_carr='$carr' ";
				$resultado = $mysqli->query($sql);
			}else{
				$sql = "select id,num_ctrl,nombre,id_carr,left((fecha_reg),10) as fecha,TIME_FORMAT(fecha_reg,'%r') as Hora_ent,TIME_FORMAT(fecha_sal,'%r') as Hora_sal from reg_ent_sal";
				$resultado = $mysqli->query($sql);
			}
		}
	}
	
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(28,6,'Numero de control',1,0,'C',1);
	$pdf->Cell(45,6,'Nombre',1,0,'C',1);
	$pdf->Cell(62,6,'Carrera',1,0,'C',1);
	$pdf->Cell(26,6,'Fecha de registro',1,0,'C',1);
	$pdf->Cell(18,6,'Entrada',1,0,'C',1);
	$pdf->Cell(18,6,'Salida',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',6);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(28,6,utf8_decode($row['num_ctrl']),1,0,'C');
		$pdf->Cell(45,6,$row['nombre'],1,0,'C');
		$idcarr1 = $row['id_carr'];
		$sql = "SELECT * FROM carreras where id_carr='$idcarr1'";
		$rescarr = $mysqli->query($sql);
		while($row3 = $rescarr->fetch_assoc()) {
					$pdf->Cell(62,6,utf8_decode($row3['carrera']),1,0);
		}		
		$pdf->Cell(26,6,$row['fecha'],1,0,'C');
		$pdf->Cell(18,6,utf8_decode($row['Hora_ent']),1,0,'C');
		$pdf->Cell(18,6,utf8_decode($row['Hora_sal']),1,1,'C');
	}
	$pdf->Output();
?>
