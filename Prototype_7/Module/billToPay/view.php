<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Modulo de Gastos

    <a class="btn btn-primary btn-social pull-right" href="?module=form_billToPay&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Nuevo
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
                  Movimiento registrado.
                </div>";
        }

        elseif ($_GET['alert'] == 2) {
          echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                  Movimiento actualizado.
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
                    <th>No. Factura</th>
                    <th>Proveedor</th>
                    <th>Total</th>
                    <th class="center">Expira</th>
                    <th class="center">Condicion</th>
                    <th class="center">Accion</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
          
                $query = mysqli_query($mysqli, "SELECT cuentaGastos.IDCuentaGastos,cuentaGastos.NumeroFactura,cuentaGastos.IDProveedor,cuentaGastos.Monto,cuentaGastos.FechaVencimiento,cuentaGastos.EstadoFactura,proveedor.IDProveedor,proveedor.NombreProveedor FROM cuentaGastos,proveedor WHERE cuentaGastos.IDProveedor=proveedor.IDProveedor ORDER BY IDCuentaGastos ASC")
                  or die('error: '.mysqli_error($mysqli));

                while ($data = mysqli_fetch_assoc($query)) { 
                  $amount_aux = $data['Monto'];
                  $amount_aux = number_format($amount_aux,2);
                  $date = date_create($data['FechaVencimiento']);
                  $date_aux = date_format($date,'m-d-Y');
                  if ($data['EstadoFactura'] == "Paid") {
                    # code...
                    $invoice_status_aux = "Paid";
                    $label_class = "label-success";
                  }
                  else{
                    $invoice_status_aux = "Pending";
                    $label_class = 'label-warning';
                  }
                  echo "<tr style='width: auto;'>
                          <td class='center'>$no</td>
                          <td>$data[NumeroFactura]</td>
                          <td>$data[NombreProveedor]</td>
                          <td>₡ $amount_aux</td>
                          <td class='center'>$date_aux</td> ";

                          if($data['EstadoFactura'] == "Paid"){?>

                            <td class="center"><span class="label" style="font-size: 14px;font-weight: bold;background-color: #00BA16;"><i class='icon fa fa-check-circle'> <?php echo $invoice_status_aux; ?></i></span></td>
                            <?php
                            }else{ ?>
                              <td class="center"><span class="label" style="font-size: 14px;font-weight: bold;background-color: #F79933;"><i class='icon fa fa-times-circle'> <?php echo $invoice_status_aux; ?></i></span></td>
                           <?php }
                            ?>
                          <td class="center">
                            <div>
                            <?php
                            $option_aux = "View";
                            echo "<a data-toggle='tooltip' data-placement='top' title='Editar' style='margin-right:1px' class='btn btn-primary btn-xs' href='?module=form_billToPay&form=edit&id=$data[IDCuentaGastos]'>
                                    <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                </a>
                                <a data-toggle='tooltip' data-placement='top' title='Detalle'  class='btn btn-info btn-xs' href='?module=detailExpsense&detail&id=$data[IDCuentaGastos]&option=$option_aux'>
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
    elseif ($_SESSION['Role']=='User') { ?>
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
                    Movimiento registrado.
                  </div>";
          }

          elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                    Movimiento actualizado.
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
                      <th>No. Factura</th>
                      <th>Proveedor</th>
                      <th>Total</th>
                      <th class="center">Expira</th>
                      <th class="center">Condicion</th>
                      <th class="center">Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                  $no = 1;
            
                  $query = mysqli_query($mysqli, "SELECT cuentaGastos.IDCuentaGastos,cuentaGastos.NumeroFactura,cuentaGastos.IDProveedor,cuentaGastos.Monto,cuentaGastos.FechaVencimiento,cuentaGastos.EstadoFactura,proveedor.IDProveedor,proveedor.NombreProveedor FROM cuentaGastos,proveedor WHERE cuentaGastos.IDProveedor=proveedor.IDProveedor ORDER BY IDCuentaGastos ASC")
                    or die('error: '.mysqli_error($mysqli));

                  while ($data = mysqli_fetch_assoc($query)) { 
                    $amount_aux = $data['Monto'];
                    $amount_aux = number_format($amount_aux,2);
                    $date = date_create($data['FechaVencimiento']);
                    $date_aux = date_format($date,'m-d-Y');
                    if ($data['EstadoFactura'] == "Paid") {
                      # code...
                      $invoice_status_aux = "Paid";
                      $label_class = "label-success";
                    }
                    else{
                      $invoice_status_aux = "Pending";
                      $label_class = 'label-warning';
                    }
                    echo "<tr style='width: auto;'>
                            <td class='center'>$no</td>
                            <td>$data[NumeroFactura]</td>
                            <td>$data[NombreProveedor]</td>
                            <td>₡ $amount_aux</td>
                            <td class='center'>$date_aux</td> ";

                            if($data['EstadoFactura'] == "Paid"){?>

                              <td class="center"><span class="label" style="font-size: 14px;font-weight: bold;background-color: #00BA16;"><i class='icon fa fa-check-circle'> <?php echo $invoice_status_aux; ?></i></span></td>
                              <?php
                              }else{ ?>
                                <td class="center"><span class="label" style="font-size: 14px;font-weight: bold;background-color: #F79933;"><i class='icon fa fa-times-circle'> <?php echo $invoice_status_aux; ?></i></span></td>
                             <?php }
                              ?>
                            <td class="center">
                              <div>
                              <?php
                              $option_aux = "View";
                              echo "
                                  <a data-toggle='tooltip' data-placement='top' title='Detalle'  class='btn btn-info btn-xs' href='?module=detailExpsense&detail&id=$data[IDCuentaGastos]&option=$option_aux'>
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