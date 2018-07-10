<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salaryparameter_model extends CI_Model
{

    public $table = 'salaryparameter';
    public $id = 'ParameterID';
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
        $this->db->like('ParameterID', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('ComponentID', $q);
	$this->db->or_like('StartDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('TargetTypeID', $q);
	$this->db->or_like('Product1', $q);
	$this->db->or_like('Product2', $q);
	$this->db->or_like('Param1', $q);
	$this->db->or_like('Param2', $q);
	$this->db->or_like('Nominal', $q);
	$this->db->or_like('IsMultiplier', $q);
	$this->db->or_like('IsBasicSalary', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ParameterID', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('ComponentID', $q);
	$this->db->or_like('StartDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('TargetTypeID', $q);
	$this->db->or_like('Product1', $q);
	$this->db->or_like('Product2', $q);
	$this->db->or_like('Param1', $q);
	$this->db->or_like('Param2', $q);
	$this->db->or_like('Nominal', $q);
	$this->db->or_like('IsMultiplier', $q);
	$this->db->or_like('IsBasicSalary', $q);
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

/* End of file Salaryparameter_model.php */
/* Location: ./application/models/Salaryparameter_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:26 */
/* http://harviacode.com */