
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
		    <td><?php echo $employee->EmployeeGrade ?></td>
		    <td><?php echo $employee->AgencyName ?></td>
		    <td><?php echo $employee->SalesCenterName ?></td>

<!-- 		    <td><?php// echo $employee->IsDiscontinued ?></td>
 -->
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('employee/read/'.$employee->EmployeeID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('employee/update/'.$employee->EmployeeID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('employee/delete/'.$employee->EmployeeID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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