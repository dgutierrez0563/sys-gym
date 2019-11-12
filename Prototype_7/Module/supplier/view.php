
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-briefcase icon-title"></i> Supplier Management

    <a class="btn btn-primary btn-social pull-right" href="?module=form_supplier&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Suppplier
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
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              Added supplier.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              Updated supplier.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              Activated supplier.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              Desactivated supplier.
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
    <?php  
      if ($_SESSION['Role'] == 'Admin') { ?>
        <div class="box box-primary">
          <div class="box-body">
          <div class="table-responsive">
            <table id="dataTables1" class="table row-border table-hover">
              <thead>
                <tr class="info">
                  <th class="center">No.</th>
                  <th>Supplier</th>
                  <th>Email</th>
                  <th>Phone 1</th>
                  <th class="center">Status</th>
                  <th class="center">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php  
              $no = 1;
        
              $query = mysqli_query($mysqli, "SELECT IDProveedor,CedulaJuridica,NombreProveedor,Correo,Telefono1,
                                              Telefono2,Representante,Estado FROM proveedor ORDER BY NombreProveedor ASC")
                                              or die('error: '.mysqli_error($mysqli));

              while ($data = mysqli_fetch_assoc($query)) {

                echo "<tr style='width: auto;'>
                        <td  class='center'>$no</td>
                        <td>$data[NombreProveedor]</td>
                        <td>$data[Correo]</td>
                        <td>$data[Telefono1]</td> 
                        <td class='center'>$data[Estado]</td>
                        <td class='center' >
                          <div>";
                            if ($data['Estado']=='Enabled') { ?>
                              <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:1px" class="btn btn-warning btn-xs" href="Module/supplier/proses.php?act=off&id=<?php echo $data['IDProveedor'];?>">
                                  <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                              </a>
                      <?php } 
                            else { ?>
                              <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:1px"  class="btn btn-success btn-xs" href="Module/supplier/proses.php?act=on&id=<?php echo $data['IDProveedor'];?>">
                                  <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                              </a>
                      <?php }
                        echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px' class='btn btn-primary btn-xs' href='?module=form_supplier&form=edit&id=$data[IDProveedor]'>
                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-toggle='tooltip' data-placement='top' title='Profile'  class='btn btn-info btn-xs' href='?module=profileSupplier&profile&id=$data[IDProveedor]'>
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
      <?php
      } elseif ($_SESSION['Role'] == 'User') { ?>
        <div class="box box-primary">
          <div class="box-body">
          <div class="table-responsive">
            <table id="dataTables1" class="table row-border table-hover">
              <thead>
                <tr class="info">
                  <th class="center">No.</th>
                  <th>Supplier</th>
                  <th>Email</th>
                  <th>Phone 1</th>
                  <th class="center">Status</th>
                  <th class="center">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php  
              $no = 1;
        
              $query = mysqli_query($mysqli, "SELECT IDProveedor,CedulaJuridica,NombreProveedor,Correo,Telefono1,
                                              Telefono2,Representante,Estado FROM proveedor ORDER BY NombreProveedor ASC")
                                              or die('error: '.mysqli_error($mysqli));

              while ($data = mysqli_fetch_assoc($query)) {

                echo "<tr style='width: auto;'>
                        <td  class='center'>$no</td>
                        <td>$data[NombreProveedor]</td>
                        <td>$data[Correo]</td>
                        <td>$data[Telefono1]</td> 
                        <td class='center'>$data[Estado]</td>
                        <td class='center' >
                          <div>";
                          echo "
                              <a data-toggle='tooltip' data-placement='top' title='Profile'  class='btn btn-info btn-xs' href='?module=profileSupplier&profile&id=$data[IDProveedor]'>
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
      <?php
      }      
    ?>
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->