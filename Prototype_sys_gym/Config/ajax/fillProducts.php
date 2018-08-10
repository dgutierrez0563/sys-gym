<?php

	require_once ("../../Config/database.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $inColumns = array('IDProducto', 'NombreProducto'); //Parameter to search
		 $inTable = "producto"; //Table name
		 $inWhere = "";

		if ( $_GET['q'] != "" )
		{
			$inWhere = "WHERE (";
			for ( $i=0 ; $i<count($inColumns) ; $i++ )
			{
				$inWhere .= $inColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$inWhere = substr_replace( $inWhere, "", -3 );
			$inWhere .= ')';
		}

		include 'pagination.php'; //include pagination file		
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 6; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;

		//Count the total number of row in your table*/
		$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $inTable $inWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Module/invoice/new.php';
		
		$parameter = $_GET['q'] ;
		//main query to fetch the data
		$sql="SELECT * FROM  $inTable $inWhere LIMIT $offset,$per_page";
		$query = mysqli_query($mysqli, $sql);
		//loop through fetched data
		if ($numrows>0){			
			?>
			<div>
			  <table id="dataTables1" class="table table-bordered table-striped table-hover">
				<tr  class="info">
					<th>COD.</th>
					<th>Product</th>
					<th>Stock</th>
					<th>Price/U.</th>
					<th>Quant.</th>
					<th style="width: 44px;"></th>
				</tr>
				<?php
				$no = 1;
				while ($row=mysqli_fetch_array($query)){
					$id_product=$row['IDProducto'];
					$product_name=$row['NombreProducto'];
					$stock=$row["Cantidad"];
					$price=$row["Precio"];
					if($row['Estado'] == "Enabled"){ ?>
						<tr>
							<td style="display: none;"><?php echo $no; ?></td>
							<td><?php echo $id_product; ?></td>		
							<td><?php echo $product_name; ?></td>
							<td><?php echo $stock; ?></td>
							<td width="10%">
								<div class="pull-right">
									<input type="text" class="form-control" id="precio_<?php echo $id_product; ?>" value="<?php echo $price; ?>" readonly>
								</div>
							</td>
							<td class='col-xs-1'>
								<div class="pull-right">
									<input type="text" class="form-control" style="text-align:right" min="1" maxlength="3" id="cantidad_<?php echo $id_product; ?>" onKeyPress="return goodchars(event,'1234567890',this)" value="1" >
								</div>
							</td>
							<td>
								<span class="pull-right"><a class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Add" onclick="toBag('<?php echo $id_product ?>')"><i class="glyphicon glyphicon-plus"></i></a>
								</span>
							</td>
						</tr>
					<?php
					}
					$no++;
				}
				?>
 				<tr>
					<td colspan=6><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>