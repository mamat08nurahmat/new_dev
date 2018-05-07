
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Employeedocument Read</h3>
        <table class="table table-bordered">
	    <tr><td>EmployeeDocumentID</td><td><?php echo $EmployeeDocumentID; ?></td></tr>
	    <tr><td>Remark</td><td><?php echo $Remark; ?></td></tr>
	    <tr><td>FileLocation</td><td><?php echo $FileLocation; ?></td></tr>
	    <tr><td>FileName</td><td><?php echo $FileName; ?></td></tr>
	    <tr><td>ContentType</td><td><?php echo $ContentType; ?></td></tr>
	    <tr><td>ContentLength</td><td><?php echo $ContentLength; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employeedocument') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->