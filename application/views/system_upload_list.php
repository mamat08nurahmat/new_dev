
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SYSTEM_UPLOAD LIST <?php echo anchor('system_upload/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('system_upload/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('system_upload/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('system_upload/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>BatchID</th>
		    <th>UploadDate</th>
		    <th>UploadBy</th>
		    <th>UploadRemark</th>
		    <th>ApplicationSource</th>
		    <th>ProcessMonth</th>
		    <th>ProcessYear</th>
		    <th>FilePath</th>
		    <th>VirtualPath</th>
		    <th>FileSize</th>
		    <th>ReportPath</th>
		    <th>RowDataCount</th>
		    <th>RowDataSucceed</th>
		    <th>RowDataFailed</th>
		    <th>ApprovalID</th>
		    <th>StatusUpload</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($system_upload_data as $system_upload)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $system_upload->BatchID ?></td>
		    <td><?php echo $system_upload->UploadDate ?></td>
		    <td><?php echo $system_upload->UploadBy ?></td>
		    <td><?php echo $system_upload->UploadRemark ?></td>
		    <td><?php echo $system_upload->ApplicationSource ?></td>
		    <td><?php echo $system_upload->ProcessMonth ?></td>
		    <td><?php echo $system_upload->ProcessYear ?></td>
		    <td><?php echo $system_upload->FilePath ?></td>
		    <td><?php echo $system_upload->VirtualPath ?></td>
		    <td><?php echo $system_upload->FileSize ?></td>
		    <td><?php echo $system_upload->ReportPath ?></td>
		    <td><?php echo $system_upload->RowDataCount ?></td>
		    <td><?php echo $system_upload->RowDataSucceed ?></td>
		    <td><?php echo $system_upload->RowDataFailed ?></td>
		    <td><?php echo $system_upload->ApprovalID ?></td>
		    <td><?php echo $system_upload->StatusUpload ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('system_upload/read/'.$system_upload->ID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('system_upload/update/'.$system_upload->ID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('system_upload/delete/'.$system_upload->ID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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