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




<form action="<?=site_url('sales_center/update_save');?>" method="POST">

<?php
foreach ($query_update as $datas ) {
  # code...
?>

<input type="hidden" class="form-control" name="sales_center_id" value="<?=$datas->SalesCenterID;?>" >    



  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="agency">Agency</label>

<input type="text" class="form-control" name="Agency" value="<?=$datas->AgencyName;?>" readonly>    
    </div>

    <div class="form-group col-md-4">
      <label for="area">Area</label>
<input type="text" class="form-control" name="Area" value="<?=$datas->AreaName;?>" readonly>    

    </div>

    <div class="form-group col-md-4">
      <label for="kota">Kota</label>
<input type="text" class="form-control" name="City" value="<?=$datas->CityName;?>" readonly>    

    </div>

	</div>


  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="inputEmail4">Kode</label>
<input type="text" class="form-control" name="SalesCenterCode" value="<?=$datas->SalesCenterCode;?>" readonly>    
    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Nama Sales Center</label>
 		<input type="text" class="form-control" name="SalesCenterName" value="<?=$datas->SalesCenterName;?>" readonly>    
    </div>

  <div class="form-group col-md-6">
      <label for="jalan">Jalan / Gedung</label>
 	<div class="form-group">
    <textarea class="form-control" id="jalan" name="jalan"  rows="3" readonly><?=$datas->StreetAddress;?></textarea>
  	</div> 
    </div>

	</div>




     <div class="form-row">

        <div class="form-group col-md-3">
      <label for="no_telpon">Nomer Telpon</label>
    <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?=$datas->PhoneNumber;?>" readonly>
        </div>

        <div class="form-group col-md-3">
      <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?=$datas->EmailAddress;?>" readonly>   
        </div>


        <div class="form-group col-md-2">
      <label for="no_fax">Nomer Fax</label>
    <input type="text" class="form-control" id="no_fax" name="no_fax" value="<?=$datas->FaxNumber;?>" readonly>   
        </div>
<!----
        <div class="form-group col-md-2">
      <label for="tgl_aktif">Tanggal Aktif</label>
    <input type="date" class="form-control" id="tgl_aktif" name="tgl_aktif" placeholder="Tanggal Aktif">   
        </div>
-->

        <div class="form-group col-md-4">
          <label>Kode Pos</label>
          <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?=$datas->PostalCode;?>" readonly>
        </div>

      </div>


      <div class="form-row">
      <div id="result"></div>
      </div>
<!-----




  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="kecamatan">Provinsi</label>
    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?=$datas->SubDistrictAddress;?>" readonly>   
    </div>

    <div class="form-group col-md-3">
      <label for="kode_pos">Kabupaten / Kota</label>
    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?=$datas->CityAddress;?>" readonly>   
    </div>

    <div class="form-group col-md-3">
      <label for="kode_pos">Kecamatan</label>
    <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?=$datas->SubDistrictAddress;?>" readonly>   
    </div>

    <div class="form-group col-md-3">
      <label for="kelurahan">Kelurahan</label>
    <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?=$datas->VillageAddress;?>" readonly>   
    </div>
  </div>
---->

  <div class="form-row">
<!------
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
  ---->


    <div class="form-group col-md-4">
<a href=" <?=site_url('sales_center');?>">
  <button type="button" class="btn btn-primary">KEMBALI</button>
</a>
    </div>


</div>

<?php
}
?>

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



//fungsi tampil kode pos
function tampil_kode_pos(){

        $.ajax({
      url:'<?=base_url()?>index.php/agency/get_ajax',
            method : "GET",
            data   : { cari: $('#kode_pos').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            $('#result').html(hasil);
          });


}

	
$(document).ready(function(){

  tampil_kode_pos();

$('#kode_pos').keyup(function(){
// console.log('generate klik');
  tampil_kode_pos();

});


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