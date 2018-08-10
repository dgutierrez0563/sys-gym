<?php
	session_start();
	ob_start();

	require_once "../../Config/database.php";

	//$id_invoice = $_GET['id_invoice'];

	//if (isset($_GET['id_invoice'])) {
	$status_product = "Enabled";
    $no    = 1;
    
    $query_inventory = mysqli_query($mysqli, "SELECT producto.IDProducto,producto.NombreProducto,producto.Precio,
    									producto.Cantidad,producto.Estado,proveedor.IDProveedor,
    									proveedor.NombreProveedor
	                                    FROM producto,proveedor
	                                    WHERE producto.IDProveedor=proveedor.IDProveedor
	                                    AND producto.Estado='$status_product'") 
	                                    or die('Error '.mysqli_error($mysqli));

	$count  = mysqli_num_rows($query_inventory);
	//$data_f = mysqli_fetch_assoc($query_inventory);;
	//}
?>

<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Report Sales</title>
        <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" />
        <style type="text/css">
            table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
        </style>
    </head>
    <body>
    <br>
        <div>
          <img style="height:40px;width: 120px;" src="../../Content/assets/img/sysgym.png" alt="Logo">
        </div>
        <br>
        <br>
        <div>
           <table>
            <tr><td><span style="font-size:15px">SYSGYM</span></td></tr>
           </table>
        </div>
        <div>
           <table>
            <tr><td>Inventory Report</td></tr>
           </table>
        </div>
        <div>
            <table>
                <tr>
                    <td style="width: 450px;">Date: <?php echo date('m/d/Y'); ?></td>
                    <td style="width: 170px;text-align:right;">User:</td>
                    <td style="width: 15%"><?php echo $_SESSION['NombreUsuario']; ?></td>
                </tr>
            </table>            
        </div>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.1" cellpadding="0" cellspacing="0" style="margin-left: 6px;">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" style="width: 30px" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">Product</th>
                        <th height="20" style="width: 30px" align="center" valign="middle">Cod.</th>
                        <th height="20" align="center" valign="middle">Price</th>
                        <th height="20" align="center" valign="middle">Supplier</th>
                        <th height="20" align="center" valign="middle">Quantity / U.</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    
    if($count == 0) {
        echo "  <tr>
                    <td width='60' height='15' align='center' valign='middle'>
                    <td width='175' height='15' align='center' valign='middle'></td>
                    <td width='60' height='15' align='center' valign='middle'></td>
                    <td width='110' height='15' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='175' height='15' valign='middle'></td>
                    <td width='75' height='15' align='center' valign='middle'></td>
                </tr>";
    }

    else {
        $total = 0;
        while ($data = mysqli_fetch_assoc($query_inventory)) {
            //$date_aux = date_create($data['FechaFactura']);
            //$date_aux = date_format($date_aux,'m/d/Y');
        	$id_product = $data['IDProducto'];
        	$product = $data['NombreProducto'];
        	$price = number_format($data['Precio'],2);
            $qty = $data['Cantidad'];
            $supplier = $data['NombreProveedor'];
            //$total_aux = $data['TotalVenta'];
            //$total_invoice = number_format($total_aux,2);
            //$total+=$total_aux;
            echo "  <tr>
                        <td width='60' height='15' align='center' valign='middle'>$no</td>
                        <td width='175' height='15' align='left' valign='middle'>$product</td>
                        <td width='60' height='15' align='center' valign='middle'>$id_product</td>
                        <td width='110' height='15' align='center' valign='middle'>$price</td>
                        <td style='padding-left:5px;' align='left' width='175' height='15' valign='middle'>$supplier</td>
                        <td width='75' height='15' align='center' valign='middle'>$qty</td>
                    </tr>";
            $no++;
        }
    }
	?>
                </tbody>
                <tfoot>
                    <tr valign="middle">
                        <td colspan="6" style="text-align: center;height: 18px;">--- Last line ---</td>
                    </tr>
                </tfoot>
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
	$filename="Inventory report.pdf"; 
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