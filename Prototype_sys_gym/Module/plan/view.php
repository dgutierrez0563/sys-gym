<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Management of Plan

    <a class="btn btn-primary btn-social pull-right" href="?module=form_plan&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Plan
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
              El nuevo plan se ha registrado satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
           Los datos del plan han sido actualizados satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El plan ha sido activado satisfactoriamente.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             El plan se bloqueó satisfactoriamente.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">     
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">No.</th>
                <th>Type Plan</th>
                <th class="center">Days</th>
                <th>Rate</th>
                <th>Detail</th>                
                <th class="center">Status</th>        
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT IDPlan,NombrePlan,CantidadDias,Costo,
                                            Detalle,Estado 
                                            FROM plan ORDER BY NombrePlan ASC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $price_aux = $data['Costo'];
              $price_aux = number_format($price_aux,2);
              echo "<tr style='width: auto;'>
                      <td class='center'>$no</td>
                      <td>$data[NombrePlan]</td>
                      <td class='center'>$data[CantidadDias]</td>
                      <td>$price_aux</td>
                      <td>$data[Detalle]</td>                      
                      <td class='center'>$data[Estado]</td>
                      <td class='center'>
                        <div>";
                          if ($data['Estado']=="Enabled") { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:1px" class="btn btn-warning btn-xs" href="Module/plan/proses.php?act=off&id=<?php echo $data['IDPlan'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
                    <?php } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:1px" class="btn btn-success btn-xs" href="Module/plan/proses.php?act=on&id=<?php echo $data['IDPlan'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
                    <?php }
                      echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px;' class='btn btn-primary btn-xs' 
                            href='?module=form_plan&form=edit&id=$data[IDPlan]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-toggle='tooltip' data-placement='top' title='Detail'  class='btn btn-info btn-xs' href='?module=detailPlan&detail&id=$data[IDPlan]'>
                                <i style='color:#fff' class='glyphicon glyphicon-eye-open'></i>
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