<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemcardlink extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('System_Upload_model');
        $this->load->model('Systemcardlink_model');
        $this->load->library('form_validation');
    }


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


public function baca_kartu(){

$ApplicationType='B';
$SourceCode='N006BJELMNCP100000';
//$this->jenis_kartu($ApplicationType,$card_code);
print_r($this->jenis_kartu($ApplicationType,$SourceCode));die();

//$sc = $this->sourcecode('N006BJELMNCP100000');



/*
Array
(
    [CHANNEL] => N
    [CARD_CODE] => 0
    [SALES_CENTER_CODE_OR_BNI_REGION_CODE] => 06
    [AGENT_CODE_OR_BRANCH_CODE] => BJE
    [PROGRAM_CODE] => LMN
    [GIMMICK_CODE] => CP1
    [PRIVATE_LABEL_CODE] => 00
    [ISSUER_CODE] => 0
    [SBK_CODE] => 0
    [ACCOUNT_MAINTENANCE_CODE] => 0
    [PROMO_CODE] => 
    [FITUR_CODE] => 
)
*/
//$sc_CHANNEL = $sc['CHANNEL'];

//$chanel = $this->db->query("SELECT * FROM SourceCodeDetail WHERE SourceCode='$sc_CHANNEL' AND CodeGroupID='1'")->row();
//print_r($chanel);

//print_r($sc['CHANNEL']);


}


//get BatchID from SystemUpload    
public function get_batchid($Month,$Year){

// print_r($Month.'-'.$Year);
$BatchID = $this->db->query("SELECT * FROM System_Upload WHERE ProcessMonth='$Month' AND ProcessYear='$Year'")->result();
//SystemUpload_dev
print_r($BatchID);
//view batch

    }

