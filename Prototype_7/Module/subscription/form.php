<script type="text/javascript">

  function product_data(input){
    var aux = input.value;

    $.post("Module/subscription/get_rate.php", {
    dataproduct: aux,
    }, function(response) {
      $('#rate').html(response);
    });
  }
</script>

<?php  

if ($_GET['form']=='add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Nueva Subscripcion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
      <li><a href="?module=subscription"> Subscripcion </a></li>
      <li class="active"> Nuevo </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/subscription/proses.php?act=insert" enctype="multipart/form-data" name="formRequest">
            <div class="box-body">
              <br>
              <div class="form-group">
                <label for="dateInitial" class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="dateInitial" value="<?php echo date('m/d/Y'); ?>" autocomplete="off" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_customer" class="col-md-2 control-label">Identificacion</label>
                  <div class="col-sm-5">
                    <select class="chosen-select chosen-m" name="id_customer" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                      <option value=""></option>
                      <?php
                        $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula,NombreCompleto,Correo FROM cliente
                        WHERE cedula != '0000' AND Estado='Enabled' ORDER BY cedula") 
                        or die('error: '.mysqli_error($mysqli));
                        if (mysqli_affected_rows($mysqli) != 0) {
                          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            echo "<option value=" .$id_aux=$row['IDCliente'] . ">" .$row['Cedula']." | ". $row['NombreCompleto']. "</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
              </div>

              <div class="form-group row">
                <label for="id_customer" class="col-md-2 control-label">Plan</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="id_plan" id="id_plan" data-placeholder=" -- SELECT -- " autocomplete="off" onchange="product_data(this)" required>
                      <option value=""> -- SELECT -- </option>
                      <?php
                        $query = mysqli_query($mysqli, "SELECT IDPlan, NombrePlan,CantidadDias FROM plan
                        ORDER BY NombrePlan") or die('error: '.mysqli_error($mysqli));
                        if (mysqli_affected_rows($mysqli) != 0) {
                          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            echo "<option value=" .$id_aux=$row['IDPlan'] . ">" . $row['NombrePlan']." | ".$row['CantidadDias']." Days"."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
              </div>
              
              <span id='rate'>
              <div class="form-group">
                <label for="rate" class="col-sm-2 control-label">Valor</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">₡.</span>
                    <input type="text" class="form-control" id="rate" name="rate" readonly required>
                  </div>
                </div>
              </div>
              </span>

              <div class="form-group">
                <label for="condition" class="col-md-2 control-label">Medio Pago</label>
                <div class="col-sm-5">
                  <select class="form-control" name="condition">
                    <option value="Cash">Contado</option>
                    <option value="Credit">Credito</option>
                  </select>
                </div>
              </div>

            <br>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
              <br>
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=subscription" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
              <br>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT subscripcion.IDSubscripcion,subscripcion.IDFactura,subscripcion.IDCliente,
        subscripcion.IDPlan,subscripcion.FechaSubscripcion,cliente.IDCliente,cliente.Cedula,
        cliente.NombreCompleto FROM subscripcion,cliente WHERE subscripcion.IDSubscripcion='$_GET[id]' 
        AND subscripcion.IDCliente=cliente.IDCliente") 
        or die('error: '.mysqli_error($mysqli));

      $data  = mysqli_fetch_assoc($query);
  	}

    $date = date_create($data['FechaSubscripcion']);
    $date_aux = date_format($date,'m-d-Y');
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Editar Subscripcion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="?module=plan"> Subscripcion </a></li>
      <li class="active"> Edicion </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/subscription/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">
              
              <input type="hidden" name="id_subscription" value="<?php echo $data['IDSubscripcion']; ?>">
              <input type="hidden" name="id_invoice" value="<?php echo $data['IDFactura']; ?>">
              <input type="hidden" name="date" value="<?php echo $data['FechaSubscripcion']; ?>">

              <br>
              <div class="form-group">
                <label for="dateInitial" class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="dateInitial" value="<?php echo $date_aux; ?>" autocomplete="off" readonly>
                </div>
              </div>
              
              <div class="form-group">
                <label for="indentification" class="col-sm-2 control-label">Identificacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="indentification" value="<?php echo $data['Cedula']." | ".$data['NombreCompleto']; ?>" autocomplete="off" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_customer" class="col-md-2 control-label">Plan</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="id_plan" id="id_plan" data-placeholder=" -- SELECT -- " autocomplete="off" onchange="product_data(this)" required>
                      <option value=""> -- SELECT -- </option>
                      <?php
                        $query = mysqli_query($mysqli, "SELECT IDPlan, NombrePlan,CantidadDias FROM plan
                        ORDER BY NombrePlan") or die('error: '.mysqli_error($mysqli));
                        if (mysqli_affected_rows($mysqli) != 0) {
                          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            echo "<option value=" .$id_aux=$row['IDPlan'] . ">" . $row['NombrePlan']." | ".$row['CantidadDias']." Days"."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
              </div>
              
              <span id='rate'>
              <div class="form-group">
                <label for="rate" class="col-sm-2 control-label">Valor</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">₡.</span>
                    <input type="text" class="form-control" id="rate" name="rate" readonly required>
                  </div>
                </div>
              </div>
              </span>

              <div class="form-group">
                <label for="condition" class="col-md-2 control-label">Medio Pago</label>
                <div class="col-sm-5">
                  <select class="form-control" name="condition">
                    <option value="Cash">Contado</option>
                    <option value="Credit">Credito</option>
                  </select>
                </div>
              </div>
              <br>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=subscription" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
              <br>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}?>