<?php 
/**

  Here start Role="Admin"

**/

if ($_SESSION['Role']=='Admin') { ?>

  <ul class="sidebar-menu">
    <li class="header"><h4><strong>MENU</strong></h3></li>
  	<?php

  	if ($_GET["module"]=="start") { 
  		$active_home="active";
  	} else {
  		$active_home="";
  	}
  	?>
  		<li class="<?php echo $active_home;?>">
  			<a href="?module=start"><i class="fa fa-home"></i> Home </a>
  	  	</li>
  	<?php

    if ($_GET["module"]=="collection_alert") { ?>
      <li class="active">
        <a href="?module=collection_alert"><i class="glyphicon glyphicon-warning-sign"></i> Alerta de Cobros </a>
        </li>
    <?php
    }

    else { ?>
      <li>
        <a href="?module=collection_alert"><i class="glyphicon glyphicon-warning-sign"></i> Alerta de Cobros </a>
        </li>
    <?php
    }

    if ($_GET["module"]=="payment_alert") { ?>
      <li class="active">
        <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alerta de Pagos </a>
        </li>
    <?php
    }

    else { ?>
      <li>
        <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alerta de Pagos </a>
        </li>
    <?php
    }

    if ($_GET["module"]=="invoice" || $_GET["module"]=="form_invoice") { ?>
      <li class="active">
        <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturar </a>
        </li>
    <?php
    }

    else { ?>
      <li>
        <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturar </a>
        </li>
    <?php
    }  

    if ($_GET["module"] == "customer" || $_GET["module"] == "form_customer") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active">
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>           
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "profileCustomer" || $_GET["module"] == "form_profileCustomer") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li class="active">
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"] == "billToPay" || $_GET["module"] == "form_billToPay") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li class="active">
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "plan" || $_GET["module"] == "form_plan") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li  class="active">
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "product" || $_GET["module"] == "form_product") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li class="active">
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li> 
      <?php
    }

     elseif ($_GET["module"] == "supplier" || $_GET["module"] == "form_supplier") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li class="active">
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "subscription" || $_GET["module"] == "form_subscription") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li class="active">
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }   

    elseif ($_GET["module"] == "user" || $_GET["module"] == "form_user") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li class="active">
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }  

    else { ?>
      <li class="treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    if ($_GET["module"]=="report_sales") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li class="active"><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }

    elseif ($_GET["module"]=="form_report_payment") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li class="active"><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }

    elseif ($_GET["module"]=="form_re_print") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li class="active"><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }  

  	else { ?>
  		<li class="treeview">
            	<a href="javascript:void(0);">
              	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            	</a>
        		<ul class="treeview-menu">
              <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
        		</ul>
      	</li>
      <?php
  	}

    if ($_GET["module"]=="product_stock") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Inventarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li class="active"><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Producto stock</a></li>
              <li><a href="?module=form_inventory_report"><i class="fa fa-circle-o"></i> Reporte Inventorio</a></li>
            </ul>
        </li>
      <?php
    }

    elseif ($_GET['module'] == "form_inventory_report") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Inventarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Producto stock</a></li>
              <li class="active"><a href="?module=form_inventory_report"><i class="fa fa-circle-o"></i> Reporte Inventorio</a></li>
            </ul>
        </li>
      <?php
    }
    else { ?>
      <li class="treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Inventarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Producto stock</a></li>
              <li><a href="?module=form_inventory_report"><i class="fa fa-circle-o"></i> Reporte Inventorio</a></li>
            </ul>
        </li>
      <?php
    }

    if ($_GET["module"]=="reset_password") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-lock"></i> <span>Change Password</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li class="active"><a href="?module=reset_password"><i class="fa fa-circle-o"></i> Resetear password a usuario</a></li>
              <li><a href="?module=password"><i class="fa fa-circle-o"></i> Cambiar mi password</a></li>
            </ul>
        </li>
      <?php
    }

    elseif($_GET['module'] == 'password') { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-lock"></i> <span>Change Password</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=reset_password"><i class="fa fa-circle-o"></i> Resetear password a usuario</a></li>
              <li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i> Cambiar mi password</a></li>
            </ul>
        </li>
      <?php
    }
    else { ?>
      <li class="treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-lock"></i> <span>Change Password</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=reset_password"><i class="fa fa-circle-o"></i> Resetear password a usuario</a></li>
              <li><a href="?module=password"><i class="fa fa-circle-o"></i> Cambiar mi password</a></li>
            </ul>
        </li>
      <?php
    }
    
    if ($_GET["module"]=="about") { ?>
      <li class="active">
        <a href="?module=about"><i class="glyphicon glyphicon-info-sign"></i> Acerca de</a>
      </li>
    <?php
    }
    else { ?>
      <li>
        <a href="?module=about"><i class="glyphicon glyphicon-info-sign"></i> Acerca de</a>
      </li>
    <?php
    }
    ?>
  	</ul>
    <br>

    <div style="text-align:center;padding:1em 0;">
      <h4><a style="text-decoration:none;">
      <span style="color:gray;">Time in</span>
      <br/>Costa Rica</a></h4>
        <div class="hero-unit-clock">
          <form name="clock">
            <input type="submit" style="width:140px; font-weight: bold; font-size: 16px; " onclick="return false" class="trans" name="face" value="" readonly>
          </form>
        </div>
    </div>
  <?php
}

  //-----------------------

  /**

    Here start Role="User"

  **/

