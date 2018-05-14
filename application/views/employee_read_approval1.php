
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Employee Read</h3>
        <table class="table table-bordered">

	    <!-- <tr><td>ParentEmployeeID</td><td><?php echo $ParentEmployeeID; ?></td></tr> -->
	    <tr><td>EmployeeName</td><td><?php echo $EmployeeName; ?></td></tr>
	    <!-- <tr><td>EmployeeOldCode</td><td><?php echo $EmployeeOldCode; ?></td></tr> -->
	    <tr><td>EmployeeNewCode</td><td><?php echo $EmployeeNewCode; ?></td></tr>

	    <!-- <tr><td>UserGroupID</td><td><?php echo $UserGroupID; ?></td></tr>-->	    
	    <tr><td>EmployeeStatus</td><td><?php echo $EmployeeStatus; ?></td></tr>
	    <tr><td>EmployeeGrade</td><td><?php echo $EmployeeGrade; ?></td></tr>
	    <tr><td>EmployeeBirthPlace</td><td><?php echo $EmployeeBirthPlace; ?></td></tr>
	    <tr><td>EmployeeBirthDate</td><td><?php echo $EmployeeBirthDate; ?></td></tr>
	    <tr><td>MothersMaidenName</td><td><?php echo $MothersMaidenName; ?></td></tr>
	    <tr><td>IdentityType</td><td><?php echo $IdentityType; ?></td></tr>
	    <tr><td>IdentityNumber</td><td><?php echo $IdentityNumber; ?></td></tr>
	    <tr><td>IdentityFilePath</td><td><?php echo $IdentityFilePath; ?></td></tr>
	    <tr><td>IdentityFileName</td><td><?php echo $IdentityFileName; ?></td></tr>
	    <tr><td>Sex</td><td><?php echo $Sex; ?></td></tr>
	    <tr><td>Religion</td><td><?php echo $Religion; ?></td></tr>
	    <tr><td>NPWP</td><td><?php echo $NPWP; ?></td></tr>
	    <tr><td>FixedPhoneNumber</td><td><?php echo $FixedPhoneNumber; ?></td></tr>
	    <tr><td>PhoneNumber</td><td><?php echo $PhoneNumber; ?></td></tr>
	    <tr><td>PhoneNumber2</td><td><?php echo $PhoneNumber2; ?></td></tr>
	    <tr><td>EmergencyName</td><td><?php echo $EmergencyName; ?></td></tr>
	    <tr><td>EmergencyStatus</td><td><?php echo $EmergencyStatus; ?></td></tr>
	    <tr><td>EmergencyNumber</td><td><?php echo $EmergencyNumber; ?></td></tr>
	    <tr><td>EmergencyAddress</td><td><?php echo $EmergencyAddress; ?></td></tr>
	    <tr><td>Province</td><td><?php echo $Province; ?></td></tr>
	    <tr><td>StreetAddress</td><td><?php echo $StreetAddress; ?></td></tr>
	    <tr><td>PostalCode</td><td><?php echo $PostalCode; ?></td></tr>
	    <tr><td>EmailAddress</td><td><?php echo $EmailAddress; ?></td></tr>
	    <tr><td>MaritalStatus</td><td><?php echo $MaritalStatus; ?></td></tr>
	    <tr><td>Height</td><td><?php echo $Height; ?></td></tr>
	    <tr><td>Weight</td><td><?php echo $Weight; ?></td></tr>
	    <tr><td>PhotoFilePath</td><td><?php echo $PhotoFilePath; ?></td></tr>
	    <tr><td>PhotoFileName</td><td><?php echo $PhotoFileName; ?></td></tr>
	    <tr><td>AgencyID</td><td><?php echo $AgencyID; ?></td></tr>
	    <tr><td>SalesCenterID</td><td><?php echo $SalesCenterID; ?></td></tr>
	    <tr><td>InterviewApprovalID</td><td><?php echo $InterviewApprovalID; ?></td></tr>
	    <tr><td>InterviewLevel</td><td><?php echo $InterviewLevel; ?></td></tr>
	    <tr><td>InterviewStatus</td><td><?php echo $InterviewStatus; ?></td></tr>
	    <tr><td>HiringApprovalID</td><td><?php echo $HiringApprovalID; ?></td></tr>
	    <tr><td>HiringLevel</td><td><?php echo $HiringLevel; ?></td></tr>
	    <tr><td>HiringStatus</td><td><?php echo $HiringStatus; ?></td></tr>
	    <tr><td>ApprovalID</td><td><?php echo $ApprovalID; ?></td></tr>
	    <tr><td>ApprovalLevel</td><td><?php echo $ApprovalLevel; ?></td></tr>
	    <tr><td>ApprovalStatus</td><td><?php echo $ApprovalStatus; ?></td></tr>
	    <tr><td>IsDiscontinued</td><td><?php echo $IsDiscontinued; ?></td></tr>
	    <tr><td>IsDedicated</td><td><?php echo $IsDedicated; ?></td></tr>
	    <tr><td>DedicatedRemark</td><td><?php echo $DedicatedRemark; ?></td></tr>
	    <tr><td>ActiveDate</td><td><?php echo $ActiveDate; ?></td></tr>
	    <tr><td>EndDate</td><td><?php echo $EndDate; ?></td></tr>
	    <tr><td>EndReason</td><td><?php echo $EndReason; ?></td></tr>
	    <tr><td>CreatedDate</td><td><?php echo $CreatedDate; ?></td></tr>
	    <tr><td>CreatedBy</td><td><?php echo $CreatedBy; ?></td></tr>
	    <tr><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Konfirmasi</button></td><td><a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>



<!-- 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

 -->
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=site_url('Employee/hiring_approval')?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hiring Status:</label>
            <select name="HiringStatus" class="form-control">
            	<option value="1">Approve</option>
            	<option value="3">Hold</option>
            	<option value="4">Cancel</option>
            	<option value="5">Reject</option>
            	<!-- <option value="2">WAITINGApprove</option> -->
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Keterangan:</label>
            <textarea class="form-control" name="Keterangan"></textarea>
          </div>

<input type="hidden" name="EmployeeID" value="<?=$EmployeeID?>">
<input type="hidden" name="HiringLevel" value="<?=$HiringLevel?>">
<input type="hidden" name="HiringApprovalID" value="<?=$HiringApprovalID?>">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Subbmit" class="btn btn-primary">Subbmit</button>
      </div>
        </form>
    </div>
  </div>
</div>