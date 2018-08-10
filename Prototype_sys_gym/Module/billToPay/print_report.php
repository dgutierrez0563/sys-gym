<?php
session_start();
ob_start();


require_once "../../Config/database.php";


$date_initial = $_GET['date_initial'];
$date_final = $_GET['date_final'];

if (isset($_GET['date_initial']) && isset($_GET['date_final'])) {
    $no    = 1;
    
    $query = mysqli_query($mysqli, "SELECT cuentaGastos.IDCuentaGastos,cuentaGastos.IDProveedor AS cproveedorID,
                                    cuentaGastos.NumeroFactura,cuentaGastos.Monto,cuentaGastos.FechaFactura,
                                    cuentaGastos.FechaVencimiento,cuentaGastos.created_user,
                                    cuentaGastos.EstadoFactura,proveedor.IDProveedor AS proveedorID,
                                    proveedor.NombreProveedor
                                    FROM cuentaGastos,proveedor WHERE FechaFactura
                                    BETWEEN '$date_initial' AND '$date_final'
                                    AND cuentaGastos.IDProveedor=proveedor.IDProveedor
                                    ORDER BY cuentaGastos.IDCuentaGastos ASC") 
                                    or die('error '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
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
            <tr><td>Payments Report</td></tr>
           </table>
        </div>
    <?php  
    if ($date_initial==$date_final) { ?>
        <div>
            <table>
                <tr>
                    <td style="width: 450px;">Date <?php $date_1 = date_create($date_initial); echo date_format($date_1,'m/d/Y'); ?></td>
                    <td style="width: 170px;text-align:right;">User:</td>
                    <td style="width: 15%"><?php echo $_SESSION['NombreUsuario']; ?></td>
                </tr>
            </table>            
        </div>
    <?php
    } else { ?>
        <div>
            <table>
                <tr>
                    <td style="width: 450px;">Date from <?php $date_1 = date_create($date_initial); $date_2 = date_create($date_final); echo date_format($date_1,'m/d/Y'); ?> to <?php echo date_format($date_2,'m/d/Y'); ?></td>            
                    <td style="width: 170px;text-align:right;">User:</td>
                    <td style="width: 15%"><?php echo $_SESSION['NombreUsuario']; ?></td>
                </tr>
            </table>            
        </div>
    <?php
    }
    ?>
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.1" cellpadding="0" cellspacing="0" style="margin-left: 6px;">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" style="width: 30px" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">Invoice N.</th>
                        <th height="20" align="center" valign="middle">Date</th>
                        <th height="20" align="center" valign="middle">Supplier</th>
                        <th height="20" align="center" valign="middle">Invoice Status</th>
                        <th height="20" align="center" valign="middle">Amount</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                if($count == 0) {
                    ?>
                    <tr>
                        <td width='60' height='15' align='center' valign='middle'></td>
                        <td width='90' height='15' align='center' valign='middle'></td>
                        <td width='110' height='15' align='center' valign='middle'></td>
                        <td width='190' height='15' align='center' valign='middle'></td>
                        <td style='padding-left:5px;' width='100' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='110' height='13' valign='middle'></td>
                    </tr>
               <?php }

                else {

                    $total = 0;
                    while ($data = mysqli_fetch_assoc($query)) {

                        $date_aux = date_create($data['FechaFactura']);
                        $date_aux = date_format($date_aux,'m/d/Y');
                        $total_aux = $data['Monto'];
                        $total_invoice = number_format($total_aux,2);
                        $total+=$total_aux;

                        if ($data['EstadoFactura'] == "Credit") {
                            $status_invoice = "Pending";
                        }
                        else{
                            $status_invoice = "Paid";
                        }
                        echo "  <tr>
                                    <td width='60' height='15' align='center' valign='middle'>$no</td>
                                    <td width='90' height='15' align='center' valign='middle'>$data[NumeroFactura]</td>
                                    <td width='110' height='15' align='center' valign='middle'>$date_aux</td>
                                    <td width='190' height='15' align='center' valign='middle'>$data[NombreProveedor]</td>
                                    <td style='padding-left:5px;' align='center' width='100' height='15' valign='middle'>$status_invoice</td>
            						<td style='padding-left:5px;' width='110' height='15' valign='middle'>$total_invoice</td>
                                </tr>";
                        $no++;
                    }
                }
                ?>
                </tbody>
                <tfoot>
                    <tr valign="middle">
                        <td colspan="5" style="text-align: right;height:15;"><strong>Total en colones </strong></td>
                        <td style="text-align:center;height:15">
                            <strong><?php if ($count == 0) {
                                echo number_format(0,2);
                            } else {
                                echo number_format($total,2); }?>
                            </strong>
                        </td>
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
$filename="Report Payment.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

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