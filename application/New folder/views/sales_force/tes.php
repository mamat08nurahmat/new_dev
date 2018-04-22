<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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


/* Mark input boxes that gets an error on validation: */
input.invalid {
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
<body>

<form id="regForm" action="/action_page.php">
  <h1>Registrasi Form:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Personal Data:
    <p><input name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap..." oninput="this.className = ''" ></p>
    <p><input name="nama_panggil" id="nama_panggil" placeholder="Nama Panggil..." oninput="this.className = ''" ></p>
    <p><input name="no_ktp" id="no_ktp" placeholder="No KTP..." oninput="this.className = ''" "></p>
    <p><input name="no_npwp" id="no_npwp" placeholder="No NPWP..." oninput="this.className = ''" ></p>    
    <p><input name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir..." oninput="this.className = ''" ></p>
    <p><input type='date' name="tanggal_lahir" id="tanggal_lahir"  oninput="this.className = ''" ></p>
    <p><input type="number" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi badan..." oninput="this.className = ''" ></p>
    <p><input type="number" name="berat_badan" id="berat_badan" placeholder="Berat Badan..." oninput="this.className = ''" ></p>    
 
    <p>
    <select name="status" id="status" oninput="this.className = ''" >
    <option value="">-PILIH STATUS-</option>
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
    <p><input name="no_telpon" id="no_telpon" placeholder="No Telpon Rumah..." oninput="this.className = ''" ></p>  
    <p><input name="no_hp1" id="no_hp1" placeholder="No Handphone 1..." oninput="this.className = ''" ></p>  
    <p><input name="no_hp2" id="no_hp2" placeholder="No Handphone 2..." oninput="this.className = ''" ></p>  


  </div>
  
  
  <div class="tab">Alamat Tinggal:
    <p><textarea name="alamat_tinggal" id="alamat_tinggal" rows="6"></textarea></p>
    <p><input placeholder="Kode POS..." oninput="this.className = ''" name="kode_pos" id="kode_pos" ></p>
    <p><input placeholder="Provinsi..." oninput="this.className = ''" name="provinsi" id="provinsi" ></p>
    <p><input placeholder="Kabupaten/Kota..." oninput="this.className = ''" name="kabupaten" id="kabupaten" ></p>
    <p><input placeholder="Kecamatan..." oninput="this.className = ''" name="kecamatan" id="kecamatan" ></p>
    <p><input placeholder="Kelurahan/Desa..." oninput="this.className = ''" name="kelurahan" id="kelurahan" ></p>
    <p><input placeholder="Lama Tinggal(Tahun)..." oninput="this.className = ''" name="lama_tinggal" id="lama_tinggal" ></p>    
    <p>
    <select name="status_tinggal" id="status" oninput="this.className = ''" >
    <option selected>-PILIH TINGGAL-</option>
    <option value="orang_tua">ORANG TUA</option>
    <option value="sendiri">SENDIRI</option>
    <option value="sewa">SEWA</option>
    </select>
    </p>
    
    <p>
    <select name="kendaraan" id="kendaraan" oninput="this.className = ''" >
    <option selected>-PILIH KENDARAAN-</option>
    <option value="mobil">MOBIL</option>
    <option value="motor">MOTOR</option>
    <option value="kendaraan_umum">KENDARAAN UMUM</option>
    </select>
    </p>
    
  </div>



  <div class="tab">Alamat Sesuai KTP:
    <p><textarea name="alamat_tinggal" id="alamat_ktp" rows="6"></textarea></p>
    <p><input placeholder="Kode POS..." oninput="this.className = ''" name="kode_pos" id="kode_pos" ></p>
    <p><input placeholder="Provinsi..." oninput="this.className = ''" name="provinsi" id="provinsi" ></p>
    <p><input placeholder="Kabupaten/Kota..." oninput="this.className = ''" name="kabupaten" id="kabupaten" ></p>
    <p><input placeholder="Kecamatan..." oninput="this.className = ''" name="kecamatan" id="kecamatan" ></p>
    <p><input placeholder="Kelurahan/Desa..." oninput="this.className = ''" name="kelurahan" id="kelurahan" ></p>
    <p><input placeholder="Lama Tinggal(Tahun)..." oninput="this.className = ''" name="lama_tinggal" id="lama_tinggal" ></p>    
   
  </div>



  <div class="tab">Emergency Contact:
    <p><input placeholder="Nama Emergency" oninput="this.className = ''" name="nama_emergency" id="nama_emergency"></p>
    <p>
    <select name="hubungan_emergency" id="hubungan_emergency" oninput="this.className = ''" >
    <option selected>-PILIH HUBUNGAN-</option>
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
    <p><input placeholder="No Handphone Emergency" oninput="this.className = ''" name="no_hp_emergency" id="no_hp_emergency"></p>
    <p><label>Alamat Emergency</label></p>
    <p>
    <textarea name="alamat_emergency" id="alamat_emergency" row="6"></textarea></p>
  </div>
  
  
  <div class="tab">Pendidikan Formal:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  
  
  <div class="tab">Pengalam Kerja:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  
  <div class="tab">UPLOAD:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  
  
  
  
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
  </div>
</form>

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
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
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
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
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

</body>
</html>
