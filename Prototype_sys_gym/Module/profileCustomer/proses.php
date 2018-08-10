
<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$id_customer  			= mysqli_real_escape_string($mysqli, trim($_POST['id_customer']));
			$height  				= mysqli_real_escape_string($mysqli, trim($_POST['height']));
			$weight 				= mysqli_real_escape_string($mysqli, trim($_POST['weight']));
			$bodyfat 				= mysqli_real_escape_string($mysqli, trim($_POST['bodyfat']));
			$water	 				= mysqli_real_escape_string($mysqli, trim($_POST['water']));
			$imc	 				= mysqli_real_escape_string($mysqli, trim($_POST['imc']));
			$bmr 					= mysqli_real_escape_string($mysqli, trim($_POST['bmr']));
			$bonemass 				= mysqli_real_escape_string($mysqli, trim($_POST['bonemass']));
			$visceralfat			= mysqli_real_escape_string($mysqli, trim($_POST['visceralfat']));

			$id_user = $_SESSION['IDUsuario'];

            $query = mysqli_query($mysqli, "INSERT INTO perfilCliente(IDCliente,Altura,Peso,GrasaCorporal,Agua,
            								IMC,BMR,MasaOsea,GrasaViceral,created_user,updated_user)
                                            VALUES('$id_customer','$height','$weight','$bodyfat','$water',
                                            '$imc','$bmr','$bonemass','$visceralfat','$id_user','$id_user')")
                                            or die('error: '.mysqli_error($mysqli));    
          
            if ($query) {
                header("location: ../../main.php?module=profileCustomer&alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_profileCustomer'])) {
				$id_profileCustomer		= mysqli_real_escape_string($mysqli, trim($_POST['id_profileCustomer']));
				$id_customer  			= mysqli_real_escape_string($mysqli, trim($_POST['id_customer']));
				$height  				= mysqli_real_escape_string($mysqli, trim($_POST['height']));
				$weight 				= mysqli_real_escape_string($mysqli, trim($_POST['weight']));
				$bodyfat 				= mysqli_real_escape_string($mysqli, trim($_POST['bodyfat']));
				$water	 				= mysqli_real_escape_string($mysqli, trim($_POST['water']));
				$imc	 				= mysqli_real_escape_string($mysqli, trim($_POST['imc']));
				$bmr 					= mysqli_real_escape_string($mysqli, trim($_POST['bmr']));
				$bonemass 				= mysqli_real_escape_string($mysqli, trim($_POST['bonemass']));
				$visceralfat			= mysqli_real_escape_string($mysqli, trim($_POST['visceralfat']));	

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE perfilCliente SET IDCliente 		= '$id_customer',
                                                                		Altura 			= '$height',
                                                                    	Peso		    = '$weight',
                                                                    	GrasaCorpora    = '$bodyfat',
                                                                    	Agua 			= '$water',
                                                                    	IMC		    	= '$imc',
                                                                    	BMR       		= '$bmr',
                                                                    	MasaOsea       	= '$bonemass',
                                                                    	GrasaViceral 	= '$visceralfat',
                                                                    	updated_user    = '$id_user'
                                                              		WHERE IDPerfil   	= '$id_profileCustomer'")or die('error: '.mysqli_error($mysqli));                
                if ($query) {                  
                    header("location: ../../main.php?module=profileCustomer&alert=2");
                }					
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_profileCustomer = $_GET['id'];
			$status  = "Enabled";
		
            $query = mysqli_query($mysqli, "UPDATE perfilCliente SET Estado  = '$status'
                                            WHERE IDPerfil = '$id_profileCustomer'")
                                            or die('error: '.mysqli_error($mysqli));

            if ($query) {               
                header("location: ../../main.php?module=profileCustomer&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_profileCustomer = $_GET['id'];
			$status  = "Disabled";
		
            $query = mysqli_query($mysqli, "UPDATE perfilCliente SET Estado  = '$status'
                                            WHERE IDPerfil = '$id_profileCustomer'")
                                            or die('error: '.mysqli_error($mysqli));
        
            if ($query) {              
                header("location: ../../main.php?module=profileCustomer&alert=4");
            }
		}
	}		
}		
?>