
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-briefcase icon-title"></i> Customer Management

    <a class="btn btn-primary btn-social pull-right" href="?module=form_customer&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Customer
    </a>
  </h1>

</section>

<?php
  if ($_SESSION['Role']=='Admin') { ?>
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
                    <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                    Added customer.
                  </div>";
          }

          elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                    Updated customer.
                  </div>";
          }

          elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                    Activated customer.
                  </div>";
          }
       
          elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                    Desactivated customer.
                  </div>";
          }
          elseif ($_GET['alert'] == 5) {
            echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
                    Please, check the required fields.
                  </div>";
          }
        ?>

          <div class="box box-primary">
            <div class="box-body">
            <div class="table-responsive">
              <table id="dataTables1" class="table row-border table-hover">
                <thead>
                  <tr class="info">
                    <th class="center">No.</th>
                    <th class="center">Identification</th>
                    <th class="center">Customer</th>
                    <th class="center">Email</th>
                    <th class="center">Phone 1</th>
                    <th class="center">Status</th>        
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
          
                $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula,NombreCompleto,Correo,Telefono1,
                                                Estado FROM cliente WHERE cedula !='0000' ORDER BY Cedula ASC")
                                                or die('error: '.mysqli_error($mysqli));

                while ($data = mysqli_fetch_assoc($query)) {


                  echo "<tr width='20'>
                          <td class='center'>$no</td>
                          <td>$data[Cedula]</td>
                          <td>$data[NombreCompleto]</td>
                          <td>$data[Correo]</td>
                          <td>$data[Telefono1]</td>                      
                          <td class='center'>$data[Estado]</td>
                          <td class='center'>
                            <div>";
                              if ($data['Estado']=='Enabled') { ?>
                                <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:1px" class="btn btn-warning btn-xs" href="Module/customer/proses.php?act=off&id=<?php echo $data['IDCliente'];?>">
                                    <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                                </a>
                        <?php } 
                              else { ?>
                                <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:1px" class="btn btn-success btn-xs" href="Module/customer/proses.php?act=on&id=<?php echo $data['IDCliente'];?>">
                                    <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                                </a>
                        <?php }
                          echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px' class='btn btn-primary btn-xs' href='?module=form_customer&form=edit&id=$data[IDCliente]'>
                                  <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                              </a>
                              <a data-toggle='tooltip' data-placement='top' title='Profile'  class='btn btn-info btn-xs' href='?module=viewprofileCustomer&profile&id=$data[IDCliente]'>
                                  <i style='color:#fff' class='glyphicon glyphicon-eye-open'></i>
                              </a>
                            </div>         
                          </td>
                        </tr>";
                  $no++; } ?>
                </tbody>
              </table>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!--/.col -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
  <?php
  }
  elseif ($_SESSION['Role']=='User') {?>
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
                    El Cliente ha sido activado satisfactoriamente.
                  </div>";
          }
       
          elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                    El Cliente se bloqueó satisfactoriamente.
                  </div>";
          }
          elseif ($_GET['alert'] == 5) {
            echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
                    Please, check the required fields.
                  </div>";
          }
        ?>

          <div class="box box-primary">
            <div class="box-body">
            <div class="table-responsive">
              <table id="dataTables1" class="table row-border table-hover">
                <thead>
                  <tr class="info">
                    <th class="center">No.</th>
                    <th class="center">Identification</th>
                    <th class="center">Customer</th>
                    <th class="center">Email</th>
                    <th class="center">Phone 1</th>
                    <th class="center">Status</th>        
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
          
                $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula,NombreCompleto,Correo,Telefono1,
                                                Estado FROM cliente WHERE cedula !='0000' ORDER BY Cedula ASC")
                                                or die('error: '.mysqli_error($mysqli));

                while ($data = mysqli_fetch_assoc($query)) {

                  echo "<tr width='20'>
                          <td class='center'>$no</td>
                          <td>$data[Cedula]</td>
                          <td>$data[NombreCompleto]</td>
                          <td>$data[Correo]</td>
                          <td>$data[Telefono1]</td>                      
                          <td class='center'>$data[Estado]</td>
                          <td class='center'>
                            <div>";
                          echo "
                              <a data-toggle='tooltip' data-placement='top' title='Profile'  class='btn btn-info btn-xs' href='?module=viewprofileCustomer&profile&id=$data[IDCliente]'>
                                  <i style='color:#fff' class='glyphicon glyphicon-eye-open'></i>
                              </a>
                            </div>         
                          </td>
                        </tr>";
                  $no++; } ?>
                </tbody>
              </table>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!--/.col -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
<?php
  }
?>