
<?php  
if (isset($_SESSION['IDUsuario'])) {

  $query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE IDUsuario='$_SESSION[IDUsuario]'") 
                                  or die('error: '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
} 
?>

<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Profile User
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"> Profle User</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
  
    if (empty($_GET['alert'])) {
      echo "";
    } 
 
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              User profile successfully updated.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> File not supported.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Very large file.
            </div>";
    }

    elseif ($_GET['alert'] == 4) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Allowed files: *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="POST" action="?module=form_profileUserEdit" enctype="multipart/form-data">
          <div class="box-body">

            <input type="hidden" name="id_user" value="<?php echo $data['IDUsuario']; ?>">
            
            <div class="form-group">
              <label class="col-sm-2 control-label">
              <?php  
              if ($data['Foto']=="") { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="Content/images/user/user-default.png" width="75">
              <?php
              }
              else { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="Content/images/user/<?php echo $data['Foto']; ?>" width="75">
              <?php
              }
              ?>
              </label>
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['NombreCompleto']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">User Name</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreUsuario']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Identification</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Cedula']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Correo']; ?></label>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Phone</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Telefono']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Direccion']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Role</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Role']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Estado']; ?></label>
            </div>
          </div><!-- /.box body -->

          <div class="box-footer">
          <br>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Modify">
                <a href="?module=start" class="btn btn-default btn-reset">Cancel</a>
              </div>
            </div>
            <br>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->