
<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$legalidentification  	= mysqli_real_escape_string($mysqli, trim($_POST['legalidentification']));
			$query_dni = mysqli_query($mysqli,"SELECT CedulaJuridica FROM proveedor 
						WHERE CedulaJuridica='$legalidentification'");
			$count = mysqli_num_rows($query_dni);

			if ($count == 0) {
				$supplier  				= mysqli_real_escape_string($mysqli, trim($_POST['supplier']));
				$email 					= mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$address 				= mysqli_real_escape_string($mysqli, trim($_POST['address']));
				$phone1 				= mysqli_real_escape_string($mysqli, trim($_POST['phone1']));
				$phone2 				= mysqli_real_escape_string($mysqli, trim($_POST['phone2']));
				$representative 		= mysqli_real_escape_string($mysqli, trim($_POST['representative']));

				$id_user = $_SESSION['IDUsuario'];

	            $query = mysqli_query($mysqli, "INSERT INTO proveedor(CedulaJuridica,NombreProveedor,Correo,Direccion,
	            								Telefono1,Telefono2,Representante,created_user,updated_user)
	                                            VALUES('$legalidentification','$supplier','$email','$address','$phone1',
	                                            '$phone2','$representative','$id_user','$id_user')")
	                                            or die('error: '.mysqli_error($mysqli));    
	          
	            if ($query) {
	                header("location: ../../main.php?module=supplier&alert=1");
	            }				
			}
			else{
				header("location: ../../main.php?module=supplier&alert=5");
			}

		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_proveedor'])) {
				$id_proveedor			= mysqli_real_escape_string($mysqli,trim($_POST['id_proveedor']));
				$legalidentification  	= mysqli_real_escape_string($mysqli, trim($_POST['legalidentification']));
				$supplier  				= mysqli_real_escape_string($mysqli, trim($_POST['supplier']));
				$email 					= mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$address 				= mysqli_real_escape_string($mysqli, trim($_POST['address']));
				$phone1 				= mysqli_real_escape_string($mysqli, trim($_POST['phone1']));
				$phone2 				= mysqli_real_escape_string($mysqli, trim($_POST['phone2']));
				$representative 		= mysqli_real_escape_string($mysqli, trim($_POST['representative']));

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE proveedor SET CedulaJuridica 	= '$legalidentification',
                                                                		NombreProveedor = '$supplier',
                                                                    	Correo		    = '$email',
                                                                    	Direccion       = '$address',
                                                                    	Telefono1       = '$phone1',
                                                                    	Telefono2       = '$phone2',
                                                                    	Representante   = '$representative',
                                                                    	updated_user    = '$id_user'
                                                              		WHERE IDProveedor   = '$id_proveedor'")
                                                or die('error: '.mysqli_error($mysqli));
                
                if ($query) {                  
                    header("location: ../../main.php?module=supplier&alert=2");
                }					
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_proveedor = $_GET['id'];
			$id_user = $_SESSION['IDUsuario'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE proveedor SET Estado  = '$status',updated_user = '$id_user'
                                            WHERE IDProveedor = '$id_proveedor'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=supplier&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_proveedor = $_GET['id'];
			$id_user = $_SESSION['IDUsuario'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE proveedor SET Estado  = '$status',updated_user = '$id_user'
                                            WHERE IDProveedor = '$id_proveedor'")
                                            or die('Error : '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=supplier&alert=4");
            }
		}
	}		
}		
?>