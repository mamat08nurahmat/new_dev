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
        <li class="active"><?=$subtitle;?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">AGENCY</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
            </div>
        </div>
<div class="box-body">	

<form id="form-data1" action="<?php echo site_url('agency/add_save')?>" method="post" enctype="multipart/form-data" autocomplate="onload"> 





		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>AGENCY</strong></p></div><br>

			<div class="form-row">
				<div class="form-group col-md-2">
					<label>Kode Pos</label>
					<input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
				</div>
				<div class="form-group col-md-5">
					<label>Provinsi</label>
					<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
				</div>
				<div class="form-group col-md-5">
					<label>Kabupaten</label>
					<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten">
				</div>
			</div>



			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Kecamatan</label>
					<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
				</div>
				<div class="form-group col-md-6">
					<label>Kelurahan / Desa</label>
					<input type="text" class="form-control" name="keluranan" id="keluranan" placeholder="Kelurahan">
				</div>
			</div>





			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Status</label>
					<select class="form-control" name="Status">
					<option selected>Pilih status</option>
					<option value="0">Aktif</option>
					<option value="1">Tidak aktif </option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Nama Agency</label>
					<input type="text" class="form-control" name="AgencyName" placeholder="Nama Agency">
				</div>
				<div class="form-group col-md-6">
					<label>Alamat</label>
					<textarea type="text" class="form-control" name="StreetAddress" placeholder="Alamat"></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>No Telp</label>
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="PhoneNumber" placeholder="No Telp">
				</div>
				<div class="form-group col-md-6">
					<label>No Fax</label>
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FaxNumber" placeholder="No Fax">
				</div>
				<div class="form-group col-md-6">
					<label>Kota</label>
					<input type="text" class="form-control" name="CityAddress" placeholder="Kota">
				</div>
				<div class="form-group col-md-6">
					<label for="inputEmail4">Email</label>
					<input type="email" class="form-control" name="EmailAddress" placeholder="Email">
				</div>
				<div class="form-group col-md-6">
					<label>Kodepos</label>
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="PostalCode" placeholder="Kodepos">
				</div>
				<div class="form-group col-md-6">
					<label>Tipe User</label>
					<select name="UserType" class="form-control">
					<option selected>Pilih Tipe User</option>
					<option value="UserType.DS">Direct Sales</option>
					<option value="UserType.Staff">Staff</option>
					<option value="UserType.TeleAcc">Tele Akuisisi</option>
					<option value="UserType.TeleMulti">Tele Multi</option>
					<option value="UserType.TeleBas">Tele Bascassurance</option>
					<option value="UserType.TeleFitur">Tele Fitur</option>
					<option value="UserType.TeleInbound">Tele Inbound</option>
					</select>
				</div>				
				<div>.</div>
		</div>
