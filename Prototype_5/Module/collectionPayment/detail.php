<?php

if (isset($_GET['id'])) {

  $id_invoice = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT factura.IDFactura,factura.FechaFactura,factura.IDCliente AS fclienteID,factura.Condicion,
    factura.TotalVenta,factura.EstadoFactura,factura.updated_user,factura.updated_at,cliente.IDCliente AS clienteID,
    cliente.NombreCompleto,usuario.IDUsuario,usuario.NombreUsuario 
    FROM factura,cliente,usuario WHERE factura.IDFactura='$id_invoice' AND factura.IDCliente=cliente.IDCliente
    AND factura.updated_user=usuario.IDUsuario") 
    or die('error '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
  //$date = date_create($data['FechaFactura']);
}
?>

<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Collection Detail
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"> Collection Detail</li>
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
            <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['NombreCompleto']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">No. Invoice</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['IDFactura']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Date</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php $date=date_create($data['FechaFactura']);
              echo date_format($date,'m/d/Y'); ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Amount</label>
              <label style="text-align:left" class="col-sm-8 control-label">: $ <?php echo number_format($data['TotalVenta'],2); ?></label>
            </div>            

            <div class="form-group">
              <label class="col-sm-2 control-label">Condition</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Condicion']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Invoice Status</label>
              <?php if ($data['EstadoFactura']=="Paid") { ?>
                <label style="text-align:left" class="col-sm-8 control-label">: <span class="label" style="font-size: 14px;font-weight: bold;background-color: #00BA16;"><i class='icon fa fa-check-circle'> <?php echo $data['EstadoFactura']; ?></i></span></label> 
              <?php }else{ ?>
                <label style="text-align:left" class="col-sm-8 control-label">: <span class="label" style="font-size: 14px;font-weight: bold;background-color: #F79933;"><i class='icon fa fa-times-circle'> <?php echo $data['EstadoFactura']; ?></i></span></label>
              <?php } ?>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Updated by</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreUsuario']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Updated</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['updated_at']; ?></label>
            </div>
            <br>
          </div><!-- /.box body -->
          <div class="box-footer">
            <div class="form-group">
              <br>
              <div class="col-sm-offset-2 col-sm-10">                
                <a href="?module=collection_alert" class="btn btn-primary">Return to List</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->