<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agency extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agency_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $agency = $this->Agency_model->get_all();

        $data = array(
            'agency_data' => $agency
        );

        $this->template->load('template','agency_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Agency_model->get_by_id($id);
        if ($row) {
            $data = array(
    'AgencyID' => $row->AgencyID,
    'AgencyName' => $row->AgencyName,
    'StreetAddress' => $row->StreetAddress,
    'VillageAddress' => $row->VillageAddress,
    'SubDistrictAddress' => $row->SubDistrictAddress,
    'PostalCode' => $row->PostalCode,
    'CityAddress' => $row->CityAddress,
    'PhoneNumber' => $row->PhoneNumber,
    'FaxNumber' => $row->FaxNumber,
    'EmailAddress' => $row->EmailAddress,
    'Status' => $row->Status,
    'ActiveDate' => $row->ActiveDate,
    'EndDate' => $row->EndDate,
    'IsActive' => $row->IsActive,
    'UserType' => $row->UserType,
      );
            $this->template->load('template','agency_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agency'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agency/create_action'),
      'AgencyID' => set_value('AgencyID'),
      'AgencyName' => set_value('AgencyName'),
      'StreetAddress' => set_value('StreetAddress'),
      'VillageAddress' => set_value('VillageAddress'),
      'SubDistrictAddress' => set_value('SubDistrictAddress'),
      'PostalCode' => set_value('PostalCode'),
      'CityAddress' => set_value('CityAddress'),
      'PhoneNumber' => set_value('PhoneNumber'),
      'FaxNumber' => set_value('FaxNumber'),
      'EmailAddress' => set_value('EmailAddress'),
      'Status' => set_value('Status'),
      'ActiveDate' => set_value('ActiveDate'),
      'EndDate' => set_value('EndDate'),
      'IsActive' => set_value('IsActive'),
      'UserType' => set_value('UserType'),
  );
        $this->template->load('template','agency_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    'AgencyName' => $this->input->post('AgencyName',TRUE),
    'StreetAddress' => $this->input->post('StreetAddress',TRUE),
    'VillageAddress' => $this->input->post('VillageAddress',TRUE),
    'SubDistrictAddress' => $this->input->post('SubDistrictAddress',TRUE),
    'PostalCode' => $this->input->post('PostalCode',TRUE),
    'CityAddress' => $this->input->post('CityAddress',TRUE),
    'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
    'FaxNumber' => $this->input->post('FaxNumber',TRUE),
    'EmailAddress' => $this->input->post('EmailAddress',TRUE),
    'Status' => $this->input->post('Status',TRUE),
    'ActiveDate' => $this->input->post('ActiveDate',TRUE),
    'EndDate' => $this->input->post('EndDate',TRUE),
    'IsActive' => $this->input->post('IsActive',TRUE),
    'UserType' => $this->input->post('UserType',TRUE),
      );

            $this->Agency_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agency'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agency_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agency/update_action'),
    'AgencyID' => set_value('AgencyID', $row->AgencyID),
    'AgencyName' => set_value('AgencyName', $row->AgencyName),
    'StreetAddress' => set_value('StreetAddress', $row->StreetAddress),
    'VillageAddress' => set_value('VillageAddress', $row->VillageAddress),
    'SubDistrictAddress' => set_value('SubDistrictAddress', $row->SubDistrictAddress),
    'PostalCode' => set_value('PostalCode', $row->PostalCode),
    'CityAddress' => set_value('CityAddress', $row->CityAddress),
    'PhoneNumber' => set_value('PhoneNumber', $row->PhoneNumber),
    'FaxNumber' => set_value('FaxNumber', $row->FaxNumber),
    'EmailAddress' => set_value('EmailAddress', $row->EmailAddress),
    'Status' => set_value('Status', $row->Status),
    'ActiveDate' => set_value('ActiveDate', $row->ActiveDate),
    'EndDate' => set_value('EndDate', $row->EndDate),
    'IsActive' => set_value('IsActive', $row->IsActive),
    'UserType' => set_value('UserType', $row->UserType),
      );
            $this->template->load('template','agency_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agency'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('AgencyID', TRUE));
        } else {
            $data = array(
    'AgencyName' => $this->input->post('AgencyName',TRUE),
    'StreetAddress' => $this->input->post('StreetAddress',TRUE),
    'VillageAddress' => $this->input->post('VillageAddress',TRUE),
    'SubDistrictAddress' => $this->input->post('SubDistrictAddress',TRUE),
    'PostalCode' => $this->input->post('PostalCode',TRUE),
    'CityAddress' => $this->input->post('CityAddress',TRUE),
    'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
    'FaxNumber' => $this->input->post('FaxNumber',TRUE),
    'EmailAddress' => $this->input->post('EmailAddress',TRUE),
    'Status' => $this->input->post('Status',TRUE),
    'ActiveDate' => $this->input->post('ActiveDate',TRUE),
    'EndDate' => $this->input->post('EndDate',TRUE),
    'IsActive' => $this->input->post('IsActive',TRUE),
    'UserType' => $this->input->post('UserType',TRUE),
      );

            $this->Agency_model->update($this->input->post('AgencyID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agency'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agency_model->get_by_id($id);

        if ($row) {
            $this->Agency_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agency'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agency'));
        }
    }

    public function _rules() 
    {
  $this->form_validation->set_rules('AgencyName', 'agencyname', 'trim|required');
  $this->form_validation->set_rules('StreetAddress', 'streetaddress', 'trim|required');
  $this->form_validation->set_rules('VillageAddress', 'villageaddress', 'trim|required');
  $this->form_validation->set_rules('SubDistrictAddress', 'subdistrictaddress', 'trim|required');
  $this->form_validation->set_rules('PostalCode', 'postalcode', 'trim|required');
  $this->form_validation->set_rules('CityAddress', 'cityaddress', 'trim|required');
  $this->form_validation->set_rules('PhoneNumber', 'phonenumber', 'trim|required');
  $this->form_validation->set_rules('FaxNumber', 'faxnumber', 'trim|required');
  $this->form_validation->set_rules('EmailAddress', 'emailaddress', 'trim|required');
  $this->form_validation->set_rules('Status', 'status', 'trim|required');
  $this->form_validation->set_rules('ActiveDate', 'activedate', 'trim|required');
  $this->form_validation->set_rules('EndDate', 'enddate', 'trim|required');
  $this->form_validation->set_rules('IsActive', 'isactive', 'trim|required');
  $this->form_validation->set_rules('UserType', 'usertype', 'trim|required');

  $this->form_validation->set_rules('AgencyID', 'AgencyID', 'trim');
  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "agency.xls";
        $judul = "agency";
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
  xlsWriteLabel($tablehead, $kolomhead++, "AgencyName");
  xlsWriteLabel($tablehead, $kolomhead++, "StreetAddress");
  xlsWriteLabel($tablehead, $kolomhead++, "VillageAddress");
  xlsWriteLabel($tablehead, $kolomhead++, "SubDistrictAddress");
  xlsWriteLabel($tablehead, $kolomhead++, "PostalCode");
  xlsWriteLabel($tablehead, $kolomhead++, "CityAddress");
  xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber");
  xlsWriteLabel($tablehead, $kolomhead++, "FaxNumber");
  xlsWriteLabel($tablehead, $kolomhead++, "EmailAddress");
  xlsWriteLabel($tablehead, $kolomhead++, "Status");
  xlsWriteLabel($tablehead, $kolomhead++, "ActiveDate");
  xlsWriteLabel($tablehead, $kolomhead++, "EndDate");
  xlsWriteLabel($tablehead, $kolomhead++, "IsActive");
  xlsWriteLabel($tablehead, $kolomhead++, "UserType");

  foreach ($this->Agency_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteLabel($tablebody, $kolombody++, $data->AgencyName);
      xlsWriteLabel($tablebody, $kolombody++, $data->StreetAddress);
      xlsWriteLabel($tablebody, $kolombody++, $data->VillageAddress);
      xlsWriteLabel($tablebody, $kolombody++, $data->SubDistrictAddress);
      xlsWriteLabel($tablebody, $kolombody++, $data->PostalCode);
      xlsWriteLabel($tablebody, $kolombody++, $data->CityAddress);
      xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber);
      xlsWriteLabel($tablebody, $kolombody++, $data->FaxNumber);
      xlsWriteLabel($tablebody, $kolombody++, $data->EmailAddress);
      xlsWriteNumber($tablebody, $kolombody++, $data->Status);
      xlsWriteLabel($tablebody, $kolombody++, $data->ActiveDate);
      xlsWriteLabel($tablebody, $kolombody++, $data->EndDate);
      xlsWriteLabel($tablebody, $kolombody++, $data->IsActive);
      xlsWriteLabel($tablebody, $kolombody++, $data->UserType);

      $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=agency.doc");

        $data = array(
            'agency_data' => $this->Agency_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('agency_doc',$data);
    }



//dev

public function get_ajax_PostalCode(){
  $cari = $_GET['cari'];

$output="";
$output.='
      <tr><td>CityAddress </td>
            <td><input type="text" class="form-control" name="CityAddress" id="CityAddress" placeholder="CityAddress" value="" />
        </td>


      <tr><td>CityAddress </td>
            <td><input type="text" class="form-control" name="CityAddress" id="CityAddress" placeholder="CityAddress" value="" />
        </td>


      <tr><td>CityAddress </td>
            <td><input type="text" class="form-control" name="CityAddress" id="CityAddress" placeholder="CityAddress" value="" />
        </td>


';

echo $output;

}
//  public function get_ajax($cari){
  public function get_ajax(){
  $cari = $_GET['cari'];

$kode_pos = $this->db->query("SELECT * FROM kode_pos WHERE kodepos='$cari'");
/*
if($kode_pos->num_rows()==1){
$result = $kode_pos->result();
}else{
$result = $kode_pos->result();
//print_r('lebih dari 1');
}
*/
/*
//$kelurahan = array();
//print_r($kode_pos->result());die();
  $output ="";
  $output.="<select name='kelurahan'>";
foreach($kode_pos->result() as $datas){
  
//$kelurahan[]=  $datas->kelurahan; 

  $output.="<option value='".$datas->kelurahan."' >".$datas->kelurahan."<option>";
}
  $output.="</select'>";

echo $output;
*/
//foreach($kelurahan as $xxxx){ 
//  echo $xxxx->kelurahan;
//}
//print_r($kelurahan);die();
//=============================
//  $output.=' <div class="form-row"> ';

if ($kode_pos->num_rows()>0) {
  # code...


foreach($kode_pos->result() as $datas){  
  $output="";
$output.='

        <div class="form-group col-md-3">
          <label>Provinsi</label>
          <input type="text" class="form-control" name="provinsi" id="provinsi" value="'.$datas->provinsi.'" readonly>
        </div>
  ';        
$output.='
        <div class="form-group col-md-3">
          <label>Kabupaten / Kota</label>
          <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="'.$datas->kabupaten.'" readonly>
        </div>
  ';        
$output.='
        <div class="form-group col-md-3">
          <label>Kecamatan</label>
          <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="'.$datas->kecamatan.'" readonly>
        </div>

  ';

}




  $output.='

        <div class="form-group col-md-3">
          <label>Kelurahan / Desa</label>
          <select class="form-control" name="keluranan" id="keluranan">
';
foreach($kode_pos->result() as $datas){  
$output.='          
            <option value="'.$datas->kelurahan.'">'.$datas->kelurahan.'</option>
  ';
}
$output.='  
          </select>
        </div>
 ';     


  //$output.="</div>";



/*

foreach($kode_pos->result() as $datas){
  


  $output="";
  $output.="<input type='text' name='provinsi' value='".$datas->provinsi."'>";
  $output.="<input type='text' name='kabupaten' value='".$datas->kabupaten."'>";
  $output.="<input type='text' name='kecamatan' value='".$datas->kecamatan."'>";
//if($)  
//  foreach($datas->kelurahan as $x){
    
  //$output.="<input type='text' id='kelurahan' value='".$x->kelurahan."'>";
//  }
/////$output.="<input type='text' name='kelurahan' value=''>";

//   $output.="<select name='kelurahan'>";
// foreach($datas->kelurahan as $xxxx){
  
//   $output.="<option value='".$xxxx->kelurahan."' >".$xxxx->kelurahan."<option>";
// }
//   $output.="</select'>";

  
  
}
//  $output ="";
  $output.="<select name='kelurahan'>";
foreach($kode_pos->result() as $datas){
  
//$kelurahan[]=  $datas->kelurahan; 

  $output.="<option value='".$datas->kelurahan."' >".$datas->kelurahan."</option>";
}
  $output.="</select'>";


*/

} else {
  $output="";
$output.='

        <div class="form-group col-md-12">
          <label>KODE POS SALAH</label>
        </div>
  ';        
}
  
  
  
  
  echo $output;
  
/*
*/  
  
    //$kode_pos = $this->input->post();
    
    //echo json_encode($kode_pos);
    
  }


}

/* End of file Agency.php */
/* Location: ./application/controllers/Agency.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 09:39:32 */
/* http://harviacode.com */