
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PERFORMANCEUNMATCH LIST <?php echo anchor('performanceunmatch/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('performanceunmatch/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('performanceunmatch/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('performanceunmatch/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->

<!---FILTER--->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Filter</button></h3>
            </div>
			

			<div id="demo" class="collapse">
  
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
				
                    <div class="form-group">
                        <label for="month" class="col-sm-2 control-label">Month</label>
                        <div class="col-sm-4">
                            <select name="month" id="month">
							<option value="1">Januari</option>
							<option value="2">Ferbuari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
							</select>
							
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="year" class="col-sm-2 control-label">Year</label>
                        <div class="col-sm-4">
                            <select name="year" id="year">
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
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
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>ApplicationSource</th>
<!---
		    <th>BatchID</th>
-->			
		    <th>Month</th>
		    <th>Year</th>
		    <th>Sales Center</th>
<!--
		    <th>EmployeeID</th>
-->			
		    <th>OldSourceCode</th>
		    <th>NewSourceCode</th>
		    <th>Remark</th>
<!--
		    <th>ProposedDate</th>
		    <th>ProposedBy</th>
		    <th>ApprovalID</th>
		    <th>IsGenerateCorrection</th>
-->			
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($performanceunmatch_data as $performanceunmatch)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $performanceunmatch->ApplicationSource ?></td>
<!--
		    <td><?php //echo $performanceunmatch->BatchID ?></td>
-->			
		    <td><?php echo $performanceunmatch->Month ?></td>
		    <td><?php echo $performanceunmatch->Year ?></td>

			<td><?php echo $performanceunmatch->SalesCenterName ?></td>
<!--
		    <td><?php //echo $performanceunmatch->EmployeeID ?></td>
-->						
		    <td><?php echo $performanceunmatch->OldSourceCode ?></td>
		    <td><?php echo $performanceunmatch->NewSourceCode ?></td>
		    <td><?php echo $performanceunmatch->Remark ?></td>
<!--
		    <td><?php echo $performanceunmatch->ProposedDate ?></td>
		    <td><?php echo $performanceunmatch->ProposedBy ?></td>
		    <td><?php echo $performanceunmatch->ApprovalID ?></td>
		    <td><?php echo $performanceunmatch->IsGenerateCorrection ?></td>
-->						
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('performanceunmatch/read/'.$performanceunmatch->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('performanceunmatch/update/'.$performanceunmatch->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
//			echo anchor(site_url('performanceunmatch/delete/'.$performanceunmatch->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
if($performanceunmatch->NewSourceCode!=NULL){
	
			echo anchor(site_url('performanceunmatch/proses_performancedetail/'.$performanceunmatch->BatchID.'/'.$performanceunmatch->RowID),'Approve','title="approve" class="btn btn-info btn-sm" onclick="javasciprt: return confirm(\'Are You Sure Approve Unmatch?\')"'); 
}
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();

//button filter		
$("#btn-filter").click(function(){
	
//alert('filterrr');	
var month = $('#month').val();
var year = $('#year').val();

var urls= '<?php echo site_url('performanceunmatch/by_m_y/')?>/'+month+'/'+year;
	window.location = urls;
});		
				
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->