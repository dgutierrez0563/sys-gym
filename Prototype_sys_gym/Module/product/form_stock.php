
<script type="text/javascript">

  function product_data(input){
    var quantity = input.value;

    $.post("Module/product/product_stock.php", {
    dataproduct: quantity,
    }, function(response) {
      $('#stok').html(response)
      document.getElementById('qty_aux').focus();
    });
  }
  function data_empty(input) {

    aux = document.formRequest.qty_aux.value;
    var data = eval(aux);

    if(data < 1){
      alert('Please insert quantity in the required field');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }
  function data_stock() {

    stock_aux = document.formRequest.stok.value;
    qty = document.formRequest.qty_aux.value;
    option_aux = document.formRequest.option.value;
      
    if (qty == "") {
      var entry = "";
      var output = "";
    }
    else {
      var output = eval(stock_aux) - eval(qty);
      var entry = eval(stock_aux) + eval(qty);
    }
    if (option_aux == "output"){
      if(stock_aux == "" || stock_aux == 0){
        document.formRequest.total_stok.value = "";
      }else{
        document.formRequest.total_stok.value = (output);
      }
    }
    else {
      if(stock_aux == ""){
        document.formRequest.total_stok.value = "";
      }else{
        document.formRequest.total_stok.value = (entry);
      }
    }
  }
</script>

<?php  

if ($_GET['form']=='add') { ?>
    <section class="content-header">
      <h1>
      <i class="fa fa-edit icon-title"></i> Inventory input / output data
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
        <li><a href="?module=product_stock"> Product Sotck </a></li>
        <li class="active"> Add </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" class="form-horizontal" action="Module/product/proses.php?act=updateStock" method="POST" name="formRequest">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="fecha_a" autocomplete="off" value="<?php echo date("m/d/Y"); ?>" readonly>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-5">
                    <select class="chosen-select" name="id_product" id="id_product" autocomplete="off" onchange="product_data(this)" required>
                      <option value="">-- SELECT --</option>
                      <?php
                        $query = mysqli_query($mysqli, "SELECT IDProducto,NombreProducto
                          FROM producto ORDER BY NombreProducto ASC")
                          or die('error: '.mysqli_error($mysqli));
                          
                          if (mysqli_affected_rows($mysqli) != 0) {
                            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                              echo "<option value=" .$row['IDProducto'] . ">" .$row['NombreProducto'] . "</option>";
                            }
                          }
                      ?>
                    </select>
                  </div>
                </div>
                        
                <span id='stok'>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Stock</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="stok" name="stock" readonly required>
                  </div>
                </div>
                </span>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Quantity</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="qty_aux" name="quantity" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="data_stock(this)&data_empty(this)" required>
                  </div>
                </div>
                        
                <div class="form-group">
                  <label class="col-sm-2 control-label">Transaction</label>
                    <div class="col-sm-5">
                      <select name="option" id="option" required class='form-control' onchange="data_stock();">
                        <option value="entry">Entry</option>
                        <option value="output">Output</option>                        
                      </select>
                    </div>
                </div>
                        
                <div class="form-group">
                  <label class="col-sm-2 control-label">Total Stock</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="total_stok" name="total_stock" readonly required>
                  </div>
                </div>
                <br>
              </div><!-- /.box body -->

              <div class="box-footer">
              <br>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=product_stock" class="btn btn-default btn-reset">Cancel</a>
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