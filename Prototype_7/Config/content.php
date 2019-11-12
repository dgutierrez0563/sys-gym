<?php

if (empty($_SESSION['NombreUsuario']) && empty($_SESSION['Contrasenia'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {

	if ($_SESSION['Role'] == 'Admin') {

		//section for module start
		if ($_GET['module'] == 'start') {
			include "Module/start/view.php";
		}
		//elseif ($_GET['module'] == 'financiero') {
		//	include "Module/grafics/status.php";
		//}
		elseif ($_GET['module'] == 'financiero') {
			include "Module/grafics/financial_graf.php";
		}

		elseif ($_GET['module'] == 'viewBag') {
			include "Config/ajax/toshoppingBag.php";
		}
		//section for module billToPay
		elseif ($_GET['module'] == 'billToPay') {
			include "Module/billToPay/view.php";
		}
		elseif ($_GET['module'] == 'form_billToPay') {
			include "Module/billToPay/form.php";
		}
		elseif ($_GET['module'] == 'detailExpsense') {
			include "Module/billToPay/detail.php";
		}
		elseif ($_GET['module'] == 'payment_alert') {
			include "Module/billToPay/payment_alert.php";
		}

		//section for module collection alert
		elseif ($_GET['module'] == 'collection_alert') {
			include "Module/collectionPayment/view.php";
		}
		elseif ($_GET['module'] == 'detailCollecttion') {
			include "Module/collectionPayment/detail.php";
		}

		//section for module customer
		elseif ($_GET['module'] == 'profileCustomer') {
			include "Module/profileCustomer/view.php";
		}
		elseif ($_GET['module'] == 'form_profileCustomer') {
			include "Module/profileCustomer/form.php";
		}
		elseif ($_GET['module'] == 'viewProfileCustomer') {
			include "Module/profileCustomer/profile.php";
		}
		elseif ($_GET['module'] == 'customer') {
			include "Module/customer/view.php";
		}
		elseif ($_GET['module'] == 'form_customer') {
			include "Module/customer/form.php";
		}
		elseif ($_GET['module'] == 'viewprofileCustomer') {
			include "Module/customer/profile.php";
		}

		//section for module subscription
		elseif ($_GET['module'] == 'subscription') {
			include "Module/subscription/view.php";
		}
		elseif ($_GET['module'] == 'form_subscription') {
			include "Module/subscription/form.php";
		}

		//section for module plan
		elseif ($_GET['module'] == 'plan') {
			include "Module/plan/view.php";
		}
		elseif ($_GET['module'] == 'form_plan') {
			include "Module/plan/form.php";
		}
		elseif ($_GET['module'] == 'detailPlan') {
			include "Module/plan/detail.php";
		}

		//section for module supplier
		elseif ($_GET['module'] == 'supplier') {
			include "Module/supplier/view.php";
		}
		elseif ($_GET['module'] == 'form_supplier') {
			include "Module/supplier/form.php";
		}
		elseif ($_GET['module'] == 'profileSupplier') {
			include "Module/supplier/profile.php";
		}

		//section for module product
		elseif ($_GET['module'] == 'product') {
			include "Module/product/view.php";
		}
		elseif ($_GET['module'] == 'form_product') {
			include "Module/product/form.php";
		}
		elseif ($_GET['module'] == 'form_stock') {
			include "Module/product/form_stock.php";
		}
		elseif ($_GET['module'] == 'product_stock') {
			include "Module/product/view_stock.php";
		}
		elseif ($_GET['module'] == 'detailProduct') {
			include "Module/product/detail.php";
		}
		elseif($_GET['module'] == 'form_inventory_report'){
			include "Module/product/form_inventory.php";
		}

		//section for module invoice
		elseif ($_GET['module'] == 'invoice') {
			include "Module/invoice/view.php";
		}
		elseif ($_GET['module'] == 'form_invoice') {
			include "Module/invoice/form.php";
		}
		elseif($_GET['module'] == 'form_new'){
			include "Module/invoice/new_invoice.php";
		}
		elseif ($_GET['module'] == 'viewDetail') {
			include "Module/invoice/file.php";
		}
		elseif ($_GET['module'] == 'edit_invoice') {
			include "Module/invoice/edit_invoice.php";
		}

		//Section for module user
		elseif ($_GET['module'] == 'user') {
			include "Module/user/view.php";
		}
		elseif ($_GET['module'] == 'form_user') {
			include "Module/user/form.php";
		}
		elseif ($_GET['module'] == 'viewprofileUser') {
			include "Module/user/profile.php";
		}
		elseif ($_GET['module'] == 'profileUserOn') {
			include "Module/profileUser/view.php";
		}
		elseif ($_GET['module'] == 'form_profileUserEdit') {
		 	include "Module/profileUser/form.php";
		}

		//section for module password
		elseif ($_GET['module'] == 'password') {
		 	include "Module/password/view.php";
		}
		elseif ($_GET['module'] == 'reset_password') {
		 	include "Module/password/form.php";
		}

		//section for reports
		elseif ($_GET['module'] == 'report_sales') {
		 	include "Module/report/report_sales.php";
		}
		elseif ($_GET['module'] == 'form_report_payment') {
		 	include "Module/billToPay/form_report.php";
		}
		elseif ($_GET['module'] == 'form_re_print') {
		 	include "Module/report/form_reprint_invoice.php";
		}
		 //section for grafics
		elseif ($_GET['module'] == 'sales_trends') {
		 	include "Module/grafics/view.php";
		}
		elseif($_GET['module'] == 'about'){
			include "Module/about/view.php";
		}
	}
	//Conditions for user
	elseif($_SESSION['Role'] == 'User') {
		//section for module start
		if ($_GET['module'] == 'start') {
			include "Module/start/view.php";
		}
		//section for grafics
		elseif ($_GET['module'] == 'financiero') {
			include "Module/grafics/financial_graf.php";
		}
		elseif ($_GET['module'] == 'form_profile') {
		 	include "Module/profileUser/form.php";
		}

		//section for module password
		elseif ($_GET['module'] == 'password') {
		 	include "Module/password/view.php";
		 }

		//section for module profile user
		elseif ($_GET['module'] == 'profileUserOn') {
			include "Module/profileUser/view.php";
		}
		elseif ($_GET['module'] == 'form_profileUserEdit') {
		 	include "Module/profileUser/form.php";
		}

		//section for module invoice
		elseif ($_GET['module'] == 'invoice') {
			include "Module/invoice/view.php";
		}
		elseif ($_GET['module'] == 'form_invoice') {
			include "Module/invoice/form.php";
		}
		elseif($_GET['module'] == 'form_new'){
			include "Module/invoice/new_invoice.php";
		}
		elseif ($_GET['module'] == 'viewDetail') {
			include "Module/invoice/file.php";
		}

		//section for module collection alert
		elseif ($_GET['module'] == 'collection_alert') {
			include "Module/collectionPayment/view.php";
		}
		elseif ($_GET['module'] == 'detailCollecttion') {
			include "Module/collectionPayment/detail.php";
		}
		//section for module billToPay
		elseif ($_GET['module'] == 'billToPay') {
			include "Module/billToPay/view.php";
		}
		elseif ($_GET['module'] == 'detailExpsense') {
			include "Module/billToPay/detail.php";
		}
		elseif ($_GET['module'] == 'payment_alert') {
			include "Module/billToPay/payment_alert.php";
		}
		//section for reports
		elseif ($_GET['module'] == 'report_sales') {
		 	include "Module/report/report_sales.php";
		}
		elseif ($_GET['module'] == 'form_report_payment') {
		 	include "Module/billToPay/form_report.php";
		}
		elseif ($_GET['module'] == 'form_re_print') {
		 	include "Module/report/form_reprint_invoice.php";
		}
		//section for grafics
		elseif ($_GET['module'] == 'sales_trends') {
			include "Module/grafics/view.php";
		}
		//section for module product
		elseif ($_GET['module'] == 'product') {
			include "Module/product/view.php";
		}
		elseif ($_GET['module'] == 'form_product') {
			include "Module/product/form.php";
		}
		elseif ($_GET['module'] == 'form_stock') {
			include "Module/product/form_stock.php";
		}
		elseif ($_GET['module'] == 'product_stock') {
			include "Module/product/view_stock.php";
		}
		elseif ($_GET['module'] == 'detailProduct') {
			include "Module/product/detail.php";
		}
		elseif($_GET['module'] == 'form_inventory_report'){
			include "Module/product/form_inventory.php";
		}
		//section for module customer
		elseif ($_GET['module'] == 'profileCustomer') {
			include "Module/profileCustomer/view.php";
		}
		elseif ($_GET['module'] == 'form_profileCustomer') {
			include "Module/profileCustomer/form.php";
		}
		elseif ($_GET['module'] == 'viewProfileCustomer') {
			include "Module/profileCustomer/profile.php";
		}
		elseif ($_GET['module'] == 'customer') {
			include "Module/customer/view.php";
		}
		elseif ($_GET['module'] == 'form_customer') {
			include "Module/customer/form.php";
		}
		elseif ($_GET['module'] == 'viewprofileCustomer') {
			include "Module/customer/profile.php";
		}
		//section for module plan
		elseif ($_GET['module'] == 'plan') {
			include "Module/plan/view.php";
		}
		elseif ($_GET['module'] == 'form_plan') {
			include "Module/plan/form.php";
		}
		elseif ($_GET['module'] == 'detailPlan') {
			include "Module/plan/detail.php";
		}
		//section for module supplier
		elseif ($_GET['module'] == 'supplier') {
			include "Module/supplier/view.php";
		}
		elseif ($_GET['module'] == 'form_supplier') {
			include "Module/supplier/form.php";
		}
		elseif ($_GET['module'] == 'profileSupplier') {
			include "Module/supplier/profile.php";
		}
	}
}
?>