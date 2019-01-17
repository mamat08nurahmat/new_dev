
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SYSTEMEDC LIST <?php echo anchor('systemedc/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('systemedc/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('systemedc/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('systemedc/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>BatchID</th>
		    <th>AsOfDate</th>
		    <th>MID</th>
		    <th>MID NAME</th>
		    <th>MSO</th>
		    <th>SOURCE CODE</th>
		    <th>WILAYAH</th>
		    <th>CHANNEL</th>
		    <th>EDC</th>
		    <th>EXH</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($systemedc_data as $systemedc)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $systemedc->BatchID ?></td>
		    <td><?php echo $systemedc->AsOfDate ?></td>
		    <td><?php echo $systemedc->MID ?></td>
		    <td><?php echo $systemedc->MID_NAME ?></td>
		    <td><?php echo $systemedc->MSO ?></td>
		    <td><?php echo $systemedc->SOURCE_CODE ?></td>
		    <td><?php echo $systemedc->WILAYAH ?></td>
		    <td><?php echo $systemedc->CHANNEL ?></td>
		    <td><?php echo $systemedc->EDC ?></td>
		    <td><?php echo $systemedc->EXH ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('systemedc/read/'.$systemedc->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('systemedc/update/'.$systemedc->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('systemedc/delete/'.$systemedc->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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