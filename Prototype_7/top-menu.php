<?php
require_once "Config/database.php";
  
  $query = mysqli_query($mysqli, "SELECT IDUsuario, NombreUsuario, Foto, Role,NombreCompleto FROM usuario
  WHERE IDUsuario='$_SESSION[IDUsuario]'");

  $data = mysqli_fetch_assoc($query);

?>
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 
  <?php  
  if ($data['Foto']=="") { ?>
    <img src="Content/images/user/user-default.png" class="user-image" alt="User Image"/>
  <?php
  }
  else { ?>
    <img src="Content/images/user/<?php echo $data['Foto']; ?>" class="user-image" alt="User Image"/>
  <?php
  }
  ?>
    <span class="hidden-xs"><?php echo $data['NombreCompleto']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">
    <li class="user-header">
      <?php  
      if ($data['Foto']=="") { ?>
        <img src="Content/images/user/user-default.png" class="img-circle" alt="User Image"/>
      <?php
      }
      else { ?>
        <img src="Content/images/user/<?php echo $data['Foto']; ?>" class="img-circle" alt="User Image"/>
      <?php
      }
      ?>
      <p>
        <?php echo $data['NombreCompleto']; ?>
        <small><?php echo $data['Role']; ?></small>
      </p>
    </li>    
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=profileUserOn" class="btn btn-info btn-flat">Perfil</a>
      </div>
      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-warning btn-flat">Logout</a>
      </div>
    </li>
  </ul>
</li>