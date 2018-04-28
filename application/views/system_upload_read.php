
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>System_upload Read</h3>
        <table class="table table-bordered">
	    <tr><td>BatchID</td><td><?php echo $BatchID; ?></td></tr>
	    <tr><td>UploadDate</td><td><?php echo $UploadDate; ?></td></tr>
	    <tr><td>UploadBy</td><td><?php echo $UploadBy; ?></td></tr>
	    <tr><td>UploadRemark</td><td><?php echo $UploadRemark; ?></td></tr>
	    <tr><td>ApplicationSource</td><td><?php echo $ApplicationSource; ?></td></tr>
	    <tr><td>ProcessMonth</td><td><?php echo $ProcessMonth; ?></td></tr>
	    <tr><td>ProcessYear</td><td><?php echo $ProcessYear; ?></td></tr>
	    <tr><td>FilePath</td><td><?php echo $FilePath; ?></td></tr>
	    <tr><td>VirtualPath</td><td><?php echo $VirtualPath; ?></td></tr>
	    <tr><td>FileSize</td><td><?php echo $FileSize; ?></td></tr>
	    <tr><td>ReportPath</td><td><?php echo $ReportPath; ?></td></tr>
	    <tr><td>RowDataCount</td><td><?php echo $RowDataCount; ?></td></tr>
	    <tr><td>RowDataSucceed</td><td><?php echo $RowDataSucceed; ?></td></tr>
	    <tr><td>RowDataFailed</td><td><?php echo $RowDataFailed; ?></td></tr>
	    <tr><td>ApprovalID</td><td><?php echo $ApprovalID; ?></td></tr>
	    <tr><td>StatusUpload</td><td><?php echo $StatusUpload; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('system_upload') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->