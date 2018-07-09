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

<!--tambahkan custom css disini-->
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

select {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

textarea {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

#myCheck {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

select.invalid {
  background-color: #ffdddd;
}

textarea.invalid {
  background-color: #ffdddd;
}



/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>


    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>MONETS</b></span>
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
                                    <span class="hidden-xs"><?=$this->session->userdata('UserName')?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
										<?=$this->session->userdata('UserName')?>
                                            <small><?=$this->session->userdata('UserGroupName')?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body 
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
									-->
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
                            <p><?=$this->session->userdata('UserName')?></p>
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

                        <li>
                            <a href="index.php?module=dashboard">
                                <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                                <small class="label pull-right bg-red">3</small>
                            </a>
                        </li>
                        <?php
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

<!--tambahkan custom js disini-->
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
// //???
//   if (n == 6) {
// document.getElementById("nextBtn").innerHTML = "Submit";
// document.getElementById("nextBtn").type = "submit";  

//   } 


  if (n == (x.length - 1)) {
//ubah next menjadi submit    
    document.getElementById("nextBtn").innerHTML = "Submit";
// document.getElementById("nextBtn").type = "submit";  

} else {
    document.getElementById("nextBtn").innerHTML = "Next";
}
/*
*/

  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y,z,a, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  a = x[currentTab].getElementsByTagName("textarea");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }

// 
  for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }

  for (i = 0; i < a.length; i++) {
    // If a field is empty...
    if (a[i].value == "") {
      // add an "invalid" class to the field:
      a[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }


// let warning = document.getElementById("warning");
// if(warning.style.display == "block"){
// valid = false;  
// }else{
// valid = true;  

// }
 // warning.style.display = "block";


 // 
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<!-- IMAGE -->
<script type="text/javascript">
  function PreviewImage() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>


<!-- PENDIDIKAN FORMAL -->
 <script>  
 $(document).ready(function(){  
      var i=1;  
    var count=1;  
    
      $('#add').click(function(){
  i++;  
  count += 1;
    if (count <= 3) {
      // come code
//          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="jenjang_pendidikan[]"  class="form-control name_list" /></td><td><input type="text" name="nama_sekolah[]"  class="form-control name_list" /></td><td><input type="text" name="kota[]"  class="form-control name_list" /></td><td><input type="text" name="program_studi[]"  class="form-control name_list" /></td><td><input type="text" name="ipk[]"  class="form-control name_list" /></td><td><input type="text" name="tahun_ijazah[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
//alert("TAMBAH");   
console.log(count);
    }else{
alert("MAX");     
 count -= 1;
console.log(count);
    
  }     
/*
*/
      });  
    
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
        i--;  
        count -= 1;
console.log(count);
      
      });  

      $('#submit').click(function(){            
        alert('submit');
        alert('GENERATE');
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      });  

 });  
 </script>

<!-- PENGALAMAN KERJA -->

<script>  
 $(document).ready(function(){  
      var i=1;  
    var count_2=1;  
    
      $('#add_2').click(function(){
  i++;  
  count_2 += 1;
    if (count_2 <= 3) {
      // come code
//          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
          $('#dynamic_field_2').append('<tr id="row'+i+'"><td><input type="text" name="perusahaan[]"  class="form-control name_list" /></td><td><input type="text" name="posisi[]"  class="form-control name_list" /></td><td><input type="date" name="tanggal_masuk[]"  class="form-control name_list" /></td><td><input type="date" name="tanggal_resign[]"  class="form-control name_list" /></td><td><input type="text" name="keterangan[]"  class="form-control name_list" /><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_2">X</button></td></tr>');  
//alert("TAMBAH");   
console.log(count_2);
    }else{
alert("MAX");     
 count_2 -= 1;
console.log(count_2);
    
  }     
/*
*/
      });  
    
      $(document).on('click', '.btn_remove_2', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
        i--;  
        count_2 -= 1;
console.log(count_2);
      
      });  
      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      // });  
 });  
 </script>

<script type="text/javascript">


function get_kode_pos_1(){

          $.ajax({
      url:'<?=base_url()?>index.php/sales_force/get_ajax_kodepos_1',
            method : "GET",
            data   : { cari: $('#kode_pos_1').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            console.log(hasil);
            $('#result_kode_pos_1').html(hasil);
          });


}


function get_kode_pos_2(){

          $.ajax({
      url:'<?=base_url()?>index.php/sales_force/get_ajax_kodepos_2',
            method : "GET",
            data   : { cari: $('#kode_pos_2').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            $('#result_kode_pos_2').html(hasil);
          });

  
}


  $(document).ready(function(){
//tes dummy    
get_kode_pos_1();

$("#kode_pos_1").keyup(function(){

 // console.log('keyup');
get_kode_pos_1();


});


$("#kode_pos_2").keyup(function(){

 // console.log('keyup');
get_kode_pos_2();


});


  });

</script>
<!-- CHECKBOX -->
<script>
function myFunction() {
    let checkBox = document.getElementById("myCheck");
    let text = document.getElementById("text");
    if (checkBox.checked == true){
        // text.style.display = "block";
//alert('OK');
    let kode_pos_1 = document.getElementById("kode_pos_1").value;

document.getElementById("kode_pos_2").value = kode_pos_1;
get_kode_pos_2();

    let alamat_tinggal_1 = document.getElementById("alamat_tinggal_1").value;

document.getElementById("alamat_tinggal_2").value = alamat_tinggal_1;


    let lama_tinggal_1 = document.getElementById("lama_tinggal_1").value;

document.getElementById("lama_tinggal_2").value = lama_tinggal_1;



    } else {
       // text.style.display = "none";
// alert('NO');
document.getElementById("kode_pos_2").value ="";

document.getElementById("alamat_tinggal_2").value ="";

document.getElementById("lama_tinggal_2").value ="";
get_kode_pos_2();

    }
}
</script>
<!-- CHECKBOX -->


<!-- -->
<script type="text/javascript">
  
$("#no_hp_emergency").keyup(function(){

 // console.log('keyup');
cek_no_emergency();


});

  function cek_no_emergency(){
   let no_telpon = document.getElementById("no_telpon").value;
   let no_hp1 = document.getElementById("no_hp1").value;
   let no_hp2 = document.getElementById("no_hp2").value;
   let no_hp_emergency = document.getElementById("no_hp_emergency").value;

let warning = document.getElementById("warning");



if(no_hp_emergency==no_telpon || no_hp_emergency==no_hp1 || no_hp_emergency==no_hp2 ){

console.log('no sama');
// alert('no sama');  

    if (warning.style.display === "none") {
        document.getElementById("no_hp_emergency").value ="";
        warning.style.display = "block";
        // x.className += " invalid";
        //  valid = false;
    } 
    // else {
  
    // }

}else{
        warning.style.display = "none";
         // x.className += " valid";
         // valid = true;
}



  }

</script>
<!--  -->


    </body>
</html>
