<?php

if (isset($_GET['id'])) {

  $id_product = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT producto.IDProducto,producto.NombreProducto,producto.Precio,producto.Cantidad,
                                  producto.IDProveedor,producto.Detalle,producto.Estado,producto.updated_user,producto.updated_at,
                                  proveedor.IDProveedor,proveedor.NombreProveedor,usuario.IDUsuario,usuario.NombreUsuario
                                  FROM producto,proveedor,usuario WHERE producto.IDProducto='$id_product'
                                  AND producto.IDProveedor=proveedor.IDProveedor
                                  AND producto.updated_user=usuario.IDUsuario") 
                                  or die('error '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
}
?>

<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Product Detail
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"> Product Detail</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal"  enctype="multipart/form-data">
          <div class="box-body">      
            
            <div class="form-group">
            <label style="font-size:25px;margin-top:10px;" class="col-sm-8">Product: <?php echo $data['NombreProducto']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Price</label>
              <label style="text-align:left" class="col-sm-8 control-label">: $ <?php echo number_format($data['Precio'],2); ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Quantity</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Cantidad']; ?> Units</label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Detail</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Detalle']; ?></label>
            </div>          
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Estado']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Updated by</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreUsuario']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Updated</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['updated_at']; ?></label>
            </div>            
          </div><!-- /.box body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">                
                <a href="?module=product" class="btn btn-primary">Return to List</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->