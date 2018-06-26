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



//dev

   public function dev()
    {
        $system_upload = $this->System_upload_model->get_all();
//print_r($)
        $data = array(
            'system_upload_data' => $system_upload
        );

        $this->template->load('template','system_upload_list_dev', $data);
    }



    public function create_dev() 
    {
//batch increment
$BatchID = $this->System_upload_model->get_BatchID();
// print_r($BatchID);die();
// $BatchID = 8888;

        $data = array(
            'button' => 'Create',
            'action' => site_url('system_upload/create_action_dev'),
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
        $this->template->load('template','system_upload_form_dev', $data);
    }


  public function create_action_dev() 
    {

//split csv upload

// print_r($_POST);print_r('<br>');print_r($_FILES);die();

//=====================

$inputFile = $_FILES['FilePath']['tmp_name'];
$BatchID=$this->input->post('BatchID',TRUE);
$ApplicationSource=$this->input->post('ApplicationSource',TRUE);
$outputFile = 'BatchID_'.$BatchID.'_'.$ApplicationSource.'_Part_';

//jumlah row yang dibagi
$splitSize = 100 ;

$in = fopen($inputFile, 'r');

// $counter = 0;

$rowCount = 0;
$fileCount = 1;
while (!feof($in)) {

    if (($rowCount % $splitSize) == 0) {
        if ($rowCount > 0) {
            fclose($out);
        }
        $out = fopen('uploads/batch/'.$outputFile . $fileCount++ . '.csv', 'w');
   
    }

    $data = fgetcsv($in);
    if ($data)
        fputcsv($out, $data);
    $rowCount++;

}

$total_count_part=$fileCount-1;

fclose($out);
// print_r($total_count_part);die();

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
        //'Part' =>  $this->input->post('Part',TRUE),
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

        'PartCount' => $total_count_part,
//update data       
        // 'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
        // 'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
        // 'ApprovalID' => $this->input->post('ApprovalID',TRUE),
        'StatusUpload' => 'Terupload',
        );

            $this->System_upload_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('system_upload'));

/*
*/

    }

    public function approve_part($BatchID,$ApplicationSource,$Part) 
    {
error_reporting(E_ALL & ~E_NOTICE); //????????????????

$row2 = $this->System_upload_model->get_by_id($BatchID);
// print_r($row->RowDataCount);die();
$ProcessMonth = $row2->ProcessMonth;
$ProcessYear = $row2->ProcessYear;

//dummy session 
$sessionID ='12345';

        // $lokasi_file = 'uploads/'.$BatchID.'_'.$ApplicationSource.'.csv';
// $outputFile = 'BatchID_'.$BatchID.'_'.$ApplicationSource.'_Part_';
        $lokasi_file = 'uploads/batch/BatchID_'.$BatchID.'_'.$ApplicationSource.'_Part_'.$Part.'.csv';
        $file_data = $this->csvimport->get_array($lokasi_file);
//karakter "" !!!!!
//cek isi csv
print_r($file_data);die();

// $db_system ='System'.$ApplicationSource ;

}



function readCSV($BatchID,$ApplicationSource,$Part){

       $lokasi_file = 'uploads/batch/BatchID_'.$BatchID.'_'.$ApplicationSource.'_Part_'.$Part.'.csv';

    $file_handle = fopen($lokasi_file, 'r');
    while (!feof($file_handle) ) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    fclose($file_handle);

    // return $line_of_text;
    print_r($line_of_text);

}


/**
*   Converts a CSV file into an array
*   NOTE: file does NOT have to have .csv extension
*   
*   $file - path to file to convert (string)
*   $delimiter - field delimiter (string)
*   $first_line_keys - use first line as array keys (bool)
*   $line_lenght - set length to retrieve for each line (int)
*/

