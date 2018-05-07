<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>EMPLOYEEDOCUMENT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>EmployeeDocumentID <?php echo form_error('EmployeeDocumentID') ?></td>
            <td><input type="text" class="form-control" name="EmployeeDocumentID" id="EmployeeDocumentID" placeholder="EmployeeDocumentID" value="<?php echo $EmployeeDocumentID; ?>" />
        </td>
	    <tr><td>Remark <?php echo form_error('Remark') ?></td>
            <td><input type="text" class="form-control" name="Remark" id="Remark" placeholder="Remark" value="<?php echo $Remark; ?>" />
        </td>
	    <tr><td>FileLocation <?php echo form_error('FileLocation') ?></td>
            <td><input type="text" class="form-control" name="FileLocation" id="FileLocation" placeholder="FileLocation" value="<?php echo $FileLocation; ?>" />
        </td>
	    <tr><td>FileName <?php echo form_error('FileName') ?></td>
            <td><input type="text" class="form-control" name="FileName" id="FileName" placeholder="FileName" value="<?php echo $FileName; ?>" />
        </td>
	    <tr><td>ContentType <?php echo form_error('ContentType') ?></td>
            <td><input type="text" class="form-control" name="ContentType" id="ContentType" placeholder="ContentType" value="<?php echo $ContentType; ?>" />
        </td>
	    <tr><td>ContentLength <?php echo form_error('ContentLength') ?></td>
            <td><input type="text" class="form-control" name="ContentLength" id="ContentLength" placeholder="ContentLength" value="<?php echo $ContentLength; ?>" />
        </td>
	    <input type="hidden" name="EmployeeID" value="<?php echo $EmployeeID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('employeedocument') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->