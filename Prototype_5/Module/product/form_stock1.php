
<script type="text/javascript">

  function product_data(input){
    var num = input.value;

    $.post("Module/product/product_stock.php", {
    dataproduct: num,
    }, function(response) {
      $('#stok').html(response)
      document.getElementById('jumlah_masuk').focus();
    });
  }
  function cek_jumlah_masuk(input) {

    jml = document.formObatMasuk.jumlah_masuk.value;
    var jumlah = eval(jml);

    if(jumlah < 1){
      alert('Jumlah Masuk Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }
  function hitung_total_stok() {

    bil1 = document.formObatMasuk.stok.value;
    bil2 = document.formObatMasuk.jumlah_masuk.value;
    tt = document.formObatMasuk.option.value;
      
    if (bil2 == "") {
      var hasil = "";
      var salida = "";
    }
    else {
      var salida = eval(bil1) - eval(bil2);
      var hasil = eval(bil1) + eval(bil2);
    }
    if (tt=="output"){
      document.formObatMasuk.total_stok.value = (salida);
    }
    else {
      document.formObatMasuk.total_stok.value = (hasil);
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
            <form role="form" class="form-horizontal" action="Module/product/proses.php?act=updateStock" method="POST" name="formObatMasuk">
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
                    <input type="text" class="form-control" id="jumlah_masuk" name="num" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_masuk(this)" required>
                  </div>
                </div>
                        
                <div class="form-group">
                  <label class="col-sm-2 control-label">Transaction</label>
                    <div class="col-sm-5">
                      <select name="option" id="option" required class='form-control' onchange="hitung_total_stok();">
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
              </div><!-- /.box body -->

              <div class="box-footer">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=product_stock" class="btn btn-default btn-reset">Cancel</a>
                  </div>
                </div>
              </div><!-- /.box footer -->
            </form>
          </div><!-- /.box -->
        </div><!--/.col -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
<?php
}
?>