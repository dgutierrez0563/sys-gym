<?php  
if ($_SESSION['Role']=='Admin') {
  if ($_GET['form']=='add') { ?>

    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Agregar Cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="?module=customer"> Cliente </a></li>
        <li class="active"> Nuevo </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" class="form-horizontal" method="POST" action="Module/customer/proses.php?act=insert" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Identificacion</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="identification" name="identification" maxlength="15" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>

                <div id="resultado"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombre Completo</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="fullname" maxlength="50" autocomplete="off" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="email" name="email" maxlength="50" onKeyUp="javascript:validateEmail('email')" autocomplete="off" required>
                    <div><h5 id="emailStatus" style="font-weight: bold;vertical-align: middle;" class="text-danger"></h5></div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="birthdate" autocomplete="off" required>
                  </div>              
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Direccion</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="address" maxlength="50" autocomplete="off" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Genero</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="sex" autocomplete="off" required>
                      <option value=""> -- SELECT -- </option>
                      <option value="Femenino">Femenino</option>
                      <option value="Masculino">Masculino</option>
                    </select>
                  </div>
                </div>            

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono 1</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone1" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)">
                  </div>
                </div>             

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono 2</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone2" maxlength="20" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nacionalidad</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nationality" maxlength="30" autocomplete="off" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Facebook Cuenta</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="facebookaccount" maxlength="30" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Twitter Cuenta</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="twitteraccount" maxlength="30" autocomplete="off">
                  </div>
                </div>
              </div><!-- /.box body -->

              <div class="box-footer">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=customer" class="btn btn-default btn-reset">Cancelar</a>
                  </div>
                </div>
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

        $query = mysqli_query($mysqli, "SELECT * FROM cliente WHERE IDCliente='$_GET[id]'") 
                                        or die('error: '.mysqli_error($mysqli));
        $data  = mysqli_fetch_assoc($query);
      } 
  ?>

    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Modificar Cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="?module=customer"> Cliente </a></li>
        <li class="active"> Edicion </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" class="form-horizontal" method="POST" action="Module/customer/proses.php?act=update" enctype="multipart/form-data">
              <div class="box-body">
                
                <input type="hidden" name="id_customer" value="<?php echo $data['IDCliente']; ?>">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Identificacion</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="identification" name="identification" autocomplete="off" maxlength="15" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Cedula']; ?>" required>
                  </div>
                </div>
                
                <div id="resultado"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombre Completo</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="fullname" maxlength="50" autocomplete="off" value="<?php echo $data['NombreCompleto']; ?>" required>
                  </div>
                </div>              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="email" name="email" maxlength="50" autocomplete="off" value="<?php echo $data['Correo']; ?>" onKeyUp="javascript:validateEmail('email')" required>
                    <div><h5 id="emailStatus" style="font-weight: bold;vertical-align: middle;" class="text-danger"></h5></div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="birthdate" autocomplete="off" value="<?php echo $data['FechaNacimiento'] ?>" required>                  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Direccion</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="address" maxlength="50" autocomplete="off" value="<?php echo $data['Direccion']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Genero</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="sex" autocomplete="off" required>
                      <option value=""> -- SELECT -- </option>
                      <option value="Femenino">Femenino</option>
                      <option value="Masculino">Masculino</option>
                    </select>
                  </div>
                </div>          

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono 1</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone1" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono1']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono 2</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone2" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['Telefono2']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nacionalidad</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nationality" maxlength="20" autocomplete="off" value="<?php echo $data['Nacionalidad']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Facebook Cuenta</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="facebookaccount" maxlength="30" autocomplete="off" value="<?php echo $data['Facebook']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Twitter Cuenta</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="twitteraccount" maxlength="30" autocomplete="off" value="<?php echo $data['Twitter']; ?>">
                  </div>
                </div>              
              </div><!-- /.box body -->

              <div class="box-footer">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=customer" class="btn btn-default btn-reset">Cancelar</a>
                  </div>
                </div>
              </div><!-- /.box footer -->
            </form>
          </div><!-- /.box -->
        </div><!--/.col -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
  <?php
    }
}
elseif ($_SESSION['Role']=='User') {
  if ($_GET['form']=='add') { ?>

    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Agregar Cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="?module=customer"> Cliente </a></li>
        <li class="active"> Nuevo </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" class="form-horizontal" method="POST" action="Module/customer/proses.php?act=insert" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Identificacion</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="identification" name="identification" maxlength="15" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>

                <div id="resultado"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombre Completo</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="fullname" maxlength="50" autocomplete="off" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="email" name="email" maxlength="50" onKeyUp="javascript:validateEmail('email')" autocomplete="off" required>
                    <div><h5 id="emailStatus" style="font-weight: bold;vertical-align: middle;" class="text-danger"></h5></div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="birthdate" autocomplete="off" required>
                  </div>              
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Direccion</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="address" maxlength="50" autocomplete="off" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Genero</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="sex" autocomplete="off" required>
                      <option value=""> -- SELECT -- </option>
                      <option value="Femenino">Femenino</option>
                      <option value="Masculino">Masculino</option>
                    </select>
                  </div>
                </div>            

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono 1</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone1" autocomplete="off" maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)">
                  </div>
                </div>             

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono 2</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone2" maxlength="20" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nacionalidad</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nationality" maxlength="30" autocomplete="off" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Facebook Cuenta</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="facebookaccount" maxlength="30" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Twitter Cuenta</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="twitteraccount" maxlength="30" autocomplete="off">
                  </div>
                </div>
              </div><!-- /.box body -->

              <div class="box-footer">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Save">
                    <a href="?module=customer" class="btn btn-default btn-reset">Cancelar</a>
                  </div>
                </div>
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