        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>AGENCY</h3>
                      <div class='box box-primary'>



<form id="form-data1" action="<?php echo site_url('agency/create_action')?>" method="post" enctype="multipart/form-data" autocomplate="onload"> 




      <div class="form-row">
        <div class="form-group col-md-12">
   <div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>Agency</strong></p></div><br>
        </div>
        </div>

      <div class="form-row">

        <div class="form-group col-md-2">
          <label>Nama Agency</label>
          <input type="text" class="form-control" name="AgencyName" id="AgencyName" placeholder="AgencyName" required>
        </div>

        <div class="form-group col-md-2">
          <label>No Telpon</label>
          <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" required>
        </div>

        <div class="form-group col-md-2">
          <label>Email</label>
          <input type="email" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="EmailAddress" required>
        </div>

        <div class="form-group col-md-2">
          <label>Type User</label>
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

        <div class="form-group col-md-4">
          <label>Kode Pos</label>
          <input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="Kode Pos">
        </div>

<!--
        <div class="form-group col-md-2">
          
<input type="button" id="btn" value="Generate" class="btn btn-primary" >
       <button type="button" class="btn btn-info btn-lg" id="btn">generate</button>
        </div>
-->          

      </div>

      <div class="form-row">
      <div id="result"></div>
<!----load ajax
Jabatan 
  Nama  
Tgl Lahir 
  Tipe  
No. Identitas 
  
Update
-->
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
   <div align="center" style="border:1px solid;background-color:#00BFFF"><strong><p>PENGURUS</strong></p></div><br>
        </div>
        </div>


      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Nama Pengurus</label>
          <input type="text" class="form-control" name="nama_pengurus" id="nama_pengurus" placeholder="Nama Pengurus" required>
        </div>
        <div class="form-group col-md-4">
          <label>Jabatan</label>

          <select name="jabatan" class="form-control">
            <option selected>Pilih Jabatan</option>
            <option value="Direktur Pemasaran">Direktur Pemasaran</option>
            <option value="Direktur Utama">Direktur Utama</option>
            <option value="Komisaris">Komisaris</option>
            <option value="Manager Pemasaran">Manager Pemasaran</option>
            <option value="Wakil Direktur Utama">Wakil Direktur Utama</option>
         </select>

        </div>
        <div class="form-group col-md-4">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
        </div>

      </div>




      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Tipe</label>
          <select name="tipe" class="form-control">
            <option selected>Pilih Tipe</option>
            <option value="ktp">KTP</option>
            <option value="passport">Passport</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>No Identitas</label>
          <input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="No Identitas" required>
        </div>

      </div>



<!------
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
    </div>
-->


          <div class="box-footer">
            <input type="submit" class="btn btn-primary" name="kirim" onclick="return validasi_input(form)"   value="SIMPAN">
            <input type="reset" class="btn btn-inverse" value="Reset">
          </div><!-- /.box-footer-->
      </div>
      
    </form>



    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content