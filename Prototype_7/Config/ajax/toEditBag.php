<?php

session_start();

if (isset($_POST['id'])) {
	$id=$_POST['id'];
}

	if (isset($_POST['cantidad'])) {
		$cantidad=$_POST['cantidad'];
	}
	if (isset($_POST['precio'])) {
		$precio=$_POST['precio'];
	}
	
	require_once ("../../Config/database.php");
		
	if (!empty($id) AND !empty($cantidad)) {
		if ($cantidad >= 1) {

			$query_p = mysqli_query($mysqli,"SELECT IDProducto, Cantidad FROM producto
				WHERE IDProducto='$id'");
			$query_s = mysqli_query($mysqli,"SELECT IDaddtobag,IDProducto,Price,Quantity,Total
				FROM addtobag WHERE IDProducto='$id'");
			$data_p = mysqli_fetch_array($query_p);
			$data_s = mysqli_fetch_array($query_s);

			if ($cantidad > $data_p['Cantidad']) {
				//colocar alerta de cantidad
			}else{
				if ($id != $data_s['IDProducto']) {
					$price_total_aux = ($cantidad*$precio);
					$insert_tmp = mysqli_query($mysqli, "INSERT INTO addtobag (IDProducto,Price,Quantity,Total) VALUES ('$id','$precio','$cantidad','$price_total_aux')");
				}else{
					$qty_aux = 0;
					$qty_aux = ($data_s['Quantity'] + $cantidad);
					$price_total_aux = ($qty_aux*$precio);
					$insert_tmp = mysqli_query($mysqli, "UPDATE addtobag SET Quantity='$qty_aux',
					Total='$price_total_aux' WHERE IDProducto='$id'");
				}				
			}

		} else {
			
		}		
	}
	if (isset($_GET['id'])) { //codigo elimina un elemento del array
		$delete = mysqli_query($mysqli, "DELETE FROM addtobag WHERE IDaddtobag='".($_GET['id'])."'");
	}

?>
<div class="box box-primary">
<div class="box-body">
	<table class="table table-hover">
		<tr style="border-color: #686868">
			<th>COD.</th>
			<th>Product</th>
			<th>Quantity</th>
			<th><span class="pull-right">Price Unit.</span></th>
			<th><span class="pull-right">Price Total</span></th>
			<th></th>
		</tr>

		<?php

			$sumador_total = 0;
			$query = mysqli_query($mysqli, "SELECT * FROM producto, addtobag WHERE producto.IDProducto = addtobag.IDProducto");
		    // $id_invoice = $_GET['id'];
		    // //$no    = 1;
		    
		    // $query = mysqli_query($mysqli, "SELECT factura.IDFactura AS facturaID, factura.FechaFactura,factura.IDCliente,
		    //                                 factura.TotalVenta,factura.EstadoFactura,factura.created_user,factura.Condicion,
		    //                                 cliente.IDCliente AS clienteID,cliente.NombreCompleto AS clienteName,cliente.Correo,
		    //                                 cliente.Telefono1,cliente.Direccion,usuario.IDUsuario AS usuarioID,
		    //                                 usuario.NombreUsuario AS userName,producto.IDProducto AS productoID,
		    //                                 producto.NombreProducto,detalleFactura.IDDetalle,detalleFactura.IDFactura,
		    //                                 detalleFactura.IDProducto,detalleFactura.Cantidad,detalleFactura.PrecioVenta
		    //                                 FROM factura,cliente,usuario,producto,detalleFactura
		    //                                 WHERE factura.IDFactura='$id_invoice'	                                    
		    //                                 AND factura.IDCliente=cliente.IDCliente
		    //                                 AND factura.created_user=usuario.IDUsuario
		    //                                 AND detalleFactura.IDProducto=producto.IDProducto
		    //                                 AND detalleFactura.IDFactura=factura.IDFactura
		    //                                 ORDER BY detalleFactura.IDDetalle ASC") 
		    //                                 or die('error '.mysqli_error($mysqli));
		    // $count  = mysqli_num_rows($query);
		    // $data_aux = mysqli_fetch_assoc($query);
			
			while ($row = mysqli_fetch_array($query)) {
				$id_tmp = $row["IDaddtobag"];
				$codigo_producto = $row['IDProducto'];
				$cantidad = $row['Quantity'];
				$nombre_producto = $row['NombreProducto'];
				$precio_venta = $row['Precio'];
				$precio_total = $precio_venta * $cantidad;
				$sumador_total+= $precio_total;//Sumador
			
		?>
		<tr>
			<td><?php echo $codigo_producto;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td><?php echo $cantidad;?></td>
			<td>
				<span class="pull-right"><?php echo number_format($precio_venta,2);?></span>
			</td>
			<td>
				<span class="pull-right"><?php echo number_format($precio_total,2);?></span>
			</td>
			<td style="text-align: center;">
				<a style="color:red; font-size: 14px;" data-toggle="tooltip" data-placement="top" title="Remove" onclick="deleteEditBag('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>

		<?php
			}
		?>
		<tr>
			<td colspan=4 style="border-color: #686868;"><strong class="pull-right">TOTAL I.V.A</strong></td>
			<td style="text-align: right; border-color: #686868;"><strong>₡ <?php echo number_format($sumador_total,2);?></strong></td>
			<td style="border-color: #686868"></td>
		</tr>
	</table>
</div>
</div>