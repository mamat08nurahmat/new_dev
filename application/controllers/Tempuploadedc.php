<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tempuploadedc extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tempuploadedc_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tempuploadedc = $this->Tempuploadedc_model->get_all();

        $data = array(
            'tempuploadedc_data' => $tempuploadedc
        );

        $this->load->view('tempuploadedc/tempuploadedc_list',$data);

        // $this->template->load('template','tempuploadedc_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tempuploadedc_model->get_by_id($id);
        if ($row) {
            $data = array(
		'RowID' => $row->RowID,
		'BatchID' => $row->BatchID,
		'MID' => $row->MID,
		'MERCHAN_DBA_NAME' => $row->MERCHAN_DBA_NAME,
		'STATUS_EDC' => $row->STATUS_EDC,
		'OPEN_DATE' => $row->OPEN_DATE,
		'CITY' => $row->CITY,
		'MSO' => $row->MSO,
		'SOURCE_CODE' => $row->SOURCE_CODE,
		'POS1' => $row->POS1,
	    );
            $this->template->load('template','tempuploadedc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tempuploadedc'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tempuploadedc/create_action'),
	    'RowID' => set_value('RowID'),
	    'BatchID' => set_value('BatchID'),
	    'MID' => set_value('MID'),
	    'MERCHAN_DBA_NAME' => set_value('MERCHAN_DBA_NAME'),
	    'STATUS_EDC' => set_value('STATUS_EDC'),
	    'OPEN_DATE' => set_value('OPEN_DATE'),
	    'CITY' => set_value('CITY'),
	    'MSO' => set_value('MSO'),
	    'SOURCE_CODE' => set_value('SOURCE_CODE'),
	    'POS1' => set_value('POS1'),
	);
        $this->template->load('template','tempuploadedc_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'MID' => $this->input->post('MID',TRUE),
		'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME',TRUE),
		'STATUS_EDC' => $this->input->post('STATUS_EDC',TRUE),
		'OPEN_DATE' => $this->input->post('OPEN_DATE',TRUE),
		'CITY' => $this->input->post('CITY',TRUE),
		'MSO' => $this->input->post('MSO',TRUE),
		'SOURCE_CODE' => $this->input->post('SOURCE_CODE',TRUE),
		'POS1' => $this->input->post('POS1',TRUE),
	    );

            $this->Tempuploadedc_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tempuploadedc'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tempuploadedc_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tempuploadedc/update_action'),
		'RowID' => set_value('RowID', $row->RowID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'MID' => set_value('MID', $row->MID),
		'MERCHAN_DBA_NAME' => set_value('MERCHAN_DBA_NAME', $row->MERCHAN_DBA_NAME),
		'STATUS_EDC' => set_value('STATUS_EDC', $row->STATUS_EDC),
		'OPEN_DATE' => set_value('OPEN_DATE', $row->OPEN_DATE),
		'CITY' => set_value('CITY', $row->CITY),
		'MSO' => set_value('MSO', $row->MSO),
		'SOURCE_CODE' => set_value('SOURCE_CODE', $row->SOURCE_CODE),
		'POS1' => set_value('POS1', $row->POS1),
	    );
            $this->template->load('template','tempuploadedc_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tempuploadedc'));
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
		'MID' => $this->input->post('MID',TRUE),
		'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME',TRUE),
		'STATUS_EDC' => $this->input->post('STATUS_EDC',TRUE),
		'OPEN_DATE' => $this->input->post('OPEN_DATE',TRUE),
		'CITY' => $this->input->post('CITY',TRUE),
		'MSO' => $this->input->post('MSO',TRUE),
		'SOURCE_CODE' => $this->input->post('SOURCE_CODE',TRUE),
		'POS1' => $this->input->post('POS1',TRUE),
	    );

            $this->Tempuploadedc_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tempuploadedc'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tempuploadedc_model->get_by_id($id);

        if ($row) {
            $this->Tempuploadedc_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tempuploadedc'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tempuploadedc'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('MID', 'mid', 'trim|required');
	$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'merchan dba name', 'trim|required');
	$this->form_validation->set_rules('STATUS_EDC', 'status edc', 'trim|required');
	$this->form_validation->set_rules('OPEN_DATE', 'open date', 'trim|required');
	$this->form_validation->set_rules('CITY', 'city', 'trim|required');
	$this->form_validation->set_rules('MSO', 'mso', 'trim|required');
	$this->form_validation->set_rules('SOURCE_CODE', 'source code', 'trim|required');
	$this->form_validation->set_rules('POS1', 'pos1', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tempuploadedc.xls";
        $judul = "tempuploadedc";
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
	xlsWriteLabel($tablehead, $kolomhead++, "MID");
	xlsWriteLabel($tablehead, $kolomhead++, "MERCHAN DBA NAME");
	xlsWriteLabel($tablehead, $kolomhead++, "STATUS EDC");
	xlsWriteLabel($tablehead, $kolomhead++, "OPEN DATE");
	xlsWriteLabel($tablehead, $kolomhead++, "CITY");
	xlsWriteLabel($tablehead, $kolomhead++, "MSO");
	xlsWriteLabel($tablehead, $kolomhead++, "SOURCE CODE");
	xlsWriteLabel($tablehead, $kolomhead++, "POS1");

	foreach ($this->Tempuploadedc_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MERCHAN_DBA_NAME);
	    xlsWriteLabel($tablebody, $kolombody++, $data->STATUS_EDC);
	    xlsWriteLabel($tablebody, $kolombody++, $data->OPEN_DATE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CITY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MSO);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SOURCE_CODE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->POS1);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tempuploadedc.doc");

        $data = array(
            'tempuploadedc_data' => $this->Tempuploadedc_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tempuploadedc_doc',$data);
    }

}

/* End of file Tempuploadedc.php */
/* Location: ./application/controllers/Tempuploadedc.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-08 14:01:09 */
/* http://harviacode.com */