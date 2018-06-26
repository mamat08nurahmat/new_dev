<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performancedetail extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performancedetail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $performancedetail = $this->Performancedetail_model->get_all();

        $data = array(
            'performancedetail_data' => $performancedetail
        );

        $this->template->load('template','performancedetail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Performancedetail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'RowID' => $row->RowID,
		'BatchID' => $row->BatchID,
		'ApplicationSource' => $row->ApplicationSource,
		'AsOfDate' => $row->AsOfDate,
		'CustomerName' => $row->CustomerName,
		'CustomerBirthDate' => $row->CustomerBirthDate,
		'Parameter1' => $row->Parameter1,
		'Parameter2' => $row->Parameter2,
		'Parameter3' => $row->Parameter3,
		'Parameter4' => $row->Parameter4,
		'Parameter5' => $row->Parameter5,
		'Parameter6' => $row->Parameter6,
		'Parameter7' => $row->Parameter7,
		'Parameter8' => $row->Parameter8,
		'Parameter9' => $row->Parameter9,
		'Parameter10' => $row->Parameter10,
		'Parameter11' => $row->Parameter11,
		'Parameter12' => $row->Parameter12,
		'Parameter13' => $row->Parameter13,
		'Parameter14' => $row->Parameter14,
		'Parameter15' => $row->Parameter15,
	    );
            $this->template->load('template','performancedetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performancedetail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('performancedetail/create_action'),
	    'RowID' => set_value('RowID'),
	    'BatchID' => set_value('BatchID'),
	    'ApplicationSource' => set_value('ApplicationSource'),
	    'AsOfDate' => set_value('AsOfDate'),
	    'CustomerName' => set_value('CustomerName'),
	    'CustomerBirthDate' => set_value('CustomerBirthDate'),
	    'Parameter1' => set_value('Parameter1'),
	    'Parameter2' => set_value('Parameter2'),
	    'Parameter3' => set_value('Parameter3'),
	    'Parameter4' => set_value('Parameter4'),
	    'Parameter5' => set_value('Parameter5'),
	    'Parameter6' => set_value('Parameter6'),
	    'Parameter7' => set_value('Parameter7'),
	    'Parameter8' => set_value('Parameter8'),
	    'Parameter9' => set_value('Parameter9'),
	    'Parameter10' => set_value('Parameter10'),
	    'Parameter11' => set_value('Parameter11'),
	    'Parameter12' => set_value('Parameter12'),
	    'Parameter13' => set_value('Parameter13'),
	    'Parameter14' => set_value('Parameter14'),
	    'Parameter15' => set_value('Parameter15'),
	);
        $this->template->load('template','performancedetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'AsOfDate' => $this->input->post('AsOfDate',TRUE),
		'CustomerName' => $this->input->post('CustomerName',TRUE),
		'CustomerBirthDate' => $this->input->post('CustomerBirthDate',TRUE),
		'Parameter1' => $this->input->post('Parameter1',TRUE),
		'Parameter2' => $this->input->post('Parameter2',TRUE),
		'Parameter3' => $this->input->post('Parameter3',TRUE),
		'Parameter4' => $this->input->post('Parameter4',TRUE),
		'Parameter5' => $this->input->post('Parameter5',TRUE),
		'Parameter6' => $this->input->post('Parameter6',TRUE),
		'Parameter7' => $this->input->post('Parameter7',TRUE),
		'Parameter8' => $this->input->post('Parameter8',TRUE),
		'Parameter9' => $this->input->post('Parameter9',TRUE),
		'Parameter10' => $this->input->post('Parameter10',TRUE),
		'Parameter11' => $this->input->post('Parameter11',TRUE),
		'Parameter12' => $this->input->post('Parameter12',TRUE),
		'Parameter13' => $this->input->post('Parameter13',TRUE),
		'Parameter14' => $this->input->post('Parameter14',TRUE),
		'Parameter15' => $this->input->post('Parameter15',TRUE),
	    );

            $this->Performancedetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('performancedetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Performancedetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('performancedetail/update_action'),
		'RowID' => set_value('RowID', $row->RowID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'ApplicationSource' => set_value('ApplicationSource', $row->ApplicationSource),
		'AsOfDate' => set_value('AsOfDate', $row->AsOfDate),
		'CustomerName' => set_value('CustomerName', $row->CustomerName),
		'CustomerBirthDate' => set_value('CustomerBirthDate', $row->CustomerBirthDate),
		'Parameter1' => set_value('Parameter1', $row->Parameter1),
		'Parameter2' => set_value('Parameter2', $row->Parameter2),
		'Parameter3' => set_value('Parameter3', $row->Parameter3),
		'Parameter4' => set_value('Parameter4', $row->Parameter4),
		'Parameter5' => set_value('Parameter5', $row->Parameter5),
		'Parameter6' => set_value('Parameter6', $row->Parameter6),
		'Parameter7' => set_value('Parameter7', $row->Parameter7),
		'Parameter8' => set_value('Parameter8', $row->Parameter8),
		'Parameter9' => set_value('Parameter9', $row->Parameter9),
		'Parameter10' => set_value('Parameter10', $row->Parameter10),
		'Parameter11' => set_value('Parameter11', $row->Parameter11),
		'Parameter12' => set_value('Parameter12', $row->Parameter12),
		'Parameter13' => set_value('Parameter13', $row->Parameter13),
		'Parameter14' => set_value('Parameter14', $row->Parameter14),
		'Parameter15' => set_value('Parameter15', $row->Parameter15),
	    );
            $this->template->load('template','performancedetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performancedetail'));
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
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'AsOfDate' => $this->input->post('AsOfDate',TRUE),
		'CustomerName' => $this->input->post('CustomerName',TRUE),
		'CustomerBirthDate' => $this->input->post('CustomerBirthDate',TRUE),
		'Parameter1' => $this->input->post('Parameter1',TRUE),
		'Parameter2' => $this->input->post('Parameter2',TRUE),
		'Parameter3' => $this->input->post('Parameter3',TRUE),
		'Parameter4' => $this->input->post('Parameter4',TRUE),
		'Parameter5' => $this->input->post('Parameter5',TRUE),
		'Parameter6' => $this->input->post('Parameter6',TRUE),
		'Parameter7' => $this->input->post('Parameter7',TRUE),
		'Parameter8' => $this->input->post('Parameter8',TRUE),
		'Parameter9' => $this->input->post('Parameter9',TRUE),
		'Parameter10' => $this->input->post('Parameter10',TRUE),
		'Parameter11' => $this->input->post('Parameter11',TRUE),
		'Parameter12' => $this->input->post('Parameter12',TRUE),
		'Parameter13' => $this->input->post('Parameter13',TRUE),
		'Parameter14' => $this->input->post('Parameter14',TRUE),
		'Parameter15' => $this->input->post('Parameter15',TRUE),
	    );

            $this->Performancedetail_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('performancedetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Performancedetail_model->get_by_id($id);

        if ($row) {
            $this->Performancedetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('performancedetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performancedetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('ApplicationSource', 'applicationsource', 'trim|required');
	$this->form_validation->set_rules('AsOfDate', 'asofdate', 'trim|required');
	$this->form_validation->set_rules('CustomerName', 'customername', 'trim|required');
	$this->form_validation->set_rules('CustomerBirthDate', 'customerbirthdate', 'trim|required');
	$this->form_validation->set_rules('Parameter1', 'parameter1', 'trim|required');
	$this->form_validation->set_rules('Parameter2', 'parameter2', 'trim|required');
	$this->form_validation->set_rules('Parameter3', 'parameter3', 'trim|required');
	$this->form_validation->set_rules('Parameter4', 'parameter4', 'trim|required');
	$this->form_validation->set_rules('Parameter5', 'parameter5', 'trim|required');
	$this->form_validation->set_rules('Parameter6', 'parameter6', 'trim|required');
	$this->form_validation->set_rules('Parameter7', 'parameter7', 'trim|required');
	$this->form_validation->set_rules('Parameter8', 'parameter8', 'trim|required');
	$this->form_validation->set_rules('Parameter9', 'parameter9', 'trim|required');
	$this->form_validation->set_rules('Parameter10', 'parameter10', 'trim|required');
	$this->form_validation->set_rules('Parameter11', 'parameter11', 'trim|required');
	$this->form_validation->set_rules('Parameter12', 'parameter12', 'trim|required');
	$this->form_validation->set_rules('Parameter13', 'parameter13', 'trim|required');
	$this->form_validation->set_rules('Parameter14', 'parameter14', 'trim|required');
	$this->form_validation->set_rules('Parameter15', 'parameter15', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "performancedetail.xls";
        $judul = "performancedetail";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ApplicationSource");
	xlsWriteLabel($tablehead, $kolomhead++, "AsOfDate");
	xlsWriteLabel($tablehead, $kolomhead++, "CustomerName");
	xlsWriteLabel($tablehead, $kolomhead++, "CustomerBirthDate");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter1");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter2");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter3");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter4");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter5");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter6");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter7");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter8");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter9");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter10");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter11");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter12");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter13");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter14");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter15");

//	foreach ($this->Performancedetail_model->get_all() as $data) {
	foreach ($this->db->query('SELECT * FROM Performancedetail')->result() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationSource);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AsOfDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CustomerName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CustomerBirthDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter6);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter7);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter8);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter9);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter10);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter11);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter12);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter13);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter14);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter15);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=performancedetail.doc");

        $data = array(
            'performancedetail_data' => $this->Performancedetail_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('performancedetail_doc',$data);
    }

}

/* End of file Performancedetail.php */
/* Location: ./application/controllers/Performancedetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-28 06:48:32 */
/* http://harviacode.com */