<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {

		    $query_invoice_num = mysqli_query($mysqli, "SELECT MAX(IDFactura) AS IDLastInvoice 
		        FROM factura ORDER BY IDFactura DESC LIMIT 0,1");

		    $row_aux = mysqli_fetch_array($query_invoice_num);
		    $IDLastInvoice = $row_aux['IDLastInvoice']+1;

			$date 			= mysqli_real_escape_string($mysqli, trim(date("Y-m-d")));			
			$id_customer  	= mysqli_real_escape_string($mysqli, trim($_POST['id_customer']));
			$id_plan		= mysqli_real_escape_string($mysqli, trim($_POST['id_plan']));
			$rate 			= mysqli_real_escape_string($mysqli, trim($_POST['rate']));
			$condition 		= mysqli_real_escape_string($mysqli, trim($_POST['condition']));
			$rate_aux		= str_replace(",","",$rate);
		    
		    $query_plan_aux = mysqli_query($mysqli,"SELECT IDPlan,CantidadDias FROM plan WHERE IDPlan='$id_plan'");
		    $data_plan_aux = mysqli_fetch_assoc($query_plan_aux);
		    $days = $data_plan_aux['CantidadDias'];
		    
		    $mod_date  = strtotime($date . "+ $days days");
		    $expiry    = date("Y-m-d", $mod_date);			

		    if ($condition == "Credit") {            
		        $invoice_status = "Pending";
		    }
		    else{
		        $invoice_status = "Paid";
		    }

			$id_user = $_SESSION['IDUsuario'];

            $query = mysqli_query($mysqli, "INSERT INTO subscripcion(IDCliente,IDPlan,IDFactura,
            								FechaSubscripcion,FechaExpira,created_user,updated_user)
                                            VALUES('$id_customer','$id_plan','$IDLastInvoice','$date','$expiry','$id_user','$id_user')")
                                            or die('error: '.mysqli_error($mysqli));              
            
            if ($query) {
        		$type = "Subscription";
        		$insert = mysqli_query($mysqli,"INSERT INTO factura(FechaFactura,IDCliente,Condicion,TotalVenta,EstadoFactura,Tipo,created_user,updated_user) 
        			VALUES ('$date','$id_customer','$condition','$rate_aux','$invoice_status',
        			'$type','$id_user','$id_user')");

                header("location: ../../main.php?module=subscription&alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_subscription'])) {
				
				$id_subscription = mysqli_real_escape_string($mysqli, trim($_POST['id_subscription']));
				$id_invoice		= mysqli_real_escape_string($mysqli, trim($_POST['id_invoice']));
				$date_copy	 	= mysqli_real_escape_string($mysqli, trim($_POST['date']));
				$id_plan		= mysqli_real_escape_string($mysqli, trim($_POST['id_plan']));
				$rate 			= mysqli_real_escape_string($mysqli, trim($_POST['rate']));
				$condition 		= mysqli_real_escape_string($mysqli, trim($_POST['condition']));
				$rate_aux		= str_replace(",","",$rate);
				$dateInitial_aux = date_create($date_copy);
				$dateInitial_aux = date_format($dateInitial_aux,'Y-m-d');
			    
			    $query_plan_aux = mysqli_query($mysqli,"SELECT IDPlan,CantidadDias FROM plan WHERE IDPlan='$id_plan'");
			    $data_plan_aux = mysqli_fetch_assoc($query_plan_aux);
			    $days = $data_plan_aux['CantidadDias'];
			    
			    $mod_date  = strtotime($dateInitial_aux . "+ $days days");
			    $expiry    = date("Y-m-d", $mod_date);			

			    if ($condition == "Credit") {
			        $invoice_status = "Pending";
			    }
			    else{
			        $invoice_status = "Paid";
			    }

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE subscripcion SET IDPlan 	= '$id_plan',
                                                                FechaExpira    	= '$expiry',
                                                                updated_user    = '$id_user'
                                                              	WHERE IDSubscripcion   	= '$id_subscription'")
                                                or die('error: '.mysqli_error($mysqli));
                
                if ($query) {
                	$type = "Subscription";

	                $query = mysqli_query($mysqli, "UPDATE factura SET Condicion 	= '$condition',
	                                                                TotalVenta	 	= '$rate_aux',
	                                                                EstadoFactura  	= '$invoice_status',
	                                                                Tipo 			= '$type',
	                                                                updated_user    = '$id_user'
	                                                              	WHERE IDFactura	= '$id_invoice'")
	                                                or die('error: '.mysqli_error($mysqli));        			

                    header("location: ../../main.php?module=subscription&alert=2");
                }					
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_subscription = $_GET['id'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE subscripcion SET Estado  = '$status'
                                            WHERE IDSubscripcion = '$id_subscription'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=subscription&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_subscription = $_GET['id'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE subscripcion SET Estado  = '$status'
                                            WHERE IDSubscripcion = '$id_subscription'")
                                            or die('error: '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=subscription&alert=4");
            }
		}
	}

	elseif ($_GET['act']=='newPayment') {
		if (isset($_GET['id'])) {
			
			$id_subscription = $_GET['id'];
			$id_user = $_SESSION['IDUsuario'];
			$date = date('Y-m-d');

		    //Select id_subscription from table
		    $query_sub = mysqli_query($mysqli,"SELECT IDSubscripcion,IDCliente,IDPlan,IDFactura,FechaSubscripcion
		    									FROM subscripcion WHERE IDSubscripcion='$id_subscription'");
		    $data_sub = mysqli_fetch_assoc($query_sub);
		    $id_plan_sub = $data_sub['IDPlan'];
		    $id_customer_sub = $data_sub['IDCliente'];

			//Select the last id_invoice from table
		    $query_invoice_num = mysqli_query($mysqli, "SELECT MAX(IDFactura) AS IDLastInvoice 
		        										FROM factura ORDER BY IDFactura DESC LIMIT 0,1");
		    $row_aux = mysqli_fetch_array($query_invoice_num);
		    $IDLastInvoice = $row_aux['IDLastInvoice']+1;

			//Select the id_plan from table
		    $query_plan_aux = mysqli_query($mysqli,"SELECT IDPlan,CantidadDias,Costo FROM plan WHERE IDPlan='$id_plan_sub'");
		    $data_plan_aux = mysqli_fetch_assoc($query_plan_aux);
		    $days = $data_plan_aux['CantidadDias'];
		    $rate = $data_plan_aux['Costo'];
		    
		    $mod_date  = strtotime($date . "+ $days days");
		    $expiry    = date("Y-m-d", $mod_date);
			
            $query = mysqli_query($mysqli, "UPDATE subscripcion SET FechaSubscripcion 	= '$date',
            													IDFactura		= '$IDLastInvoice',
                                                                FechaExpira    	= '$expiry',
                                                                updated_user    = '$id_user'
                                                              	WHERE IDSubscripcion   	= '$id_subscription'")
                                            or die('error: '.mysqli_error($mysqli));
            if ($query) {

            	$type = "Subscription";
            	$condition = "Cash";
            	$invoice_status = "Paid";
        		$insert = mysqli_query($mysqli,"INSERT INTO factura(FechaFactura,IDCliente,Condicion,TotalVenta,EstadoFactura,Tipo,created_user,updated_user) 
        			VALUES ('$date','$id_customer_sub','$condition','$rate','$invoice_status',
        			'$type','$id_user','$id_user')");
                header("location: ../../main.php?module=subscription&alert=5");
            }
		}
	}
}		
?>