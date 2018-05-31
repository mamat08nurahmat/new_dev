<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PERFORMANCEPEREMPLOYEE</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>OpenDate <?php echo form_error('OpenDate') ?></td>
            <td><input type="text" class="form-control" name="OpenDate" id="OpenDate" placeholder="OpenDate" value="<?php echo $OpenDate; ?>" />
        </td>
	    <tr><td>CardLogo <?php echo form_error('CardLogo') ?></td>
            <td><input type="text" class="form-control" name="CardLogo" id="CardLogo" placeholder="CardLogo" value="<?php echo $CardLogo; ?>" />
        </td>
	    <tr><td>CardType <?php echo form_error('CardType') ?></td>
            <td><input type="text" class="form-control" name="CardType" id="CardType" placeholder="CardType" value="<?php echo $CardType; ?>" />
        </td>
	    <tr><td>CardCount <?php echo form_error('CardCount') ?></td>
            <td><input type="text" class="form-control" name="CardCount" id="CardCount" placeholder="CardCount" value="<?php echo $CardCount; ?>" />
        </td>
	    <input type="hidden" name="EmployeeID" value="<?php echo $EmployeeID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('performanceperemployee') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->