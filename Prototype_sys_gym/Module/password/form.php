<section class="content-header">
  <h1>
    <i class="fa fa-lock icon-title"></i> Reset Password
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Password</li>
    <li class="active">Modify</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
  
    if (empty($_GET['alert'])) {
      echo "";
    } 
      
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
              The new passwords do not match.
            </div>";
    }
 
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exitp!</h4>
              Password changed successfully.
            </div>";
    }
    ?>


      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="POST" action="Module/password/proses.php?act=reset">
          <div class="box-body">
          <br>
            <div class="form-group">
              <label class="col-sm-2 control-label">User</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_user" data-placeholder=" -- SELECT -- " autocomplete="off"  required>
                  <option value=""></option>
                  <?php
                    $query = mysqli_query($mysqli, "SELECT IDUsuario,NombreUsuario FROM usuario 
                      ORDER BY NombreUsuario") or die('error: '.mysqli_error($mysqli));
                    if (mysqli_affected_rows($mysqli) != 0) {
                      while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        echo "<option value=" .$row['IDUsuario'] . ">" .$row['NombreUsuario']. "</option>";
                      }
                    }
                  ?>    
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">New password</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="new_pass" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Repeat password</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="retype_pass" autocomplete="off" required>
              </div>
            </div>
            <br>
          </div><!-- /.box-body -->
          
          <div class="box-footer bg-btn-action">
          <br>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                <a href="?module=start" class="btn btn-default btn-reset">Cancel</a>
              </div>
            </div>
            <br>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->