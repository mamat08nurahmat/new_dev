<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PAYMENTPERFORMANCEHD</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Month <?php echo form_error('Month') ?></td>
            <td><input type="text" class="form-control" name="Month" id="Month" placeholder="Month" value="<?php echo $Month; ?>" />
        </td>
	    <tr><td>Year <?php echo form_error('Year') ?></td>
            <td><input type="text" class="form-control" name="Year" id="Year" placeholder="Year" value="<?php echo $Year; ?>" />
        </td>
	    <tr><td>ApprovalID <?php echo form_error('ApprovalID') ?></td>
            <td><input type="text" class="form-control" name="ApprovalID" id="ApprovalID" placeholder="ApprovalID" value="<?php echo $ApprovalID; ?>" />
        </td>
	    <tr><td>ApprovalLevel <?php echo form_error('ApprovalLevel') ?></td>
            <td><input type="text" class="form-control" name="ApprovalLevel" id="ApprovalLevel" placeholder="ApprovalLevel" value="<?php echo $ApprovalLevel; ?>" />
        </td>
	    <tr><td>Approvalstatus <?php echo form_error('Approvalstatus') ?></td>
            <td><input type="text" class="form-control" name="Approvalstatus" id="Approvalstatus" placeholder="Approvalstatus" value="<?php echo $Approvalstatus; ?>" />
        </td>
	    <input type="hidden" name="SalesCenterID" value="<?php echo $SalesCenterID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paymentperformancehd') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->