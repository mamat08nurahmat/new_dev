<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paymentperformancedt extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paymentperformancedt_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $paymentperformancedt = $this->Paymentperformancedt_model->get_all();

        $data = array(
            'paymentperformancedt_data' => $paymentperformancedt
        );

        $this->template->load('template','paymentperformancedt_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paymentperformancedt_model->get_by_id($id);
        if ($row) {
            $data = array(
		'EmployeeID' => $row->EmployeeID,
		'Month' => $row->Month,
		'Year' => $row->Year,
		'MonthGenerate' => $row->MonthGenerate,
		'YearGenerate' => $row->YearGenerate,
		'ComponentID' => $row->ComponentID,
		'Parameter1' => $row->Parameter1,
		'Nominal' => $row->Nominal,
	    );
            $this->template->load('template','paymentperformancedt_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentperformancedt'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paymentperformancedt/create_action'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'Month' => set_value('Month'),
	    'Year' => set_value('Year'),
	    'MonthGenerate' => set_value('MonthGenerate'),
	    'YearGenerate' => set_value('YearGenerate'),
	    'ComponentID' => set_value('ComponentID'),
	    'Parameter1' => set_value('Parameter1'),
	    'Nominal' => set_value('Nominal'),
	);
        $this->template->load('template','paymentperformancedt_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Month' => $this->input->post('Month',TRUE),
		'Year' => $this->input->post('Year',TRUE),
		'MonthGenerate' => $this->input->post('MonthGenerate',TRUE),
		'YearGenerate' => $this->input->post('YearGenerate',TRUE),
		'ComponentID' => $this->input->post('ComponentID',TRUE),
		'Parameter1' => $this->input->post('Parameter1',TRUE),
		'Nominal' => $this->input->post('Nominal',TRUE),
	    );

            $this->Paymentperformancedt_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paymentperformancedt'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paymentperformancedt_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paymentperformancedt/update_action'),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'Month' => set_value('Month', $row->Month),
		'Year' => set_value('Year', $row->Year),
		'MonthGenerate' => set_value('MonthGenerate', $row->MonthGenerate),
		'YearGenerate' => set_value('YearGenerate', $row->YearGenerate),
		'ComponentID' => set_value('ComponentID', $row->ComponentID),
		'Parameter1' => set_value('Parameter1', $row->Parameter1),
		'Nominal' => set_value('Nominal', $row->Nominal),
	    );
            $this->template->load('template','paymentperformancedt_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentperformancedt'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('EmployeeID', TRUE));
        } else {
            $data = array(
		'Month' => $this->input->post('Month',TRUE),
		'Year' => $this->input->post('Year',TRUE),
		'MonthGenerate' => $this->input->post('MonthGenerate',TRUE),
		'YearGenerate' => $this->input->post('YearGenerate',TRUE),
		'ComponentID' => $this->input->post('ComponentID',TRUE),
		'Parameter1' => $this->input->post('Parameter1',TRUE),
		'Nominal' => $this->input->post('Nominal',TRUE),
	    );

            $this->Paymentperformancedt_model->update($this->input->post('EmployeeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paymentperformancedt'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paymentperformancedt_model->get_by_id($id);

        if ($row) {
            $this->Paymentperformancedt_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paymentperformancedt'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentperformancedt'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Month', 'month', 'trim|required');
	$this->form_validation->set_rules('Year', 'year', 'trim|required');
	$this->form_validation->set_rules('MonthGenerate', 'monthgenerate', 'trim|required');
	$this->form_validation->set_rules('YearGenerate', 'yeargenerate', 'trim|required');
	$this->form_validation->set_rules('ComponentID', 'componentid', 'trim|required');
	$this->form_validation->set_rules('Parameter1', 'parameter1', 'trim|required');
	$this->form_validation->set_rules('Nominal', 'nominal', 'trim|required|numeric');

	$this->form_validation->set_rules('EmployeeID', 'EmployeeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "paymentperformancedt.xls";
        $judul = "paymentperformancedt";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Month");
	xlsWriteLabel($tablehead, $kolomhead++, "Year");
	xlsWriteLabel($tablehead, $kolomhead++, "MonthGenerate");
	xlsWriteLabel($tablehead, $kolomhead++, "YearGenerate");
	xlsWriteLabel($tablehead, $kolomhead++, "ComponentID");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");

	foreach ($this->Paymentperformancedt_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Month);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Year);
	    xlsWriteNumber($tablebody, $kolombody++, $data->MonthGenerate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->YearGenerate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ComponentID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Parameter1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Nominal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=paymentperformancedt.doc");

        $data = array(
            'paymentperformancedt_data' => $this->Paymentperformancedt_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('paymentperformancedt_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'paymentperformancedt_data' => $this->Paymentperformancedt_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('paymentperformancedt_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('paymentperformancedt.pdf', 'D'); 
    }

}

/* End of file Paymentperformancedt.php */
/* Location: ./application/controllers/Paymentperformancedt.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:25 */
/* http://harviacode.com */