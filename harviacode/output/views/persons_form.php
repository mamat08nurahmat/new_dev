<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PERSONS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>LastName <?php echo form_error('LastName') ?></td>
            <td><input type="text" class="form-control" name="LastName" id="LastName" placeholder="LastName" value="<?php echo $LastName; ?>" />
        </td>
	    <tr><td>FirstName <?php echo form_error('FirstName') ?></td>
            <td><input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="FirstName" value="<?php echo $FirstName; ?>" />
        </td>
	    <tr><td>Age <?php echo form_error('Age') ?></td>
            <td><input type="text" class="form-control" name="Age" id="Age" placeholder="Age" value="<?php echo $Age; ?>" />
        </td>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('persons') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->