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
<!---
        <li><a href="#"></a></li>
-->   
        <li class="active"><?=$subtitle;?></li>
    </ol>
</section>
<script language="javascript">
  function addRow1() {

   var table = document.getElementById('tabel1');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var element1 = document.createElement("input");
   element1.type = "checkbox";
   element1.name="chkbox[]";
   cell1.appendChild(element1);

   var cell2 = row.insertCell(1);
   var element2 = document.createElement("input");
   element2.type = "text";
   element2.name = "jenjang_pendidikan"+rowCount;
   element2.style = "width:132px;[]";
   cell2.appendChild(element2);


   var cell3 = row.insertCell(2);
   var element3 = document.createElement("input");
   element3.type = "text";
   element3.name = "nama_sekolah"+rowCount;
   element3.style = "width:200px;[]";
   cell3.appendChild(element3);
  
   var cell4 = row.insertCell(3);
   var element4 = document.createElement("input");
   element4.type = "text";
   element4.name = "kota_sekolah"+rowCount;
   element4.style = "width:100px;[]";
   cell4.appendChild(element4);
   
   var cell5 = row.insertCell(4);
   var element5 = document.createElement("input");
   element5.type = "text";
   element5.name = "program_study"+rowCount;
   element5.style = "width:100px;[]";
   cell5.appendChild(element5);
   
   var cell6 = row.insertCell(5);
   var element6 = document.createElement("input");
   element6.type = "text";
   element6.name = "ipk"+rowCount;
   element6.style = "width:100px;[]";
   cell6.appendChild(element6);
   
   var cell7 = row.insertCell(6);
   var element7 = document.createElement("input");
   element7.type = "text";
   element7.name = "tahun_ijazah"+rowCount;
   element7.style = "width:100px;[]";
   cell7.appendChild(element7);
   
  }

  function deleteRow1() {
   try {
   var table = document.getElementById('tabel1');
   var rowCount = table.rows.length;

   for(var i=0; i<rowCount; i++) {
    var row = table.rows[i];
    var chkbox = row.cells[0].childNodes[0];
    if(null != chkbox && true == chkbox.checked) {
     table.deleteRow(i);
     rowCount--;
     i--;
    }


   }
   }catch(e) {
    alert(e);
   }
  }
  
  function addRow2() {

   var table = document.getElementById('tabel2');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var element1 = document.createElement("input");
   element1.type = "checkbox";
   element1.name="chkbox[]";
   cell1.appendChild(element1);

   var cell2 = row.insertCell(1);
   var element2 = document.createElement("input");
   element2.type = "text";
   element2.name = "perusahaan"+rowCount;
   element2.style = "width:175px;[]";
   cell2.appendChild(element2);


   var cell3 = row.insertCell(2);
   var element3 = document.createElement("input");
   element3.type = "text";
   element3.name = "jabatan"+rowCount;
   element3.style = "width:130px;[]";
   cell3.appendChild(element3);
  
   var cell4 = row.insertCell(3);
   var element4 = document.createElement("input");
   element4.type = "date";
   element4.name = "tgl_masuk"+rowCount;
   element4.style = "width:120px;[]";
   cell4.appendChild(element4);
   
   var cell5 = row.insertCell(4);
   var element5 = document.createElement("input");
   element5.type = "date";
   element5.name = "tgl_resign"+rowCount;
   element5.style = "width:120px;[]";
   cell5.appendChild(element5);
   
   var cell6 = row.insertCell(5);
   var element6 = document.createElement("input");
   element6.type = "text";
   element6.name = "alasan"+rowCount;
   element6.style = "width:200px;[]";
   cell6.appendChild(element6);
   
  }

  function deleteRow2() {
   try {
   var table = document.getElementById('tabel2');
   var rowCount = table.rows.length;

   for(var i=0; i<rowCount; i++) {
    var row = table.rows[i];
    var chkbox = row.cells[0].childNodes[0];
    if(null != chkbox && true == chkbox.checked) {
     table.deleteRow(i);
     rowCount--;
     i--;
    }


   }
   }catch(e) {
    alert(e);
   }
  }

 </script>
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
            
    <form id="form-data1" action="<?php echo site_url('Sales_force/add_save_dev')?>" method="post" enctype="multipart/form-data" autocomplate="onload"> 
    <div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>REGISTRASI FORM</strong></p></div>
    <p></p>
    <table align ="left">
    <tr>

      <td>Posisi</td>
      <td>
        <select name="id_posisi" id="id"  >
        <?php foreach($query_posisi as $posisi){ ?>   
        <option value="<?php echo $posisi->UserGroupID ?>"><?php echo $posisi->UserGroupName ?></option>
        <?php }?>
        </select>
      </td>

    </tr>   

    <tr><td>Agency</td>
      <td>
