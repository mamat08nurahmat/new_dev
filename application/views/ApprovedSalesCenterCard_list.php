
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PERFORMANCEDETAIL LIST <?php echo anchor('performancedetail/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('performancedetail/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('performancedetail/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('performancedetail/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
				
<!---FILTER--->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Filter</button></h3>
            </div>
			

			<div id="demo" class="collapse">
  
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
<!---
                    <div class="form-group">
                        <label for="agency" class="col-sm-2 control-label">Agency</label>
                        <div class="col-sm-4">
                            <?php// echo $select_agency; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="salescenter" class="col-sm-2 control-label">Sales Center</label>
                        <div class="col-sm-4">
                            <?php //echo $select_sales_center; ?>
                        </div>
                    </div>
-->				

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-4">
                            <?php //echo $select_bulan; ?>
							<select name="bulan">
							<option value='1'>Januari</option>
							<option value='1'>Januari</option>
							<option value='1'>Januari</option>
							<option value='1'>Januari</option>
							<option value='1'>Januari</option>
							<option value='1'>Januari</option>
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="interviewstatus" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-4">
                            <?php //echo $select_tahun; ?>
							<select name="tahun">
							<option value='2016'>2016</option>
							<option value='2017'>2017</option>
							<option value='2018'>2018</option>
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hiringstatus" class="col-sm-2 control-label">Jenis Kartu</label>
                        <div class="col-sm-4">
                            <?php //echo $select_jenis_kartu; ?>
							<select name="jenis_kartu">
							<option value='approve'>APPROVE</option>
							<option value='incoming'>INCOMING</option>
							</select>
                        </div>
                    </div>


					

					
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
				</div>
			</div>						
        </div>			
<!---FILTER--->			
				
				

				
				
                <div class='box-body'>
				
<!--
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
		    <th>Open Date</th>
		    <th>Ch</th>
		    <th>Kd Agc</th>
		    <th>Kd DSR</th>
		    <th>Nama DSR</th>
		    <th>Status</th>
		    <th>Grade</th>
		    <th>Nama SPV</th>
		    <th>Nama Agency</th>
		    <th>Nama Nasabah</th>
		    <th>DOB</th>
		    <th>Jenis Kartu</th>
		    <th>St</th>
		    <th>Block/DC</th>
		    <th>Promo</th>
		    <th>Kartu 1	</th>
		    <th>Kartu 2</th>
		    <th>Program</th>
		    <th>Action</th>
                </tr>
            </thead>
			<tbody>

            </tbody>
        </table>
-->						
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
			
			
   $('#btn-filter').click(function(){ //button filter event click
   console.log('filter klik');
       // table.ajax.reload();  //just reload table
    });			
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->