//get BatchID AND RowID from SystemCardlink    
public function generate_performance($BatchID){
// public function get_batchid_and_rowid($BatchID){

// print_r($Month.'-'.$Year); 
$BatchID_AND_RowID = $this->db->query("SELECT BatchID,count(RowID)as jumlah_row FROM Systemcardlink WHERE BatchID='$BatchID'
GROUP BY BatchID")->result();
//Systemcardlink_dev??


//view batch generate

        $data = array(
            'BatchID' => $BatchID_AND_RowID[0]->BatchID,
            'jumlah_row' => $BatchID_AND_RowID[0]->jumlah_row,
        );

// print_r($data);die();


//        $this->template->load('template','systemcardlink_list', $data);
        $this->load->view('systemcardlink_generate_batch', $data);
  



    }


    public function proses_performancedetail_tes(){

        echo "okkkkk";
    }


// public function test_generate($counter,$BatchID){
public function test_generate(){

$BatchID = $_POST['BatchID'] ;
$RowID = $_POST['counter'] ;

//insert
$result = $this->proses_performancedetail($BatchID,$RowID);

echo json_encode(array(
    // "BatchID" => $BatchID,
    // "RowID" => $RowID,
    // "status" => TRUE,
    "result" => $result,
));    
}

    public function tes_proses_performancedetail($BatchID,$RowID){

        return  "MATCH_BattchID_".$BatchID."_RowID_".$RowID;

    }

// !!! DELETE BatchID 76
    public function delete_batch($BatchID){

print_r("PerformanceDetail  ==> ".$this->db->query("DELETE FROM PerformanceDetail WHERE BatchID='$BatchID' "));
print_r("PerformanceUnMatch  ===> ".$this->db->query("DELETE FROM PerformanceUnMatch WHERE BatchID='$BatchID' "));

    }
//dev===
    public function proses_performancedetail($BatchID,$RowID){
    


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
$SourceCode = $Systemcardlink->SourceCode ;
$data_soure_code = $this->sourcecode($SourceCode);

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


$cek_insert = $this->db->insert('PerformanceDetail',$data_performancedetail);
// $result = array('result' => $cek_insert, );
// print_r($data_performancedetail);
// print_r($this->db->insert('PerformanceDetail',$data_performancedetail));

// echo "MATCH";
// exmpl 72/17
//insert batch per BatchID AND RowID

//unmatch???? exmp:72/1        
return "MATCH_BattchID_".$BatchID."_RowID_".$RowID;
// echo "MATCH_BattchID_".$BatchID."_RowID_".$RowID;
//if MATCH===============================================================
}else{    
//unmatck masuk tabel perfounmatchunmatch

$ApplicationSource      ='CardLink';
// $BatchID                ='1';
// $RowID                  ='4';
$Month                  =$SystemUpload->ProcessMonth;  
$Year                   =$SystemUpload->ProcessYear;    
// $EmployeeID             ='12345';
$OldSourceCode          =$Systemcardlink->SourceCode;  
$NewSourceCode          ='';

// $date=date_create("2013-03-15");
// $ProposedDate = date_format($date,"Y/m/d H:i:s");
//$ProposedDate         =data;  
// $Remark                 ='xxxxx';
// $ProposedBy             ='345345';
// $ApprovalID             ='234324';
// $IsGenerateCorrection ='xxxx'; 

$data_unmatch = array(
'ApplicationSource' => $ApplicationSource ,
'BatchID'           => $BatchID,
'RowID'             => $RowID,
'Month'             => $Month,
'Year'              => $Year,
// 'EmployeeID'        => $EmployeeID,
'OldSourceCode'     => $OldSourceCode,
// 'NewSourceCode'     => $NewSourceCode,
// 'Remark'            => $Remark,
// 'ProposedDate'      => $ProposedDate,
// 'ProposedBy'        => $ProposedBy,
// 'ApprovalID'        => $ApprovalID,
 'IsGenerateCorrection' => FALSE,
);

// print_r($this->db->insert('PerformanceUnMatch',$data_unmatch));
// echo "unmatch";


$cek_insert = $this->db->insert('PerformanceUnMatch',$data_unmatch);
// $result = array(  'result' => TRUE, );
return "UNMATCH_BattchID_".$BatchID."_RowID_".$RowID;
// echo "UNMATCH_BattchID_".$BatchID."_RowID_".$RowID;


//if UNMATCH=============================================================
}

// die();

    }


function tes_performancedetail(){


$ApplicationSource  ='CardLink';
$BatchID            ='123';
$RowID              ='9';
// $AsOfDate           ='';
$CustomerName       ='AAA';
//$CustomerBirthDate    =;
$Parameter1       ='';
$Parameter2       ='';
$Parameter3       ='';
$Parameter4       ='';
$Parameter5       ='';
$Parameter6       ='';
$Parameter7       ='';
$Parameter8       ='';
$Parameter9       ='';
$Parameter10      ='';
$Parameter11      ='';
$Parameter12      ='';
$Parameter13      ='';
$Parameter14      ='';
$Parameter15      ='';




$data_performancedetail = array(



//======
'ApplicationSource'=> $ApplicationSource ,
'BatchID'          => $BatchID           ,
'RowID'            => $RowID             ,
// 'AsOfDate'         => $AsOfDate         ,
'CustomerName'     => $CustomerName     ,
// 'CustomerBirthDate'=> $CustomerBirthDate ,
// 'Parameter1'       => $Parameter1       ,
// 'Parameter2'       => $Parameter2       ,
// 'Parameter3'       => $Parameter3       ,
// 'Parameter4'       => $Parameter4       ,
// 'Parameter5'       => $Parameter5       ,
// 'Parameter6'       => $Parameter6       ,
// 'Parameter7'       => $Parameter7       ,
// 'Parameter8'       => $Parameter8       ,
// 'Parameter9'       => $Parameter9       ,
// 'Parameter10'      => $Parameter10      ,
// 'Parameter11'      => $Parameter11      ,
// 'Parameter12'      => $Parameter12      ,
// 'Parameter13'      => $Parameter13      ,
// 'Parameter14'      => $Parameter14      ,
// 'Parameter15'      => $Parameter15      ,


);      

print_r($this->db->insert('PerformanceDetail',$data_performancedetail));


// print_r($data_performancedetail);

    
}



