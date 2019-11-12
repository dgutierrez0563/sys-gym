<?php
  session_start();

  require_once "../../Config/database.php";

  if(isset($_POST['dataproduct'])) {
    $id_plan = $_POST['dataproduct'];
 
    $query = mysqli_query($mysqli, "SELECT IDPlan,NombrePlan,Costo FROM plan WHERE IDPlan='$id_plan'")
                                    or die('error '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);

    $rate = $data['Costo'];
    $rate_aux = $rate;
    $rate = number_format($rate,2);

    if($rate != '') {
      echo "<div class='form-group'>
              <label class='col-sm-2 control-label'>Valor</label>
              <div class='col-sm-5'>
                <div class='input-group'>
                  <span class='input-group-addon'>₡.</span>
                  <input type='text' class='form-control' id='rate' name='rate' value='$rate' readonly>
                </div>
              </div>
            </div>";
    } else {
      echo "<div class='form-group'>
              <label class='col-sm-2 control-label'>Valor</label>
              <div class='col-sm-5'>
                <div class='input-group'>
                  <span class='input-group-addon'>₡.</span>
                  <input type='text' class='form-control' id='rate' name='rate' value='' readonly>                  
                </div>
              </div>
            </div>";
    }   
  }
?> 