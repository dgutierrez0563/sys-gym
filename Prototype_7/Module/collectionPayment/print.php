<?php

ob_start();

require_once "../../Config/database.php";

if (isset($_GET['id'])) {
    $id_invoice = $_GET['id'];
    $no    = 1;
    
    $query = mysqli_query($mysqli, "SELECT factura.IDFactura AS facturaID, factura.FechaFactura,factura.IDCliente,
                                    factura.TotalVenta,factura.EstadoFactura,factura.created_user,factura.Condicion,
                                    cliente.IDCliente AS clienteID,cliente.NombreCompleto AS clienteName,cliente.Correo,
                                    cliente.Telefono1,cliente.Direccion,usuario.IDUsuario AS usuarioID,
                                    usuario.NombreUsuario AS userName,producto.IDProducto AS productoID,
                                    producto.NombreProducto,detalleFactura.IDDetalle,detalleFactura.IDFactura,
                                    detalleFactura.IDProducto,detalleFactura.Cantidad,detalleFactura.PrecioVenta
                                    FROM factura,cliente,usuario,producto,detalleFactura
                                    WHERE factura.IDFactura='$id_invoice'
                                    AND detalleFactura.IDFactura='$id_invoice'
                                    AND factura.IDCliente=cliente.IDCliente
                                    AND factura.created_user=usuario.IDUsuario
                                    AND producto.IDProducto=detalleFactura.IDProducto
                                    ORDER BY detalleFactura.IDDetalle ASC") 
                                    or die('error '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
    $data_aux = mysqli_fetch_assoc($query);
}

?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>INFORME DE STOCK</title>
        <link rel="stylesheet" type="text/css" href="../../Content/assets/css/laporan.css" />
    </head>
    <body>

        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td style="width: 25%; color: #444444;">
                    <!-- <img style="width: 100%;" src="../../Content/assets/img/logo.png" alt="Logo"><br>                     -->
                </td>
                <td style="width: 75%;text-align:right">
                    FACTURA Nº <? echo $data_aux['IDFactura'];?>
                </td>                
            </tr>
        </table>
        <br>
        
        <hr><br>
        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
            <tr>
            <td style="width:50%; "><strong>Direccion</strong> <br>Santa Rita, Rio Cuarto<br> Phone.: (+506)2465-0099</td>        
            </tr>
        </table>

        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
                <td style="width: 15%;">Cliente:</td>
                <td style="width: 30%"><? echo $data_aux['NombreCompleto']; ?> </td>
                <td style="width: 15%;text-align:right;">Date:</td>
                <td style="width: 20%">
                    <? $date_aux=date_create($data_aux['FechaFactura']); 
                        $date_aux=date_format($date_aux,'m/d/Y'); echo $date_aux;?>
                </td>
            </tr>
            <tr>                
                <td style="width: 15%;">Correo:</td>
                <td style="width: 30%"><? echo $data_aux['Correo']; ?></td>

                <td style="width: 15%;text-align:right;"> Phone:</td>
                <td style="width: 20%"><? echo $data_aux['Telefono1']; ?> </td>
            </tr>
            <tr>
                <td style="width: 15%;"> Direccion:</td>
                <td style="width: 20%"><? echo $data_aux['Direccion']; ?> </td>
                <td style="width: 15%;text-align:right;">Sale By:</td>
                <td style="width: 20%"><? echo $data_aux['NombreUsuario']; ?></td>
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
                <th style="width: 60%">Descripcion</th>
                <th style="width: 15%">Precio unitario</th>
                <th style="width: 15%">Total</th>
                
            </tr>
        </table>

        <?php
            $total_price_invoice = 0;
            $total = 0;
            while ($data_aux=mysqli_fetch_assoc($query)) { 
                $price_sale = $data_aux['PrecioVenta'];
                $total_price_sale = number_format($price_sale,2);
                $quantity_sale = $data_aux['Cantidad'];
                $price_unit = $price_sale/$quantity_sale;
                $price_unit = number_format($price_unit,2);
                $total_price_invoice+=$price_sale;
                //$total = number_format($total_price_invoice,2);
                
                ?>
                
                <table cellspacing="0" style="width: 100%; border: solid 1px black;  text-align: center; font-size: 11pt;padding:1mm;">
                    <tr>
                        <td style="width: 10%; text-align: center"><?php echo $data_aux['Cantidad']; ?></td>
                        <td style="width: 60%; text-align: left"><? echo $data_aux['NombreProducto'];?></td>
                        <td style="width: 15%; text-align: right"><? echo $price_unit;?></td>
                        <td style="width: 15%; text-align: right"><? echo $total_price_sale;?></td>                        
                    </tr>
                </table>
                
                <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
                    <tr>
                        <th style="width: 87%; text-align: right;">TOTAL : </th>
                        <th style="width: 13%; text-align: right;">&#36; <? echo number_format($total_price_invoice,2);?></th>
                    </tr>
                </table>
                <br><br><br><br>
    
    
                <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
                     <tr>
                        <td style="width:33%;text-align: center;border-top:solid 1px">Vendedor</td>
                       <td style="width:33%;text-align: center;border-top:solid 1px">Cotizado</td>
                       <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
                    </tr>
                </table>
            <?php } ?>
    </body>
</html>
<?php
    $filename="Invoice.pdf"; 
    //==========================================================================================================
    $content = ob_get_clean();
    $content = '<page style="font-family: freeserif">'.($content).'</page>';

    require_once ('../../Content/assets/plugins/html2pdf_v4.03/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($filename);
    }
    catch(HTML2PDF_exception $e) { echo $e; }
?>