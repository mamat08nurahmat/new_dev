<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>APPUSER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>UserGroupID <?php echo form_error('UserGroupID') ?></td>
            <td><input type="text" class="form-control" name="UserGroupID" id="UserGroupID" placeholder="UserGroupID" value="<?php echo $UserGroupID; ?>" />
        </td>
	    <tr><td>ParentUserID <?php echo form_error('ParentUserID') ?></td>
            <td><input type="text" class="form-control" name="ParentUserID" id="ParentUserID" placeholder="ParentUserID" value="<?php echo $ParentUserID; ?>" />
        </td>
	    <tr><td>UserLoginID <?php echo form_error('UserLoginID') ?></td>
            <td><input type="text" class="form-control" name="UserLoginID" id="UserLoginID" placeholder="UserLoginID" value="<?php echo $UserLoginID; ?>" />
        </td>
	    <tr><td>UserName <?php echo form_error('UserName') ?></td>
            <td><input type="text" class="form-control" name="UserName" id="UserName" placeholder="UserName" value="<?php echo $UserName; ?>" />
        </td>
	    <tr><td>NPP <?php echo form_error('NPP') ?></td>
            <td><input type="text" class="form-control" name="NPP" id="NPP" placeholder="NPP" value="<?php echo $NPP; ?>" />
        </td>
	    <tr><td>Password <?php echo form_error('Password') ?></td>
            <td><input type="text" class="form-control" name="Password" id="Password" placeholder="Password" value="<?php echo $Password; ?>" />
        </td>
	    <tr><td>SRLanguage <?php echo form_error('SRLanguage') ?></td>
            <td><input type="text" class="form-control" name="SRLanguage" id="SRLanguage" placeholder="SRLanguage" value="<?php echo $SRLanguage; ?>" />
        </td>
	    <tr><td>EmailAddress <?php echo form_error('EmailAddress') ?></td>
            <td><input type="text" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="EmailAddress" value="<?php echo $EmailAddress; ?>" />
        </td>
	    <tr><td>PhoneNumber <?php echo form_error('PhoneNumber') ?></td>
            <td><input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" value="<?php echo $PhoneNumber; ?>" />
        </td>
	    <tr><td>ActiveDate <?php echo form_error('ActiveDate') ?></td>
            <td><input type="text" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </td>
	    <tr><td>ExpireDate <?php echo form_error('ExpireDate') ?></td>
            <td><input type="text" class="form-control" name="ExpireDate" id="ExpireDate" placeholder="ExpireDate" value="<?php echo $ExpireDate; ?>" />
        </td>
	    <tr><td>IsActive <?php echo form_error('IsActive') ?></td>
            <td><input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </td>
	    <tr><td>AreaGroupID <?php echo form_error('AreaGroupID') ?></td>
            <td><input type="text" class="form-control" name="AreaGroupID" id="AreaGroupID" placeholder="AreaGroupID" value="<?php echo $AreaGroupID; ?>" />
        </td>
	    <tr><td>AreaID <?php echo form_error('AreaID') ?></td>
            <td><input type="text" class="form-control" name="AreaID" id="AreaID" placeholder="AreaID" value="<?php echo $AreaID; ?>" />
        </td>
	    <tr><td>AgencyID <?php echo form_error('AgencyID') ?></td>
            <td><input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </td>
	    <tr><td>EmployeeID <?php echo form_error('EmployeeID') ?></td>
            <td><input type="text" class="form-control" name="EmployeeID" id="EmployeeID" placeholder="EmployeeID" value="<?php echo $EmployeeID; ?>" />
        </td>
	    <tr><td>PhotoFilePath <?php echo form_error('PhotoFilePath') ?></td>
            <td><input type="text" class="form-control" name="PhotoFilePath" id="PhotoFilePath" placeholder="PhotoFilePath" value="<?php echo $PhotoFilePath; ?>" />
        </td>
	    <tr><td>PhotoFileName <?php echo form_error('PhotoFileName') ?></td>
            <td><input type="text" class="form-control" name="PhotoFileName" id="PhotoFileName" placeholder="PhotoFileName" value="<?php echo $PhotoFileName; ?>" />
        </td>
	    <tr><td>IconPhotoFilePath <?php echo form_error('IconPhotoFilePath') ?></td>
            <td><input type="text" class="form-control" name="IconPhotoFilePath" id="IconPhotoFilePath" placeholder="IconPhotoFilePath" value="<?php echo $IconPhotoFilePath; ?>" />
        </td>
	    <input type="hidden" name="UserID" value="<?php echo $UserID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('appuser') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->