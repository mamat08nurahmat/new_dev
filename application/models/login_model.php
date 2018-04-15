<?php

class login_model extends CI_Model{	


    function __construct(){
    parent::__construct();
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