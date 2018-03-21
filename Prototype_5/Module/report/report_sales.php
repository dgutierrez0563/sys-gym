<section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Sales report by date
    </h1>
    <ol class="breadcrumb">
    	<li><a href="?module=berenda"><i class="fa fa-home"></i> Home </a></li>
    	<li class="active"> Report</li>
	    <li class="active"> Sales by date </li>
 	</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">      
      <div class="box box-primary">
      	<div class="box-body">
        <!-- form start -->
	        <form role="form" class="form-horizontal" method="GET" action="Module/report/print_sales.php" target="_blank">
	        <br>
			    <div class="panel panel-info">
			      	<div class="panel-heading">
						<h4><i class='glyphicon glyphicon-search'></i> Select dates please</h4>
			      	</div>
			      	<div class="panel-body">			          
			        <br>
			            <div class="form-group">
			              <label for="date_initial" class="col-md-1 control-label">Date from</label>
			              <div class="col-sm-2">
			                <input type="date" class="form-control" name="date_initial" autocomplete="off" required>
			              </div>
			              <label for="date_final" class="col-md-1 control-label">Date to</label>
			              <div class="col-sm-2">
			                <input style="margin-left:-15px" type="date" class="form-control" name="date_final" autocomplete="off" required>
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
		                  		<i class="fa fa-print"></i> Print
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