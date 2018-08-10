<?php  
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administration Panel | System Gym</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Gym Management App - Sys Gym">
    <meta name="author" content="wsullivan" />
    <!-- favicon -->
    <link rel="shortcut icon" href="Content/assets/img/corredor-ico.svg" />
    <!-- Bootstrap 3.3.2 -->
    <link href="Content/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="Content/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="Content/assets/plugins/dataTableNew/datatables.min.css" rel="stylesheet" type="text/css" />
    <!-- Chosen Select -->
    <link rel="stylesheet" type="text/css" href="Content/assets/plugins/chosen/css/chosen.min.css" />
    <!-- Theme style -->
    <link href="Content/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="Content/assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />    
    <!-- Custom CSS -->
    <link href="Content/assets/css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue fixed">
    <div class="wrapper">      
      <header class="main-header">
        <!-- Logo -->
        <a href="?module=berenda" class="logo">
          <img style="margin-top:auto;margin-right:5px" src="Content/assets/img/corredor.svg" alt="Logo"> 
          <span style="font-size:20px">SYSGYM</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">            
              <?php include "top-menu.php" ?>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">
        <section class="sidebar">
            <?php include "sidebar-menu.php" ?>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <?php include "Config/content.php"; ?>

        <!-- Modal Logout -->
        <div class="modal fade" id="logout">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"><i class="fa fa-sign-out"> Ready to Leave?</i></h3>
                </div>
                <div class="modal-body">
                    <p>Select "Yes, logout" below if you are ready to end your current session.</p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="Config/logout.php">Yes, logout</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('Y') ." Developed by";?> - <a href="">WSULLIVAN</a>.</strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="Content/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="Content/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- chosen select -->
    <script src="Content/assets/plugins/chosen/js/chosen.jquery.min.js"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="Content/assets/plugins/dataTableNew/datatables.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="Content/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='Content/assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- maskMoney -->
    <script src="Content/assets/js/jquery.maskMoney.min.js"></script>
    <!-- AdminLTE App -->
    <script src="Content/assets/js/app.min.js" type="text/javascript"></script>
    <script src="Content/assets/js/VentanaCentrada.js" type="text/javascript"></script>
    <!-- Canvas Grafics -->
    <script src="Content/assets/plugins/canvas/canvasjs.min.js" type="text/javascript"></script>
    <!-- <script src="Content/assets/plugins/canvas/jquery.canvasjs.min.js" type="text/javascript"></script> -->
    
    <script src="Content/assets/plugins/Highcharts-6.0.7/code/highcharts.js"></script>
    <script src="Content/assets/plugins/Highcharts-6.0.7/code/modules/series-label.js"></script>
    <script src="Content/assets/plugins/Highcharts-6.0.7/code/modules/exporting.js"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        // chosen select
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        
        // mask money
        $('#harga_beli').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga_jual').maskMoney({thousands:'.', decimal:',', precision:0});

        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if(event_name != 'sidebar_collapsed') return;
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        });    
    
        $('#chosen-multiple-style .btn').on('click', function(e){
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });

        // DataTables
        $("#dataTables1").DataTable({});
        //For invoice view
        $("#dataTables2").DataTable({
          "order": [[0, "desc"]]
        });
        $("#dataTables3").DataTable({});
      });
    </script>
    <script type="text/javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
          var i;
          for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
              break;
          i = (i + 1) % field.form.elements.length;
          field.form.elements[i].focus();
          return false;
        };
        // else return false
        return false;
      }

      function filterFloat(evt,input){
          // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
          var key = window.Event ? evt.which : evt.keyCode;    
          var chark = String.fromCharCode(key);
          var tempValue = input.value+chark;
          if(key >= 48 && key <= 57){
              if(filter(tempValue)=== false){
                  return false;
              }else{       
                  return true;
              }
          }else{
                if(key == 8 || key == 13 || key == 0) {     
                    return true;              
                }else if(key == 46){
                      if(filter(tempValue)=== false){
                          return false;
                      }else{       
                          return true;
                      }
                }else{
                    return false;
                }
          }
      }     
      function filter(__val__){
          var preg = /^([0-9]+\.?[0-9]{0,1})$/; 
          if(preg.test(__val__) === true){
              return true;
          }else{
             return false;
          }          
      }
    </script>    
    <script language="javascript" type="text/javascript">
      <!--//Begin
      var timerID = null;
      var timerRunning = false;

      function stopclock (){
        if(timerRunning)
        clearTimeout(timerID);
        timerRunning = false;
      }
      function showtime () {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds()
        var timeValue = "" + ((hours >12) ? hours -12 :hours)
        if (timeValue == "0") timeValue = 12;
          timeValue += ((minutes < 10) ? ":0" : ":") + minutes
          timeValue += ((seconds < 10) ? ":0" : ":") + seconds
          timeValue += (hours >= 12) ? " P.M." : " A.M."
          document.clock.face.value = timeValue;
          timerID = setTimeout("showtime()",1000);
          timerRunning = true;
      }
      function startclock() {
        stopclock();
        showtime();
      }
      window.onload=startclock;
      // End -->

      function filterFloatPrice(evt,input){
          // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
          var key = window.Event ? evt.which : evt.keyCode;    
          var chark = String.fromCharCode(key);
          var tempValue = input.value+chark;
          if(key >= 48 && key <= 57){
              if(filterPrice(tempValue)=== false){
                  return false;
              }else{       
                  return true;
              }
          }else{
                if(key == 8 || key == 13 || key == 0) {     
                    return true;              
                }else if(key == 46){
                      if(filterPrice(tempValue)=== false){
                          return false;
                      }else{       
                          return true;
                      }
                }else{
                    return false;
                }
          }
      }
      function filterPrice(__val__){
          var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
          if(preg.test(__val__) === true){
              return true;
          }else{
             return false;
          }          
      }

      function filterFloatCustomer(evt,input){
          // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
          var key = window.Event ? evt.which : evt.keyCode;    
          var chark = String.fromCharCode(key);
          var tempValue = input.value+chark;
          if(key >= 48 && key <= 57){
              if(filterPrice(tempValue)=== false){
                  return false;
              }else{       
                  return true;
              }
          }else{
                if(key == 8 || key == 13 || key == 0) {     
                    return true;              
                }else if(key == 46){
                      if(filterPrice(tempValue)=== false){
                          return false;
                      }else{       
                          return true;
                      }
                }else{
                    return false;
                }
          }
      }
      function filterCustomer(__val__){
          var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
          if(preg.test(__val__) === true){
              return true;
          }else{
             return false;
          }          
      }

      function validateEmail(idMail)
      {
        //Creamos un objeto 
        object=document.getElementById(idMail);
        valueForm=object.value;
        message = document.getElementById('emailStatus');  
        // Patron para el correo
        var patron=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(valueForm.search(patron)==0)
        {
          //Mail correcto
          object.style.color="#000";
          return message.innerText="";
        }else{
          object.style.color="#f00";
          return message.innerText= "Invalid Email";
        }
      }
    </script>

    <!-- Start load modal for invoice -->
    <script>
      $(document).ready(function(){
        load(1);
      });

      function load(page){
        var q= $("#q").val();
        $("#loader").fadeIn('fast');
        $.ajax({
          url:'./Config/ajax/fillProducts.php?action=ajax&page='+page+'&q='+q,
           beforeSend: function(objeto){
           $('#loader').html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success:function(data){
            $(".outer_div").html(data).fadeIn('fast');
            $('#loader').html('');            
          }
        })
      }

      function loadInvoice(page){
        var q= $("#q").val();
        $("#loader").fadeIn('fast');
        $.ajax({
          url:'./Config/ajax/viewInvoice.php?action=ajax&page='+page+'&q='+q,
           beforeSend: function(objeto){
           $('#loader').html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success:function(data){
            $(".outer_invoice").html(data).fadeIn('fast');
            $('#loader').html('');            
          }
        })
      }
    </script>
    <script>
      function toBag (id) {
        var precio=document.getElementById('precio_'+id).value;
        var cantidad=document.getElementById('cantidad_'+id).value;
        //Inicia validacion
        if (cantidad == 0 || cantidad < 1 || cantidad == "")
        {
          alert('Please insert quantity in the required field');
          document.getElementById('cantidad_'+id).focus();
          return false;
        }          
        $.ajax({
          type: "POST",
          url: "./Config/ajax/toshoppingBag.php",
          data: "id="+id+"&precio="+precio+"&cantidad="+cantidad,          
          beforeSend: function(objeto){
            $("#resultados").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success: function(datos){
            $("#resultados").html(datos);
          }
        });
      }

      function showBag(id) {        
        var cantidad=document.getElementById('cantidad_'+id).value;
          
        $.ajax({
          type: "POST",
          url: "./Config/ajax/toshoppingBag.php",
          data: "id="+id+"&cantidad="+0,
          beforeSend: function(objeto){
            $("#resultados").html('<img style="margin-left:15px;margin-top:5px;" src="./Content/assets/img/ajax-loader.gif"> Charging... ');
          },
          success: function(datos){
            $("#resultados").html(datos);
          }
        });        
      }
        
      function eliminar (id) {
        $.ajax({
          type: "GET",
          url: "./Config/ajax/toshoppingBag.php",
          data: "id="+id,
          beforeSend: function(objeto){
            $("#resultados").html('<img style="margin-left:15px;margin-top:5px;" src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success: function(datos){
            $("#resultados").html(datos);
          }
        });
      }

      function clearBag() {
        $.ajax({
          url: "./Config/ajax/clearBag.php",
          beforeSend: function(objeto){
            $("#resultados").html('<img style="margin-left:15px;margin-top:5px;" src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success: function(datos) {
            $("#resultados").html(datos);
          }
        });
      }
        // $("#data_invoice").submit(function(){
        //   var id_customer = $("#id_customer").val();
        //   var id_user = $("#id_user").val();
        //   var date = $("#date").val();
        //   var condition = $("#condition").val();

        //   VentanaCentrada('./Module/invoice/print.php?id_customer='+id_customer+'&id_user='+id_user+'&date='+date+'&condition='+condition);
        // });
    </script>
    <script>
      $(document).ready(function(){
        loadEdit(1);
      });

      function loadEdit(page){
        var q= $("#q").val();
        $("#loader").fadeIn('fast');
        $.ajax({
          url:'./Config/ajax/fillEditBag.php?action=ajax&page='+page+'&q='+q,
           beforeSend: function(objeto){
           $('#loader').html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success:function(data){
            $(".outer_divEdit").html(data).fadeIn('fast');
            $('#loader').html('');            
          }
        })
      }

      // function loadInvoice(page){
      //   var q= $("#q").val();
      //   $("#loader").fadeIn('fast');
      //   $.ajax({
      //     url:'./Config/ajax/viewInvoice.php?action=ajax&page='+page+'&q='+q,
      //      beforeSend: function(objeto){
      //      $('#loader').html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
      //     },
      //     success:function(data){
      //       $(".outer_invoice").html(data).fadeIn('fast');
      //       $('#loader').html('');            
      //     }
      //   })
      // }
      function toEditBag (id) {
        var precio=document.getElementById('precio_'+id).value;
        var cantidad=document.getElementById('cantidad_'+id).value;
        //Inicia validacion
        if (cantidad == 0 || cantidad < 1 || cantidad == "")
        {
          alert('Please insert quantity in the required field');
          document.getElementById('cantidad_'+id).focus();
          return false;
        }          
        $.ajax({
          type: "POST",
          url: "./Config/ajax/toEditBag.php",
          data: "id="+id+"&precio="+precio+"&cantidad="+cantidad,          
          beforeSend: function(objeto){
            $("#resultadosEdit").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success: function(datos){
            $("#resultadosEdit").html(datos);
          }
        });
      }

      function showEditBag(id) {        
        var cantidad=document.getElementById('cantidad_'+id).value;
          
        $.ajax({
          type: "POST",
          url: "./Config/ajax/toEditBag.php",
          data: "id="+id+"&cantidad="+0,
          beforeSend: function(objeto){
            $("#resultadosEdit").html('<img style="margin-left:15px;margin-top:5px;" src="./Content/assets/img/ajax-loader.gif"> Charging... ');
          },
          success: function(datos){
            $("#resultadosEdit").html(datos);
          }
        });        
      }
        
      function deleteEditBag (id) {
        $.ajax({
          type: "GET",
          url: "./Config/ajax/toEditBag.php",
          data: "id="+id,
          beforeSend: function(objeto){
            $("#resultadosEdit").html('<img style="margin-left:15px;margin-top:5px;" src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success: function(datos){
            $("#resultadosEdit").html(datos);
          }
        });
      }

      function clearEditBag() {
        $.ajax({
          url: "./Config/ajax/clearEditBag.php",
          beforeSend: function(objeto){
            $("#resultadosEdit").html('<img style="margin-left:15px;margin-top:5px;" src="./Content/assets/img/ajax-loader.gif"> Charging...');
          },
          success: function(datos) {
            $("#resultadosEdit").html(datos);
          }
        });
      }
    </script>
    <!-- Validaciones jQuery para parametros (Regular Expresion) -->
    <script type="text/javascript">
      /**
      * Validate DNI for new customer
      */
      $(document).ready(function(){                         
      var consulta;             
      //hacemos focus
      $("#identification").focus();                                                 
      //comprobamos si se pulsa una tecla
      $("#identification").keyup(function(e){
         //obtenemos el texto introducido en el campo
         consulta = $("#identification").val();                                      
         //hace la búsqueda
         $("#resultado").delay(10).queue(function(n) {                                           
          $("#resultado").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
            $.ajax({
              type: "POST",
              //url: "./Module/customer/validate.php",
              url: "./Config/ajax/validate_dni_customer.php",
              data: "b="+consulta,
              dataType: "html",
              error: function(){
                    alert("Request Error");
              },
              success: function(data){                                                      
                    $("#resultado").html(data);
                    n();
              }
            });
         });                                
        });                          
      });
      /**
      * Validate DNI for new user
      */
      $(document).ready(function(){                         
      var consulta;             
      //hacemos focus
      $("#cedula").focus();                                                 
      //comprobamos si se pulsa una tecla
      $("#cedula").keyup(function(e){
         //obtenemos el texto introducido en el campo
         consulta = $("#cedula").val();                                      
         //hace la búsqueda
         $("#resultado_user").delay(10).queue(function(n) {                                           
          $("#resultado_user").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
            $.ajax({
              type: "POST",
              //url: "./Module/customer/validate.php",
              url: "./Config/ajax/validate_dni_user.php",
              data: "dni="+consulta,
              dataType: "html",
              error: function(){
                    alert("Request Error");
              },
              success: function(data){                                                      
                    $("#resultado_user").html(data);
                    n();
              }
            });                                           
         });                                
        });                          
      });
      /**
      * Validate username for new user
      */
      $(document).ready(function(){                         
      var consulta;             
      //hacemos focus
      $("#usernameN").focus();                                                 
      //comprobamos si se pulsa una tecla
      $("#usernameN").keyup(function(e){
         //obtenemos el texto introducido en el campo
         consulta = $("#usernameN").val();                                      
         //hace la búsqueda
         $("#resultado_username").delay(10).queue(function(n) {                                           
            $("#resultado_username").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
              $.ajax({
                type: "POST",
                //url: "./Module/customer/validate.php",
                url: "./Config/ajax/validate_username_user.php",
                data: "user="+consulta,
                dataType: "html",
                error: function(){
                      alert("Request Error");
                },
                success: function(data){                                                      
                      $("#resultado_username").html(data);
                      n();
                }
              });                                           
          });
        });                          
      });
      /**
      * Validate number invoice for bill to pay supplier
      */
      $(document).ready(function(){                         
      var idSupplier;
      var numberInvoice;
      //hacemos focus
      $("#invoice_number").focus();
      $("#id_supplier").focus();
      //comprobamos si se pulsa una tecla
      $("#invoice_number").keyup(function(e){
         //obtenemos el texto introducido en el campo
         numberInvoice = $("#invoice_number").val();
         idSupplier = $("#id_supplier").val();
         //hace la búsqueda
         $("#result_bill_to_pay").delay(10).queue(function(n) {
          $("#result_bill_to_pay").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
            $.ajax({
              type: "POST",
              //url: "./Module/customer/validate.php",
              url: "./Config/ajax/validate_bill_per_pay.php",
              data: "number="+numberInvoice+"&id="+idSupplier,
              dataType: "html",
              error: function(){
                    alert("Request Error");
              },
              success: function(data){
                    $("#result_bill_to_pay").html(data);
                    n();
              }
            });
         });
        });
      });
      /**
      * Validate DNI for supplier
      */
      $(document).ready(function(){                         
      var dni;
      //hacemos focus
      $("#legalidentification").focus();
      //comprobamos si se pulsa una tecla
      $("#legalidentification").keyup(function(e){
         //obtenemos el texto introducido en el campo
         dni = $("#legalidentification").val();
         //hace la búsqueda
         $("#result_for_supplier").delay(10).queue(function(n) {
          $("#result_for_supplier").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
            $.ajax({
              type: "POST",
              //url: "./Module/customer/validate.php",
              url: "./Config/ajax/validate_dni_supplier.php",
              data: "dni="+dni,
              dataType: "html",
              error: function(){
                    alert("Request Error");
              },
              success: function(data){
                    $("#result_for_supplier").html(data);
                    n();
              }
            });
         });
        });
      });
      /**
      * Validate name for product
      */
      $(document).ready(function(){                         
      var nameproduct;
      //hacemos focus
      $("#nameproduct").focus();
      //comprobamos si se pulsa una tecla
      $("#nameproduct").keyup(function(e){
         //obtenemos el texto introducido en el campo
         nameproduct = $("#nameproduct").val();
         //hace la búsqueda
         $("#result_for_product").delay(10).queue(function(n) {
          $("#result_for_product").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
            $.ajax({
              type: "POST",
              //url: "./Module/customer/validate.php",
              url: "./Config/ajax/validate_name_product.php",
              data: "name="+nameproduct,
              dataType: "html",
              error: function(){
                    alert("Request Error");
              },
              success: function(data){
                    $("#result_for_product").html(data);
                    n();
              }
            });
         });
        });
      });
      /**
      * Validate Name plan for new plan
      */
      $(document).ready(function(){                         
      var nameplan;
      //hacemos focus
      $("#nameplan").focus();
      //comprobamos si se pulsa una tecla
      $("#nameplan").keyup(function(e){
         //obtenemos el texto introducido en el campo
         nameplan = $("#nameplan").val();
         //hace la búsqueda
         $("#result_for_plan").delay(10).queue(function(n) {
          $("#result_for_plan").html('<img src="./Content/assets/img/ajax-loader.gif"> Charging...');
            $.ajax({
              type: "POST",
              //url: "./Module/customer/validate.php",
              url: "./Config/ajax/validate_plan.php",
              data: "nameplan="+nameplan,
              dataType: "html",
              error: function(){
                    alert("Request Error");
              },
              success: function(data){
                    $("#result_for_plan").html(data);
                    n();
              }
            });
         });
        });
      });
    </script>
  </body>
</html>