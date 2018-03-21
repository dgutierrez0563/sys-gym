<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Management of Invoice
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">

          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="btn-group pull-right">
                <a  href="?module=form_new&form=add" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span> New Invoice</a>
              </div>
              <h4><i class='glyphicon glyphicon-search'></i> Search Invoices</h4>
            </div>
          </div>
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">Cod.</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Total</th>
                <th class="center">Invoice Status</th>
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT factura.IDFactura,factura.FechaFactura,factura.IDCliente AS invoiceCustomerID,factura.Condicion,factura.TotalVenta,factura.EstadoFactura,cliente.IDCliente AS
              customerID,cliente.NombreCompleto AS customerName FROM factura,cliente WHERE 
              factura.IDCliente=cliente.IDCliente ORDER BY factura.IDFactura DESC")
              or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) {
              $total_invoice = number_format($data['TotalVenta'],2);
              $date_format_aux = date_create($data['FechaFactura']);
              $date_format_aux = date_format($date_format_aux,'m-d-Y');
              echo "<tr width='20'>
                      <td class='center'>$data[IDFactura]</td>
                      <td>$date_format_aux</td>";?>
                      
                      <?php
                        if ($data['invoiceCustomerID'] == "") { ?>
                          <td></td>
                          
                      <?php } else { ?>
                          <td><?php echo $data['customerName']; ?></td>
                          <?php } ?>
                      <td><?php echo $total_invoice; ?></td>

                      <?php
                      if($data['EstadoFactura'] == "Paid"){
                        $invoice_status_aux = "Paid";
                        ?>                        
                        <td class="center"><span class="label" style="font-size: 14px;font-weight: bold;background-color: #00BA16;"><i class='icon fa fa-check-circle'> <?php echo $invoice_status_aux; ?></i></span></td>
                        <?php
                        }else{ 
                          $invoice_status_aux = "Pending";
                          ?>
                          <td class="center"><span class="label" style="font-size: 14px;font-weight: bold;background-color: #F79933;"><i class='icon fa fa-times-circle'> <?php echo $invoice_status_aux; ?></i></span></td>
                       <?php }
                        ?>
                      <td class="center">
                        <div>

                      <?php
                        echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px' class='btn btn-primary btn-xs' href='?module=form_customer&form=edit&id=$data[IDFactura]'>
                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-toggle='tooltip' data-placement='top' title='Profile'  class='btn btn-info btn-xs' href='?module=viewprofileCustomer&profile&id=$data[IDFactura]'>
                                <i style='color:#fff' class='glyphicon glyphicon-eye-open'></i>
                            </a>
                            <a data-toggle='tooltip' data-placement='top' title='Print'  class='btn btn-default btn-xs' href='?module=viewDetail&file&id=$data[IDFactura]' >
                                <i style='color:#2C2C2C' class='glyphicon glyphicon-print'></i>
                            </a>
                        </div>
                      </td>
                    </tr>";
              $no++; } ?>

            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div>
    </div>
  </div>  
</section>