<select name="AgencyID" id="AgencyID"  >
    <?php foreach($query_agency as $agency){ ?>   
    <option value="<?php echo $agency->AgencyID ?>"><?php echo $agency->AgencyName ?></option>
    <?php }?>
    </select>
<!---
        <input name="AgencyID" type="text" onkeypress="return huruf(event)" value="<?=$agency->AgencyName?>"  readonly>
---->


      </td>
    </tr>
    
    <tr><td>Sales Center</td>
      <td>
<select name="SalesCenterID" id="SalesCenterID"  >
    <?php foreach($query_sales_center as $sales_center){ ?>   
    <option value="<?php echo $sales_center->SalesCenterID ?>"><?php echo $sales_center->SalesCenterName ?></option>
    <?php }?>
    </select>       
<!----
        <input name="SalesCenterID" type="text" onkeypress="return huruf(event)" disabled>
---->       
      </td>
    </tr>
  </table>


  <table align="center">    
  <tr><td>-</td></tr>
  <tr><td>-</td></tr>
  <tr><td>-</td></tr>
  </table>


<!---
  <table align="center">    
    <tr><td>Atasan</td>
      <td><input name="EmployeeNewCode" id="EmployeeNewCode" type="text" onkeypress="return huruf(event)"  disabled/>
    

        </td>
    </tr>
    
    <tr><td>Kode</td>
      <td><input name="EmployeeNewCode" type="text" onkeypress="return huruf(event)"  disabled></td>
    </tr>
    
    <tr><td>Grade/lavel</td>
      <td><input name="nama_lengkap" type="text" onkeypress="return huruf(event)"  disabled></td>
    </tr>
</table>
---->       
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PERSONAL DATA</strong></div>
<p></p>
<div class="control-group" align = "center" >
    <img src="<?php echo base_url('uploads/orang-1.png') ?>" id="uploadPreview" style="width: 150px; height:160px;border:1px solid;" /></br>
        <input id="uploadImage" type="file" name="photo"  onchange="PreviewImage();" align="center"  />
    </div>
<table align ="left">
    <tr><td>Nama Lengkap </td>
      <td><input name="nama_lengkap" type="text" onkeypress="return huruf(event)"  required/></td>
    </tr>

    <tr><td>Nama Panggil </td>
      <td><input name="nama_panggil"type="text" onkeypress="return huruf(event)" required/></td>
    </tr>
    
    <tr><td>No KTP </td>
      <td><input name="no_ktp" value="<?=$no_ktp;?>" onkeypress="return hanyaAngka(event)" maxlength="16" type="text"  Readonly></td>
    </tr>
    
    <tr><td>NPWP </td>
      <td><input name="npwp"  onkeypress="return hanyaAngka(event)" maxlength="17" type="text"   /></td>
    </tr>
    
    <tr><td>Tempat Lahir </td>
      <td><input name="tempat_lahir" type="text" onkeypress="return huruf(event)"  /></td>
    </tr>
    
    <tr><td>Tanggal Lahir </td>
      <td><input name="tanggal_lahir" id="tanggal_lahir" size="40" type="date" /></td>
    </tr>
    
    <tr><td>Tinggi Badan </td>
      <td><input style="width:50px;" name="tinggi_badan" type="number" maxlength="3"/>cm</td>
    </tr>
    
    <tr><td>Berat Badan </td>
      <td><input style="width:50px;" name="berat_badan" type="number" maxlength="3"/>kg</td>
    </tr>
    
    <tr><td>Alamat Rumah Tinggal Saat Ini </td>
      <td><textarea name="alamat" type="text" /></textarea></td>
    </tr>
  
    <tr><td>Kota</td>
      <td><input name="kota" type="text" onkeypress="return huruf(event)"  /></td>
    </tr>
    
    <tr><td>Kode Pos </td>
      <td><input name="kodepos"  onkeypress="return hanyaAngka(event)" maxlength="5" type="text" /></td>
    </tr>
  
    <tr><td>Lama Tinggal </td>
      <td><input style="width:50px;" name="lama" onkeypress="return hanyaAngka(event)" maxlength="3" type="text" />Tahun</td>
    </tr>
  
    <tr><td>Status Tempat Tinggal </td>
    <td>
      <input name="status_tinggal" type="radio" value="orang tua" />orang tua 
      <input name="status_tinggal" type="radio" value="sendiri" />sendiri
      <input name="status_tinggal" type="radio" value="sewa" />sewa 
    </td></tr>
