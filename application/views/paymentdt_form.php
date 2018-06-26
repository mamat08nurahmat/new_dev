<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PAYMENTDT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Month <?php echo form_error('Month') ?></td>
            <td><input type="text" class="form-control" name="Month" id="Month" placeholder="Month" value="<?php echo $Month; ?>" />
        </td>
	    <tr><td>Year <?php echo form_error('Year') ?></td>
            <td><input type="text" class="form-control" name="Year" id="Year" placeholder="Year" value="<?php echo $Year; ?>" />
        </td>
	    <tr><td>CardLogo <?php echo form_error('CardLogo') ?></td>
            <td><input type="text" class="form-control" name="CardLogo" id="CardLogo" placeholder="CardLogo" value="<?php echo $CardLogo; ?>" />
        </td>
	    <tr><td>CardType <?php echo form_error('CardType') ?></td>
            <td><input type="text" class="form-control" name="CardType" id="CardType" placeholder="CardType" value="<?php echo $CardType; ?>" />
        </td>
	    <tr><td>MonthGenerate <?php echo form_error('MonthGenerate') ?></td>
            <td><input type="text" class="form-control" name="MonthGenerate" id="MonthGenerate" placeholder="MonthGenerate" value="<?php echo $MonthGenerate; ?>" />
        </td>
	    <tr><td>YearGenerate <?php echo form_error('YearGenerate') ?></td>
            <td><input type="text" class="form-control" name="YearGenerate" id="YearGenerate" placeholder="YearGenerate" value="<?php echo $YearGenerate; ?>" />
        </td>
	    <tr><td>CardCount <?php echo form_error('CardCount') ?></td>
            <td><input type="text" class="form-control" name="CardCount" id="CardCount" placeholder="CardCount" value="<?php echo $CardCount; ?>" />
        </td>
	    <input type="hidden" name="EmployeeID" value="<?php echo $EmployeeID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paymentdt') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->