<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Management of Users

<!--     <a class="btn btn-primary btn-social pull-right" href="?module=form_user&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Add User
    </a> -->
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    	<div class="box box-primary">
    		<div class="box-body">
			<!-- 	<div id="container" style="height: 400px; max-width: 1200px; margin: 0px auto;"></div> -->
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
			<br>
      	</div>
    </div>
    <script type="text/javascript">
    <?php  
      require_once "../../Config/database.php";
    ?>

      Highcharts.chart('container', {
          chart: {
              type: 'line'
          },
          title: {
              text: 'Monthly Average Temperature'
          },
          subtitle: {
              text: 'Source: WorldClimate.com'
          },
          xAxis: {
              categories: [
              <?php
                $query = mysqli_query($mysqli,"SELECT FechaFactura FROM factura LIMIT 10");

                while($row = mysqli_fetch_array($query)){?>                  
                  '<?php echo $row["FechaFactura"]; ?>'
                <?php
                }
              ?>
              ]
          },
          yAxis: {
              title: {
                  text: 'Date'
              }
          },
          tooltip:{
            valueSuffix:'C'
          },
          plotOptions: {
              line: {
                  dataLabels: {
                      enabled: true
                  },
                  enableMouseTracking: false
              }
          },
          series: [{
              name: 'Total',
              data: [
              <?php
                $query = mysqli_query($mysqli,"SELECT TotalVenta FROM factura LIMIT 10");

                while($row = mysqli_fetch_array($query)){?>
                  <?php echo $total= number_format($row["total"]) ;?>
                <?php
                }
              ?>
              ]
          }]
      });

      // Highcharts.chart('container', {

      //     title: {
      //         text: 'Solar Employment Growth by Sector, 2010-2016'
      //     },

      //     subtitle: {
      //         text: 'Source: thesolarfoundation.com'
      //     },

      //     yAxis: {
      //         title: {
      //             text: 'Date'
      //         },
      //         plotLines:[{
      //           value:0,
      //           width:1,
      //           color:'#808080'
      //         }]
      //     },
      //     legend: {
      //         layout: 'vertical',
      //         align: 'right',
      //         verticalAlign: 'middle',
      //         borderWidth:0.1
      //     },
      //     xAxis:{
      //       categories:[
      //         <?php
      //           $query = mysqli_query($mysqli,"SELECT FechaFactura FROM factura LIMIT 10");

      //           while($row = mysqli_fetch_array($query)){?>
      //             //'<?php $date_aux//=date_create($row["FechaFactura"]); $date=date_format($date_aux,"m-d"); echo $date;?>'
      //             '<?php //echo $row["FechaFactura"]?>'
      //           <?php
      //           }
      //         ?>
      //       ]
      //     },
      //     tooltip:{
      //       valueSuffix:''
      //     },

      //     plotOptions: {
      //         series: {
      //             label: {
      //                 connectorAllowed: false
      //             },
      //             pointStart: 2010
      //         }
      //     },

      //     series: [{
      //         name: 'Cantidad',
      //         data: [
      //         <?php
      //           $query = mysqli_query($mysqli,"SELECT SUM(TotalVenta) AS total FROM factura GROUP BY FechaFactura LIMIT 10");

      //           while($row = mysqli_fetch_array($query)){?>
      //             <?php //echo $total= number_format($row['total']) ;?>
      //           <?php
      //           }
      //         ?>
      //         ]
      //     }],

      //     responsive: {
      //         rules: [{
      //             condition: {
      //                 maxWidth: 500
      //             },
      //             chartOptions: {
      //                 legend: {
      //                     layout: 'horizontal',
      //                     align: 'center',
      //                     verticalAlign: 'bottom'
      //                 }
      //             }
      //         }]
      //     }

      // });
    </script>
</section><!-- /.content -->