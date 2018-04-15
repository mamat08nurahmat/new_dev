<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

select {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

textarea {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

#myCheck {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

select.invalid {
  background-color: #ffdddd;
}

textarea.invalid {
  background-color: #ffdddd;
}



/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<!-- custom -->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h2>
        Blank page
        <small>it all starts here</small>
    </h2>
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

<!-- 
 --> <!--  <h1>Registrasi Form:</h1> -->
<form id="regForm" action="<?=site_url('sales_force/add_save_dev')?>" method="POST" enctype="multipart/form-data">


  <!-- One "tab" for each step in the form: -->



<!-- PERSONAL DATA -->
  <div class="tab"><h1> Personal Data:</h1>
    <p><input name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap..." oninput="this.className = ''" ></p>
    <p><input name="nama_panggil" id="nama_panggil" placeholder="Nama Panggil..." oninput="this.className = ''" ></p>
    <p><input name="no_ktp" id="no_ktp" value="<?=$no_ktp?>" readonly></p>
    <p><input name="no_npwp" id="no_npwp" placeholder="No NPWP..." oninput="this.className = ''" ></p>    
    <p><input name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir..." oninput="this.className = ''" ></p>
    <p>Tanggal Lahir</p>
    <p><input type='date' name="tanggal_lahir" id="tanggal_lahir"  oninput="this.className = ''" ></p>
    <p><input type="number" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi badan..." oninput="this.className = ''" ></p>
    <p><input type="number" name="berat_badan" id="berat_badan" placeholder="Berat Badan..." oninput="this.className = ''" ></p>    

    <p>
    <select name="jenis_kelamin" id="jenis_kelamin" >
    <option value="">-JENIS KELAMIN-</option>
    <option value="M">LAKI-LAKI</option>
    <option value="F">PEREMPUAN</option>
    </select>
    </p>  

 
    <p>
    <select name="status" id="status" oninput="this.className = ''" >
    <option value="">- STATUS-</option>
    <option value="lajang">LAJANG</option>
    <option value="menikah">MENIKAH</option>
    <option value="bercerai">BERCERAI</option>
    </select>
    </p>  
    
    <p>
    <select name="status" id="status" onchange="this.className = ''" >
    <option value="">-PILIH AGAMA-</option>
    <option value="islam">ISLAM</option>
    <option value="kristen">KRISTEN</option>
    <option value="budha">BUDHA</option>
    <option value="hindu">HINDU</option>
    <option value="khongucu">KHONGUCU</option>
    </select>
    </p>  

    <p><input name="ibu_kandung" id="ibu_kandung" placeholder="Nama Ibu Kandung..." oninput="this.className = ''" ></p>  
    
    <p><input type="email" name="email" id="email" placeholder="Email..." oninput="this.className = ''" ></p>  
    <p><input name="no_telpon" id="no_telpon" value="12345" placeholder="No No Telpon..." oninput="this.className = ''" ></p>  
    <p><input name="no_hp1" id="no_hp1" value="11111" placeholder="No Handphone 1..." oninput="this.className = ''" ></p>  
    <p><input name="no_hp2" id="no_hp2" value="55555" placeholder="No Handphone 2..." oninput="this.className = ''" ></p>  


  </div>
<!-- PERSONAL DATA -->


<!-- UPLOAD -->
  <div class="tab"><h1>UPLOAD:</h1>
    <div class="control-group" align = "center" >
    <img src="<?php echo base_url('uploads/orang-1.png') ?>" id="uploadPreview" style="width: 150px; height:160px;border:1px solid;" />
  </br>
  <p>PHOTO</p>
        <input id="uploadImage" type="file" name="photo"  onchange="PreviewImage();" align="center"  />
  </br>
    <p>SCAN KTP</p>
        <input type="file" name="scan_ktp" id="scan_ktp">
  </br>
    <p>FILE KOMITMEN DO AND DON'T</p>
        <input type="file" name="file_komit" id="file_komit">

    </div>
      
  </div>
<!-- UPLOAD -->

<!-- ALAMAT TINGGAL -->
  <div class="tab"><h1>Alamat Tinggal:</h1>
    <p><textarea name="alamat_tinggal_1" id="alamat_tinggal_1" rows="6"></textarea></p>
    <p><input placeholder="Kode POS..." oninput="this.className = ''" name="kode_pos_1" id="kode_pos_1" ></p>

<div id="result_kode_pos_1"></div>

    
<!-- 
    <p><input placeholder="Provinsi..." oninput="this.className = ''" name="provinsi_1" id="provinsi_1" ></p>
    <p><input placeholder="Kabupaten/Kota..." oninput="this.className = ''" name="kabupaten_1" id="kabupaten_1" ></p>
    <p><input placeholder="Kecamatan..." oninput="this.className = ''" name="kecamatan_1" id="kecamatan_1" ></p>
    <p><input placeholder="Kelurahan/Desa..." oninput="this.className = ''" name="kelurahan_1" id="kelurahan_1" ></p>
 -->

    <p><input placeholder="Lama Tinggal(Tahun)..." oninput="this.className = ''" name="lama_tinggal_1" id="lama_tinggal_1" ></p>    
    <p>
    <select name="status_tinggal" id="status" oninput="this.className = ''" >
    <option value="">-PILIH TINGGAL-</option>
    <option value="orang_tua">ORANG TUA</option>
    <option value="sendiri">SENDIRI</option>
    <option value="sewa">SEWA</option>
    </select>
    </p>
    
    <p>
    <select name="kendaraan" id="kendaraan" oninput="this.className = ''" >
    <option value="">-PILIH KENDARAAN-</option>
    <option value="mobil">MOBIL</option>
    <option value="motor">MOTOR</option>
    <option value="kendaraan_umum">KENDARAAN UMUM</option>
    </select>
    </p>
    
  </div>
<!-- ALAMAT TINGGAL -->


<!-- ALAMAT KTP -->
  <div class="tab"><h1>Alamat KTP:</h1>

<!--  -->
<p> 
Alamat Tinggal sesuai KTP ? : 
<input type="checkbox" id="myCheck"  onclick="myFunction()">
</p>

<!-- <p id="text" style="display:none">Checkbox is CHECKED!</p> -->

<!--  -->
    <p><textarea name="alamat_tinggal_2" id="alamat_tinggal_2" rows="6"></textarea></p>
    <p><input placeholder="Kode POS..." oninput="this.className = ''" name="kode_pos_2" id="kode_pos_2" ></p>

<div id="result_kode_pos_2"></div>
    <!-- 
    <p><input placeholder="Provinsi..." oninput="this.className = ''" name="provinsi_2" id="provinsi_2" ></p>
    <p><input placeholder="Kabupaten/Kota..." oninput="this.className = ''" name="kabupaten_2" id="kabupaten_2" ></p>
    <p><input placeholder="Kecamatan..." oninput="this.className = ''" name="kecamatan_2" id="kecamatan_2" ></p>
    <p><input placeholder="Kelurahan/Desa..." oninput="this.className = ''" name="kelurahan_2" id="kelurahan_2" ></p>
    --> 
    <p><input placeholder="Lama Tinggal(Tahun)..." oninput="this.className = ''" name="lama_tinggal_2" id="lama_tinggal_2" ></p>    
   
  </div>

<!-- ALAMAT KTP -->



<!-- PENGALAMAN KERJA -->

  <div class="tab"><h1>Pengalam Kerja:</h1>


<table class="table table-striped" id="dynamic_field_2">
    <thead>
      <tr>
        <th>PERUSAHAAN</th>
        <th>POSISI/JABATAN</th>
        <th>TANGGAL MASUK</th>
        <th>TANGGAL RESIGN</th>
        <th>KETERANGAN</th>
        <th>ACT</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" class="form-control name_list" name="perusahaan[]"/></td>
        <td><input type="text" class="form-control name_list" name="posisi[]"/></td>
        <td><input type="date" class="form-control name_list" name="tanggal_masuk[]"/></td>
        <td><input type="date" class="form-control name_list" name="tanggal_resign[]"/></td>
        <td><input type="text" class="form-control name_list" name="keterangan[]"/></td>
        
        <td><button type="button" name="add_2" id="add_2" class="btn btn-success">+</button></td>
      </tr>
      
    </tbody>
  </table>    

  </div>
<!-- PENGALAMAN KERJA -->
  


<!-- PENDIDIKAN FORMAL -->

  <div class="tab"><h1>Pendidikan Formal:</h1>

 <p>IJAZAH TERAKHIR</p>
        <input type="file" name="ijazah" id="ijazah">
<br>  
<table class="table table-striped" id="dynamic_field">
    <thead>
      <tr>
        <th>JENJANG PENDIDIKAN</th>
        <th>NAMA SEKOLAH</th>
        <th>KOTA</th>
        <th>PROGRAM STUDY</th>
        <th>NEM/IPK</th>
        <th>TAHUN IJAZAH</th><th>ACT</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" class="form-control name_list" name="jenjang_pendidikan[]"/></td>
        <td><input type="text" class="form-control name_list" name="nama_sekolah[]"/></td>
        <td><input type="text" class="form-control name_list" name="kota[]"/></td>
        <td><input type="text" class="form-control name_list" name="program_studi[]"/></td>
        <td><input type="text" class="form-control name_list" name="ipk[]"/></td>
        <td><input type="text" class="form-control name_list" name="tahun_ijazah[]"/></td> 
        
        <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
      </tr>
      
    </tbody>
  </table>  

  </div>
<!-- PENDIDIKAN FORMAL -->
  

<!-- EMERGENCY CONTACT -->
  <div class="tab"><h1>Emergency Contact:</h1>
    <p><input placeholder="Nama Emergency" oninput="this.className = ''" name="nama_emergency" id="nama_emergency"></p>
    <p><label>Alamat Emergency</label></p>
    <p>
    <textarea name="alamat_emergency" id="alamat_emergency" row="6"></textarea></p>
    <p>
    <select name="hubungan_emergency" id="hubungan_emergency" oninput="this.className = ''" >
    <option value="">-PILIH HUBUNGAN-</option>
    <option value="adik">ADIK</option>
    <option value="kakak">KAKAK</option>
    <option value="ibu">IBU</option>
    <option value="ayah">AYAH</option>
    <option value="bibi">BIBI</option>
    <option value="sepupu">SEPUPU</option>
    <option value="kakek">KAKEK</option>
    <option value="nenek">NENEK</option>
    </select>
    </p>
    <p><input placeholder="No Handphone Emergency" oninput="this.className = ''" name="no_hp_emergency" id="no_hp_emergency">
    </p>
<div id="warning" style="display: none;>
  
    <p"><label style="color: red;">NOMER SUDAH ADA</label></p>
</div>

  </div>
<!-- EMERGENCY CONTACT -->


  

  



<!--     <div class="tab"><h1>Subbmit:</h1>
  <p></p>
    <p><input type="submit" value="submit" name="submit" ></p>
  </div>
 -->  
  
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
     
    <span class="step"></span>  
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>



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
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
// //???
//   if (n == 6) {
// document.getElementById("nextBtn").innerHTML = "Submit";
// document.getElementById("nextBtn").type = "submit";  

//   } 


  if (n == (x.length - 1)) {
//ubah next menjadi submit    
    document.getElementById("nextBtn").innerHTML = "Submit";
// document.getElementById("nextBtn").type = "submit";  

} else {
    document.getElementById("nextBtn").innerHTML = "Next";
}
/*
*/

  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y,z,a, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  a = x[currentTab].getElementsByTagName("textarea");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }

// 
  for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }

  for (i = 0; i < a.length; i++) {
    // If a field is empty...
    if (a[i].value == "") {
      // add an "invalid" class to the field:
      a[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }


// let warning = document.getElementById("warning");
// if(warning.style.display == "block"){
// valid = false;  
// }else{
// valid = true;  

// }
 // warning.style.display = "block";


 // 
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<!-- IMAGE -->
<script type="text/javascript">
  function PreviewImage() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>


<!-- PENDIDIKAN FORMAL -->
 <script>  
 $(document).ready(function(){  
      var i=1;  
    var count=1;  
    
      $('#add').click(function(){
  i++;  
  count += 1;
    if (count <= 3) {
      // come code
//          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="jenjang_pendidikan[]"  class="form-control name_list" /></td><td><input type="text" name="nama_sekolah[]"  class="form-control name_list" /></td><td><input type="text" name="kota[]"  class="form-control name_list" /></td><td><input type="text" name="program_studi[]"  class="form-control name_list" /></td><td><input type="text" name="ipk[]"  class="form-control name_list" /></td><td><input type="text" name="tahun_ijazah[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
//alert("TAMBAH");   
console.log(count);
    }else{
alert("MAX");     
 count -= 1;
console.log(count);
    
  }     
/*
*/
      });  
    
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
        i--;  
        count -= 1;
console.log(count);
      
      });  

      $('#submit').click(function(){            
        alert('submit');
        alert('GENERATE');
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      });  

 });  
 </script>

