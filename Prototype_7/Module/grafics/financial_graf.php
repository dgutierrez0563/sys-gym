<?php
    
  $meses = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  for($x=1;$x<=12;$x=$x+1){
    $ingreso[$x]=0;
    $gasto[$x]=0;
    $ingreso_pen[$x]=0;
    $gasto_pen[$x]=0;
    $diferencia[$x]=0;
  }
  $year=date('Y');
  $query_ingreso=mysqli_query($mysqli,"SELECT factura.FechaFactura AS fFactura,factura.TotalVenta FROM factura");
  $query_gasto=mysqli_query($mysqli,"SELECT cuentaGastos.FechaFactura AS fGasto, cuentaGastos.Monto FROM cuentaGastos");
  while($row=mysqli_fetch_array($query_ingreso)){
    $y=date("Y", strtotime($row['fFactura']));
    $mes=(int)date("m", strtotime($row['fFactura']));
    if($y==$year){
      $ingreso[$mes]=($ingreso[$mes]+$row['TotalVenta']);
    }
  }
  while($row2=mysqli_fetch_array($query_gasto)){
    $y2=date("Y",strtotime($row2['fGasto']));
    $mes2=(int)date("m", strtotime($row2['fGasto']));
    if($y2==$year){
      $gasto[$mes2]=($gasto[$mes2]+$row2['Monto']);
    //  $diferencia=
    }
  }

  $query_ingreso_pen=mysqli_query($mysqli,"SELECT FechaFactura AS fIngreso_pen,TotalVenta, EstadoFactura FROM factura WHERE EstadoFactura='Pending'");
  $query_gasto_pen=mysqli_query($mysqli,"SELECT FechaFactura AS fGasto_pen,Monto,EstadoFactura FROM cuentaGastos WHERE EstadoFactura='Credit'");

  while ($row3=mysqli_fetch_array($query_ingreso_pen)) {
    $y3=date("Y",strtotime($row3['fIngreso_pen']));
    $mes3=(int)date("m", strtotime($row3['fIngreso_pen']));
    if ($y3==$year) {
      $ingreso_pen[$mes3]=($ingreso_pen[$mes3]+$row3['TotalVenta']);
    }
  }
  while ($row4=mysqli_fetch_array($query_gasto_pen)) {
    $y4=date("Y",strtotime($row4['fGasto_pen']));
    $mes4=(int)date("m",strtotime($row4['fGasto_pen']));
    if ($y4==$year) {
      $gasto_pen[$mes4]=($gasto_pen[$mes4]+$row4['Monto']);
    }
  }
?>
<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-th-list"></i> Financial Charts and Tables
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
    <li class="active"> Stats </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
    	<div class="box box-primary">
    		<div class="box-body">
          <div class="form-group">
  				  <!-- <div id="chart_div" style="height: 400px; max-width: 1200px; margin: 0px auto;"></div> -->
            <div id="chart_div" style="height: auto;width: 100%; margin: auto;"></div>
          </div>
          <hr style="border-color: #B8B8B8;">
          <div class="form-group">
            <div id="chart_div2" style="height: auto; width: 100%; margin: auto;"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group" style="text-align:center" >
      <div class="col-lg-12">
          <div class="panel panel-info">
              <div class="panel-heading" align="left">
                  Sales Trends
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <div class="table-responsive">
                      <table id="dataTables1" class="table">
                          <thead>
                              <tr style="background: #D2D2D2;">
                                  <th>#</th>
                                  <th>Product</th>
                                  <th class="center">Quantity</th>
                                  <th class="center">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                            $no = 1;
                            $query = mysqli_query($mysqli,"SELECT factura.IDFactura, 
                              SUM(factura.TotalVenta) AS fTotal,factura.Tipo,
                              detalleFactura.IDDetalle,detalleFactura.IDFactura,
                              detalleFactura.IDProducto,
                              SUM(detalleFactura.Cantidad) AS sumatoria,
                              SUM(detalleFactura.PrecioVenta) 
                              AS dTotal,producto.IDProducto,producto.NombreProducto 
                              FROM factura, detalleFactura,producto
                              WHERE factura.IDFactura=detalleFactura.IDFactura
                              AND detalleFactura.IDProducto=producto.IDProducto GROUP BY producto.NombreProducto ORDER BY SUM(detalleFactura.Cantidad) DESC");

                            while ($data = mysqli_fetch_assoc($query)) {
                          ?>
                              <tr>
                                  <td><?php echo $no;?></td>
                                  <td align="left"><?php echo $data['NombreProducto']?></td>
                                  <td class="center"><?php echo $data['sumatoria']?></td>
                                  <td><?php echo "₡ ".number_format($data['dTotal'],2); ?></td>
                              </tr>
                            <?php
                              $no++;
                            } 
                            ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-6 -->
    </div>
  </div>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Mes', 'Total Revenue','Total Expenses'],
    <?php
      for($x=1;$x<=12;$x=$x+1){ 
    ?>
        ['<?php echo $meses[$x]; ?>',  <?php echo $ingreso[$x];?>,<?php echo $gasto[$x];?>],
    <?php } ?>
      ]);

      var options = {
        title: 'Monetary Movement 1 - Total Expenses and Income',
        hAxis: {title: 'Annual Financial Chart', titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Mes', 'Receivables','Expenses Per Pay'],
    <?php
      for($x=1;$x<=12;$x=$x+1){ 
    ?>
        ['<?php echo $meses[$x]; ?>',  <?php echo $ingreso_pen[$x];?>,<?php echo $gasto_pen[$x];?>],
    <?php } ?>
      ]);

      var options = {
        title: 'Monetary Movement 2 - Pending Expenses and Income ',
        hAxis: {title: 'Annual Financial Chart', titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
      chart.draw(data, options);
    }
  </script>
</section><!-- /.content -->