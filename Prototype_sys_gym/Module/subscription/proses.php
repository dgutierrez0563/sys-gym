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
					
                $query = mysqli_query($mysqli, "UPDATE subscripcion SET IDPlan 		= '$id_plan',
                                                                CantidadDias 	= '$days',
                                                                Costo		    = '$rate',
                                                                Detalle       	= '$detail',
                                                                updated_user    = '$id_user'
                                                              	WHERE IDPlan   	= '$id_plan'")
                                                or die('error: '.mysqli_error($mysqli));
                
                if ($query) {                  
                    header("location: ../../main.php?module=plan&alert=2");
                }					
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_plan = $_GET['id'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE plan SET Estado  = '$status'
                                            WHERE IDPlan = '$id_plan'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=plan&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_plan = $_GET['id'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE plan SET Estado  = '$status'
                                            WHERE IDPlan = '$id_plan'")
                                            or die('Error : '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=plan&alert=4");
            }
		}
	}		
}		
?>