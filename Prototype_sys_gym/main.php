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
    <link rel="shortcut icon" href="Content/assets/img/logo_v3.ico" />
    <!-- Bootstrap 3.3.2 -->
    <link href="Content/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="Content/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <!-- <link href="Content/assets/plugins/datatable/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="Content/assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="Content/assets/plugins/dataTableNew/datatables.min.css" rel="stylesheet" type="text/css" />

    <!-- Chosen Select -->
    <link rel="stylesheet" type="text/css" href="Content/assets/plugins/chosen/css/chosen.min.css" />
    <!-- Theme style -->
    <link href="Content/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="Content/assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />    
    <!-- Custom CSS -->
    <link href="Content/assets/css/style.css" rel="stylesheet" type="text/css" />
    
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

  </head>
  <body class="skin-blue fixed">
    <div class="wrapper">      
      <header class="main-header">
        <!-- Logo -->
        <a href="?module=berenda" class="logo">
          <img style="margin-top:auto;margin-right:5px" src="Content/assets/img/logo_v2.jpg" alt="Logo"> 
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
                    <h4 class="modal-title"><i class="fa fa-sign-out"> Log Out</i></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to log out? </p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="Config/logout.php">Yes, Go Out</a>
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
    <!-- <script src="Content/assets/plugins/jQuery/jQuery-3.3.1.min.js"></script> -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="Content/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- chosen select -->
    <script src="Content/assets/plugins/chosen/js/chosen.jquery.min.js"></script>
    <!-- DATA TABES SCRIPT -->
<!--     <script src="Content/assets/plugins/datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="Content/assets/plugins/datatable/dataTables.bootstrap.js" type="text/javascript"></script> -->
    <!-- <script src="Content/assets/plugins/datatable/jquery.dataTables.js" type="text/javascript"></script> -->
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
        $("#dataTables1").DataTable({

        });
      });
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
        
        $("#data_invoice").submit(function(){
          var id_customer = $("#id_customer").val();
          var id_user = $("#id_user").val();
          var date = $("#date").val();
          var condition = $("#condition").val();

          VentanaCentrada('./Module/invoice/print.php?id_customer='+id_customer+'&id_user='+id_user+'&date='+date+'&condition='+condition);
        });
    </script>
  </body>
</html>