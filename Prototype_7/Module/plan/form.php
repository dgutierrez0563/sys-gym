<?php  
if ($_SESSION['Role'] == 'Admin'){
  if ($_GET['form']=='add') { ?>

    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Add Plan
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="?module=plan"> Plan </a></li>
        <li class="active"> Add </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" class="form-horizontal" method="POST" action="Module/plan/proses.php?act=insert" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Name Plan</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nameplan" name="nameplan" autocomplete="off" required>
                  </div>
                </div>

                <div id="result_for_plan"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Days</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="days" autocomplete="off" maxlength="2" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Rate</label>
                  <div class="col-sm-5">
                    <div class="input-group">
                      <span class="input-group-addon">$.</span>
                      <input type="text" class="form-control" id="rate" name="rate" maxlength="10" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                    </div>
                  </div>
                </div>              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Detail</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="detail" autocomplete="off">
                  </div>
                </div>
                <br>
              </div><!-- /.box body -->

              <div class="box-footer">
              <br>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=plan" class="btn btn-default btn-reset">Cancel</a>
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

        $query = mysqli_query($mysqli, "SELECT * FROM plan WHERE IDPlan='$_GET[id]'") 
                                        or die('error: '.mysqli_error($mysqli));
        $data  = mysqli_fetch_assoc($query);
    	}	
  ?>

    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Modify Plan Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="?module=plan"> Plan </a></li>
        <li class="active"> Modify </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" class="form-horizontal" method="POST" action="Module/plan/proses.php?act=update" enctype="multipart/form-data">
              <div class="box-body">
                
                <input type="hidden" name="id_plan" value="<?php echo $data['IDPlan']; ?>">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Name Plan</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nameplan" autocomplete="off" value="<?php echo $data['NombrePlan']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Days</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="days" autocomplete="off" maxlength="2" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['CantidadDias']; ?>" required>
                  </div>
                </div>              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Rate</label>
                  <div class="col-sm-5">
                    <div class="input-group">
                      <span class="input-group-addon">$.</span>
                      <input type="text" class="form-control" id="rate" name="rate" maxlength="10" autocomplete="off" onKeyPress="return filterFloat(event,this)" value="<?php echo $data['Costo']; ?>" required>
                    </div>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">Detail</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="detail" autocomplete="off" value="<?php echo $data['Detalle']; ?>">
                  </div>
                </div>
                <br>
              </div><!-- /.box body -->

              <div class="box-footer">
              <br>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=plan" class="btn btn-default btn-reset">Cancel</a>
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
}elseif ($_SESSION['Role'] == 'User') {
  if ($_GET['form']=='add') { ?>

      <section class="content-header">
        <h1>
          <i class="fa fa-edit icon-title"></i> Add Plan
        </h1>
        <ol class="breadcrumb">
          <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
          <li><a href="?module=plan"> Plan </a></li>
          <li class="active"> Add </li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <!-- form start -->
              <form role="form" class="form-horizontal" method="POST" action="Module/plan/proses.php?act=insert" enctype="multipart/form-data">
                <div class="box-body">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name Plan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="nameplan" name="nameplan" autocomplete="off" required>
                    </div>
                  </div>

                  <div id="result_for_plan"></div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Days</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="days" autocomplete="off" maxlength="2" onKeyPress="return goodchars(event,'0123456789',this)" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Rate</label>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <span class="input-group-addon">$.</span>
                        <input type="text" class="form-control" id="rate" name="rate" maxlength="10" autocomplete="off" onKeyPress="return filterFloat(event,this)" required>
                      </div>
                    </div>
                  </div>              

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Detail</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="detail" autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div><!-- /.box body -->

                <div class="box-footer">
                <br>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                      <a href="?module=plan" class="btn btn-default btn-reset">Cancel</a>
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
}
?>