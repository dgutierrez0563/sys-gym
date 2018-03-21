
<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$identification  		= mysqli_real_escape_string($mysqli, trim($_POST['identification']));
			$fullname  				= mysqli_real_escape_string($mysqli, trim($_POST['fullname']));
			$email 					= mysqli_real_escape_string($mysqli, trim($_POST['email']));
			$address 				= mysqli_real_escape_string($mysqli, trim($_POST['address']));
			$birthdate 				= mysqli_real_escape_string($mysqli, trim($_POST['birthdate']));
			$sex	 				= mysqli_real_escape_string($mysqli, trim($_POST['sex']));
			$phone1 				= mysqli_real_escape_string($mysqli, trim($_POST['phone1']));
			$phone2 				= mysqli_real_escape_string($mysqli, trim($_POST['phone2']));
			$nationality			= mysqli_real_escape_string($mysqli, trim($_POST['nationality']));
			$facebookaccount 		= mysqli_real_escape_string($mysqli, trim($_POST['facebookaccount']));
			$twitteraccount 		= mysqli_real_escape_string($mysqli, trim($_POST['twitteraccount']));

			$id_user = $_SESSION['IDUsuario'];

            $query = mysqli_query($mysqli, "INSERT INTO cliente(Cedula,NombreCompleto,Correo,
            								Direccion,FechaNacimiento,Sexo,Telefono1,Telefono2,
            								Nacionalidad,Facebook,Twitter,created_user,updated_user)
                                            VALUES('$identification','$fullname','$email','$address','$birthdate',
                                            '$sex','$phone1','$phone2','$nationality','$facebookaccount',
                                            '$twitteraccount','$id_user','$id_user')")
                                            or die('error: '.mysqli_error($mysqli));    
          
            if ($query) {
                header("location: ../../main.php?module=customer&alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_customer'])) {
				$id_customer			= mysqli_real_escape_string($mysqli,trim($_POST['id_customer']));
				$identification  		= mysqli_real_escape_string($mysqli, trim($_POST['identification']));
				$fullname  				= mysqli_real_escape_string($mysqli, trim($_POST['fullname']));
				$email 					= mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$address 				= mysqli_real_escape_string($mysqli, trim($_POST['address']));
				$birthdate 				= mysqli_real_escape_string($mysqli, trim($_POST['birthdate']));
				$sex	 				= mysqli_real_escape_string($mysqli, trim($_POST['sex']));
				$phone1 				= mysqli_real_escape_string($mysqli, trim($_POST['phone1']));
				$phone2 				= mysqli_real_escape_string($mysqli, trim($_POST['phone2']));
				$nationality			= mysqli_real_escape_string($mysqli, trim($_POST['nationality']));
				$facebookaccount 		= mysqli_real_escape_string($mysqli, trim($_POST['facebookaccount']));
				$twitteraccount 		= mysqli_real_escape_string($mysqli, trim($_POST['twitteraccount']));

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE cliente SET Cedula 	= '$identification',
                                                                		NombreCompleto 	= '$fullname',
                                                                    	Correo		    = '$email',
                                                                    	Direccion       = '$address',
                                                                    	FechaNacimiento = '$birthdate',
                                                                    	Sexo		    = '$sex',
                                                                    	Telefono1       = '$phone1',
                                                                    	Telefono2       = '$phone2',
                                                                    	Nacionalidad 	= '$nationality',
                                                                    	Facebook		= '$facebookaccount',
                                                                    	Twitter		    = '$twitteraccount',
                                                                    	updated_user    = '$id_user'
                                                              		WHERE IDCliente   	= '$id_customer'")
                                                or die('error: '.mysqli_error($mysqli));
                
                if ($query) {                  
                    header("location: ../../main.php?module=customer&alert=2");
                }					
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_customer = $_GET['id'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE cliente SET Estado  = '$status'
                                            WHERE IDCliente = '$id_customer'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=customer&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_customer = $_GET['id'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE cliente SET Estado  = '$status'
                                            WHERE IDCliente = '$id_customer'")
                                            or die('error: '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=customer&alert=4");
            }
		}
	}

	elseif (isset($_GET['term'])){
		$return_arr = array();
	/* If connection to database, run sql statement. */
		if ($mysqli)
		{
			
			$query = mysqli_query($mysqli, "SELECT * FROM cliente WHERE Cedula LIKE '%" . mysqli_real_escape_string($mysqli,($_GET['term'])) . "%' LIMIT 0 ,10"); 
			
			/* Retrieve and store in array the results of the query.*/
			while ($row = mysqli_fetch_array($query)) {
				$id_customer=$row['IDCliente'];
				$row_array['value'] = $row['Cedula'];
				$row_array['id_customer']=$id_customer;
				$row_array['cedula']=$row['Cedula'];
				$row_array['customer_name']=$row['NombreCompleto'];
				$row_array['phone1']=$row['Telefono1'];
				$row_array['email']=$row['Correo'];
				array_push($return_arr,$row_array);
		    }
			
		}
		/* Free connection resources. */
		//mysqli_close($mysqli);

		/* Toss back results as json encoded array. */
		echo json_encode($return_arr);
	}
}		
?>