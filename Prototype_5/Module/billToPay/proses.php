<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$id_supplier  		= mysqli_real_escape_string($mysqli, trim($_POST['id_supplier']));
			$invoice_number  	= mysqli_real_escape_string($mysqli, trim($_POST['invoice_number']));
			$amount  			= mysqli_real_escape_string($mysqli, trim($_POST['amount']));
			$invoice_date  		= mysqli_real_escape_string($mysqli, trim($_POST['invoice_date']));
			$expiration_date 	= mysqli_real_escape_string($mysqli, trim($_POST['expiration_date']));
			$invoice_status 	= mysqli_real_escape_string($mysqli, trim($_POST['invoice_status']));

			$id_user = $_SESSION['IDUsuario'];

            $query = mysqli_query($mysqli, "INSERT INTO cuentaGastos(IDProveedor,NumeroFactura,Monto,
            								FechaFactura,FechaVencimiento,EstadoFactura,created_user,updated_user)
                                            VALUES('$id_supplier','$invoice_number','$amount','$invoice_date',
                                            '$expiration_date','$invoice_status','$id_user','$id_user')")
                                            or die('error: '.mysqli_error($mysqli));              
            
            if ($query) {
                header("location: ../../main.php?module=billToPay&alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='edit') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_expense'])) {
				$id_expense			= mysqli_real_escape_string($mysqli,trim($_POST['id_expense']));
				$id_supplier  		= mysqli_real_escape_string($mysqli, trim($_POST['id_supplier']));
				$invoice_number  	= mysqli_real_escape_string($mysqli, trim($_POST['invoice_number']));
				$amount  			= mysqli_real_escape_string($mysqli, trim($_POST['amount']));
				$invoice_date  		= mysqli_real_escape_string($mysqli, trim($_POST['invoice_date']));
				$expiration_date 	= mysqli_real_escape_string($mysqli, trim($_POST['expiration_date']));
				$invoice_status 	= mysqli_real_escape_string($mysqli, trim($_POST['invoice_status']));

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE cuentaGastos SET IDProveedor = '$id_supplier',
                                                                NumeroFactura 		= '$invoice_number',
                                                                Monto		    	= '$amount',
                                                                FechaFactura    	= '$invoice_date',
                                                                FechaVencimiento    = '$expiration_date',
                                                                EstadoFactura		= '$invoice_status',
                                                                updated_user    	= '$id_user'
                                                              	WHERE IDCuentaGastos= '$id_expense'")
                                                or die('error: '.mysqli_error($mysqli));
                
                if ($query) {                  
                    header("location: ../../main.php?module=billToPay&alert=2");
                }					
			}
		}
	}

	elseif ($_GET['act'] == 'pay') {
		# code...
		if (isset($_GET['id'])) {
			# code...
			$id_expense = $_GET['id'];
			$status_aux = "Paid";

			$query = mysqli_query($mysqli,"UPDATE cuentaGastos SET EstadoFactura = '$status_aux' 
											WHERE IDCuentaGastos = '$id_expense'")
											or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=payment_alert&alert=1");
            }
		}
	}
}
?>