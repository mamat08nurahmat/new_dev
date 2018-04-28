<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persons extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persons_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $persons = $this->Persons_model->get_all();

        $data = array(
            'persons_data' => $persons
        );

        $this->template->load('template','persons_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Persons_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'LastName' => $row->LastName,
		'FirstName' => $row->FirstName,
		'Age' => $row->Age,
	    );
            $this->template->load('template','persons_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persons'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('persons/create_action'),
	    'ID' => set_value('ID'),
	    'LastName' => set_value('LastName'),
	    'FirstName' => set_value('FirstName'),
	    'Age' => set_value('Age'),
	);
        $this->template->load('template','persons_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'LastName' => $this->input->post('LastName',TRUE),
		'FirstName' => $this->input->post('FirstName',TRUE),
		'Age' => $this->input->post('Age',TRUE),
	    );

            $this->Persons_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('persons'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Persons_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('persons/update_action'),
		'ID' => set_value('ID', $row->ID),
		'LastName' => set_value('LastName', $row->LastName),
		'FirstName' => set_value('FirstName', $row->FirstName),
		'Age' => set_value('Age', $row->Age),
	    );
            $this->template->load('template','persons_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persons'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'LastName' => $this->input->post('LastName',TRUE),
		'FirstName' => $this->input->post('FirstName',TRUE),
		'Age' => $this->input->post('Age',TRUE),
	    );

            $this->Persons_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('persons'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Persons_model->get_by_id($id);

        if ($row) {
            $this->Persons_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('persons'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persons'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('LastName', 'lastname', 'trim|required');
	$this->form_validation->set_rules('FirstName', 'firstname', 'trim|required');
	$this->form_validation->set_rules('Age', 'age', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "persons.xls";
        $judul = "persons";
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
	xlsWriteLabel($tablehead, $kolomhead++, "LastName");
	xlsWriteLabel($tablehead, $kolomhead++, "FirstName");
	xlsWriteLabel($tablehead, $kolomhead++, "Age");

	foreach ($this->Persons_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LastName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FirstName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Age);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=persons.doc");

        $data = array(
            'persons_data' => $this->Persons_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('persons_doc',$data);
    }

}

/* End of file Persons.php */
/* Location: ./application/controllers/Persons.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-28 08:58:09 */
/* http://harviacode.com */