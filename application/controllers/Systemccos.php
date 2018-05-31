<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemccos extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Systemccos_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $systemccos = $this->Systemccos_model->get_all();

        $data = array(
            'systemccos_data' => $systemccos
        );

        $this->template->load('template','systemccos_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Systemccos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'BatchID' => $row->BatchID,
		'RowID' => $row->RowID,
		'DecisionDate' => $row->DecisionDate,
		'SourceCode' => $row->SourceCode,
		'CustomerName' => $row->CustomerName,
		'CustomerBirthDate' => $row->CustomerBirthDate,
		'ORG' => $row->ORG,
		'Logo' => $row->Logo,
		'EmpReffCode' => $row->EmpReffCode,
		'Status' => $row->Status,
		'DeclineCode' => $row->DeclineCode,
		'ApplicationType' => $row->ApplicationType,
		'ProcessMonth' => $row->ProcessMonth,
		'ProcessYear' => $row->ProcessYear,
		'No_Identitas' => $row->No_Identitas,
	    );
            $this->template->load('template','systemccos_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemccos'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('systemccos/create_action'),
	    'BatchID' => set_value('BatchID'),
	    'RowID' => set_value('RowID'),
	    'DecisionDate' => set_value('DecisionDate'),
	    'SourceCode' => set_value('SourceCode'),
	    'CustomerName' => set_value('CustomerName'),
	    'CustomerBirthDate' => set_value('CustomerBirthDate'),
	    'ORG' => set_value('ORG'),
	    'Logo' => set_value('Logo'),
	    'EmpReffCode' => set_value('EmpReffCode'),
	    'Status' => set_value('Status'),
	    'DeclineCode' => set_value('DeclineCode'),
	    'ApplicationType' => set_value('ApplicationType'),
	    'ProcessMonth' => set_value('ProcessMonth'),
	    'ProcessYear' => set_value('ProcessYear'),
	    'No_Identitas' => set_value('No_Identitas'),
	);
        $this->template->load('template','systemccos_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'DecisionDate' => $this->input->post('DecisionDate',TRUE),
		'SourceCode' => $this->input->post('SourceCode',TRUE),
		'CustomerName' => $this->input->post('CustomerName',TRUE),
		'CustomerBirthDate' => $this->input->post('CustomerBirthDate',TRUE),
		'ORG' => $this->input->post('ORG',TRUE),
		'Logo' => $this->input->post('Logo',TRUE),
		'EmpReffCode' => $this->input->post('EmpReffCode',TRUE),
		'Status' => $this->input->post('Status',TRUE),
		'DeclineCode' => $this->input->post('DeclineCode',TRUE),
		'ApplicationType' => $this->input->post('ApplicationType',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'No_Identitas' => $this->input->post('No_Identitas',TRUE),
	    );

            $this->Systemccos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('systemccos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Systemccos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('systemccos/update_action'),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'RowID' => set_value('RowID', $row->RowID),
		'DecisionDate' => set_value('DecisionDate', $row->DecisionDate),
		'SourceCode' => set_value('SourceCode', $row->SourceCode),
		'CustomerName' => set_value('CustomerName', $row->CustomerName),
		'CustomerBirthDate' => set_value('CustomerBirthDate', $row->CustomerBirthDate),
		'ORG' => set_value('ORG', $row->ORG),
		'Logo' => set_value('Logo', $row->Logo),
		'EmpReffCode' => set_value('EmpReffCode', $row->EmpReffCode),
		'Status' => set_value('Status', $row->Status),
		'DeclineCode' => set_value('DeclineCode', $row->DeclineCode),
		'ApplicationType' => set_value('ApplicationType', $row->ApplicationType),
		'ProcessMonth' => set_value('ProcessMonth', $row->ProcessMonth),
		'ProcessYear' => set_value('ProcessYear', $row->ProcessYear),
		'No_Identitas' => set_value('No_Identitas', $row->No_Identitas),
	    );
            $this->template->load('template','systemccos_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemccos'));
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
		'DecisionDate' => $this->input->post('DecisionDate',TRUE),
		'SourceCode' => $this->input->post('SourceCode',TRUE),
		'CustomerName' => $this->input->post('CustomerName',TRUE),
		'CustomerBirthDate' => $this->input->post('CustomerBirthDate',TRUE),
		'ORG' => $this->input->post('ORG',TRUE),
		'Logo' => $this->input->post('Logo',TRUE),
		'EmpReffCode' => $this->input->post('EmpReffCode',TRUE),
		'Status' => $this->input->post('Status',TRUE),
		'DeclineCode' => $this->input->post('DeclineCode',TRUE),
		'ApplicationType' => $this->input->post('ApplicationType',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'No_Identitas' => $this->input->post('No_Identitas',TRUE),
	    );

            $this->Systemccos_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('systemccos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Systemccos_model->get_by_id($id);

        if ($row) {
            $this->Systemccos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('systemccos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemccos'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('DecisionDate', 'decisiondate', 'trim|required');
	$this->form_validation->set_rules('SourceCode', 'sourcecode', 'trim|required');
	$this->form_validation->set_rules('CustomerName', 'customername', 'trim|required');
	$this->form_validation->set_rules('CustomerBirthDate', 'customerbirthdate', 'trim|required');
	$this->form_validation->set_rules('ORG', 'org', 'trim|required');
	$this->form_validation->set_rules('Logo', 'logo', 'trim|required');
	$this->form_validation->set_rules('EmpReffCode', 'empreffcode', 'trim|required');
	$this->form_validation->set_rules('Status', 'status', 'trim|required');
	$this->form_validation->set_rules('DeclineCode', 'declinecode', 'trim|required');
	$this->form_validation->set_rules('ApplicationType', 'applicationtype', 'trim|required');
	$this->form_validation->set_rules('ProcessMonth', 'processmonth', 'trim|required');
	$this->form_validation->set_rules('ProcessYear', 'processyear', 'trim|required');
	$this->form_validation->set_rules('No_Identitas', 'no identitas', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "systemccos.xls";
        $judul = "systemccos";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DecisionDate");
	xlsWriteLabel($tablehead, $kolomhead++, "SourceCode");
	xlsWriteLabel($tablehead, $kolomhead++, "CustomerName");
	xlsWriteLabel($tablehead, $kolomhead++, "CustomerBirthDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ORG");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo");
	xlsWriteLabel($tablehead, $kolomhead++, "EmpReffCode");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "DeclineCode");
	xlsWriteLabel($tablehead, $kolomhead++, "ApplicationType");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessMonth");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessYear");
	xlsWriteLabel($tablehead, $kolomhead++, "No Identitas");

	foreach ($this->Systemccos_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DecisionDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SourceCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CustomerName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CustomerBirthDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ORG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Logo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmpReffCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DeclineCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationType);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessMonth);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessYear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Identitas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=systemccos.doc");

        $data = array(
            'systemccos_data' => $this->Systemccos_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('systemccos_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'systemccos_data' => $this->Systemccos_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('systemccos_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('systemccos.pdf', 'D'); 
    }

}

/* End of file Systemccos.php */
/* Location: ./application/controllers/Systemccos.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:27 */
/* http://harviacode.com */