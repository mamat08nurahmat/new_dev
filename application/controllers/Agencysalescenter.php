<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agencysalescenter extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agencysalescenter_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $agencysalescenter = $this->Agencysalescenter_model->get_all();

        $data = array(
            'agencysalescenter_data' => $agencysalescenter
        );

        $this->template->load('template','agencysalescenter_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Agencysalescenter_model->get_by_id($id);
        if ($row) {
            $data = array(
		'SalesCenterID' => $row->SalesCenterID,
		'AgencyID' => $row->AgencyID,
		'AreaID' => $row->AreaID,
		'CityID' => $row->CityID,
		'AsuradurID' => $row->AsuradurID,
		'SourceData' => $row->SourceData,
		'SalesCenterCode' => $row->SalesCenterCode,
		'SalesCenterName' => $row->SalesCenterName,
		'StreetAddress' => $row->StreetAddress,
		'VillageAddress' => $row->VillageAddress,
		'SubDistrictAddress' => $row->SubDistrictAddress,
		'CityAddress' => $row->CityAddress,
		'PostalCode' => $row->PostalCode,
		'PhoneNumber' => $row->PhoneNumber,
		'FaxNumber' => $row->FaxNumber,
		'EmailAddress' => $row->EmailAddress,
		'IsActive' => $row->IsActive,
		'ActiveDate' => $row->ActiveDate,
		'Enddate' => $row->Enddate,
		'ReasonEnd' => $row->ReasonEnd,
	    );
            $this->template->load('template','agencysalescenter_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agencysalescenter'));
        }
    }

    public function create() 
    {


		$query_agency = $this->db->query("SELECT * FROM Agency")->result();
		$query_area = $this->db->query("SELECT * FROM Area")->result();
$sc_code = $this->Agencysalescenter_model->getNewSalesCenterCode();

        $data = array(
            'button' => 'Create',
            'action' => site_url('agencysalescenter/create_action'),
	    'SalesCenterID' => set_value('SalesCenterID'),
	    'AgencyID' => set_value('AgencyID'),
	    'AreaID' => set_value('AreaID'),
	    'CityID' => set_value('CityID'),
	    'AsuradurID' => set_value('AsuradurID'),
	    'SourceData' => set_value('SourceData'),
	    'SalesCenterCode' => set_value('SalesCenterCode'),
	    'SalesCenterName' => set_value('SalesCenterName'),
	    'StreetAddress' => set_value('StreetAddress'),
	    'VillageAddress' => set_value('VillageAddress'),
	    'SubDistrictAddress' => set_value('SubDistrictAddress'),
	    'CityAddress' => set_value('CityAddress'),
	    'PostalCode' => set_value('PostalCode'),
	    'PhoneNumber' => set_value('PhoneNumber'),
	    'FaxNumber' => set_value('FaxNumber'),
	    'EmailAddress' => set_value('EmailAddress'),
	    'IsActive' => set_value('IsActive'),
	    'ActiveDate' => set_value('ActiveDate'),
	    'Enddate' => set_value('Enddate'),
	    'ReasonEnd' => set_value('ReasonEnd'),

	    'query_agency' => $query_agency,
	    'query_area' => $query_area,
	    'sc_code' => $sc_code,

	);
        $this->template->load('template','agencysalescenter_form', $data);
    }
    
    public function create_action() 
    {

    	// print_r($_POST);die();


            $data = array(
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
		'CityID' => $this->input->post('CityID',TRUE),
		// 'AsuradurID' => $this->input->post('AsuradurID',TRUE),
		// 'SourceData' => $this->input->post('SourceData',TRUE),
		'SalesCenterCode' => $this->input->post('SalesCenterCode',TRUE),
		'SalesCenterName' => $this->input->post('SalesCenterName',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		// 'VillageAddress' => $this->input->post('VillageAddress',TRUE),
		// 'SubDistrictAddress' => $this->input->post('SubDistrictAddress',TRUE),
		// 'CityAddress' => $this->input->post('CityAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'FaxNumber' => $this->input->post('FaxNumber',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		// 'IsActive' => $this->input->post('IsActive',TRUE),
		// 'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		// 'Enddate' => $this->input->post('Enddate',TRUE),
		// 'ReasonEnd' => $this->input->post('ReasonEnd',TRUE),

		'Provinsi' => $this->input->post('Provinsi',TRUE),
		'Kabupaten' => $this->input->post('Kabupaten',TRUE),
		'Kecamatan' => $this->input->post('Kecamatan',TRUE),
		'Kelurahan' => $this->input->post('Kelurahan',TRUE),
	    );

            $this->Agencysalescenter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agencysalescenter'));


/*
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
		'CityID' => $this->input->post('CityID',TRUE),
		'AsuradurID' => $this->input->post('AsuradurID',TRUE),
		'SourceData' => $this->input->post('SourceData',TRUE),
		'SalesCenterCode' => $this->input->post('SalesCenterCode',TRUE),
		'SalesCenterName' => $this->input->post('SalesCenterName',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		'VillageAddress' => $this->input->post('VillageAddress',TRUE),
		'SubDistrictAddress' => $this->input->post('SubDistrictAddress',TRUE),
		'CityAddress' => $this->input->post('CityAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'FaxNumber' => $this->input->post('FaxNumber',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'Enddate' => $this->input->post('Enddate',TRUE),
		'ReasonEnd' => $this->input->post('ReasonEnd',TRUE),
	    );

            $this->Agencysalescenter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agencysalescenter'));
        }
*/    	
    }
    
    public function update($id) 
    {
        $row = $this->Agencysalescenter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agencysalescenter/update_action'),
		'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
		'AgencyID' => set_value('AgencyID', $row->AgencyID),
		'AreaID' => set_value('AreaID', $row->AreaID),
		'CityID' => set_value('CityID', $row->CityID),
		'AsuradurID' => set_value('AsuradurID', $row->AsuradurID),
		'SourceData' => set_value('SourceData', $row->SourceData),
		'SalesCenterCode' => set_value('SalesCenterCode', $row->SalesCenterCode),
		'SalesCenterName' => set_value('SalesCenterName', $row->SalesCenterName),
		'StreetAddress' => set_value('StreetAddress', $row->StreetAddress),
		'VillageAddress' => set_value('VillageAddress', $row->VillageAddress),
		'SubDistrictAddress' => set_value('SubDistrictAddress', $row->SubDistrictAddress),
		'CityAddress' => set_value('CityAddress', $row->CityAddress),
		'PostalCode' => set_value('PostalCode', $row->PostalCode),
		'PhoneNumber' => set_value('PhoneNumber', $row->PhoneNumber),
		'FaxNumber' => set_value('FaxNumber', $row->FaxNumber),
		'EmailAddress' => set_value('EmailAddress', $row->EmailAddress),
		'IsActive' => set_value('IsActive', $row->IsActive),
		'ActiveDate' => set_value('ActiveDate', $row->ActiveDate),
		'Enddate' => set_value('Enddate', $row->Enddate),
		'ReasonEnd' => set_value('ReasonEnd', $row->ReasonEnd),
	    );
            $this->template->load('template','agencysalescenter_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agencysalescenter'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('SalesCenterID', TRUE));
        } else {
            $data = array(
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
		'CityID' => $this->input->post('CityID',TRUE),
		'AsuradurID' => $this->input->post('AsuradurID',TRUE),
		'SourceData' => $this->input->post('SourceData',TRUE),
		'SalesCenterCode' => $this->input->post('SalesCenterCode',TRUE),
		'SalesCenterName' => $this->input->post('SalesCenterName',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		'VillageAddress' => $this->input->post('VillageAddress',TRUE),
		'SubDistrictAddress' => $this->input->post('SubDistrictAddress',TRUE),
		'CityAddress' => $this->input->post('CityAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'FaxNumber' => $this->input->post('FaxNumber',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'Enddate' => $this->input->post('Enddate',TRUE),
		'ReasonEnd' => $this->input->post('ReasonEnd',TRUE),
	    );

            $this->Agencysalescenter_model->update($this->input->post('SalesCenterID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agencysalescenter'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agencysalescenter_model->get_by_id($id);

        if ($row) {
            $this->Agencysalescenter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agencysalescenter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agencysalescenter'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('AgencyID', 'agencyid', 'trim|required');
	$this->form_validation->set_rules('AreaID', 'areaid', 'trim|required');
	$this->form_validation->set_rules('CityID', 'cityid', 'trim|required');
	$this->form_validation->set_rules('AsuradurID', 'asuradurid', 'trim|required');
	$this->form_validation->set_rules('SourceData', 'sourcedata', 'trim|required');
	$this->form_validation->set_rules('SalesCenterCode', 'salescentercode', 'trim|required');
	$this->form_validation->set_rules('SalesCenterName', 'salescentername', 'trim|required');
	$this->form_validation->set_rules('StreetAddress', 'streetaddress', 'trim|required');
	$this->form_validation->set_rules('VillageAddress', 'villageaddress', 'trim|required');
	$this->form_validation->set_rules('SubDistrictAddress', 'subdistrictaddress', 'trim|required');
	$this->form_validation->set_rules('CityAddress', 'cityaddress', 'trim|required');
	$this->form_validation->set_rules('PostalCode', 'postalcode', 'trim|required');
	$this->form_validation->set_rules('PhoneNumber', 'phonenumber', 'trim|required');
	$this->form_validation->set_rules('FaxNumber', 'faxnumber', 'trim|required');
	$this->form_validation->set_rules('EmailAddress', 'emailaddress', 'trim|required');
	$this->form_validation->set_rules('IsActive', 'isactive', 'trim|required');
	$this->form_validation->set_rules('ActiveDate', 'activedate', 'trim|required');
	$this->form_validation->set_rules('Enddate', 'enddate', 'trim|required');
	$this->form_validation->set_rules('ReasonEnd', 'reasonend', 'trim|required');

	$this->form_validation->set_rules('SalesCenterID', 'SalesCenterID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "agencysalescenter.xls";
        $judul = "agencysalescenter";
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
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyID");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaID");
	xlsWriteLabel($tablehead, $kolomhead++, "CityID");
	xlsWriteLabel($tablehead, $kolomhead++, "AsuradurID");
	xlsWriteLabel($tablehead, $kolomhead++, "SourceData");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterCode");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterName");
	xlsWriteLabel($tablehead, $kolomhead++, "StreetAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "VillageAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "SubDistrictAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "CityAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "PostalCode");
	xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "FaxNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "EmailAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "IsActive");
	xlsWriteLabel($tablehead, $kolomhead++, "ActiveDate");
	xlsWriteLabel($tablehead, $kolomhead++, "Enddate");
	xlsWriteLabel($tablehead, $kolomhead++, "ReasonEnd");

	foreach ($this->Agencysalescenter_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AgencyID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AreaID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CityID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AsuradurID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SourceData);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SalesCenterCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SalesCenterName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->StreetAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->VillageAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SubDistrictAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CityAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PostalCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FaxNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmailAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IsActive);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ActiveDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Enddate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ReasonEnd);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=agencysalescenter.doc");

        $data = array(
            'agencysalescenter_data' => $this->Agencysalescenter_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('agencysalescenter_doc',$data);
    }

// ======================\

	public function getSalesCenterCode(){
		// POST data
		$postData = $this->input->post();
$data = $this->hash_kode($postData);
		// $data = $this->model_app_user->getCity($postData);

		echo json_encode($data);
	}


	public function hash_kode($postData){
	// public function hash_kode(){

    //parameter
//===post dari data ajax ketika change combo box
$area=$postData['area_id'];
// $area=1;
//-------------

    $now1 = explode(' ', microtime());
$now= $now1[1] ;
//print_r($now);die();  
    // $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $charset = "ABCDEFGHJKLMNPRTVWXYZ0123456789";
  $base = strlen($charset);
  $result = '';

  while ($now >= $base){
    $i = $now % $base;
    $result = $charset[$i] . $result;
    $now /= $base;
  }
  
//  return substr($result, -3);
    $hash = substr($result, -1);

// print_r($hash);die();
    $cek = $this->db->query("
    	SELECT 
    	a.SalesCenterCode,
    	b.AreaCode 
    	FROM AgencySalesCenter a
    	JOIN Area b ON a.AreaID=b.AreaID 
    	WHERE a.AreaID='$area'  ")->result();    

 $kode_area=$cek[0]->AreaCode;
// print_r($kode_area);die();

    foreach($cek as $kode){
 // 2 digit   array
   // $kode_ada[]=$kode->SalesCenterCode;
    

     $kode=$kode->SalesCenterCode;
    // $kode_area = substr($kode,0,1);
    // $kode_area= $kode[0]->AreaCode;
// 
//1 digit array    
    $kode_belakang[] = substr($kode,1,1);

    //echo $kode_ada;
    //echo"<br>";
}

// print_r($kode_area);
// print_r('<br>');
// print_r($hash);
// print_r('<br>');
// print_r($kode_belakang);

// die();

//print_r($kode_ada);die();

if (in_array($hash, $kode_belakang)){
// $new_code = $hash =$this->getNewSalesCenterCode();          
$new_code = $hash =$this->hash_kode();          
  //echo "Match found";
}else{
$new_code =$kode_area."".$hash;     
  //echo "Match not found";
  }


return	  $new_code;
    
}

// -----

//---- ajaxc change select
	public function getCity(){
		$postData = $this->input->post();

		$data = $this->Agencysalescenter_model->getCity($postData);

		echo json_encode($data);
	}	

//------	
//ajax change select area get city

	public function getKota(){

	$post_data = $this->input->post();
	$area_id = $post_data['area_id'];
$data = $this->db->query("SELECT CityID,CityName FROM City WHERE AreaID='$area_id'")->result_array();
 // $data = $this->model_sales_center->getCity($post_data);
	echo json_encode($data);
	// echo json_encode($area_id);

	}




}

/* End of file Agencysalescenter.php */
/* Location: ./application/controllers/Agencysalescenter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-04 04:56:36 */
/* http://harviacode.com */