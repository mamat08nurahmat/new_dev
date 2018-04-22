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




<form action="<?=site_url('mapping/terminate_add_save');?>" method="POST">

   <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <!-- <label for="formGroupExampleInput">Image</label> -->
 <img src="https://pps.whatsapp.net/v/t61.11540-24/19949508_750016421867041_571123941905530880_n.jpg?oe=5ACF0F21&oh=4022531147f8988436f1d5af98f99604"  id="photo" class="img-thumbnail" alt="Cinque Terre" width="150" height="250"> 
<!-- <img src="<?php echo base_url("gambar/".$x->photo."") ?>"  id="foto" class="img-thumbnail" alt="Cinque Terre" width="250" height="300"> -->

  </div>

  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Code</label>
    <input type="text" class="form-control" id="sales_code" name="sales_code" placeholder="SALES CODE" readonly>
  </div>

    <input type="hidden"  id="id_employee" name="id_employee" placeholder="id_employee" readonly> 
  
  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" readonly> 
  </div>
  
  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Agency</label>
    <input type="text" class="form-control" id="agency" name="agency" placeholder="Agency" readonly>   
  </div>
  
  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Sales Center</label>
   <input type="text" class="form-control" id="sales_center" name="sales_center" placeholder="Sales Center" readonly> 
  </div>



  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Atasan Lama</label>
   <input type="text" class="form-control" id="kode_atasan" name="kode_atasan" placeholder="KODE ATASAN" readonly> 
  </div>


<!--  -->
  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Atasan Baru</label>
   <input type="text" class="form-control" id="kode_atasan_baru" name="kode_atasan_baru" placeholder="KODE ATASAN BARU"> 
  </div>

  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Posisi Baru</label>
   <input type="text" class="form-control" id="posisi_baru" name="posisi_baru" placeholder="POSISI BARU"> 
  </div>

  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Tanggal Update</label>
   <input type="date" class="form-control" id="tgl_update" name="tgl_update"> 
  </div>



  <div class="form-group input-group mb-2 mr-sm-2 mb-sm-0">
    <label for="formGroupExampleInput2">Keterangan</label>
 <textarea class="form-control" rows="4" name="keterangan" id="keterangan" cols="50">
</textarea> 

  </div>

<!--  -->















  <div class="form-row">
    <div class="form-group col-md-12">

  <button type="submit" class="btn btn-primary" name="subbmit">SAVE</button>
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
                let image_url =  '<?php echo base_url("gambar") ?>'+"/"+$(this).attr('data-photo');
                // let image_file =  $(this).attr('data-photo');
                console.log(image_url);
               
                $("#photo").attr("src",image_url);
                // <?php //echo base_url("gambar/".$x->photo."") ?>
                 // $("#photo").attr("src","http://dummyimage.com/250x155/") = $(this).attr('data-photo');


                document.getElementById("id_employee").value = $(this).attr('data-id_employee');

                
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("agency").value = $(this).attr('data-agency');
                document.getElementById("sales_center").value = $(this).attr('data-sales_center');
                document.getElementById("kode_atasan").value = $(this).attr('data-kode_atasan');

                // document.getElementById("posisi").value = $(this).attr('data-posisi');
                // document.getElementById("status").value = $(this).attr('data-status');
                // document.getElementById("grade").value = $(this).attr('data-grade');
                // document.getElementById("kode_atasan").value = $(this).attr('data-jenis_kelamin');
                

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

                                    <tr class="pilih" 
                  data-id_employee="<?php echo $r->id; ?>" 

                  data-photo="<?php echo $r->photo; ?>" 
                  data-kode="<?php echo $r->sales_code; ?>" 
                  data-nama="<?php echo $r->nama; ?>" 
                  data-agency="<?php echo $r->agency; ?>" 
                  data-sales_center="<?php echo $r->sales_center; ?>" 
                  data-kode_atasan="<?php echo $r->atasan; ?>" 


                  >

<!--                   data-posisi="<?php echo $r->posisi; ?>" 
                  data-status="<?php echo $r->status; ?>" 
                  data-grade="<?php echo $r->grade; ?>" 
                  data-jenis_kelamin="<?php echo $r->jenis_kelamin; ?>" 
 -->                  
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
        

