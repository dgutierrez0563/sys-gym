<?php
  session_start();

  $cedula = $_POST['dni'];

  if (!empty($cedula)) {
    validar($cedula);    
  }

  function validar($dni){
    require_once "../../Config/ajax/aux_connection.php";
    
    $query = mysql_query("SELECT Cedula FROM usuario WHERE Cedula='".$dni."'",$mysqli_aux);
    $count = mysql_num_rows($query);

    if ($count==0) {
      
      echo "<div class='form-group'>
              <label class='col-sm-2 control-label'></label>
              <div class='col-sm-6'>
                  <span class='label' style='font-size: 14px;font-weight: bold;background-color: #00BA16;padding-right:20px;padding-left:20px;'><i class='icon fa fa-check-circle'></i> Good</span>
              </div>
            </div>";
    }
    else{
      echo "<div class='form-group'>
              <label class='col-sm-2 control-label'></label>
              <div class='col-sm-6'>
                  <span class='label' style='font-size: 14px;font-weight: bold;background-color: #F79933; padding-right:20px;padding-left:20px;'><i class='icon fa fa-times-circle'> </i> Identification already exists</span>
              </div>
            </div>";
    }
  }
?>