
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Subscription Management

    <a class="btn btn-primary btn-social pull-right" href="?module=form_subscription&form=add" title="Add New" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Subscription
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
              Successful subscription.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              Updated subscription.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              Subscription enabled.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
             Subscription disabled.
            </div>";
    }
    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
              New subscription plan added.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
        <div class="table-responsive">
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">Cod.</th>
                <th>Customer</th>
                <th>Plan</th>
                <th class="center">Expiration Date</th>
                <th class="center">Status</th>
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT subscripcion.IDSubscripcion,subscripcion.IDCliente AS sIDCliente,
            							subscripcion.IDPlan,subscripcion.FechaSubscripcion,subscripcion.FechaExpira,
            							subscripcion.Estado,cliente.IDCliente,cliente.NombreCompleto,plan.IDPlan,plan.NombrePlan
                          FROM subscripcion,cliente,plan WHERE subscripcion.IDCliente=cliente.IDCliente
                          AND subscripcion.IDPlan=plan.IDPlan
                          ORDER BY NombrePlan ASC")
                          or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $date = date_create($data['FechaExpira']);
              $date_actual = date('m-d-Y');
              $date_aux = date_format($date,'m-d-Y');
              echo "<tr style='width: auto;'>
                      <td class='center'>$no</td>
                      <td>$data[NombreCompleto]</td>
                      <td>$data[NombrePlan]</td>
                      <td class='center'>$date_aux</td>
                      <td class='center'>$data[Estado]</td>
                      <td class='center'>
                        <div>";
                          if ($data['Estado']=='Enabled') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:1px" class="btn btn-warning btn-xs" href="Module/subscription/proses.php?act=off&id=<?php echo $data['IDSubscripcion'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
                    <?php } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:1px"  class="btn btn-success btn-xs" href="Module/subscription/proses.php?act=on&id=<?php echo $data['IDSubscripcion'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
                    <?php }
                      echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px;' class='btn btn-primary btn-xs' href='?module=form_subscription&form=edit&id=$data[IDSubscripcion]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
                          if ($date_aux < $date_actual) { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Add Payment" style="margin-right:1px" class="btn btn-success btn-xs" href="Module/subscription/proses.php?act=newPayment&id=<?php echo $data['IDSubscripcion'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-plus"></i>
                            </a>
                    <?php } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Locked" class="btn btn-danger btn-xs" disabled>
                                <i style="color:#fff" class="glyphicon glyphicon-ban-circle"></i>
                            </a>
                    <?php } ?>
                        </div>
                      </td>
                    </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->

<!-- <a data-toggle='tooltip' data-placement='top' title='Add' class='btn btn-success btn-xs' href='?module=form_subscription&form=edit&id=$data[IDSubscripcion]'>
                              <i style='color:#fff' class='glyphicon glyphicon-plus'></i>
                          </a> -->