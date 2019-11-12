
<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_user'])) {
			
				$id_user            = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
				$username           = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$cedula           	= mysqli_real_escape_string($mysqli, trim($_POST['cedula']));
				$fullname           = mysqli_real_escape_string($mysqli, trim($_POST['fullname']));
				$email              = mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$phone              = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
				$address            = mysqli_real_escape_string($mysqli, trim($_POST['address']));
				
				$name_file          = $_FILES['photo']['name'];
				$ukuran_file        = $_FILES['photo']['size'];
				$tipe_file          = $_FILES['photo']['type'];
				$tmp_file           = $_FILES['photo']['tmp_name'];				
			
				$allowed_extensions = array('jpg','jpeg','png');				
				
				$path_file          = "../../Content/images/user/".$name_file;				
			
				$file               = explode(".", $name_file);
				$extension          = array_pop($file);
			
				if (empty($_FILES['photo']['name'])) {
			       
                    $query = mysqli_query($mysqli, "UPDATE usuario SET NombreUsuario = '$username',
                    													Cedula 			= '$cedula',
                    													NombreCompleto 	= '$fullname',
                    													Correo      	= '$email',
                    													Telefono    	= '$phone',
                    													Direccion    	= '$address'
                                                                  WHERE IDUsuario 		= '$id_user'")
                                                    or die('error: '.mysqli_error($mysqli));
             
                    if ($query) {
                  
                        header("location: ../../main.php?module=profileUserOn&alert=1");
                    }
				}
			
				else {
					
					if (in_array($extension, $allowed_extensions)) {
	                   
	                    if($ukuran_file <= 1000000) {	                      
	                     
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
                        		
		                    $query = mysqli_query($mysqli, "UPDATE usuario SET NombreUsuario = '$username',
		                    													Cedula 			= '$cedula',
		                    													NombreCompleto 	= '$fullname',
		                    													Correo      	= '$email',
		                    													Telefono    	= '$phone',
		                    													Direccion    	= '$address',
		                    													Foto 			= '$name_file'
		                                                                  WHERE IDUsuario 		= '$id_user'")
		                                                    or die('error: '.mysqli_error($mysqli));
			               
			                    if ($query) {			                     
			                        header("location: ../../main.php?module=profileUserOn&alert=1");
			                    }
                        	} else {
	                           
	                            header("location: ../../main.php?module=profileUserOn&alert=2");
	                        }
	                    } else {	                       
	                        header("location: ../../main.php?module=profileUserOn&alert=3");
	                    }
	                } else {	                   
	                    header("location: ../../main.php?module=profileUserOn&alert=4");
	                } 
				}
			}
		}
	}		
}		
?>