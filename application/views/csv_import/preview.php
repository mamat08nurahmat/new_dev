<html>
<head>
	<title>Form Import</title>

</head>
<body>
	<h3>Form Import</h3>
	<hr>
	
	
	<?php
	// if(isset($_POST['preview'])){
	 // Jika user menekan tombol Preview pada form 
		// if(isset($upload_error)){ // Jika proses upload gagal
		// 	echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
		// 	die; // stop skrip
		// }
	print_r($Aplikasi);
	print_r($BatchID);

		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("index.php/csv_import/import_v2/".$Aplikasi."/".$BatchID."/")."'>";
		

			echo "<button type='submit' name='approve'>APPROVE</button> ";
			echo "<a href='".base_url("index.php/csv_import")."'>Cancel</a>";		

		// Buat sebuah div untuk alert validasi kosong
		// echo "<div style='color: red;' id='kosong'>
		// Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum terisi semua.
		// </div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='5'>Preview Data</th>
		</tr>
		<tr>
			<th>Open Date </th>
			<th>Source Code</th>
			<th>Customer Number</th>
			<th>Customer Name</th>
			<th>Customer DOB</th>
			<th>ORG</th>
			<th>Logo</th>
			<th>EmpReffCode</th>
			<th>Block</th>
			<th>Jenis App</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di csv
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// START -->
			// Skrip untuk mengambil value nya
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
			
			$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
			foreach ($cellIterator as $cell) {
				array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
			}
			// <-- END
			
			// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
			$open_date = $get[0]; // 
			$source_code = $get[1]; // 
			$customer_number = $get[2]; // 
			$customer_name = $get[3]; // 
			$customer_dob = $get[4]; // 
			$org = $get[5]; // 
			$logo = $get[6]; // 
			$empreffcode = $get[7]; // 
			$block = $get[8]; // 
			$jenis_app = $get[9]; // 
			
			// Cek jika semua data tidak diisi
			if(empty($open_date) && empty($source_code) && empty($customer_number) && empty($customer_name) && empty($customer_dob) && empty($org) && empty($logo) && empty($empreffcode) && empty($block) && empty($jenis_app))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$open_date_td = ( ! empty($open_date))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$source_code_td = ( ! empty($source_code))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$customer_number_td = ( ! empty($customer_number))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$customer_name_td = ( ! empty($customer_name))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$customer_dob_td = ( ! empty($customer_dob))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$org_td = ( ! empty($org))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$logo_td = ( ! empty($logo))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$empreffcode_td = ( ! empty($empreffcode))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$block_td = ( ! empty($block))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$jenis_app_td = ( ! empty($jenis_app))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah


				
				// Jika salah satu data ada yang kosong
				if(empty($open_date) or empty($source_code) or empty($customer_number) or empty($customer_name) or empty($customer_dob) or empty($org) or empty($logo) or empty($empreffcode) or empty($block) or empty($jenis_app)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$open_date_td.">".$open_date."</td>";
				echo "<td".$source_code_td.">".$source_code."</td>";
				echo "<td".$customer_number_td.">".$customer_number."</td>";
				echo "<td".$customer_name_td.">".$customer_name."</td>";
				echo "<td".$customer_dob_td.">".$customer_dob."</td>";
				echo "<td".$org_td.">".$org."</td>";
				echo "<td".$logo_td.">".$logo."</td>";
				echo "<td".$empreffcode_td.">".$empreffcode."</td>";
				echo "<td".$block_td.">".$block."</td>";
				echo "<td".$jenis_app_td.">".$jenis_app."</td>";
				echo "</tr>";
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 1
		// Jika lebih dari 1, berarti ada data yang masih kosong
		if($kosong > 1){
		?>	
			<script>
			$(document).ready(function(){
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		}else{ // Jika semua data sudah diisi
			echo "<hr>";
			
			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import'>APPROVE</button> ";
			echo "<a href='".base_url("index.php/Siswa")."'>Cancel</a>";
		}
		
		echo "</form>";

////////////	}
	?>
</body>
</html>
