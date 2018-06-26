<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performanceperemployee extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performanceperemployee_model');
        $this->load->library('form_validation');
    }
//===============
    public function generate($batchid) 
    {
		
	$data = 	$this->db->query("SELECT * FROM PerformanceDetail Where BatchID='$batchid' ")->result();
print_r($data);die();		
		
//===============		
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'OpenDate' => $this->input->post('OpenDate',TRUE),
		'CardLogo' => $this->input->post('CardLogo',TRUE),
		'CardType' => $this->input->post('CardType',TRUE),
		'CardCount' => $this->input->post('CardCount',TRUE),
	    );

            $this->Performanceperemployee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('performanceperemployee'));
        }
    }

//===============
    public function index()
    {
        $performanceperemployee = $this->Performanceperemployee_model->get_all();

        $data = array(
            'performanceperemployee_data' => $performanceperemployee
        );

        $this->template->load('template','performanceperemployee_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Performanceperemployee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'EmployeeID' => $row->EmployeeID,
		'OpenDate' => $row->OpenDate,
		'CardLogo' => $row->CardLogo,
		'CardType' => $row->CardType,
		'CardCount' => $row->CardCount,
	    );
            $this->template->load('template','performanceperemployee_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceperemployee'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('performanceperemployee/create_action'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'OpenDate' => set_value('OpenDate'),
	    'CardLogo' => set_value('CardLogo'),
	    'CardType' => set_value('CardType'),
	    'CardCount' => set_value('CardCount'),
	);
        $this->template->load('template','performanceperemployee_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'OpenDate' => $this->input->post('OpenDate',TRUE),
		'CardLogo' => $this->input->post('CardLogo',TRUE),
		'CardType' => $this->input->post('CardType',TRUE),
		'CardCount' => $this->input->post('CardCount',TRUE),
	    );

            $this->Performanceperemployee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('performanceperemployee'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Performanceperemployee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('performanceperemployee/update_action'),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'OpenDate' => set_value('OpenDate', $row->OpenDate),
		'CardLogo' => set_value('CardLogo', $row->CardLogo),
		'CardType' => set_value('CardType', $row->CardType),
		'CardCount' => set_value('CardCount', $row->CardCount),
	    );
            $this->template->load('template','performanceperemployee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceperemployee'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('EmployeeID', TRUE));
        } else {
            $data = array(
		'OpenDate' => $this->input->post('OpenDate',TRUE),
		'CardLogo' => $this->input->post('CardLogo',TRUE),
		'CardType' => $this->input->post('CardType',TRUE),
		'CardCount' => $this->input->post('CardCount',TRUE),
	    );

            $this->Performanceperemployee_model->update($this->input->post('EmployeeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('performanceperemployee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Performanceperemployee_model->get_by_id($id);

        if ($row) {
            $this->Performanceperemployee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('performanceperemployee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('performanceperemployee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('OpenDate', 'opendate', 'trim|required');
	$this->form_validation->set_rules('CardLogo', 'cardlogo', 'trim|required');
	$this->form_validation->set_rules('CardType', 'cardtype', 'trim|required');
	$this->form_validation->set_rules('CardCount', 'cardcount', 'trim|required');

	$this->form_validation->set_rules('EmployeeID', 'EmployeeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "performanceperemployee.xls";
        $judul = "performanceperemployee";
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
	xlsWriteLabel($tablehead, $kolomhead++, "OpenDate");
	xlsWriteLabel($tablehead, $kolomhead++, "CardLogo");
	xlsWriteLabel($tablehead, $kolomhead++, "CardType");
	xlsWriteLabel($tablehead, $kolomhead++, "CardCount");

	foreach ($this->Performanceperemployee_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->OpenDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CardLogo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CardType);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CardCount);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=performanceperemployee.doc");

        $data = array(
            'performanceperemployee_data' => $this->Performanceperemployee_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('performanceperemployee_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'performanceperemployee_data' => $this->Performanceperemployee_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('performanceperemployee_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('performanceperemployee.pdf', 'D'); 
    }

}

/* End of file Performanceperemployee.php */
/* Location: ./application/controllers/Performanceperemployee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:26 */
/* http://harviacode.com */