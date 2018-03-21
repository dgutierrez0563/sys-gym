<?php

if (isset($_GET['id'])) {

  $id_user = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT IDUsuario,NombreUsuario,NombreCompleto,Cedula,Correo,Telefono,
    Direccion,Foto,Role,Estado,created_at,updated_at FROM usuario WHERE IDUsuario='$id_user'") 
    or die('error '.mysqli_error($mysqli));
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

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal"  enctype="multipart/form-data">
          <div class="box-body">      
            
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


            <div class="form-group">
              <label class="col-sm-2 control-label">Created</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['created_at']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Updated</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['updated_at']; ?></label>
            </div>            
          </div><!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">                
                <a href="?module=user" class="btn btn-primary">Return to List</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content