<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	function index()
	{
		$this->load->view('csv_import');
	}

	function load_data()
	{
		$result = $this->csv_import_model->select();

		$output = '
		 <h3 align="center">Imported User Details from CSV File</h3>
        <div class="table-responsive">
        	<table class="table table-bordered table-striped">
        		<tr>
        			<th>BatchID</th>
        			<th>Upload Remark</th>
        			<th>Jenis Aplikasi</th>
        			<th>Month</th>
        			<th>Year</th>
        			<th>ACT</th>
        		</tr>
		';
		// $count = 0;
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				// $count = $count + 1;
				$output .= '
				<tr>
					<td>'.$row->BatchID.'</td>
					<td>'.$row->UploadRemark.'</td>
					<td>'.$row->ApplicationSource.'</td>
					<td>'.$row->ProcessMonth.'</td>
					<td>'.$row->ProcessYear.'</td>

					<td>

<a href='.site_url('csv_import/view_import').'/'.$row->BatchID.'>
<button>VIEW</button>
</a>					
					
					</td>
				</tr>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
	    		<td colspan="5" align="center">Data not Available</td>
	    	</tr>
			';
		}
		$output .= '</table></div>';
		echo $output;
	}

	function view_import($BatchID){

	echo $BatchID ;

	}

	function import()
	{

		// $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		// foreach($file_data as $row)
		// {
		// 	$data[] = array(
		// 		'first_name'	=>	$row["First Name"],
  //       		'last_name'		=>	$row["Last Name"],
  //       		'phone'			=>	$row["Phone"],
  //       		'email'			=>	$row["Email"]
		// 	);
		// }
		// $this->csv_import_model->insert($data);
echo "<h1>cccccccccccc</h1>";		
	}

	function tes(){

		echo "<h1>xxxxxxxxxxxxx</h1>";

	}
	
		
}
