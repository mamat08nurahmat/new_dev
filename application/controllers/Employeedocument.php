<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employeedocument extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employeedocument_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $employeedocument = $this->Employeedocument_model->get_all();

        $data = array(
            'employeedocument_data' => $employeedocument
        );

        $this->template->load('template','employeedocument_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Employeedocument_model->get_by_id($id);
        if ($row) {
            $data = array(
		'EmployeeID' => $row->EmployeeID,
		'EmployeeDocumentID' => $row->EmployeeDocumentID,
		'Remark' => $row->Remark,
		'FileLocation' => $row->FileLocation,
		'FileName' => $row->FileName,
		'ContentType' => $row->ContentType,
		'ContentLength' => $row->ContentLength,
	    );
            $this->template->load('template','employeedocument_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employeedocument'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('employeedocument/create_action'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'EmployeeDocumentID' => set_value('EmployeeDocumentID'),
	    'Remark' => set_value('Remark'),
	    'FileLocation' => set_value('FileLocation'),
	    'FileName' => set_value('FileName'),
	    'ContentType' => set_value('ContentType'),
	    'ContentLength' => set_value('ContentLength'),
	);
        $this->template->load('template','employeedocument_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'EmployeeDocumentID' => $this->input->post('EmployeeDocumentID',TRUE),
		'Remark' => $this->input->post('Remark',TRUE),
		'FileLocation' => $this->input->post('FileLocation',TRUE),
		'FileName' => $this->input->post('FileName',TRUE),
		'ContentType' => $this->input->post('ContentType',TRUE),
		'ContentLength' => $this->input->post('ContentLength',TRUE),
	    );

            $this->Employeedocument_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employeedocument'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Employeedocument_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employeedocument/update_action'),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'EmployeeDocumentID' => set_value('EmployeeDocumentID', $row->EmployeeDocumentID),
		'Remark' => set_value('Remark', $row->Remark),
		'FileLocation' => set_value('FileLocation', $row->FileLocation),
		'FileName' => set_value('FileName', $row->FileName),
		'ContentType' => set_value('ContentType', $row->ContentType),
		'ContentLength' => set_value('ContentLength', $row->ContentLength),
	    );
            $this->template->load('template','employeedocument_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employeedocument'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('EmployeeID', TRUE));
        } else {
            $data = array(
		'EmployeeDocumentID' => $this->input->post('EmployeeDocumentID',TRUE),
		'Remark' => $this->input->post('Remark',TRUE),
		'FileLocation' => $this->input->post('FileLocation',TRUE),
		'FileName' => $this->input->post('FileName',TRUE),
		'ContentType' => $this->input->post('ContentType',TRUE),
		'ContentLength' => $this->input->post('ContentLength',TRUE),
	    );

            $this->Employeedocument_model->update($this->input->post('EmployeeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employeedocument'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employeedocument_model->get_by_id($id);

        if ($row) {
            $this->Employeedocument_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employeedocument'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employeedocument'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('EmployeeDocumentID', 'employeedocumentid', 'trim|required');
	$this->form_validation->set_rules('Remark', 'remark', 'trim|required');
	$this->form_validation->set_rules('FileLocation', 'filelocation', 'trim|required');
	$this->form_validation->set_rules('FileName', 'filename', 'trim|required');
	$this->form_validation->set_rules('ContentType', 'contenttype', 'trim|required');
	$this->form_validation->set_rules('ContentLength', 'contentlength', 'trim|required');

	$this->form_validation->set_rules('EmployeeID', 'EmployeeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "employeedocument.xls";
        $judul = "employeedocument";
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
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeDocumentID");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");
	xlsWriteLabel($tablehead, $kolomhead++, "FileLocation");
	xlsWriteLabel($tablehead, $kolomhead++, "FileName");
	xlsWriteLabel($tablehead, $kolomhead++, "ContentType");
	xlsWriteLabel($tablehead, $kolomhead++, "ContentLength");

	foreach ($this->Employeedocument_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeDocumentID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Remark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FileLocation);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FileName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ContentType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ContentLength);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=employeedocument.doc");

        $data = array(
            'employeedocument_data' => $this->Employeedocument_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('employeedocument_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'employeedocument_data' => $this->Employeedocument_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('employeedocument_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('employeedocument.pdf', 'D'); 
    }

}

/* End of file Employeedocument.php */
/* Location: ./application/controllers/Employeedocument.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:23 */
/* http://harviacode.com */