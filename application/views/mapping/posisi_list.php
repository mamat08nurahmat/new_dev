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
           <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
				  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
					
                      <tr style="bg-color:blue;">
                        <th>No</th>
                        <th>Sales Code</th>
                        <th>Atasan</th>
                        <th>Posisi</th>
                        <th>Agency</th>
                        <th>Sales Center</th>
                        <th>Nama Lengkap</th>

                        <!--
                        <th>Tanggal Proses</th>
                        -->
            						<th>Aksi</th>						
                        </tr>
                    </thead>
                    <tbody>

<?php
$i=1;
foreach($query_mapping as $datas){	
//echo $datas->atasan;

// if ($datas->IsDiscontinued != 1  ) {
//   # code...
// $tombol ="";

// $tombol .="
// <a class='btn btn-mini' href=' ".site_url('mapping/view/'.$datas->id.'/'.$datas->no_ktp.'/')."'>
//             <button type='button' class='btn btn-primary'>VIEW</button>
//             </a>            
//           ";
// $tgl_now = date("d");

//   // if($tgl_now<=7){


//   $tombol .="
//   <a class='btn btn-mini' href=' ".site_url('mapping/terminate/'.$datas->id.'/'.$datas->no_ktp.'/')."'>
//               <button type='button' class='btn btn-danger'>TERMINATE</button>
//               </a>            
//             ";
//   // }        
// } else {

$tombol ="";

$tgl_now = date("d");
//maksimal tanggal 7
if($tgl_now<=17){

$tombol .="
<a class='btn btn-mini' href=' ".site_url('mapping/mapping_posisi/'.$datas->id.'/'.$datas->no_ktp.'/')."'>
            <button type='button' class='btn btn-primary'>MAPPING POSISI</button>
            </a>            
          ";

} 



$tombol .="
<a class='btn btn-mini' href=' ".site_url('mapping/view/'.$datas->id.'/'.$datas->no_ktp.'/')."'>
            <button type='button' class='btn btn-primary'>VIEW</button>
            </a>            
          ";





// }







	
?>


		<tr>
          <td><?=$i++;?></td>
          <td><?=$datas->sales_code;?></td>
          <td><?=$datas->atasan;?></td>
          <td><?=$datas->posisi;?></td>
          <td><?=$datas->agency;?></td>  
          <td><?=$datas->sales_center;?></td>
          <td><?=$datas->nama;?></td>
		  <?php $format=date('d-m-Y',strtotime($datas->tgl)); ?>
<!--
      <td><?=$format;?></td>
-->      
          <td>
<?=$tombol;?>
<!---
            <a class="btn btn-mini" href="<?php echo site_url("mapping/update/".$datas->id."/".$datas->no_ktp."/")?>">
            <button type="button" class="btn btn-primary" >UPDATE</button>
            </a>
-->

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
    </script>



<?php
$this->load->view('template/foot');
?>
