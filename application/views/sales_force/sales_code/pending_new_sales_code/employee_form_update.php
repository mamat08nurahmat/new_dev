<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>EMPLOYEE</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>

	    <tr><td>EmployeeName <?php echo form_error('EmployeeName') ?></td>
            <td><input type="text" class="form-control" name="EmployeeName" id="EmployeeName" placeholder="EmployeeName" value="<?php echo $EmployeeName; ?>" />
        </td>

	    <tr><td>EmployeeNewCode <?php echo form_error('EmployeeNewCode') ?></td>
            <td><input type="text" class="form-control" name="EmployeeNewCode" id="EmployeeNewCode" placeholder="EmployeeNewCode" value="<?php echo $EmployeeNewCode; ?>" />
        </td>


	    <tr><td>ActiveDate <?php echo form_error('ActiveDate') ?></td>
            <td><input type="date" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </td>

	    <input type="hidden" name="EmployeeID" value="<?php echo $EmployeeID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->