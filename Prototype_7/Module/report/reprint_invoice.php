<?php
	session_start();
	ob_start();

	require_once "../../Config/database.php";

	$id_invoice = $_GET['id_invoice'];

	if (isset($_GET['id_invoice'])) {
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
		$data_f = mysqli_fetch_assoc($query_f);;
	}

    if ($count == 0) { ?>
        <script>
        	alert("Error!\nThis invoice doesn't exist in the system!");
        	window.close();
        </script>
    <?php
    	echo alert(); 
	}
?>

<?php 
	if ($data_f['Tipo'] == "Subscription"){ ?>
		<html xmlns="http://www.w3.org/1999/xhtml"> 
		    <head>
		        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		        <title>Report Sales</title>
		        <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" />
		        <style type="text/css">
		            table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
		        </style>
		    </head>
		    <body>
		    <br>
			    <table cellspacing="0" style="width: 100%;">
			        <tr>
			            <td style="width: 25%; color: #444444;">
			                <img style="width: 100%;" src="../../Content/assets/img/sysgym.png" alt="Logo"><br>
			            </td>
			            <td style="width: 75%;text-align:right">
			            FACTURA No. <?php echo $data_f['facturaID'];?>
			            </td>
			        </tr>
			    </table>
			    <br>
			    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
			        <tr>
				        <td style="width:50%; "><strong>Direccion</strong>
				        	<br>Santa Rita, Rio Cuarto
				        	<br>Telefono.: (+506) 2465-0099
				        </td>
			        </tr>
			    </table>
			    <br>
		        <div>
		            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
		                <tr>
							<td style="width: 10%;">Cliente:</td>
							<td style="width: 65%"><?php echo $data_f['clienteName']; ?> </td>
							<td style="width: 10%;text-align:left;">Fecha:</td>
							<td style="width: 10%;text-align:left;">
								<?php $date_aux=date_create($data_f['FechaFactura']); 
									$date_aux=date_format($date_aux,'m/d/Y'); echo $date_aux;?>
							</td>
		                </tr>
		                <tr>
							<td style="width: 10%;">Correo:</td>
							<td style="width: 65%"><?php echo $data_f['Correo']; ?></td>
							<td style="width: 10%;text-align:left;"> Telefono:</td>
							<td style="width: 20%text-align:left;"><?php echo $data_f['Telefono1']; ?> </td>					
		                </tr>
		                <tr>
							<td style="width: 10%;"> Direccion:</td>
							<td style="width: 65%"><?php echo $data_f['Direccion']; ?> </td>
							<td style="width: 10%;text-align:left;">Vendedor:</td>
							<td style="width: 20%"><?php echo $data_f['userName']; ?></td>
		                </tr>
		            </table>
		        </div>
		       
		        <hr>
		        <br>
		        <div id="isi">
		            <!-- <table width="100%" border="0.2" cellpadding="0" cellspacing="0"> -->
		            <table cellspacing="0" style="width: 100%; border: solid 0.7px black; font-size: 10pt;padding:0.2mm;">
		                <thead style="background:#e8ecee">
		                    <tr class="tr-title">
		                        <th height="25" style="width: 10%;border-bottom:0.1px black;" align="center" valign="middle">Q.</th>
		                        <th height="25" style="width: 57%;border-bottom:0.1px black;" align="left" valign="middle">Descripcion</th>
		                        <th height="25" style="width: 16%;border-bottom:0.1px black;" align="center" valign="middle">Precio Unit.</th>
		                        <th height="25" style="width: 16%;border-bottom:0.1px black;" align="center" valign="middle">Precio Total</th>
		                    </tr>
		                </thead>
		                <tbody>
					    <?php
					    
					    if($count == 0) {
					        ?>
			                <tr>
			                    <td height="25" style="width: 10%;" align="center" valign="middle"></td>
			                    <td height="25" style="width: 57%;" align="left" valign="middle"></td>
			                    <td height="25" style="width: 16%;" align="center" valign="middle"></td>
			                    <td height="25" style="width: 16%;" align="center" valign="middle"></td>
			                </tr>
					   	<?php }

					    else {

							$query_sub = mysqli_query($mysqli,"SELECT subscripcion.IDPlan,
				                                	subscripcion.IDFactura,plan.IDPlan,plan.NombrePlan,plan.CantidadDias
				                                	FROM subscripcion,plan WHERE subscripcion.IDPlan=plan.IDPlan")
				                                	or die('error '.mysqli_error($mysqli));

							$total = 0;

					        while ($data_aux_d=mysqli_fetch_array($query_sub)) {

								$total = $data_f['TotalVenta'];
								?>
					            <tr>
					                <td height="20" style="border-bottom:0.1px black;" align="center" valign="middle">1</td>
					                <td height="20" style="border-bottom:0.1px black;" align="left" valign="middle">Subscripcion por <?php echo $data_aux_d['CantidadDias']." days"." [".$data_aux_d['NombrePlan']."]"; ?></td>
					                <td height="20" style="border-bottom:0.1px black;" align="center" valign="middle">
					                	<?php echo number_format($total,2); ?></td>
					                <td height="20" style="border-bottom:0.1px black;" align="center" valign="middle">
					                	<?php echo number_format($total,2); ?></td>
					            </tr>
					        <?php
					    	}
					    }
						?>
			            </tbody>
			            </table>
		                <table cellspacing="0" style="width: 100%; font-size: 10pt;">
		                    <tr valign="middle">
		                        <td style="text-align: right;height:30; width: 78%;"><strong>Total en colones </strong></td>
		                        <td style="text-align:right;height:30;width: 17%;">
		                            <strong>$ <?php if ($count == 0) {
		                                echo number_format(0,2);
		                            } else {
		                                echo number_format($total,2); }?>
		                            </strong>
		                        </td>
		                    </tr>
		            	</table>
					    <p>
					    *** IVA ***
					    </p>
					    <br>
					    <br><br>
					          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
					            <tr>
					                <td style="width:50%;text-align:right">Condicion: </td>
					                <td style="width:50%; ">&nbsp;<?php echo $data_f['Condicion']; ?></td>
					            </tr>
					            <tr>
					                <td style="width:50%;text-align:right">Valido hasta:</td>
					                <td style="width:50%;"> 30 dias</td>
					            </tr>
					        </table>
					    <br><br><br><br>
					    
					    <table cellspacing="10" style="width: 100%; text-align: left; font-size: 10pt;">
					        <tr>
					            <td style="width:33%;text-align: center;border-top:solid 1px">Vendedor</td>
					            <td style="width:33%;text-align: center;border-top:solid 0px"></td>
					            <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado por</td>
					        </tr>
					    </table>            	
		        </div>
		            <page_footer>
		                <table class="page_footer">
		                    <tr>
		                        <td style="width: 50%; text-align: left">
		                            Page [[page_cu]]/[[page_nb]]
		                        </td>
		                        <td style="width: 50%; text-align: right">
		                            &copy; <?php echo "Developed by wsullivan "; echo  $anio=date('Y'); ?>
		                        </td>
		                    </tr>
		                </table>                
		            </page_footer>
		    </body>
		</html>
<?php
	}
	else{ ?>
		<html xmlns="http://www.w3.org/1999/xhtml"> 
		    <head>
		        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		        <title>Report Sales</title>
		        <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" />
		        <style type="text/css">
		            table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
		        </style>
		    </head>
		    <body>
		    <br>
			    <table cellspacing="0" style="width: 100%;">
			        <tr>
			            <td style="width: 25%; color: #444444;">
			                <img style="width: 100%;" src="../../Content/assets/img/sysgym.png" alt="Logo"><br>
			            </td>
			            <td style="width: 75%;text-align:right">
			            Factura No. <?php echo $data_f['facturaID'];?>
			            </td>
			        </tr>
			    </table>
			    <br>
			    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
			        <tr>
				        <td style="width:50%; "><strong>Direccion</strong>
				        	<br>Santa Rita, Rio Cuarto
				        	<br>Telefono.: (+506) 2465-0099
				        </td>
			        </tr>
			    </table>
			    <br>
		        <div>
		            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
		                <tr>
							<td style="width: 10%;">Cliente:</td>
							<td style="width: 65%"><?php echo $data_f['clienteName']; ?> </td>
							<td style="width: 10%;text-align:left;">Fecha:</td>
							<td style="width: 10%;text-align:left;">
								<?php $date_aux=date_create($data_f['FechaFactura']); 
									$date_aux=date_format($date_aux,'m/d/Y'); echo $date_aux;?>
							</td>
		                </tr>
		                <tr>
							<td style="width: 10%;">Correo:</td>
							<td style="width: 65%"><?php echo $data_f['Correo']; ?></td>
							<td style="width: 10%;text-align:left;"> Telefono:</td>
							<td style="width: 20%text-align:left;"><?php echo $data_f['Telefono1']; ?> </td>					
		                </tr>
		                <tr>
							<td style="width: 10%;"> Direccion:</td>
							<td style="width: 65%"><?php echo $data_f['Direccion']; ?> </td>
							<td style="width: 10%;text-align:left;">Vendedor:</td>
							<td style="width: 20%"><?php echo $data_f['userName']; ?></td>
		                </tr>
		            </table>
		        </div>
		       
		        <hr>
		        <br>
		        <div id="isi">
		            <!-- <table width="100%" border="0.2" cellpadding="0" cellspacing="0"> -->
		            <table cellspacing="0" style="width: 100%; border: solid 0.7px black; font-size: 10pt;padding:0.2mm;">
		                <thead style="background:#e8ecee">
		                    <tr class="tr-title">
		                        <th height="25" style="width: 10%;border-bottom:0.1px black;" align="center" valign="middle">Q.</th>
		                        <th height="25" style="width: 57%;border-bottom:0.1px black;" align="left" valign="middle">Descripcion</th>
		                        <th height="25" style="width: 16%;border-bottom:0.1px black;" align="center" valign="middle">Precio Unit.</th>
		                        <th height="25" style="width: 16%;border-bottom:0.1px black;" align="center" valign="middle">Precio total</th>
		                    </tr>
		                </thead>
		                <tbody>
					    <?php
					    
					    if($count == 0) {
					        ?>
			                <tr>
			                    <td height="25" style="width: 10%;" align="center" valign="middle"></td>
			                    <td height="25" style="width: 57%;" align="left" valign="middle"></td>
			                    <td height="25" style="width: 16%;" align="center" valign="middle"></td>
			                    <td height="25" style="width: 16%;" align="center" valign="middle"></td>
			                </tr>
					   	<?php }

					    else {

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

					        while ($data_aux_d=mysqli_fetch_array($query_d)) {

					            $pre_aux = $data_aux_d['PrecVenta'];
								$qty_aux = $data_aux_d['qty'];
								$price_item = ($pre_aux/$qty_aux);
								$price_u = number_format($price_item,2);
								$total_items_price = number_format(($price_item*$qty_aux),2);
								$total+=$pre_aux;

					            echo "
					            	<tr>
					                    <td height='20' style='border-bottom:0.1px black;' align='center' valign='middle'>$qty_aux</td>
					                    <td height='20' style='border-bottom:0.1px black;' align='left' valign='middle'>$data_aux_d[NombreProducto]</td>
					                    <td height='20' style='border-bottom:0.1px black;' align='center' valign='middle'>$price_u</td>
					                    <td height='20' style='border-bottom:0.1px black;' align='center' valign='middle'>$total_items_price</td>
					                </tr>";
					            $no++;
					        }
					    }
					?>
			            </tbody>
			            </table>
		                <table cellspacing="0" style="width: 100%; font-size: 10pt;">
		                    <tr valign="middle">
		                        <td style="text-align: right;height:30; width: 78%;"><strong>Total en colones </strong></td>
		                        <td style="text-align:right;height:30;width: 17%;">
		                            <strong><?php if ($count == 0) {
		                                echo number_format(0,2);
		                            } else {
		                                echo number_format($total,2); }?>
		                            </strong>
		                        </td>
		                    </tr>
		            	</table>
					    <p>
					    *** Includes IVA ***
					    </p>
					    <br>
					    <br><br>
					          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
					            <tr>
					                <td style="width:50%;text-align:right">Condiciones: </td>
					                <td style="width:50%; ">&nbsp;<?php echo $data_f['Condicion']; ?></td>
					            </tr>
					            <tr>
					                <td style="width:50%;text-align:right">Valido hasta:</td>
					                <td style="width:50%;"> 30 dias</td>
					            </tr>
					        </table>
					    <br><br><br><br>
					    
					    <table cellspacing="10" style="width: 100%; text-align: left; font-size: 10pt;">
					        <tr>
					            <td style="width:33%;text-align: center;border-top:solid 1px">Vendedor</td>
					            <td style="width:33%;text-align: center;border-top:solid 0px"></td>
					            <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado por</td>
					        </tr>
					    </table>            	
		        </div>
		            <page_footer>
		                <table class="page_footer">
		                    <tr>
		                        <td style="width: 50%; text-align: left">
		                            Page [[page_cu]]/[[page_nb]]
		                        </td>
		                        <td style="width: 50%; text-align: right">
		                            &copy; <?php echo "Developed by wsullivan "; echo  $anio=date('Y'); ?>
		                        </td>
		                    </tr>
		                </table>                
		            </page_footer>
		    </body>
		</html>
<?php	}

?>

<?php
	$filename="Re-print invoice.pdf"; 
	$content = ob_get_clean();
	$content = $content;

	require_once('../../Content/assets/plugins/html2pdf_v4.03/html2pdf.class.php');
	try
	{
	    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
	    $html2pdf->setDefaultFont('Arial');
	    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	    $html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>