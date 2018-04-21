<?php
class Csv_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('BatchID', 'DESC');
		$query = $this->db->get('SystemUpload');
		return $query;
	}



	function get_BatchID()
	{
	
		$query = $this->db->query('SELECT MAX(BatchID)+1 as BatchID FROM SystemUpload');
$BatchID=$query->result();		

		return $BatchID[0]->BatchID;
	}

	function insert($data)
	{
		$this->db->insert_batch('tbl_user', $data);
	}
}
