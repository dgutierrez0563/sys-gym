<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Product Stock
    <a class="btn btn-primary btn-social pull-right" href="?module=form_stock&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Entry / Exit Inventory
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
              The product stock has been updated.
            </div>";
    }
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
              Problem with the inventory departure, check the quantity requested.
            </div>";
    }
    ?>
      <div class="box box-primary">
        <div class="box-body">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>Warning</h3>
              <p><span class="label" style="font-size: 16px;font-weight: bold;background-color: #FF0C00;"><i class="glyphicon glyphicon-exclamation-sign"> Low Stock</i></span></p>
            </div>
          </div>
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">No.</th>
                <th class="center">Name Product</th>
                <th class="center">Price</th>
                <th class="center">Quantity</th>
                <th class="center">Status</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT producto.IDProducto,producto.NombreProducto,producto.Precio,
                                            producto.Cantidad,producto.Estado
                                            FROM producto, proveedor WHERE producto.IDProveedor=proveedor.IDProveedor
                                            ORDER BY producto.Cantidad ASC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $price_aux = $data['Precio'];
              $price_aux = number_format($price_aux,2);
              echo "<tr width='20'>
                      <td class='center'>$no</td>
                      <td>$data[NombreProducto]</td>
                      <td>$price_aux</td>"; ?>
                      <?php
                      $qty_aux = $data['Cantidad'] ;
                        if ($qty_aux <= 20) { ?>
                          <td class="center"><span class="label" style="font-size: 15px;font-weight: bold;background-color: #FF0C00;"><i class="glyphicon glyphicon-exclamation-sign"> <?php echo $qty_aux; ?></i></span></td>
                         <?php }
                         else { ?>
                          <td class="center"><?php echo $data['Cantidad']; ?></td>
                         <?php }
                          ?>
                      <td class='center'><?php echo $data['Estado']; ?></td>
              <?php $no++; } ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->