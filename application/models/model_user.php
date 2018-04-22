<?php
class Model_user extends CI_Model{

    function __construct(){
    parent::__construct();
    }
  
    //    KODE USER
    public function getKodeUser(){
        $q = $this->db->query("select MAX(UserID) as kd_max from AppUser");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
//        return "K-".$kd;
          return $kd;
    }

	
	
	
    // Get Area
    function getArea($postData){
        $response = array();
        
        // Select record
        $this->db->select('AreaID,AreaName');
        $this->db->where('AreaGroupID', $postData['area_grup']);
        $q = $this->db->get('Area');
        $response = $q->result_array();
		//join agrncy salescenter

        return $response;
    }


    // Get Agency
    function getAgency($postData){
        $response = array();
        
        // Select record
/*
        $this->db->select('AgencyID,AgencyName');
        $this->db->where('AreaID', $postData['area']);
        $q = $this->db->get('Area');
*/		
$area_id = $postData['area'];
$q = $this->db->query("
SELECT a.AgencyID, a.AgencyName 
FROM Agency a
JOIN AgencySalesCenter b ON a.AgencyID=b.AgencyID
WHERE b.AreaID='$area_id'
");
        $response = $q->result_array();

        return $response;
    }


    // Get Sales Center
    function getSalesCenter($postData){
        $response = array();
        
        // Select record
/*
        $this->db->select('AgencyID,AgencyName');
        $this->db->where('AreaID', $postData['area']);
        $q = $this->db->get('Area');
*/		
$agency_id = $postData['agency'];
$q = $this->db->query("
SELECT SalesCenterID, SalesCenterName
FROM AgencySalesCenter 
WHERE AgencyID='$agency_id'
");
        $response = $q->result_array();

        return $response;
    }

	
//-------------------------------------------------------------------
    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    function insertData($table,$data)
    {
     return   $this->db->insert($table,$data);
    }
    function manualQuery($q)
    {
        return $this->db->query($q);
    }
//-------------------------------------------------------------------

    function login($email, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

}