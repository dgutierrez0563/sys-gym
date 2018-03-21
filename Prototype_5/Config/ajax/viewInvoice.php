<?php

	require_once ("../../Config/database.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $inColumns = array('factura.IDFactura', 'factura.FechaFactura','cliente.NombreCompleto','factura.EstadoFactura','factura.TotalVenta'); //Parameter to search
		 $inTable = "factura,cliente"; //Table name
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
		$per_page = 8; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;

		//Count the total number of row in your table*/
		$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $inTable $inWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './Module/invoice/view.php';
		
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
					<th>Date</th>
					<th>Customer Name</th>
					<th>Total</th>
					<th style="width: 44px;"></th>
				</tr>
				<?php
				$no = 1;
				while ($row=mysqli_fetch_array($query)){
					$id_invoice=$row['IDFactura'];
					$date=$row['FechaFactura'];
					$customer_name=$row['NombreCompleto'];
					$total=$row["TotalVenta"];
					//$price=number_format($price,2);
					//$query_aux = mysqli_query($mysqli, "SELECT * FROM producto") or die('error: '.mysqli_error($mysqli));
					//$data = mysqli_fetch_assoc($query);
					if($row['Estado'] == "Enabled"){?>
						<tr>
							<td style="display: none;"><? echo $no; ?></td>
							<td><? echo $id_invoice; ?></td>
							<td><? echo $date; ?></td>
							<td><? echo $customer_name; ?></td>
							<td ><? echo $total; ?></td>
							<td >
								<span class="pull-right"><a class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Add" onclick="toBag('<? echo $id_invoice ?>')"><i style='color:#fff' class='glyphicon glyphicon-eye-open'></i></a>
								</span>
							</td>
						</tr>
					<?php
					}
					$no++;
				}
				?>
 				<tr>
					<td colspan=6><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>