<?php require_once('../conexion/conexion.php'); ?>
<?php
	include '../plantilla.php';
	
	$carr = $_GET['carr'];
	$sql = "SELECT * FROM alumnos where id_carr='$carr'";
	$resultado = $mysqli->query($sql);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(28,6,'Numero de control',1,0,'C',1);
	$pdf->Cell(45,6,'Nombre',1,0,'C',1);
	$pdf->Cell(62,6,'Carrera',1,0,'C',1);
	$pdf->Cell(28,6,'Numero de telefono',1,0,'C',1);
	$pdf->Cell(35,6,'Email',1,1,'C',1);
	
	
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
		$pdf->Cell(28,6,$row['num_tel'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['email']),1,1,'C');
	}
	$pdf->Output();
?>
