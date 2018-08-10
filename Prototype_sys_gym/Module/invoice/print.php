<?php

    session_start();
    ob_start();

    require_once "../../Config/database.php";

    $query_bag = mysqli_query($mysqli,"SELECT * FROM shoppingBag");
    $count_bag = mysqli_num_rows($query_bag);

    if ($count_bag == 0) {
        echo "<script>alert('There aren't products in the invoice')</script>";
        echo "<script>window.close();</script>";
        //header("location: ../../main.php?module=form_new&alert=3");
        exit;
    }

    $dateInvoice = date("m/d/Y");
    $id_user = $_POST['id_user'];
    $id_customer = $_POST['id_customer'];
    $condition = $_POST['condition'];

    if ($condition == "Credit") {            
        $invoice_status = "Pending";
    }
    else{
        $invoice_status = "Paid";
    }

    $query_invoice_num = mysqli_query($mysqli, "SELECT MAX(IDFactura) AS IDLastInvoice 
        FROM factura ORDER BY IDFactura DESC LIMIT 0,1");

    $row_aux = mysqli_fetch_array($query_invoice_num);
    $IDLastInvoice = $row_aux['IDLastInvoice']+1;
?>

<?php
    $query_customer = mysqli_query($mysqli,"SELECT * FROM cliente WHERE IDCliente='$id_customer'")
        or die('error: '.mysqli_error($mysqli));

    $data_customer = mysqli_fetch_assoc($query_customer);

    $customer_name = $data_customer['NombreCompleto'];
    $email_customer = $data_customer['Correo'];
    $phone_customer = $data_customer['Telefono1'];
    $addres_customer = $data_customer['Direccion'];

    $query_user = mysqli_query($mysqli,"SELECT * FROM usuario WHERE IDUsuario='$id_user'")
        or die('error: '.mysqli_error($mysqli));

    $data_user = mysqli_fetch_assoc($query_user);
    $user_name = $data_user['NombreUsuario'];
?>


<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Invoice PDF</title>
        <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" />
        <style type="text/css">
            table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
        </style>
    </head>
    <body>
        <div>
            <table>
                <tr>
                    <td style="width: 25%; color: #444444;">
                        <img style="height:40px;width: 120px;" src="../../Content/assets/img/logo.png" alt="Logo">
                    </td>
                    <td style="width: 75%;text-align:right">
                        INVOICE N° <?php echo $IDLastInvoice;?>
                    </td>
                </tr>
            </table>          
        </div>
        <div>
           <table>
            <tr><td><span style="font-size:15px">SYSGYM</span></td></tr>
           </table>
        </div>
        <div>
           <table>
            <tr><td>Invoice PDF</td></tr>
           </table>
        </div>
        <div>
            <table>
                <tr>
                    <td style="width: 15%;">Customer:</td>
                    <td style="width: 30%"><?php echo $customer_name; ?> </td>
                </tr>
                <tr>
                    <td style="width: 15%;">Email:</td>
                    <td style="width: 30%"><?php echo $email_customer; ?></td>

                    <td style="width: 15%;text-align:right;"> Phone:</td>
                    <td style="width: 20%"><?php echo $phone_customer; ?> </td>
                </tr>
                <tr>
                    <td style="width: 450px;">Date <?php $date_1 = date_create($dateInvoice); echo date_format($dateInvoice,'m/d/Y'); ?></td>
                    <td style="width: 140px;text-align:right;">User:</td>
                    <td style="width: 15%"><?php echo $user_name; ?></td>
                </tr>
            </table>            
        </div>
      
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.1" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" style="width: 30px" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">Invoice N.</th>
                        <th height="20" align="center" valign="middle">Date</th>
                        <th height="20" align="center" valign="middle">Condition</th>
                        <th height="20" align="center" valign="middle">Invoice Status</th>
                        <th height="20" align="center" valign="middle">Total</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-left:5px;' width='50' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='50' height='13' align='right' valign='middle'></td>
                    <td width='90' height='13' align='center' valign='middle'></td>
                </tr>";
    }

    else {
        $total = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            $date_aux = date_create($data['FechaFactura']);
            $date_aux = date_format($date_aux,'m/d/Y');
            $total_aux = $data['TotalVenta'];
            $total_invoice = number_format($total_aux,2);
            $total+=$total_aux;
            echo "  <tr>
                        <td width='60' height='15' align='center' valign='middle'>$no</td>
                        <td width='90' height='15' align='center' valign='middle'>$data[IDFactura]</td>
                        <td width='120' height='15' align='center' valign='middle'>$date_aux</td>
                        <td width='110' height='15' align='center' valign='middle'>$data[Condicion]</td>
                        <td style='padding-left:5px;' width='155' height='15' valign='middle'>$data[EstadoFactura]</td>
                        <td style='padding-left:5px;' width='120' height='15' valign='middle'>$total_invoice</td>
                    </tr>";
            $no++;
        }
    }
