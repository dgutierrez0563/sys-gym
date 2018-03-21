<?php  

if ($_GET['form']=='add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Add Supplier
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home </a></li>
      <li><a href="?module=user"> Supplier </a></li>
      <li class="active"> Add </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/supplier/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Legal Identification</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="legalidentification" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Supplier</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="supplier" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="address" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 1</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone1" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)">
                </div>
              </div>             

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 2</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone2" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Representative</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="representative" autocomplete="off">
                </div>
              </div>
              <br>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=supplier" class="btn btn-default btn-reset">Cancel</a>
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

      $query = mysqli_query($mysqli, "SELECT * FROM proveedor WHERE IDProveedor='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
  	}	
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modify Supplier Data
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="?module=user"> Supplier </a></li>
      <li class="active"> Modify </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/supplier/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">
              
              <input type="hidden" name="id_proveedor" value="<?php echo $data['IDProveedor']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Legan Indentification</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="legalidentification" autocomplete="off" value="<?php echo $data['CedulaJuridica']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Supplier</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="supplier" autocomplete="off" value="<?php echo $data['NombreProveedor']; ?>" required>
                </div>
              </div>              

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $data['Correo']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="address" autocomplete="off" value="<?php echo $data['Direccion']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 1</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone1" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono1']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone 2</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone2" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono2']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Representative</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="representative" autocomplete="off" value="<?php echo $data['Representante']; ?>">
                </div>
              </div>
              <br>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=supplier" class="btn btn-default btn-reset">Cancel</a>
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