<?php

if (isset($_GET['id'])) {

  $id_customer = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT cliente.IDCliente,cliente.Cedula,cliente.NombreCompleto,cliente.Correo,cliente.Direccion,cliente.FechaNacimiento,cliente.Sexo,cliente.Telefono1,cliente.Telefono2,cliente.Nacionalidad,cliente.Facebook,cliente.Twitter,cliente.Estado,cliente.updated_user,cliente.updated_at,usuario.IDUsuario,usuario.NombreUsuario FROM cliente,usuario WHERE IDCliente='$id_customer' AND cliente.updated_user=usuario.IDUsuario") 
    or die('error '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
}
?>

<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Informacion Cliente
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <!-- <li class="active"> Customer Information</li> -->
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
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['NombreCompleto']; ?></label>
            </div>

            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Identificacion</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Cedula']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Correo</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Correo']; ?></label>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Direccion</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Direccion'];?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Fecha Nacimiento</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['FechaNacimiento'];?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Genero</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Sexo'];?></label>
            </div> 

            <div class="form-group">
              <label class="col-sm-2 control-label">Telefono 1</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Telefono1']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Telefono 2</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Telefono2']; ?></label>
            </div>  

            <div class="form-group">
              <label class="col-sm-2 control-label">Nacionalidad</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Nacionalidad']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Facebook</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Facebook']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Twitter</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Twitter']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Estado</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Estado']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Actualizado por</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreUsuario']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Actualizado en</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['updated_at']; ?></label>
            </div>            
          </div><!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <!-- <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Modify"> -->
                <a href="?module=customer" class="btn btn-primary">Regresar</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content