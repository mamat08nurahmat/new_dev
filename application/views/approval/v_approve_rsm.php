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
        <?=$title;?>
<!--
        <small>it all starts here</small>
-->		
		
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
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
            </div>
        </div>
        <div class="box-body">
		<form id="form-data1" action="<?php echo site_url('approval/save_history')?>" method="post" enctype="multipart/form-data" autocomplate="onload"> 
<?php
foreach($query_ktp as $x){
?>	
		<div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>REGISTRASI FORM</strong></p></div>
		<p></p>
		<table align ="left">
		<tr><td>Posisi</td>
		<td><select name="id_posisi" id="id"  readonly="readonly">
		<?php foreach($query_posisi as $posisi){ ?>		
		<option value="<?php echo $posisi->id_posisi ?>"><?php echo $posisi->posisi ?></option>
		<?php }?>
		</select>
		</td></tr>		
		<tr><td>Agency</td>
		<td><select name="AgencyID" id="id"  readonly="readonly">
		<?php foreach($query_agency as $y){?>
		<option value="<?php echo $y->AgencyID ?>"><?php echo $y->AgencyName ?></option>
		<?php }?>
		</select>
		</td>
		</tr>
		
		<tr><td>Sales Center</td>
		<td><select name="SalesCenterID" id="id"  readonly="readonly">
		<?php foreach($query_agency as $y){?>
		<option value="<?php echo $y->AgencyID ?>"><?php echo $y->AgencyName ?></option>
		<?php }?>
		</select>
		</td></tr>
	</table>
	<table align="center">		
		<tr><td>Atasan</td>
			<td><select name="SalesCenterID" id="id"  readonly="readonly">
		<?php foreach($query_agency as $y){?>
		<option value="<?php echo $y->AgencyID ?>"><?php echo $y->AgencyName ?></option>
		<?php }?>
		</select></td></tr>
		
		<tr><td>Kode</td>
			<td><select name="SalesCenterID" id="id"  readonly="readonly">
		<?php foreach($query_agency as $y){?>
		<option value="<?php echo $y->AgencyID ?>"><?php echo $y->AgencyName ?></option>
		<?php }?>
		</select></td></tr>
		
		<tr><td>Grade/lavel</td>
			<td><select name="SalesCenterID" id="id"  readonly="readonly">
		<?php foreach($query_agency as $y){?>
		<option value="<?php echo $y->AgencyID ?>"><?php echo $y->AgencyName ?></option>
		<?php }?>
		</select></td></tr>
</table>
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PERSONAL DATA</strong></div>
<p></p>
<div class="control-group" align = "center" >
		<img src="<?php echo base_url("gambar/".$x->photo."") ?>" id="uploadPreview" style="width: 150px; height:160px;border:1px solid;" /></br>	
		<?php echo $x->photo;?>
		</div>
<table align ="left">
		<tr><td>Nama Lengkap </td>
			<td><input value="<?=$x->nama_lengkap;?>" name="nama_lengkap" type="text" onkeypress="return huruf(event)"  disabled></td>
		</tr>

		<tr><td>Nama Panggil </td>
			<td><input name="nama_panggil"type="text" value="<?=$x->nama_panggil;?>"onkeypress="return huruf(event)" disabled></td>
		</tr>
		
		<tr><td>No KTP </td>
			<td><input name="no_ktp" value="<?=$x->no_ktp;?>" onkeypress="return hanyaAngka(event)" maxlength="16" type="text" disabled></td>
		</tr>
		
		<tr><td>NPWP </td>
			<td><input name="npwp"  value="<?=$x->npwp;?>" onkeypress="return hanyaAngka(event)" maxlength="17" type="text" disabled></td>
		</tr>
		
		<tr><td>Tempat Lahir </td>
			<td><input name="tempat_lahir" value="<?=$x->tempat_lahir;?>" type="text" onkeypress="return huruf(event)" disabled></td>
		</tr>
		
		<tr><td>Tanggal Lahir </td>
			<td><input name="tanggal_lahir"  value="<?=$x->tanggal_lahir;?>" id="tanggal_lahir" size="40" type="date" disabled></td>
		</tr>
		
		<tr><td>Tinggi Badan </td>
			<td><input style="width:50px;"  value="<?=$x->tinggi_badan;?>" name="tb" type="number" maxlength="3" disabled>cm</td>
		</tr>
		
		<tr><td>Berat Badan </td>
			<td><input style="width:50px;" name="bb"  value="<?=$x->berat_badan;?>" type="number" maxlength="3" disabled>kg</td>
		</tr>
		
		<tr><td>Alamat Rumah Tinggal Saat Ini </td>
			<td><textarea name="alamat" type="text" disabled><?=$x->alamat;?></textarea></td>
		</tr>
	
		<tr><td>Kota</td>
			<td><input name="kota" type="text"  value="<?=$x->kota;?>" onkeypress="return huruf(event)" disabled></td>
		</tr>
		
		<tr><td>Kode Pos </td>
			<td><input name="kodepos"  value="<?=$x->kodepos;?>" onkeypress="return hanyaAngka(event)" maxlength="5" type="text" disabled></td>
		</tr>
	
		<tr><td>Lama Tinggal </td>
			<td><input style="width:50px;"  value="<?=$x->lama;?>" name="lama" onkeypress="return hanyaAngka(event)" maxlength="3" type="text" disabled>Tahun</td>
		</tr>
	
		<tr><td>Status Tempat Tinggal </td>
		<td>
			<input name="status_tinggal" type="radio" value="orang tua" <? if($x->status_tinggal=='orang tua'){echo 'checked';}?> disabled>orang tua 
			<input name="status_tinggal" type="radio" value="sendiri" <? if($x->status_tinggal=='sendiri'){echo 'checked';}?> />sendiri
			<input name="status_tinggal" type="radio" value="sewa" <? if($x->status_tinggal=='sewa'){echo 'checked';}?> />sewa 
		</td></tr>
</table>
<table align="center">	
		<tr><td>Status</td>
		<td><select name="status" disabled>
		<option value>Pilih status</option>
		<option value="lajang" <?php if( $x->status=='lajang'){echo "selected"; } ?>   >lajang</option>
		<option value="menikah" <?php if( $x->status=='menikah'){echo "selected"; } ?>   >menikah </option>
		<option value="bercerai" <?php if( $x->status=='bercerai'){echo "selected"; } ?>   >bercerai </option>
		</select></td></tr>
				
		<tr>
		<td>Agama</td>
		<td><select name="agama" disabled>
		<option value>Pilih agama</option>
		<option value="islam" <?php if( $x->agama=='islam'){echo "selected"; } ?>>islam</option>
		<option value="kristen" <?php if( $x->agama=='kristen'){echo "selected"; } ?>>kristen</option>
		<option value="budha" <?php if( $x->agama=='budha'){echo "selected"; } ?>>budha </option>
		<option value="hindu" <?php if( $x->agama=='hindu'){echo "selected"; } ?>>hindu </option>
		<option value="khongucu" <?php if( $x->agama=='khongucu'){echo "selected"; } ?>>khongucu </option>
		</select></td></tr>

		<tr>
		<td>Telp Rumah </td>
		<td><input name="telp" type="text" maxlength="13"  value="<?=$x->telp;?>" onkeypress="return hanyaAngka(event)" disabled></td>
		</tr>
		
		<tr>
		<td>No HP </td>
		<td><input name="hp"  type="text" maxlength="13"  value="<?=$x->hp;?>" onkeypress="return hanyaAngka(event)" disabled></td>
		</tr>
		
		<tr>
		<td>No HP 2 </td>
		<td><input name="hp2"  type="text" maxlength="13"  value="<?=$x->hp2;?>"  onkeypress="return hanyaAngka(event)" disabled></td>
		</tr>
		
		<tr>
		<td>Nama Ibu Kandung </td>
		<td><input name="ibu" type="text"  value="<?=$x->ibu;?>" onkeypress="return huruf(event)" disabled></td>
		</tr>
		
		<tr>
		<td>Alamat Rumah Tinggal KTP </td>
		<td><textarea name="alamat_ktp" type="text" disabled><?=$x->alamat_ktp;?></textarea></td>
		</tr>
		<tr>
		<td>Kota </td>
		<td><input name="kota_ktp"  value="<?=$x->kota_ktp;?>" type="text" onkeypress="return huruf(event)" disabled></td>
		</tr>
		<tr>
		<td>Kode Pos </td>
		<td><input name="kodepos_ktp"  value="<?=$x->kodepos_ktp;?>" onkeypress="return hanyaAngka(event)" maxlength="5" type="text" disabled></td>
		</tr>
		
		<tr>
		<td>Lama Tinggal </td>
		<td><input name="tinggal_ktp"   value="<?=$x->tinggal_ktp;?>" style="width:50px;" maxlength="3" type="text" onkeypress="return hanyaAngka(event)" disabled> Tahun</td>
		</tr>
		
		<tr>
		<td>E-mail </td>
		<td><input name="email"   value="<?=$x->email;?>" type="text" disabled></td>
		</tr>
		
		<tr>
		<td>Kendaraan </td>
		<td>
		<input name="kendaraan" type="radio" value='mobil' <? if($x->kendaraan=='mobil'){echo 'checked';}?> />mobil 
		<input name="kendaraan" type="radio" value='motor' <? if($x->kendaraan=='motor'){echo 'checked';}?> />motor
		<input name="kendaraan" type="radio" value='kendaraan umun'  <? if($x->kendaraan=='kendaraan_umum'){echo 'checked';}?> />kendaraan umum
		</td></tr>
		
		<tr><td>Tanggal aktif </td>
			<td><input name="tgl_aktif"  value="<?=$x->tgl_aktif;?>" type="date" disabled></td>
		</tr>
		
		<tr><td>Tanggal Non Aktif </td>
			<td><input name="tgl_nonaktif" value="<?=$x->tgl_nonaktif;?>"  type="date" disabled></td>
		</tr>
</table>
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>EMERGENCY CONTACT</strong></div>
<p></p>
<table align= "left">		
		<tr><td>Nama</td>
			<td><input name="nama" type="text"  value="<?=$x->nama;?>"  onkeypress="return huruf(event)" disabled></td>
		</tr>
		<tr>
			<td>No HP</td>
			<td><input name="no_hp" type="text"  value="<?=$x->no_hp;?>"  maxlength="13" onkeypress="return hanyaAngka(event)" disabled></td>
		</tr>
</table>
	<table align="center">
		<tr>
		<td>Hubungan</td>
			<td><select name="hubungan" disabled>
		<option value>Pilih Hubungan</option>
		<option value>Pilih Hubungan</option>
		<option value="adik" 	<?php if( $x->hubungan=='adik'){echo "selected"; } ?> >Adik</option>
		<option value="kakak" 	<?php if( $x->hubungan=='kakak'){echo "selected"; } ?>>Kakak</option>
		<option value="ibu" 	<?php if( $x->hubungan=='ibu'){echo "selected"; } ?>  >Ibu</option>
		<option value="ayah" 	<?php if( $x->hubungan=='ayah'){echo "selected"; } ?> >Ayah</option>
		<option value="bibi" 	<?php if( $x->hubungan=='bibi'){echo "selected"; } ?> >Bibi</option>
		<option value="sepupu" 	<?php if( $x->hubungan=='sepupu'){echo "selected"; }?>>Sepupu</option>
		<option value="sakek" 	<?php if( $x->hubungan=='kakek'){echo "selected"; } ?>>Kakek</option>
		<option value="nenek" 	<?php if( $x->hubungan=='nenek'){echo "selected"; } ?>>Nenek</option>
		</select></td>	
		</tr>		
		<tr><td>Alamat</td>
			<td><textarea name="alamat_emergency" type="text" disabled ><?=$x->alamat_ktp;?></textarea></td>
		</tr>

	</table>
<p></p>	
<p></p>	
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PENDIDIKAN FORMAL</strong></div>
<p></p>
	<table border="1">
    <tr align ="center">
        <td>JENJANG PENDIDIKAN</td>
        <td>NAMA SEKOLAH</td>
        <td>KOTA</td>
		<td>PROGRAM STUDY</td>
		<td>NEM/IPK</td>
		<td>TAHUN IJAZAH</td>
    </tr>
    <tr>
        <td><input name="jenjang_pendidikan" style="width:125px;" value="<?=$x->jenjang_pendidikan?>" type="text"  /></td>
        <td><input name="nama_sekolah" style="width:200px;" value="<?=$x->nama_sekolah?>" type="text"  /></td>
		<td><input name="kota_sekolah" style="width:100px;" value="<?=$x->kota_sekolah?>" type="text" onkeypress="return huruf(event)" /></td>
        <td><input name="program_study" style="width:100px;" value="<?=$x->program_study?>" type="text" onkeypress="return huruf(event)"  /></td>
		<td><input name="ipk" style="width:100px;" type="text"  value="<?=$x->ipk?>" onkeypress="return hanyaAngka(event)"  /></td>
		<td><input name="tahun_ijazah" style="width:100px;"  value="<?=$x->tahun_ijazah?>" onkeypress="return hanyaAngka(event)" type="text"  /></td>
        
    </tr>
	<tr>
        <td><input name="jenjang_pendidikan1" style="width:125px;" value="<?=$x->jenjang_pendidikan1?>" type="text" /></td>
        <td><input name="nama_sekolah1" style="width:200px;" value="<?=$x->nama_sekolah1?>" type="text"/></td>
		<td><input name="kota_sekolah1" style="width:100px;" value="<?=$x->kota_sekolah1?>" type="text" onkeypress="return huruf(event)" /></td>
        <td><input name="program_study1" style="width:100px;"  value="<?=$x->program_study1?>" type="text" onkeypress="return huruf(event)"/></td>
		<td><input name="ipk1" style="width:100px;" type="text"  value="<?=$x->ipk1?>"onkeypress="return hanyaAngka(event)"/></td>
		<td><input name="tahun_ijazah2" style="width:100px" type="text" value="<?=$x->tahun_ijazah1?>"onkeypress="return hanyaAngka(event)"  /></td>
    </tr>
	<tr>
        <td><input name="jenjang_pendidikan2" style="width:125px;"value="<?=$x->jenjang_pendidikan2?>" type="text" /></td>
        <td><input name="nama_sekolah2" style="width:200px;" value="<?=$x->nama_sekolah2?>" type="text"/></td>
		<td><input name="kota_sekolah2" style="width:100px;" type="text" value="<?=$x->kota_sekolah2?>"onkeypress="return huruf(event)"/></td>
        <td><input name="program_study2" style="width:100px;"  value="<?=$x->program_study2?>" type="text" onkeypress="return huruf(event)" /></td>
		<td><input name="ipk2" style="width:100px;" type="text"  value="<?=$x->ipk2?>" onkeypress="return hanyaAngka(event)"/></td>
		<td><input name="tahun_ijazah2" style="width:100px" type="text" value="<?=$x->tahun_ijazah2?>"onkeypress="return hanyaAngka(event)"  /></td>
        
    </tr>
</table>
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PENGALAMAN BEKERJA</strong></div>
<p></p>
<table border="1">
	<tr align ="center">
        <td>PERUSAHAAN</td>
		<td>POSISI/JABATAN</td>
		<td>TANGGAL MASUK</td>
		<td>TANGGAL RESIGN</td>
		<td>KETERANGAN</td>
    </tr>
	<tr>
        <td><input name="perusahaan" style="width:175px;" value="<?=$x->perusahaan?>" type="text"></td>
		<td><input name="jabatan" style="width:130px;" value="<?=$x->jabatan?>" type="text"></td>
		<td><input name="tgl_masuk" style="width:120px;" value="<?=$x->tgl_masuk?>" type="date"></td>
		<td><input name="tgl_resign" style="width:120px;" value="<?=$x->tgl_resign?>" type="date"></td>
        <td><input name="alasan" style="width:200px;" value="<?=$x->alasan?>" type="text"></td>
	</tr>
	<tr>
        <td><input name="perusahaan1" style="width:175px;" value="<?=$x->perusahaan1?>" type="text"></td>
		<td><input name="jabatan1" style="width:130px;" value="<?=$x->jabatan1?>"type="text"></td>
		<td><input name="tgl_masuk1" style="width:120px;" value="<?=$x->tgl_masuk1?>" type="date"></td>
		<td><input name="tgl_resign1" style="width:120px;" value="<?=$x->tgl_resign1?>"type="date"></td>
        <td><input name="alasan1" style="width:200px;" value="<?=$x->alasan1?>"type="text"></td>
	</tr>
	<tr>
        <td><input name="perusahaan2" style="width:175px;" value="<?=$x->perusahaan2?>"type="text"></td>
		<td><input name="jabatan2" style="width:130px;" value="<?=$x->jabatan2?>"type="text"></td>
		<td><input name="tgl_masuk2" style="width:120px;" value="<?=$x->tgl_masuk2?>"type="date"></td>
		<td><input name="tgl_resign2" style="width:120px;" value="<?=$x->tgl_resign2?>"type="date"></td>
        <td><input name="alasan2" style="width:200px;" value="<?=$x->alasan2?>"type="text"></td>
	</tr>
	
</table>
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>HISTORY</strong></div>
<p></p>


        <!-- Main content -->
        <section class="content">

          <div class="row">
           <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
					
                      <tr style="bg-color:blue;" >
                        <th>Keterangan</th>
                        <th>Alasan</th>
                        <th>Tanggal Approve</th>
                        <th>Nama Approval</th>	
                      </tr>
                    </thead>
                    <tbody>

<?php
foreach($query_history as $datas){	
if($datas->ket==1) {
     $ket = "approve";
	}elseif($datas->ket==2) {
	$ket = "Penginputan";	
	}elseif($datas->ket==3) {
	$ket = "Approve RSM"; 		
    }elseif($datas->ket==4) {
    $ket = "Approve SGV Wilayah ";
	}elseif($datas->ket==5) {
    $ket = "Hold RSM";
	}elseif($datas->ket==6) {
    $ket = "Hold sgv wilayah";
	}elseif($datas->ket==7) {
    $ket = "Hold sgv pusat";
	}elseif($datas->ket==8) {
    $ket = "Cancel RSM";
	}elseif($datas->ket==9) {
    $ket = "Cancel sgv wilayah";
	}elseif($datas->ket==10) {
    $ket = "Cancel sgv pusat";
	}elseif($datas->ket==11) {
	$ket = "REJECT RSM";
	}elseif($datas->ket==12) {
	$ket = "REJECT sgv wilayah";
	}elseif($datas->ket==13) {
    $ket = "REJECT sgv pusat ";
	}	
?>


		<tr>
          <td><?=$ket;?></td>
          <td><?=$datas->keterangan;?></td> 
			<?php $format=date('d-m-Y',strtotime($datas->tgl)); ?>
		  <td><?=$format;?></td>
          <td><?=$datas->npp;?></td>
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
	

	<table><?php
	$date=date('Y/m/d');
	?>
	<input type="hidden" name="tgl" value="<?php echo $date ?>">
	<input name="id" type="hidden" value="<?=$x->id;?>">
	<input type="hidden" name="notif" value="2">
	
		<tr>
		<td>Status Approval</td>
			<td><select name="ket" readonly="readonly">
		<option value="3">Approve</option>
		<option value="5">Hold</option>
		<option value="8">Cancel</option>
		<option value="11">Reject</option>
		</select></td>
		</tr>		
		<tr><td>Keterangan</td>
			<td><textarea name="keterangan" value="<?=$x->keterangan;?>" type="text"/></textarea></td>
		</tr>

	</table>
	 <div class="box-footer">
        <tr><td>
			<input type="submit" class="btn btn-primary" name="kirim" value="SIMPAN">
			<input type="reset" class="btn btn-danger" value="Reset" onclick='return tanya()'>
		</td></tr>
        </div><!-- /.box-footer-->
        </div><!-- /.box-body -->
    </div><!-- /.box -->
	
<?php
}
?>
	
</form>	
</section><!-- /.content -->

<script type="text/javascript">
	function PreviewImage() {
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
	oFReader.onload = function (oFREvent) {
		document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	};
</script>

        
<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<!-- DATA TABES SCRIPT -->
    <script src="<?php echo $this->config->item('base_url') ?>assets/AdminLTE-2.0.5//plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url') ?>assets/AdminLTE-2.0.5//plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!--tambahkan custom js disini-->

<?php
$this->load->view('template/foot');
?>
