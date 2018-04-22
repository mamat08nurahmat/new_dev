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








<!-------

 <form method="post" id="framework_form">
    <div class="form-group">
     <label>Select which Framework you have knowledge</label>
     <select id="framework" name="framework[]" multiple class="form-control" >
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
    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>

------>

<form action="<?=site_url('mapping/update_posisi_save');?>" method="POST">











  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="user_group">POSISI</label>
      <select id="user_group" name="user_group" class="form-control">
        <option selected>Choose...</option>

<?php
foreach ($query_user_grup as $user_grup) {
// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
?>
        <option value="<?=$user_grup->UserGroupID;?>"><?=$user_grup->UserGroupName;?></option>

<?php
}
?>


      </select>    

    </div>
<?php
foreach($query_ktp as $xxx){
 ?>
    <div class="form-group col-md-4">
      <label for="tgl_aktif">Nama Sales</label>
    <input type="text" class="form-control" id="nama_sales" name="nama_sales" value="<?=$xxx->nama_lengkap?>">   
    </div>

    <div class="form-group col-md-4">
      <label for="tgl_akhir">Sales Code</label>
    <input type="text" class="form-control" id="sales_code" name="sales_code" value="<?=$xxx->EmployeeNewCode?>">   
    </div>

<?php
}
?>
  </div>


  <div class="form-row">

    <div class="form-group col-md-3">
      <label>Sales Code Atasan</label>
    <input type="text" class="form-control" id="sales_code_atasan" name="sales_code_atasan" placeholder="SALES CODE ATASAN">

<!----
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>

-->

      </div>




    <div class="form-group col-md-3">
      <label>Nama Atasan</label>
    <input type="text" class="form-control" id="nama_atasan" name="nama_atasan" placeholder="Nama Atasan">   
    </div>

    <div class="form-group col-md-3">
      <label>Agency Atasan</label>
    <input type="text" class="form-control" id="agency_atasan" name="agency_atasan" placeholder="Agency Atasan">   
    </div>

    <div class="form-group col-md-3">
      <label>Sales Center Atasan</label>
    <input type="text" class="form-control" id="sales_center_atasan" name="sales_center_atasan" placeholder="Sales Center Atasan">   
    </div>


  </div>


  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="area_group">Area Group</label>
      <select id="area_group"  name="area_group" class="form-control">
      <option selected>Choose...</option>
<?php
foreach ($query_grup_area as $grup_area) {
// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
?>
        <option value="<?=$grup_area->AreaGroupID;?>"><?=$grup_area->AreaGroupName;?></option>

<?php
}
?>

      </select>    
    </div>


    <div class="form-group col-md-3">
      <label for="area">Area</label>
      <select id="area"  name="area" class="form-control">
      <option selected>Choose...</option>

      </select>    
    </div>


    <div class="form-group col-md-3">
      <label for="agency">Agency</label>
      <select id="agency" name="agency" class="form-control">
        <option selected>Choose...</option>



      </select>    
    </div>

    <div class="form-group col-md-3">
      <label for="sales_center">Sales Center</label>
<!----
<select id="sales_center" name="sales_center" class="form-control">
  ---->      

     <select id="sales_center" name="sales_center" class="form-control" >
<!-----
      <option value="Codeigniter">Codeigniter</option>
      <option value="CakePHP">CakePHP</option>
      <option value="Laravel">Laravel</option>
      <option value="YII">YII</option>
      <option value="Zend">Zend</option>
      <option value="Symfony">Symfony</option>
      <option value="Phalcon">Phalcon</option>
      <option value="Slim">Slim</option>
------>

     </select>
    
    </div>

  </div>


  <div class="form-row">




    <div class="form-group col-md-12">

  <button type="submit" class="btn btn-primary">SAVE</button>
    </div>


</div>

</form>



<!--  -->

<?php
foreach($query_ktp as $x){
?>  

<p></p>

  <div class="form-row">

    <div class="form-group col-md-12">

<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PERSONAL DATA</strong></div>

     </div> 
  </div>



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
    <option value="adik"  <?php if( $x->hubungan=='adik'){echo "selected"; } ?> >Adik</option>
    <option value="kakak"   <?php if( $x->hubungan=='kakak'){echo "selected"; } ?>>Kakak</option>
    <option value="ibu"   <?php if( $x->hubungan=='ibu'){echo "selected"; } ?>  >Ibu</option>
    <option value="ayah"  <?php if( $x->hubungan=='ayah'){echo "selected"; } ?> >Ayah</option>
    <option value="bibi"  <?php if( $x->hubungan=='bibi'){echo "selected"; } ?> >Bibi</option>
    <option value="sepupu"  <?php if( $x->hubungan=='sepupu'){echo "selected"; }?>>Sepupu</option>
    <option value="sakek"   <?php if( $x->hubungan=='kakek'){echo "selected"; } ?>>Kakek</option>
    <option value="nenek"   <?php if( $x->hubungan=='nenek'){echo "selected"; } ?>>Nenek</option>
    </select></td>  
    </tr>   
    <tr><td>Alamat</td>
      <td><textarea name="alamat_emergency" value="" type="text" disabled ><?=$x->alamat_emergency;?></textarea></td>
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
<input name="id" type="hidden" value="<?=$x->id;?>">
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
        </div><!-- /.box-body -->
    </div><!-- /.box -->
  
<?php
}
?>


<!--  -->




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
let sales_code = document.getElementById("sales_code_atasan");

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
                document.getElementById("sales_code_atasan").value = $(this).attr('data-kode');
                document.getElementById("nama_atasan").value = $(this).attr('data-nama');
                document.getElementById("agency_atasan").value = $(this).attr('data-agency');
                document.getElementById("sales_center_atasan").value = $(this).attr('data-sales_center');
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
                  data-kode="<?php echo $r->sales_code; ?>" 
                  data-nama="<?php echo $r->nama; ?>" 
                  data-agency="<?php echo $r->agency; ?>" 
                  data-sales_center="<?php echo $r->sales_center; ?>" 
                  >

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
        

