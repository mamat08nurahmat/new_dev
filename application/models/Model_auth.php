<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_auth extends MY_Model {

	private $primary_key 	= 'UserID';
	private $table_name 	= 'AppUser';
	// private $field_search 	= array('email', 'username', 'full_name');

	public function __construct()
	{	
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	// 'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}


    function login($email, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('AppUser');
        $this->db->where('EmailAddress', $email);
        //$this->db->where('password', MD5($password));
        $this->db->where('Password', $password);
//        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
//var_dump($q);die();
//        return $query->result();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
/*
*/

    }






}