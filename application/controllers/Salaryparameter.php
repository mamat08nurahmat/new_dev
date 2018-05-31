<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salaryparameter extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Salaryparameter_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $salaryparameter = $this->Salaryparameter_model->get_all();

        $data = array(
            'salaryparameter_data' => $salaryparameter
        );

        $this->template->load('template','salaryparameter_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Salaryparameter_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ParameterID' => $row->ParameterID,
		'UserGroupID' => $row->UserGroupID,
		'EmployeeGrade' => $row->EmployeeGrade,
		'EmployeeStatus' => $row->EmployeeStatus,
		'ComponentID' => $row->ComponentID,
		'StartDate' => $row->StartDate,
		'EndDate' => $row->EndDate,
		'TargetTypeID' => $row->TargetTypeID,
		'Product1' => $row->Product1,
		'Product2' => $row->Product2,
		'Param1' => $row->Param1,
		'Param2' => $row->Param2,
		'Nominal' => $row->Nominal,
		'IsMultiplier' => $row->IsMultiplier,
		'IsBasicSalary' => $row->IsBasicSalary,
	    );
            $this->template->load('template','salaryparameter_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('salaryparameter'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('salaryparameter/create_action'),
	    'ParameterID' => set_value('ParameterID'),
	    'UserGroupID' => set_value('UserGroupID'),
	    'EmployeeGrade' => set_value('EmployeeGrade'),
	    'EmployeeStatus' => set_value('EmployeeStatus'),
	    'ComponentID' => set_value('ComponentID'),
	    'StartDate' => set_value('StartDate'),
	    'EndDate' => set_value('EndDate'),
	    'TargetTypeID' => set_value('TargetTypeID'),
	    'Product1' => set_value('Product1'),
	    'Product2' => set_value('Product2'),
	    'Param1' => set_value('Param1'),
	    'Param2' => set_value('Param2'),
	    'Nominal' => set_value('Nominal'),
	    'IsMultiplier' => set_value('IsMultiplier'),
	    'IsBasicSalary' => set_value('IsBasicSalary'),
	);
        $this->template->load('template','salaryparameter_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'ComponentID' => $this->input->post('ComponentID',TRUE),
		'StartDate' => $this->input->post('StartDate',TRUE),
		'EndDate' => $this->input->post('EndDate',TRUE),
		'TargetTypeID' => $this->input->post('TargetTypeID',TRUE),
		'Product1' => $this->input->post('Product1',TRUE),
		'Product2' => $this->input->post('Product2',TRUE),
		'Param1' => $this->input->post('Param1',TRUE),
		'Param2' => $this->input->post('Param2',TRUE),
		'Nominal' => $this->input->post('Nominal',TRUE),
		'IsMultiplier' => $this->input->post('IsMultiplier',TRUE),
		'IsBasicSalary' => $this->input->post('IsBasicSalary',TRUE),
	    );

            $this->Salaryparameter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('salaryparameter'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Salaryparameter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('salaryparameter/update_action'),
		'ParameterID' => set_value('ParameterID', $row->ParameterID),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
		'EmployeeGrade' => set_value('EmployeeGrade', $row->EmployeeGrade),
		'EmployeeStatus' => set_value('EmployeeStatus', $row->EmployeeStatus),
		'ComponentID' => set_value('ComponentID', $row->ComponentID),
		'StartDate' => set_value('StartDate', $row->StartDate),
		'EndDate' => set_value('EndDate', $row->EndDate),
		'TargetTypeID' => set_value('TargetTypeID', $row->TargetTypeID),
		'Product1' => set_value('Product1', $row->Product1),
		'Product2' => set_value('Product2', $row->Product2),
		'Param1' => set_value('Param1', $row->Param1),
		'Param2' => set_value('Param2', $row->Param2),
		'Nominal' => set_value('Nominal', $row->Nominal),
		'IsMultiplier' => set_value('IsMultiplier', $row->IsMultiplier),
		'IsBasicSalary' => set_value('IsBasicSalary', $row->IsBasicSalary),
	    );
            $this->template->load('template','salaryparameter_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('salaryparameter'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ParameterID', TRUE));
        } else {
            $data = array(
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'ComponentID' => $this->input->post('ComponentID',TRUE),
		'StartDate' => $this->input->post('StartDate',TRUE),
		'EndDate' => $this->input->post('EndDate',TRUE),
		'TargetTypeID' => $this->input->post('TargetTypeID',TRUE),
		'Product1' => $this->input->post('Product1',TRUE),
		'Product2' => $this->input->post('Product2',TRUE),
		'Param1' => $this->input->post('Param1',TRUE),
		'Param2' => $this->input->post('Param2',TRUE),
		'Nominal' => $this->input->post('Nominal',TRUE),
		'IsMultiplier' => $this->input->post('IsMultiplier',TRUE),
		'IsBasicSalary' => $this->input->post('IsBasicSalary',TRUE),
	    );

            $this->Salaryparameter_model->update($this->input->post('ParameterID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('salaryparameter'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Salaryparameter_model->get_by_id($id);

        if ($row) {
            $this->Salaryparameter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('salaryparameter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('salaryparameter'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('UserGroupID', 'usergroupid', 'trim|required');
	$this->form_validation->set_rules('EmployeeGrade', 'employeegrade', 'trim|required');
	$this->form_validation->set_rules('EmployeeStatus', 'employeestatus', 'trim|required');
	$this->form_validation->set_rules('ComponentID', 'componentid', 'trim|required');
	$this->form_validation->set_rules('StartDate', 'startdate', 'trim|required');
	$this->form_validation->set_rules('EndDate', 'enddate', 'trim|required');
	$this->form_validation->set_rules('TargetTypeID', 'targettypeid', 'trim|required');
	$this->form_validation->set_rules('Product1', 'product1', 'trim|required');
	$this->form_validation->set_rules('Product2', 'product2', 'trim|required');
	$this->form_validation->set_rules('Param1', 'param1', 'trim|required|numeric');
	$this->form_validation->set_rules('Param2', 'param2', 'trim|required|numeric');
	$this->form_validation->set_rules('Nominal', 'nominal', 'trim|required|numeric');
	$this->form_validation->set_rules('IsMultiplier', 'ismultiplier', 'trim|required');
	$this->form_validation->set_rules('IsBasicSalary', 'isbasicsalary', 'trim|required');

	$this->form_validation->set_rules('ParameterID', 'ParameterID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "salaryparameter.xls";
        $judul = "salaryparameter";
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
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeGrade");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "ComponentID");
	xlsWriteLabel($tablehead, $kolomhead++, "StartDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EndDate");
	xlsWriteLabel($tablehead, $kolomhead++, "TargetTypeID");
	xlsWriteLabel($tablehead, $kolomhead++, "Product1");
	xlsWriteLabel($tablehead, $kolomhead++, "Product2");
	xlsWriteLabel($tablehead, $kolomhead++, "Param1");
	xlsWriteLabel($tablehead, $kolomhead++, "Param2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "IsMultiplier");
	xlsWriteLabel($tablehead, $kolomhead++, "IsBasicSalary");

	foreach ($this->Salaryparameter_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeGrade);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ComponentID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->StartDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->TargetTypeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Product1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Product2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Param1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Param2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Nominal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsMultiplier);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsBasicSalary);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=salaryparameter.doc");

        $data = array(
            'salaryparameter_data' => $this->Salaryparameter_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('salaryparameter_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'salaryparameter_data' => $this->Salaryparameter_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('salaryparameter_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('salaryparameter.pdf', 'D'); 
    }

}

/* End of file Salaryparameter.php */
/* Location: ./application/controllers/Salaryparameter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:26 */
/* http://harviacode.com */