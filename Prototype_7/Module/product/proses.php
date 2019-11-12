<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {
	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$nameproduct  	= mysqli_real_escape_string($mysqli, trim($_POST['nameproduct']));
			$query_dni = mysqli_query($mysqli,"SELECT NombreProducto FROM producto WHERE NombreProducto='$nameproduct'");
			$count = mysqli_num_rows($query_dni);

			if ($count == 0) {
				$price 			= mysqli_real_escape_string($mysqli, trim($_POST['price']));
				$quantity  		= mysqli_real_escape_string($mysqli, trim($_POST['quantity']));
				$id_supplier	= mysqli_real_escape_string($mysqli, trim($_POST['id_supplier']));
				$detail 		= mysqli_real_escape_string($mysqli, trim($_POST['detail']));

				$id_user = $_SESSION['IDUsuario'];

	            $query = mysqli_query($mysqli, "INSERT INTO producto(NombreProducto,Precio,Cantidad,
	            								IDProveedor,Detalle,created_user,updated_user)
	                                            VALUES('$nameproduct','$price','$quantity','$id_supplier','$detail',
	                                            '$id_user','$id_user')")
	                                            or die('error: '.mysqli_error($mysqli));              
	            
	            if ($query) {
	                header("location: ../../main.php?module=product&alert=1");
	            }
			}
			else{
				header("location: ../../main.php?module=product&alert=5");
			}
		}	
	}	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_product'])) {
				$id_product		= mysqli_real_escape_string($mysqli,trim($_POST['id_product']));
				$nameproduct  	= mysqli_real_escape_string($mysqli, trim($_POST['nameproduct']));			
				$price 			= mysqli_real_escape_string($mysqli, trim($_POST['price']));
				$quantity  		= mysqli_real_escape_string($mysqli, trim($_POST['quantity']));
				$id_supplier	= mysqli_real_escape_string($mysqli, trim($_POST['id_supplier']));
				$detail 		= mysqli_real_escape_string($mysqli, trim($_POST['detail']));

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE producto SET NombreProducto 	= '$nameproduct',
                                                                Precio 				= '$price',
                                                                Cantidad		    = '$quantity',
                                                                IDProveedor		    = '$id_supplier',
                                                                Detalle       		= '$detail',
                                                                updated_user    	= '$id_user'
                                                              	WHERE IDProducto	= '$id_product'")
                                                or die('error: '.mysqli_error($mysqli));
                
                if ($query) {                  
                    header("location: ../../main.php?module=product&alert=2");
                }					
			}
		}
	}
	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_product = $_GET['id'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE producto SET Estado  = '$status'
                                            WHERE IDProducto = '$id_product'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=product&alert=3");
            }
		}
	}
	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_product = $_GET['id'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE producto SET Estado  = '$status'
                                            WHERE IDProducto = '$id_product'")
                                            or die('error: '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=product&alert=4");
            }
		}
	}
	elseif ($_GET['act']=='updateStock') {
		if (isset($_POST['Guardar'])) {

			$sum = 0;
			$id_product		= mysqli_real_escape_string($mysqli,trim($_POST['id_product']));
			$stock			= mysqli_real_escape_string($mysqli,trim($_POST['stock']));
			$option			= mysqli_real_escape_string($mysqli,trim($_POST['option']));
			$quantity		= mysqli_real_escape_string($mysqli,trim($_POST['quantity']));
			$total 			= mysqli_real_escape_string($mysqli,trim($_POST['total_stok']));

			$id_user = $_SESSION['IDUsuario'];
			
			if ($option == "output") {
				$sum = $stock-$quantity;
				if ($sum >= 0) {

		            $query = mysqli_query($mysqli, "UPDATE producto SET Cantidad  = '$sum',
		            								updated_user = '$id_user'
		                                            WHERE IDProducto = '$id_product'")
		                                            or die('error: '.mysqli_error($mysqli));
		            if ($query) {              
		                header("location: ../../main.php?module=product_stock&alert=1");
		            }
				}else{
					header("location: ../../main.php?module=product_stock&alert=2");
				}
			}
			else {
				$sum = $stock+$quantity;
		        
		        $query = mysqli_query($mysqli, "UPDATE producto SET Cantidad  = '$sum',
		            							updated_user = '$id_user'
		                                        WHERE IDProducto = '$id_product'")
		                                        or die('error: '.mysqli_error($mysqli));
		        if ($query) {              
		            header("location: ../../main.php?module=product_stock&alert=1");
		        }
			}
		}
	}
}		
?>