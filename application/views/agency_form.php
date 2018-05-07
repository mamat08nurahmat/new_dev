<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>AGENCY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>AgencyName <?php echo form_error('AgencyName') ?></td>
            <td><input type="text" class="form-control" name="AgencyName" id="AgencyName" placeholder="AgencyName" value="<?php echo $AgencyName; ?>" />
        </td>
	    <tr><td>StreetAddress <?php echo form_error('StreetAddress') ?></td>
            <td><input type="text" class="form-control" name="StreetAddress" id="StreetAddress" placeholder="StreetAddress" value="<?php echo $StreetAddress; ?>" />
        </td>
	    <tr><td>VillageAddress <?php echo form_error('VillageAddress') ?></td>
            <td><input type="text" class="form-control" name="VillageAddress" id="VillageAddress" placeholder="VillageAddress" value="<?php echo $VillageAddress; ?>" />
        </td>
	    <tr><td>SubDistrictAddress <?php echo form_error('SubDistrictAddress') ?></td>
            <td><input type="text" class="form-control" name="SubDistrictAddress" id="SubDistrictAddress" placeholder="SubDistrictAddress" value="<?php echo $SubDistrictAddress; ?>" />
        </td>
	    <tr><td>PostalCode <?php echo form_error('PostalCode') ?></td>
            <td><input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="PostalCode" value="<?php echo $PostalCode; ?>" />
        </td>
	    <tr><td>CityAddress <?php echo form_error('CityAddress') ?></td>
            <td><input type="text" class="form-control" name="CityAddress" id="CityAddress" placeholder="CityAddress" value="<?php echo $CityAddress; ?>" />
        </td>
	    <tr><td>PhoneNumber <?php echo form_error('PhoneNumber') ?></td>
            <td><input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" value="<?php echo $PhoneNumber; ?>" />
        </td>
	    <tr><td>FaxNumber <?php echo form_error('FaxNumber') ?></td>
            <td><input type="text" class="form-control" name="FaxNumber" id="FaxNumber" placeholder="FaxNumber" value="<?php echo $FaxNumber; ?>" />
        </td>
	    <tr><td>EmailAddress <?php echo form_error('EmailAddress') ?></td>
            <td><input type="text" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="EmailAddress" value="<?php echo $EmailAddress; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('Status') ?></td>
            <td><input type="text" class="form-control" name="Status" id="Status" placeholder="Status" value="<?php echo $Status; ?>" />
        </td>
	    <tr><td>ActiveDate <?php echo form_error('ActiveDate') ?></td>
            <td><input type="text" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </td>
	    <tr><td>EndDate <?php echo form_error('EndDate') ?></td>
            <td><input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="EndDate" value="<?php echo $EndDate; ?>" />
        </td>
	    <tr><td>IsActive <?php echo form_error('IsActive') ?></td>
            <td><input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </td>
	    <tr><td>UserType <?php echo form_error('UserType') ?></td>
            <td><input type="text" class="form-control" name="UserType" id="UserType" placeholder="UserType" value="<?php echo $UserType; ?>" />
        </td>
	    <input type="hidden" name="AgencyID" value="<?php echo $AgencyID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('agency') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->