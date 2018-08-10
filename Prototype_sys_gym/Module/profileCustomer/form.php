<?php  

if ($_GET['form']=='add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Add Customer Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home </a></li>
      <li><a href="?module=customer"> Customer Profile </a></li>
      <li class="active"> Add </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/profileCustomer/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Customer</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_customer" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                    <option value=""></option>
                    <?php
                      $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula,NombreCompleto FROM cliente 
                        WHERE Cedula != '0000' ORDER BY cedula") or die('error: '.mysqli_error($mysqli));
                      if (mysqli_affected_rows($mysqli) != 0) {
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                          echo "<option value=" .$row['IDCliente'] . ">" .$row['Cedula']." | " .$row['NombreCompleto']. "</option>";
                        }
                      }
                    ?>    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Height</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="height" maxlength="4" placeholder="1.50" autocomplete="off" onKeyPress="return filterFloatCustomer(event,this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Weight</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="weight" maxlength="6" placeholder="70.5" autocomplete="off" onKeyPress="return filterFloatCustomer(event,this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Body Fat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bodyfat" maxlength="6" placeholder="70.5" onKeyPress="return filterFloat(event,this)" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Water</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="water" maxlength="6" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">IMC</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="imc" maxlength="6" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">BMR</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bmr" maxlength="6" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bone Mass</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bonemass" maxlength="6" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Visceral Fat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="visceralfat" maxlength="6" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=profileCustomer" class="btn btn-default btn-reset">Cancel</a>
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

      $query = mysqli_query($mysqli, "SELECT * FROM perfilCliente WHERE IDPerfil='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    } 
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modify Customer Profile Data
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="?module=customer"> Customer Profile </a></li>
      <li class="active"> Modify </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/profileCustomer/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">
              
              <input type="hidden" name="id_profileCustomer" value="<?php echo $data['IDPerfil']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Customer</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_customer" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                    <option value=""></option>
                    <?php
                      $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula FROM cliente 
                        WHERE Cedula != '0000' ORDER BY cedula") or die('error: '.mysqli_error($mysqli));
                      if (mysqli_affected_rows($mysqli) != 0) {
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                          echo "<option value=" .$row['IDCliente'] . ">" .$row['Cedula'] . "</option>";
                        }
                      }
                    ?>    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Height</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="height" maxlength="15" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Altura']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Weight</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="weight" maxlength="50" autocomplete="off" value="<?php echo $data['Peso']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Body Fat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bodyfat" maxlength="50" autocomplete="off" value="<?php echo $data['GrasaCorporal']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Water</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="water" maxlength="50" autocomplete="off" value="<?php echo $data['Agua']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">IMC</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="imc" maxlength="50" autocomplete="off" value="<?php echo $data['IMC']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">BMR</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bmr" maxlength="50" autocomplete="off" value="<?php echo $data['BMR']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bone Mass</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bonemass" maxlength="50" autocomplete="off" value="<?php echo $data['MasaOsea']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Visceral Fat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="visceralfat" maxlength="50" autocomplete="off" value="<?php echo $data['GrasaViceral']; ?>" required>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=profileCustomer" class="btn btn-default btn-reset">Cancel</a>
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
?>