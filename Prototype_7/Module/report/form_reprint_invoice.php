<section class="content-header">
    <h1>
      <i class="fa fa-search icon-title"></i> Reimprimir Factura
    </h1>
    <ol class="breadcrumb">
    	<li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
    	<li class="active"> Reporte</li>
	    <!-- <li class="active"> Invoice </li> -->
 	</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">      
      <div class="box box-primary">
      	<div class="box-body">
	        <form role="form" class="form-horizontal" method="GET" action="Module/report/report_invoice.php" enctype="multipart/form-data" target="_blank">
	        <br>
			    <div class="panel panel-info">
			      	<div class="panel-heading">
						<h4><i class='glyphicon glyphicon-document'></i> Buscar Factura</h4>
			      	</div>
			      	<div class="panel-body">			          
			        <br>
			            <div class="form-group">
			              <label for="id_invoice" class="col-md-2 control-label">No. Factura</label>
			              <div class="col-sm-2">
			                <input type="text" class="form-control" id="id_invoice" name="id_invoice" maxlength="15" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
			              </div>
			            </div>
			        </div>
			        <br>
			    </div>
	          	<br>
	          	<div class="box-footer">
	          		<br>
	            	<div class="form-group">
		              	<div class="col-sm-offset-1 col-sm-11">
		                	<button type="submit" class="btn btn-primary btn-social btn-submit" data-toggle="tooltip" data-placement="top" title="Print Report" style="width: 120px;">
		                  		<i class="fa fa-print"></i> Imprimir
		                	</button>
		              </div>
	            	</div>
	          	</div>
	          	<br>
	        </form>
      	</div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->