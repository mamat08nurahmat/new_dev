<?php 
$this->load->view('template/head');
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


      <div class="box-body">




<form action="<?=site_url('sales_center/add_save');?>" method="POST">


  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="agency">Agency</label>
      <select id="agency"  name="agency" class="form-control">
      <option selected>Choose...</option>
<?php
foreach ($query_agency as $agency) {
// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
?>
        <option value="<?=$agency->AgencyID;?>"><?=$agency->AgencyName;?></option>

<?php
}
?>

      </select>    
    </div>

    <div class="form-group col-md-4">
      <label for="area">Area</label>
      <select id="area" name="area" class="form-control">
        <option selected>Choose...</option>

<?php
foreach ($query_area as $area) {
// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
?>
        <option value="<?=$area->AreaID;?>"><?=$area->AreaCode.' - '.$area->AreaName;?></option>

<?php
}
?>


      </select>    
    </div>

    <div class="form-group col-md-4">
      <label for="kota">Kota</label>
      <select id="kota" name="kota" class="form-control">
        <option selected>Choose...</option>
        

      </select>    
    </div>

	</div>


  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="inputEmail4">Kode</label>
 		<input type="text" class="form-control" id="kode" name="kode" value="<?//=$sc_code;?>" 
 		readonly>   
<!---
    <button id="generate" name="generate" type="button">GENERATE</button>     
---->

    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Nama Sales Center</label>
 		<input type="text" class="form-control" id="nama_sales_center" name="nama_sales_center" placeholder="Nama Sales Center">   
    </div>

  <div class="form-group col-md-6">
      <label for="jalan">Jalan / Gedung</label>
 	<div class="form-group">
    <textarea class="form-control" id="jalan" name="jalan" rows="3"></textarea>
  	</div> 
    </div>

	</div>







  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="kelurahan">Kelurahan</label>
 		<input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">   
    </div>

    <div class="form-group col-md-4">
      <label for="kecamatan">Kecamatan</label>
 		<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">   
    </div>

    <div class="form-group col-md-4">
      <label for="kode_pos">Kode Pos</label>
 		<input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">   
    </div>


	</div>


  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="no_telpon">Nomer Telpon</label>
 		<input type="text" class="form-control" id="no_telpon" name="no_telpon" placeholder="Nomer Telpon">   
    </div>

    <div class="form-group col-md-4">
      <label for="no_fax">Nomer Fax</label>
 		<input type="text" class="form-control" id="no_fax" name="no_fax" placeholder="Nomer Fax">   
    </div>

    <div class="form-group col-md-4">
      <label for="email">Alamat Email</label>
 		<input type="email" class="form-control" id="email" name="email" placeholder="Email">   
    </div>


	</div>

  <div class="form-row">

   <div class="form-group col-md-4">
      <label for="tgl_aktif">Tanggal Aktif</label>
 		<input type="date" class="form-control" id="tgl_aktif" name="tgl_aktif" placeholder="Tanggal Aktif">   
    </div>

    <div class="form-group col-md-4">
      <label class="form-check-label" for="aktif">
        Aktif
      </label>
       <input class="form-check-input" type="checkbox" id="aktif" name="aktif" >
    </div>


    <div class="form-group col-md-4">

  <button type="submit" class="btn btn-primary">SAVE</button>
    </div>


</div>

</form>




        </div><!-- /.box-body -->



        </div>
  

    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">

function generate_kode(){

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

///----------------------------------------
                // Area change Select
                $('#area').change(function(){

                    var area = $(this).val();
//console.log(area);                       
                    // AJAX request
                    $.ajax({
                       url:'<?=base_url()?>index.php/sales_center/getCity',
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
                            $('#kota').find('option').not(':first').remove(); //select ke 3
              //              $('#area_grup').find('option').not(':first').remove(); //select ke 2

                            // Add options
                            $.each(response,function(index,data){
                                $('#kota').append('<option value="'+data['CityID']+'">'+data['CityName']+'</option>');

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



<?php
$this->load->view('template/foot');
?>