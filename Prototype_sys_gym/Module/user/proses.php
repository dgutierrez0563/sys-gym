
<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$usernameN  = mysqli_real_escape_string($mysqli, trim($_POST['usernameN']));
			$passwordN  = md5(mysqli_real_escape_string($mysqli, trim($_POST['passwordN'])));
			$cedula 	= mysqli_real_escape_string($mysqli, trim($_POST['cedula']));
			$fullname	= mysqli_real_escape_string($mysqli, trim($_POST['fullname']));
			$email 		= mysqli_real_escape_string($mysqli, trim($_POST['email']));
			$phone 		= mysqli_real_escape_string($mysqli, trim($_POST['phone']));
			$address 	= mysqli_real_escape_string($mysqli, trim($_POST['address']));
			$role 		= mysqli_real_escape_string($mysqli, trim($_POST['role']));

			$query_name = mysqli_query($mysqli,"SELECT NombreUsuario FROM usuario 
				WHERE NombreUsuario='$usernameN'");
			$count = mysqli_num_rows($query_name);

			if ($count == 0) {

	            $query = mysqli_query($mysqli, "INSERT INTO usuario(NombreUsuario,Contrasenia,Cedula,NombreCompleto,
	            								Correo,Telefono,Direccion,Role)
	                                            VALUES('$usernameN','$passwordN','$cedula','$fullname','$email','$phone',
	                                            '$address','$role')")
	                                            or die('error: '.mysqli_error($mysqli));    
	          
	            if ($query) {
	                header("location: ../../main.php?module=user&alert=1");
	            }
	        }else{
				header("location: ../../main.php?module=user&alert=8");
	        }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_user'])) {
				$id_user            = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
				$usernameN          = mysqli_real_escape_string($mysqli, trim($_POST['usernameN']));
				$passwordN          = md5(mysqli_real_escape_string($mysqli, trim($_POST['passwordN'])));
				$cedula          	= mysqli_real_escape_string($mysqli, trim($_POST['cedula']));
				$fullname          	= mysqli_real_escape_string($mysqli, trim($_POST['fullname']));
				$email          	= mysqli_real_escape_string($mysqli, trim($_POST['email']));			
				$phone            	= mysqli_real_escape_string($mysqli, trim($_POST['phone']));
				$address 			= mysqli_real_escape_string($mysqli, trim($_POST['address']));
				$role          		= mysqli_real_escape_string($mysqli, trim($_POST['role']));
				
				$name_file          = $_FILES['photo']['name'];
				$ukuran_file        = $_FILES['photo']['size'];
				$tipe_file          = $_FILES['photo']['type'];
				$tmp_file           = $_FILES['photo']['tmp_name'];
				
		
				$allowed_extensions = array('jpg','jpeg','png');				
			
				$path_file          = '../../Content/images/user/';//.$name_file;
		
				$file               = explode(".", $name_file);
				$extension          = array_pop($file);

				if (empty($_POST['passwordN']) && empty($_FILES['photo']['name'])) {
					
                    $query = mysqli_query($mysqli, "UPDATE usuario SET NombreUsuario 	= '$usernameN',
                    													Cedula 			= '$cedula',
                    													NombreCompleto 	= '$fullname',
                    													Correo 			= '$email',
                    													Telefono 		= '$phone',
                    													Direccion 		= '$address',
                    													Role   			= '$role'
                                                                  WHERE IDUsuario 		= '$id_user'")
                                                    or die('error: '.mysqli_error($mysqli));
                
                    if ($query) {
                  
                        header("location: ../../main.php?module=user&alert=2");
                    }
				}
		
				elseif (!empty($_POST['passwordN']) && empty($_FILES['photo']['name'])) {
					
                    $query = mysqli_query($mysqli, "UPDATE usuario SET NombreUsuario 	= '$usernameN',
                    													Cedula 			= '$cedula',
                    													NombreCompleto 	= '$fullname',
                    													Correo 			= '$email',
                    													Telefono 		= '$phone',
                    													Direccion 		= '$address',
                    													Role  			= '$role'
                                                                  WHERE IDUsuario 		= '$id_user'")
                                                    or die('error: '.mysqli_error($mysqli));
             
                    if ($query) {                    
                        header("location: ../../main.php?module=user&alert=2");
                    }
				}
				
				elseif (empty($_POST['passwordN']) && !empty($_FILES['photo']['name'])) {
			
					if (in_array($extension, $allowed_extensions)) {
	                
	                    if($ukuran_file <= 1000000) { 
	                        
	                        if(move_uploaded_file($tmp_file, "$path_file/$name_file")) { 
                        		
		                    $query = mysqli_query($mysqli, "UPDATE usuario SET NombreUsuario 	= '$usernameN',
		                    													Cedula 			= '$cedula',
		                    													NombreCompleto 	= '$fullname',
		                    													Correo 			= '$email',
		                    													Telefono 		= '$phone',
		                    													Direccion 		= '$address',
		                    													Foto			= '$name_file',
		                    													Role   			= '$role'
		                                                                  WHERE IDUsuario 		= '$id_user'")
		                                                    or die('error: '.mysqli_error($mysqli));

			                    if ($query) {			                    
			                        header("location: ../../main.php?module=user&alert=2");
			                    }
                        	} else {	                           
	                            header("location: ../../main.php?module=user&alert=5");
	                        }
	                    } else {	                       
	                        header("location: ../../main.php?module=user&alert=6");
	                    }
	                } else {	                   
	                    header("location: ../../main.php?module=user&alert=7");
	                } 
				}
				
				else {
					
					if (in_array($extension, $allowed_extensions)) {
	                   
	                    if($ukuran_file <= 1000000) { 
	                       
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
                        		
		                    $query = mysqli_query($mysqli, "UPDATE usuario SET NombreUsuario 	= '$usernameN',
		                    													Cedula 			= '$cedula',
		                    													NombreCompleto 	= '$fullname',
		                    													Correo 			= '$email',
		                    													Telefono 		= '$phone',
		                    													Direccion 		= '$address',
		                    													Foto			= '$name_file',
		                    													Role  			= '$role'
		                                                                  WHERE IDUsuario 		= '$id_user'")
		                                                    or die('error: '.mysqli_error($mysqli));
			                    
			                    if ($query) {			                       
			                        header("location: ../../main.php?module=user&alert=2");
			                    }
                        	} else {	                            
	                            header("location: ../../main.php?module=user&alert=5");
	                        }
	                    } else {	                       
	                        header("location: ../../main.php?module=user&alert=6");
	                    }
	                } else {	                
	                    header("location: ../../main.php?module=user&alert=7");
	                } 
				}
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE usuario SET Estado  = '$status'
                                            WHERE IDUsuario = '$id_user'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=user&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE usuario SET Estado  = '$status'
                                            WHERE IDUsuario = '$id_user'")
                                            or die('Error : '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=user&alert=4");
            }
		}
	}		
}		
?>