function tes_unmatch(){


$ApplicationSource      ='CardLink';
$BatchID                ='1';
$RowID                  ='4';
$Month                  ='12';  
$Year                   ='2019';    
$EmployeeID             ='12345';
$OldSourceCode          ='798HJK7868JBKJ';  
$NewSourceCode          ='KJHU98789HKHJ';   
$date=date_create("2013-03-15");
$ProposedDate = date_format($date,"Y/m/d H:i:s");
//$ProposedDate         =data;  
$Remark                 ='xxxxx';
$ProposedBy             ='345345';
$ApprovalID             ='234324';
$IsGenerateCorrection ='xxxx'; 

$data_unmatch = array(
'ApplicationSource' => $ApplicationSource ,
'BatchID'           => $BatchID,
'RowID'             => $RowID,
'Month'             => $Month,
'Year'              => $Year,
'EmployeeID'        => $EmployeeID,
'OldSourceCode'     => $OldSourceCode,
'NewSourceCode'     => $NewSourceCode,
'Remark'            => $Remark,
'ProposedDate'      => $ProposedDate,
'ProposedBy'        => $ProposedBy,
'ApprovalID'        => $ApprovalID,
// 'IsGenerateCorrection' => $IsGenerateCorrection,
);

print_r($this->db->insert('PerformanceUnMatch',$data_unmatch));
}


    //=====
/*
    public function index()
    {
        // $systemcardlink = $this->Systemcardlink_model->get_all();
        $systemcardlink = $this->db->query("SELECT TOP 1000 * FROM Systemcardlink ")->result();

        $data = array(
            'systemcardlink_data' => $systemcardlink
        );

        $this->template->load('template','systemcardlink_list', $data);
    }
*/	

    public function index()
    {
		
//        $system_upload = $this->System_upload_model->get_all_cardlink();
	$system_upload = $this->db->query("SELECT * FROM System_Upload Where ApplicationSource='SystemCardlink'")->result();
//print_r($)
        $data = array(
            'system_upload_data' => $system_upload
        );

        $this->template->load('template','system_upload_list', $data);
    }



//get by batchID	
    public function by_batch($BatchID)
    {
        // $systemcardlink = $this->Systemcardlink_model->get_all();
         $systemcardlink = $this->Systemcardlink_model->get_all_by_batch($BatchID);
//        $systemcardlink = $this->db->query("SELECT  * FROM Systemcardlink WHERE BatchID='$BatchID' ")->result();

        $data = array(
            'systemcardlink_data' => $systemcardlink
        );

        $this->template->load('template','systemcardlink_list', $data);
    }

	