</table>
<table align="center">  
    <tr><td>Status</td>
    <td><select name="status" >
    <option value>Pilih status</option>
    <option value="lajang">lajang</option>
    <option value="menikah">menikah </option>
    <option value="bercerai">bercerai </option>
    </select></td></tr>
        
    <tr>
    <td>Agama</td>
    <td><select name="agama" >
    <option value>Pilih agama</option>
    <option value="islam">islam</option>
    <option value="kristen">kristen</option>
    <option value="budha">budha </option>
    <option value="hindu">hindu </option>
    <option value="khongucu">khongucu </option>
    </select></td></tr>

    <tr>
    <td>Telp Rumah </td>
    <td><input name="telp" type="text" maxlength="13" onkeypress="return hanyaAngka(event)" /></td>
    </tr>
    
    <tr>
    <td>No HP </td>
    <td><input name="hp"  type="text" maxlength="13" onkeypress="return hanyaAngka(event)" /></td>
    </tr>
    
    <tr>
    <td>No HP 2 </td>
    <td><input name="hp2"  type="text" maxlength="13" onkeypress="return hanyaAngka(event)" /></td>
    </tr>
    
    <tr>
    <td>Nama Ibu Kandung </td>
    <td><input name="ibu" type="text" onkeypress="return huruf(event)" /></td>
    </tr>
    
    <tr>
    <td>Alamat Rumah Tinggal KTP </td>
    <td><textarea name="alamat_ktp" type="text" /></textarea></td>
    </tr>
    <tr>
    <td>Kota </td>
    <td><input name="kota_ktp" type="text" onkeypress="return huruf(event)" /></td>
    </tr>
    <tr>
    <td>Kode Pos </td>
    <td><input name="kodepos_ktp" onkeypress="return hanyaAngka(event)" maxlength="5" type="text" /></td>
    </tr>
    
    <tr>
    <td>Lama Tinggal </td>
    <td><input name="tinggal_ktp"  style="width:50px;" maxlength="3" type="text" onkeypress="return hanyaAngka(event)"/> Tahun</td>
    </tr>
    
    <tr>
    <td>E-mail </td>
    <td><input name="email"  type="text" /></td>
    </tr>
    
    <tr>
    <td>Kendaraan </td>
    <td>
    <input name="kendaraan" type="radio" value='mobil' />mobil 
    <input name="kendaraan" type="radio" value='motor'/>motor
    <input name="kendaraan" type="radio" value='kendaraan umun'/>kendaraan umum
    </td>
    </tr>
<!--
    <tr><td>Tanggal aktif </td>
      <td><input name="tgl_aktif" type="date"/></td>
    </tr>
    
    <tr><td>Tanggal Non Aktif </td>
      <td><input name="tgl_nonaktif" type="date"></td>
    </tr>
-->   
    <tr>
      <td>-</td>
      <td>-</td>
    </tr>
</table>
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>EMERGENCY CONTACT</strong></div>
<p></p>
<table align="left">    
    <tr><td>Nama</td>
      <td><input name="nama" type="text" onkeypress="return huruf(event)" /></td>
    </tr>
    <tr>
    <td>Hubungan</td>
    <td><select name="hubungan" >
    <option value>Pilih Hubungan</option>
    <option value="adik">Adik</option>
    <option value="kakak">Kakak</option>
    <option value="ibu">Ibu</option>
    <option value="ayah">Ayah</option>
    <option value="bibi">Bibi</option>
    <option value="sepupu">Sepupu</option>
    <option value="kakek">Kakek</option>
    <option value="nenek">Nenek</option>
    </select></td>
    </tr>
    
</table>
  <table align="center">
    <tr>
      <td>No HP</td>
      <td><input name="no_hp" type="text" maxlength="13" onkeypress="return hanyaAngka(event)" /></td>
    </tr>
    <tr><td>Alamat</td>
      <td><textarea name="alamat_emergency" type="text"  /></textarea></td>
    </tr>
  </table>
<p></p> 
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PENDIDIKAN FORMAL</strong></div>
<p></p>
<input onclick="addRow1()" type="button" value="Tambah" />
<input onclick="deleteRow1()" type="button" value="Hapus" />
<tr><td>* Pendidikan Terakhir yang pertama diinput</td></tr>
<table id="tabel1" border="1">
<tr align ="center">
    <td></td>
        <td>JENJANG PENDIDIKAN</td>
        <td>NAMA SEKOLAH</td>
        <td>KOTA</td>
    <td>PROGRAM STUDY</td>
    <td>NEM/IPK</td>
    <td>TAHUN IJAZAH</td>
    <td>Upload</td>
    </tr>
  <div style="padding: 20px 0px 0px 0px;">
  <tr>
  <td></td>
        <td><input name="jenjang_pendidikan" style="width:132px;" type="text"  /></td>
        <td><input name="nama_sekolah" style="width:200px;" type="text"  /></td>
    <td><input name="kota_sekolah" style="width:100px;" type="text" onkeypress="return huruf(event)" /></td>
        <td><input name="program_study" style="width:100px;" type="text" onkeypress="return huruf(event)"  /></td>
    <td><input name="ipk" style="width:100px;" type="text" onkeypress="return hanyaAngka(event)"  /></td>
    <td><input name="tahun_ijazah" style="width:100px;" onkeypress="return hanyaAngka(event)" type="text"  /></td>
  <td><input type="file" name="ijazah" align="center" /></td>
  </tr>
  
  </div>
