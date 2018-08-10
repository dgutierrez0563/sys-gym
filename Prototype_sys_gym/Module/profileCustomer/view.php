
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-briefcase icon-title"></i> Management of Customer Profile

    <a class="btn btn-primary btn-social pull-right" href="?module=form_profileCustomer&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Customer Profile
    </a>
  </h1>

</section>

<!-- Main content -->
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
              Los nuevos datos del Cliente se han registrado satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
           Los datos del Cliente han sido actualizados satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El Perfil del Cliente ha sido activado satisfactoriamente.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             El Perfil del Cliente se bloqueó satisfactoriamente.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">     
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">No.</th>
                <th>Identification</th>
                <th>Customer</th>              
                <th class="center">Status</th>        
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT perfilCliente.IDPerfil,perfilCliente.IDCliente,
              perfilCliente.Estado,cliente.IDCliente,cliente.Cedula,cliente.NombreCompleto 
              FROM perfilCliente, cliente WHERE perfilCliente.IDCliente=cliente.IDCliente") 
              or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 


              echo "<tr>
                      <td width='20' class='center'>$no</td>
                      <td>$data[Cedula]</td>    
                      <td>$data[NombreCompleto]</td>              
                      <td class='center'>$data[Estado]</td>
                      <td class='center' width='60'>
                        <div>";
                          if ($data['Estado']=='Enabled') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:2px" class="btn btn-warning btn-xs" href="Module/profileCustomer/proses.php?act=off&id=<?php echo $data['IDPerfil'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
                    <?php } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:2px" class="btn btn-success btn-xs" href="Module/profileCustomer/proses.php?act=on&id=<?php echo $data['IDPerfil'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
                    <?php }
                      echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:2px' class='btn btn-primary btn-xs' href='?module=form_profileCustomer&form=edit&id=$data[IDPerfil]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>
                        </div>         
                      </td>
                    </tr>";
              $no++; } ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->