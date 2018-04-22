<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MONETS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        -->
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<!------>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

 <!-- DATA TABLES FOR MODAL-->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

 



<?php 
///////////////////////////////////$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">








<!-------

 <form method="post" id="framework_form">
    <div class="form-group">
     <label>Select which Framework you have knowledge</label>
     <select id="framework" name="framework[]" multiple class="form-control" >
      <option value="Codeigniter">Codeigniter</option>
      <option value="CakePHP">CakePHP</option>
      <option value="Laravel">Laravel</option>
      <option value="YII">YII</option>
      <option value="Zend">Zend</option>
      <option value="Symfony">Symfony</option>
      <option value="Phalcon">Phalcon</option>
      <option value="Slim">Slim</option>
     </select>
    </div>
    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>

------>

<form action="<?=site_url('app_user/add_save');?>" method="POST">









  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="kelurahan">Sales</label>
    <input type="text" class="form-control" id="sales_code" name="sales_code" placeholder="SALES">

<!----
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>

-->

      </div>




    <div class="form-group col-md-5">
      <label for="kode_pos">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">   
    </div>

    <div class="form-group col-md-5">
      <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">   
    </div>



  </div>


  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="user_group">User Grpup</label>
      <select id="user_group" name="user_group" class="form-control">
        <option selected>Choose...</option>

<?php
foreach ($query_user_grup as $user_grup) {
// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
?>
        <option value="<?=$user_grup->UserGroupID;?>"><?=$user_grup->UserGroupName;?></option>

<?php
}
?>


      </select>    

    </div>

    <div class="form-group col-md-4">
      <label for="tgl_aktif">Tanggal Aktif</label>
    <input type="date" class="form-control" id="tgl_aktif" name="tgl_aktif" placeholder="Tanggal Aktif">   
    </div>

    <div class="form-group col-md-4">
      <label for="tgl_akhir">Tanggal Berakhir</label>
    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Akhir">   
    </div>


  </div>


  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="area_group">Area Group</label>
      <select id="area_group"  name="area_group" class="form-control">
      <option selected>Choose...</option>
<?php
foreach ($query_grup_area as $grup_area) {
// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
?>
        <option value="<?=$grup_area->AreaGroupID;?>"><?=$grup_area->AreaGroupName;?></option>

<?php
}
?>

      </select>    
    </div>


    <div class="form-group col-md-3">
      <label for="area">Area</label>
      <select id="area"  name="area" class="form-control">
      <option selected>Choose...</option>

      </select>    
    </div>


    <div class="form-group col-md-3">
      <label for="agency">Agency</label>
      <select id="agency" name="agency" class="form-control">
        <option selected>Choose...</option>



      </select>    
    </div>

    <div class="form-group col-md-3">
      <label for="sales_center">Sales Center</label>
<!----
<select id="sales_center" name="sales_center" class="form-control">
  ---->      

     <select id="sales_center" name="sales_center[]" multiple class="form-control" >
<!-----
      <option value="Codeigniter">Codeigniter</option>
      <option value="CakePHP">CakePHP</option>
      <option value="Laravel">Laravel</option>
      <option value="YII">YII</option>
      <option value="Zend">Zend</option>
      <option value="Symfony">Symfony</option>
      <option value="Phalcon">Phalcon</option>
      <option value="Slim">Slim</option>
------>

     </select>
    
    </div>

  </div>


  <div class="form-row">




    <div class="form-group col-md-12">

  <button type="submit" class="btn btn-primary">SAVE</button>
    </div>


</div>

</form>






        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
/////////////////////////////////// $this->load->view('template/js');
?>
</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->
<?/*
*/?>
<!-- jQuery 2.1.3 
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
-->
<!-- Bootstrap 3.3.2 JS 
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
-->
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>






<!--tambahkan custom js disini-->


<script>





