<?php  

if ($_GET['form']=='add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Add Product
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home </a></li>
      <li><a href="?module=product"> Product </a></li>
      <li class="active"> Add </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/product/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Name Product</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nameproduct" maxlength="40" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" class="form-control" id="price" name="price" maxlength="10" autocomplete="off" onKeyPress="return filterFloatPrice(event,this)" required>
                  </div>
                </div>
              </div>              

              <div class="form-group">
                <label class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="quantity" autocomplete="off" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Detail</label>
                <div class="col-sm-5">
                  <input type="textarea" class="form-control" maxlength="50" name="detail" autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Supplier</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_supplier" id="id_supplier" autocomplete="off" required>
                    <option value="">-- SELECT --</option>
                    <?php
                      $query = mysqli_query($mysqli, "SELECT IDProveedor,NombreProveedor FROM proveedor 
                        WHERE Estado='Enabled' ORDER BY NombreProveedor") or die('error: '.mysqli_error($mysqli));
                      if (mysqli_affected_rows($mysqli) != 0) {
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                          echo "<option value=" .$row['IDProveedor'] . ">" .$row['NombreProveedor'] . "</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <br>
            </div><!-- /.box body -->            

            <div class="box-footer">
              <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=product" class="btn btn-default btn-reset">Cancel</a>
                </div>
              </div>
              <br>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM producto WHERE IDProducto='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
  	}	
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modify Product Data
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=berenda"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="?module=product"> Product </a></li>
      <li class="active"> Modify </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/product/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">
              
              <input type="hidden" name="id_product" value="<?php echo $data['IDProducto']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Name Product</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nameproduct" maxlength="40" autocomplete="off" value="<?php echo $data['NombreProducto']; ?>" required>
                </div>
              </div>           

              <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" class="form-control" id="price" name="price" maxlength="10" autocomplete="off" onKeyPress="return filterFloat(event,this)" value="<?php echo $data['Precio']; ?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="quantity" autocomplete="off" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Cantidad']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Supplier</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_supplier" id="id_supplier" autocomplete="off" required>
                    <option value="">-- SELECT --</option>
                    <?php
                      $query = mysqli_query($mysqli, "SELECT IDProveedor,NombreProveedor FROM proveedor
                        WHERE Estado='Enabled' ORDER BY NombreProveedor") or die('error: '.mysqli_error($mysqli));
                      if (mysqli_affected_rows($mysqli) != 0) {
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                          echo "<option value=" .$row['IDProveedor'] . ">" .$row['NombreProveedor'] . "</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>              

              <div class="form-group">
                <label class="col-sm-2 control-label">Detail</label>
                <div class="col-sm-5">
                  <input type="textarea" class="form-control" name="detail" maxlength="50" autocomplete="off" value="<?php echo $data['Detalle']; ?>">
                </div>
              </div>
              <br>
            </div><!-- /.box body -->

            <div class="box-footer">
            <br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                  <a href="?module=product" class="btn btn-default btn-reset">Cancel</a>
                </div>
              </div>
              <br>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}?>