elseif ($_SESSION['Role']=='User') { ?>
	<!-- sidebar menu start -->
  <ul class="sidebar-menu">
    <li class="header"><h4><strong>MENU</strong></h3></li>
  	<?php

    if ($_GET["module"]=="start") { 
      $active_home="active";
    } else {
      $active_home="";
    }
    ?>
      <li class="<?php echo $active_home;?>">
        <a href="?module=start"><i class="fa fa-home"></i> Home </a>
        </li>
    <?php

    if ($_GET["module"]=="collection_alert") { ?>
      <li class="active">
        <a href="?module=collection_alert"><i class="glyphicon glyphicon-warning-sign"></i> Alerta de Cobros </a>
        </li>
    <?php
    }

    else { ?>
      <li>
        <a href="?module=collection_alert"><i class="glyphicon glyphicon-warning-sign"></i> Alerta de Cobros </a>
        </li>
    <?php
    }

    if ($_GET["module"]=="payment_alert") { ?>
      <li class="active">
        <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alerta de Pagos</a>
        </li>
    <?php
    }

    else { ?>
      <li>
        <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alerta de Pagos</a>
        </li>
    <?php
    }

    if ($_GET["module"]=="invoice" || $_GET["module"]=="form_invoice") { ?>
      <li class="active">
        <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturar </a>
        </li>
    <?php
    }

    else { ?>
      <li>
        <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturar </a>
        </li>
    <?php
    }  

    if ($_GET["module"] == "customer" || $_GET["module"] == "form_customer") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active">
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "profileCustomer" || $_GET["module"] == "form_profileCustomer") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li class="active">
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"] == "billToPay" || $_GET["module"] == "form_billToPay") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li class="active">
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "plan" || $_GET["module"] == "form_plan") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li class="active">
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "product" || $_GET["module"] == "form_product") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li class="active">
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

     elseif ($_GET["module"] == "supplier" || $_GET["module"] == "form_supplier") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li class="active">
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"] == "subscription" || $_GET["module"] == "form_subscription") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li class="active">
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }   

    elseif ($_GET["module"] == "user" || $_GET["module"] == "form_user") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li class="active">
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }  

    else { ?>
      <li class="treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Negocio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="?module=customer"><i class="fa fa-circle-o"></i> Clientes</a>
          </li>
          <li>
            <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Clientes Perfil</a>
          </li>
          <li>
            <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Gastos</a>
          </li>
          <li>
            <a href="?module=plan"><i class="fa fa-circle-o"></i> Planes de Subscripcion</a>
          </li>         
          <li>
            <a href="?module=product"><i class="fa fa-circle-o"></i> Productos</a>
          </li>        
          <li>
            <a href="?module=supplier"><i class="fa fa-circle-o"></i> Proveedores</a>
          </li>
          <li>
            <a href="?module=subscription"><i class="fa fa-circle-o"></i> Subscripcion de Servicios</a>
          </li>
          <li>
            <a href="?module=user"><i class="fa fa-circle-o"></i> Usuarios</a>
          </li>
        </ul>
      </li>
      <?php
    }

    if ($_GET["module"]=="report_sales") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li class="active"><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }

    elseif ($_GET["module"]=="form_report_payment") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li class="active"><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }

    elseif ($_GET["module"]=="form_re_print") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li class="active"><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }  

    else { ?>
      <li class="treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte ventas por fecha</a></li>
              <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Gastos por fecha</a></li>
              <li><a href="?module=form_re_print"><i class="fa fa-circle-o"></i> Reimprimir factura</a></li>
            </ul>
        </li>
      <?php
    }

    if ($_GET["module"]=="product_stock") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Inventorios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li class="active"><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Producto stock</a></li>
              <li><a href="?module=form_inventory_report"><i class="fa fa-circle-o"></i> Reporte Inventorio</a></li>
            </ul>
        </li>
      <?php
    }

    elseif ($_GET['module'] == "form_inventory_report") { ?>
      <li class="active treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Inventorios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Producto stock</a></li>
              <li class="active"><a href="?module=form_inventory_report"><i class="fa fa-circle-o"></i> Reporte Inventorio</a></li>
            </ul>
        </li>
      <?php
    }
    else { ?>
      <li class="treeview">
              <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Inventorios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Producto stock</a></li>
              <li><a href="?module=form_inventory_report"><i class="fa fa-circle-o"></i> Reporte Inventorio</a></li>
            </ul>
        </li>
      <?php
    }

  	if ($_GET["module"]=="password") { ?>
  		<li class="active">
  			<a href="?module=password"><i class="fa fa-lock"></i> Change Password</a>
  		</li>
  	<?php
  	}
  	else { ?>
  		<li>
  			<a href="?module=password"><i class="fa fa-lock"></i> Change Password</a>
  		</li>
  	<?php
  	}
  	?>
  </ul>
  <br>
  <div style="text-align:center;padding:1em 0;">
    <h4><a style="text-decoration:none;">
    <span style="color:gray;">Time in</span>
    <br/>Costa Rica</a></h4>
      <div class="hero-unit-clock">
        <form name="clock">
          <input type="submit" style="width:140px; font-weight: bold; font-size: 16px; " onclick="return false" class="trans" name="face" value="" readonly>
        </form>
      </div>
  </div>
<?php
}