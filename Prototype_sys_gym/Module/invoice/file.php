<?php	

	if (isset($_GET['id'])) {
	    $id_invoice = $_GET['id'];
	    $no    = 1;
	    
	    $query_f = mysqli_query($mysqli, "SELECT factura.IDFactura AS facturaID, factura.FechaFactura,factura.IDCliente,
	                                    factura.TotalVenta,factura.EstadoFactura,factura.Tipo,factura.created_user,
	                                    factura.Condicion,cliente.IDCliente AS clienteID,cliente.NombreCompleto 
	                                    AS clienteName,cliente.Correo,cliente.Telefono1,cliente.Direccion,
	                                    usuario.IDUsuario AS usuarioID,usuario.NombreUsuario AS userName
	                                    FROM factura,cliente,usuario
	                                    WHERE factura.IDFactura='$id_invoice'
	                                    AND factura.IDCliente=cliente.IDCliente
	                                    AND factura.created_user=usuario.IDUsuario") 
	                                    or die('error '.mysqli_error($mysqli));

	    $count  = mysqli_num_rows($query_f);
	    $data_f = mysqli_fetch_assoc($query_f);
	}
?>
<?php
	if ($data_f['Tipo'] == "Subscription") { ?>
		<section class="content-header">
		  <h1>
		    <i class="fa fa-user icon-title"></i> Expense Detail
		  </h1>
		  <ol class="breadcrumb">
		    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
		    <li class="active"> Expense Detail</li>
		  </ol>
		</section>

		<section class="content">
		  <div class="row">
		    <div class="col-md-10">

				<div class="box box-primary">
					<div class="box-body">
						
						<html xmlns="http://www.w3.org/1999/xhtml"> 
						    <head>
						        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						        <title>Report Sales</title>
						        <!-- <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" /> -->
						        <style type="text/css">
						            table.page_footer {width: 80%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
						        </style>
						    </head>
						    <body>
						    <div style="margin-left: 50px">
						        <br>
						        <div>
						        <br><br>
						           <table style="width: 80%">
						            <tr>
							            <td>
							            <span style="font-size:15px">SYSGYM</span>
							            </td>
										<td style="width: 75%;text-align:right">
		                        			INVOICE N° <?php echo $data_f['facturaID'];?>
		                    			</td>
						            </tr>
						           </table>
						        </div>
						        <div>
						           <table style="width: 80%">
						            <tr><td>Report Invoice</td></tr>
						           </table>
						        </div>
						        <br>
						        <div>
						            <table cellspacing="0" style="width: 80%; text-align: left; font-size: 11pt;">
							            <tr>
							                <td style="width: 10%;">Customer:</td>
							                <td style="width: 50%"><?php echo $data_f['clienteName']; ?> </td>
							                <td style="width: 10%;text-align:left;">Date:</td>
							                <td style="width: 10%;text-align:left;">
							                    <?php $date_aux=date_create($data_f['FechaFactura']); 
							                        $date_aux=date_format($date_aux,'m/d/Y'); echo $date_aux;?>
							                </td>
							            </tr>
							            <tr>                
							                <td style="width: 10%;">Email:</td>
							                <td style="width: 50%"><?php echo $data_f['Correo']; ?></td>

							                <td style="width: 10%;text-align:left;"> Phone:</td>
							                <td style="width: 20%text-align:left;"><?php echo $data_f['Telefono1']; ?> </td>
							            </tr>
							            <tr>
							                <td style="width: 10%;"> Address:</td>
							                <td style="width: 50%"><?php echo $data_f['Direccion']; ?> </td>
							                <td style="width: 10%;text-align:left;">Sale By:</td>
							                <td style="width: 20%"><?php echo $data_f['userName']; ?></td>
							            </tr>
							        </table>
						        </div>
						        <br>
						        <div>				        
							        <table style="width: 80%; border: solid 1px; background: #E7E7E7; font-size: 12pt;">
								            <tr style="font-weight: bold;">
								                <td style="width: 10%;text-align: center;">Q.</td>
								                <td style="width: 60%;text-align: left;">Description</td>
								                <td style="width: 15%;text-align: center;">Unit Price</td>
								                <td style="width: 15%;text-align: center;">Total Price</td>
								            </tr>
							        </table>
							        <table class="table table-striped table-border" cellspacing="0" style="border:solid 1px;width: 80%;">
								        
									    <?php
			                                $query_sub = mysqli_query($mysqli,"SELECT subscripcion.IDPlan,
			                                	subscripcion.IDFactura,plan.IDPlan,plan.NombrePlan,plan.CantidadDias
			                                	FROM subscripcion,plan WHERE subscripcion.IDPlan=plan.IDPlan")
			                                	or die('error '.mysqli_error($mysqli));

									        while ($data_aux_d=mysqli_fetch_array($query_sub)) {
									        	$total = $data_f['TotalVenta'];
									            ?>
									            <tr>
									                <td style="text-align: center;width:10%; height:10">1</td>
									                <td style="text-align: left;width:60%; height:10">Plan subscription for <?php echo $data_aux_d['CantidadDias']." days"." [".$data_aux_d['NombrePlan']."]"; ?></td>
									                <td style="text-align: center;width:15%; height:10">
									                	<?php echo number_format($total,2); ?></td>
													<td style="text-align: center;width:15%; height:10"><?php echo number_format($total,2); ?></td>
									            </tr>							            
									       <?php }
										?>					            
							        </table>
							        <table class="table" style="width: 80%">
							            <tr>
							                <td colspan="3" style="text-align: left;height:10;"><strong>Total </strong></td>
							                <td style="text-align:right;height:10">
							                    <strong>&#8353; <?php if ($count == 0) {
							                        	echo number_format(0,2);
							                    	} else {
							                        	echo number_format($total,2); }?>
							                    </strong>
							                </td>
							                </tr>
							        </table>
							    </div>
							    <br><br><br>
					            <page_footer>
					                <table class="page_footer" style="width: 80%">
					                    <tr>
					                        <td style="width: 50%; text-align: left">
					                            
					                        </td>
					                        <td style="width: 50%; text-align: right">
					                            &copy; <?php echo "Developed by wsullivan "; echo  $anio=date('Y'); ?>
					                        </td>
					                    </tr>
					                </table>                
					            </page_footer>
					        </div>
						    </body>
						</html>			   
		                <br><br>
						<br><br>
					</div>
				</div>
		    </div><!--/.col -->
		  </div>   <!-- /.row -->
		</section><!-- /.content -->		
<?php
	} else { ?>
		<section class="content-header">
		  <h1>
		    <i class="fa fa-user icon-title"></i> Expense Detail
		  </h1>
		  <ol class="breadcrumb">
		    <li><a href="?module=start"><i class="fa fa-home"></i> Home</a></li>
		    <li class="active"> Expense Detail</li>
		  </ol>
		</section>

		<section class="content">
		  <div class="row">
		    <div class="col-md-10">

				<div class="box box-primary">
					<div class="box-body">
						
						<html xmlns="http://www.w3.org/1999/xhtml"> 
						    <head>
						        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						        <title>Invoice ptint</title>
						        <!-- <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" /> -->
						        <style type="text/css">
						            table.page_footer {width: 80%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
						        </style>
						    </head>
						    <body>
						    <div style="margin-left: 60px">
						        <br>
						        <div>
                            	<br>
						           <table style="width: 80%">
						            <tr>
							            <td>
							            <span style="font-size:15px">SYSGYM</span>
							            </td>
										<td style="width: 75%;text-align:right">
		                        			INVOICE N° <?php echo $data_f['facturaID'];?>
		                    			</td>
						            </tr>
						           </table>
						        </div>
						        <div>
						           <table style="width: 80%">
						            <tr><td>Report Invoice</td></tr>
						           </table>
						        </div>
						        <br>
						        <div>
						            <table cellspacing="0" style="width: 80%; text-align: left; font-size: 11pt;">
							            <tr>
							                <td style="width: 10%;">Customer:</td>
							                <td style="width: 70%"><?php echo $data_f['clienteName']; ?> </td>
							                <td style="width: 10%;text-align:left;">Date:</td>
							                <td style="width: 10%;text-align:left;">
							                    <?php $date_aux=date_create($data_f['FechaFactura']); 
							                        $date_aux=date_format($date_aux,'m/d/Y'); echo $date_aux;?>
							                </td>
							            </tr>
							            <tr>                
							                <td style="width: 10%;">Email:</td>
							                <td style="width: 70%"><?php echo $data_f['Correo']; ?></td>

							                <td style="width: 10%;text-align:left;"> Phone:</td>
							                <td style="width: 20%text-align:left;"><?php echo $data_f['Telefono1']; ?> </td>
							            </tr>
							            <tr>
							                <td style="width: 10%;"> Address:</td>
							                <td style="width: 70%"><?php echo $data_f['Direccion']; ?> </td>
							                <td style="width: 10%;text-align:left;">Sale By:</td>
							                <td style="width: 20%"><?php echo $data_f['userName']; ?></td>
							            </tr>
							        </table>
						        </div>
						        <br>
						        <div>				        
							        <table style="width: 80%; border: solid 1px; background: #E7E7E7; font-size: 12pt;">
								            <tr style="font-weight: bold;">
								                <td style="width: 10%;text-align: center;">Q.</td>
								                <td style="width: 60%;text-align: left;">Description</td>
								                <td style="width: 15%;text-align: center;">Unit Price</td>
								                <td style="width: 15%;text-align: center;">Total Price</td>
								            </tr>
							        </table>
							        <table class="table table-striped table-border" cellspacing="0" style="border:solid 1px;width: 80%;">
								        
									    <?php 
									    	$query_d = mysqli_query($mysqli, "SELECT detalleFactura.IDDetalle,
									    		detalleFactura.IDFactura,detalleFactura.IDProducto,detalleFactura.Cantidad
									    		AS qty,detalleFactura.PrecioVenta AS PrecVenta,
			                                    producto.IDProducto AS productoID,
			                                    producto.NombreProducto
			                                    FROM producto,detalleFactura
			                                    WHERE detalleFactura.IDFactura='$id_invoice'
			                                    AND detalleFactura.IDProducto=producto.IDProducto") 
			                                    or die('error '.mysqli_error($mysqli));

									        $total = 0;
									        $pre_aux=0;
									        $price_item=0;
									        //$price_items = 0;

									        while ($data_aux_d=mysqli_fetch_array($query_d)) {
									            $pre_aux = $data_aux_d['PrecVenta'];
									            $qty_aux = $data_aux_d['qty'];
									            $price_item = ($pre_aux/$qty_aux);
									            $total_items_price = number_format(($price_item*$qty_aux),2);
									            $total+=$pre_aux;
									            ?>
									            <tr>
									                <td style="text-align: center;width:10%; height:10"><?php echo $qty_aux; ?></td>
									                <td style="text-align: left;width:60%; height:10"><?php echo $data_aux_d['NombreProducto']; ?></td>
									                <td style="text-align: center;width:15%; height:10">
									                	<?php echo number_format($price_item,2); ?></td>
													<td style="text-align: center;width:15%; height:10"><?php echo $total_items_price; ?></td>
									            </tr>							            
									       <?php }
										?>					            
							        </table>
							        <table class="table" style="width: 80%">
							            <tr>
							                <td colspan="3" style="text-align: left;height:10;"><strong>Total </strong></td>
							                <td style="text-align:right;height:10">
							                    <strong>&#8353; <?php if ($count == 0) {
							                        	echo number_format(0,2);
							                    	} else {
							                        	echo number_format($total,2); }?>
							                    </strong>
							                </td>
							                </tr>
							        </table>
							    </div>
							    <br><br><br>
					            <page_footer>
					                <table class="page_footer" style="width: 80%">
					                    <tr>
					                        <td style="width: 50%; text-align: left">
					                            
					                        </td>
					                        <td style="width: 50%; text-align: right">
					                            &copy; <?php echo date('Y');//echo "Developed by wsullivan "; echo  $anio=date('Y'); ?>
					                        </td>
					                    </tr>
					                </table>                
					            </page_footer>
					            <!-- </form> -->
					        </div>
						    </body>
						</html>		   
		                <br><br>
						<br><br>
					</div>
				</div>
		    </div><!--/.col -->
		  </div>   <!-- /.row -->
		</section><!-- /.content -->
<?php
	}	
?>