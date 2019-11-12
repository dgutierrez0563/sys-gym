<?php

if (isset($_GET['id'])) {

  $id_profile = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT cliente.IDCliente,cliente.Cedula,cliente.NombreCompleto,cliente.Sexo,
    perfilCliente.IDPerfil,perfilCliente.IDCliente,perfilCliente.Altura,perfilCliente.Peso,perfilCliente.GrasaCorporal,
    perfilCliente.Agua,perfilCliente.IMC,perfilCliente.BMR,perfilCliente.MasaOsea,perfilCliente.GrasaViceral,
    perfilCliente.Estado,perfilCliente.updated_user,perfilCliente.updated_at,usuario.IDUsuario,usuario.NombreUsuario
    FROM cliente,perfilCliente,usuario 
    WHERE perfilCliente.IDPerfil='$id_profile' 
    AND perfilCliente.IDCliente=cliente.IDCliente 
    AND perfilCliente.updated_user=usuario.IDUsuario") 
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
            
            <div class="form-group panel panel-info" style="background-color:#D4EEF3; ">
              <label style="font-size:25px;margin-top:20px;margin-bottom:20px;" class="col-sm-8"><?php echo $data['Cedula']." | ".$data['NombreCompleto']." | ".$data['Sexo']; ?></label>
            </div>

            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Altura</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Altura']; ?></label>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Peso</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Peso'];?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Grasa Corporal</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['GrasaCorporal'];?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Agua</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Agua'];?></label>
            </div> 

            <div class="form-group">
              <label class="col-sm-2 control-label">IMC</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['IMC']; ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">BMR</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['BMR']; ?></label>
            </div>  

            <div class="form-group">
              <label class="col-sm-2 control-label">Masa Osea</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['MasaOsea']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Grasa Viceral</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['GrasaViceral']; ?></label>
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
                <a href="?module=profileCustomer" class="btn btn-primary">Regresar</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content