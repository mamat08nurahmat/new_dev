<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends CI_Model
{

    public $table = 'employee';
    public $id = 'EmployeeID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('EmployeeID', $q);
	$this->db->or_like('ParentEmployeeID', $q);
	$this->db->or_like('EmployeeName', $q);
	$this->db->or_like('EmployeeOldCode', $q);
	$this->db->or_like('EmployeeNewCode', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('EmployeeBirthPlace', $q);
	$this->db->or_like('EmployeeBirthDate', $q);
	$this->db->or_like('MothersMaidenName', $q);
	$this->db->or_like('IdentityType', $q);
	$this->db->or_like('IdentityNumber', $q);
	$this->db->or_like('IdentityFilePath', $q);
	$this->db->or_like('IdentityFileName', $q);
	$this->db->or_like('Sex', $q);
	$this->db->or_like('Religion', $q);
	$this->db->or_like('NPWP', $q);
	$this->db->or_like('FixedPhoneNumber', $q);
	$this->db->or_like('PhoneNumber', $q);
	$this->db->or_like('PhoneNumber2', $q);
	$this->db->or_like('EmergencyName', $q);
	$this->db->or_like('EmergencyStatus', $q);
	$this->db->or_like('EmergencyNumber', $q);
	$this->db->or_like('EmergencyAddress', $q);
	$this->db->or_like('Province', $q);
	$this->db->or_like('StreetAddress', $q);
	$this->db->or_like('PostalCode', $q);
	$this->db->or_like('EmailAddress', $q);
	$this->db->or_like('MaritalStatus', $q);
	$this->db->or_like('Height', $q);
	$this->db->or_like('Weight', $q);
	$this->db->or_like('PhotoFilePath', $q);
	$this->db->or_like('PhotoFileName', $q);
	$this->db->or_like('AgencyID', $q);
	$this->db->or_like('SalesCenterID', $q);
	$this->db->or_like('InterviewApprovalID', $q);
	$this->db->or_like('InterviewLevel', $q);
	$this->db->or_like('InterviewStatus', $q);
	$this->db->or_like('HiringApprovalID', $q);
	$this->db->or_like('HiringLevel', $q);
	$this->db->or_like('HiringStatus', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('ApprovalLevel', $q);
	$this->db->or_like('ApprovalStatus', $q);
	$this->db->or_like('IsDiscontinued', $q);
	$this->db->or_like('IsDedicated', $q);
	$this->db->or_like('DedicatedRemark', $q);
	$this->db->or_like('ActiveDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('EndReason', $q);
	$this->db->or_like('CreatedDate', $q);
	$this->db->or_like('CreatedBy', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('EmployeeID', $q);
	$this->db->or_like('ParentEmployeeID', $q);
	$this->db->or_like('EmployeeName', $q);
	$this->db->or_like('EmployeeOldCode', $q);
	$this->db->or_like('EmployeeNewCode', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('EmployeeBirthPlace', $q);
	$this->db->or_like('EmployeeBirthDate', $q);
	$this->db->or_like('MothersMaidenName', $q);
	$this->db->or_like('IdentityType', $q);
	$this->db->or_like('IdentityNumber', $q);
	$this->db->or_like('IdentityFilePath', $q);
	$this->db->or_like('IdentityFileName', $q);
	$this->db->or_like('Sex', $q);
	$this->db->or_like('Religion', $q);
	$this->db->or_like('NPWP', $q);
	$this->db->or_like('FixedPhoneNumber', $q);
	$this->db->or_like('PhoneNumber', $q);
	$this->db->or_like('PhoneNumber2', $q);
	$this->db->or_like('EmergencyName', $q);
	$this->db->or_like('EmergencyStatus', $q);
	$this->db->or_like('EmergencyNumber', $q);
	$this->db->or_like('EmergencyAddress', $q);
	$this->db->or_like('Province', $q);
	$this->db->or_like('StreetAddress', $q);
	$this->db->or_like('PostalCode', $q);
	$this->db->or_like('EmailAddress', $q);
	$this->db->or_like('MaritalStatus', $q);
	$this->db->or_like('Height', $q);
	$this->db->or_like('Weight', $q);
	$this->db->or_like('PhotoFilePath', $q);
	$this->db->or_like('PhotoFileName', $q);
	$this->db->or_like('AgencyID', $q);
	$this->db->or_like('SalesCenterID', $q);
	$this->db->or_like('InterviewApprovalID', $q);
	$this->db->or_like('InterviewLevel', $q);
	$this->db->or_like('InterviewStatus', $q);
	$this->db->or_like('HiringApprovalID', $q);
	$this->db->or_like('HiringLevel', $q);
	$this->db->or_like('HiringStatus', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('ApprovalLevel', $q);
	$this->db->or_like('ApprovalStatus', $q);
	$this->db->or_like('IsDiscontinued', $q);
	$this->db->or_like('IsDedicated', $q);
	$this->db->or_like('DedicatedRemark', $q);
	$this->db->or_like('ActiveDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('EndReason', $q);
	$this->db->or_like('CreatedDate', $q);
	$this->db->or_like('CreatedBy', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 05:43:19 */
/* http://harviacode.com */