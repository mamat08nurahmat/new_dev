<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemedc extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Systemedc_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $systemedc = $this->Systemedc_model->get_all();

        $data = array(
            'systemedc_data' => $systemedc
        );

// $data = array('tittle' => 'EDC', );

    $this->load->view('systemedc/systemedc_list', $data);

        // $this->template->load('template','systemedc_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Systemedc_model->get_by_id($id);
        if ($row) {
            $data = array(
		'RowID' => $row->RowID,
		'BatchID' => $row->BatchID,
		'AsOfDate' => $row->AsOfDate,
		'MID' => $row->MID,
		'MID_NAME' => $row->MID_NAME,
		'MSO' => $row->MSO,
		'SOURCE_CODE' => $row->SOURCE_CODE,
		'WILAYAH' => $row->WILAYAH,
		'CHANNEL' => $row->CHANNEL,
		'EDC' => $row->EDC,
		'EXH' => $row->EXH,
	    );
            $this->template->load('template','systemedc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemedc'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('systemedc/create_action'),
	    'RowID' => set_value('RowID'),
	    'BatchID' => set_value('BatchID'),
	    'AsOfDate' => set_value('AsOfDate'),
	    'MID' => set_value('MID'),
	    'MID_NAME' => set_value('MID_NAME'),
	    'MSO' => set_value('MSO'),
	    'SOURCE_CODE' => set_value('SOURCE_CODE'),
	    'WILAYAH' => set_value('WILAYAH'),
	    'CHANNEL' => set_value('CHANNEL'),
	    'EDC' => set_value('EDC'),
	    'EXH' => set_value('EXH'),
	);
        $this->template->load('template','systemedc_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'AsOfDate' => $this->input->post('AsOfDate',TRUE),
		'MID' => $this->input->post('MID',TRUE),
		'MID_NAME' => $this->input->post('MID_NAME',TRUE),
		'MSO' => $this->input->post('MSO',TRUE),
		'SOURCE_CODE' => $this->input->post('SOURCE_CODE',TRUE),
		'WILAYAH' => $this->input->post('WILAYAH',TRUE),
		'CHANNEL' => $this->input->post('CHANNEL',TRUE),
		'EDC' => $this->input->post('EDC',TRUE),
		'EXH' => $this->input->post('EXH',TRUE),
	    );

            $this->Systemedc_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('systemedc'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Systemedc_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('systemedc/update_action'),
		'RowID' => set_value('RowID', $row->RowID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'AsOfDate' => set_value('AsOfDate', $row->AsOfDate),
		'MID' => set_value('MID', $row->MID),
		'MID_NAME' => set_value('MID_NAME', $row->MID_NAME),
		'MSO' => set_value('MSO', $row->MSO),
		'SOURCE_CODE' => set_value('SOURCE_CODE', $row->SOURCE_CODE),
		'WILAYAH' => set_value('WILAYAH', $row->WILAYAH),
		'CHANNEL' => set_value('CHANNEL', $row->CHANNEL),
		'EDC' => set_value('EDC', $row->EDC),
		'EXH' => set_value('EXH', $row->EXH),
	    );
            $this->template->load('template','systemedc_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemedc'));
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
		'AsOfDate' => $this->input->post('AsOfDate',TRUE),
		'MID' => $this->input->post('MID',TRUE),
		'MID_NAME' => $this->input->post('MID_NAME',TRUE),
		'MSO' => $this->input->post('MSO',TRUE),
		'SOURCE_CODE' => $this->input->post('SOURCE_CODE',TRUE),
		'WILAYAH' => $this->input->post('WILAYAH',TRUE),
		'CHANNEL' => $this->input->post('CHANNEL',TRUE),
		'EDC' => $this->input->post('EDC',TRUE),
		'EXH' => $this->input->post('EXH',TRUE),
	    );

            $this->Systemedc_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('systemedc'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Systemedc_model->get_by_id($id);

        if ($row) {
            $this->Systemedc_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('systemedc'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemedc'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('AsOfDate', 'asofdate', 'trim|required');
	$this->form_validation->set_rules('MID', 'mid', 'trim|required');
	$this->form_validation->set_rules('MID_NAME', 'mid name', 'trim|required');
	$this->form_validation->set_rules('MSO', 'mso', 'trim|required');
	$this->form_validation->set_rules('SOURCE_CODE', 'source code', 'trim|required');
	$this->form_validation->set_rules('WILAYAH', 'wilayah', 'trim|required');
	$this->form_validation->set_rules('CHANNEL', 'channel', 'trim|required');
	$this->form_validation->set_rules('EDC', 'edc', 'trim|required');
	$this->form_validation->set_rules('EXH', 'exh', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "systemedc.xls";
        $judul = "systemedc";
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
	xlsWriteLabel($tablehead, $kolomhead++, "AsOfDate");
	xlsWriteLabel($tablehead, $kolomhead++, "MID");
	xlsWriteLabel($tablehead, $kolomhead++, "MID NAME");
	xlsWriteLabel($tablehead, $kolomhead++, "MSO");
	xlsWriteLabel($tablehead, $kolomhead++, "SOURCE CODE");
	xlsWriteLabel($tablehead, $kolomhead++, "WILAYAH");
	xlsWriteLabel($tablehead, $kolomhead++, "CHANNEL");
	xlsWriteLabel($tablehead, $kolomhead++, "EDC");
	xlsWriteLabel($tablehead, $kolomhead++, "EXH");

	foreach ($this->Systemedc_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AsOfDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MID_NAME);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MSO);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SOURCE_CODE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->WILAYAH);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CHANNEL);
	    xlsWriteNumber($tablebody, $kolombody++, $data->EDC);
	    xlsWriteNumber($tablebody, $kolombody++, $data->EXH);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=systemedc.doc");

        $data = array(
            'systemedc_data' => $this->Systemedc_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('systemedc_doc',$data);
    }

}

/* End of file Systemedc.php */
/* Location: ./application/controllers/Systemedc.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-08 12:28:44 */
/* http://harviacode.com */