//get by month year
    public function by_m_y($M,$Y)
    {
        // $systemcardlink = $this->Systemcardlink_model->get_all();
    $BatchID = $this->Systemcardlink_model->get_all_by_m_y($M,$Y);
	$BatchID = $BatchID[0]->BatchID;		 
//print_r($BatchID);die();		 
         $systemcardlink = $this->Systemcardlink_model->get_all_by_batch($BatchID);

$M=$this->uri->segment(3);
$Y=$this->uri->segment(4);
		 
$link_excel='systemcardlink/excel/'.$M.'/'.$Y;
		 
        $data = array(
            'systemcardlink_data' => $systemcardlink,
	//		'M' => $M,
	//		'Y' => $Y
			'link_excel' => $link_excel
        );

        $this->template->load('template','systemcardlink_list', $data);
/*
*/		
//		$this->by_batch($BatchID);
    }


	
	
    public function read($id) 
    {
        $row = $this->Systemcardlink_model->get_by_id($id);
        if ($row) {
            $data = array(
        'BatchID' => $row->BatchID,
        'RowID' => $row->RowID,
        'OpenDate' => $row->OpenDate,
        'SourceCode' => $row->SourceCode,
        'CustomerNumber' => $row->CustomerNumber,
        'CustomerName' => $row->CustomerName,
        'CustomerBirthDate' => $row->CustomerBirthDate,
        'ORG' => $row->ORG,
        'Logo' => $row->Logo,
        'EmpReffCode' => $row->EmpReffCode,
        'BlockCard' => $row->BlockCard,
        'ApplicationType' => $row->ApplicationType,
        );
            $this->template->load('template','systemcardlink_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemcardlink'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('systemcardlink/create_action'),
        'BatchID' => set_value('BatchID'),
        'RowID' => set_value('RowID'),
        'OpenDate' => set_value('OpenDate'),
        'SourceCode' => set_value('SourceCode'),
        'CustomerNumber' => set_value('CustomerNumber'),
        'CustomerName' => set_value('CustomerName'),
        'CustomerBirthDate' => set_value('CustomerBirthDate'),
        'ORG' => set_value('ORG'),
        'Logo' => set_value('Logo'),
        'EmpReffCode' => set_value('EmpReffCode'),
        'BlockCard' => set_value('BlockCard'),
        'ApplicationType' => set_value('ApplicationType'),
    );
        $this->template->load('template','systemcardlink_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'BatchID' => $this->input->post('BatchID',TRUE),
        'OpenDate' => $this->input->post('OpenDate',TRUE),
        'SourceCode' => $this->input->post('SourceCode',TRUE),
        'CustomerNumber' => $this->input->post('CustomerNumber',TRUE),
        'CustomerName' => $this->input->post('CustomerName',TRUE),
        'CustomerBirthDate' => $this->input->post('CustomerBirthDate',TRUE),
        'ORG' => $this->input->post('ORG',TRUE),
        'Logo' => $this->input->post('Logo',TRUE),
        'EmpReffCode' => $this->input->post('EmpReffCode',TRUE),
        'BlockCard' => $this->input->post('BlockCard',TRUE),
        'ApplicationType' => $this->input->post('ApplicationType',TRUE),
        );

            $this->Systemcardlink_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('systemcardlink'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Systemcardlink_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('systemcardlink/update_action'),
        'BatchID' => set_value('BatchID', $row->BatchID),
        'RowID' => set_value('RowID', $row->RowID),
        'OpenDate' => set_value('OpenDate', $row->OpenDate),
        'SourceCode' => set_value('SourceCode', $row->SourceCode),
        'CustomerNumber' => set_value('CustomerNumber', $row->CustomerNumber),
        'CustomerName' => set_value('CustomerName', $row->CustomerName),
        'CustomerBirthDate' => set_value('CustomerBirthDate', $row->CustomerBirthDate),
        'ORG' => set_value('ORG', $row->ORG),
        'Logo' => set_value('Logo', $row->Logo),
        'EmpReffCode' => set_value('EmpReffCode', $row->EmpReffCode),
        'BlockCard' => set_value('BlockCard', $row->BlockCard),
        'ApplicationType' => set_value('ApplicationType', $row->ApplicationType),
        );
            $this->template->load('template','systemcardlink_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemcardlink'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('RowID', TRUE));
        } else {
            $data = array(
        'BatchID' => $this->input->post('BatchID',TRUE),
        'OpenDate' => $this->input->post('OpenDate',TRUE),
        'SourceCode' => $this->input->post('SourceCode',TRUE),
        'CustomerNumber' => $this->input->post('CustomerNumber',TRUE),
        'CustomerName' => $this->input->post('CustomerName',TRUE),
        'CustomerBirthDate' => $this->input->post('CustomerBirthDate',TRUE),
        'ORG' => $this->input->post('ORG',TRUE),
        'Logo' => $this->input->post('Logo',TRUE),
        'EmpReffCode' => $this->input->post('EmpReffCode',TRUE),
        'BlockCard' => $this->input->post('BlockCard',TRUE),
        'ApplicationType' => $this->input->post('ApplicationType',TRUE),
        );

            $this->Systemcardlink_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('systemcardlink'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Systemcardlink_model->get_by_id($id);

        if ($row) {
            $this->Systemcardlink_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('systemcardlink'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemcardlink'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
    $this->form_validation->set_rules('OpenDate', 'opendate', 'trim|required');
    $this->form_validation->set_rules('SourceCode', 'sourcecode', 'trim|required');
    $this->form_validation->set_rules('CustomerNumber', 'customernumber', 'trim|required');
    $this->form_validation->set_rules('CustomerName', 'customername', 'trim|required');
    $this->form_validation->set_rules('CustomerBirthDate', 'customerbirthdate', 'trim|required');
    $this->form_validation->set_rules('ORG', 'org', 'trim|required');
    $this->form_validation->set_rules('Logo', 'logo', 'trim|required');
    $this->form_validation->set_rules('EmpReffCode', 'empreffcode', 'trim|required');
    $this->form_validation->set_rules('BlockCard', 'blockcard', 'trim|required');
    $this->form_validation->set_rules('ApplicationType', 'applicationtype', 'trim|required');

    $this->form_validation->set_rules('RowID', 'RowID', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel($M,$Y)
    {
		
//by month year uri segment
//$m = $this->uri->segment(2);
//print_r($m);die();

//get batchid		
    $BatchID = $this->Systemcardlink_model->get_all_by_m_y($M,$Y);
	$BatchID = $BatchID[0]->BatchID;	
//print_r($BatchID);die();		

        $this->load->helper('exportexcel');
        $namaFile = "systemcardlink.xls";
        $judul = "systemcardlink";
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
    xlsWriteLabel($tablehead, $kolomhead++, "OpenDate");
    xlsWriteLabel($tablehead, $kolomhead++, "SourceCode");
    xlsWriteLabel($tablehead, $kolomhead++, "CustomerNumber");
    xlsWriteLabel($tablehead, $kolomhead++, "CustomerName");
    xlsWriteLabel($tablehead, $kolomhead++, "CustomerBirthDate");
    xlsWriteLabel($tablehead, $kolomhead++, "ORG");
    xlsWriteLabel($tablehead, $kolomhead++, "Logo");
    xlsWriteLabel($tablehead, $kolomhead++, "EmpReffCode");
    xlsWriteLabel($tablehead, $kolomhead++, "BlockCard");
    xlsWriteLabel($tablehead, $kolomhead++, "ApplicationType");

    foreach ($this->Systemcardlink_model->get_all_by_batch($BatchID) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
        xlsWriteLabel($tablebody, $kolombody++, $data->OpenDate);
        xlsWriteLabel($tablebody, $kolombody++, $data->SourceCode);
        xlsWriteLabel($tablebody, $kolombody++, $data->CustomerNumber);
        xlsWriteLabel($tablebody, $kolombody++, $data->CustomerName);
        xlsWriteLabel($tablebody, $kolombody++, $data->CustomerBirthDate);
        xlsWriteNumber($tablebody, $kolombody++, $data->ORG);
        xlsWriteNumber($tablebody, $kolombody++, $data->Logo);
        xlsWriteLabel($tablebody, $kolombody++, $data->EmpReffCode);
        xlsWriteLabel($tablebody, $kolombody++, $data->BlockCard);
        xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationType);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=systemcardlink.doc");

        $data = array(
            'systemcardlink_data' => $this->Systemcardlink_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('systemcardlink_doc',$data);
    }

}

/* End of file Systemcardlink.php */
/* Location: ./application/controllers/Systemcardlink.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-16 04:06:23 */
/* http://harviacode.com */