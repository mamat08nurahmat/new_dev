<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performanceemployee extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performanceemployee_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $performanceemployee = $this->Performanceemployee_model->get_all();

        $data = array(
            'performanceemployee_data' => $performanceemployee
        );

        $this->template->load('template','performanceemployee_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Performanceemployee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'RowID' => $row->RowID,
		'BatchID' => $row->BatchID,
		'ApplicationSource' => $row->ApplicationSource,
		'AsOfDate' => $row->AsOfDate,
		'EmployeeID' => $row->EmployeeID,
	    );
            $this->template->load('template','performanceemployee_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceemployee'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('performanceemployee/create_action'),
	    'RowID' => set_value('RowID'),
	    'BatchID' => set_value('BatchID'),
	    'ApplicationSource' => set_value('ApplicationSource'),
	    'AsOfDate' => set_value('AsOfDate'),
	    'EmployeeID' => set_value('EmployeeID'),
	);
        $this->template->load('template','performanceemployee_form', $data);
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
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
	    );

            $this->Performanceemployee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('performanceemployee'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Performanceemployee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('performanceemployee/update_action'),
		'RowID' => set_value('RowID', $row->RowID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'ApplicationSource' => set_value('ApplicationSource', $row->ApplicationSource),
		'AsOfDate' => set_value('AsOfDate', $row->AsOfDate),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
	    );
            $this->template->load('template','performanceemployee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceemployee'));
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
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
	    );

            $this->Performanceemployee_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('performanceemployee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Performanceemployee_model->get_by_id($id);

        if ($row) {
            $this->Performanceemployee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('performanceemployee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceemployee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('ApplicationSource', 'applicationsource', 'trim|required');
	$this->form_validation->set_rules('AsOfDate', 'asofdate', 'trim|required');
	$this->form_validation->set_rules('EmployeeID', 'employeeid', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "performanceemployee.xls";
        $judul = "performanceemployee";
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
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeID");

	foreach ($this->Performanceemployee_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationSource);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AsOfDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->EmployeeID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=performanceemployee.doc");

        $data = array(
            'performanceemployee_data' => $this->Performanceemployee_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('performanceemployee_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'performanceemployee_data' => $this->Performanceemployee_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('performanceemployee_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('performanceemployee.pdf', 'D'); 
    }

}

/* End of file Performanceemployee.php */
/* Location: ./application/controllers/Performanceemployee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:25 */
/* http://harviacode.com */