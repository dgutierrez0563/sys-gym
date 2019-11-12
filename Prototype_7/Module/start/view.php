
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-home icon-title"></i> Home
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Home</a></li>
  </ol>
</section>
  
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Welcome <strong><?php echo $_SESSION['NombreCompleto']; ?></strong> to The Gym Management App.
        </p>
      </div>
    </div>  
  </div>
  
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- Samll boxes -->
    <div class="responsive">
    <div class="col-lg-3 col-xs-6">
      <div style="background-color: #00B160;color: #fff;" class="small-box">
        <div class="inner">        
          <?php
            $date = date('Y-m-d');
            $query = mysqli_query($mysqli,"SELECT SUM(TotalVenta) AS total,FechaFactura FROM factura
                                            WHERE FechaFactura='$date'")
                                          or die('error '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            $amount = number_format($data['total'],2);
          ?>
          <h3>
            <?php
            if ($amount == 0) {
                echo "₡ 0.00";
              } else {
                echo "₡ ". $amount;
              }                
            ?>
          </h3>
          <p style="font-size: 18px;"><strong><span class="glyphicon glyphicon-chevron-right"></span> Ventas hoy </strong></p>
        </div><br>
        <div class="icon" align="right">
          <span class="glyphicon glyphicon-usd" valign="middle" align="right" style="font-size: 60px;"></span>
        </div>
        <a class="small-box-footer" data-toggle="tooltip" title="Today's Sales"><i class="glyphicon glyphicon-eye-close"></i></a>
      </div>
    </div>
    <!-- Samll boxes -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color: #FEAA23;color: #fff;" class="small-box">
        <div class="inner">
        <br><br>
        <h3></h3>
          <p style="font-size: 18px;"><strong><span class="glyphicon glyphicon-chevron-right"></span> Estadistica </strong></p>
        </div>
        <br>
        <div class="icon" align="right">
          <span class="glyphicon glyphicon-list-alt" valign="middle" align="right" style="font-size: 60px;"></span>
        </div>
        <a class="small-box-footer" data-toggle="tooltip" title="See Graphics" href="?module=financiero"><i class="glyphicon glyphicon-eye-open"></i></a> 
      </div>
    </div>
    <!-- Samll boxes -->
<!--     <div class="col-lg-3 col-xs-6">
      <div style="background-color: #EA4A36;color: #fff;" class="small-box">
        <div class="inner">
        <br><br>
        <h3></h3>
          <p style="font-size: 18px;"><strong><span class="glyphicon glyphicon-chevron-right"></span></strong></p>
        </div>
        <br>
        <div class="icon" align="right">
          <span class="glyphicon glyphicon-list-alt" valign="middle" align="right" style="font-size: 60px;"></span>
        </div>
        <a class="small-box-footer" data-toggle="tooltip" title="" href=""><i class="glyphicon glyphicon-eye-open"></i></a> 
      </div>
    </div> -->
    <!-- Samll boxes -->
    <div class="col-lg-3 col-xs-6">
      <div style="background-color: #00c0ef;color: #fff;" class="small-box">
        <div class="inner">
        <br><br>
        <h3></h3>
          <p style="font-size: 18px;"><strong><span class="glyphicon glyphicon-chevron-right"></span> Nueva Factura </strong></p>
        </div>
        <br>
        <div class="icon" align="right">
          <span class="glyphicon glyphicon-shopping-cart" valign="middle" align="right" style="font-size: 60px;"></span>
        </div>
        <a class="small-box-footer" data-toggle="tooltip" title="New Invoice" href="?module=form_new&form=add"><i class="glyphicon glyphicon-plus"></i></a> 
      </div>
    </div>
  </div>
  </div>
</section><!-- /.content -->