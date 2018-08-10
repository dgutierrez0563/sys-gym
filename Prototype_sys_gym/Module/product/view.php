<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-tags icon-title"></i> Management of Product

    <a class="btn btn-primary btn-social pull-right" href="?module=form_product&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add Product
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
              El nuevo producto se ha registrado satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
           Los datos del producto han sido actualizados satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El producto ha sido activado satisfactoriamente.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             El producto se bloqueó satisfactoriamente.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">     
          <table id="dataTables1" class="table row-border table-hover">
            <thead>
              <tr class="info">
                <th class="center">No.</th>
                <th>Name Product</th>
                <th>Price</th>
                <th>Supplier</th>
                <th class="center">Status</th>
                <th class="center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT producto.IDProducto,producto.NombreProducto,producto.Precio,
                                            producto.IDProveedor,producto.Estado,proveedor.IDProveedor,
                                            proveedor.NombreProveedor 
                                            FROM producto, proveedor WHERE producto.IDProveedor=proveedor.IDProveedor")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $price_aux = $data['Precio'];
              $price_aux = number_format($price_aux,2);
              echo "<tr width='20'>
                      <td class='center'>$no</td>
                      <td>$data[NombreProducto]</td>
                      <td>$price_aux</td>
                      <td>$data[NombreProveedor]</td>                  
                      <td class='center'>$data[Estado]</td>
                      <td class='center'>
                        <div>";
                          if ($data['Estado']=='Enabled') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Disable" style="margin-right:1px" class="btn btn-warning btn-xs" href="Module/product/proses.php?act=off&id=<?php echo $data['IDProducto'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
                    <?php } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Enable" style="margin-right:1px" class="btn btn-success btn-xs" href="Module/product/proses.php?act=on&id=<?php echo $data['IDProducto'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
                    <?php }
                      echo "<a data-toggle='tooltip' data-placement='top' title='Modify' style='margin-right:1px;' 
                            class='btn btn-primary btn-xs' href='?module=form_product&form=edit&id=$data[IDProducto]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>
                          <a data-toggle='tooltip' data-placement='top' title='Detail'  class='btn btn-info btn-xs' href='?module=detailProduct&detail&id=$data[IDProducto]'>
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