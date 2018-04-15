<?php
class template extends CI_Controller{
   
   
   // public function index(){
        // $data=array(
            // 'title'=>'Template'
        // );
        // $this->load->view('login',$data);
    // }
	
	public function index()
    {
       // $query	 = "hai"//$this->db->query("SELECT COUNT(*) jml FROM Employee")->result();
        //$data["jml"]=$query;
		//$query_employee["data"]	 ="10";
		$query_notif["data"] =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='1'")->result();
		
		//$query_history	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
		//$data = array
		//'query_history' 	=> $query_history
	//);	
        $this->load->view('template/topbar', $data);

    }

}
