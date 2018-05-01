<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class System_upload extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('System_upload_model');
        $this->load->library('form_validation');

		$this->load->library('csvimport');


    }

    public function index()
    {
        $system_upload = $this->System_upload_model->get_all();
//print_r($)
        $data = array(
            'system_upload_data' => $system_upload
        );

        $this->template->load('template','system_upload_list', $data);
    }

    public function read($id) 
    {
        $row = $this->System_upload_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'BatchID' => $row->BatchID,
		'UploadDate' => $row->UploadDate,
		'UploadBy' => $row->UploadBy,
		'UploadRemark' => $row->UploadRemark,
		'ApplicationSource' => $row->ApplicationSource,
		'ProcessMonth' => $row->ProcessMonth,
		'ProcessYear' => $row->ProcessYear,
		'FilePath' => $row->FilePath,
		'VirtualPath' => $row->VirtualPath,
		'FileSize' => $row->FileSize,
		'ReportPath' => $row->ReportPath,
		'RowDataCount' => $row->RowDataCount,
		'RowDataSucceed' => $row->RowDataSucceed,
		'RowDataFailed' => $row->RowDataFailed,
		'ApprovalID' => $row->ApprovalID,
		'StatusUpload' => $row->StatusUpload,
	    );
            $this->template->load('template','system_upload_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
    }

    public function create() 
    {
//batch increment
$BatchID = $this->System_upload_model->get_BatchID();
// print_r($BatchID);die();
// $BatchID = 8888;

        $data = array(
            'button' => 'Create',
            'action' => site_url('system_upload/create_action'),
	    'ID' => set_value('ID'),
	    'BatchID' => $BatchID,
	    'UploadDate' => date('Y-m-d'),
	    'UploadBy' => set_value('UploadBy'),
	    'UploadRemark' => set_value('UploadRemark'),
	    'ApplicationSource' => set_value('ApplicationSource'),
	    'ProcessMonth' => set_value('ProcessMonth'),
	    'ProcessYear' => set_value('ProcessYear'),
	    'FilePath' => set_value('FilePath'),
	    'VirtualPath' => set_value('VirtualPath'),
	    'FileSize' => set_value('FileSize'),
	    'ReportPath' => set_value('ReportPath'),
	    'RowDataCount' => set_value('RowDataCount'),
	    'RowDataSucceed' => set_value('RowDataSucceed'),
	    'RowDataFailed' => set_value('RowDataFailed'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'StatusUpload' => set_value('StatusUpload'),
	);
        $this->template->load('template','system_upload_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
/*

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'UploadDate' => $this->input->post('UploadDate',TRUE),
		'UploadBy' => $this->input->post('UploadBy',TRUE),
		'UploadRemark' => $this->input->post('UploadRemark',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'FilePath' => $this->input->post('FilePath',TRUE),
		'VirtualPath' => $this->input->post('VirtualPath',TRUE),
		'FileSize' => $this->input->post('FileSize',TRUE),
		'ReportPath' => $this->input->post('ReportPath',TRUE),
		'RowDataCount' => $this->input->post('RowDataCount',TRUE),
		'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
		'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'StatusUpload' => $this->input->post('StatusUpload',TRUE),
	    );

            $this->System_upload_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('system_upload'));
        }
*/    	

//tes dummy 
// [FilePath] => Array
//         (
//             [name] => 123.csv
//             [type] => application/vnd.ms-excel
//             [tmp_name] => C:\PHP\tmp\php71F7.tmp
//             [error] => 0
//             [size] => 128
//         )

// print_r($_POST);
// print_r($_FILES);
// die();

// Array
// (
//     [file_name] => 4562.csv
//     [file_type] => application/vnd.ms-excel
//     [file_path] => C:/inetpub/wwwroot/crud_generator/uploads/
//     [full_path] => C:/inetpub/wwwroot/crud_generator/uploads/4562.csv
//     [raw_name] => 4562
//     [orig_name] => 456.csv
//     [client_name] => cardlink.csv
//     [file_ext] => .csv
//     [file_size] => 42.45
//     [is_image] => 
//     [image_width] => 
//     [image_height] => 
//     [image_type] => 
//     [image_size_str] => 
// )


////do_upload return data file upload
$data_upload = $this->_do_upload($this->input->post('BatchID',TRUE),$this->input->post('ApplicationSource',TRUE));

//
//Baca CSV file
//hitung rows nya

$fp = file($_FILES['FilePath']['tmp_name']);
$jumlah_rows =  count($fp)-1; //tifak termasuk header

//dummy dari session user id login
$id_user_login='12345';

// print_r($data_upload['file_name']);die();
            $data = array(
		'BatchID' =>  $this->input->post('BatchID',TRUE),
		'UploadDate' => $this->input->post('UploadDate',TRUE),
		'UploadBy' => $id_user_login,
		'UploadRemark' => $this->input->post('UploadRemark',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'FilePath' => $data_upload['file_name'],
		'VirtualPath' => $data_upload['client_name'],
		'FileSize' => $data_upload['file_size'],
		'ReportPath' => '-',
		'RowDataCount' => $jumlah_rows,
//update data 		
		// 'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
		// 'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
		// 'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'StatusUpload' => 'Terupload',
	    );

            $this->System_upload_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('system_upload'));



    }


	private function _do_upload($batch,$ApplicationSource)
	{
		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'csv';
/*
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
*/		
        $config['file_name']            = $batch.'_'.$ApplicationSource; //ambil batchID Upload

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('FilePath')) //upload and validate
        {
            $data['inputerror'][] = 'FilePath';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data();
	}



//dev=====
    public function clean($BatchID,$ApplicationSource) 
    {
$db_system = 'System'.$ApplicationSource;

//return jumlah data masuk
$batch_delete =	$this->db->query("DELETE FROM $db_system WHERE BatchID='$BatchID'");
$batch_update =	$this->db->query("UPDATE System_upload SET StatusUpload='Terupload'  WHERE BatchID='$BatchID'");

print_r($batch_delete);
print_r('<br>');
print_r($batch_delete);die();

	}


    public function approve($BatchID,$ApplicationSource) 
    {
error_reporting(E_ALL & ~E_NOTICE); //????????????????


//dummy session 
$sessionID ='12345';
// stdClass Object
// (
//     [ID] => 14
//     [BatchID] => 456
//     [UploadDate] => 2018-04-28 00:00:00.000
//     [UploadBy] => 
//     [UploadRemark] => tes
//     [ApplicationSource] => CardLink
//     [ProcessMonth] => 1
//     [ProcessYear] => 2018
//     [FilePath] => 456.csv
//     [VirtualPath] => 123.csv
//     [FileSize] => 0.13
//     [ReportPath] => 
//     [RowDataCount] => 
//     [RowDataSucceed] => 
//     [RowDataFailed] => 
//     [ApprovalID] => 
//     [StatusUpload] => Terupload
// )
		$lokasi_file = 'uploads/'.$BatchID.'_'.$ApplicationSource.'.csv';
		$file_data = $this->csvimport->get_array($lokasi_file);

// print_r($file_data);die();

$db_system ='System'.$ApplicationSource ;

//cek batch sudah ada
$batch_ada = $this->db->query("SELECT distinct BatchID  FROM $db_system WHERE BatchID = $BatchID ")->num_rows();

// print_r($batch_ada);die();

//cek batch ada?
if ($batch_ada==1) {

//batch sudah ada------
	echo "<script>alert('BATCH SUDAH DIAPPROVE');</script>";

	redirect('system_upload'); 
//================
} else {
//================
$no=1;
foreach($file_data as $row){

// $date1 = strtotime($row["Decision Date"]);
// // $date1=date_create($row["Decision Date"]);
// $decision_date1 =  date($date1,"Y/m/d");



		//------------------------------------
		if ($ApplicationSource=='CCOS') {
		//=====================CCOS=================================
				 	$data[] = array(

		// $cus_name = str_replace("'","-",$row["CustomerName"]);
		// $cus_name = str_replace("RO'UF", 'KAMPRET', $row["CustomerName"]);

		'BatchID'			=>	$BatchID,
		'RowID'				=>	$no++,
		'DecisionDate'		=>	$this->format_tanggal($row["Decision Date"]),
		'SourceCode'		=>	$row["SourceCode"],
		// // 'CustomerName'		=>	$cus_name,
		'CustomerName'		=>	$row["CustomerName"],
		// 'ORG'				=>	$row["ORG"], //??????????????
		'Logo'				=>	$row["Logo"],
		'EmpReffCode'		=>	$row["EmpReffCode"],
		'Status'			=>	$row["Status"],
		'DeclineCode'		=>	$row["Decline Code"],
		'ApplicationType'	=>	$row["Jenis App"]
				 	);
		//============================================================

		}elseif($ApplicationSource=='CardLink'){

		  //=====================CardLink=================================
		 	$data[] = array(

		'BatchID'			=>	$BatchID,
		'RowID'				=>	$no++,
		'OpenDate'			=>	$this->format_tanggal($row["Open Date"]),
		'SourceCode'		=>	$row["SourceCode"],
		'CustomerNumber'	=>	$row["Customer Number"],
		'CustomerName'		=>	$row["CustomerName"], //!!!!!caracter petik ''/' 
		// 'CustomerName'		=>	'xxxxxxxxxxx',   //????????
		'CustomerBirthDate'	=>	$this->format_tanggal($row["Customer DOB"]),
		'ORG'				=>	$row["ORG"],
		'Logo'				=>	$row["Logo"],
		'EmpReffCode'		=>	$row["EmpReffCode"],
		'BlockCard'			=>	$row["Block"],
		'ApplicationType'	=>	$row["Jenis App"]

		 	);
//============================================================

		}elseif($ApplicationSource=='CardVendor'){
//=====CardVendor
//kartu yang diinpun vendor			

$time1 = strtotime($row["Tanggal_Survey"]);
$newformat1 = date('Y/m/d',$time1);		   
$time2 = strtotime($row["DOB"]);
$newformat2 = date('Y/m/d',$time2);		   

$row2 = $this->System_upload_model->get_by_id($BatchID);
// print_r($row->RowDataCount);die();
$ProcessMonth = $row2->ProcessMonth;
$ProcessYear = $row2->ProcessYear;
/*
[0] => Array
        (
            [Tanggal_Survey] => 4/10/2018
            [Surveyor] => 6162101685
            [No_Aplikasi] => 0
            [Product] => Kartu Kredit
            [Source_Code] => G00APA0MCWCP200300K1C00
            [Channel_Aplikasi] => Direct Sales
            [Coverage_Area] => JAKARTA UTARA
            [Sales_Code] => PA0
            [Nama_Aplikan] => SUZANNA FEBRIANY
            [No_Identitas] => 3175036802700001
            [DOB] => 2/28/1970
            [Jenis_Kelamin] => LAKI - LAKI
            [No_HP] => 08111022870
            [Jenis_Perusahaan] => SWASTA
            [Nama_Perusahaan] => PT LESTARINDI JAYA MANDIRI
            [Jabatan] => MANAGER HRD
            [Penghasilan] => 260000000
            [Lama_Bekerja] => 5 TAHUN
            [Status_Karyawan] => KARYAWAN
            [Alamat_Kantor] => JL BISMA RAYA BLOK A 56 SUNTER AGUNG
            [Kecamatan] => JAKARTA UTARA
            [Kota] => JAKARTA
            [No_Telp_Kantor] => 021 65308333
        )

*/


		 	$data[] = array(
		    'BatchID' =>	$BatchID,
		   ' RowID' =>	$no++,
			'Tanggal_Survey' => $newformat1 ,
            'Surveyor' => $row["Surveyor"],
            'No_Aplikasi' => $row["No_Aplikasi"],
            'Product' => $row["Product"],
            'Source_Code' => $row["Source_Code"],
            'Channel_Aplikasi' => $row["Channel_Aplikasi"],
            'Coverage_Area' => $row["Coverage_Area"],
            'Sales_Code' => $row["Sales_Code"],
            'Nama_Aplikan' => $row["Nama_Aplikan"],
            'No_Identitas' => $row["No_Identitas"],

            'DOB' => $newformat2,
            'Jenis_Kelamin' => $row["Jenis_Kelamin"],
            'No_HP' => $row["No_HP"],
            'Jenis_Perusahaan' => $row["Jenis_Perusahaan"],
            'Nama_Perusahaan' => $row["Nama_Perusahaan"],
            'Jabatan' => $row["Jabatan"],
            'Penghasilan' => $row["Penghasilan"],
            'Lama_Bekerja' => $row["Lama_Bekerja"],
            'Status_Karyawan' => $row["Status_Karyawan"],
            'Alamat_Kantor' => $row["Alamat_Kantor"],
            'Kecamatan' => $row["Kecamatan"],
            'Kota' => $row["Kota"],
            'No_Telp_Kantor' => $row["No_Telp_Kantor"],

            'ProcessMonth' => $ProcessMonth,
            'ProcessYear' => $ProcessYear,


            );
 //=====================CardVendor=================================





		}else{

//=============CardVendorSystem===========
//===kartu vendor yangada di system=====			
/*
 [Tanggal_Survey] => 4/10/2018
            [Surveyor] => 6162101685
            [No_Aplikasi] => 0
            [Product] => Kartu Kredit
            [Source_Code] => G00APA0MCWCP200300K1C00
            [Channel_Aplikasi] => Direct Sales
            [Coverage_Area] => JAKARTA UTARA
            [Sales_Code] => PA0
            [Nama_Aplikan] => SUZANNA FEBRIANY
            [No_Identitas] => 3175036802700001
            [DOB] => 2/28/1970
            [Jenis_Kelamin] => LAKI - LAKI
            [No_HP] => 08111022870
            [Jenis_Perusahaan] => SWASTA
            [Nama_Perusahaan] => PT LESTARINDI JAYA MANDIRI
            [Jabatan] => MANAGER HRD
            [Penghasilan] => 260000000
            [Lama_Bekerja] => 5 TAHUN
            [Status_Karyawan] => KARYAWAN
            [Alamat_Kantor] => JL BISMA RAYA BLOK A 56 SUNTER AGUNG
            [Kecamatan] => JAKARTA UTARA
            [Kota] => JAKARTA
            [No_Telp_Kantor] => 021 65308333
*/			
 //=====================CardVendorSystem================================= 

$time1 = strtotime($row["Tanggal_Survey"]);
$newformat1 = date('Y/m/d',$time1);		   
$time2 = strtotime($row["DOB"]);
$newformat2 = date('Y/m/d',$time2);		   

$row2 = $this->System_upload_model->get_by_id($BatchID);
// print_r($row->RowDataCount);die();
$ProcessMonth = $row2->ProcessMonth;
$ProcessYear = $row2->ProcessYear;



		 	$data[] = array(
		    'BatchID' =>	$BatchID,
		   ' RowID' =>	$no++,
			'Tanggal_Survey' => $newformat1 ,
            'Surveyor' => $row["Surveyor"],
            'No_Aplikasi' => $row["No_Aplikasi"],
            'Product' => $row["Product"],
            'Source_Code' => $row["Source_Code"],
            'Channel_Aplikasi' => $row["Channel_Aplikasi"],
            'Coverage_Area' => $row["Coverage_Area"],
            'Sales_Code' => $row["Sales_Code"],
            'Nama_Aplikan' => $row["Nama_Aplikan"],
            'No_Identitas' => $row["No_Identitas"],

            'DOB' => $newformat2,
            'Jenis_Kelamin' => $row["Jenis_Kelamin"],
            'No_HP' => $row["No_HP"],
            'Jenis_Perusahaan' => $row["Jenis_Perusahaan"],
            'Nama_Perusahaan' => $row["Nama_Perusahaan"],
            'Jabatan' => $row["Jabatan"],
            'Penghasilan' => $row["Penghasilan"],
            'Lama_Bekerja' => $row["Lama_Bekerja"],
            'Status_Karyawan' => $row["Status_Karyawan"],
            'Alamat_Kantor' => $row["Alamat_Kantor"],
            'Kecamatan' => $row["Kecamatan"],
            'Kota' => $row["Kota"],
            'No_Telp_Kantor' => $row["No_Telp_Kantor"],

            'ProcessMonth' => $ProcessMonth,
            'ProcessYear' => $ProcessYear,


            );

 //=====================CardVendorSystem=================================

		}


}///end forecach
//=================INSERT TABEL SystemCCOS / SystemCardLink / SystemCardVendor =====================================
$db_system = 'System'.$ApplicationSource;

//return jumlah data masuk
$RowDataSucceed =	$this->db->insert_batch($db_system, $data);	


//================UPDATE TABEL System_Upload===================

$row = $this->System_upload_model->get_by_id($BatchID);
// print_r($row->RowDataCount);die();
$RowDataCount = $row->RowDataCount;
$RowDataFailed = $RowDataSucceed-$RowDataCount;

$data_update = array(
	'RowDataSucceed' => $RowDataSucceed,
	'RowDataFailed' => $RowDataFailed,

	'ApprovalID' => $sessionID, 
	'StatusUpload' => 'Approved', 

);
$key = array('BatchID' =>$BatchID , );
$cek_update = $this->db->update('System_Upload',$data_update,$key);



//--------------------
//batch diapprove dan diinsert ditabel systemCCOS / systemCardLink / systemCardVendor-----
	echo "<script>alert('DATA DIAPPROVE');</script>";

	redirect('system_upload'); 

}//if batch tidak ada di $db_system ='System'.$ApplicationSource ;
//==========================================
/*

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('system_upload/update_action'),
		'ID' => set_value('ID', $row->ID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'UploadDate' => set_value('UploadDate', $row->UploadDate),
		'UploadBy' => set_value('UploadBy', $row->UploadBy),
		'UploadRemark' => set_value('UploadRemark', $row->UploadRemark),
		'ApplicationSource' => set_value('ApplicationSource', $row->ApplicationSource),
		'ProcessMonth' => set_value('ProcessMonth', $row->ProcessMonth),
		'ProcessYear' => set_value('ProcessYear', $row->ProcessYear),
		'FilePath' => set_value('FilePath', $row->FilePath),
		'VirtualPath' => set_value('VirtualPath', $row->VirtualPath),
		'FileSize' => set_value('FileSize', $row->FileSize),
		'ReportPath' => set_value('ReportPath', $row->ReportPath),
		'RowDataCount' => set_value('RowDataCount', $row->RowDataCount),
		'RowDataSucceed' => set_value('RowDataSucceed', $row->RowDataSucceed),
		'RowDataFailed' => set_value('RowDataFailed', $row->RowDataFailed),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'StatusUpload' => set_value('StatusUpload', $row->StatusUpload),
	    );
            $this->template->load('template','system_upload_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
*/
    }


//===============GENERATE======================
    public	function generate($month,$year){

// print_r($month);
// print_r('<br>');
// print_r($year);

$card_vendor = $this->db->query("



 SELECT distinct a.* from  SystemCardVendor a

 WHERE   a.processMonth='$month' AND a.ProcessYear='$year'

	")->result();


$card_vendor_system = $this->db->query("



 SELECT distinct a.* from  SystemCardVendorSystem a
 WHERE   a.processMonth='$month' AND a.ProcessYear='$year'

    ")->result();

// print_r($card_vendor_system[0]->No_Identitas);die();
// $No_Identitas_system = array("3172024507880002", "3171026511920001", "3276050705810012");

foreach ($card_vendor_system as $system) {
    $No_Identitas_system[]= $system->No_Identitas;

    // $tanggal_jadi_kartu[]= $system->????;    
}


// print_r($No_Identitas_system);die();


$length = count($card_vendor);
for ($i = 0; $i < $length; $i++) {
    
  // print $card_vendor[$i]->No_Identitas;
  // print '<br>';





if (in_array($card_vendor[$i]->No_Identitas, $No_Identitas_system))
  {
  echo "Match found";
  print '<br>';
  }
else
  {
  echo "Match not found";
  print '<br>';

  // if (condition) {
  //   //tanggal jadi kartu > 6 bulan
  // } else {
  //     # code...
  // }
  

  // }
/*

*/

}


    }
//===============GENERATE======================

function php_in_array(){

$people = array("Peter", "Joe", "Glenn", "Cleveland");

print_r($people);die();

if (in_array("Glenn", $people))
  {
  echo "Match found";
  }
else
  {
  echo "Match not found";
  }

}


//=============
function get_generate_id($No_Identitas,$BatchID){
print_r($No_Identitas);die();
}
//============
    
    public function update($id) 
    {
        $row = $this->System_upload_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('system_upload/update_action'),
		'ID' => set_value('ID', $row->ID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'UploadDate' => set_value('UploadDate', $row->UploadDate),
		'UploadBy' => set_value('UploadBy', $row->UploadBy),
		'UploadRemark' => set_value('UploadRemark', $row->UploadRemark),
		'ApplicationSource' => set_value('ApplicationSource', $row->ApplicationSource),
		'ProcessMonth' => set_value('ProcessMonth', $row->ProcessMonth),
		'ProcessYear' => set_value('ProcessYear', $row->ProcessYear),
		'FilePath' => set_value('FilePath', $row->FilePath),
		'VirtualPath' => set_value('VirtualPath', $row->VirtualPath),
		'FileSize' => set_value('FileSize', $row->FileSize),
		'ReportPath' => set_value('ReportPath', $row->ReportPath),
		'RowDataCount' => set_value('RowDataCount', $row->RowDataCount),
		'RowDataSucceed' => set_value('RowDataSucceed', $row->RowDataSucceed),
		'RowDataFailed' => set_value('RowDataFailed', $row->RowDataFailed),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'StatusUpload' => set_value('StatusUpload', $row->StatusUpload),
	    );
            $this->template->load('template','system_upload_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'UploadDate' => $this->input->post('UploadDate',TRUE),
		'UploadBy' => $this->input->post('UploadBy',TRUE),
		'UploadRemark' => $this->input->post('UploadRemark',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'FilePath' => $this->input->post('FilePath',TRUE),
		'VirtualPath' => $this->input->post('VirtualPath',TRUE),
		'FileSize' => $this->input->post('FileSize',TRUE),
		'ReportPath' => $this->input->post('ReportPath',TRUE),
		'RowDataCount' => $this->input->post('RowDataCount',TRUE),
		'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
		'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'StatusUpload' => $this->input->post('StatusUpload',TRUE),
	    );

            $this->System_upload_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('system_upload'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->System_upload_model->get_by_id($id);

        if ($row) {
            $this->System_upload_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('system_upload'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	// $this->form_validation->set_rules('UploadDate', 'uploaddate', 'trim|required');
	// $this->form_validation->set_rules('UploadBy', 'uploadby', 'trim|required');
	$this->form_validation->set_rules('UploadRemark', 'uploadremark', 'trim|required');
	$this->form_validation->set_rules('ApplicationSource', 'applicationsource', 'trim|required');
	$this->form_validation->set_rules('ProcessMonth', 'processmonth', 'trim|required');
	$this->form_validation->set_rules('ProcessYear', 'processyear', 'trim|required');
	// $this->form_validation->set_rules('FilePath', 'filepath', 'trim|required');
	// $this->form_validation->set_rules('VirtualPath', 'virtualpath', 'trim|required');
	// $this->form_validation->set_rules('FileSize', 'filesize', 'trim|required');
	// $this->form_validation->set_rules('ReportPath', 'reportpath', 'trim|required');
	// $this->form_validation->set_rules('RowDataCount', 'rowdatacount', 'trim|required');
	// $this->form_validation->set_rules('RowDataSucceed', 'rowdatasucceed', 'trim|required');
	// $this->form_validation->set_rules('RowDataFailed', 'rowdatafailed', 'trim|required');
	// $this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	// $this->form_validation->set_rules('StatusUpload', 'statusupload', 'trim|required');

	// $this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "system_upload.xls";
        $judul = "system_upload";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "BatchID");
	xlsWriteLabel($tablehead, $kolomhead++, "UploadDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UploadBy");
	xlsWriteLabel($tablehead, $kolomhead++, "UploadRemark");
	xlsWriteLabel($tablehead, $kolomhead++, "ApplicationSource");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessMonth");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessYear");
	xlsWriteLabel($tablehead, $kolomhead++, "FilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "VirtualPath");
	xlsWriteLabel($tablehead, $kolomhead++, "FileSize");
	xlsWriteLabel($tablehead, $kolomhead++, "ReportPath");
	xlsWriteLabel($tablehead, $kolomhead++, "RowDataCount");
	xlsWriteLabel($tablehead, $kolomhead++, "RowDataSucceed");
	xlsWriteLabel($tablehead, $kolomhead++, "RowDataFailed");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "StatusUpload");

	foreach ($this->System_upload_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UploadDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UploadBy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UploadRemark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationSource);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessMonth);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessYear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->VirtualPath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FileSize);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ReportPath);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowDataCount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowDataSucceed);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowDataFailed);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->StatusUpload);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=system_upload.doc");

        $data = array(
            'system_upload_data' => $this->System_upload_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('system_upload_doc',$data);
    }

//fungsi format tanggal dari data file upload
	function format_tanggal($date){
$d = substr($date,0,2);
$m = substr($date,2,2);
$y = substr($date,4,4);
$new_date=$d."-".$m."-".$y;
$time = strtotime($new_date);

$newformat = date('Y/m/d',$time);
return $newformat;

// echo $newformat;
// echo "<br>";
// echo date("Y/m/d");
// echo "<br>";

// $date=date_create("31-01-2018");
// echo date_format($date,"Y/m/d H:i:s");


	}		





}

/* End of file System_upload.php */
/* Location: ./application/controllers/System_upload.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-28 11:41:10 */
/* http://harviacode.com */