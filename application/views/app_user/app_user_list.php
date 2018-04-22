<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini
      <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatable/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
-->
 <!-- DATA TABLES -->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />



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
        <li class="active"><?=$active;?></li>
    </ol>
</section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
			

              <div class="box">
                <div class="box-header">
				

<div class="btn-group">
<a href="<?=site_url('app_user/add')?>">
<button type="button" class="btn btn-success">ADD</button>
</a>  



</div>
				  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>User Grup</th>
                        <th>Email</th>
                        <th>Area</th>
                        <th>Agency</th>
                        <th>ACTION</th>
						
                      </tr>
                    </thead>
                    <tbody>
					
<!---- <TR> Loooping-->					  				
<?php
foreach($query_user_list as $x){
?>					

                      <tr>
                        <td><?=$x->nama;?></td>
                        <td><?=$x->user_grup;?></td>
                        <td><?=$x->email;?></td>
                        <td><?=$x->nama_area;?></td>
                        <td><?=$x->nama_agency;?></td>
						
                        <td>
						
<div class="btn-group">				  
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-view">VIEW</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">EDIT</button>
<button type="button" class="btn btn-danger">DELETE</button>
</div>						
						</td>
						
                      </tr>

<?php
}
?>					  
					  
<!---- <TR> Loooping-->					  
                      
					  </tbody>
                    <tfoot>
                      <tr>
					            	<th>Nama</th>
                        <th>User Grup</th>
                        <th>Email</th>
                        <th>Area</th>
                        <th>Agency</th>
                        <th>ACTION</th>
                      </tr>
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
<!--tambahkan custom js disini-->
<!-- DATA TABLE 

<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jquery.dataTables.min.js') ?>"></script>
-->



<!-- DATA TABES SCRIPT -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
/*
*/	
  })
</script>


<div id="modalAddUser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Create Data User</h3>
    </div>
	
    <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_user')?>">
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label">User Code</label>
                <div class="controls">
                    <input name="kd_user" type="text" value="<?php echo $kd_user; ?>" readonly>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >User Mail</label>
                <div class="controls">
                    <input name="email" type="email" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >Password</label>
                <div class="controls">
                    <input name="password" type="password" required>
                </div>
            </div>

            <hr/>

            <div class="control-group">
                <label class="control-label">User Name</label>
                <div class="controls">
                    <input name="nama" type="text">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Level</label>
                <div class="controls">
                    <select name="level" id="level">
                        <option value=""> = Pilih Level Akses = </option>
                        <option value="KAE">Key Admin Executive</option>
                        <option value="AO">Account Officcer</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save</button>
        </div>
    </form>

</div>





<!------MODAL ADD
<div id="modal-add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">		
---->
        <div class="modal modal-success fade" id="modal-add"  >
<!---
-->
          <div class="modal-dialog">
            <div class="modal-content">
			
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ADD Modal</h4>
              </div>
<!---
-->			  
              <div class="modal-body">
			  
			  

            <form class="form-horizontal method="post" ">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
				  
                </div>

				
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama">
                  </div>
				  
                </div>

				
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
				

              </div>
            </div>
          </div>
            <!--
			/.modal-content -->
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


		
		
		
		
<!------MODAL VIEW---->
        <div class="modal modal-info fade" id="modal-view">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">VIEW Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		

<!------MODAL EDIT---->
        <div class="modal modal-warning fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EDIT Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

		

<?php
$this->load->view('template/foot');
?>
