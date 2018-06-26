
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performanceunmatch extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performanceunmatch_model');
        $this->load->library('form_validation');
    }
//====================================================================================	
//get BatchID AND RowID from SystemCardlink    
public function generate_performance($M,$Y){
// public function get_batchid_and_rowid($BatchID){

// print_r($Month.'-'.$Year); 
$BatchID_AND_RowID = $this->db->query("SELECT BatchID,RowID FROM Performanceunmatch WHERE Month='$M' AND Year='$Y'")->result();
//Systemcardlink_dev??


//view batch generate

        $data = array(
            'BatchID_AND_RowID' => $BatchID_AND_RowID,
//            'BatchID' => $BatchID_AND_RowID[0]->BatchID,
//            'jumlah_row' => $BatchID_AND_RowID[0]->jumlah_row,
        );

 print_r($data);die();


//        $this->template->load('template','systemcardlink_list', $data);
        $this->load->view('systemcardlink_generate_batch', $data);
    }


public function proses_performancedetail($BatchID,$RowID){
    

$Performanceunmatch = $this->db->query("SELECT * FROM Performanceunmatch WHERE BatchID='$BatchID' AND RowID='$RowID'")->result();

$SystemUpload = $this->db->query("SELECT ApplicationSource,ProcessMonth,ProcessYear FROM system_upload WHERE BatchID='$BatchID'")->row() ; //??system_upload //SystemUpload_dev

$Systemcardlink = $this->db->query("SELECT 
OpenDate,
SourceCode,
CustomerNumber,
CustomerName,
CustomerBirthDate,
ORG,
Logo,
EmpReffCode,
BlockCard,
ApplicationType 
    FROM Systemcardlink WHERE BatchID='$BatchID' AND RowID='$RowID'")->row() ; //Systemcardlink_dev

// print_r($Systemcardlink);die();
//source code


$SourceCode = $Performanceunmatch[0]->NewSourceCode ; ///dari data unmatch
$data_soure_code = $this->sourcecode($SourceCode);

//print_r($data_soure_code);die();

$employee_new_code =$data_soure_code['AGENT_CODE_OR_BRANCH_CODE'];

$Employee1 = $this->db->query("SELECT a.*,b.*,c.* FROM Employee a
LEFT JOIN AppUserGroup b on a.UserGroupID=b.UserGroupID
LEFT JOIN AgencySalesCenter c on a.SalesCenterID=c.SalesCenterID
 WHERE EmployeeNewCode='$employee_new_code' AND IsDiscontinued='0'") ;


$match =$Employee1->num_rows() ;
$Employee =$Employee1->row() ;

$org = $Systemcardlink->ORG;
$logo = $Systemcardlink->Logo;
$cardlogo = $this->db->query("SELECT * FROM CardLogo WHERE Logo='$logo' AND Org='$org' ")->row() ;

//print_r($match);die();
//jika $match==1
//IS MATCH?????+==========================================================
if($match==1){

// echo "match";


$Product1=$cardlogo->Product1;
$Product2=$cardlogo->Product2;
$Program=$cardlogo->Program;

$ApplicationType=$Systemcardlink->ApplicationType;
//$SourceCode=$Systemcardlink->SourceCode;

 $SourceCode = $Systemcardlink->SourceCode ;
 $data_soure_code = $this->sourcecode($SourceCode);
 $card_code =$data_soure_code['CARD_CODE'];


//print_r($ApplicationType);
//print_r($SourceCode);
$jk = $this->jenis_kartu($ApplicationType,$card_code);
$AreaID = $Employee->AreaID;
// print_r($AreaID);
//print_r($jk);
 // die();
//print_r($cardlogo);

// print_r($SystemUpload); //???system_upload
// print_r($Systemcardlink);
//========================================================================================
$ApplicationSource =$SystemUpload->ApplicationSource;
//$BatchID          = '99999' ;
//$RowID            = '99999' ;
// $AsOfDate         = '99999' ;
$AsOfDate         = $Systemcardlink->OpenDate ;
$CustomerName     = $Systemcardlink->CustomerName ;
$CustomerBirthDate= $Systemcardlink->CustomerBirthDate ;

$Parameter1       = $Employee->UserType ; //UserTypeGroup (DS/Staff/Tele/Other)

$Parameter2       = $SourceCode ; //SourceCode
$Parameter3       = $data_soure_code['CHANNEL']; //Channel (Reference : Table UserTypeChannel)
$Parameter4       = $data_soure_code['SBK_CODE']; ; //Kode SBK (Reference : Table Area (AreaCode))
$Parameter5       = $data_soure_code['SALES_CENTER_CODE_OR_BNI_REGION_CODE'] ; //Kode SalesCenter (Reference : Table AgencySalesCenter (SalesCenterCode))
$Parameter6       = $employee_new_code ; //Kode Sales (Reference : Table Employee (EmployeeNewCode))
$Parameter7       = $Systemcardlink->EmpReffCode ; //EmpReffCode - NPP Pegawai BNI (Reference : Table Ref_FTE (NPP))
$Parameter8       = $Product1 ; //Logo Kartu (Reference : CardLogo) //Product1 dari CardLogo Where Logo ? and logo ?
$Parameter9       = $Product1 ; //Produk Kartu (Reference : CardLogo) //Product1 dari CardLogo Where Logo ? and logo ?
$Parameter10      = $Program ; //Program Kartu (Reference : CardLogo) //Program dari CardLogo Where Logo ? and logo ?
$Parameter11      = 'A' ; //Status (Always 'A' For CardLink)
$Parameter12      = $Systemcardlink->BlockCard ; //Block Kartu
$Parameter13      = $AreaID ; //AreaTargetID (Reference : Table AreaTarget) -> For Use In Dashboard
$Parameter14      = $Systemcardlink->ApplicationType ; //Jenis Applikasi (B : Basic , S : Supplement)
$Parameter15      = $jk ; //Jenis Kartu (NTB , XSELL, ADDON)    
        
        
        
$data_performancedetail = array(


//======
'ApplicationSource'=> $ApplicationSource ,
'BatchID'          => $BatchID           ,
'RowID'            => $RowID             ,
'AsOfDate'         => $AsOfDate         ,
'CustomerName'     => $CustomerName     ,
'CustomerBirthDate'=> $CustomerBirthDate ,
'Parameter1'       => $Parameter1       ,
'Parameter2'       => $Parameter2       ,
'Parameter3'       => $Parameter3       ,
'Parameter4'       => $Parameter4       ,
'Parameter5'       => $Parameter5       ,
'Parameter6'       => $Parameter6       ,
'Parameter7'       => $Parameter7       ,
'Parameter8'       => $Parameter8       ,
'Parameter9'       => $Parameter9       ,
'Parameter10'      => $Parameter10      ,
'Parameter11'      => $Parameter11      ,
'Parameter12'      => $Parameter12      ,
'Parameter13'      => $Parameter13      ,
'Parameter14'      => $Parameter14      ,
'Parameter15'      => $Parameter15      ,


);      

// print_r($data_performancedetail);die();

$cek_insert = $this->db->insert('PerformanceDetail',$data_performancedetail);
$data_performanceunmatch = array(
'IsGenerateCorrection'=>TRUE,
);
$key = array(
'BatchID'=>$BatchID,
'RowID'=>$RowID,
);

$cek_update = $this->db->update('PerformanceUnMatch',$data_performanceunmatch,$key);
//update performanceunmatch
//$this->db->query('UPDATE PerformanceUnMatch set IsGenerateCorrection=1 WHERE BatchID='$BatchID' AND RowID='$RowID'')->result();

// $result = array('result' => $cek_insert, );
// print_r($this->db->insert('PerformanceDetail',$data_performancedetail));

// echo "MATCH";
// exmpl 72/17
//insert batch per BatchID AND RowID
if($cek_insert==1){
	echo'
	<script>
	alert("Data Approveed");
    window.history.back();	
	</script>';
}
//unmatch???? exmp:72/1        
//return "MATCH_BattchID_".$BatchID."_RowID_".$RowID;
// echo "MATCH_BattchID_".$BatchID."_RowID_".$RowID;
//if MATCH===============================================================
}else{    
//unmatck masuk tabel perfounmatchunmatch


return "UNMATCH_BattchID_";
// echo "UNMATCH_BattchID_".$BatchID."_RowID_".$RowID;


//if UNMATCH=============================================================
}

// die();

    }
	
//===============================================================================
//dev======

/*
CodeGroupID   CodeGroupName             StartDigit  EndDigit    Remark
1   CHANNEL                                 1       1           Channel Penjualan
2   CARD CODE                               2       2           Kode Sistem Kartu Utama Baru (0) atau artu ke-n (9)
3   SALES CENTER CODE / BNI REGION CODE     3       4           Kode Agency/Sales Center atau Kode Kantor Wilayah BNI
4   AGENT CODE / BRANCH CODE                5       7           Kode Pemasar atau Sales Agency (DSR/TSR) atau Kode Cabang untuk Program Staff
5   PROGRAM CODE                            8       10          Kode identifikasi program atau Kode Jenis Kartu Co Branding/ Affinity/ Private Label/ Commercial Card
6   GIMMICK CODE                            11      13          Kode gimmick otomasi, contoh : pemberian free annual fee
7   PRIVATE LABEL CODE                      14      15          Kode Corporate Client/ Dealer / Person In Charge Pre Embossed
8   ISSUER CODE                             16      16          Kode Issuer lain program card for card atau kode dual card
9   SBK CODE                                17      17          Kode Kantor Wilayah proses persetujuan Kartu Kredit BNI
10  ACCOUNT MAINTENANCE CODE                18      18          Kode Account Maintenance kartu Change Logo atau Re Issue
11  PROMO CODE                              19      21          Kode Event / Spot/ Kantor Layanan/ Kantor Kas BNI untuk penjualan Kartu Kredit BNI
12  FITUR CODE                              22      23          Kode penjuaan fitur Kartu Kredit BNI
*/    

//menbaca sourcecode
public function sourcecode($sourcecode){
// public function sourcecode(){
// $sourcecode='R000BSKHOGCP200000000';


$sc = str_split($sourcecode);
$code_group1 =$sc[0]; //
$code_group2 =$sc[1]; //
$code_group3 =$sc[2].$sc[3]; //
$code_group4 =$sc[4].$sc[5].$sc[6]; //
$code_group5 =$sc[7].$sc[8].$sc[9]; //
$code_group6 =$sc[10].$sc[11].$sc[12]; //
$code_group7 =$sc[13].$sc[14]; //
$code_group8 =$sc[15]; //
$code_group9 =$sc[16]; //
$code_group10 =$sc[17]; //
$sc[18] = isset($sc[18]) ? $sc[18] : null;
$sc[19] = isset($sc[19]) ? $sc[19] : null;
$sc[20] = isset($sc[20]) ? $sc[20] : null;
$sc[21] = isset($sc[21]) ? $sc[21] : null;
$sc[22] = isset($sc[22]) ? $sc[22] : null;
$code_group11 =$sc[18].$sc[19].$sc[20]; //
$code_group12 =$sc[21].$sc[22]; //




$sc_detail = array(
'CHANNEL'                              => $code_group1, 
'CARD_CODE'                            => $code_group2, 
'SALES_CENTER_CODE_OR_BNI_REGION_CODE' => $code_group3, 
'AGENT_CODE_OR_BRANCH_CODE'            => $code_group4, //EmployeeNewCode
'PROGRAM_CODE'                         => $code_group5,
'GIMMICK_CODE'                         => $code_group6, 
'PRIVATE_LABEL_CODE'                   => $code_group7,
'ISSUER_CODE'                          => $code_group8, 
'SBK_CODE'                             => $code_group9, 
'ACCOUNT_MAINTENANCE_CODE'             => $code_group10, 
'PROMO_CODE'                           => $code_group11,                          
'FITUR_CODE'                           => $code_group12,                          


);

// print_r($sc_detail);

return $sc_detail;

}

public function jenis_kartu($ApplicationType,$card_code){
//ADDON/NTB/XSELL


if($ApplicationType=='S'){
//SUPLEMENT (S) 
    return 'ADDON';
}else{
//BASIC (B)
    if($card_code=='0'){
    return 'NTB';        
    }else{
    return 'XSELL';              
    }
    
}

}
	
//====================================================================================	
    public function index()
    {
        $performanceunmatch = $this->Performanceunmatch_model->get_all();

        $data = array(
            'performanceunmatch_data' => $performanceunmatch
        );

        $this->template->load('template','performanceunmatch_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Performanceunmatch_model->get_by_id($id);
        if ($row) {
            $data = array(
		'RowID' => $row->RowID,
		'ApplicationSource' => $row->ApplicationSource,
		'BatchID' => $row->BatchID,
		'Month' => $row->Month,
		'Year' => $row->Year,
		'EmployeeID' => $row->EmployeeID,
		'OldSourceCode' => $row->OldSourceCode,
		'NewSourceCode' => $row->NewSourceCode,
		'Remark' => $row->Remark,
		'ProposedDate' => $row->ProposedDate,
		'ProposedBy' => $row->ProposedBy,
		'ApprovalID' => $row->ApprovalID,
		'IsGenerateCorrection' => $row->IsGenerateCorrection,
	    );
            $this->template->load('template','performanceunmatch_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceunmatch'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('performanceunmatch/create_action'),
	    'RowID' => set_value('RowID'),
	    'ApplicationSource' => set_value('ApplicationSource'),
	    'BatchID' => set_value('BatchID'),
	    'Month' => set_value('Month'),
	    'Year' => set_value('Year'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'OldSourceCode' => set_value('OldSourceCode'),
	    'NewSourceCode' => set_value('NewSourceCode'),
	    'Remark' => set_value('Remark'),
	    'ProposedDate' => set_value('ProposedDate'),
	    'ProposedBy' => set_value('ProposedBy'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'IsGenerateCorrection' => set_value('IsGenerateCorrection'),
	);
        $this->template->load('template','performanceunmatch_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'BatchID' => $this->input->post('BatchID',TRUE),
		'Month' => $this->input->post('Month',TRUE),
		'Year' => $this->input->post('Year',TRUE),
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
		'OldSourceCode' => $this->input->post('OldSourceCode',TRUE),
		'NewSourceCode' => $this->input->post('NewSourceCode',TRUE),
		'Remark' => $this->input->post('Remark',TRUE),
		'ProposedDate' => $this->input->post('ProposedDate',TRUE),
		'ProposedBy' => $this->input->post('ProposedBy',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'IsGenerateCorrection' => $this->input->post('IsGenerateCorrection',TRUE),
	    );

            $this->Performanceunmatch_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('performanceunmatch'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Performanceunmatch_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('performanceunmatch/update_action'),
		'RowID' => set_value('RowID', $row->RowID),
		'ApplicationSource' => set_value('ApplicationSource', $row->ApplicationSource),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'Month' => set_value('Month', $row->Month),
		'Year' => set_value('Year', $row->Year),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'OldSourceCode' => set_value('OldSourceCode', $row->OldSourceCode),
		'NewSourceCode' => set_value('NewSourceCode', $row->NewSourceCode),
		'Remark' => set_value('Remark', $row->Remark),
		'ProposedDate' => set_value('ProposedDate', $row->ProposedDate),
		'ProposedBy' => set_value('ProposedBy', $row->ProposedBy),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'IsGenerateCorrection' => set_value('IsGenerateCorrection', $row->IsGenerateCorrection),
	    );
            $this->template->load('template','performanceunmatch_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceunmatch'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('RowID', TRUE));
        } else {
            $data = array(
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'BatchID' => $this->input->post('BatchID',TRUE),
		'Month' => $this->input->post('Month',TRUE),
		'Year' => $this->input->post('Year',TRUE),
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
		'OldSourceCode' => $this->input->post('OldSourceCode',TRUE),
		'NewSourceCode' => $this->input->post('NewSourceCode',TRUE),
		'Remark' => $this->input->post('Remark',TRUE),
		'ProposedDate' => $this->input->post('ProposedDate',TRUE),
		'ProposedBy' => $this->input->post('ProposedBy',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'IsGenerateCorrection' => $this->input->post('IsGenerateCorrection',TRUE),
	    );

            $this->Performanceunmatch_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('performanceunmatch'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Performanceunmatch_model->get_by_id($id);

        if ($row) {
            $this->Performanceunmatch_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('performanceunmatch'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceunmatch'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ApplicationSource', 'applicationsource', 'trim|required');
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('Month', 'month', 'trim|required');
	$this->form_validation->set_rules('Year', 'year', 'trim|required');
	$this->form_validation->set_rules('EmployeeID', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('OldSourceCode', 'oldsourcecode', 'trim|required');
	$this->form_validation->set_rules('NewSourceCode', 'newsourcecode', 'trim|required');
	$this->form_validation->set_rules('Remark', 'remark', 'trim|required');
	$this->form_validation->set_rules('ProposedDate', 'proposeddate', 'trim|required');
	$this->form_validation->set_rules('ProposedBy', 'proposedby', 'trim|required');
	$this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('IsGenerateCorrection', 'isgeneratecorrection', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "performanceunmatch.xls";
        $judul = "performanceunmatch";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ApplicationSource");
	xlsWriteLabel($tablehead, $kolomhead++, "BatchID");
	xlsWriteLabel($tablehead, $kolomhead++, "Month");
	xlsWriteLabel($tablehead, $kolomhead++, "Year");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeID");
	xlsWriteLabel($tablehead, $kolomhead++, "OldSourceCode");
	xlsWriteLabel($tablehead, $kolomhead++, "NewSourceCode");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");
	xlsWriteLabel($tablehead, $kolomhead++, "ProposedDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ProposedBy");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "IsGenerateCorrection");

	foreach ($this->Performanceunmatch_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationSource);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Month);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Year);
	    xlsWriteNumber($tablebody, $kolombody++, $data->EmployeeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->OldSourceCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NewSourceCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Remark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ProposedDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProposedBy);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IsGenerateCorrection);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=performanceunmatch.doc");

        $data = array(
            'performanceunmatch_data' => $this->Performanceunmatch_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('performanceunmatch_doc',$data);
    }

}

/* End of file Performanceunmatch.php */
/* Location: ./application/controllers/Performanceunmatch.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-28 06:53:35 */
/* http://harviacode.com */