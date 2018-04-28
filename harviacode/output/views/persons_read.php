
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Persons Read</h3>
        <table class="table table-bordered">
	    <tr><td>LastName</td><td><?php echo $LastName; ?></td></tr>
	    <tr><td>FirstName</td><td><?php echo $FirstName; ?></td></tr>
	    <tr><td>Age</td><td><?php echo $Age; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('persons') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->