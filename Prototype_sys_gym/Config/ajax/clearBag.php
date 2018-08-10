<?php 
	session_start();
    ob_start();

    require_once "../../Config/database.php";
	$query_aux = mysqli_query($mysqli,"DELETE FROM shoppingBag");
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
				<span class="pull-right"><?php echo number_format($precio_venta,1);?></span>
			</td>
			<td>
				<span class="pull-right"><?php echo number_format($precio_total,1);?></span>
			</td>
			<td style="text-align: center;">
				<a style="color:red; font-size: 14px;" data-toggle="tooltip" data-placement="top" title="Remove" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>

		<?php
			}
		?>
		<tr>
			<td colspan=4 style="border-color: #686868;"><strong class="pull-right">TOTAL</strong></td>
			<td style="text-align: right; border-color: #686868;"><strong>$<?php echo number_format($sumador_total,1);?></strong></td>
			<td style="border-color: #686868"></td>
		</tr>
	</table>
</div>
</div>