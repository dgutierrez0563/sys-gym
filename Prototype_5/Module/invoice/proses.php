
<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

	if ($_GET['act'] == 'insert') {
		if (isset($_POST['AddBag'])) {
			
			$id_product		= mysqli_real_escape_string($mysqli, trim($_POST['id_product']));			
			$quantity  		= mysqli_real_escape_string($mysqli, trim($_POST['quantity']));

			$query_aux = mysqli_query($mysqli,"SELECT IDShoppingBag,IDProducto,Quantity FROM shoppingBag WHERE IDProducto='$id_product'") or die('error: '.mysqli_error($mysqli));

			if ($data  = mysqli_fetch_assoc($query_aux)) {
				# code...
				$qtyFinal = $data['Quantity']+$quantity;

				$query = mysqli_query($mysqli, "UPDATE shoppingBag SET Quantity = '$qtyFinal' 
					WHERE IDProducto = '$id_product'")
					or die('error: '.mysqli_error($mysqli));
	            if ($query) {
	                header("location: ../../main.php?module=form_invoice&form=add");
	            }				
			}else{
	            $query = mysqli_query($mysqli, "INSERT INTO shoppingBag(IDProducto,Quantity)
	                                            VALUES('$id_product','$quantity')")
	                                            or die('error: '.mysqli_error($mysqli));
	            if ($query) {
                	header("location: ../../main.php?module=form_invoice&form=add");
            	}
			}
		}	
	}
	elseif ($_GET['act']=='deleteItem') {
		if (isset($_GET['id'])) {
			$id_item = $_GET['id'];

				$query = mysqli_query($mysqli, "DELETE FROM shoppingBag WHERE IDShoppingBag  = '$id_item'")
					or die('error: '.mysqli_error($mysqli));
	            if ($query) {
	                header("location: ../../main.php?module=form_invoice&form=add");
	            }				
		}
	}
}	
?>