?>
                </tbody>
                <tfoot>
                    <tr valign="middle">
                        <td colspan="5" style="text-align: right;height:15;"><strong>Total </strong></td>
                        <td style="text-align:center;height:15"><strong>$ <?php echo number_format($total,2); ?></strong></td>
                    </tr>
                </tfoot>
            </table>
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
        </div>
    </body>
</html>





<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
    <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    Page [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "wsullivan "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../Content/assets/img/logo.png" alt="Logo"><br>
                
            </td>
            <td style="width: 75%;text-align:right">
            INVOICE Nº <?php echo $IDLastInvoice;?>
            </td>
            
        </tr>
    </table>
    <br>
    <?
        $query_customer = mysqli_query($mysqli,"SELECT * FROM cliente WHERE IDCliente='$id_customer'")
                            or die('error: '.mysqli_error($mysqli));

        $data_customer = mysqli_fetch_assoc($query_customer);
        //$id_customer = $data['IDCliente'];
        $customer_name = $data_customer['NombreCompleto'];
        $email_customer = $data_customer['Correo'];
        $phone_customer = $data_customer['Telefono1'];
        $addres_customer = $data_customer['Direccion'];

        $query_user = mysqli_query($mysqli,"SELECT * FROM usuario WHERE IDUsuario='$id_user'")
                            or die('error: '.mysqli_error($mysqli));

        $data_user = mysqli_fetch_assoc($query_user);
        //$id_user = $data_user['IDUsuario'];
        $user_name = $data_user['NombreUsuario'];

    ?>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
        <td style="width:50%; "><strong>Address</strong> <br>Santa Rita, Rio Cuarto<br> Phone.: (+506)2465-0099</td>        
        </tr>
    </table>
    
<!--    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width: 100%;text-align:right">
            Date: <? //echo date("d-m-Y");?>
            </td>
        </tr>
    </table> -->
    
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width: 15%;">Customer:</td>
            <td style="width: 30%"><?php echo $customer_name; ?> </td>
            <td style="width: 15%;text-align:right;">Date:</td>
            <td style="width: 20%"><?php echo date("m-d-Y")?></td>
        </tr>
        <tr>
            
            <td style="width: 15%;">Email:</td>
            <td style="width: 30%"><?php echo $email_customer; ?></td>

            <td style="width: 15%;text-align:right;"> Phone:</td>
            <td style="width: 20%"><?php echo $phone_customer; ?> </td>
        </tr>
        <tr>
            <td style="width: 15%;"> Address:</td>
            <td style="width: 20%"><?php echo $addres_customer; ?> </td>
            <td style="width: 15%;text-align:right;">Sale By:</td>
            <td style="width: 20%"><?php echo $user_name; ?></td>
        </tr>
   
    </table>
    
        <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
        <tr>
             <!-- <td style="width:100%; ">A continuación Presentamos nuestra oferta que esperamos sea de su conformidad.</td> -->
        </tr>
    </table>

    <br>

    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;padding:1mm;">
        <tr>
            <th style="width: 10%">Q.</th>
            <th style="width: 60%">Description</th>
            <th style="width: 15%">Unit Price</th>
            <th style="width: 15%">Total Price</th>
            
        </tr>
    </table>
<?php

$sumador_total=0;

$query_sql = mysqli_query($mysqli, "SELECT producto.IDProducto AS productoID,producto.NombreProducto,producto.Cantidad,
                                    producto.Precio, shoppingBag.IDShoppingBag,shoppingBag.IDProducto AS productoBagID,
                                    shoppingBag.Quantity FROM producto, shoppingBag WHERE producto.IDProducto = shoppingBag.IDProducto")
                                or die('error: '.mysqli_error($mysqli));

while ($row=mysqli_fetch_array($query_sql))
{
    $id_shoppingBag    = $row["IDShoppingBag"];
    $id_product        = $row["productoID"];
    $id_productBag     = $row['productoBagID'];
    //$codigo_producto = $row['codigo_producto'];
    $bag_quantity      = $row['Quantity'];
    $product_name      = $row['NombreProducto'];
    //$id_marca_producto = $row['id_marca_producto'];

    // if (!empty($id_marca_producto))
    // {
    // $sql_marca=mysqli_query($mysqli,"select nombre_marca from marcas_demo where id_marca='$id_marca_producto'");
    // $rw_marca=mysqli_fetch_array($sql_marca);
    // $nombre_marca=$rw_marca['nombre_marca'];
    // $marca_producto=" ".strtoupper($nombre_marca);
    // }
    // else {$marca_producto='';}

    $precio_venta   =$row['Precio'];
    $precio_venta_f =number_format($precio_venta,2);//Formateo variables
    $precio_venta_r =str_replace(",","",$precio_venta_f);//Reemplazo las comas
    $precio_total   =$precio_venta_r*$bag_quantity;
    $precio_total_f =number_format($precio_total,2);//Precio total formateado
    $precio_total_r =str_replace(",","",$precio_total_f);//Reemplazo las comas
    $sumador_total+=$precio_total_r;//Sumador
    ?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black;  text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <td style="width: 10%; text-align: center"><?php echo $bag_quantity; ?></td>
            <td style="width: 60%; text-align: left"><?php echo $product_name;?></td>
            <td style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>
    </table>
    <?php 
    //Insert en la tabla detalle_cotizacion
    $insert_detail = mysqli_query($mysqli, "INSERT INTO detalleFactura (IDFactura,IDProducto,Cantidad,PrecioVenta,
        created_user,updated_user) VALUES ('$IDLastInvoice','$id_productBag','$bag_quantity','$precio_total','$id_user','$id_user')");
}

?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">TOTAL : </th>
            <th style="width: 13%; text-align: right;">&#36; <?php echo number_format($sumador_total,2);?></th>
        </tr>
    </table>
    *** Precios incluyen IVA ***
    
    <br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
                <td style="width:50%;text-align:right">Conditions: </td>
                <td style="width:50%; ">&nbsp;<?php echo $condition; ?></td>
            </tr>
            <tr>
                <td style="width:50%;text-align:right">Valid Until: </td>
                <td style="width:50%;">30 days</td>
            </tr>
<!--            <tr>
                <td style="width:50%;text-align:right">Tiempo de entrega: </td>
                <td style="width:50%; ">&nbsp;<? //echo $entrega; ?></td>
            </tr> -->
        </table>
    <br><br><br><br>
    
    
      <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
             <tr>
                <td style="width:33%;text-align: center;border-top:solid 1px">Vendedor</td>
               <td style="width:33%;text-align: center;border-top:solid 1px">Cotizado</td>
               <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
            </tr>
        </table>

</page>

<?
    $dateInvoice = date("Y-m-d");

    if ($id_customer == "") {
        # code...
        $insert = mysqli_query($mysqli,"INSERT INTO factura(FechaFactura,Condicion,TotalVenta,EstadoFactura,created_user,updated_user) VALUES ('$dateInvoice','$condition','$sumador_total','$invoice_status','$id_user','$id_user')");        
    }else{
        $insert = mysqli_query($mysqli,"INSERT INTO factura(FechaFactura,IDCliente,Condicion,TotalVenta,EstadoFactura,created_user,updated_user) VALUES ('$dateInvoice','$id_customer','$condition','$sumador_total','$invoice_status','$id_user','$id_user')");
    }

    $delete = mysqli_query($mysqli,"DELETE FROM shoppingBag");
?>




<?php
    $filename="Invoice.pdf"; 
    $content = ob_get_clean();
    $content = '<page style="font-family: freeserif">'.($content).'</page>';

    require_once('../../Content/assets/plugins/html2pdf_v4.03/html2pdf.class.php');

    try {
        $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($filename);
    }
    catch(HTML2PDF_exception $e) { 
        echo $e;
    }
?>