<!-- PENGALAMAN KERJA -->

<script>  
 $(document).ready(function(){  
      var i=1;  
    var count_2=1;  
    
      $('#add_2').click(function(){
  i++;  
  count_2 += 1;
    if (count_2 <= 3) {
      // come code
//          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
          $('#dynamic_field_2').append('<tr id="row'+i+'"><td><input type="text" name="perusahaan[]"  class="form-control name_list" /></td><td><input type="text" name="posisi[]"  class="form-control name_list" /></td><td><input type="date" name="tanggal_masuk[]"  class="form-control name_list" /></td><td><input type="date" name="tanggal_resign[]"  class="form-control name_list" /></td><td><input type="text" name="keterangan[]"  class="form-control name_list" /><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_2">X</button></td></tr>');  
//alert("TAMBAH");   
console.log(count_2);
    }else{
alert("MAX");     
 count_2 -= 1;
console.log(count_2);
    
  }     
/*
*/
      });  
    
      $(document).on('click', '.btn_remove_2', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
        i--;  
        count_2 -= 1;
console.log(count_2);
      
      });  
      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      // });  
 });  
 </script>

<script type="text/javascript">


function get_kode_pos_1(){

          $.ajax({
      url:'<?=base_url()?>index.php/sales_force/get_ajax_kodepos_1',
            method : "GET",
            data   : { cari: $('#kode_pos_1').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            $('#result_kode_pos_1').html(hasil);
          });


}


function get_kode_pos_2(){

          $.ajax({
      url:'<?=base_url()?>index.php/sales_force/get_ajax_kodepos_2',
            method : "GET",
            data   : { cari: $('#kode_pos_2').val() }
             // data   : 'data123.json'
          }).done(function(hasil){
            $('#result_kode_pos_2').html(hasil);
          });

  
}


  $(document).ready(function(){


$("#kode_pos_1").keyup(function(){

 // console.log('keyup');
get_kode_pos_1();


});


$("#kode_pos_2").keyup(function(){

 // console.log('keyup');
get_kode_pos_2();


});


  });

</script>
<!-- CHECKBOX -->
<script>
function myFunction() {
    let checkBox = document.getElementById("myCheck");
    let text = document.getElementById("text");
    if (checkBox.checked == true){
        // text.style.display = "block";
//alert('OK');
    let kode_pos_1 = document.getElementById("kode_pos_1").value;

document.getElementById("kode_pos_2").value = kode_pos_1;
get_kode_pos_2();

    let alamat_tinggal_1 = document.getElementById("alamat_tinggal_1").value;

document.getElementById("alamat_tinggal_2").value = alamat_tinggal_1;


    let lama_tinggal_1 = document.getElementById("lama_tinggal_1").value;

document.getElementById("lama_tinggal_2").value = lama_tinggal_1;



    } else {
       // text.style.display = "none";
// alert('NO');
document.getElementById("kode_pos_2").value ="";

document.getElementById("alamat_tinggal_2").value ="";

document.getElementById("lama_tinggal_2").value ="";
get_kode_pos_2();

    }
}
</script>
<!-- CHECKBOX -->


<!-- -->
<script type="text/javascript">
  
$("#no_hp_emergency").keyup(function(){

 // console.log('keyup');
cek_no_emergency();


});

  function cek_no_emergency(){
   let no_telpon = document.getElementById("no_telpon").value;
   let no_hp1 = document.getElementById("no_hp1").value;
   let no_hp2 = document.getElementById("no_hp2").value;
   let no_hp_emergency = document.getElementById("no_hp_emergency").value;

let warning = document.getElementById("warning");



if(no_hp_emergency==no_telpon || no_hp_emergency==no_hp1 || no_hp_emergency==no_hp2 ){

console.log('no sama');
// alert('no sama');  

    if (warning.style.display === "none") {
        document.getElementById("no_hp_emergency").value ="";
        warning.style.display = "block";
        // x.className += " invalid";
        //  valid = false;
    } 
    // else {
  
    // }

}else{
        warning.style.display = "none";
         // x.className += " valid";
         // valid = true;
}



  }

</script>
<!--  -->
<?php
$this->load->view('template/foot');
?>