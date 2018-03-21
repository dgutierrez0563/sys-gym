
<?php

if (isset($_GET['id'])) {

  $id_proveedor = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT proveedor.IDProveedor,proveedor.NombreProveedor,proveedor.CedulaJuridica,
    proveedor.Correo,proveedor.Direccion,proveedor.Telefono1,proveedor.Telefono2,proveedor.Representante,
    proveedor.Estado,proveedor.created_user,proveedor.updated_user,proveedor.updated_at,usuario.IDUsuario,
    usuario.NombreUsuario FROM proveedor,usuario WHERE proveedor.IDProveedor='$id_proveedor'
    AND proveedor.created_user=usuario.IDUsuario AND proveedor.updated_user=usuario.IDUsuario") 
    or die('error '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
}
?>

<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Profile Supplier
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"> Profle Supplier</li>
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
            <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['NombreProveedor']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Legal Identification</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['CedulaJuridica']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Correo']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Direccion']; ?></label>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Phone 1</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Telefono1']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Phone 2</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Telefono2']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Representative</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Representante']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Estado']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Updated by</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreUsuario']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Updated</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['updated_at']; ?></label>
            </div>            
          </div><!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <!-- <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Modify"> -->
                <a href="?module=supplier" class="btn btn-primary">Return to List</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content