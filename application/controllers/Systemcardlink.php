<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemcardlink extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Systemcardlink_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $systemcardlink = $this->Systemcardlink_model->get_all();

        $data = array(
            'systemcardlink_data' => $systemcardlink
        );

        $this->template->load('template','systemcardlink_list', $data);
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

    public function excel()
    {
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

	foreach ($this->Systemcardlink_model->get_all() as $data) {
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

    function pdf()
    {
        $data = array(
            'systemcardlink_data' => $this->Systemcardlink_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('systemcardlink_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('systemcardlink.pdf', 'D'); 
    }

}

/* End of file Systemcardlink.php */
/* Location: ./application/controllers/Systemcardlink.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:26 */
/* http://harviacode.com */