<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paymentdt_model extends CI_Model
{

    public $table = 'paymentdt';
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
	$this->db->or_like('Month', $q);
	$this->db->or_like('Year', $q);
	$this->db->or_like('CardLogo', $q);
	$this->db->or_like('CardType', $q);
	$this->db->or_like('MonthGenerate', $q);
	$this->db->or_like('YearGenerate', $q);
	$this->db->or_like('CardCount', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('EmployeeID', $q);
	$this->db->or_like('Month', $q);
	$this->db->or_like('Year', $q);
	$this->db->or_like('CardLogo', $q);
	$this->db->or_like('CardType', $q);
	$this->db->or_like('MonthGenerate', $q);
	$this->db->or_like('YearGenerate', $q);
	$this->db->or_like('CardCount', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // insert data batch
    function insert_batch($data_generates)
    {
        $this->db->insert_batch($this->table, $data_generates);
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

/* End of file Paymentdt_model.php */
/* Location: ./application/models/Paymentdt_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:24 */
/* http://harviacode.com */