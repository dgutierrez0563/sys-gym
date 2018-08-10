<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Prototype SGY</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="System Gym">
    <meta name="author" content="wsullivan" />

    <!-- favicon -->
    <link rel="shortcut icon" href="Content/assets/img/corredor-ico.svg" />

    <!-- Bootstrap 3.3.2 -->
    <link href="Content/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="Content/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="Content/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="Content/assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="Content/assets/css/style.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page bg-login">
    <div class="login-box">
      <div style="color:#0480C8;" class="login-logo">
        <img style="margin-top:-10px" src="Content/assets/img/corredor.svg" alt="Logo" height="80" height="150" ><b>SYSGYM</b>
      </div><!-- /.login-logo -->
      <?php  
 
      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
               Incorrect username or password, please check.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Success!!</h4>
              Closed session successfully.
              </div>";
      }elseif ($_GET['alert'] == 3) {
        # code...
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
               Expired session.
              </div>";        
      }
      elseif ($_GET['alert'] == 4) {
        # code...
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Conection Error!</h4>
               Existing problems with the conection to the server .
              </div>";        
      }
      ?>

      <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Please Log In</p>
        <br/>
        <form action="Config/login-check.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usernameC" placeholder="Username" autocomplete="off"  />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="passwordC" placeholder="Password"  />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <br/>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Lon In" />
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.3 -->
    <script src="Content/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="Content/assets/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>