</table>
<p></p>
<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>PENGALAMAN BEKERJA</strong></div>
<p></p>
<input onclick="addRow2()" type="button" value="Tambah" />
<input onclick="deleteRow2()" type="button" value="Hapus" />
<table id="tabel2" border="1">
<tr align ="center">
    <td></td>
        <td>PERUSAHAAN</td>
    <td>POSISI/JABATAN</td>
    <td>TANGGAL MASUK</td>
    <td>TANGGAL RESIGN</td>
    <td>KETERANGAN</td>
    </tr>
  <div style="padding: 20px 0px 0px 0px;">
  <tr>
    <td></td>
        <td><input name="perusahaan" style="width:175px;" type="text"></td>
    <td><input name="jabatan" style="width:130px;" type="text"></td>
    <td><input name="tgl_masuk" style="width:120px;" type="date"></td>
    <td><input name="tgl_resign" style="width:120px;" type="date"></td>
        <td><input name="alasan" style="width:200px;" type="text"></td>
  </tr>
  </div>
</table>
<p></p>

<div align="center" style="border:1px solid;background-color:#00BFFF"><strong>DOKUMEN PENDUKUNG</strong></div>
<p></p>
<table>

  
<div class="control-group" align = "left" >
<h3>Upload SCAN KTP</h3>
<input type="file" name="ktp" align="center" />
<h3>Upload SCAN Dokumen Do's and Don'ts</h3>
<input type="file" name="do&dont" align="center" />
</div>

</table>
<table>
    <?php
    $date=date('Y/m/d');
    ?>
    <input type="hidden" name="tgl" value="<?php echo $date ?>">
    <input type="hidden" name="ket" value="2">
</table>
        </div><!-- /.box-body -->
        <div class="box-footer">
        <tr><td>
      <input type="submit" class="btn btn-primary" name="kirim" onclick="return validasi_input(form)"   value="SIMPAN">
      <input type="reset" class="btn btn-danger" value="Reset" onclick='return tanya()'>
    </td></tr>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
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
<script type="text/javascript">
  var j = jQuery.noConflict();
    $(document).ready(function(){
      $('#propinsi').change(function(){
        $.getJSON('sgv_registrasi.php',{action:'getKab', kode_prop:$(this).val()}, function(json){
          $('#id_cabang').html('');
          $.each(json, function(index, row) {
            $('#id_cabang').append('<option value='+row.kode+'>'+row.nama+'</option>');
          });
        });
      });
    });
</script>
<script language="javascript">
 function tanya() {
 if (confirm ("Apakah Anda yakin akan mereset data ini ?")) {
 return true;
  } else {
   return false;
  }
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $( "#tanggal_lahir" ).datepicker({
    changeYear: true
    changeMonth: true,
    dateFormat: 'yyyy-mm-dd',
  });
      
  $('#ceksales').change(function(){
    $('#npp').val('<?php echo $datax['npp'] + 1?>');
    });
  }); <script type="text/javascript">
</script>
    
<script>
  function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    return false;
  return true;
  }
</script>
  

<script type="text/javascript">
function validasi_input(form){
  var mincar = 5;
  if (form.kodepos.value.length < mincar){
    alert("kodepos Minimal 5 Karater!");
    form.kodepos.focus();
    return (false);
  }
   return (true);
}
</script>

<script>
function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
</script>
<!---
  <link rel="stylesheet" type="text/css" href="../combobox/libs/bootstrap.css" media="screen" />
  <script type="text/javascript" src="../combobox/libs/jquery.min.js"></script> 
  <script src="jquery-1.8.3.min.js"></script>
  <script src="sales-js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="themes/base/jquery.ui.all.css">
  <script src="js/jquery-1.7.2.js"></script>
  <script src="ui/jquery.ui.core.js"></script>
  <script src="ui/jquery.ui.widget.js"></script>
  <script src="ui/jquery.ui.datepicker.js"></script>
  <script>
  
  </script>
-->

</html>
        
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
                                    <tr class="pilih" data-kode="<?php echo $r->EmployeeNewCode; ?>">
                                        <td><?php echo $r->EmployeeNewCode; ?></td>
                                        <td><?php echo $r->EmployeeName; ?></td>
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
    
            <script type="text/javascript">

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("EmployeeNewCode").value = $(this).attr('data-kode');
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