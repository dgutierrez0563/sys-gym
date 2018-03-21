
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Management of Subscription

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
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Successful subscription.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Updated subscription.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Subscription enabled.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Subscription disabled.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">     
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">Cod.</th>
                <th>Customer</th>
                <th>Plan</th>
                <th class="center">Expiration Date</th>  
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT subscripcion.IDSubscripcion,subscripcion.IDCliente AS sIDCliente,
            							subscripcion.IDPlan,subscripcion.FechaSubscripcion,subscripcion.FechaExpira,
            							cliente.IDCliente,cliente.NombreCompleto,plan.IDPlan,plan.NombrePlan
                          FROM subscripcion,cliente,plan WHERE subscripcion.IDCliente=cliente.IDCliente
                          AND subscripcion.IDPlan=plan.IDPlan
                          ORDER BY NombrePlan ASC")
                          or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $date = date_create($data['FechaExpira']);
              $date_aux = date_format($date,'m-d-Y');
              echo "<tr style='width: auto;'>
                      <td class='center'>$no</td>
                      <td>$data[NombreCompleto]</td>
                      <td>$data[NombrePlan]</td>
                      <td class='center'>$date_aux</td>
                      <td class='center'>
                        <div>"; ?>
                    <?php 
                      echo "<a data-toggle='tooltip' data-placement='top' title='Modify' class='btn btn-primary btn-xs' href='?module=form_subscription&form=edit&id=$data[IDSubscripcion]'>
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