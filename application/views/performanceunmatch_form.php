<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PERFORMANCEUNMATCH</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ApplicationSource <?php echo form_error('ApplicationSource') ?></td>
            <td><input type="text" class="form-control" name="ApplicationSource" id="ApplicationSource" placeholder="ApplicationSource" value="<?php echo $ApplicationSource; ?>" />
        </td>
	    <tr><td>BatchID <?php echo form_error('BatchID') ?></td>
            <td><input type="text" class="form-control" name="BatchID" id="BatchID" placeholder="BatchID" value="<?php echo $BatchID; ?>" />
        </td>
	    <tr><td>Month <?php echo form_error('Month') ?></td>
            <td><input type="text" class="form-control" name="Month" id="Month" placeholder="Month" value="<?php echo $Month; ?>" />
        </td>
	    <tr><td>Year <?php echo form_error('Year') ?></td>
            <td><input type="text" class="form-control" name="Year" id="Year" placeholder="Year" value="<?php echo $Year; ?>" />
        </td>
	    <tr><td>EmployeeID <?php echo form_error('EmployeeID') ?></td>
            <td><input type="text" class="form-control" name="EmployeeID" id="EmployeeID" placeholder="EmployeeID" value="<?php echo $EmployeeID; ?>" />
        </td>
	    <tr><td>OldSourceCode <?php echo form_error('OldSourceCode') ?></td>
            <td><input type="text" class="form-control" name="OldSourceCode" id="OldSourceCode" placeholder="OldSourceCode" value="<?php echo $OldSourceCode; ?>" />
        </td>
	    <tr><td>NewSourceCode <?php echo form_error('NewSourceCode') ?></td>
            <td><input type="text" class="form-control" name="NewSourceCode" id="NewSourceCode" placeholder="NewSourceCode" value="<?php echo $NewSourceCode; ?>" />
        </td>
	    <tr><td>Remark <?php echo form_error('Remark') ?></td>
            <td><input type="text" class="form-control" name="Remark" id="Remark" placeholder="Remark" value="<?php echo $Remark; ?>" />
        </td>
	    <tr><td>ProposedDate <?php echo form_error('ProposedDate') ?></td>
            <td><input type="text" class="form-control" name="ProposedDate" id="ProposedDate" placeholder="ProposedDate" value="<?php echo $ProposedDate; ?>" />
        </td>
	    <tr><td>ProposedBy <?php echo form_error('ProposedBy') ?></td>
            <td><input type="text" class="form-control" name="ProposedBy" id="ProposedBy" placeholder="ProposedBy" value="<?php echo $ProposedBy; ?>" />
        </td>
	    <tr><td>ApprovalID <?php echo form_error('ApprovalID') ?></td>
            <td><input type="text" class="form-control" name="ApprovalID" id="ApprovalID" placeholder="ApprovalID" value="<?php echo $ApprovalID; ?>" />
        </td>
	    <tr><td>IsGenerateCorrection <?php echo form_error('IsGenerateCorrection') ?></td>
            <td><input type="text" class="form-control" name="IsGenerateCorrection" id="IsGenerateCorrection" placeholder="IsGenerateCorrection" value="<?php echo $IsGenerateCorrection; ?>" />
        </td>
	    <input type="hidden" name="RowID" value="<?php echo $RowID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('performanceunmatch') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->