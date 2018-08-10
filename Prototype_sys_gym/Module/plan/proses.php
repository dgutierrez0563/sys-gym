<?php
session_start();

require_once "../../Config/database.php";

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$nameplan  	= mysqli_real_escape_string($mysqli, trim($_POST['nameplan']));
			$days  		= mysqli_real_escape_string($mysqli, trim($_POST['days']));
			$rate 		= mysqli_real_escape_string($mysqli, trim($_POST['rate']));
			$detail 	= mysqli_real_escape_string($mysqli, trim($_POST['detail']));

			$id_user = $_SESSION['IDUsuario'];

            $query = mysqli_query($mysqli, "INSERT INTO plan(NombrePlan,CantidadDias,Costo,
            								Detalle,created_user,updated_user)
                                            VALUES('$nameplan','$days','$rate','$detail','$id_user','$id_user')")
                                            or die('error: '.mysqli_error($mysqli));              
            
            if ($query) {
                header("location: ../../main.php?module=plan&alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_plan'])) {
				$id_plan	= mysqli_real_escape_string($mysqli,trim($_POST['id_plan']));
				$nameplan  	= mysqli_real_escape_string($mysqli, trim($_POST['nameplan']));
				$days  		= mysqli_real_escape_string($mysqli, trim($_POST['days']));
				$rate 		= mysqli_real_escape_string($mysqli, trim($_POST['rate']));
				$detail 	= mysqli_real_escape_string($mysqli, trim($_POST['detail']));

				$id_user = $_SESSION['IDUsuario'];
					
                $query = mysqli_query($mysqli, "UPDATE plan SET NombrePlan 		= '$nameplan',
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