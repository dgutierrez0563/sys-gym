
<?php  
if (isset($_POST['id_user'])) {

  $query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE IDUsuario='$_POST[id_user]'") 
                                  or die('error '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
}	
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modify Profile User
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=profileUser"> Profile User </a></li>
      <li class="active"> Modify </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/profileUser/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="id_user" value="<?php echo $data['IDUsuario']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $data['NombreUsuario']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Identification</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cedula" autocomplete="off" maxlength="15" value="<?php echo $data['Cedula']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fullname" autocomplete="off" value="<?php echo $data['NombreCompleto']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" autocomplete="off" maxlength="29" value="<?php echo $data['Correo']; ?>">
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="phone" autocomplete="off" maxlength="15" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="address" autocomplete="off" maxlength="100" value="<?php echo $data['Direccion']; ?>">
                </div>
              </div>              

            <div class="form-group">
                <label class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-5">
                  <input type="file" id="photo" name="photo">
                  <br/>
                <?php  
                if ($data['Foto']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="Content/images/user/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="Content/images/user/<?php echo $data['Foto']; ?>" width="128">
                <?php
                }
                ?>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=profileUserOn" class="btn btn-default btn-reset">Cancel</a>
                </div>
              </div>
              <br>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->