$(document).ready(function(){

 
 // $('#framework_form').on('submit', function(event){
 //  event.preventDefault();
 //  var form_data = $(this).serialize();
 //  $.ajax({
 //   url:"insert.php",
 //   method:"POST",
 //   data:form_data,
 //   success:function(data)
 //   {
 //    $('#framework option:selected').each(function(){
 //     $(this).prop('selected', false);
 //    });
 //    $('#framework').multiselect('refresh');
 //    alert(data);
 //   }
 //  });
 // });
//===================================show modal klik
// Get the button that opens the modal
let sales_code = document.getElementById("sales_code");

// When the user clicks the button, open the modal 
sales_code.onclick = function() {
    // modal.style.display = "block";
$('#myModal').modal('show');    
// alert('xxxxxxxxxx');
}


//=============================datatable modal
  $(function () {
    $('#lookup').DataTable()
/*
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
*/  
  })


///========================modal klik set value to input text
//            jika dipilih, kode akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("sales_code").value = $(this).attr('data-kode');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("email").value = $(this).attr('data-email');
                $('#myModal').modal('hide');
            });
//=========================================================

// ///----------------------------------------
// $("#area_group").change(function(){
// let area_grup = $(this).val();
//  // alert(area_grup);






// });


 
});




</script>



<script type='text/javascript'>
// CHANGE AJAX=============================
            // var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
        
        

                
                // Area change Select
                $('#area_group').change(function(){
                    var area_grup = $(this).val();
//alert(area_grup);         
                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/app_user/getArea',
                        method: 'post',
                        data: {area_grup:area_grup},
                        dataType: 'json',
                        success: function(response){
/*
*/
                            // Remove options
                            $('#agency').find('option').not(':first').remove(); //select ke 3
                            $('#area').find('option').not(':first').remove(); //select ke 2

                            // Add options
                            $.each(response,function(index,data){
                                $('#area').append('<option value="'+data['AreaID']+'">'+data['AreaName']+'</option>');
                            });
//console.log(response);          
                        
                        }
                    });
          
                });
///----------------------------------------
                // Area change Select
                $('#area').change(function(){
                    var area = $(this).val();
                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/app_user/getAgency',
                        method: 'post',
                        data: {area:area},
                        dataType: 'json',
                        success: function(response){
/*
*/
                            // Remove options
                            $('#agency').find('option').not(':first').remove(); //select ke 3
              //              $('#area_grup').find('option').not(':first').remove(); //select ke 2

                            // Add options
                            $.each(response,function(index,data){
                                $('#agency').append('<option value="'+data['AgencyID']+'">'+data['AgencyName']+'</option>');
                
                            });
console.log(response);          
                        
                        }
                    });
          
        });
                  
          
//--------------
                // Area change Select
                $('#agency').change(function(){
          var agency = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/app_user/getSalesCenter',
                        method: 'post',
                        data: {agency:agency},
                        dataType: 'json',
                        success: function(response){
                            // Remove options
//                            $('#agency').find('option').not(':first').remove(); //select ke 3
              //              $('#area_grup').find('option').not(':first').remove(); //select ke 2

console.log(response);          
                            // Add options
                            $.each(response,function(index,data){
                                $('#sales_center').append('<option value="'+data['SalesCenterID']+'">'+data['SalesCenterName']+'</option>');
                
                            });
                        
                        }
                    });
/*
*/






          
                });
                


// $('#sales_center').multiselect('reload');

 // $('#sales_center').multiselect({
 //  nonSelectedText: 'Select',
 //  enableFiltering: false,
 //  enableCaseInsensitiveFiltering: false,
 //  buttonWidth:'250px'
 // });

                
/*
                // Department change
                $('#sel_depart').change(function(){
                    var department = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/User/getDepartmentUsers',
                        method: 'post',
                        data: {department: department},
                        dataType: 'json',
                        success: function(response){
                            
                            // Remove options
                            $('#sel_user').find('option').not(':first').remove();

                            // Add options
                            $.each(response,function(index,data){
                                $('#sel_user').append('<option value="'+data['id']+'">'+data['name']+'</option>');
                            });
                        }
                    });
                });
*/          
                
            });
        </script>



<!-- DATA TABES SCRIPT -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>




<?php
$this->load->view('template/foot');
?>




        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lookup Kode </h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Agency</th>
                                    <th>Sales Center</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
foreach ($query_all_employee as $r){
                                    ?>

                                    <tr class="pilih" data-kode="<?php echo $r->sales_code; ?>" data-nama="<?php echo $r->nama; ?>" data-email="<?php echo $r->email; ?>" >

                                        <td><?php echo $r->sales_code; ?></td>
                                        <td><?php echo $r->nama; ?></td>
                                        <td><?php echo $r->agency; ?></td>
                                        <td><?php echo $r->sales_center; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        

