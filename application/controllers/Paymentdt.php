<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paymentdt extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paymentdt_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $paymentdt = $this->Paymentdt_model->get_all();

        $data = array(
            'paymentdt_data' => $paymentdt
        );

        $this->template->load('template','paymentdt_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paymentdt_model->get_by_id($id);
        if ($row) {
            $data = array(
		'EmployeeID' => $row->EmployeeID,
		'Month' => $row->Month,
		'Year' => $row->Year,
		'CardLogo' => $row->CardLogo,
		'CardType' => $row->CardType,
		'MonthGenerate' => $row->MonthGenerate,
		'YearGenerate' => $row->YearGenerate,
		'CardCount' => $row->CardCount,
	    );
            $this->template->load('template','paymentdt_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentdt'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paymentdt/create_action'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'Month' => set_value('Month'),
	    'Year' => set_value('Year'),
	    'CardLogo' => set_value('CardLogo'),
	    'CardType' => set_value('CardType'),
	    'MonthGenerate' => set_value('MonthGenerate'),
	    'YearGenerate' => set_value('YearGenerate'),
	    'CardCount' => set_value('CardCount'),
	);
        $this->template->load('template','paymentdt_form', $data);
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
		'CardLogo' => $this->input->post('CardLogo',TRUE),
		'CardType' => $this->input->post('CardType',TRUE),
		'MonthGenerate' => $this->input->post('MonthGenerate',TRUE),
		'YearGenerate' => $this->input->post('YearGenerate',TRUE),
		'CardCount' => $this->input->post('CardCount',TRUE),
	    );

            $this->Paymentdt_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paymentdt'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paymentdt_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paymentdt/update_action'),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'Month' => set_value('Month', $row->Month),
		'Year' => set_value('Year', $row->Year),
		'CardLogo' => set_value('CardLogo', $row->CardLogo),
		'CardType' => set_value('CardType', $row->CardType),
		'MonthGenerate' => set_value('MonthGenerate', $row->MonthGenerate),
		'YearGenerate' => set_value('YearGenerate', $row->YearGenerate),
		'CardCount' => set_value('CardCount', $row->CardCount),
	    );
            $this->template->load('template','paymentdt_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentdt'));
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
		'CardLogo' => $this->input->post('CardLogo',TRUE),
		'CardType' => $this->input->post('CardType',TRUE),
		'MonthGenerate' => $this->input->post('MonthGenerate',TRUE),
		'YearGenerate' => $this->input->post('YearGenerate',TRUE),
		'CardCount' => $this->input->post('CardCount',TRUE),
	    );

            $this->Paymentdt_model->update($this->input->post('EmployeeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paymentdt'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paymentdt_model->get_by_id($id);

        if ($row) {
            $this->Paymentdt_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paymentdt'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentdt'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Month', 'month', 'trim|required');
	$this->form_validation->set_rules('Year', 'year', 'trim|required');
	$this->form_validation->set_rules('CardLogo', 'cardlogo', 'trim|required');
	$this->form_validation->set_rules('CardType', 'cardtype', 'trim|required');
	$this->form_validation->set_rules('MonthGenerate', 'monthgenerate', 'trim|required');
	$this->form_validation->set_rules('YearGenerate', 'yeargenerate', 'trim|required');
	$this->form_validation->set_rules('CardCount', 'cardcount', 'trim|required');

	$this->form_validation->set_rules('EmployeeID', 'EmployeeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "paymentdt.xls";
        $judul = "paymentdt";
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
	xlsWriteLabel($tablehead, $kolomhead++, "CardLogo");
	xlsWriteLabel($tablehead, $kolomhead++, "CardType");
	xlsWriteLabel($tablehead, $kolomhead++, "MonthGenerate");
	xlsWriteLabel($tablehead, $kolomhead++, "YearGenerate");
	xlsWriteLabel($tablehead, $kolomhead++, "CardCount");

	foreach ($this->Paymentdt_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Month);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Year);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CardLogo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CardType);
	    xlsWriteNumber($tablebody, $kolombody++, $data->MonthGenerate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->YearGenerate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CardCount);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=paymentdt.doc");

        $data = array(
            'paymentdt_data' => $this->Paymentdt_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('paymentdt_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'paymentdt_data' => $this->Paymentdt_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('paymentdt_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('paymentdt.pdf', 'D'); 
    }

}

/* End of file Paymentdt.php */
/* Location: ./application/controllers/Paymentdt.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:24 */
/* http://harviacode.com */