<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PERFORMANCEDETAIL</h3>
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
	    <tr><td>CustomerName <?php echo form_error('CustomerName') ?></td>
            <td><input type="text" class="form-control" name="CustomerName" id="CustomerName" placeholder="CustomerName" value="<?php echo $CustomerName; ?>" />
        </td>
	    <tr><td>CustomerBirthDate <?php echo form_error('CustomerBirthDate') ?></td>
            <td><input type="text" class="form-control" name="CustomerBirthDate" id="CustomerBirthDate" placeholder="CustomerBirthDate" value="<?php echo $CustomerBirthDate; ?>" />
        </td>
	    <tr><td>Parameter1 <?php echo form_error('Parameter1') ?></td>
            <td><input type="text" class="form-control" name="Parameter1" id="Parameter1" placeholder="Parameter1" value="<?php echo $Parameter1; ?>" />
        </td>
	    <tr><td>Parameter2 <?php echo form_error('Parameter2') ?></td>
            <td><input type="text" class="form-control" name="Parameter2" id="Parameter2" placeholder="Parameter2" value="<?php echo $Parameter2; ?>" />
        </td>
	    <tr><td>Parameter3 <?php echo form_error('Parameter3') ?></td>
            <td><input type="text" class="form-control" name="Parameter3" id="Parameter3" placeholder="Parameter3" value="<?php echo $Parameter3; ?>" />
        </td>
	    <tr><td>Parameter4 <?php echo form_error('Parameter4') ?></td>
            <td><input type="text" class="form-control" name="Parameter4" id="Parameter4" placeholder="Parameter4" value="<?php echo $Parameter4; ?>" />
        </td>
	    <tr><td>Parameter5 <?php echo form_error('Parameter5') ?></td>
            <td><input type="text" class="form-control" name="Parameter5" id="Parameter5" placeholder="Parameter5" value="<?php echo $Parameter5; ?>" />
        </td>
	    <tr><td>Parameter6 <?php echo form_error('Parameter6') ?></td>
            <td><input type="text" class="form-control" name="Parameter6" id="Parameter6" placeholder="Parameter6" value="<?php echo $Parameter6; ?>" />
        </td>
	    <tr><td>Parameter7 <?php echo form_error('Parameter7') ?></td>
            <td><input type="text" class="form-control" name="Parameter7" id="Parameter7" placeholder="Parameter7" value="<?php echo $Parameter7; ?>" />
        </td>
	    <tr><td>Parameter8 <?php echo form_error('Parameter8') ?></td>
            <td><input type="text" class="form-control" name="Parameter8" id="Parameter8" placeholder="Parameter8" value="<?php echo $Parameter8; ?>" />
        </td>
	    <tr><td>Parameter9 <?php echo form_error('Parameter9') ?></td>
            <td><input type="text" class="form-control" name="Parameter9" id="Parameter9" placeholder="Parameter9" value="<?php echo $Parameter9; ?>" />
        </td>
	    <tr><td>Parameter10 <?php echo form_error('Parameter10') ?></td>
            <td><input type="text" class="form-control" name="Parameter10" id="Parameter10" placeholder="Parameter10" value="<?php echo $Parameter10; ?>" />
        </td>
	    <tr><td>Parameter11 <?php echo form_error('Parameter11') ?></td>
            <td><input type="text" class="form-control" name="Parameter11" id="Parameter11" placeholder="Parameter11" value="<?php echo $Parameter11; ?>" />
        </td>
	    <tr><td>Parameter12 <?php echo form_error('Parameter12') ?></td>
            <td><input type="text" class="form-control" name="Parameter12" id="Parameter12" placeholder="Parameter12" value="<?php echo $Parameter12; ?>" />
        </td>
	    <tr><td>Parameter13 <?php echo form_error('Parameter13') ?></td>
            <td><input type="text" class="form-control" name="Parameter13" id="Parameter13" placeholder="Parameter13" value="<?php echo $Parameter13; ?>" />
        </td>
	    <tr><td>Parameter14 <?php echo form_error('Parameter14') ?></td>
            <td><input type="text" class="form-control" name="Parameter14" id="Parameter14" placeholder="Parameter14" value="<?php echo $Parameter14; ?>" />
        </td>
	    <tr><td>Parameter15 <?php echo form_error('Parameter15') ?></td>
            <td><input type="text" class="form-control" name="Parameter15" id="Parameter15" placeholder="Parameter15" value="<?php echo $Parameter15; ?>" />
        </td>
	    <input type="hidden" name="RowID" value="<?php echo $RowID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('performancedetail') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->