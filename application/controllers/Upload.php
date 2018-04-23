<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	function index()
	{
		$this->load->view('upload/upload_list');
	}

//load data upload list ajax
	function load_data_upload_list($bulan_proses,$tahun_proses,$jenis_aplikasi)
	{

		// $bulan_proses = '4';
		// $tahun_proses ='2018';
		// $jenis_aplikasi ='CardLink';

		$result = $this->db->query("SELECT * FROM SystemUpload WHERE ProcessMonth = '$bulan_proses' AND ProcessYear = '$tahun_proses' AND ApplicationSource = '$jenis_aplikasi'");
		// $result = $this->csv_import_model->select();

		$output = '
        <div class="table-responsive">
        	<table class="table table-bordered table-striped">
        		<tr>
        			<th>BatchID</th>
        			<th>Upload Remark</th>
        			<th>Jenis Aplikasi</th>
        			<th>Month</th>
        			<th>Year</th>
        			<th>Status</th>
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
					<td>'.$row->StatusUpload.'</td>';


if ($row->StatusUpload=='Approved') {



$output .= '<td>---</td>';


} else {


//versi 1
$output .= '
					<td>					
<a href='.site_url('upload/proses_approve').'/'.$row->ApplicationSource.'/'.$row->BatchID.'>
<button>APPROVE</button>
</a>									
					</td>
';


//versi ajax
// $output .='
// <td>
// <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Approve" onclick="approve_proses('."'".$row->ApplicationSource."/".$row->BatchID."'".')"><i class="glyphicon glyphicon-pencil"></i>Approve</a>
// </td>
// ';

}

$output .= '

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


//upload fle ccsv
	function upload_file_csv()
	{

// print_r($_FILES);die();

// $data_file = $_FILES["csv_file"]['size'];

// echo json_encode($data_file);
// echo json_encode($size_file);

//get batchid query
$BatchID = $this->csv_import_model->get_BatchID();
$tmp_name = $_FILES["csv_file"]['tmp_name']; //temporary
$nama_file = $_FILES["csv_file"]['name'];
$size_file = $_FILES["csv_file"]['size'];


	  $FilePath = './csv_upload/';
      $config['upload_path'] = $FilePath ;
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
  'UploadDate'        =>  date("Y/m/d"),
  'UploadBy'		   => $_SESSION['UserID'],
'UploadRemark'		=> $this->input->post('UploadRemark'),
'ApplicationSource' => $this->input->post('ApplicationSource'),
'ProcessMonth'      => $this->input->post('ProcessMonth'),
'ProcessYear' 		=> $this->input->post('ProcessYear'),
    'FilePath'			=> $FilePath,
    'VirtualPath'		=> $tmp_name, //temporary file
   'FileSize'			=> $size_file,
// 'ReportPath' 		=>
//NEXT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!   
// 'RowDataCount' 		=>
// 'RowDataSucceed' 	=>
// 'RowDataFailed' 	=>
// 'ApprovalID' 		=>
'StatusUpload' 		=> "Uploaded",


);	  
	  
$cek = $this->db->insert('SystemUpload',$data);	 

/*
*/
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

$return = array(
	'message' =>'Upload OK' , 
	'file_upload' =>$_FILES , 
	'nama_file' =>$nama_file , 
	'nama_file' =>$data_upload,
);
echo json_encode($return);		
/*		
*/
	}






	function proses_approve($Aplikasi,$BatchID){
//error notice

error_reporting(E_ALL & ~E_NOTICE);

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
// SystemCardLink
$db_system ='System'.$Aplikasi ;

//cek batch sudah ada
$batch_ada = $this->db->query("SELECT distinct BatchID  FROM $db_system WHERE BatchID = $BatchID ")->num_rows();

// print_r($batch_ada);die();
//cek batch ada?
if ($batch_ada==1) {
	echo "<script>alert('BATCH SUDAH DIAPPROVE');</script>";

// redirect('upload'); 

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
// 'CustomerName'		=>	$row["CustomerName"], //!!!!!caracter petik ''/' 
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
// print_r($RowDataSucceed);die();

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
	'StatusUpload' => 'Approved', 

);
$key = array('BatchID' =>$BatchID , );
$cek_update = $this->db->update('SystemUpload',$data_update,$key);


// print_r($cek_update);die();

}//cek batch ada?
/*
*/

if ($cek_update==1) {
	echo "<script>alert('Approved');</script>";
	redirect('upload');
} else {
	echo "<script>alert('GAGAL Approved');</script>";}


//return
// $approve_return = array(
// 	'Status' =>'suksess' , 
// 	// 'data_insert' =>$data , 
// 	// 'data_update' =>$data_update , 
// 	// 'cek_update' =>$cek_update , 


// );

// echo json_encode($approve_return);


		}


//dev============================
	public function ajax_tes($batchid)
	{
		// $this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


		function read_csv(){

		$this->load->view('read_csv');

		}

}	