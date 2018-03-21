<?php  

if ($_GET['form']=='add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Add Customer
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home </a></li>
      <li><a href="?module=customer"> Customer </a></li>
      <li class="active"> Add </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/customer/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Identification</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="identification" maxlength="15" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fullname" maxlength="50" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" maxlength="50" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Birthdate</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="birthdate" autocomplete="off" required>
                </div>              
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="address" maxlength="50" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sex</label>
                <div class="col-sm-5">
                  <select class="form-control" name="sex" autocomplete="off" required>
                    <option value=""> -- SELECT -- </option>
                    <option value="Femenino">Female</option>
                    <option value="Masculino">Male</option>
                  </select>
                </div>
              </div>            

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 1</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone1" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)">
                </div>
              </div>             

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 2</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone2" maxlength="20" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nationality</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nationality" maxlength="30" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Facebook Account</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="facebookaccount" maxlength="30" autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Twitter Account</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="twitteraccount" maxlength="30" autocomplete="off">
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=customer" class="btn btn-default btn-reset">Cancel</a>
                </div>
              </div>
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

      $query = mysqli_query($mysqli, "SELECT * FROM cliente WHERE IDCliente='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    } 
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modify Customer Data
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="?module=customer"> Customer </a></li>
      <li class="active"> Modify </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/customer/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">
              
              <input type="hidden" name="id_customer" value="<?php echo $data['IDCliente']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Indentification</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="identification" autocomplete="off" maxlength="15" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Cedula']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fullname" maxlength="50" autocomplete="off" value="<?php echo $data['NombreCompleto']; ?>" required>
                </div>
              </div>              

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" maxlength="50" autocomplete="off" value="<?php echo $data['Correo']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Birthdate</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="birthdate" autocomplete="off" value="<?php echo $data['FechaNacimiento'] ?>" required>                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="address" maxlength="50" autocomplete="off" value="<?php echo $data['Direccion']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sex</label>
                <div class="col-sm-5">
                  <select class="form-control" name="sex" autocomplete="off" required>
                    <option value=""> -- SELECT -- </option>
                    <option value="Femenino">Female</option>
                    <option value="Masculino">Male</option>
                  </select>
                </div>
              </div>          

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 1</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone1" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono1']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 2</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone2" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono2']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nacionality</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nationality" maxlength="20" autocomplete="off" value="<?php echo $data['Nacionalidad']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Facebook Account</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="facebookaccount" maxlength="30" autocomplete="off" value="<?php echo $data['Facebook']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Twitter Account</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="twitteraccount" maxlength="30" autocomplete="off" value="<?php echo $data['Twitter']; ?>">
                </div>
              </div>              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=customer" class="btn btn-default btn-reset">Cancel</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>