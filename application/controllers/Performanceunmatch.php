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

    function pdf()
    {
        $data = array(
            'performanceunmatch_data' => $this->Performanceunmatch_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('performanceunmatch_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('performanceunmatch.pdf', 'D'); 
    }

}

/* End of file Performanceunmatch.php */
/* Location: ./application/controllers/Performanceunmatch.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:26 */
/* http://harviacode.com */