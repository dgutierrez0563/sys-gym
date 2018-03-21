<?php
  if ($_SESSION['Role'] == "Admin") { ?>    
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-tags icon-title"></i> Collections Payment Alerts
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
                  Successfully collection payment.
                </div>";
        }

        elseif ($_GET['alert'] == 2) {
          echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
               Updated expense data.
                </div>";
        }
        ?>

          <div class="box box-primary">
            <div class="box-body">     
              <table id="dataTables1" class="table row-border table-hover">
                <thead>
                  <tr class="info">
                    <th class="center">No.</th>
                    <th>No. Invoice</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th class="center">Invoice Status</th>
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
          
                $query = mysqli_query($mysqli, "SELECT factura.IDFactura,factura.FechaFactura,factura.IDCliente AS fclienteID,factura.Condicion,factura.TotalVenta,factura.EstadoFactura,cliente.IDCliente AS clienteID,cliente.NombreCompleto FROM factura,cliente WHERE factura.IDCliente=cliente.IDCliente AND factura.EstadoFactura='Pending' ORDER BY factura.IDFactura ASC") or die('error: '.mysqli_error($mysqli));

                while ($data = mysqli_fetch_assoc($query)) { 
                  $amount_aux = $data['TotalVenta'];
                  $amount_aux = number_format($amount_aux,2);
                  if ($data['EstadoFactura'] == "Paid") {
                    $invoice_status_aux = "Paid";
                    $label_class = "label-success";
                  }
                  else{
                    $invoice_status_aux = "Pending";
                    $label_class = 'label-warning';
                  }
                  echo "<tr style='width: auto;'>
                          <td class='center'>$no</td>
                          <td>$data[IDFactura]</td>
                          <td>$data[NombreCompleto]</td>
                          <td>$amount_aux</td>";

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
                            echo "
                                <a data-toggle='tooltip' data-placement='top' title='PAY' style='margin-right:1px;' class='btn btn-success btn-xs' href='Module/collectionPayment/proses.php?act=pay&id=$data[IDFactura]'>
                                    <i style='color:#fff' class='glyphicon glyphicon-ok'></i>
                                </a>
                                <a data-toggle='tooltip' data-placement='top' title='VIEW'  class='btn btn-info btn-xs' href='?module=detailCollecttion&detail&id=$data[IDFactura]'>
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

  <?php }
  else{ ?>
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-tags icon-title"></i> Management of Payment Alerts
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
                  Successfully paid expense invoice.
                </div>";
        }

        elseif ($_GET['alert'] == 2) {
          echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
               Updated expense data.
                </div>";
        }
        ?>

          <div class="box box-primary">
            <div class="box-body">     
              <table id="dataTables1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr style="width: auto;">
                    <th class="center">No.</th>
                    <th class="center">No. Invoice</th>
                    <th class="center">Supplier</th>
                    <th class="center">Amount</th>
                    <th class="center">Expira</th>
                    <th class="center">Condition</th>
                    <th class="center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
          
                $query = mysqli_query($mysqli, "SELECT cuentaGastos.IDCuentaGastos,cuentaGastos.NumeroFactura,cuentaGastos.IDProveedor,cuentaGastos.Monto,cuentaGastos.FechaVencimiento,cuentaGastos.EstadoFactura,proveedor.IDProveedor,proveedor.NombreProveedor FROM cuentaGastos,proveedor WHERE cuentaGastos.IDProveedor=proveedor.IDProveedor AND cuentaGastos.EstadoFactura='Credit' ORDER BY IDCuentaGastos ASC")
                  or die('error: '.mysqli_error($mysqli));

                while ($data = mysqli_fetch_assoc($query)) { 
                  $amount_aux = $data['Monto'];
                  $amount_aux = number_format($amount_aux,2);
                  if ($data['EstadoFactura'] == "Paid") {
                    # code...
                    $invoice_status_aux = "Paid";
                    $label_class = "label-success";
                  }
                  else{
                    $invoice_status_aux = "Credit";
                    $label_class = 'label-warning';
                  }
                  echo "<tr style='width: auto;'>
                          <td class='center'>$no</td>
                          <td>$data[NumeroFactura]</td>
                          <td>$data[NombreProveedor]</td>
                          <td>$amount_aux</td>
                          <td>$data[FechaVencimiento]</td> ";

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
                            echo "
                                <a data-toggle='tooltip' data-placement='top' title='VIEW'  class='btn btn-info btn-xs' href='?module=detailExpsense&detail&id=$data[IDCuentaGastos]'>
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
  <?php } ?>

