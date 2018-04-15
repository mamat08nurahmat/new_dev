<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
    <!-- daterange picker -->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

<!----
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  ---->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
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

<form class="form-horizontal"  action="<?php echo site_url('user/add_save')?>" method="post" enctype="multipart/form-data">		
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
---->				
				
                <select class="form-control select2" name="sales_center[]" id="sales_center" multiple="multiple" data-placeholder="Select a State"  style="width: 100%;">

				<option>-- Select Sales Center </option>                              
						
<!----
                  <option value="1">Alabama</option>
                  <option value="2">Alaska</option>
                  <option value="3">California</option>
                  <option value="4">Delaware</option>
                  <option value="5">Tennessee</option>
                 
-->				
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
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>		  
        </div>
        <!-- /.box-body -->
		
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
    <!-- InputMask -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

	<!-- iCheck 1.0.1 -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js" type="text/javascript"></script>









<script>
	$(document).ready(function(){
//  var baseURL= "<?php echo base_url();?>";
	//tgl_aktif	
	$( "#tgl_aktif" ).datepicker({
		changeYear: true
		changeMonth: true,
		dateFormat: 'yyyy-mm-dd',
	});
		

	//tgl_akhir	
	$( "#tgl_akhir" ).datepicker({
		changeYear: true
		changeMonth: true,
		dateFormat: 'yyyy-mm-dd',
	});
		

 // $('#agency').multiselect({
 //  nonSelectedText: 'Select Agency',
 //  enableFiltering: true,
 //  enableCaseInsensitiveFiltering: true,
 //  buttonWidth:'400px'
 // });




//Initialize Select2 Elements
    $('.select2').select2()
/*

//-------------------------------
// Group Area change
$('#area_grup').change(function(){
var area_grup = $(this).val();

console.log('change....!!!');

                // City change
                $('#area_grup').change(function(){
//AreaGroupID					
                    var area_grup = $(this).val();

                    // AJAX request
                    $.ajax({
                        url:'<?=base_url()?>index.php/user/getArea',
                        method: 'post',
                        data: {area_grup: area_grup},
                        dataType: 'json',
                        success: function(response){

                            // Remove options
                            $('#area').find('option').not(':first').remove();
                            $('#agency').find('option').not(':first').remove();

                            // Add options
                            $.each(response,function(index,data){
                                $('#area').append('<option value="'+data['AreaID']+'">'+data['AreaName']+'</option>');
                            });
                        }
                    });
                });




*/

		
//	$('#ceksales').change(function(){
//		$('#npp').val('<?php echo $datax['npp'] + 1?>');
//		});
//	});

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
/**
**/
</script>






        <script type='text/javascript'>
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
				
				

                
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

		        <script type="text/javascript">

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("EmployeeNewCode").value = $(this).attr('data-kode');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("email").value = $(this).attr('data-email');
                $('#myModal').modal('hide');
            });

//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

            function dummy() {
                var kode_obat = document.getElementById("kode_obat").value;
                alert('kode obat ' + kode_obat + ' berhasil tersimpan');
            }
        </script>


<script>
 /*
$(document).ready(function(){
 $('#sales').multiselect({
  nonSelectedText: 'Select Area',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
foreach ($query as $r){
                                    ?>
                                    <tr class="pilih" data-kode="<?php echo $r->EmployeeNewCode; ?>" data-nama="<?php echo $r->nama_lengkap; ?>" data-email="<?php echo $r->email; ?>" >
                                        <td><?php echo $r->EmployeeNewCode; ?></td>
                                        <td><?php echo $r->nama_lengkap; ?></td>
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
		
