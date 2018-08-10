<?php

if (isset($_GET['id'])) {

  $id_plan = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT plan.IDPlan,plan.NombrePlan,plan.CantidadDias,plan.Costo,
                                  plan.Detalle,plan.Estado,plan.updated_user,plan.updated_at,usuario.IDUsuario,
                                  usuario.NombreUsuario
                                  FROM plan,usuario WHERE IDPlan='$id_plan' AND plan.updated_user=usuario.IDUsuario") 
                                  or die('error '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
}
?>

<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Plan Detail
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"> Plan Detail</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal"  enctype="multipart/form-data">
          <div class="box-body">      
            
            <div class="form-group">
            <label style="font-size:25px;margin-top:10px;" class="col-sm-8">Type of plan: <?php echo $data['NombrePlan']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Days</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['CantidadDias']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Rate</label>
              <label style="text-align:left" class="col-sm-8 control-label">: ₡ <?php echo number_format($data['Costo'],2); ?></label>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Estado']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Detail</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Detalle']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Updated by</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreUsuario']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Updated</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['updated_at']; ?></label>
            </div>            
          </div><!-- /.box body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">                
                <a href="?module=plan" class="btn btn-primary">Return to List</a>
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->