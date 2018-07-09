
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>EMPLOYEE LIST <?php echo anchor('employee/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('employee/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('employee/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('employee/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
				
<!---FILTER--->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Filter</button></h3>
            </div>
			

			<div id="demo" class="collapse">
  
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
				
                    <div class="form-group">
                        <label for="agency" class="col-sm-2 control-label">Agency</label>
                        <div class="col-sm-4">
                            <?php echo $form_agency; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="salescenter" class="col-sm-2 control-label">Sales Center</label>
                        <div class="col-sm-4">
                            <?php echo $form_sales_center; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                            <?php echo $form_agency; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="interviewstatus" class="col-sm-2 control-label">Interview Status</label>
                        <div class="col-sm-4">
                            <?php echo $form_agency; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hiringstatus" class="col-sm-2 control-label">Hiring Status</label>
                        <div class="col-sm-4">
                            <?php echo $form_agency; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="approvalstatus" class="col-sm-2 control-label">Approval Status</label>
                        <div class="col-sm-4">
                            <?php echo $form_agency; ?>
                        </div>
                    </div>

					

					
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
				</div>
			</div>						
        </div>			
<!---FILTER--->			
				
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <!-- <th>ParentEmployeeID</th> -->
		    <th>EmployeeName</th>
<!--
		    <th>EmployeeOldCode</th>
		    <th>EmployeeNewCode</th>
		    <th>UserGroupID</th>
-->			
		    <th>EmployeeStatus</th>
		    <th>EmployeeGrade</th>
<!--
		    <th>EmployeeBirthPlace</th>
		    <th>EmployeeBirthDate</th>
		    <th>MothersMaidenName</th>
		    <th>IdentityType</th>
		    <th>IdentityNumber</th>
		    <th>IdentityFilePath</th>
		    <th>IdentityFileName</th>
		    <th>Sex</th>
		    <th>Religion</th>
		    <th>NPWP</th>
		    <th>FixedPhoneNumber</th>
		    <th>PhoneNumber</th>
		    <th>PhoneNumber2</th>
		    <th>EmergencyName</th>
		    <th>EmergencyStatus</th>
		    <th>EmergencyNumber</th>
		    <th>EmergencyAddress</th>
		    <th>Province</th>
		    <th>StreetAddress</th>
		    <th>PostalCode</th>
		    <th>EmailAddress</th>
		    <th>MaritalStatus</th>
		    <th>Height</th>
		    <th>Weight</th>
		    <th>PhotoFilePath</th>
		    <th>PhotoFileName</th>
-->			
		    <th>AgencyID</th>
		    <th>SalesCenterID</th>
<!--
		    <th>InterviewApprovalID</th>
		    <th>InterviewLevel</th>
		    <th>InterviewStatus</th>
		    <th>HiringApprovalID</th>
		    <th>HiringLevel</th>
		    <th>HiringStatus</th>
		    <th>ApprovalID</th>
		    <th>ApprovalLevel</th>
		    <th>ApprovalStatus</th>
		    <th>IsDiscontinued</th>
-->			
<!--
		    <th>IsDedicated</th>
		    <th>DedicatedRemark</th>
		    <th>ActiveDate</th>
		    <th>EndDate</th>
		    <th>EndReason</th>
		    <th>CreatedDate</th>
		    <th>CreatedBy</th>
-->			
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($employee_data as $employee)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>

		    <td><?php echo $employee->EmployeeName ?></td>
		    <td><?php echo $employee->EmployeeStatus ?></td>
		    <td><?php echo substr($employee->EmployeeGrade,14) ?></td>
		    <td><?php echo $employee->AgencyName ?></td>
		    <td><?php echo $employee->SalesCenterName ?></td>

<!-- 		    <td><?php// echo $employee->IsDiscontinued ?></td>
 -->
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('employee/read/'.$employee->EmployeeID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 

//if status history selain approve
if($employee->HiringStatus == 3 || $employee->HiringStatus == 4|| $employee->HiringStatus == 5   ){

			echo anchor(site_url('employee/update_hiring/'.$employee->EmployeeID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 

}

			// echo anchor(site_url('employee/delete/'.$employee->EmployeeID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');


			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->