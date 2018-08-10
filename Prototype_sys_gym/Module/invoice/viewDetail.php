
<?php	

	if (isset($_GET['id'])) {
	    $id_invoice = $_GET['id'];
	    //$no    = 1;
	    
	    $query = mysqli_query($mysqli, "SELECT factura.IDFactura AS facturaID, factura.FechaFactura,factura.IDCliente,
	                                    factura.TotalVenta,factura.EstadoFactura,factura.created_user,factura.Condicion,
	                                    cliente.IDCliente AS clienteID,cliente.NombreCompleto AS clienteName,cliente.Correo,
	                                    cliente.Telefono1,cliente.Direccion,usuario.IDUsuario AS usuarioID,
	                                    usuario.NombreUsuario AS userName,producto.IDProducto AS productoID,
	                                    producto.NombreProducto,detalleFactura.IDDetalle,detalleFactura.IDFactura,
	                                    detalleFactura.IDProducto,detalleFactura.Cantidad,detalleFactura.PrecioVenta
	                                    FROM factura,cliente,usuario,producto,detalleFactura
	                                    WHERE factura.IDFactura='$id_invoice'	                                    
	                                    AND factura.IDCliente=cliente.IDCliente
	                                    AND factura.created_user=usuario.IDUsuario
	                                    AND detalleFactura.IDProducto=producto.IDProducto
	                                    AND detalleFactura.IDFactura=factura.IDFactura
	                                    ORDER BY detalleFactura.IDDetalle ASC") 
	                                    or die('error '.mysqli_error($mysqli));
	    $count  = mysqli_num_rows($query);
	    $data_aux = mysqli_fetch_assoc($query);
	}
?>
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
    <div class="col-md-8">
        <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" >
        	<div class="box-body" style="margin-left: 25px">
			<page  style="font-size: 12pt; font-family: arial;width:100%" >           	

		        <table cellspacing="0" style="width: 90%;">
		            <tr>
		                <td style="width: 25%; color: #444444;">
		                </td>
		                <td style="width: 75%;text-align:right">
		                    INVOICE N° <?php echo $data_aux['IDFactura'];?>
		                </td>
		                <hr>
		            </tr>
		        </table>
		        <br>		        
		        <br>
		        <table cellspacing="0" style="width: 90%; text-align: left; font-size: 10pt;">
		            <tr>
		            <td style="width:50%; "><strong>Address</strong> <br>Santa Rita, Rio Cuarto<br> Phone.: (+506) 2465-0099</td>        
		            </tr>
		        </table>
				<br>
		        <table cellspacing="0" style="width: auto; text-align: left; font-size: 11pt;">
		            <tr>
		                <td style="width: 10%;">Customer:</td>
		                <td style="width: 50%"><?php echo $data_aux['clienteName']; ?> </td>
		                <td style="width: 10%;text-align:left;">Date:</td>
		                <td style="width: 10%;text-align:left;">
		                    <?php $date_aux=date_create($data_aux['FechaFactura']); 
		                        $date_aux=date_format($date_aux,'m/d/Y'); echo $date_aux;?>
		                </td>
		            </tr>
		            <tr>                
		                <td style="width: 10%;">Email:</td>
		                <td style="width: 50%"><?php echo $data_aux['Correo']; ?></td>

		                <td style="width: 10%;text-align:left;"> Phone:</td>
		                <td style="width: 20%text-align:left;"><?php echo $data_aux['Telefono1']; ?> </td>
		            </tr>
		            <tr>
		                <td style="width: 10%;"> Address:</td>
		                <td style="width: 50%"><?php echo $data_aux['Direccion']; ?> </td>
		                <td style="width: 10%;text-align:left;">Sale By:</td>
		                <td style="width: 20%"><?php echo $data_aux['userName']; ?></td>
		            </tr>
		       
		        </table>		        
		            <table cellspacing="0" style="width: 90%; text-align: left;font-size: 11pt">
		            <tr>
		            </tr>
		        </table>

		        <br>

		        <table cellspacing="0" style="width: 90%; border: solid 1px black; background: #E7E7E7; font-size: 10pt;padding:1mm;">
		            <tr>
		                <th style="width: 10%">Q.</th>
		                <th style="width: 60%">Description</th>
		                <th style="width: 15%">Unit Price</th>
		                <th style="width: 15%" style="text-align: right;">Total Price</th>
		                
		            </tr>
		        </table>

		        <?php
		            $total_price_invoice = 0;
		            $total = 0;
		            while ($data_q=mysqli_fetch_array($query)) { 
		                $price_sale = $data_q['PrecioVenta'];
		                $total_price_sale = number_format($price_sale,2);
		                $quantity_sale = $data_q['Cantidad'];
		                $price_unit = $price_sale/$quantity_sale;
		                $price_unit = number_format($price_unit,2);
		                $total_price_invoice+=$price_sale;
		                
		                ?>
		                
		                <table cellspacing="0" style="width: 90%; border: solid 1px black;  text-align: center; font-size: 11pt;padding:1mm;">
		                    <tr>
		                        <td style="width: 10%; text-align: center"><?php echo $quantity_sale; ?></td>
		                        <td style="width: 60%; text-align: left"><?php echo $data_q['NombreProducto'];?></td>
		                        <td style="width: 15%; text-align: right"><?php echo $price_unit;?></td>
		                        <td style="width: auto;%; text-align: right"><?php echo $total_price_sale;?></td>                        
		                    </tr>
		                </table>
		                
		                <table cellspacing="0" style="width: 90%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
		                    <tr>
		                        <th style="width: 80%; text-align: right;">TOTAL : </th>
		                        <th style="width: 13%; text-align: right;">&#189; <?php echo number_format($total_price_invoice,2);?></th>
		                    </tr>
		                </table>
		                <br><br><br><br>
		    
		    
		                <table cellspacing="10" style="width: 90%; text-align: left; font-size: 11pt;">
		                     <tr>
		                       <td style="width:15%;text-align: center;border-top:solid 1px">Vendedor</td>
		                       <td style="width:15%;text-align: center;border-top:solid 1px">Cotizado</td>
		                       <td style="width:15%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
		                    </tr>
		                </table>
		                <br><br>
				<page_footer>
				    <table style="width:90% ">
				        <tr>

				            <td style="text-align: right;">
				                &copy; <?php echo "wsullivan "; echo  $anio=date('Y'); ?>
				            </td>
				        </tr>
				    </table>
			    </page_footer>
         
            	<?php } ?>
        		</div> 
			</page>
		</form>
        </div>
    </div>
</section>
