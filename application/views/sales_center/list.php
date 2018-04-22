<?php 
$this->load->view('template/head');
?>
<style>
.dataTables_filter label{
float : right;
	
}

.pagination{
float : right;
	
}
</style>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$title;?>		
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?=$title;?></a></li>
        <li class="active"><?=$subtitle;?></li>
    </ol>
</section>
       <!-- Main content -->
        <section class="content">

		<div class="row">
			<div class="col-xs-1">

			<a href="<? print $this->config->base_url() . 'index.php/sales_center/add_dev' ?> " type="button" class="btn btn-success" >Tambah data</a>
              <!--<button type="button" class="btn btn-success" data-toggle="modal" href="<?php //echo site_url('Sales_force/add')?>"><i class="glyphicon glyphicon-plus">
               ADD</i>
              </button>-->
			</div>		  
		</div>		
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Sales Center</h3>
				  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
					
                      <tr style="bg-color:blue;">
                        <th>No</th>
                        <th>Nama Agency</th>
						<th>Area</th>
                        <th>Kota</th>
                        <th>Type</th>
                        <th>Kode</th>
						<th>Nama Sales Center</th>
						<th style="width:110px;"><center>Aksi</center></th>	
                      </tr>
                    </thead>
                    <tbody>
<?php
$i=1;
foreach($query as $datas){
			/*if($datas->ket==1) {
                $ket = "Approve";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 
            }	
			elseif($datas->ket==2) {
				$ket = "Waiting approve rsm";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				";	
            }
			elseif($datas->ket==3) {
				$ket = "Waiting approve sgv wilayah";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 		
            }
			elseif($datas->ket==4) {
                $ket = "Waiting approve sgv pusat ";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 
            }elseif($datas->ket==5) {
                $ket = "Hold RSM";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==6) {
                $ket = "Hold sgv wilayah";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==7) {
                $ket = "Hold sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==8) {
                $ket = "Cancel sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==9) {
                $ket = "Cancel sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==10) {
                $ket = "Cancel sgv pusat";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				<a class='btn btn-mini' href='Sales_force/edit/".$datas->no_ktp."'><i class='glyphicon glyphicon-pencil'></i></a>
				"; 
            }elseif($datas->ket==11) {
				$ket = "REJECT RSM";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				";	
            }
			elseif($datas->ket==12) {
				$ket = "REJECT sgv wilayah";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 		
            }
			elseif($datas->ket==13) {
                $ket = "REJECT sgv pusat ";
				$tombol ="";	
				$tombol .="
				<a class='btn btn-mini' href='Sales_force/view/".$datas->no_ktp."'><i class='glyphicon glyphicon-search'></i></a>
				"; 
			}*/	
?>


		<tr>
          <td><?=$i++;?></td>
          <td><?=$datas->agency;?></td>  
          
          <td><?=$datas->area;?></td>
          <td><?=$datas->kota;?></td>
		  <td><?=$datas->type;?></td>
          <td><?=$datas->kode;?></td>
		  <td><?=$datas->nama;?></td>

          <td>

          	<div class="btn-group">	

		  					<a href="<?=site_url('sales_center/update/'.$datas->id.'')?>" >
						<button type="button" class="btn btn-primary">UPDATE</button>
						</a>


		  					<a href="<?=site_url('sales_center/view/'.$datas->id.'')?>" >
						<button type="button" class="btn btn-primary">VIEW</button>
						</a>
				</div>		


		  </td>	
		</tr>
<?php
}
?>
                    </tbody>
                    <tfoot>		  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?php 
    

$this->load->view('template/js');
?>
<!-- DATA TABES SCRIPT -->
    <script src="<?php echo $this->config->item('base_url') ?>assets/AdminLTE-2.0.5//plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url') ?>assets/AdminLTE-2.0.5//plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!--tambahkan custom js disini-->
<!-- page script -->
    <script type="text/javascript">
$(document).ready(function() {
       // $("#example1").dataTable();
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true
        });	
 
});
 
function cek()
{
    $.ajax({
		type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        }
    });

}	    
    </script>

<?php
$this->load->view('template/foot');
?>