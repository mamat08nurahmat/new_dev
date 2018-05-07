<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>AGENCYSALESCENTER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>AgencyID <?php echo form_error('AgencyID') ?></td>
            <td><input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </td>
	    <tr><td>AreaID <?php echo form_error('AreaID') ?></td>
            <td><input type="text" class="form-control" name="AreaID" id="AreaID" placeholder="AreaID" value="<?php echo $AreaID; ?>" />
        </td>
	    <tr><td>CityID <?php echo form_error('CityID') ?></td>
            <td><input type="text" class="form-control" name="CityID" id="CityID" placeholder="CityID" value="<?php echo $CityID; ?>" />
        </td>
	    <tr><td>AsuradurID <?php echo form_error('AsuradurID') ?></td>
            <td><input type="text" class="form-control" name="AsuradurID" id="AsuradurID" placeholder="AsuradurID" value="<?php echo $AsuradurID; ?>" />
        </td>
	    <tr><td>SourceData <?php echo form_error('SourceData') ?></td>
            <td><input type="text" class="form-control" name="SourceData" id="SourceData" placeholder="SourceData" value="<?php echo $SourceData; ?>" />
        </td>
	    <tr><td>SalesCenterCode <?php echo form_error('SalesCenterCode') ?></td>
            <td><input type="text" class="form-control" name="SalesCenterCode" id="SalesCenterCode" placeholder="SalesCenterCode" value="<?php echo $SalesCenterCode; ?>" />
        </td>
	    <tr><td>SalesCenterName <?php echo form_error('SalesCenterName') ?></td>
            <td><input type="text" class="form-control" name="SalesCenterName" id="SalesCenterName" placeholder="SalesCenterName" value="<?php echo $SalesCenterName; ?>" />
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
	    <tr><td>CityAddress <?php echo form_error('CityAddress') ?></td>
            <td><input type="text" class="form-control" name="CityAddress" id="CityAddress" placeholder="CityAddress" value="<?php echo $CityAddress; ?>" />
        </td>
	    <tr><td>PostalCode <?php echo form_error('PostalCode') ?></td>
            <td><input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="PostalCode" value="<?php echo $PostalCode; ?>" />
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
	    <tr><td>IsActive <?php echo form_error('IsActive') ?></td>
            <td><input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </td>
	    <tr><td>ActiveDate <?php echo form_error('ActiveDate') ?></td>
            <td><input type="text" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </td>
	    <tr><td>Enddate <?php echo form_error('Enddate') ?></td>
            <td><input type="text" class="form-control" name="Enddate" id="Enddate" placeholder="Enddate" value="<?php echo $Enddate; ?>" />
        </td>
	    <tr><td>ReasonEnd <?php echo form_error('ReasonEnd') ?></td>
            <td><input type="text" class="form-control" name="ReasonEnd" id="ReasonEnd" placeholder="ReasonEnd" value="<?php echo $ReasonEnd; ?>" />
        </td>
	    <input type="hidden" name="SalesCenterID" value="<?php echo $SalesCenterID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('agencysalescenter') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->