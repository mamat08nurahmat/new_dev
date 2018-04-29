<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>EMPLOYEE</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ParentEmployeeID <?php echo form_error('ParentEmployeeID') ?></td>
            <td><input type="text" class="form-control" name="ParentEmployeeID" id="ParentEmployeeID" placeholder="ParentEmployeeID" value="<?php echo $ParentEmployeeID; ?>" />
        </td>
	    <tr><td>EmployeeName <?php echo form_error('EmployeeName') ?></td>
            <td><input type="text" class="form-control" name="EmployeeName" id="EmployeeName" placeholder="EmployeeName" value="<?php echo $EmployeeName; ?>" />
        </td>
	    <tr><td>EmployeeOldCode <?php echo form_error('EmployeeOldCode') ?></td>
            <td><input type="text" class="form-control" name="EmployeeOldCode" id="EmployeeOldCode" placeholder="EmployeeOldCode" value="<?php echo $EmployeeOldCode; ?>" />
        </td>
	    <tr><td>EmployeeNewCode <?php echo form_error('EmployeeNewCode') ?></td>
            <td><input type="text" class="form-control" name="EmployeeNewCode" id="EmployeeNewCode" placeholder="EmployeeNewCode" value="<?php echo $EmployeeNewCode; ?>" />
        </td>
	    <tr><td>UserGroupID <?php echo form_error('UserGroupID') ?></td>
            <td><input type="text" class="form-control" name="UserGroupID" id="UserGroupID" placeholder="UserGroupID" value="<?php echo $UserGroupID; ?>" />
        </td>
	    <tr><td>EmployeeStatus <?php echo form_error('EmployeeStatus') ?></td>
            <td><input type="text" class="form-control" name="EmployeeStatus" id="EmployeeStatus" placeholder="EmployeeStatus" value="<?php echo $EmployeeStatus; ?>" />
        </td>
	    <tr><td>EmployeeGrade <?php echo form_error('EmployeeGrade') ?></td>
            <td><input type="text" class="form-control" name="EmployeeGrade" id="EmployeeGrade" placeholder="EmployeeGrade" value="<?php echo $EmployeeGrade; ?>" />
        </td>
	    <tr><td>EmployeeBirthPlace <?php echo form_error('EmployeeBirthPlace') ?></td>
            <td><input type="text" class="form-control" name="EmployeeBirthPlace" id="EmployeeBirthPlace" placeholder="EmployeeBirthPlace" value="<?php echo $EmployeeBirthPlace; ?>" />
        </td>
	    <tr><td>EmployeeBirthDate <?php echo form_error('EmployeeBirthDate') ?></td>
            <td><input type="text" class="form-control" name="EmployeeBirthDate" id="EmployeeBirthDate" placeholder="EmployeeBirthDate" value="<?php echo $EmployeeBirthDate; ?>" />
        </td>
	    <tr><td>MothersMaidenName <?php echo form_error('MothersMaidenName') ?></td>
            <td><input type="text" class="form-control" name="MothersMaidenName" id="MothersMaidenName" placeholder="MothersMaidenName" value="<?php echo $MothersMaidenName; ?>" />
        </td>
	    <tr><td>IdentityType <?php echo form_error('IdentityType') ?></td>
            <td><input type="text" class="form-control" name="IdentityType" id="IdentityType" placeholder="IdentityType" value="<?php echo $IdentityType; ?>" />
        </td>
	    <tr><td>IdentityNumber <?php echo form_error('IdentityNumber') ?></td>
            <td><input type="text" class="form-control" name="IdentityNumber" id="IdentityNumber" placeholder="IdentityNumber" value="<?php echo $IdentityNumber; ?>" />
        </td>
	    <tr><td>IdentityFilePath <?php echo form_error('IdentityFilePath') ?></td>
            <td><input type="text" class="form-control" name="IdentityFilePath" id="IdentityFilePath" placeholder="IdentityFilePath" value="<?php echo $IdentityFilePath; ?>" />
        </td>
	    <tr><td>IdentityFileName <?php echo form_error('IdentityFileName') ?></td>
            <td><input type="text" class="form-control" name="IdentityFileName" id="IdentityFileName" placeholder="IdentityFileName" value="<?php echo $IdentityFileName; ?>" />
        </td>
	    <tr><td>Sex <?php echo form_error('Sex') ?></td>
            <td><input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sex" value="<?php echo $Sex; ?>" />
        </td>
	    <tr><td>Religion <?php echo form_error('Religion') ?></td>
            <td><input type="text" class="form-control" name="Religion" id="Religion" placeholder="Religion" value="<?php echo $Religion; ?>" />
        </td>
	    <tr><td>NPWP <?php echo form_error('NPWP') ?></td>
            <td><input type="text" class="form-control" name="NPWP" id="NPWP" placeholder="NPWP" value="<?php echo $NPWP; ?>" />
        </td>
	    <tr><td>FixedPhoneNumber <?php echo form_error('FixedPhoneNumber') ?></td>
            <td><input type="text" class="form-control" name="FixedPhoneNumber" id="FixedPhoneNumber" placeholder="FixedPhoneNumber" value="<?php echo $FixedPhoneNumber; ?>" />
        </td>
	    <tr><td>PhoneNumber <?php echo form_error('PhoneNumber') ?></td>
            <td><input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" value="<?php echo $PhoneNumber; ?>" />
        </td>
	    <tr><td>PhoneNumber2 <?php echo form_error('PhoneNumber2') ?></td>
            <td><input type="text" class="form-control" name="PhoneNumber2" id="PhoneNumber2" placeholder="PhoneNumber2" value="<?php echo $PhoneNumber2; ?>" />
        </td>
	    <tr><td>EmergencyName <?php echo form_error('EmergencyName') ?></td>
            <td><input type="text" class="form-control" name="EmergencyName" id="EmergencyName" placeholder="EmergencyName" value="<?php echo $EmergencyName; ?>" />
        </td>
	    <tr><td>EmergencyStatus <?php echo form_error('EmergencyStatus') ?></td>
            <td><input type="text" class="form-control" name="EmergencyStatus" id="EmergencyStatus" placeholder="EmergencyStatus" value="<?php echo $EmergencyStatus; ?>" />
        </td>
	    <tr><td>EmergencyNumber <?php echo form_error('EmergencyNumber') ?></td>
            <td><input type="text" class="form-control" name="EmergencyNumber" id="EmergencyNumber" placeholder="EmergencyNumber" value="<?php echo $EmergencyNumber; ?>" />
        </td>
	    <tr><td>EmergencyAddress <?php echo form_error('EmergencyAddress') ?></td>
            <td><input type="text" class="form-control" name="EmergencyAddress" id="EmergencyAddress" placeholder="EmergencyAddress" value="<?php echo $EmergencyAddress; ?>" />
        </td>
	    <tr><td>Province <?php echo form_error('Province') ?></td>
            <td><input type="text" class="form-control" name="Province" id="Province" placeholder="Province" value="<?php echo $Province; ?>" />
        </td>
	    <tr><td>StreetAddress <?php echo form_error('StreetAddress') ?></td>
            <td><input type="text" class="form-control" name="StreetAddress" id="StreetAddress" placeholder="StreetAddress" value="<?php echo $StreetAddress; ?>" />
        </td>
	    <tr><td>PostalCode <?php echo form_error('PostalCode') ?></td>
            <td><input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="PostalCode" value="<?php echo $PostalCode; ?>" />
        </td>
	    <tr><td>EmailAddress <?php echo form_error('EmailAddress') ?></td>
            <td><input type="text" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="EmailAddress" value="<?php echo $EmailAddress; ?>" />
        </td>
	    <tr><td>MaritalStatus <?php echo form_error('MaritalStatus') ?></td>
            <td><input type="text" class="form-control" name="MaritalStatus" id="MaritalStatus" placeholder="MaritalStatus" value="<?php echo $MaritalStatus; ?>" />
        </td>
	    <tr><td>Height <?php echo form_error('Height') ?></td>
            <td><input type="text" class="form-control" name="Height" id="Height" placeholder="Height" value="<?php echo $Height; ?>" />
        </td>
	    <tr><td>Weight <?php echo form_error('Weight') ?></td>
            <td><input type="text" class="form-control" name="Weight" id="Weight" placeholder="Weight" value="<?php echo $Weight; ?>" />
        </td>
	    <tr><td>PhotoFilePath <?php echo form_error('PhotoFilePath') ?></td>
            <td><input type="text" class="form-control" name="PhotoFilePath" id="PhotoFilePath" placeholder="PhotoFilePath" value="<?php echo $PhotoFilePath; ?>" />
        </td>
	    <tr><td>PhotoFileName <?php echo form_error('PhotoFileName') ?></td>
            <td><input type="text" class="form-control" name="PhotoFileName" id="PhotoFileName" placeholder="PhotoFileName" value="<?php echo $PhotoFileName; ?>" />
        </td>
	    <tr><td>AgencyID <?php echo form_error('AgencyID') ?></td>
            <td><input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </td>
	    <tr><td>SalesCenterID <?php echo form_error('SalesCenterID') ?></td>
            <td><input type="text" class="form-control" name="SalesCenterID" id="SalesCenterID" placeholder="SalesCenterID" value="<?php echo $SalesCenterID; ?>" />
        </td>
	    <tr><td>InterviewApprovalID <?php echo form_error('InterviewApprovalID') ?></td>
            <td><input type="text" class="form-control" name="InterviewApprovalID" id="InterviewApprovalID" placeholder="InterviewApprovalID" value="<?php echo $InterviewApprovalID; ?>" />
        </td>
	    <tr><td>InterviewLevel <?php echo form_error('InterviewLevel') ?></td>
            <td><input type="text" class="form-control" name="InterviewLevel" id="InterviewLevel" placeholder="InterviewLevel" value="<?php echo $InterviewLevel; ?>" />
        </td>
	    <tr><td>InterviewStatus <?php echo form_error('InterviewStatus') ?></td>
            <td><input type="text" class="form-control" name="InterviewStatus" id="InterviewStatus" placeholder="InterviewStatus" value="<?php echo $InterviewStatus; ?>" />
        </td>
	    <tr><td>HiringApprovalID <?php echo form_error('HiringApprovalID') ?></td>
            <td><input type="text" class="form-control" name="HiringApprovalID" id="HiringApprovalID" placeholder="HiringApprovalID" value="<?php echo $HiringApprovalID; ?>" />
        </td>
	    <tr><td>HiringLevel <?php echo form_error('HiringLevel') ?></td>
            <td><input type="text" class="form-control" name="HiringLevel" id="HiringLevel" placeholder="HiringLevel" value="<?php echo $HiringLevel; ?>" />
        </td>
	    <tr><td>HiringStatus <?php echo form_error('HiringStatus') ?></td>
            <td><input type="text" class="form-control" name="HiringStatus" id="HiringStatus" placeholder="HiringStatus" value="<?php echo $HiringStatus; ?>" />
        </td>
	    <tr><td>ApprovalID <?php echo form_error('ApprovalID') ?></td>
            <td><input type="text" class="form-control" name="ApprovalID" id="ApprovalID" placeholder="ApprovalID" value="<?php echo $ApprovalID; ?>" />
        </td>
	    <tr><td>ApprovalLevel <?php echo form_error('ApprovalLevel') ?></td>
            <td><input type="text" class="form-control" name="ApprovalLevel" id="ApprovalLevel" placeholder="ApprovalLevel" value="<?php echo $ApprovalLevel; ?>" />
        </td>
	    <tr><td>ApprovalStatus <?php echo form_error('ApprovalStatus') ?></td>
            <td><input type="text" class="form-control" name="ApprovalStatus" id="ApprovalStatus" placeholder="ApprovalStatus" value="<?php echo $ApprovalStatus; ?>" />
        </td>
	    <tr><td>IsDiscontinued <?php echo form_error('IsDiscontinued') ?></td>
            <td><input type="text" class="form-control" name="IsDiscontinued" id="IsDiscontinued" placeholder="IsDiscontinued" value="<?php echo $IsDiscontinued; ?>" />
        </td>
	    <tr><td>IsDedicated <?php echo form_error('IsDedicated') ?></td>
            <td><input type="text" class="form-control" name="IsDedicated" id="IsDedicated" placeholder="IsDedicated" value="<?php echo $IsDedicated; ?>" />
        </td>
	    <tr><td>DedicatedRemark <?php echo form_error('DedicatedRemark') ?></td>
            <td><input type="text" class="form-control" name="DedicatedRemark" id="DedicatedRemark" placeholder="DedicatedRemark" value="<?php echo $DedicatedRemark; ?>" />
        </td>
	    <tr><td>ActiveDate <?php echo form_error('ActiveDate') ?></td>
            <td><input type="text" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </td>
	    <tr><td>EndDate <?php echo form_error('EndDate') ?></td>
            <td><input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="EndDate" value="<?php echo $EndDate; ?>" />
        </td>
	    <tr><td>EndReason <?php echo form_error('EndReason') ?></td>
            <td><input type="text" class="form-control" name="EndReason" id="EndReason" placeholder="EndReason" value="<?php echo $EndReason; ?>" />
        </td>
	    <tr><td>CreatedDate <?php echo form_error('CreatedDate') ?></td>
            <td><input type="text" class="form-control" name="CreatedDate" id="CreatedDate" placeholder="CreatedDate" value="<?php echo $CreatedDate; ?>" />
        </td>
	    <tr><td>CreatedBy <?php echo form_error('CreatedBy') ?></td>
            <td><input type="text" class="form-control" name="CreatedBy" id="CreatedBy" placeholder="CreatedBy" value="<?php echo $CreatedBy; ?>" />
        </td>
	    <input type="hidden" name="EmployeeID" value="<?php echo $EmployeeID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->