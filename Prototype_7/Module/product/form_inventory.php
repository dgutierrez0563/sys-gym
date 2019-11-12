<section class="content-header">
    <h1>
      <i class="glyphicon glyphicon-file"></i> Inventory Report
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
      <li class="active"> Report</li>
      <li class="active"> Inventory </li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">      
      <div class="box box-primary">
        <div class="box-body">
        <!-- form start -->
          <form role="form" class="form-horizontal" action="Module/product/print_inventory.php" target="_blank">
          <br>
          <div class="panel panel-info">
              <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-list-alt'></i> General inventory report</h4>
              </div>
              <div class="panel-body">                
              <br>
                  <div class="form-group">
                    <div class="col-sm-12">
                    <div class='alert alert-success alert-dismissable'>
                      <h4><i class='icon glyphicon glyphicon-alert'></i> Alert!</h4>
                      <p>The system will make an impression of the inventory below, where it will include all available products in a PDF file.</p>
                      <p>Please, press print to continue.</p>
                    </div>                      
                    </div>
                  </div>
              </div>
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
          </form>
        </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->