<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PERFORMANCEEMPLOYEE</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>BatchID <?php echo form_error('BatchID') ?></td>
            <td><input type="text" class="form-control" name="BatchID" id="BatchID" placeholder="BatchID" value="<?php echo $BatchID; ?>" />
        </td>
	    <tr><td>ApplicationSource <?php echo form_error('ApplicationSource') ?></td>
            <td><input type="text" class="form-control" name="ApplicationSource" id="ApplicationSource" placeholder="ApplicationSource" value="<?php echo $ApplicationSource; ?>" />
        </td>
	    <tr><td>AsOfDate <?php echo form_error('AsOfDate') ?></td>
            <td><input type="text" class="form-control" name="AsOfDate" id="AsOfDate" placeholder="AsOfDate" value="<?php echo $AsOfDate; ?>" />
        </td>
	    <tr><td>EmployeeID <?php echo form_error('EmployeeID') ?></td>
            <td><input type="text" class="form-control" name="EmployeeID" id="EmployeeID" placeholder="EmployeeID" value="<?php echo $EmployeeID; ?>" />
        </td>
	    <input type="hidden" name="RowID" value="<?php echo $RowID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('performanceemployee') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->