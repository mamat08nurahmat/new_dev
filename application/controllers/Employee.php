<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $employee = $this->Employee_model->get_all();

        $data = array(
            'employee_data' => $employee
        );

        $this->template->load('template','employee_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Employee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'EmployeeID' => $row->EmployeeID,
		'ParentEmployeeID' => $row->ParentEmployeeID,
		'EmployeeName' => $row->EmployeeName,
		'EmployeeOldCode' => $row->EmployeeOldCode,
		'EmployeeNewCode' => $row->EmployeeNewCode,
		'UserGroupID' => $row->UserGroupID,
		'EmployeeStatus' => $row->EmployeeStatus,
		'EmployeeGrade' => $row->EmployeeGrade,
		'EmployeeBirthPlace' => $row->EmployeeBirthPlace,
		'EmployeeBirthDate' => $row->EmployeeBirthDate,
		'MothersMaidenName' => $row->MothersMaidenName,
		'IdentityType' => $row->IdentityType,
		'IdentityNumber' => $row->IdentityNumber,
		'IdentityFilePath' => $row->IdentityFilePath,
		'IdentityFileName' => $row->IdentityFileName,
		'Sex' => $row->Sex,
		'Religion' => $row->Religion,
		'NPWP' => $row->NPWP,
		'FixedPhoneNumber' => $row->FixedPhoneNumber,
		'PhoneNumber' => $row->PhoneNumber,
		'PhoneNumber2' => $row->PhoneNumber2,
		'EmergencyName' => $row->EmergencyName,
		'EmergencyStatus' => $row->EmergencyStatus,
		'EmergencyNumber' => $row->EmergencyNumber,
		'EmergencyAddress' => $row->EmergencyAddress,
		'Province' => $row->Province,
		'StreetAddress' => $row->StreetAddress,
		'PostalCode' => $row->PostalCode,
		'EmailAddress' => $row->EmailAddress,
		'MaritalStatus' => $row->MaritalStatus,
		'Height' => $row->Height,
		'Weight' => $row->Weight,
		'PhotoFilePath' => $row->PhotoFilePath,
		'PhotoFileName' => $row->PhotoFileName,
		'AgencyID' => $row->AgencyID,
		'SalesCenterID' => $row->SalesCenterID,
		'InterviewApprovalID' => $row->InterviewApprovalID,
		'InterviewLevel' => $row->InterviewLevel,
		'InterviewStatus' => $row->InterviewStatus,
		'HiringApprovalID' => $row->HiringApprovalID,
		'HiringLevel' => $row->HiringLevel,
		'HiringStatus' => $row->HiringStatus,
		'ApprovalID' => $row->ApprovalID,
		'ApprovalLevel' => $row->ApprovalLevel,
		'ApprovalStatus' => $row->ApprovalStatus,
		'IsDiscontinued' => $row->IsDiscontinued,
		'IsDedicated' => $row->IsDedicated,
		'DedicatedRemark' => $row->DedicatedRemark,
		'ActiveDate' => $row->ActiveDate,
		'EndDate' => $row->EndDate,
		'EndReason' => $row->EndReason,
		'CreatedDate' => $row->CreatedDate,
		'CreatedBy' => $row->CreatedBy,
	    );
            $this->template->load('template','employee_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function create($IdentityNumber) 
    {


    	$Increment= $this->db->query("SELECT (MAX(EmployeeID)+1) as EmployeeID FROM Employee")->result();
    	$EmployeeID = $Increment[0]->EmployeeID;
// print_r($EmployeeID);die();

        $data = array(
            'button' => 'Create',
            'action' => site_url('employee/create_action'),
	    'EmployeeID' => $EmployeeID,

	    'ParentEmployeeID' => set_value('ParentEmployeeID'),
	    'EmployeeName' => set_value('EmployeeName'),
	    'EmployeeOldCode' => set_value('EmployeeOldCode'),
	    'EmployeeNewCode' => set_value('EmployeeNewCode'),
	    'UserGroupID' => set_value('UserGroupID'),
	    'EmployeeStatus' => set_value('EmployeeStatus'),
	    'EmployeeGrade' => set_value('EmployeeGrade'),
	    'EmployeeBirthPlace' => set_value('EmployeeBirthPlace'),
	    'EmployeeBirthDate' => set_value('EmployeeBirthDate'),
	    'MothersMaidenName' => set_value('MothersMaidenName'),
	    'IdentityType' => set_value('IdentityType'),
	    'IdentityNumber' => $IdentityNumber,
	    'IdentityFilePath' => set_value('IdentityFilePath'),
	    'IdentityFileName' => set_value('IdentityFileName'),
	    'Sex' => set_value('Sex'),
	    'Religion' => set_value('Religion'),
	    'NPWP' => set_value('NPWP'),
	    'FixedPhoneNumber' => set_value('FixedPhoneNumber'),
	    'PhoneNumber' => set_value('PhoneNumber'),
	    'PhoneNumber2' => set_value('PhoneNumber2'),
	    'EmergencyName' => set_value('EmergencyName'),
	    'EmergencyStatus' => set_value('EmergencyStatus'),
	    'EmergencyNumber' => set_value('EmergencyNumber'),
	    'EmergencyAddress' => set_value('EmergencyAddress'),
	    'Province' => set_value('Province'),
	    'StreetAddress' => set_value('StreetAddress'),
	    'PostalCode' => set_value('PostalCode'),
	    'EmailAddress' => set_value('EmailAddress'),
	    'MaritalStatus' => set_value('MaritalStatus'),
	    'Height' => set_value('Height'),
	    'Weight' => set_value('Weight'),
	    'PhotoFilePath' => set_value('PhotoFilePath'),
	    'PhotoFileName' => set_value('PhotoFileName'),
	    'AgencyID' => set_value('AgencyID'),
	    'SalesCenterID' => set_value('SalesCenterID'),
	    'InterviewApprovalID' => set_value('InterviewApprovalID'),
	    'InterviewLevel' => set_value('InterviewLevel'),
	    'InterviewStatus' => set_value('InterviewStatus'),
	    'HiringApprovalID' => set_value('HiringApprovalID'),
	    'HiringLevel' => set_value('HiringLevel'),
	    'HiringStatus' => set_value('HiringStatus'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'ApprovalLevel' => set_value('ApprovalLevel'),
	    'ApprovalStatus' => set_value('ApprovalStatus'),
	    'IsDiscontinued' => set_value('IsDiscontinued'),
	    'IsDedicated' => set_value('IsDedicated'),
	    'DedicatedRemark' => set_value('DedicatedRemark'),
	    'ActiveDate' => set_value('ActiveDate'),
	    'EndDate' => set_value('EndDate'),
	    'EndReason' => set_value('EndReason'),
	    'CreatedDate' => set_value('CreatedDate'),
	    'CreatedBy' => set_value('CreatedBy'),

	);
        $this->template->load('template','employee_reg', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
		'EmployeeName' => $this->input->post('EmployeeName',TRUE),
		'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
		'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'EmployeeBirthPlace' => $this->input->post('EmployeeBirthPlace',TRUE),
		'EmployeeBirthDate' => $this->input->post('EmployeeBirthDate',TRUE),
		'MothersMaidenName' => $this->input->post('MothersMaidenName',TRUE),
		'IdentityType' => $this->input->post('IdentityType',TRUE),
		'IdentityNumber' => $this->input->post('IdentityNumber',TRUE),
		'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
		'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
		'Sex' => $this->input->post('Sex',TRUE),
		'Religion' => $this->input->post('Religion',TRUE),
		'NPWP' => $this->input->post('NPWP',TRUE),
		'FixedPhoneNumber' => $this->input->post('FixedPhoneNumber',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'PhoneNumber2' => $this->input->post('PhoneNumber2',TRUE),
		'EmergencyName' => $this->input->post('EmergencyName',TRUE),
		'EmergencyStatus' => $this->input->post('EmergencyStatus',TRUE),
		'EmergencyNumber' => $this->input->post('EmergencyNumber',TRUE),
		'EmergencyAddress' => $this->input->post('EmergencyAddress',TRUE),
		'Province' => $this->input->post('Province',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'MaritalStatus' => $this->input->post('MaritalStatus',TRUE),
		'Height' => $this->input->post('Height',TRUE),
		'Weight' => $this->input->post('Weight',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
		'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
		'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
		'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
		'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
		'HiringLevel' => $this->input->post('HiringLevel',TRUE),
		'HiringStatus' => $this->input->post('HiringStatus',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
		'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
		'IsDedicated' => $this->input->post('IsDedicated',TRUE),
		'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'EndDate' => $this->input->post('EndDate',TRUE),
		'EndReason' => $this->input->post('EndReason',TRUE),
		'CreatedDate' => $this->input->post('CreatedDate',TRUE),
		'CreatedBy' => $this->input->post('CreatedBy',TRUE),
	    );

            $this->Employee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'ParentEmployeeID' => set_value('ParentEmployeeID', $row->ParentEmployeeID),
		'EmployeeName' => set_value('EmployeeName', $row->EmployeeName),
		'EmployeeOldCode' => set_value('EmployeeOldCode', $row->EmployeeOldCode),
		'EmployeeNewCode' => set_value('EmployeeNewCode', $row->EmployeeNewCode),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
		'EmployeeStatus' => set_value('EmployeeStatus', $row->EmployeeStatus),
		'EmployeeGrade' => set_value('EmployeeGrade', $row->EmployeeGrade),
		'EmployeeBirthPlace' => set_value('EmployeeBirthPlace', $row->EmployeeBirthPlace),
		'EmployeeBirthDate' => set_value('EmployeeBirthDate', $row->EmployeeBirthDate),
		'MothersMaidenName' => set_value('MothersMaidenName', $row->MothersMaidenName),
		'IdentityType' => set_value('IdentityType', $row->IdentityType),
		'IdentityNumber' => set_value('IdentityNumber', $row->IdentityNumber),
		'IdentityFilePath' => set_value('IdentityFilePath', $row->IdentityFilePath),
		'IdentityFileName' => set_value('IdentityFileName', $row->IdentityFileName),
		'Sex' => set_value('Sex', $row->Sex),
		'Religion' => set_value('Religion', $row->Religion),
		'NPWP' => set_value('NPWP', $row->NPWP),
		'FixedPhoneNumber' => set_value('FixedPhoneNumber', $row->FixedPhoneNumber),
		'PhoneNumber' => set_value('PhoneNumber', $row->PhoneNumber),
		'PhoneNumber2' => set_value('PhoneNumber2', $row->PhoneNumber2),
		'EmergencyName' => set_value('EmergencyName', $row->EmergencyName),
		'EmergencyStatus' => set_value('EmergencyStatus', $row->EmergencyStatus),
		'EmergencyNumber' => set_value('EmergencyNumber', $row->EmergencyNumber),
		'EmergencyAddress' => set_value('EmergencyAddress', $row->EmergencyAddress),
		'Province' => set_value('Province', $row->Province),
		'StreetAddress' => set_value('StreetAddress', $row->StreetAddress),
		'PostalCode' => set_value('PostalCode', $row->PostalCode),
		'EmailAddress' => set_value('EmailAddress', $row->EmailAddress),
		'MaritalStatus' => set_value('MaritalStatus', $row->MaritalStatus),
		'Height' => set_value('Height', $row->Height),
		'Weight' => set_value('Weight', $row->Weight),
		'PhotoFilePath' => set_value('PhotoFilePath', $row->PhotoFilePath),
		'PhotoFileName' => set_value('PhotoFileName', $row->PhotoFileName),
		'AgencyID' => set_value('AgencyID', $row->AgencyID),
		'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
		'InterviewApprovalID' => set_value('InterviewApprovalID', $row->InterviewApprovalID),
		'InterviewLevel' => set_value('InterviewLevel', $row->InterviewLevel),
		'InterviewStatus' => set_value('InterviewStatus', $row->InterviewStatus),
		'HiringApprovalID' => set_value('HiringApprovalID', $row->HiringApprovalID),
		'HiringLevel' => set_value('HiringLevel', $row->HiringLevel),
		'HiringStatus' => set_value('HiringStatus', $row->HiringStatus),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'ApprovalLevel' => set_value('ApprovalLevel', $row->ApprovalLevel),
		'ApprovalStatus' => set_value('ApprovalStatus', $row->ApprovalStatus),
		'IsDiscontinued' => set_value('IsDiscontinued', $row->IsDiscontinued),
		'IsDedicated' => set_value('IsDedicated', $row->IsDedicated),
		'DedicatedRemark' => set_value('DedicatedRemark', $row->DedicatedRemark),
		'ActiveDate' => set_value('ActiveDate', $row->ActiveDate),
		'EndDate' => set_value('EndDate', $row->EndDate),
		'EndReason' => set_value('EndReason', $row->EndReason),
		'CreatedDate' => set_value('CreatedDate', $row->CreatedDate),
		'CreatedBy' => set_value('CreatedBy', $row->CreatedBy),
	    );
            $this->template->load('template','employee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('EmployeeID', TRUE));
        } else {
            $data = array(
		'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
		'EmployeeName' => $this->input->post('EmployeeName',TRUE),
		'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
		'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'EmployeeBirthPlace' => $this->input->post('EmployeeBirthPlace',TRUE),
		'EmployeeBirthDate' => $this->input->post('EmployeeBirthDate',TRUE),
		'MothersMaidenName' => $this->input->post('MothersMaidenName',TRUE),
		'IdentityType' => $this->input->post('IdentityType',TRUE),
		'IdentityNumber' => $this->input->post('IdentityNumber',TRUE),
		'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
		'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
		'Sex' => $this->input->post('Sex',TRUE),
		'Religion' => $this->input->post('Religion',TRUE),
		'NPWP' => $this->input->post('NPWP',TRUE),
		'FixedPhoneNumber' => $this->input->post('FixedPhoneNumber',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'PhoneNumber2' => $this->input->post('PhoneNumber2',TRUE),
		'EmergencyName' => $this->input->post('EmergencyName',TRUE),
		'EmergencyStatus' => $this->input->post('EmergencyStatus',TRUE),
		'EmergencyNumber' => $this->input->post('EmergencyNumber',TRUE),
		'EmergencyAddress' => $this->input->post('EmergencyAddress',TRUE),
		'Province' => $this->input->post('Province',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'MaritalStatus' => $this->input->post('MaritalStatus',TRUE),
		'Height' => $this->input->post('Height',TRUE),
		'Weight' => $this->input->post('Weight',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
		'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
		'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
		'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
		'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
		'HiringLevel' => $this->input->post('HiringLevel',TRUE),
		'HiringStatus' => $this->input->post('HiringStatus',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
		'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
		'IsDedicated' => $this->input->post('IsDedicated',TRUE),
		'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'EndDate' => $this->input->post('EndDate',TRUE),
		'EndReason' => $this->input->post('EndReason',TRUE),
		'CreatedDate' => $this->input->post('CreatedDate',TRUE),
		'CreatedBy' => $this->input->post('CreatedBy',TRUE),
	    );

            $this->Employee_model->update($this->input->post('EmployeeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $this->Employee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ParentEmployeeID', 'parentemployeeid', 'trim|required');
	$this->form_validation->set_rules('EmployeeName', 'employeename', 'trim|required');
	$this->form_validation->set_rules('EmployeeOldCode', 'employeeoldcode', 'trim|required');
	$this->form_validation->set_rules('EmployeeNewCode', 'employeenewcode', 'trim|required');
	$this->form_validation->set_rules('UserGroupID', 'usergroupid', 'trim|required');
	$this->form_validation->set_rules('EmployeeStatus', 'employeestatus', 'trim|required');
	$this->form_validation->set_rules('EmployeeGrade', 'employeegrade', 'trim|required');
	$this->form_validation->set_rules('EmployeeBirthPlace', 'employeebirthplace', 'trim|required');
	$this->form_validation->set_rules('EmployeeBirthDate', 'employeebirthdate', 'trim|required');
	$this->form_validation->set_rules('MothersMaidenName', 'mothersmaidenname', 'trim|required');
	$this->form_validation->set_rules('IdentityType', 'identitytype', 'trim|required');
	$this->form_validation->set_rules('IdentityNumber', 'identitynumber', 'trim|required');
	$this->form_validation->set_rules('IdentityFilePath', 'identityfilepath', 'trim|required');
	$this->form_validation->set_rules('IdentityFileName', 'identityfilename', 'trim|required');
	$this->form_validation->set_rules('Sex', 'sex', 'trim|required');
	$this->form_validation->set_rules('Religion', 'religion', 'trim|required');
	$this->form_validation->set_rules('NPWP', 'npwp', 'trim|required');
	$this->form_validation->set_rules('FixedPhoneNumber', 'fixedphonenumber', 'trim|required');
	$this->form_validation->set_rules('PhoneNumber', 'phonenumber', 'trim|required');
	$this->form_validation->set_rules('PhoneNumber2', 'phonenumber2', 'trim|required');
	$this->form_validation->set_rules('EmergencyName', 'emergencyname', 'trim|required');
	$this->form_validation->set_rules('EmergencyStatus', 'emergencystatus', 'trim|required');
	$this->form_validation->set_rules('EmergencyNumber', 'emergencynumber', 'trim|required');
	$this->form_validation->set_rules('EmergencyAddress', 'emergencyaddress', 'trim|required');
	$this->form_validation->set_rules('Province', 'province', 'trim|required');
	$this->form_validation->set_rules('StreetAddress', 'streetaddress', 'trim|required');
	$this->form_validation->set_rules('PostalCode', 'postalcode', 'trim|required');
	$this->form_validation->set_rules('EmailAddress', 'emailaddress', 'trim|required');
	$this->form_validation->set_rules('MaritalStatus', 'maritalstatus', 'trim|required');
	$this->form_validation->set_rules('Height', 'height', 'trim|required');
	$this->form_validation->set_rules('Weight', 'weight', 'trim|required');
	$this->form_validation->set_rules('PhotoFilePath', 'photofilepath', 'trim|required');
	$this->form_validation->set_rules('PhotoFileName', 'photofilename', 'trim|required');
	$this->form_validation->set_rules('AgencyID', 'agencyid', 'trim|required');
	$this->form_validation->set_rules('SalesCenterID', 'salescenterid', 'trim|required');
	$this->form_validation->set_rules('InterviewApprovalID', 'interviewapprovalid', 'trim|required');
	$this->form_validation->set_rules('InterviewLevel', 'interviewlevel', 'trim|required');
	$this->form_validation->set_rules('InterviewStatus', 'interviewstatus', 'trim|required');
	$this->form_validation->set_rules('HiringApprovalID', 'hiringapprovalid', 'trim|required');
	$this->form_validation->set_rules('HiringLevel', 'hiringlevel', 'trim|required');
	$this->form_validation->set_rules('HiringStatus', 'hiringstatus', 'trim|required');
	$this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('ApprovalLevel', 'approvallevel', 'trim|required');
	$this->form_validation->set_rules('ApprovalStatus', 'approvalstatus', 'trim|required');
	$this->form_validation->set_rules('IsDiscontinued', 'isdiscontinued', 'trim|required');
	$this->form_validation->set_rules('IsDedicated', 'isdedicated', 'trim|required');
	$this->form_validation->set_rules('DedicatedRemark', 'dedicatedremark', 'trim|required');
	$this->form_validation->set_rules('ActiveDate', 'activedate', 'trim|required');
	$this->form_validation->set_rules('EndDate', 'enddate', 'trim|required');
	$this->form_validation->set_rules('EndReason', 'endreason', 'trim|required');
	$this->form_validation->set_rules('CreatedDate', 'createddate', 'trim|required');
	$this->form_validation->set_rules('CreatedBy', 'createdby', 'trim|required');

	$this->form_validation->set_rules('EmployeeID', 'EmployeeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "employee.xls";
        $judul = "employee";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ParentEmployeeID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeName");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeOldCode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeNewCode");
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeGrade");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeBirthPlace");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeBirthDate");
	xlsWriteLabel($tablehead, $kolomhead++, "MothersMaidenName");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityType");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityFileName");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "Religion");
	xlsWriteLabel($tablehead, $kolomhead++, "NPWP");
	xlsWriteLabel($tablehead, $kolomhead++, "FixedPhoneNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber2");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyName");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "Province");
	xlsWriteLabel($tablehead, $kolomhead++, "StreetAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "PostalCode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmailAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "MaritalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "Height");
	xlsWriteLabel($tablehead, $kolomhead++, "Weight");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFileName");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyID");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterID");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "IsDiscontinued");
	xlsWriteLabel($tablehead, $kolomhead++, "IsDedicated");
	xlsWriteLabel($tablehead, $kolomhead++, "DedicatedRemark");
	xlsWriteLabel($tablehead, $kolomhead++, "ActiveDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EndDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EndReason");
	xlsWriteLabel($tablehead, $kolomhead++, "CreatedDate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreatedBy");

	foreach ($this->Employee_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ParentEmployeeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeOldCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeNewCode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeGrade);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeBirthPlace);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeBirthDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MothersMaidenName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityFileName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Religion);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NPWP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FixedPhoneNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Province);
	    xlsWriteLabel($tablebody, $kolombody++, $data->StreetAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PostalCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmailAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MaritalStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Height);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Weight);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFileName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AgencyID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->SalesCenterID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsDiscontinued);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsDedicated);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DedicatedRemark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ActiveDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndReason);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CreatedDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CreatedBy);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=employee.doc");

        $data = array(
            'employee_data' => $this->Employee_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('employee_doc',$data);
    }

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 05:43:19 */
/* http://harviacode.com */