<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NEW DEV | SLNTOOLS</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/ionicons-2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
/*  .box
  {
   width:800px;
   margin:0 auto;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
*/  </style>        
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>CPANEL</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Alexander Pierce</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            Alexander Pierce - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <?php
                                            echo anchor('auth/logout','Sing out',array('class'=>'btn btn-default btn-flat'));
                                            ?>
                                            
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Alexander Pierce</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
<!--
                        <li>
                            <a href="index.php?module=dashboard">
                                <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                                <small class="label pull-right bg-red">3</small>
                            </a>
                        </li>
-->
                        <?php
/*
                        $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
                        foreach ($menu->result() as $m) {
                            // chek ada sub menu
                            $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
                            if($submenu->num_rows()>0){
                                // tampilkan submenu
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
                                foreach ($submenu->result() as $s){
                                     echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
                                }
                                   echo"</ul>
                                    </li>";
                            }else{
                                echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
                            }
                            
                        }
*/						
//MENU HOME
								echo "<li>" . anchor('dashboard1', "<i class='fa fa-list-alt'></i> <span>" . strtoupper('home')) . "</span></li>";
//MENU AGENCY								
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("agency").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
								echo "<li>" . anchor('agency', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency profile")) . "</span></li>";
								echo "<li>" . anchor('agencysalescenter', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency sales center")) . "</span></li>";
                                  
								echo"</ul>
                                    </li>";
//MENU SALES FORCE								
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("sales force").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
										
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("profile sales force")) . "</span></li>";


								
//								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("interview")) . "</span></li>";
                                  
//interview								
//--
                               echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("interview").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
										
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("pending interview")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list interview")) . "</span></li>";

								echo"</ul>
                                    </li>";

//---
								  
//								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("hiring")) . "</span></li>";
								
//hiring								
//--
                               echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("hiring").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
										
//								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("pending hiring wilayah")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list hiring")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("approval hiring pusat")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list hiring result")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list hold hiring")) . "</span></li>";
								
								echo"</ul>
                                    </li>";

//---

								
//banding								
//--
                               echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("banding").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
										
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list deciline sales force")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("approval banding")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list banding")) . "</span></li>";
								
								echo"</ul>
                                    </li>";

//---

								
//update								
//--
                               echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("update").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
										
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("update sales")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("approval update")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list update")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("restruct spv")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("data completion")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("terminate sales")) . "</span></li>";
								
								echo"</ul>
                                    </li>";

