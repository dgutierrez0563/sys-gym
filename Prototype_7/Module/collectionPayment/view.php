<?php
  if ($_SESSION['Role'] == "Admin") { ?>    
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-tags icon-title"></i> Alerta de Cobros
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
                  Movimiento satisfactorio.
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
                    <th>Cliente</th>
                    <th>Total</th>
                    <th class="center">Estado Factura</th>
                    <th class="center">Accion</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
                //$signo_colon="₡ ";
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
                          <td>₡ $amount_aux</td>";

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
                                <a data-toggle='tooltip' data-placement='top' title='Pagar' style='margin-right:1px;' class='btn btn-success btn-xs' href='Module/collectionPayment/proses.php?act=pay&id=$data[IDFactura]'>
                                    <i style='color:#fff' class='glyphicon glyphicon-ok'></i>
                                </a>
                                <a data-toggle='tooltip' data-placement='top' title='Detalle'  class='btn btn-info btn-xs' href='?module=detailCollecttion&detail&id=$data[IDFactura]'>
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

  <?php }
  elseif ($_SESSION['Role'] == "User"){ ?>
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-tags icon-title"></i> Alerta de Cobros
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
            <div class="table-responsive">
              <table id="dataTables1" class="table row-border table-hover">
                <thead>
                  <tr class="info">
                    <th class="center">No.</th>
                    <th>No. Factura</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th class="center">Estado Factura</th>
                    <th class="center">Accion</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                $no = 1;
                //$signo_colon="₡ ";
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
                          <td>₡ $amount_aux</td>";

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
                                <a data-toggle='tooltip' data-placement='top' title='Detalle'  class='btn btn-info btn-xs' href='?module=detailCollecttion&detail&id=$data[IDFactura]'>
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
  <?php } ?>

