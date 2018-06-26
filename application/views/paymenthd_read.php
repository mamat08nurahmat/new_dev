
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Paymenthd Read</h3>
        <table class="table table-bordered">
	    <tr><td>Month</td><td><?php echo $Month; ?></td></tr>
	    <tr><td>Year</td><td><?php echo $Year; ?></td></tr>
	    <tr><td>ApprovalID</td><td><?php echo $ApprovalID; ?></td></tr>
	    <tr><td>ApprovalLevel</td><td><?php echo $ApprovalLevel; ?></td></tr>
	    <tr><td>ApprovalStatus</td><td><?php echo $ApprovalStatus; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('paymenthd') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->