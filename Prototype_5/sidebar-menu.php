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
      <a href="?module=collection_alert"><i class="glyphicon glyphicon-warning-sign"></i> Alertas de Cobro </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=collection_alert"><i class="glyphicon glyphicon-warning-sign"></i> Alertas de Cobro </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="payment_alert") { ?>
    <li class="active">
      <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alertas de Pagos </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alertas de Pago </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="invoice" || $_GET["module"]=="form_invoice") { ?>
    <li class="active">
      <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturacion </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturacion </a>
      </li>
  <?php
  }  

  if ($_GET["module"] == "customer" || $_GET["module"] == "form_customer") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="active">
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>         
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>        
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>
    <?php
  }

  elseif ($_GET["module"] == "billToPay" || $_GET["module"] == "form_billToPay") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li class="active">
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>        
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>
    <?php
  }

  elseif ($_GET["module"] == "profileCustomer" || $_GET["module"] == "form_profileCustomer") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li class="active">
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>     
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>        
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>
    <?php
  }

  elseif ($_GET["module"] == "plan" || $_GET["module"] == "form_plan") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li class="active">
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>        
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>
    <?php
  }

  elseif ($_GET["module"] == "product" || $_GET["module"] == "form_product") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>     
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li class="active">
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>        
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>        
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>    
    <?php
  }

   elseif ($_GET["module"] == "supplier" || $_GET["module"] == "form_supplier") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>            
        <li class="active">
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>    
    <?php
  }

  elseif ($_GET["module"] == "subscription" || $_GET["module"] == "form_subscription") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>            
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li class="active">
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>        
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>    
    <?php
  }   

  elseif ($_GET["module"] == "user" || $_GET["module"] == "form_user") { ?>
    <li class="active treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>            
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>        
        <li class="active">
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>    
    <?php
  }  

  else { ?>
    <li class="treeview">
      <a href="javascript:void(0);">
        <i class="glyphicon glyphicon-list-alt"></i><span>Gestion de Controles</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="?module=customer"><i class="fa fa-circle-o"></i> Control de Clientes</a>
        </li>
        <li>
          <a href="?module=billToPay"><i class="fa fa-circle-o"></i> Control de Gastos</a>
        </li>
        <li>
          <a href="?module=profileCustomer"><i class="fa fa-circle-o"></i> Control de Perfil Clientes</a>
        </li>
        <li>
          <a href="?module=plan"><i class="fa fa-circle-o"></i> Control de Planes</a>
        </li>
        <li>
          <a href="?module=product"><i class="fa fa-circle-o"></i> Control de Productos</a>
        </li>            
        <li>
          <a href="?module=supplier"><i class="fa fa-circle-o"></i> Control de Proveedores</a>
        </li>
        <li>
          <a href="?module=subscription"><i class="fa fa-circle-o"></i> Control de Subscripcion</a>
        </li>        
        <li>
          <a href="?module=user"><i class="fa fa-circle-o"></i> Control de Usuarios</a>
        </li>           
      </ul>
    </li>   
    <?php
  }

  if ($_GET["module"]=="report_sales") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte de venta por fecha</a></li>
            <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Reporte de pagos por fecha</a></li>
          </ul>
      </li>
    <?php
  }

  elseif ($_GET["module"]=="form_report_payment") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte de venta por fecha</a></li>
            <li class="active"><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Reporte de pagos por fecha</a></li>
          </ul>
      </li>
    <?php
  }

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
            <li><a href="?module=report_sales"><i class="fa fa-circle-o"></i> Reporte de venta por fecha</a></li>
            <li><a href="?module=form_report_payment"><i class="fa fa-circle-o"></i> Reporte de pagos por fecha</a></li>
      		</ul>
    	</li>
    <?php
	}

  if ($_GET["module"]=="product_stock") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Inventory</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Product Stock</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Reporte de Inventario</a></li>
          </ul>
      </li>
    <?php
  }

  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Inventory</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=product_stock"><i class="fa fa-circle-o"></i> Product Stock</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Reporte de Inventario</a></li>
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
  <ul>
  </br>
<!--     <li>
      <div class="hero-unit-clock">
        <form name="clock">
          <font color="white"><i class="fa fa-time"></i> Time <br></font>&nbsp;<input style="width:150px;" class="trans" name="face" value="" readonly>
        </form>
      </div>
    </li> -->
  </ul>
  <div style="text-align:center;padding:1em 0;">
    <h4><a style="text-decoration:none;">
    <span style="color:gray;">Hora actual en</span>
    <br/>Costa Rica</a></h4>
      <div class="hero-unit-clock">
        <form name="clock">
          <input type="submit" style="width:140px; font-weight: bold; font-size: 16px; " onclick="return false" class="trans" name="face" value="" readonly>
        </form>
      </div>
  </div>
<?php
}

/**

  Here over Role="Admin"

**/

//-----------------------


/**

  Here start Role="User"

**/

elseif ($_SESSION['Role']=='User') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>
	<?php 

	if ($_GET["module"]=="start") { ?>
		<li class="active">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

  if ($_GET["module"]=="medicines_transaction" || $_GET["module"]=="form_medicines_transaction") { ?>
    <li class="active">
      <a href="?module=medicines_transaction"><i class="glyphicon glyphicon-warning-sign"></i> Alertas de Cobro </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=medicines_transaction"><i class="glyphicon glyphicon-warning-sign"></i> Alertas de Cobro </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="payment_alert") { ?>
    <li class="active">
      <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alertas de Pagos </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=payment_alert"><i class="glyphicon glyphicon-exclamation-sign"></i> Alertas de Pago </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="invoice" || $_GET["module"]=="form_invoice") { ?>
    <li class="active">
      <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturacion </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=invoice"><i class="glyphicon glyphicon-shopping-cart"></i> Facturacion </a>
      </li>
  <?php
  }  
  
  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Text Here</a></li>
            <li><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de Text Here </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="stock_report") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Text Here </a></li>
            <li class="active"><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de Text Here </a></li>
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
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i>  Stock de Text Here </a></li>
            <li><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de Text Here </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
  <div style="text-align:center;padding:1em 0;">
    <h4><a style="text-decoration:none;">
    <span style="color:gray;">Hora actual en</span>
    <br/>Costa Rica</a></h4>
      <div class="hero-unit-clock">
        <form name="clock">
          <input type="submit" style="width:140px; font-weight: bold; font-size: 16px; " onclick="return false" class="trans" name="face" value="" readonly>
        </form>
      </div>
  </div>

<?php

/**

  Here over Role="User"

**/

//-----------------------

}

if ($_SESSION['Role']=='Usuario') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="medicines" || $_GET["module"]=="form_medicines") { ?>
    <li class="active">
      <a href="?module=medicines"><i class="fa fa-folder"></i> Datos de Text Here </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines"><i class="fa fa-folder"></i> Datos de Text Here </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="medicines_transaction" || $_GET["module"]=="form_medicines_transaction") { ?>
    <li class="active">
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de Text Here </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de Text Here </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Text Here </a></li>
            <li><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de Text Here </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="stock_report") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Text Here </a></li>
            <li class="active"><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de Text Here </a></li>
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
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Text Here </a></li>
            <li><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de Text Here </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}?>