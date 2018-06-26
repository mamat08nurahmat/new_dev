<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SALARYPARAMETER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>UserGroupID <?php echo form_error('UserGroupID') ?></td>
            <td><input type="text" class="form-control" name="UserGroupID" id="UserGroupID" placeholder="UserGroupID" value="<?php echo $UserGroupID; ?>" />
        </td>
	    <tr><td>EmployeeGrade <?php echo form_error('EmployeeGrade') ?></td>
            <td><input type="text" class="form-control" name="EmployeeGrade" id="EmployeeGrade" placeholder="EmployeeGrade" value="<?php echo $EmployeeGrade; ?>" />
        </td>
	    <tr><td>EmployeeStatus <?php echo form_error('EmployeeStatus') ?></td>
            <td><input type="text" class="form-control" name="EmployeeStatus" id="EmployeeStatus" placeholder="EmployeeStatus" value="<?php echo $EmployeeStatus; ?>" />
        </td>
	    <tr><td>ComponentID <?php echo form_error('ComponentID') ?></td>
            <td><input type="text" class="form-control" name="ComponentID" id="ComponentID" placeholder="ComponentID" value="<?php echo $ComponentID; ?>" />
        </td>
	    <tr><td>StartDate <?php echo form_error('StartDate') ?></td>
            <td><input type="text" class="form-control" name="StartDate" id="StartDate" placeholder="StartDate" value="<?php echo $StartDate; ?>" />
        </td>
	    <tr><td>EndDate <?php echo form_error('EndDate') ?></td>
            <td><input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="EndDate" value="<?php echo $EndDate; ?>" />
        </td>
	    <tr><td>TargetTypeID <?php echo form_error('TargetTypeID') ?></td>
            <td><input type="text" class="form-control" name="TargetTypeID" id="TargetTypeID" placeholder="TargetTypeID" value="<?php echo $TargetTypeID; ?>" />
        </td>
	    <tr><td>Product1 <?php echo form_error('Product1') ?></td>
            <td><input type="text" class="form-control" name="Product1" id="Product1" placeholder="Product1" value="<?php echo $Product1; ?>" />
        </td>
	    <tr><td>Product2 <?php echo form_error('Product2') ?></td>
            <td><input type="text" class="form-control" name="Product2" id="Product2" placeholder="Product2" value="<?php echo $Product2; ?>" />
        </td>
	    <tr><td>Param1 <?php echo form_error('Param1') ?></td>
            <td><input type="text" class="form-control" name="Param1" id="Param1" placeholder="Param1" value="<?php echo $Param1; ?>" />
        </td>
	    <tr><td>Param2 <?php echo form_error('Param2') ?></td>
            <td><input type="text" class="form-control" name="Param2" id="Param2" placeholder="Param2" value="<?php echo $Param2; ?>" />
        </td>
	    <tr><td>Nominal <?php echo form_error('Nominal') ?></td>
            <td><input type="text" class="form-control" name="Nominal" id="Nominal" placeholder="Nominal" value="<?php echo $Nominal; ?>" />
        </td>
	    <tr><td>IsMultiplier <?php echo form_error('IsMultiplier') ?></td>
            <td><input type="text" class="form-control" name="IsMultiplier" id="IsMultiplier" placeholder="IsMultiplier" value="<?php echo $IsMultiplier; ?>" />
        </td>
	    <tr><td>IsBasicSalary <?php echo form_error('IsBasicSalary') ?></td>
            <td><input type="text" class="form-control" name="IsBasicSalary" id="IsBasicSalary" placeholder="IsBasicSalary" value="<?php echo $IsBasicSalary; ?>" />
        </td>
	    <input type="hidden" name="ParameterID" value="<?php echo $ParameterID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('salaryparameter') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->