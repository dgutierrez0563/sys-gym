<?php

    session_start();
    ob_start();

    require_once "../../Config/database.php";

    $query_bag = mysqli_query($mysqli,"SELECT * FROM shoppingBag");
    $count_bag = mysqli_num_rows($query_bag);

    if ($count_bag == 0) { ?>
        <script>
            alert("Error!\nThere aren't products in the invoice");
            window.close();
        </script>
    <?php
        echo alert();
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

<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >

    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../Content/assets/img/sysgym.png" alt="Logo"><br>
            </td>
            <td style="width: 75%;text-align:right">
            INVOICE No. <?php echo $IDLastInvoice;?>
            </td>
        </tr>
    </table>
    <br>
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
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
        <td style="width:50%; "><strong>Address</strong> <br>Santa Rita, Rio Cuarto<br> Phone.: (+506)2465-0099</td>        
        </tr>
    </table>
    <br>

            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
                <tr>
                    <td style="width: 15%;">Customer: </td>
                    <td style="width: 60%"><?php echo $customer_name; ?> </td>
                    <td style="width: 10px;text-align: left;">Date: </td>
                    <td style="width: 15%"><?php echo $dateInvoice; ?></td>
                </tr>
                <tr>
                    <td style="width: 15%;">Email: </td>
                    <td style="width: 60%"><?php echo $email_customer; ?></td>

                    <td style="width: 10%;text-align:left;"> Phone:</td>
                    <td style="width: 15%"><?php echo $phone_customer; ?> </td>
                </tr>
                <tr>
                    <td style="width: 15%;"> Address:</td>
                    <td style="width: 60%;"><?php echo $addres_customer; ?> </td>
                    <td style="width: 10px;text-align:left;">User: </td>
                    <td style="width: 15%;"><?php echo $user_name; ?></td>
                </tr>
            </table>

    
        <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
        <tr>
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
$sum_result = 0;

$query_sql = mysqli_query($mysqli, "SELECT producto.IDProducto AS productoID,producto.NombreProducto,
    producto.Cantidad,producto.Precio,shoppingBag.IDShoppingBag,shoppingBag.IDProducto AS productoBagID,
    shoppingBag.Quantity FROM producto, shoppingBag
    WHERE producto.IDProducto = shoppingBag.IDProducto")
    or die('error: '.mysqli_error($mysqli));

while ($row=mysqli_fetch_array($query_sql))
{
    $qty_stock         = $row['Cantidad'];
    $id_shoppingBag    = $row["IDShoppingBag"];
    $id_product        = $row["productoID"];
    $id_productBag     = $row['productoBagID'];
    $bag_quantity      = $row['Quantity'];
    $product_name      = $row['NombreProducto'];

    $precio_venta   =$row['Precio'];
    $precio_venta_f =number_format($precio_venta,2);//Formateo variables
    $precio_venta_r =str_replace(",","",$precio_venta_f);//Reemplazo las comas
    $precio_total   =$precio_venta_r*$bag_quantity;
    $precio_total_f =number_format($precio_total,2);//Precio total formateado
    $precio_total_r =str_replace(",","",$precio_total_f);//Reemplazo las comas
    $sumador_total+=$precio_total_r;//Sumador

    $sum_result = $qty_stock-$bag_quantity;

    ?>
    <table cellspacing="0" style="width: 100%; border: solid 0.1px black;  text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <td style="width: 10%; text-align: center"><?php echo $bag_quantity; ?></td>
            <td style="width: 60%; text-align: left"><?php echo $product_name;?></td>
            <td style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>
    </table>
    <?php 
    $insert_detail = mysqli_query($mysqli, "INSERT INTO detalleFactura (IDFactura,IDProducto,Cantidad,PrecioVenta,
                    created_user,updated_user) VALUES ('$IDLastInvoice','$id_productBag','$bag_quantity',
                    '$precio_total','$id_user','$id_user')");
    $update_stock = mysqli_query($mysqli,"UPDATE producto SET Cantidad  = '$sum_result',
                                                    updated_user = '$id_user'
                                                    WHERE IDProducto = '$id_product'");
}

?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">Total en colones : </th>
            <th style="width: 13%; text-align: right;"><?php echo number_format($sumador_total,2);?></th>
        </tr>
    </table>
    <p>
    *** Includes IVA ***
    </p>
    <br>
    <br><br><br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
                <td style="width:50%;text-align:right">Conditions: </td>
                <td style="width:50%; ">&nbsp;<?php echo $condition; ?></td>
            </tr>
            <tr>
                <td style="width:50%;text-align:right">Valid Until:</td>
                <td style="width:50%;"> 30 days</td>
            </tr>
        </table>
    <br><br><br><br>
    
    <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:33%;text-align: center;border-top:solid 1px">Seller</td>
            <td style="width:33%;text-align: center;border-top:solid 0px"></td>
            <td style="width:33%;text-align: center;border-top:solid 1px">Accepted by Customer</td>
        </tr>
    </table>
    <page_footer>
        <style type="text/css">
            table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
        </style>
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
</page>

<?php
    $dateInvoice = date("Y-m-d");
    $type = "Sales";

    if ($id_customer == "") {        
        $insert = mysqli_query($mysqli,"INSERT INTO factura(FechaFactura,Condicion,TotalVenta,EstadoFactura,Tipo,created_user,updated_user) 
            VALUES ('$dateInvoice','$condition','$sumador_total','$invoice_status','$type','$id_user','$id_user')");        
    }else{
        $insert = mysqli_query($mysqli,"INSERT INTO factura(FechaFactura,IDCliente,Condicion,TotalVenta,EstadoFactura,created_user,updated_user) 
            VALUES ('$dateInvoice','$id_customer','$condition','$sumador_total',
            '$invoice_status','$id_user','$id_user')");
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