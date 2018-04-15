<?php

class Model_sales_center extends MY_Model{
	
    private $primary_key    = 'AgencySalesCenter';
    private $table_name     = 'SalesCenterID';
    // private $field_search    = array('email', 'username', 'full_name');

    public function __construct()
    {   
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            // 'field_search'   => $this->field_search,
         );

        parent::__construct($config);
    }


public function getCity($post_data){
	
$response = array();
// $this->db->select('CityID','CityName');
// $this->db->where('AreaID'$post_data['area_id']);
$response = $this->db->get('City')->result_array();

return $response;	

}


   // Get Agency
    function getKota($postData){
        $response = array();
        
        // Select record
/*
        $this->db->select('AgencyID,AgencyName');
        $this->db->where('AreaID', $postData['area']);
        $q = $this->db->get('Area');
*/		
$area_id = $postData['area'];
// $q = $this->db->query("
// SELECT a.AgencyID, a.AgencyName 
// FROM Agency a
// JOIN AgencySalesCenter b ON a.AgencyID=b.AgencyID
// WHERE b.AreaID='$area_id'
// ");
$q = $this->db->query("
SELECT a.CityID, a.CityName 
FROM City a

WHERE b.AreaID='$area_id'
");


        $response = $q->result_array();

        return $response;
    }



}