// public static function CSVToArray($file, $delimiter = ',', $first_line_keys = true, $line_length = 2048){
public static function CSVToArray($BatchID,$ApplicationSource,$Part){
    //next part ganti dengan jumlah PartCount yang di loop for
//lokasi file upload yang di split
$file = 'uploads/batch/BatchID_'.$BatchID.'_'.$ApplicationSource.'_Part_'.$Part.'.csv';
// $file; 
$delimiter ='|';
$first_line_keys = true; 
$line_length = 2048;


    // file doesn't exist
    if( !file_exists($file) ){
        return false;
    }

    // open file
    $fp = fopen($file, 'r');

    

    // add each line to array
    $csv_array = array();
    while( !feof($fp) ){

        // get current line
        $line = fgets($fp, $line_length);

        // line to array
        $data = str_getcsv($line, $delimiter);

        // keys/data count mismatch
        if( isset($keys) && count($keys) != count($data) ){

            // skip to next line
            continue;

        // first line, first line should be keys
        }else if( $first_line_keys && !isset($keys) ){

            // use line data for keys
            $keys = $data;

        // first line used as keys
        }else if($first_line_keys){

            // add as associative array
            $csv_array[] = array_combine($keys, $data);

        // first line NOT used for keys
        }else{

            // add as numeric array
            $csv_array[] = $data;

        }

    }

    // close file
    fclose($fp);

    // nothing found
    if(!$csv_array){
        return array();
    }

    // return csv array
    // return $csv_array;

print_r($csv_array);

} // CSVToArray()


/**
* @link http://gist.github.com/385876
*/
// function csv_to_array($filename='', $delimiter=',')
// {

function csv_to_array($BatchID,$ApplicationSource,$Part){

$filename = 'uploads/batch/BatchID_'.$BatchID.'_'.$ApplicationSource.'_Part_'.$Part.'.csv';
// $file; 
$delimiter ='|';


    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    // return $data;

    print_r($data);    
}

//===================    
    public function index()
    {
        $system_upload = $this->System_upload_model->get_all();
//print_r($)
        $data = array(
            'system_upload_data' => $system_upload
        );

        $this->template->load('template','system_upload_list', $data);
    }



    public function vendor()
    {
//session UserID nex dev

//next by UserID
        // $system_upload = $this->System_upload_model->get_all();
        $system_upload = $this->db->query("SELECT * FROM System_upload  WHERE ApplicationSource='CardVendor' ORDER BY BatchID ASC")->result();
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
        'Part' => '1',
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
$data_upload = $this->_do_upload($this->input->post('BatchID',TRUE),$this->input->post('Part',TRUE),$this->input->post('ApplicationSource',TRUE));

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
        'PartCount' =>  $this->input->post('Part',TRUE),
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

//=======????
    private function _do_upload($batch,$part,$ApplicationSource)
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
        $config['file_name']            = $batch.'_'.$ApplicationSource.'_'.$part; //ambil batchID Upload

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
/*
// split upload csv
$inputFile = file($_FILES['FilePath']['tmp_name']);
$BatchID='999';
$outputFile = 'BatchID_'.$BatchID.'_Part_';

$splitSize = 10000 ;

$in = fopen($inputFile, 'r');

$rowCount = 0;
$fileCount = 1;
while (!feof($in)) {

    if (($rowCount % $splitSize) == 0) {
        if ($rowCount > 0) {
            fclose($out);
        }
        $out = fopen($outputFile . $fileCount++ . '.csv', 'w');
    }

    $data = fgetcsv($in);
    if ($data)
        fputcsv($out, $data);
    $rowCount++;

}

fclose($out);
*/

    }



