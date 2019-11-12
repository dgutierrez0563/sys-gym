<?php  

if (empty($_GET['alert'])) {
  echo "";
} elseif ($_GET['alert'] == 1) {
  echo "<div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
            There in not enough inventory of the product.
        </div>";
} elseif ($_GET['alert'] == 2) {
  echo "<div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
            NULL.
        </div>";
} elseif ($_GET['alert'] == 3) {
  echo "<div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
            No puede facturar, bolsa vacia.
        </div>";
}

//if ($_SESSION['Role']=='Admin') {

  if (($_GET['form']=='add')) { ?>
    <?php
      $query = mysqli_query($mysqli, "SELECT IDUsuario,NombreUsuario FROM usuario
      WHERE IDUsuario='$_SESSION[IDUsuario]'") or die('error: '.mysqli_error($mysqli));
      $dataUser  = mysqli_fetch_assoc($query);
    ?>
    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Add Invoice
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="?module=invoice"> Invoice </a></li>
        <li class="active"> Add </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <form role="form" class="form-horizontal" method="POST" action="Module/invoice/print2.php" enctype="multipart/form-data" target="_blank">

              <div class="box-body">            
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4><i class='glyphicon glyphicon-edit'></i> New Invoice</h4>
                  </div>
                </div>
                
                <div class="panel-body"> 
                  <div class="form-group row">
                      <label for="id_customer" class="col-md-1 control-label">Identification:</label>
                      <div class="col-sm-6">
                        <select class="chosen-select chosen-m" required name="id_customer" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" >
                          <option value=""></option>
                          <?php
                            $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula,NombreCompleto,Correo FROM cliente
                              WHERE Estado='Enabled' ORDER BY cedula") or die('error: '.mysqli_error($mysqli));
                            if (mysqli_affected_rows($mysqli) != 0) {
                              while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                echo "<option value=" .$id_aux=$row['IDCliente'] . ">" .$row['Cedula']." | ". $row['NombreCompleto']. "</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="id_user" class="col-md-1 control-label">Sale by:</label>
                    <div class="col-sm-3">
                      <input style="display: none;" type="text" class="form-control" name="id_user" value="<?php echo $data['IDUsuario']; ?>" readonly>
                      <input type="text" class="form-control" value="<?php echo $data['NombreUsuario']; ?>" readonly>
                    </div>
                    <label for="date" class="col-md-1 control-label">Date:</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="date" value="<?php echo date("m-d-Y"); ?>" readonly >
                    </div>
                    <label for="condition" class="col-md-1 control-label">Pay by:</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="condition">
                      <?php  
                        if ($_SESSION['Role'] == 'Admin') { ?>
                          <option value="Cash">Cash</option>
                          <option value="Credit">Credit</option>
                        <?php
                        }elseif ($_SESSION['Role'] == 'User'){ ?>
                          <option value="Cash" readonly>Cash</option>                        
                        <?php
                        }
                      ?>
                      </select>
                    </div>
                  </div>            
              
                  <div class="col-md-12">
                    <div class="pull-right">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-placement="left" title="Add Products">
                       <span class="glyphicon glyphicon-plus"></span> Add Products
                      </button>

                      <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Finish">
                        <span class="glyphicon glyphicon-print"></span> Print
                      </button>

                      <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View List" onclick="showBag('<?php echo 1; ?>')">
                      <span class="glyphicon glyphicon-shopping-cart"></span> In bag
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Clean Bag" onclick="clearBag()">
                      <span class="glyphicon glyphicon-trash"></span> Clear Bag
                      </button>
                    </div>  
                  </div>
                </div>
              </div>
            </form>

            <div id="resultados"></div>          
      
            <!-- Modal -->
            <!-- <div class=" box-body"> -->
            <div class="modal fade bs-example-modal-lg " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" id="myModalLabel"><strong>Search products</strong></h3>
                  </div>
                  <div class="modal-body">

                    <form class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                        </div>
                        <button type="button" class="btn btn-success" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Search</button>
                      </div>
                    </form>
                    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
                    
                    <div class='outer_div'></div><!-- Carga los datos ajax -->
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>  
                  </div>
                </div>
              </div>
            </div>
            <!-- </div> -->
          </div><!-- /.box -->
        </div><!--/.col -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
  <?php
  } elseif($_GET['form'] == 'edit') { ?>
  <?php
    $query = mysqli_query($mysqli, "SELECT IDUsuario,NombreUsuario FROM usuario
      WHERE IDUsuario='$_SESSION[IDUsuario]'") or die('error: '.mysqli_error($mysqli));
      $dataUser  = mysqli_fetch_assoc($query);

    if (isset($_GET['id'])) {
      $query_invoice = mysqli_query($mysqli,"SELECT IDFactura, FechaFactura,IDCliente,Condicion,TotalVenta,EstadoFactura
            FROM factura WHERE IDFactura='$_GET[id]'") or die('error: '.mysqli_error($mysqli));
      $data = mysqli_fetch_assoc($query_invoice);
    }    
  ?>
    <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title"></i> Edit Invoice
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="?module=invoice"> Invoice </a></li>
        <li class="active"> Edit </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <form role="form" class="form-horizontal" method="POST" action="Module/invoice/print_invoice_e.php" enctype="multipart/form-data" target="_blank">

              <div class="box-body">            
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4><i class='glyphicon glyphicon-edit'></i> Edit Invoice No. <?php echo $data['IDFactura']?></h4>
                  </div>
                </div>
                
                <div class="panel-body"> 
                  <div class="form-group row">
                      <label for="id_customer" class="col-md-1 control-label">Identification:</label>
                      <div class="col-sm-6">
                        <select class="chosen-select chosen-m" required name="id_customer" data-placeholder=" -- SELECT -- " autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" >
                          <option value=""></option>
                          <?php
                            $query = mysqli_query($mysqli, "SELECT IDCliente,Cedula,NombreCompleto,Correo FROM cliente
                              WHERE Estado='Enabled' ORDER BY cedula") or die('error: '.mysqli_error($mysqli));
                            if (mysqli_affected_rows($mysqli) != 0) {
                              while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                echo "<option value=" .$id_aux=$row['IDCliente'] . ">" .$row['Cedula']." | ". $row['NombreCompleto']. "</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="id_user" class="col-md-1 control-label">Sale by:</label>
                    <div class="col-sm-3">
                      <input style="display: none;" type="text" class="form-control" name="id_user" value="<?php echo $dataUser['IDUsuario']; ?>" readonly>
                      <input type="text" class="form-control" value="<?php echo $dataUser['NombreUsuario']; ?>" readonly>
                    </div>
                    <label for="date" class="col-md-1 control-label">Date:</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="date" value="<?php $date_aux=date_create($data['FechaFactura']); echo date_format($date_aux,'m-d-Y'); ?>" readonly >
                    </div>
                    <label for="condition" class="col-md-1 control-label">Pay by:</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="condition" readonly>
                        <option value="<?php echo $data['Condicion'] ?>"><?php echo $data['Condicion']?></option>
                      </select>
                    </div>
                  </div>            
              
                  <div class="col-md-12">
                    <div class="pull-right">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-placement="left" title="Add Products">
                       <span class="glyphicon glyphicon-plus"></span> Add Products
                      </button>

                      <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Finish">
                        <span class="glyphicon glyphicon-print"></span> Print
                      </button>

                      <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View List" onclick="showBag('<?php echo 1; ?>')">
                      <span class="glyphicon glyphicon-shopping-cart"></span> In bag
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Clean Bag" onclick="clearBag()">
                      <span class="glyphicon glyphicon-trash"></span> Clear Bag
                      </button>
                    </div>  
                  </div>
                </div>
              </div>
            </form>

            <div id="resultados"></div>          
      
            <!-- Modal -->
            <!-- <div class=" box-body"> -->
            <div class="modal fade bs-example-modal-lg " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" id="myModalLabel"><strong>Search products</strong></h3>
                  </div>
                  <div class="modal-body">

                    <form class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                        </div>
                        <button type="button" class="btn btn-success" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Search</button>
                      </div>
                    </form>
                    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
                    
                    <div class='outer_div'></div><!-- Carga los datos ajax -->
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>  
                  </div>
                </div>
              </div>
            </div>
            <!-- </div> -->
          </div><!-- /.box -->
        </div><!--/.col -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
  <?php
  //}
} ?>