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
        </div>
        <div class="box-body">
<!-- =========================================== -->

<div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  UPLOAD
</button>

</div>
<!--  -->
<div>
<form class="form-inline">


  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Bulan Proses</label>
              <select id="bulan_proses" name="bulan_proses" class="form-control">   
                <option value="">-BULAN PROSES-</option>
                <option value="1">JANUARI</option>
                <option value="2">FEBRUARI</option>
                <option value="3">MARET</option>
                <option value="4">APRIL</option>
                <option value="5">MEI</option>
                <option value="6">JUNI</option>
                <option value="7">JULI</option>
                <option value="8">AGUSTUS</option>
                <option value="9">SEPTEMBER</option>
                <option value="10">OKTOBER</option>
                <option value="11">NOVEMBER</option>
                <option value="12">DESEMBER</option>
             </select>  
  </div>


        <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only">Tahun Proses</label>

  <select id="tahun_proses" name="tahun_proses" class="form-control">   
                <option value="">-TAHUN PROSES -</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
             </select>  
        </div>


  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Jenis Aplikasi</label>

          <select id="jenis_aplikasi" name="jenis_aplikasi" class="form-control">   
                <option value="kartu_kredit">Kartu Kredit</option>
             </select>  

    </div>

  <button type="button" id="generate" class="btn btn-primary mb-2">Generate</button>
</form>
</div>
<!--  -->    

<div id="imported_csv_data">
    

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>BatchID</th>
                    <th>Upload Remark</th>
                    <th>Jenis Aplikasi</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>ACT</th>
                </tr>
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                </tr>
            </table>

</div>


<!-- =========================================== -->
        </div><!-- /.box-body -->
        <div class="box-footer">
         
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script>


        // let bulan_proses = $('#bulan_proses').val();
        // let bulan_proses = document.getElementById('#bulan_proses').value;
        // let tahun_proses = '2018';
        // let jenis_aplikasi = 'CardLink';
    
$("#generate").click(function(){
    // console.log(bulan_proses.value);
    // alert("The paragraph was clicked.");
// load_data();
        var bulan_proses = document.getElementById("bulan_proses");

        var tahun_proses = document.getElementById("tahun_proses");

//        var jenis_aplikasi = document.getElementById("jenis_aplikasi");


        // let bulan_proses = '4';
        // let tahun_proses = '2018';
        // let jenis_aplikasi = 'CardLink';

        $.ajax({
            url:"<?php echo site_url('upload_vendor/load_data_upload_list'); ?>"+'/'+bulan_proses.value+'/'+tahun_proses.value+'/'+kartu_kredit,
            method:"POST",
            success:function(data)
            {
//              console.log(data);
                console.log('data load ok');

                $('#imported_csv_data').html(data);
            }
        })

//=================
    
}); 

$(document).ready(function(){

//console.log('ready');

    function load_data()
    {

        var bulan_proses = document.getElementById("bulan_proses");

        var tahun_proses = document.getElementById("tahun_proses");

//        var jenis_aplikasi = document.getElementById("jenis_aplikasi");


        // let bulan_proses = '4';
        // let tahun_proses = '2018';
        // let jenis_aplikasi = 'CardLink';

        $.ajax({
            url:"<?php echo site_url('upload_vendor/load_data_upload_list'); ?>"+'/'+bulan_proses.value+'/'+tahun_proses.value+'/'+kartu_kredit,
            method:"POST",
            success:function(data)
            {
//              console.log(data);
                console.log('data load ok');

                $('#imported_csv_data').html(data);
            }
        })
    }

// ===============


//=============

    $('#import_csv').on('submit', function(event){
        // console.log('upload....');
///=============
        event.preventDefault();
        $.ajax({
            url:"<?php echo site_url('upload_vendor/upload_file_csv'); ?>",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,          
            beforeSend:function(){
$('#myModal').modal('hide');                    
$('#smallModal').modal('show');                    
                
                // $('#import_csv_btn').html('Importing...');
            },

            success:function(data)
            {
                console.log(data);
                console.log('data terupload');

$('#smallModal').modal('hide'); 

            // load_data();
                // $('#import_csv_btn').html('Suksess..');
            }
        })

//============
    });

})


//----------
function approve_proses(aplikasi,batchid,)
{

        // let url_ = "<?php echo site_url('upload/proses_approve')?>"+aplikasi+"/"+batchid;
        // let url_ = "<?php echo site_url('upload/proses_approve/CCOS/5')?>";
// console.log(url_);
//         console.log(batchid);

    if(confirm('Approve data?'))
    {
        // console.log('data aprove........');
        // ajax delete data to database
        $.ajax({
            // url :url_,

           url : "<?php echo site_url('upload_vendor/ajax_tes')?>/"+batchid,

            // url : "<?php echo site_url('upload/proses_approve')?>/"+aplikasi+"/"+batchid,                        
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                // $('#modal_form').modal('hide');
                // reload_table();

console.log(url);                
console.log(data);                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

console.log(url);                
console.log(data);                

                alert('Error deleting data');
            }
        });

    }
/*
*/
}

//---------

</script>
<?php
$this->load->view('template/foot');
?>                      



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add File</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="import_csv" enctype="multipart/form-data">

          <div class="form-group">
            <label for="recipient-name" class="control-label">File Upload:</label>
            <input type="file" class="form-control" id="csv_file" name="csv_file" >
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Jenis Aplikasi:</label>
            <select name="ApplicationSource" class="form-control">   
                <option value="kartu_kredit">Kartu Kredit</option>
             </select>  
          </div>


          <div class="form-group">
            <label for="recipient-name" class="control-label">Keterangan :</label>
            <textarea name="UploadRemark" class="form-control" rows="6"></textarea>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="control-label">Bulan Proses:</label>
            <select name="ProcessMonth" class="form-control">   
                <option value="">-PILIH-</option>
                <option value="1">JANUARI</option>
                <option value="2">FEBRUARI</option>
                <option value="3">MARET</option>
                <option value="4">APRIL</option>
                <option value="5">MEI</option>
                <option value="6">JUNI</option>
                <option value="7">JULI</option>
                <option value="8">AGUSTUS</option>
                <option value="9">SEPTEMBER</option>
                <option value="10">OKTOBER</option>
                <option value="11">NOVEMBER</option>
                <option value="12">DESEMBER</option>
             </select>  
          </div>


          <div class="form-group">
            <label for="recipient-name" class="control-label">Tahun Proses:</label>
            <select name="ProcessYear" class="form-control">   
                <option value="">-PILIH-</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
             </select>  
          </div>

        <button type="submit" name="import_csv" id="import_csv_btn" class="btn btn-primary">UPLOAD</button>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- small modal UPLOAD PROSES -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <h3>Upload.....</h3>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>