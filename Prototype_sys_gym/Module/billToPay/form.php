<?php  

if ($_GET['form']=='add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Add Expense
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
      <li><a href="?module=billToPay"> Expense </a></li>
      <li class="active"> Add </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/billToPay/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Supplier Name</label>
                <div class="col-sm-5">
                  <select class="chosen-select chosen-m" id="id_supplier" name="id_supplier" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" >
                    <option value=""></option>
                      <?php
                      $query = mysqli_query($mysqli, "SELECT IDProveedor,NombreProveedor FROM proveedor
                        WHERE Estado='Enabled' ORDER BY NombreProveedor") or die('error: '.mysqli_error($mysqli));
                      if (mysqli_affected_rows($mysqli) != 0) {
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            echo "<option value=" .$id_aux=$row['IDProveedor'] . ">" .$row['NombreProveedor'] . "</option>";
                        }
                      }
                      ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Number</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="invoice_number" name="invoice_number" maxlength="20" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>

              <div id="result_bill_to_pay"></div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Amount</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">₡.</span>
                    <input type="text" class="form-control" name="amount" maxlength="10" autocomplete="off" onKeyPress="return filterFloatPrice(event,this)" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Date</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="invoice_date" autocomplete="off" required>                  
                </div>              
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Expiration Date</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="expiration_date" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Status</label>
                <div class="col-sm-5">
                  <select class="form-control" name="invoice_status" autocomplete="off" required>
                    <option value=""> -- SELECT -- </option>
                    <option value="Credit">Credit</option>
                    <option value="Paid">Paid</option>
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
                  <a href="?module=billToPay" class="btn btn-default btn-reset">Cancel</a>
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

      $query = mysqli_query($mysqli, "SELECT * FROM cuentaGastos WHERE IDCuentaGastos='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    } 
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modify Bill to Pay
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="?module=billToPay"> Bill to Pay </a></li>
      <li class="active"> Modify </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="Module/billToPay/proses.php?act=edit" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="id_expense" value="<?php echo $data['IDCuentaGastos']; ?>">            

              <div class="form-group">
                <label class="col-sm-2 control-label">Supplier Name</label>
                <div class="col-sm-5">
                  <select class="chosen-select chosen-m" name="id_supplier" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required >
                    <option value=""></option>
                      <?php
                      $query = mysqli_query($mysqli, "SELECT IDProveedor,NombreProveedor FROM proveedor 
                        WHERE Estado='Enabled' ORDER BY NombreProveedor") or die('error: '.mysqli_error($mysqli));
                      if (mysqli_affected_rows($mysqli) != 0) {
                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            echo "<option value=" .$id_aux=$row['IDProveedor'] . ">" .$row['NombreProveedor'] . "</option>";
                        }
                      }
                      ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Number</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="invoice_number" maxlength="20" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['NumeroFactura']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Amount</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">₡.</span>
                    <input type="text" class="form-control" id="amount" name="amount" maxlength="10" autocomplete="off" onKeyPress="return filterFloat(event,this)" value="<?php echo $data['Monto']; ?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Date</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="invoice_date" autocomplete="off" value="<?php echo $data['FechaFactura']; ?>" required>                  
                </div>              
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Expiration Date</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="expiration_date" autocomplete="off" value="<?php echo $data['FechaVencimiento']; ?>" required>                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Status</label>
                <div class="col-sm-5">
                  <select class="form-control" name="invoice_status" autocomplete="off" required>
                    <option value=""> -- SELECT -- </option>
                    <option value="Credit">Credit</option>
                    <option value="Paid">Paid</option>
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
                  <a href="?module=billToPay" class="btn btn-default btn-reset">Cancel</a>
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
?>