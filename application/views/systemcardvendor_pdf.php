<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Systemcardvendor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BatchID</th>
		<th>Tanggal Survey</th>
		<th>Surveyor</th>
		<th>No Aplikasi</th>
		<th>Product</th>
		<th>Source Code</th>
		<th>Channel Aplikasi</th>
		<th>Coverage Area</th>
		<th>Sales Code</th>
		<th>Nama Aplikan</th>
		<th>No Identitas</th>
		<th>DOB</th>
		<th>Jenis Kelamin</th>
		<th>No HP</th>
		<th>Jenis Perusahaan</th>
		<th>Nama Perusahaan</th>
		<th>Jabatan</th>
		<th>Penghasilan</th>
		<th>Lama Bekerja</th>
		<th>Status Karyawan</th>
		<th>Alamat Kantor</th>
		<th>Kecamatan</th>
		<th>Kota</th>
		<th>No Telp Kantor</th>
		<th>ProcessMonth</th>
		<th>ProcessYear</th>
		<th>Status Kartu</th>
		
            </tr><?php
            foreach ($systemcardvendor_data as $systemcardvendor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $systemcardvendor->BatchID ?></td>
		      <td><?php echo $systemcardvendor->Tanggal_Survey ?></td>
		      <td><?php echo $systemcardvendor->Surveyor ?></td>
		      <td><?php echo $systemcardvendor->No_Aplikasi ?></td>
		      <td><?php echo $systemcardvendor->Product ?></td>
		      <td><?php echo $systemcardvendor->Source_Code ?></td>
		      <td><?php echo $systemcardvendor->Channel_Aplikasi ?></td>
		      <td><?php echo $systemcardvendor->Coverage_Area ?></td>
		      <td><?php echo $systemcardvendor->Sales_Code ?></td>
		      <td><?php echo $systemcardvendor->Nama_Aplikan ?></td>
		      <td><?php echo $systemcardvendor->No_Identitas ?></td>
		      <td><?php echo $systemcardvendor->DOB ?></td>
		      <td><?php echo $systemcardvendor->Jenis_Kelamin ?></td>
		      <td><?php echo $systemcardvendor->No_HP ?></td>
		      <td><?php echo $systemcardvendor->Jenis_Perusahaan ?></td>
		      <td><?php echo $systemcardvendor->Nama_Perusahaan ?></td>
		      <td><?php echo $systemcardvendor->Jabatan ?></td>
		      <td><?php echo $systemcardvendor->Penghasilan ?></td>
		      <td><?php echo $systemcardvendor->Lama_Bekerja ?></td>
		      <td><?php echo $systemcardvendor->Status_Karyawan ?></td>
		      <td><?php echo $systemcardvendor->Alamat_Kantor ?></td>
		      <td><?php echo $systemcardvendor->Kecamatan ?></td>
		      <td><?php echo $systemcardvendor->Kota ?></td>
		      <td><?php echo $systemcardvendor->No_Telp_Kantor ?></td>
		      <td><?php echo $systemcardvendor->ProcessMonth ?></td>
		      <td><?php echo $systemcardvendor->ProcessYear ?></td>
		      <td><?php echo $systemcardvendor->Status_Kartu ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>