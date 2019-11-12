<?php  
	header('Content-Type: application/json');
	require_once "../../Config/database.php";

	$query = mysqli_query($mysqli,"SELECT FechaFactura, SUM(TotalVenta) AS total FROM factura GROUP BY FechaFactura LIMIT 15")
	or die('Error'.mysqli_error($mysqli));

	//$data_array = array();
	$data_points = array();

    while ($row = mysqli_fetch_array($query)) {
    	$aux = date_create($row['FechaFactura']);
        $point = array("valuex" => $row['total'],"valuey" => date_format($aux,'m-d-Y'));
        array_push($data_points, $point);
    }
    echo json_encode($data_points);
?>