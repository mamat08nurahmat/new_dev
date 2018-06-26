<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SYSTEMCARDLINK</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>BatchID <?php echo form_error('BatchID') ?></td>
            <td><input type="text" class="form-control" name="BatchID" id="BatchID" placeholder="BatchID" value="<?php echo $BatchID; ?>" />
        </td>
	    <tr><td>OpenDate <?php echo form_error('OpenDate') ?></td>
            <td><input type="text" class="form-control" name="OpenDate" id="OpenDate" placeholder="OpenDate" value="<?php echo $OpenDate; ?>" />
        </td>
	    <tr><td>SourceCode <?php echo form_error('SourceCode') ?></td>
            <td><input type="text" class="form-control" name="SourceCode" id="SourceCode" placeholder="SourceCode" value="<?php echo $SourceCode; ?>" />
        </td>
	    <tr><td>CustomerNumber <?php echo form_error('CustomerNumber') ?></td>
            <td><input type="text" class="form-control" name="CustomerNumber" id="CustomerNumber" placeholder="CustomerNumber" value="<?php echo $CustomerNumber; ?>" />
        </td>
	    <tr><td>CustomerName <?php echo form_error('CustomerName') ?></td>
            <td><input type="text" class="form-control" name="CustomerName" id="CustomerName" placeholder="CustomerName" value="<?php echo $CustomerName; ?>" />
        </td>
	    <tr><td>CustomerBirthDate <?php echo form_error('CustomerBirthDate') ?></td>
            <td><input type="text" class="form-control" name="CustomerBirthDate" id="CustomerBirthDate" placeholder="CustomerBirthDate" value="<?php echo $CustomerBirthDate; ?>" />
        </td>
	    <tr><td>ORG <?php echo form_error('ORG') ?></td>
            <td><input type="text" class="form-control" name="ORG" id="ORG" placeholder="ORG" value="<?php echo $ORG; ?>" />
        </td>
	    <tr><td>Logo <?php echo form_error('Logo') ?></td>
            <td><input type="text" class="form-control" name="Logo" id="Logo" placeholder="Logo" value="<?php echo $Logo; ?>" />
        </td>
	    <tr><td>EmpReffCode <?php echo form_error('EmpReffCode') ?></td>
            <td><input type="text" class="form-control" name="EmpReffCode" id="EmpReffCode" placeholder="EmpReffCode" value="<?php echo $EmpReffCode; ?>" />
        </td>
	    <tr><td>BlockCard <?php echo form_error('BlockCard') ?></td>
            <td><input type="text" class="form-control" name="BlockCard" id="BlockCard" placeholder="BlockCard" value="<?php echo $BlockCard; ?>" />
        </td>
	    <tr><td>ApplicationType <?php echo form_error('ApplicationType') ?></td>
            <td><input type="text" class="form-control" name="ApplicationType" id="ApplicationType" placeholder="ApplicationType" value="<?php echo $ApplicationType; ?>" />
        </td>
	    <input type="hidden" name="RowID" value="<?php echo $RowID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('systemcardlink') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->