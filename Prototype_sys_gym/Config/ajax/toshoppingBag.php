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

			$query_p = mysqli_query($mysqli,"SELECT IDProducto, Cantidad FROM producto WHERE IDProducto='$id'");
			$query_s = mysqli_query($mysqli,"SELECT IDShoppingBag,IDProducto,Price,Quantity,PriceTotal FROM shoppingBag WHERE IDProducto='$id'");
			$data_p = mysqli_fetch_array($query_p);
			$data_s = mysqli_fetch_array($query_s);

			if ($cantidad > $data_p['Cantidad']) {
				//colocar alerta de cantidad
			}else{
				if ($id != $data_s['IDProducto']) {
					$price_total_aux = ($cantidad*$precio);
					$insert_tmp = mysqli_query($mysqli, "INSERT INTO shoppingBag (IDProducto,Price,Quantity,PriceTotal) VALUES ('$id','$precio','$cantidad','$price_total_aux')");
				}else{
					$qty_aux = 0;
					$qty_aux = ($data_s['Quantity'] + $cantidad);
					$price_total_aux = ($qty_aux*$precio);
					$insert_tmp = mysqli_query($mysqli, "UPDATE shoppingBag SET Quantity='$qty_aux',PriceTotal='$price_total_aux' WHERE IDProducto='$id'");
				}				
			}

		} else {
			
		}		
	}
	if (isset($_GET['id'])) { //codigo elimina un elemento del array
		$delete = mysqli_query($mysqli, "DELETE FROM shoppingBag WHERE IDShoppingBag='".($_GET['id'])."'");
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
			$query = mysqli_query($mysqli, "SELECT * FROM producto, shoppingBag WHERE producto.IDProducto = shoppingBag.IDProducto");
			
			while ($row = mysqli_fetch_array($query)) {
				$id_tmp = $row["IDShoppingBag"];
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
				<a style="color:red; font-size: 14px;" data-toggle="tooltip" data-placement="top" title="Remove" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a>
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