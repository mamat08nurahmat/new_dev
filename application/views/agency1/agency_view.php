<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
  
  
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
		

<?php
foreach($query_update as $datas){
//echo $datas->AgencyID;
?>


      <input type="hidden" class="form-control" id="agency_id" name="agency_id" value="<?=$datas->AgencyID;?>">	




      <div class="form-row">

        <div class="form-group col-md-2">
          <label>Nama Agency</label>
          <input type="text" class="form-control" name="nama_agency" id="nama_agency" value="<?=$datas->AgencyName;?>" readonly>
        </div>

        <div class="form-group col-md-2">
          <label>No Telpon</label>
          <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="<?=$datas->PhoneNumber;?>" readonly>
        </div>

        <div class="form-group col-md-2">
          <label>Email</label>
          <input type="text" class="form-control" name="email" id="email" value="<?=$datas->EmailAddress;?>" readonly>
        </div>

        <div class="form-group col-md-2">
          <label>Type User</label>
          <select name="UserType" class="form-control">
          <option selected><?=$datas->UserType;?></option>

          </select>
        </div>

        <div class="form-group col-md-4">
          <label>Kode Pos</label>
          <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?=$datas->PostalCode;?>" readonly>
        </div>
<!---
        <div class="form-group col-md-2">
        <button type="button" class="btn btn-info btn-lg" id="btn">generate</button>
        </div>
---->

      </div>

      <div class="form-row">
      <div id="result"></div>
      </div>
<!----
-->



      <div class="form-row">
        <div class="form-group col-md-12">
   <div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>PENGURUS</strong></p></div><br>
        </div>
        </div>


      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Nama Pengurus</label>
          <input type="text" class="form-control" name="nama_pengurus" id="nama_pengurus" value="<?=$datas->PersonName;?>" readonly>
        </div>
        <div class="form-group col-md-6">
          <label>Jabatan</label>

          <select name="jabatan" class="form-control">
            <option selected><?=$datas->ItemID;?></option>
         </select>

        </div>
<?php
$time = strtotime('$datas->BirthDate');

// $newformat = date('mm-dd-yyyy',$time);
$newformat = date('mm/dd/yyyy',$time);

//echo $newformat;
?>

<!--
        <div class="form-group col-md-4">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?=$newformat?>" readonly>
        </div>
-->
      </div>




      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Tipe</label>
          <select name="tipe" class="form-control">
            <option selected><?=$datas->IdentityType;?></option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>No Identitas</label>
          <input type="text" class="form-control" name="no_identitas" id="no_identitas" value="<?=$datas->IdentityNumber;?>" readonly>
        </div>

      </div>


<?php	
}
?>  




      <div class="form-row">

        <div class="form-group col-md-12">
          <a href="<?=site_url('agency')?>">
      <button type="submit" class="btn btn-primary">KEMBALI</button>
          </a>
    </div>
  </div>

		
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->

 <script>  
function delete_(id) {
	console.log(id);
    //document.getElementById("demo").innerHTML = "Hello World";
    if(confirm('Are you sure delete this data?'))
    {
/*
*/	
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('agency/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
alert('data terhapus');		
//window.location.replace("<?=site_url('agency/update')?>/"+id);
location.reload(); 
console.log(data);
                //if success reload ajax table
//                $('#modal_form').modal('hide');
  //              reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
	
	
}

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

 $("#UploadBtn").click(function(){
//        $("#myModal").modal();
		$("#myModal").modal("show");
    });

 


// $('#btn').click(function(){
$('#kode_pos').keyup(function(){
// console.log('generate klik');
  tampil_kode_pos();

});
 

/*

      $('#upload_form').on('submit', function(e){


           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
console.log('proses data');
                $.ajax({  
                     url:"<?php echo site_url(); ?>agency/ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
console.log(data);

					  $("#myModal").modal("hide");
					  location.reload(); 
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
*/ 
 
 });  
 </script>  



<?php
$this->load->view('template/foot');
?>

