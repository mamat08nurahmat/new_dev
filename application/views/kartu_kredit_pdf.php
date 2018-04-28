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
        <h2>Kartu_kredit List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>RowID</th>
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
		
            </tr><?php
            foreach ($kartu_kredit_data as $kartu_kredit)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kartu_kredit->RowID ?></td>
		      <td><?php echo $kartu_kredit->BatchID ?></td>
		      <td><?php echo $kartu_kredit->Tanggal_Survey ?></td>
		      <td><?php echo $kartu_kredit->Surveyor ?></td>
		      <td><?php echo $kartu_kredit->No_Aplikasi ?></td>
		      <td><?php echo $kartu_kredit->Product ?></td>
		      <td><?php echo $kartu_kredit->Source_Code ?></td>
		      <td><?php echo $kartu_kredit->Channel_Aplikasi ?></td>
		      <td><?php echo $kartu_kredit->Coverage_Area ?></td>
		      <td><?php echo $kartu_kredit->Sales_Code ?></td>
		      <td><?php echo $kartu_kredit->Nama_Aplikan ?></td>
		      <td><?php echo $kartu_kredit->No_Identitas ?></td>
		      <td><?php echo $kartu_kredit->DOB ?></td>
		      <td><?php echo $kartu_kredit->Jenis_Kelamin ?></td>
		      <td><?php echo $kartu_kredit->No_HP ?></td>
		      <td><?php echo $kartu_kredit->Jenis_Perusahaan ?></td>
		      <td><?php echo $kartu_kredit->Nama_Perusahaan ?></td>
		      <td><?php echo $kartu_kredit->Jabatan ?></td>
		      <td><?php echo $kartu_kredit->Penghasilan ?></td>
		      <td><?php echo $kartu_kredit->Lama_Bekerja ?></td>
		      <td><?php echo $kartu_kredit->Status_Karyawan ?></td>
		      <td><?php echo $kartu_kredit->Alamat_Kantor ?></td>
		      <td><?php echo $kartu_kredit->Kecamatan ?></td>
		      <td><?php echo $kartu_kredit->Kota ?></td>
		      <td><?php echo $kartu_kredit->No_Telp_Kantor ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>