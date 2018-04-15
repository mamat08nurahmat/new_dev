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




<?php 
/*
*/
//$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->


<!-----
------>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />


<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?=$title;?></a></li>
        <li class="active"><?=$active;?></li>
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
<!---
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
-->       
            </div>
        </div>

    <!-- /.box-header -->
        <div class="box-body">



   <form method="post" id="sales_center_form" action="<?=site_url('user/save_tes')?>">



 <div class="row">
            <div class="col-md-4">
      
      
      
              <div class="form-group">
                <label>Sales</label>
        <input type="text" class="form-control" id="EmployeeNewCode" name="sales">

        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>
        
        </div>
              <!-- /.form-group -->
      
      
              <div class="form-group">
                <label>User Group</label>
                <select class="form-control select2" name="user_grup"  id="user_grup"  style="width: 100%;">               
            
        <?php  foreach($query_user_grup as $user_grup){ ?>        
                  <option value="<?=$user_grup->UserGroupID;?>"><?=$user_grup->UserGroupName;?></option>
        <?php } ?>          
                </select>
              </div>
              <!-- /.form-group -->


              <div class="form-group">
                <label>User Login ID</label>
        <input type="text" class="form-control" name="user_login">
        </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Nama</label>
        <input type="text" class="form-control" name="nama" id="nama">
        </div>
              <!-- /.form-group -->
        
              <div class="form-group">
                <label>NPP</label>
        <input type="text" class="form-control" name="npp">
        </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Password</label>
        <input type="password" class="form-control" name="password">
        </div>
              <!-- /.form-group -->
        

              <!-- 
              <div class="form-group">
                <label>Kopnfirmasi Password</label>
        <input type="password" class="form-control" name="">
        </div>
        /.form-group -->

              <div class="form-group">
                <label>Email</label>
        <input type="text" class="form-control" name="email" id="email">
        </div>
              <!-- /.form-group -->
        

      <div class="form-group">        
 
        <div class="checkbox">
          <label><input type="checkbox" name="aktif">Aktif</label>
        </div>
    
      </div>
              <!-- /.form-group -->
        
        
           <div class="form-group">
                <label>Tanggal Aktif:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_aktif" class="form-control pull-right" id="tgl_aktif">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        

        
           <div class="form-group">
                <label>Tanggal Berakhir:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_akhir" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        


              <div class="form-group">
                <label>Area Group</label>
                <select class="form-control select2" name="area_grup" id="area_grup"  style="width: 100%;">

        <option>-- Select Area  Group--</option>                

          <?php
                        foreach($query_grup_area as $area_grup){

                            echo "<option value='".$area_grup->AreaGroupID."'>".$area_grup->AreaGroupName."</option>";
                        }
                     ?>
        
          
                </select>
              </div>
              <!-- /.form-group -->


              <div class="form-group">
                <label>Area</label>
                <select class="form-control select2" name="area" id="area"  style="width: 100%;">

        <option>-- Select Area --</option>                
              

          </select>
              </div>
              <!-- /.form-group -->



              <div class="form-group">
                <label>Agency</label>
                <select  class="form-control" name="agency" id="agency"  style="width: 100%;">
        <option>-- Select Agency --</option>                              
          
                </select>
              </div>
              <!-- /.form-group -->

        
      <div class="form-group">
                <label>Sales Center</label>
<!--
<select class="selectpicker" multiple data-actions-box="true">
  <option>Mustard</option>
  <option>Ketchup</option>
  <option>Relish</option>
</select>
                <select class="form-control select2" name="sales_center[]" id="sales_center" multiple="multiple" data-placeholder="Select a State"  style="width: 100%;">
---->       
        
<select id="sales_center" name="sales_center[]" multiple class="form-control" >
</select>
              </div>
              <!-- /.form-group -->       
        



        
        </div>
            <!-- /.col -->
            <div class="col-md-8">

      
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->




    <div class="form-group">
     <label>Select which sales_center you have knowledge</label>
     <select id="sales_center" name="sales_center[]" multiple class="form-control" >
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
<!---
---->

    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>



        </div>
        <!-- /.box-body -->
    
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->


<!-------CUSTOM JS-------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php 
//$this->load->view('template/js');
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
<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>
*/?>

<??>
<script>
$(document).ready(function(){
 $('#sales_center').multiselect({
  nonSelectedText: 'Select sales_center',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });



//-----------------------------

                // Area change Select
                $('#area_grup').change(function(){
                    var area_grup = $(this).val();
//alert(area_grup);         
                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/user/getArea',
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
                        url:'<?=base_url()?>index.php/user/getAgency',
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
//console.log(response);          
                        
                        }
                    });
          
        });
                  
          
//--------------
                // Area change Select
                $('#agency').change(function(){
          var agency = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/user/getSalesCenter',
                        method: 'post',
                        data: {agency:agency},
                        dataType: 'json',
                        success: function(response){
                            // Remove options
//                            $('#agency').find('option').not(':first').remove(); //select ke 3
              //              $('#area_grup').find('option').not(':first').remove(); //select ke 2

//console.log(response);          
                            // Add options
                            $.each(response,function(index,data){
                                $('#sales_center').append('<option value="'+data['SalesCenterID']+'">'+data['SalesCenterName']+'</option>');
                
                            });
                        
                        }
                    });
/*
*/


          
                });
                

//----------------------
 /*
 $('#user_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#sales_center option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#sales_center').multiselect('refresh');
    alert(data);
   }
  });
 });
 */
 
 
});
</script>



<?php
$this->load->view('template/foot');
?>