//dev=====
    public function clean($BatchID,$ApplicationSource) 
    {
$db_system = 'System'.$ApplicationSource;

//return jumlah data masuk
$batch_delete = $this->db->query("DELETE FROM $db_system WHERE BatchID='$BatchID'");
$batch_update = $this->db->query("UPDATE System_upload SET StatusUpload='Terupload'  WHERE BatchID='$BatchID'");

print_r($batch_delete);
print_r('<br>');
print_r($batch_delete);die();

    }


    public function approve($ID,$ApplicationSource) 
    {
error_reporting(E_ALL & ~E_NOTICE); //????????????????

$row2 = $this->System_upload_model->get_by_id($ID);
// print_r($row->RowDataCount);die();
$ProcessMonth = $row2->ProcessMonth;
$ProcessYear = $row2->ProcessYear;
$BatchID = $row2->BatchID;
$Part = $row2->PartCount;
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
        $lokasi_file = 'uploads/'.$BatchID.'_'.$ApplicationSource.'_'.$Part.'.csv';
        $file_data = $this->csvimport->get_array($lokasi_file);

//cek isi csv
// print_r($file_data);die();

$db_system ='System'.$ApplicationSource ;

//cek batch sudah ada
///////$batch_ada = $this->db->query("SELECT distinct BatchID  FROM $db_system WHERE BatchID = $BatchID ")->num_rows();

// print_r($batch_ada);die();

//cek batch ada?
/*
if ($batch_ada==1) {

//batch sudah ada------
    echo "<script>alert('BATCH SUDAH DIAPPROVE');</script>";

    redirect('system_upload'); 
//================
} else {
//================
*/
$max_rowID = $this->db->query("select MAX(RowID) as RowID from SystemCardLink  where BatchID='$BatchID' ")->result();

if($max_rowID[0]->RowID<1){
$no=1;	
//echo $no;	
}else{
$no=$max_rowID[0]->RowID+1; 	
//echo $no;	
}

//print_r('xxxxxxxxxxxxxxxxx');die();
//$no=1;
//cek max rowid systemCardLink where Batch
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

        'BatchID'           =>  $BatchID,
        'RowID'             =>  $no++,
        'DecisionDate'      =>  $this->format_tanggal($row["Decision Date"]),
        'SourceCode'        =>  $row["SourceCode"],
        // // 'CustomerName'        =>  $cus_name,
        'CustomerName'      =>  $row["CustomerName"],
        // 'ORG'                =>  $row["ORG"], //??????????????
        'Logo'              =>  $row["Logo"],
        'EmpReffCode'       =>  $row["EmpReffCode"],
        'Status'            =>  $row["Status"],
        'DeclineCode'       =>  $row["Decline Code"],
        'ApplicationType'   =>  $row["Jenis App"],
        'ProcessMonth' => $ProcessMonth,
        'ProcessYear' => $ProcessYear,

        'No_Identitas'      =>  $row["No_Identitas"]
                    );
        //============================================================

        }elseif($ApplicationSource=='CardLink'){

          //=====================CardLink=================================
            $data[] = array(

        'BatchID'           =>  $BatchID,
        'RowID'             =>  $no++,
        'OpenDate'          =>  $this->format_tanggal($row["Open Date"]),
        'SourceCode'        =>  $row["SourceCode"],
        'CustomerNumber'    =>  $row["Customer Number"],
        'CustomerName'      =>  $row["CustomerName"], //!!!!!caracter petik ''/' 
        // 'CustomerName'       =>  'xxxxxxxxxxx',   //????????
        'CustomerBirthDate' =>  $this->format_tanggal($row["Customer DOB"]),
        'ORG'               =>  $row["ORG"],
        'Logo'              =>  $row["Logo"],
        'EmpReffCode'       =>  $row["EmpReffCode"],
        'BlockCard'         =>  $row["Block"],
        'ApplicationType'   =>  $row["Jenis App"]

            );
//============================================================

        }elseif($ApplicationSource=='CardVendor'){
//=====CardVendor
//kartu yang diinpun vendor         

$time1 = strtotime($row["Tanggal_Survey"]);
$newformat1 = date('Y/m/d',$time1);        
$time2 = strtotime($row["DOB"]);
$newformat2 = date('Y/m/d',$time2);        


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
            'BatchID' =>    $BatchID,
           ' RowID' =>  $no++,
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

$row2 = $this->System_upload_model->get_by_id($ID);
// print_r($row->RowDataCount);die();
$ProcessMonth = $row2->ProcessMonth;
$ProcessYear = $row2->ProcessYear;



            $data[] = array(
            'BatchID' =>    $BatchID,
           ' RowID' =>  $no++,
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
$RowDataSucceed =   $this->db->insert_batch($db_system, $data); 

//jika $RowDataSucceed == $RowDataCount
/*

if(){
    
}else{
    
}


*/
//================UPDATE TABEL System_Upload===================

$row = $this->System_upload_model->get_by_id($ID);
// print_r($row->RowDataCount);die();
$RowDataCount = $row->RowDataCount;
$RowDataFailed = $RowDataSucceed-$RowDataCount;

$data_update = array(
    'RowDataSucceed' => $RowDataSucceed,
    'RowDataFailed' => $RowDataFailed,

    'ApprovalID' => $sessionID, 
    'StatusUpload' => 'Approved', 

);
$key = array('ID' =>$ID , );
$cek_update = $this->db->update('System_Upload',$data_update,$key);



//--------------------
//batch diapprove dan diinsert ditabel systemCCOS / systemCardLink / systemCardVendor-----
    echo "<script>alert('DATA DIAPPROVE');</script>";

    redirect('system_upload'); 
//!!!!!!
///}//if batch tidak ada di $db_system ='System'.$ApplicationSource ;
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
    public function get_decision_date($No_Identitas,$month,$year){
// echo $decision_date;
$decision_date = $this->db->query("SELECT DecisionDate FROM SystemCCOS Where No_Identitas='$No_Identitas' AND ProcessMonth='$month' AND ProcessYear='$year' ")->result();



// return $decision_date[0]->DecisionDate;
$time_decision_date = strtotime($decision_date[0]->DecisionDate);

$d=strtotime("-6 Months");
$enam_bulan_lalu =  date("Y-m-d h:i:sa", $d) ;
$time_enam_bulan_lalu = strtotime($enam_bulan_lalu);


// $selisih_bulan = date('Y/m/d',$time1);        
if ($time_enam_bulan_lalu>$time_decision_date) {
    # code...
$cek = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='Lebih 6 Bulan' WHERE No_Identitas='$No_Identitas' AND ProcessMonth='$month' AND ProcessYear='$year'");


$arrayreturn = array('CEK' =>$cek ,'Status_Kartu' =>'Lebih 6 Bulan' , );

    return $arrayreturn;
} else {
    # code...
$cek = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='Kurang 6 Bulan' WHERE No_Identitas='$No_Identitas' AND ProcessMonth='$month' AND ProcessYear='$year'");


$arrayreturn = array('CEK' =>$cek ,'Status_Kartu' =>'Kurang 6 Bulan' , );

    return $arrayreturn;
}




    }


    public function part_generate(){
$month='1';
$year='2018';

$card_vendor = $this->db->query("



 SELECT distinct a.* from  SystemCardVendor a

 WHERE   a.processMonth='$month' AND a.ProcessYear='$year'

    ")->result();

//incomming / CCOS
$system_ccos = $this->db->query("



 SELECT distinct a.* from  SystemCCOS a
 WHERE   a.processMonth='$month' AND a.ProcessYear='$year'

    ")->result();
// No_Identitas_ccos
// print_r($card_vendor_system[0]->No_Identitas);die();
// $No_Identitas_system = array("3172024507880002", "3171026511920001", "3276050705810012");
foreach ($system_ccos as $system) {
    $No_Identitas_ccos[]= $system->No_Identitas;

    $tanggal_jadi_kartu[]= $system->DecisionDate;    
}
//array dari foreach query
// $No_Identitas_ccos = $arrayName[] = array(
//  '11111111111',
//  '222222222222',
//  '3333333333333',
//  '4444444444444',
//  '55555555555555',
//  '11111111111',
//  '2222222222222',
//  '333333333333333',
//  '4444444444444','55555555555555'
// );


// print_r($No_Identitas_ccos);die();
// $length_No_Identitas_ccos = 105258;

$length_No_Identitas_ccos = count($No_Identitas_ccos);
$row_part_ccos =  ceil($length_No_Identitas_ccos/250)+1;


// print_r($row_part_ccos);die();
// print_r($total_row_ccos);
// print_r('<br>');
// print_r($row_part_ccos);die();
//ambil row <=5000

$system_ccos_part = $this->db->query("
 SELECT distinct TOP 250  a.* from  SystemCCOS a
 WHERE   a.processMonth='1' AND a.ProcessYear='2018' AND Part IS NULL AND Is_generate IS NULL
    ")->result();           
foreach ($system_ccos_part as $system_part) {
    $No_Identitas_ccos_part[]= $system_part->No_Identitas;

    $tanggal_jadi_kartu[]= $system_part->DecisionDate;    
}


//=========
// print_r($card_vendor);die();
$length = count($card_vendor);

for ($x = 1; $x < $row_part_ccos; $x++) {

print_r("<br>"."part ke ".$x."<br>");
print_r("=================================================="."<br>");       
//-----------------



// print_r($length);die();
for ($i = 0; $i < $length; $i++) {

// print_r("<br>"."loop ke - ".$i."-".$card_vendor[$i]->No_Identitas."<br>");
// 

if (in_array($card_vendor[$i]->No_Identitas, $No_Identitas_ccos_part))
  {

print_r("<br>"."loop ke - ".$i."-".$card_vendor[$i]->No_Identitas."<br>");
print_r("<br>"."part ke - ".$x."<br>");
print_r("ADA di CCOS <br><br>");    
//=====================ADA DI CCOS===============================
// print_r($card_vendor[$i]->No_Identitas);    

$decision_date = $this->db->query("SELECT DecisionDate FROM SystemCCOS Where No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year' ")->result();



// return $decision_date[0]->DecisionDate;
$time_decision_date = strtotime($decision_date[0]->DecisionDate);

$d=strtotime("-6 Months");
$enam_bulan_lalu =  date("Y-m-d h:i:sa", $d) ;
$time_enam_bulan_lalu = strtotime($enam_bulan_lalu);


// $selisih_bulan = date('Y/m/d',$time1);        
if ($time_enam_bulan_lalu>$time_decision_date) {
    # lebih dari 6 bulan

print_r("decision_date   -->".$decision_date[0]->DecisionDate." -->lebih dari 6 bulan"."<br>");
//===update pert = $x dan is_generate=1 di systemCCOS dan update status_kartu di Systemcardvendor


$cek1 = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='DECISION DATE LEBI DARI 6 BULAN' WHERE No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year'");


$cek2 = $this->db->query("UPDATE SystemCCOS SET Part='$x',Is_generate=1 WHERE No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year'");



print_r($cek1.'<br>');
print_r($cek2.'<br>');
// print_r($cek1.'<br>'.$cek2.'<br><br>');

// $arrayreturn = array('CEK' =>$cek ,'Status_Kartu' =>'Lebih 6 Bulan' , );

//     return $arrayreturn;
} else {
    # kurang dari 6 bulan
print_r("decision_date  -->".$decision_date[0]->DecisionDate."---kurang dari 6 bulan"."<br>");



$cek3 = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='DECISION DATE KURANG DARI 6 BULAN' WHERE No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year'");


$cek4 = $this->db->query("UPDATE SystemCCOS SET Part='$x',Is_generate=1 WHERE No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year'");



// print_r($cek1.'<br>'.$cek2.'<br><br>');
print_r($cek3.'<br>');
print_r($cek4.'<br>');

// $cek = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='Kurang 6 Bulan' WHERE No_Identitas='$No_Identitas' AND ProcessMonth='$month' AND ProcessYear='$year'");



// $arrayreturn = array('CEK' =>$cek ,'Status_Kartu' =>'Kurang 6 Bulan' , );

//     return $arrayreturn;
}
        /*
        */
//=====================ADA DI CCOS===============================
}else{

print_r("<br>"."loop ke - ".$i."-".$card_vendor[$i]->No_Identitas."<br>");
print_r("<br>"."part ke - ".$x."<br>");
print_r("TIDAK ADA di CCOS <br><br>");  
//=====================TIDAK ADA DI CCOS===============================
$cek5 = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='TIDAK ADA DI CCOS' WHERE No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year'");


$cek6 = $this->db->query("UPDATE SystemCCOS SET Part='$x',Is_generate=1 WHERE No_Identitas='".$card_vendor[$i]->No_Identitas."' AND ProcessMonth='$month' AND ProcessYear='$year'");



// print_r($cek1.'<br>'.$cek2.'<br><br>');
print_r($cek5.'<br>');
print_r($cek6.'<br>');


/*

// print_r($card_vendor[$i]->No_Identitas);    
  echo $i."---".$card_vendor[$i]->No_Identitas." Tidak ada Kartu di CCOS";
  print '<br>';
  echo "update is generate=1 status Part ke- ".$x;
  print '<br>';
  print '<br>';
*/  

//=====================TIDAK ADA DI CCOS===============================
}

}//looping update

        } //looping part


    }

    public  function generate($month,$year){

// print_r($month);
// print_r('<br>');
// print_r($year);

// $decision_date = $this->get_decision_date('3172024507880002',$month,$year);
// print_r($decision_date);die();


$card_vendor = $this->db->query("



 SELECT distinct a.* from  SystemCardVendor a

 WHERE   a.processMonth='$month' AND a.ProcessYear='$year'

    ")->result();

//incomming / CCOS
$system_ccos = $this->db->query("



 SELECT distinct a.* from  SystemCCOS a
 WHERE   a.processMonth='$month' AND a.ProcessYear='$year'

    ")->result();
// No_Identitas_ccos
// print_r($card_vendor_system[0]->No_Identitas);die();
// $No_Identitas_system = array("3172024507880002", "3171026511920001", "3276050705810012");

foreach ($system_ccos as $system) {
    $No_Identitas_ccos[]= $system->No_Identitas;

    $tanggal_jadi_kartu[]= $system->DecisionDate;    
}


// print_r($No_Identitas_ccos);die();
//105.258
/*
// $total_row_ccos = count($No_Identitas_ccos);
$total_row_ccos = 105258;
$row_part_ccos =  ceil($total_row_ccos/25000);


// print_r($system_ccos);die();
print_r($total_row_ccos);
print_r('<br>');
print_r($row_part_ccos);die();
//ambil row <=5000
for($i=){
    


}
*/

// $length_No_Identitas_ccos = count($No_Identitas_ccos);
// print_r($length_No_Identitas_ccos);die();

$length = count($card_vendor);

// print_r($length);die();
for ($i = 0; $i < $length; $i++) {
    
  // print $card_vendor[$i]->No_Identitas;
  // print '<br>';

//nex dev 



if (in_array($card_vendor[$i]->No_Identitas, $No_Identitas_ccos))
  {

// print_r($card_vendor[$i]->No_Identitas);    
  echo $card_vendor[$i]->No_Identitas." Ada Kartu di CCOS";
  print '<br>';

$decision_date = $this->get_decision_date($card_vendor[$i]->No_Identitas,$month,$year);
//dev
print_r($decision_date);



// $this->get_decision_date($card_vendor[$i]->No_Identitas);

//tampil DecisionDate



  // if (condition) {
  //     # code...
  // } else {
  //     # code...
  // }
  

  }
else
  {
  echo $card_vendor[$i]->No_Identitas."Tidak ada kartu di CCOS";
  print '<br>';
  $cv = $card_vendor[$i]->No_Identitas;
  // var_dump($card_vendor[$i]->No_Identitas);
$cek = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='Tidak Ada Kartu' WHERE No_Identitas='$cv' AND ProcessMonth='$month' AND ProcessYear='$year'");

print_r($cek);
// $arrayreturn = array('CEK' =>$cek ,'Status_Kartu' =>'Tidak Ada Kartu' , );

// print_r($arrayreturn);

  }
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


   public function excel_card_vendor($BatchID)
    {

// print_r($this->System_upload_model->get_all_card_vendor($BatchID));die();


        $this->load->helper('exportexcel');
        $namaFile = "card_vendor.xls";
        $judul = "Card_Vendor";
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
        xlsWriteLabel($tablehead, $kolomhead++, "RowID");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal_Survey");
        xlsWriteLabel($tablehead, $kolomhead++, "Surveyor");
        xlsWriteLabel($tablehead, $kolomhead++, "No_Aplikasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Product");
        xlsWriteLabel($tablehead, $kolomhead++, "Source_Code");
        xlsWriteLabel($tablehead, $kolomhead++, "Channel_Aplikasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Coverage_Area");
        xlsWriteLabel($tablehead, $kolomhead++, "Sales_Code");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama_Aplikan");
        xlsWriteLabel($tablehead, $kolomhead++, "No_Identitas");
        xlsWriteLabel($tablehead, $kolomhead++, "DOB");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis_Kelamin");
        xlsWriteLabel($tablehead, $kolomhead++, "No_HP");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis_Perusahaan");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama_Perusahaan");
        xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan");
        xlsWriteLabel($tablehead, $kolomhead++, "Lama_Bekerja");
        xlsWriteLabel($tablehead, $kolomhead++, "Status_Karyawan");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat_Kantor");
        xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kota");
        xlsWriteLabel($tablehead, $kolomhead++, "No_Telp_Kantor");
        xlsWriteLabel($tablehead, $kolomhead++, "ProcessMonth");
        xlsWriteLabel($tablehead, $kolomhead++, "ProcessYear");
        xlsWriteLabel($tablehead, $kolomhead++, "Status_Kartu");

    foreach ($this->System_upload_model->get_all_card_vendor($BatchID) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
            xlsWriteNumber($tablebody, $kolombody++, $data->RowID);
            xlsWriteNumber($tablebody, $kolombody++, $data->Tanggal_Survey);
            xlsWriteNumber($tablebody, $kolombody++, $data->Surveyor);
            xlsWriteNumber($tablebody, $kolombody++, $data->No_Aplikasi);
            xlsWriteNumber($tablebody, $kolombody++, $data->Product);
            xlsWriteNumber($tablebody, $kolombody++, $data->Source_Code);
            xlsWriteNumber($tablebody, $kolombody++, $data->Channel_Aplikasi);
            xlsWriteNumber($tablebody, $kolombody++, $data->Coverage_Area);
            xlsWriteNumber($tablebody, $kolombody++, $data->Sales_Code);
            xlsWriteNumber($tablebody, $kolombody++, $data->Nama_Aplikan);
            xlsWriteNumber($tablebody, $kolombody++, $data->No_Identitas);
            xlsWriteNumber($tablebody, $kolombody++, $data->DOB);
            xlsWriteNumber($tablebody, $kolombody++, $data->Jenis_Kelamin);
            xlsWriteNumber($tablebody, $kolombody++, $data->No_HP);
            xlsWriteNumber($tablebody, $kolombody++, $data->Jenis_Perusahaan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Nama_Perusahaan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Jabatan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Penghasilan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Lama_Bekerja);
            xlsWriteNumber($tablebody, $kolombody++, $data->Status_Karyawan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Alamat_Kantor);
            xlsWriteNumber($tablebody, $kolombody++, $data->Kecamatan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Kota);
            xlsWriteNumber($tablebody, $kolombody++, $data->No_Telp_Kantor);
            xlsWriteNumber($tablebody, $kolombody++, $data->ProcessMonth);
            xlsWriteNumber($tablebody, $kolombody++, $data->ProcessYear);
            xlsWriteNumber($tablebody, $kolombody++, $data->Status_Kartu);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
 


//======================

public function view_generate_by_batch($BatchID){


// $batch_id = $this->input->post('batch_id');
//cek batch generate????
//$cek_batch = $this->db->query("SELECT batch_id FROM total")->result();
//????????????
// $id['batch_id']= $batch_id;
//$id['batch_id']= $batch_id;
// $data_generate = $this->model_app->getSelectedData("upload_verivikasi",$id)->result();
$data_generate = $this->db->query("SELECT * FROM SystemCardVendor WHERE BatchID='$BatchID'")->result();
//print_r($data_generate);die();
foreach($data_generate as $x){
//$link[] =base_url("index.php/report/get_generate_id/$x->NO_KTP_PEMOHON");
$link[] =base_url("index.php/System_upload/generate_by_ktp_batch/$x->No_Identitas/$BatchID/$x->ProcessMonth/$x->ProcessYear");
//echo $x->NO_KTP_PEMOHON;
}
        $data=array(
            'title'=>'Laporan',
//            'active_dashboard'=>'active',
//            'data_upload'=>$this->model_app->getAllData('upload_verivikasi'),
              //'data_upload'=>$this->db->query("SELECT distinct batch_id FROM upload_verivikasi")->result(),
 'data_link'=>$link,
 'systemcardvendor_data'=>$data_generate,
//              'tabel_detail'=>$output,
        );

// print_r($data);die();

 // $this->template->load('template','system_upload_form_generate', $data);
    $this->template->load('template','systemcardvendor_list_generate', $data);
        // $this->load->view('element/v_header',$data);
        // $this->load->view('pages/v_cari_generate1');
        // $this->load->view('element/v_footer');


}


public function generate_by_ktp_batch($ktp,$BatchID,$ProcessMonth,$ProcessYear){


// print_r($ktp."<br>".$BatchID."<br>".$ProcessMonth."<br>".$ProcessYear);


$tes = $this->db->query("SELECT * FROM SystemCCOS WHERE ProcessYear='$ProcessYear' AND ProcessMonth='$ProcessMonth' 
    AND No_Identitas='$ktp'");

// print_r($tes->num_rows());die();

if ($tes->num_rows()==0) {
//======================TIDAK ADA DI CCOS===================== 
    print_r("TIDAK ADA DI CCOS");

$cek1 = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='TIDAK ADA KARTU DI CCOS' WHERE No_Identitas='$ktp' AND BatchID='$BatchID' AND ProcessMonth='$ProcessMonth' AND ProcessYear='$ProcessYear'");
print_r("<br>"."status update".$cek1."<br>");

//======================TIDAK ADA DI CCOS===================== 
} else {
//======================ADA DI CCOS===================== 

    print_r("ADA DI CCOS"."<br>");

    $ada_ccos = $tes->result();
    $decision_date = $ada_ccos[0]->DecisionDate;

// return $decision_date[0]->DecisionDate;
$time_decision_date = strtotime($decision_date);

$d=strtotime("-6 Months");
$enam_bulan_lalu =  date("Y-m-d h:i:sa", $d) ;
$time_enam_bulan_lalu = strtotime($enam_bulan_lalu);


            // $selisih_bulan = date('Y/m/d',$time1);        
            if ($time_enam_bulan_lalu>$time_decision_date) {//kondisi 
//====================== LEBIH 6 BULAN ===================== 

                print_r($decision_date."<br>");
                print_r("LEBIH DARI 6 BULAN");

$cek2 = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='ADA KARTU DI CCOS LEBIH DARI 6 BULAN' WHERE No_Identitas='$ktp' AND BatchID='$BatchID' AND ProcessMonth='$ProcessMonth' AND ProcessYear='$ProcessYear'");
print_r("<br>"."status update".$cek2."<br>");


//====================== LEBIH 6 BULAN ===================== 
            }else{
//====================== KURANG 6 BULAN ===================== 

                print_r($decision_date."<br>");
                print_r("KURANG DARI 6 BULAN");

$cek3 = $this->db->query("UPDATE SystemCardVendor SET Status_Kartu='ADA KARTU DI CCOS KURANG DARI 6 BULAN' WHERE No_Identitas='$ktp' AND BatchID='$BatchID' AND ProcessMonth='$ProcessMonth' AND ProcessYear='$ProcessYear'");
print_r("<br>"."status update".$cek3."<br>");

//====================== KURANG 6 BULAN ===================== 

            } //kondisi end if


//======================ADA DI CCOS=====================             
}

// if ($cek1==1 || $cek2==1 || $cek3==1 ) {
    # code...
// echo "<script>
// window.close();
// </script>";

// }

}

}
//=====YANG ADA DI SystemCardVendor TIDAK ADA SI SystemCCOS==
/*
SELECT columns
FROM TableA
LEFT OUTER JOIN TableB
ON A.columnName = B.columnName
WHERE B.columnName IS NULL
*/    
// $cek1 = $this->db->query("
// SELECT * FROM SystemCardVendor a 
// LEFT OUTER JOIN SystemCCOS b ON a.No_Identitas=b.No_Identitas
// WHERE b.No_Identitas IS NULL 
// AND a.ProcessMonth='$ProcessMonth' AND a.ProcessYear='$Processyear' 
// AND b.ProcessMonth='$ProcessMonth' AND b.ProcessYear='$Processyear' 
//     ")->result();
// //-->UPDATE Stastus_kartu='TIDAK ADA KARTU DI CCOS' di SystemCardVendor 
// print_r($cek1);



//============YANG IRISAN SystemCardVendor Dan SystemCCOS=====
/*
SELECT columns
FROM TableA
INNER JOIN TableB
ON A.columnName = B.columnName;
*/
//==================ada kondisi======

// if (condition) {

// //-->UPDATE Stastus_kartu='ADA KARTU > 6 bulan' di SystemCardVendor
// }else{



// //-->UPDATE Stastus_kartu='ADA KARTU <6 bulan' di SystemCardVendor
// }






//============

/* End of file System_upload.php */
/* Location: ./application/controllers/System_upload.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-28 11:41:10 */
/* http://harviacode.com */