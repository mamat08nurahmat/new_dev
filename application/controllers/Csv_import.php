<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	function index()
	{
		$this->load->view('csv_import');
	}

	function load_data()
	{
		$result = $this->csv_import_model->select();

		$output = '
		 <h3 align="center">Imported User Details from CSV File</h3>
        <div class="table-responsive">
        	<table class="table table-bordered table-striped">
        		<tr>
        			<th>BatchID</th>
        			<th>Upload Remark</th>
        			<th>Jenis Aplikasi</th>
        			<th>Month</th>
        			<th>Year</th>
        			<th>ACT</th>
        		</tr>
		';
		// $count = 0;
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				// $count = $count + 1;
				$output .= '
				<tr>
					<td>'.$row->BatchID.'</td>
					<td>'.$row->UploadRemark.'</td>
					<td>'.$row->ApplicationSource.'</td>
					<td>'.$row->ProcessMonth.'</td>
					<td>'.$row->ProcessYear.'</td>

					<td>

<a href='.site_url('csv_import/view_import').'/'.$row->ApplicationSource.'/'.$row->BatchID.'>
<button>VIEW</button>
</a>					
					
					</td>
				</tr>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
	    		<td colspan="5" align="center">Data not Available</td>
	    	</tr>
			';
		}
		$output .= '</table></div>';
		echo $output;
	}


