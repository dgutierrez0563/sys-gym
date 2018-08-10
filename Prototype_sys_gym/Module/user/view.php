
<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> User Management

    <a class="btn btn-primary btn-social pull-right" href="?module=form_user&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add User
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
              Registered user successfully.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              User profile successfully updated.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Successfully activated user.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Successfully deactivated user.
            </div>";
    }
   
    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
              File not supported.
            </div>";
    }

    elseif ($_GET['alert'] == 6) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
              Very large file..
            </div>";
    }
 
    elseif ($_GET['alert'] == 7) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
               Allowed files: *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    elseif ($_GET['alert'] == 8) {
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
                <th class="center">Photo</th>
                <th>User Name</th>
                <th class="center">ID</th>
                <th>Full Name</th>
                <th>Role</th>
                <th class="center">Status</th>
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT * FROM usuario ORDER BY IDUsuario DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
  
              echo "<tr style='width: auto;'>
                      <td class='center'>$no</td>";

                      if ($data['Foto']=="") { ?>
                        <td class='center'><img class='img-user' src='Content/images/user/user-default.png' width='30'></td>
                      <?php
                      } else { ?>
                        <td class='center'><img class='img-user' src='Content/images/user/<?php echo $data['Foto']; ?>' width='30'></td>
                      <?php
                      }

              echo "  <td>$data[NombreUsuario]</td>
                      <td class='center'>$data[Cedula]</td>
                      <td>$data[NombreCompleto]</td>
                      <td>$data[Role]</td>
                      <td class='center'>$data[Estado]</td>

                      <td class='center'>
                          <div>";

                          if ($data['Estado']=='Enabled') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:1px" class="btn btn-warning btn-xs" href="Module/user/proses.php?act=off&id=<?php echo $data['IDUsuario'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
                      <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:1px" class="btn btn-success btn-xs" href="Module/user/proses.php?act=on&id=<?php echo $data['IDUsuario'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
                      <?php
                          }
                        echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px' class='btn btn-primary btn-xs' href='?module=form_user&form=edit&id=$data[IDUsuario]'>
                            <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>
                          <a data-toggle='tooltip' data-placement='top' title='Profile'  class='btn btn-info btn-xs' href='?module=viewprofileUser&profile&id=$data[IDUsuario]'>
                              <i style='color:#fff' class='glyphicon glyphicon-eye-open'></i>
                          </a>                            
                          </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->