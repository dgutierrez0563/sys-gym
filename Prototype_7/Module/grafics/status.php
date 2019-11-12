
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-briefcase icon-title"></i> Estado Financiero

<!--     <a class="btn btn-primary btn-social pull-right" href="?module=form_customer&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Customer
    </a> -->
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">     
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
<!--                 <th class="center">No.</th>
                <th class="center">Identification</th>
                <th class="center">Customer</th>
                <th class="center">Email</th>
                <th class="center">Phone 1</th>
                <th class="center">Status</th>        
                <th class="center">Actions</th> -->
                <th colspan="4">Movimientos</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT factura.IDFactura,factura.EstadoFactura AS facturaEstado,
              factura.TotalVenta AS totalInvoice,factura.Tipo,cuentaGastos.IDCuentaGastos,
              cuentaGastos.Monto AS amountPerPay,cuentaGastos.EstadoFactura AS gastoEstado
              FROM factura,cuentaGastos")
              or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) {

              echo "<tr width='20'>
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
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->