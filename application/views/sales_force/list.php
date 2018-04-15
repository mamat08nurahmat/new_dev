<?php 
$this->load->view('template/head');
?>
<style>
.dataTables_filter label{
float : right;
	
}

.pagination{
float : right;
	
}

</style>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$title;?>
<!--
        <small>it all starts here</small>
-->		
		
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?=$title;?></a></li>
<!---
        <li><a href="#"></a></li>
-->		
        <li class="active"><?=$subtitle;?></li>
    </ol>

</section>

        <!-- Main content -->
        <section class="content">

        <div class="row">
			<div class="col-xs-1">
              <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_ktp()"><i class="glyphicon glyphicon-plus">
               ADD</i>
              </button>
			</div>		  
			<div class="col-xs-11">
			<div class="pull-right">
					<td><a  class="btn btn-success" href="<?php echo site_url('download/download'); ?>"><i class="glyphicon glyphicon-download-alt"></i> Download Komitmen Do's & Don'ts</a></td>
					<p></p>	
			</div>
			</div>		  
		
		</div>		  
		
          <div class="row">
           <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
				  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
					
                      <tr style="bg-color:blue;">
                        <th>No</th>
                        <th>Posisi</th>
                        <th>Agency</th>
                        <th>Sales Center</th>
                        <th>Nama Lengkap</th>
						<th style="width:110px;"><center>Aksi</center></th>
						<th>Tanggal Proses</th>
						<th>Status Proses</th>		
                      </tr>
                    </thead>
                    <tbody>
<!--
					<tr>
                        <td>PPU XXXX</td>
                        <td>TIKA FAZRI ASTUTI</td>
                        <td>KAQ</td>
                        <td>DSR</td>
                        <td>Trainee</td>
                        <td>T1</td>
                        <td>TIHA MAFTUHAH</td>
                        <td>08/11/1999</td>
                        <td>ACTIVE</td>
					</tr>						
					
-->
<?php
$i=1;
foreach($query as $datas){
			if($datas->ket==1) {
                $ket = "Approve";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 
            }	
			elseif($datas->ket==2) {
				$ket = "Waiting approve rsm";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				";	
            }
			elseif($datas->ket==3) {
				$ket = "Waiting approve sgv wilayah";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 		
            }
			elseif($datas->ket==4) {
                $ket = "Waiting approve sgv pusat ";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 
            }elseif($datas->ket==5) {
                $ket = "Hold RSM";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==6) {
                $ket = "Hold sgv wilayah";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==7) {
                $ket = "Hold sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==8) {
                $ket = "Cancel sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==9) {
                $ket = "Cancel sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==10) {
                $ket = "Cancel sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==11) {
				$ket = "REJECT RSM";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				";	
            }
			elseif($datas->ket==12) {
				$ket = "REJECT sgv wilayah";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 		
            }
			elseif($datas->ket==13) {
                $ket = "REJECT sgv pusat ";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 
			}else{

         $ket = "Sales Aktif ";
        $tombol ="";  
        $tombol .="
        <a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
        "; 

      }	
?>


		<tr>
          <td><?=$i++;?></td>
          <td><?=$datas->posisi;?></td>
          <td><?=$datas->agency;?></td>  
          <td><?=$datas->sales_center;?></td>
          <td><?=$datas->nama;?></td>
          <td>
		  <?=$tombol;?>
<!---
      <a class="btn btn-mini" href="<?php echo site_url("Sales_force/view/".$datas->no_ktp."")?>"><i class="glyphicon glyphicon-search"></i></a>
-->     
		  </td>
          <?php $format=date('d-m-Y',strtotime($datas->tgl)); ?>
		  <td><?=$format;?></td>
      <td><?=$ket?></td>		
		</tr>
<?php
}
?>
                    </tbody>
                    <tfoot>		  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?php 
    

$this->load->view('template/js');
?>
<!-- DATA TABES SCRIPT -->
    <script src="<?php echo $this->config->item('base_url') ?>assets/AdminLTE-2.0.5//plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url') ?>assets/AdminLTE-2.0.5//plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!--tambahkan custom js disini-->
<!-- page script -->
    <script type="text/javascript">
/*
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
*/	
$(document).ready(function() {
       // $("#example1").dataTable();
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true
        });	
/*
*/		
/*
    //datatables
    table = $('#example1').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('sales_force/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
 
    });
 
*/	
/*
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
*/ 
/*
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
*/ 
 
});
 
function add_ktp()
{
    save_method = 'cek_ktp';
    $('#modal_default').modal('show'); // show bootstrap modal
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.modal-title').text('Cek KTP'); // Set Title to Bootstrap modal title
/*
*/	
 
//    $('#photo-preview').hide(); // hide photo preview modal
 
//    $('#label-photo').text('Upload Photo'); // label photo upload
} 

function cek_ktp()
{
	var mincar = 16;
  if (form.no_ktp.value.length < mincar){
    alert("Input Number Minimal 16 Karater!");
    form.no_ktp.focus();
    return (false);
  }

	let no_ktp = document.getElementById('no_ktp').value;
	let site_url_add = "<?php echo site_url('sales_force/add')?>/"  + no_ktp;
	let site_url_update = "<?php echo site_url('sales_force/view')?>/" + no_ktp;
	
	//alert("cek ktp");
//    save_method = 'cek_ktp';



$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('sales_force/ajax_cek_ktp')?>/" + no_ktp,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

//alert(data);
if(data==null){
//alert('NO KTP TIDAK ADA --- INPUT'); 
	 $('#modal-default').modal('hide');

alert("NO  :"+no_ktp+ "  BELUM TERDAFTAR");	
  location.replace(site_url_add);
}
else{
 $('#modal-default').modal('hide');

alert("NO  :"+no_ktp+ "  SUDAH TERDAFTAR");	
  location.replace(site_url_update);	
}
/*
*/		
			
/*
            $('[name="id"]').val(data.id);
            $('[name="firstName"]').val(data.firstName);
            $('[name="lastName"]').val(data.lastName);
            $('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
 
            $('#photo-preview').show(); // show photo preview modal
 
            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
 
            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }
 */
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
    //          alert('TIDAK ADA -- INPUT');
        }
    });

}	  
	  
	  

	  
    </script>



<?php
$this->load->view('template/foot');
?>

 <div class="modal fade" id="modal_default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
			  
			  
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">No KTP</label>
                            <div class="col-md-9">
							
                                <input id="no_ktp" name="no_ktp" placeholder="No KTP"  maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
				</form>
						
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="cek_ktp();" >CEK KTP</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
<script type="text/javascript">
	function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		  if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		return false;
	return true;
	}
	
function validasi_input(form){
  var mincar = 16;
  if (form.no_ktp.value.length < mincar){
    alert("Input Number Minimal 16 Karater!");
    form.no_ktp.focus();
    return (false);
  }
   return (true);
}
</script>		