<!-----
		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>PENGURUS</strong></p></div><br>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Jabatan</label>
					<select class="form-control">
					<option selected>Pilih Jabatan</option>
					<option value="1">Directur Pemasaran</option>
					<option value="2">Directur Utama </option>
					<option value="3">Komisaris</option>
					<option value="4">Manager Pemasaran</option>
					<option value="5">Wakil Directur Utama</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Nama</label>
					<input type="text" class="form-control" name="FaxNumber" placeholder="Nama">
				</div>
				<div class="form-group col-md-6">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir">
				</div>
				<div class="form-group col-md-6">
					<label>No KTP</label>
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="PhoneNumber" placeholder="No KTP">
				</div>
				<div>.</div>
			</div>
		

		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>AKTE PERUSAHAAN</strong></p></div><br>
			<div class="form-row">
				<div class="control-group">
					<img src="<?php echo base_url('img/berkas.jpg') ?>" id="uploadPreview" style="width: 200px; height:150px;border:1px solid;" /></br>
					<input id="uploadImage" type="file" name="photo"  onchange="PreviewImage();" align="center"  />
				</div>
			</div>
		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>DOKUMEN PERUSAHAAN</strong></p></div><br>
		<div class="form-row">
				<div class="control-group col-md-6">
					<img src="<?php echo base_url('img/berkas.jpg') ?>" id="uploadPreview1" style="width: 200px; height:150px;border:1px solid;" /></br>
					<input id="uploadImage1" type="file" name="photo"  onchange="PreviewImage1();" align="center"  />
				</div>
				<div class="control-group col-md-6">
					<img src="<?php echo base_url('img/berkas.jpg') ?>" id="uploadPreview2" style="width: 200px; height:150px;border:1px solid;" /></br>
					<input id="uploadImage2" type="file" name="photo"  onchange="PreviewImage2();" align="center"  />
				</div>
				<div class="control-group col-md-6">
					<img src="<?php echo base_url('img/berkas.jpg') ?>" id="uploadPreview3" style="width: 200px; height:150px;border:1px solid;" /></br>
					<input id="uploadImage3" type="file" name="photo"  onchange="PreviewImage3();" align="center"  />
				</div>
				<div class="control-group col-md-6">
					<img src="<?php echo base_url('img/berkas.jpg') ?>" id="uploadPreview4" style="width: 200px; height:150px;border:1px solid;" /></br>
					<input id="uploadImage4" type="file" name="photo"  onchange="PreviewImage4();" align="center"  />
				</div>
			<div>.</div>
		</div>
		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>NO REKENING</strong></p></div><br>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Jenis Rekening </label>
					<select class="form-control">
					<option selected>Pilih Jenis Rekening</option>
					<option value="1">Reserve</option>
					<option value="2">NON Reserve</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Cabang</label>
					<input type="text" class="form-control" name="FaxNumber" placeholder="Cabang">
				</div>
				<div class="form-group col-md-6">
					<label>No Rekening</label>
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="no_rekening" placeholder="No Rekening">
				</div>
				<div class="form-group col-md-6">
					<label>Nama Bank</label>
					<input type="text" class="form-control" name="PhoneNumber" placeholder="No Bank">
				</div>
				<div>.</div>
			</div>
		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>PERJANJIAN KERJASAMA</strong></p></div><br>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Status</label>
					<select class="form-control">
					<option selected>Pilih status</option>
					<option value="0">Aktif</option>
					<option value="1">Tidak aktif </option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Nomor</label>
					<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="FaxNumber" placeholder="No Fax">
				</div>
				<div class="form-group col-md-6">
					<label>Tanggal Awal</label>
					<input type="date" class="form-control" name="tgl_awal" placeholder="Nama Agency">
				</div>
				<div class="form-group col-md-6">
					<label>Tanggal Akhir</label>
					<input type="date" class="form-control" name="PhoneNumber" placeholder="No Telp">
				</div>
				<div class="control-group col-md-6">
					<img src="<?php echo base_url('img/berkas.jpg') ?>" id="uploadPreview5" style="width: 150px; height:100px;border:1px solid;" /></br>
					<input id="uploadImage5" type="file" name="photo"  onchange="PreviewImage5();" align="center"  />
				</div>
				<div class="form-group col-md-6">
					<label>Alasan Pengakhiran PKS</label>
					<textarea type="text" class="form-control" name="PhoneNumber"></textarea>
				</div>	
				<?php
				$date=date('Y/m/d');
				?>
				<input type="hidden" name="tgl" value="<?php echo $date ?>">		
------>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="kirim" onclick="return validasi_input(form)"   value="SIMPAN">
						<input type="reset" class="btn btn-inverse" value="Reset">
					</div><!-- /.box-footer-->
			</div>
			
		</form>
	</div><!-- /.box-body -->

</div><!-- /.box -->

</section><!-- /.content -->

	
    <script type="text/javascript">
				function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
				};
				function PreviewImage1() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview1").src = oFREvent.target.result;
				};
				};
				function PreviewImage2() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage2").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview2").src = oFREvent.target.result;
				};
				};
				function PreviewImage3() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage3").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview3").src = oFREvent.target.result;
				};
				};
				function PreviewImage4() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage4").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview4").src = oFREvent.target.result;
				};
				};
				function PreviewImage5() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage5").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview5").src = oFREvent.target.result;
				};
				};
			
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
	

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

<script type="text/javascript">

$(document).ready(function(){	
//===================================show modal klik
// Get the button that opens the modal
let kode_pos = document.getElementById("kode_pos");

// When the user clicks the button, open the modal 
kode_pos.onclick = function() {
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

})

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
                        <h4 class="modal-title" id="myModalLabel">KODE POS</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Pos</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kabupaten</th>
                                    <th>Provinsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //Data mentah yang ditampilkan ke tabel    
foreach ($query_kode_pos as $r){
                                    ?>

                                    <tr class="pilih" 

                                    data-kode_pos="<?php echo $r->kodepos; ?>" 
                                    data-kelurahan="<?php echo $r->kelurahan; ?>" 
                                    data-kecamatan="<?php echo $r->kecamatan; ?>" 
                                    data-kabupaten="<?php echo $r->kabupaten; ?>" 
                                    data-provinsi="<?php echo $r->provinsi; ?>" 
                                    >


                                        <td><?php echo $r->kodepos; ?></td>
                                        <td><?php echo $r->kelurahan; ?></td>
                                        <td><?php echo $r->kecamatan; ?></td>
                                        <td><?php echo $r->kabupaten; ?></td>
                                        <td><?php echo $r->provinsi; ?></td>

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
        