//---
								
								
//sales code
//--
                               echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("sales code").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
										
								echo "<li>" . anchor('employee/pending_new_sales_code_list', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("pending new SC")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list new approved SC")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("pending update SC")) . "</span></li>";
								echo "<li>" . anchor('#', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("list update SC")) . "</span></li>";
								
								echo"</ul>
                                    </li>";

//---

								
								echo"</ul>
                                    </li>";

//MENU PROMO								
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("promo").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
								echo "<li>" . anchor('agency', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency profile")) . "</span></li>";
								echo "<li>" . anchor('agencysalescenter', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency sales center")) . "</span></li>";
                                  
								echo"</ul>
                                    </li>";									
									
//MENU PIPELINE								
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("pipeline").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
								echo "<li>" . anchor('agency', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency profile")) . "</span></li>";
								echo "<li>" . anchor('agencysalescenter', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency sales center")) . "</span></li>";
                                  
								echo"</ul>
                                    </li>";	
//MENU PAYMENT								
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='fa fa-list-alt'></i>".strtoupper("payment").' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
								echo "<li>" . anchor('agency', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency profile")) . "</span></li>";
								echo "<li>" . anchor('agencysalescenter', "<i class='fa fa-list-alt'></i> <span>" . strtoupper("agency sales center")) . "</span></li>";
                                  
								echo"</ul>
                                    </li>";
									
//-----------									
									
//single menu                   echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";

									
									
                        ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Tables
                        <small>advanced tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>


                <?php
                echo $contents;
                ?>



            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2018 <a href="http://slntools.com">slntools.com</a>.</strong> All rights reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>template/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>template/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>template/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>

        <!-- Emlployee.js -->
        <script src="<?php echo base_url() ?>template/dist/js/employee.js"></script>  

        <!-- Agency.js -->
        <!-- <script type="text/javascript" src="<?php echo base_url() ?>template/dist/js/agency.js"></script>   -->
<script type="text/javascript">
    

    
//   $(document).ready(function(){
// var url="<?php echo base_url() ?>";


// console.log(url);

// // console.log('ready');
// // $('#btn').click(function(){
// $("#PostalCode").keyup(function(e){
//  // if (e.keyCode == 13) {
//  // console.log($('#PostalCode').val());
// // }
//           $.ajax({
//       url:'<?=base_url()?>index.php/Agency/get_ajax_PostalCode',
//             method : "GET",
//             data   : { cari: $('#PostalCode').val() }
//              // data   : 'data123.json'
//           }).done(function(hasil){
//             // console.log(hasil);
//             $('#result').html(hasil);
//           });


// });


//   });

    




// let kode_pos = document.getElementById("kode_pos");

// //let kode_pos_value = document.getElementById("kode_pos").val();

// // kode_pos.addEventListener("keyup", function(){

// // console.log(kode_pos_value);

// // });

// kode_pos.keyup(function(){

// console.log('xxxxxxxxx');

// });
// $("#kode_pos").keyup(function(){
//     // $("input").css("background-color", "pink");
//     console.log('keyuppppppp');
// });

  $(document).ready(function(){


// console.log('ready');
// $('#btn').click(function(){
$("#kode_pos").keyup(function(){

 // console.log('keyup');

          $.ajax({
      url:'<?=base_url()?>index.php/Agency/get_ajax',
            method : "GET",
            data   : { cari: $('#kode_pos').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            $('#result').html(hasil);
          });


});


  });

</script>



<!-- AGENCYSALESCENTER -->
<script type="text/javascript">

function generate_kode(){

//console.log('generate klik');

//=====================================
//============
//$.('#code').value('123');    
 var area_id = $('#AreaID').val();  
// //console.log(area_id);
 
                    // AJAX request
                    $.ajax({
                       url:'<?=base_url()?>index.php/agencysalescenter/getSalesCenterCode',
                          // url:'<?=base_url()?>index.php/sales_center/getKota1',
                        method: 'post',
                        data: {area_id:area_id},
                        dataType: 'json',
                        success: function(response){

 console.log(response);
$('#SalesCenterCode').val(response);
//                             $.each(response,function(index,data){
// console.log(index);
// console.log('xxxxxxxxxxxxx');
// console.log(data);
                
//                             });     
/*
$('#kode_new').val(area);
                            // Remove options
                            $('#kota').find('option').not(':first').remove(); //select ke 3
              //              $('#area_grup').find('option').not(':first').remove(); //select ke 2

                            // Add options
                            $.each(response,function(index,data){
                                $('#kota').append('<option value="'+data['CityID']+'">'+data['CityName']+'</option>');
                
                            });
                        
*/
                        }
                    });



//============  

//=====================================      


}


    
$(document).ready(function(){



/*
$('#area').change(function(){

//alert('changeeee');
let area_id = $(this).val();


$.ajax({

url:'<?=site_url()?>/sales_center/getKota',
method:'post',
data:{area_id:area_id},
dataType:'json',
success: function(response){

//console.log(response);


//ADD OPTION
$.each(response,function(index,data){

$('#kota').append('<option value="'+data['CityID']+'" >'+data['CityName']+'<option>');

});

}

});

});
*/


///==kode pos
// $('#btn').click(function(){
$('#PostalCode').keyup(function(){
// console.log('generate klik');
          $.ajax({
      url:'<?=base_url()?>index.php/agency/get_ajax',
            method : "GET",
            data   : { cari: $('#PostalCode').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            $('#result').html(hasil);
          });


});

///----------------------------------------
                // Area change Select
                $('#AreaID').change(function(){

                    var area = $(this).val();
//console.log(area);                       
                    // AJAX request
                    $.ajax({
                       url:'<?=base_url()?>index.php/agencysalescenter/getCity',
                          // url:'<?=base_url()?>index.php/sales_center/getKota1',
                        method: 'post',
                        data: {area:area},
                        dataType: 'json',
                        success: function(response){
/*
console.log(response);          
$('#kode_new').val(area);
*/
                            // Remove options
                            $('#CityID').find('option').not(':first').remove(); //select ke 3
              //              $('#area_grup').find('option').not(':first').remove(); //select ke 2

                            // Add options
                            $.each(response,function(index,data){
                                $('#CityID').append('<option value="'+data['CityID']+'">'+data['CityName']+'</option>');

generate_kode();
                
                            });
                        
                        }
                    });

    
        }); //onchange
                  
          
//--------------
/*

//===on click generate
$("#generate").click(function(){

//console.log('generate klik');

//=====================================
//============
//$.('#code').value('123');    
 var area_id = $('#area').val();  
// //console.log(area_id);
 
                    // AJAX request
                    $.ajax({
                       url:'<?=base_url()?>index.php/sales_center/getSalesCenterCode',
                          // url:'<?=base_url()?>index.php/sales_center/getKota1',
                        method: 'post',
                        data: {area_id:area_id},
                        dataType: 'json',
                        success: function(response){

 console.log(response);
$('#kode').val(response);

                        }
                    });



//============  

//=====================================      


});
*/
//=======================
});//ready

</script>



    </body>
</html>
