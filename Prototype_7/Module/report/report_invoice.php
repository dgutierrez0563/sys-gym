
<?php
	// include 'plantilla.php';
	// require_once "../../Config/database.php";
	
	// $query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	// $resultado = $mysqli->query($query);
	
	// $pdf = new PDF();
	// $pdf->AliasNbPages();
	// $pdf->AddPage();
	
	// $pdf->SetFillColor(232,232,232);
	// $pdf->SetFont('Arial','B',12);
	// $pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	// $pdf->Cell(20,6,'ID',1,0,'C',1);
	// $pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	
	// $pdf->SetFont('Arial','',10);
	
	// while($row = $resultado->fetch_assoc())
	// {
	// 	$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
	// 	$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
	// 	$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
	// }
	// $pdf->Output();


	session_start();
	ob_start();

	require_once 'plantilla.php';
	require_once "../../Config/database.php";

	$id_invoice = $_GET['id_invoice'];

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	$pdf->Cell(20,6,'ID',1,0,'C',1);
	$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	

	if (isset($_GET['id_invoice'])) {
	    $no    = 1;
	    
	    $query_f = mysqli_query($mysqli, "SELECT factura.IDFactura AS facturaID, factura.FechaFactura,factura.IDCliente,
		                                    factura.TotalVenta,factura.EstadoFactura,factura.Tipo,factura.created_user,
		                                    factura.Condicion,cliente.IDCliente AS clienteID,cliente.NombreCompleto 
		                                    AS clienteName,cliente.Correo,cliente.Telefono1,cliente.Direccion,
		                                    usuario.IDUsuario AS usuarioID,usuario.NombreUsuario AS userName
		                                    FROM factura,cliente,usuario
		                                    WHERE factura.IDFactura='$id_invoice'
		                                    AND factura.IDCliente=cliente.IDCliente
		                                    AND factura.created_user=usuario.IDUsuario") 
		                                    or die('error '.mysqli_error($mysqli));


		while($row = $query_f->fetch_assoc())
		{
			$pdf->Cell(70,6,utf8_decode($row['facturaID']),1,0,'C');
			$pdf->Cell(20,6,$row['FechaFactura'],1,0,'C');
			$pdf->Cell(70,6,utf8_decode($row['TotalVenta']),1,1,'C');
		}
		$pdf->Output();

		//$count  = mysqli_num_rows($query_f);
		//$data_f = mysqli_fetch_assoc($query_f);;
	}

?>