//CCOS / CARDLINK ?????????
	function view_import($Aplikasi,$BatchID){

//	echo $BatchID ;


			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$csvreader = PHPExcel_IOFactory::createReader('CSV');
 				$csvreader->setDelimiter('|');
				//nama file csv berdasarkan BatchID di folder csv upload
				$loadcsv = $csvreader->load('csv_upload/'.$BatchID.'.csv'); // Load file yang tadi diupload ke folder csv
				$sheet = $loadcsv->getActiveSheet()->getRowIterator();
				
print_r($sheet);die();


				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
//print_r($sheet);die();				
				$data['sheet'] = $sheet; 
				$data['Aplikasi'] = $Aplikasi; 
				$data['BatchID'] = $BatchID; 

//preview
		$this->load->view('csv_import/preview', $data);

	}

	function upload_file_csv()
	{
//get batchid query
$BatchID = $this->csv_import_model->get_BatchID();

// print_r($BatchID);die();		
// $BatchID = '1111111';		
/*
Array
(
    [file] => Array
        (
            [name] => format.csv
            [type] => application/vnd.ms-excel
            [tmp_name] => C:\PHP\tmp\phpBEB1.tmp
            [error] => 0
            [size] => 128
        )

)
*/
// print_r($_FILES);die();

      $config['upload_path'] = './csv_upload/';
      $config['allowed_types'] = 'csv';
      // $PhotoFileName = "PHOTO_".$increment_employee_id."_".$_FILES["photo"]['name'];
// $new_name = time().$_FILES["photo"]['name'];
      $config['file_name'] = $BatchID;
//    $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);

       $this->upload->do_upload('csv_file');
        $data_upload = $this->upload->data();        
        // $file_name = $data2["file_name"];

//insert systemupload

$data = array(

'BatchID'           => $BatchID,
// 'UploadDate'        => 
// 'UploadBy'		    =>
'UploadRemark'		=> $this->input->post('UploadRemark'),
'ApplicationSource' => $this->input->post('ApplicationSource'),
'ProcessMonth'      => $this->input->post('ProcessMonth'),
'ProcessYear' 		=> $this->input->post('ProcessYear'),
// 'FilePath'			=>
// 'VirtualPath'		=>
// 'FileSize'			=>
// 'ReportPath' 		=>
// 'RowDataCount' 		=>
// 'RowDataSucceed' 	=>
// 'RowDataFailed' 	=>
// 'ApprovalID' 		=>


);	  
	  
$cek = $this->db->insert('SystemUpload',$data);	 


// print_r($data_upload);die();
//		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);

		// $this->load->library('upload'); // Load librari upload
		
		// $config['upload_path'] = './csv_upload/';
		// $config['allowed_types'] = 'csv';
		// $config['max_size']	= '2048';
		// $config['overwrite'] = true;
		// $config['file_name'] = 'xxxxx';
	
		// $this->upload->initialize($config); // Load konfigurasi uploadnya
		// $this->upload->do_upload('file');		

		// foreach($file_data as $row)
		// {
		// 	$data[] = array(
		// 		'first_name'	=>	$row["First Name"],
  //       		'last_name'		=>	$row["Last Name"],
  //       		'phone'			=>	$row["Phone"],
  //       		'email'			=>	$row["Email"]
		// 	);
		// }
		// $this->csv_import_model->insert($data);
echo json_encode($data_upload);		
	}


		function import_v2($Aplikasi,$BatchID){

$lokasi_file = 'csv_upload/'.$BatchID.'.csv';
		$file_data = $this->csvimport->get_array($lokasi_file);
// $datax = file_get_contents($lokasi_file);
 // print_r($file_data);die();
		// $this->load->library('upload'); // Load librari upload
		
		// $config['upload_path'] = './csv_upload/';
		// $config['allowed_types'] = 'csv';
		// $config['max_size']	= '2048';
		// $config['overwrite'] = true;
		// $config['file_name'] = 'xxxxx';
	
		// $this->upload->initialize($config); // Load konfigurasi uploadnya
		// $this->upload->do_upload('file');	

//cek batch sudah ada
$batch_ada = $this->db->query("SELECT DISTINCT BatchID = '$BatchID' FROM SystemCardLink")->num_rows();

// print_r($batch_ada);die();
//cek batch ada?
if ($batch_ada==1) {
	echo "<script>alert('BATCH SUDAH DIAPPROVE');</script>";

redirect('csv_import'); 

} else {



$no=1;
		foreach($file_data as $row)
		{

// $date1 = strtotime($row["Decision Date"]);
// // $date1=date_create($row["Decision Date"]);
// $decision_date1 =  date($date1,"Y/m/d");



//------------------------------------
if ($Aplikasi=='CCOS') {
//=====================CCOS=================================
		 	$data[] = array(

// $cus_name = str_replace("'","-",$row["CustomerName"]);
// $cus_name = str_replace("RO'UF", 'KAMPRET', $row["CustomerName"]);

'BatchID'			=>	$BatchID,
'RowID'				=>	$no++,
//'DecisionDate'		=>	$row["Decision Date"],
'SourceCode'		=>	$row["SourceCode"],
// 'CustomerName'		=>	$cus_name,
'CustomerName'		=>	$row["CustomerName"],
'ORG'				=>	$row["ORG"],
'Logo'				=>	$row["Logo"],
'EmpReffCode'		=>	$row["EmpReffCode"],
'Status'			=>	$row["Status"],
'DeclineCode'		=>	$row["Decline Code"],
'ApplicationType'	=>	$row["Jenis App"]
		 	);
//============================================================

} else {

  //=====================CardLink=================================
		 	$data[] = array(

'BatchID'			=>	$BatchID,
'RowID'				=>	$no++,
// 'OpenDate'			=>	$row["Open Date"],
'SourceCode'		=>	$row["SourceCode"],
'CustomerNumber'	=>	$row["Customer Number"],
'CustomerName'		=>	$row["CustomerName"], //!!!!!caracter petik ''/' 
// 'CustomerName'		=>	'xxxxxxxxxxx',   //????????
// 'CustomerBirthDate'	=>	$row["Customer DOB"],
'ORG'				=>	$row["ORG"],
'Logo'				=>	$row["Logo"],
'EmpReffCode'		=>	$row["EmpReffCode"],
'BlockCard'			=>	$row["Block"],
'ApplicationType'	=>	$row["Jenis App"]

		 	);
//============================================================
}
//------------------------------------------------




		}

//  var_dump($data[0]['DecisionDate']);die();
// $date = $data[0]['DecisionDate'];
// $date1 = strtotime();
// // $date1=date_create($row["Decision Date"]);
// $decision_date1 =  date($date1,"Y/m/d");		

// print_r($data);die();


$db_system = 'System'.$Aplikasi;

//return jumlah data masuk
$RowDataSucceed =	$this->db->insert_batch($db_system, $data);		
print_r($RowDataSucceed);

//UPDATE
// [BatchID]
//       ,[UploadDate]
//       ,[UploadBy]
//       ,[UploadRemark]
//       ,[ApplicationSource]
//       ,[ProcessMonth]
//       ,[ProcessYear]
//       ,[FilePath]
//       ,[VirtualPath]
//       ,[FileSize]
//       ,[ReportPath]
//       ,[RowDataCount]
//       ,[RowDataSucceed]
//       ,[RowDataFailed]
//       ,[ApprovalID]
  // FROM [NEW_DEV].[dbo].[SystemUpload]



$data_update = array(
	'RowDataSucceed' => $RowDataSucceed, 
	'ApprovalID' => '888888888', 

);
$key = array('BatchID' =>$BatchID , );
$cek_update = $this->db->update('SystemUpload',$data_update,$key);


print_r($cek_update);die();

}//cek batch ada?
		}

		function tes_date(){
//string
$orderdate = '21022018';
//convert dd-mm-yyyyy
  // '21-02-2018';
 echo date("d-m-Y",strtotime($orderdate));


// if (preg_match('#^(\d{2})-(\d{2})-(\d{4})$#', $orderdate, $matches)) {
//     $month = $matches[1];
//     $day   = $matches[2];
//     $year  = $matches[3];
// } else {
//     echo 'invalid format';
// }

		}

		function import($Aplikasi,$BatchID){
echo $Aplikasi;
echo '<br>';
echo $BatchID;
//=====================

		// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$csvreader = PHPExcel_IOFactory::createReader('CSV');
 				$csvreader->setDelimiter('|');
				//nama file csv berdasarkan BatchID di folder csv upload
				$loadcsv = $csvreader->load('csv_upload/'.$BatchID.'.csv'); // Load file yang tadi diupload ke folder csv
				$sheet = $loadcsv->getActiveSheet()->getRowIterator();
print_r($sheet);die();		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		// $data = [];
		$data = array();
		//?????????????????ARRAY
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// START -->
				// Skrip untuk mengambil value nya
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
				
				$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
				foreach ($cellIterator as $cell) {
					array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
				}
				// <-- END
				
			$decision_date = $get[0]; // 
			$source_code = $get[1]; // 
			$customer_name = $get[2]; // 
			$customer_dob = $get[3]; // 
			$org = $get[4]; // 
			$logo = $get[5]; // 
			$empreffcode = $get[6]; // 
			$status = $get[7]; // 
			$decline_code = $get[8]; // 
			$jenis_app = $get[9]; // 

				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'BatchID'=>$BatchID, // 
					'RowID'=>$numrow, // 
					'DecisionDate'=>$decision_date, // 
					'SourceCode'=>$source_code, // 
					'CustomerName'=>$customer_name, // 
					'CustomerBirthDate'=>$customer_dob, // 
					'ORG'=>$org, // 
					'Logo'=>$logo, // 
					'EmpReffCode'=>$empreffcode, // 
					'Status'=>$block, // 
					'DeclineCode'=>$decline_code, // 
					'ApplicationType'=>$jenis_app, // 
			
				)
				);


			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}


print_r($data);die();

$db_system = 'System'.$Aplikasi;

$cek =	$this->db->insert_batch($db_system, $data);		
print_r($cek);
		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		// $this->SiswaModel->insert_multiple($data);
		
		// redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
//=============
		}

	function tes_upload(){

$data = array(

'BatchID'           => '123',
// 'UploadDate'        => 
// 'UploadBy'		    =>
// 'UploadRemark'		=>
// 'ApplicationSource' =>
// 'ProcessMonth'      =>
// 'ProcessYear' 		=>
// 'FilePath'			=>
// 'VirtualPath'		=>
// 'FileSize'			=>
// 'ReportPath' 		=>
// 'RowDataCount' 		=>
// 'RowDataSucceed' 	=>
// 'RowDataFailed' 	=>
// 'ApprovalID' 		=>


);	  
	  
$cek = $this->db->insert('SystemUpload',$data);	  

print_r($cek);
	}
	

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './csv/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}


		
}
