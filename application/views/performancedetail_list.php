
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
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>BatchID</th>
		    <th>ApplicationSource</th>
		    <th>AsOfDate</th>
		    <th>CustomerName</th>
		    <th>CustomerBirthDate</th>
		    <th>Parameter1</th>
		    <th>Parameter2</th>
		    <th>Parameter3</th>
		    <th>Parameter4</th>
		    <th>Parameter5</th>
		    <th>Parameter6</th>
		    <th>Parameter7</th>
		    <th>Parameter8</th>
		    <th>Parameter9</th>
		    <th>Parameter10</th>
		    <th>Parameter11</th>
		    <th>Parameter12</th>
		    <th>Parameter13</th>
		    <th>Parameter14</th>
		    <th>Parameter15</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($performancedetail_data as $performancedetail)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $performancedetail->BatchID ?></td>
		    <td><?php echo $performancedetail->ApplicationSource ?></td>
		    <td><?php echo $performancedetail->AsOfDate ?></td>
		    <td><?php echo $performancedetail->CustomerName ?></td>
		    <td><?php echo $performancedetail->CustomerBirthDate ?></td>
		    <td><?php echo $performancedetail->Parameter1 ?></td>
		    <td><?php echo $performancedetail->Parameter2 ?></td>
		    <td><?php echo $performancedetail->Parameter3 ?></td>
		    <td><?php echo $performancedetail->Parameter4 ?></td>
		    <td><?php echo $performancedetail->Parameter5 ?></td>
		    <td><?php echo $performancedetail->Parameter6 ?></td>
		    <td><?php echo $performancedetail->Parameter7 ?></td>
		    <td><?php echo $performancedetail->Parameter8 ?></td>
		    <td><?php echo $performancedetail->Parameter9 ?></td>
		    <td><?php echo $performancedetail->Parameter10 ?></td>
		    <td><?php echo $performancedetail->Parameter11 ?></td>
		    <td><?php echo $performancedetail->Parameter12 ?></td>
		    <td><?php echo $performancedetail->Parameter13 ?></td>
		    <td><?php echo $performancedetail->Parameter14 ?></td>
		    <td><?php echo $performancedetail->Parameter15 ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('performancedetail/read/'.$performancedetail->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('performancedetail/update/'.$performancedetail->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('performancedetail/delete/'.$performancedetail->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->