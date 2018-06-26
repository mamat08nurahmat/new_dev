
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Paymentdt Read</h3>
        <table class="table table-bordered">
	    <tr><td>Month</td><td><?php echo $Month; ?></td></tr>
	    <tr><td>Year</td><td><?php echo $Year; ?></td></tr>
	    <tr><td>CardLogo</td><td><?php echo $CardLogo; ?></td></tr>
	    <tr><td>CardType</td><td><?php echo $CardType; ?></td></tr>
	    <tr><td>MonthGenerate</td><td><?php echo $MonthGenerate; ?></td></tr>
	    <tr><td>YearGenerate</td><td><?php echo $YearGenerate; ?></td></tr>
	    <tr><td>CardCount</td><td><?php echo $CardCount; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('paymentdt') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->