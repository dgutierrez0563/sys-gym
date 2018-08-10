<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {
	if ($_GET['act'] == 'pay') {
		# code...
		if (isset($_GET['id'])) {
			# code...
			$id_invoice = $_GET['id'];
			$status_aux = "Paid";

			$query = mysqli_query($mysqli,"UPDATE factura SET EstadoFactura = '$status_aux' 
											WHERE IDFactura = '$id_invoice'")
											or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=collection_alert&alert=1");
            }
		}
	}
}