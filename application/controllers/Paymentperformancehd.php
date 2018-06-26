<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paymentperformancehd extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paymentperformancehd_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $paymentperformancehd = $this->Paymentperformancehd_model->get_all();

        $data = array(
            'paymentperformancehd_data' => $paymentperformancehd
        );

        $this->template->load('template','paymentperformancehd_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paymentperformancehd_model->get_by_id($id);
        if ($row) {
            $data = array(
		'SalesCenterID' => $row->SalesCenterID,
		'Month' => $row->Month,
		'Year' => $row->Year,
		'ApprovalID' => $row->ApprovalID,
		'ApprovalLevel' => $row->ApprovalLevel,
		'Approvalstatus' => $row->Approvalstatus,
	    );
            $this->template->load('template','paymentperformancehd_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentperformancehd'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paymentperformancehd/create_action'),
	    'SalesCenterID' => set_value('SalesCenterID'),
	    'Month' => set_value('Month'),
	    'Year' => set_value('Year'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'ApprovalLevel' => set_value('ApprovalLevel'),
	    'Approvalstatus' => set_value('Approvalstatus'),
	);
        $this->template->load('template','paymentperformancehd_form', $data);
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
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'Approvalstatus' => $this->input->post('Approvalstatus',TRUE),
	    );

            $this->Paymentperformancehd_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paymentperformancehd'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paymentperformancehd_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paymentperformancehd/update_action'),
		'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
		'Month' => set_value('Month', $row->Month),
		'Year' => set_value('Year', $row->Year),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'ApprovalLevel' => set_value('ApprovalLevel', $row->ApprovalLevel),
		'Approvalstatus' => set_value('Approvalstatus', $row->Approvalstatus),
	    );
            $this->template->load('template','paymentperformancehd_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentperformancehd'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('SalesCenterID', TRUE));
        } else {
            $data = array(
		'Month' => $this->input->post('Month',TRUE),
		'Year' => $this->input->post('Year',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'Approvalstatus' => $this->input->post('Approvalstatus',TRUE),
	    );

            $this->Paymentperformancehd_model->update($this->input->post('SalesCenterID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paymentperformancehd'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paymentperformancehd_model->get_by_id($id);

        if ($row) {
            $this->Paymentperformancehd_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paymentperformancehd'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paymentperformancehd'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Month', 'month', 'trim|required');
	$this->form_validation->set_rules('Year', 'year', 'trim|required');
	$this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('ApprovalLevel', 'approvallevel', 'trim|required');
	$this->form_validation->set_rules('Approvalstatus', 'approvalstatus', 'trim|required');

	$this->form_validation->set_rules('SalesCenterID', 'SalesCenterID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "paymentperformancehd.xls";
        $judul = "paymentperformancehd";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "Approvalstatus");

	foreach ($this->Paymentperformancehd_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Month);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Year);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Approvalstatus);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=paymentperformancehd.doc");

        $data = array(
            'paymentperformancehd_data' => $this->Paymentperformancehd_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('paymentperformancehd_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'paymentperformancehd_data' => $this->Paymentperformancehd_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('paymentperformancehd_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('paymentperformancehd.pdf', 'D'); 
    }

}

/* End of file Paymentperformancehd.php */
/* Location: ./application/controllers/Paymentperformancehd.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:25 */
/* http://harviacode.com */