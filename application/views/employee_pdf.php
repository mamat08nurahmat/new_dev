<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Employee List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ParentEmployeeID</th>
		<th>EmployeeName</th>
		<th>EmployeeOldCode</th>
		<th>EmployeeNewCode</th>
		<th>UserGroupID</th>
		<th>EmployeeStatus</th>
		<th>EmployeeGrade</th>
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
		<th>AgencyID</th>
		<th>SalesCenterID</th>
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
		<th>IsDedicated</th>
		<th>DedicatedRemark</th>
		<th>ActiveDate</th>
		<th>EndDate</th>
		<th>EndReason</th>
		<th>CreatedDate</th>
		<th>CreatedBy</th>
		
            </tr><?php
            foreach ($employee_data as $employee)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $employee->ParentEmployeeID ?></td>
		      <td><?php echo $employee->EmployeeName ?></td>
		      <td><?php echo $employee->EmployeeOldCode ?></td>
		      <td><?php echo $employee->EmployeeNewCode ?></td>
		      <td><?php echo $employee->UserGroupID ?></td>
		      <td><?php echo $employee->EmployeeStatus ?></td>
		      <td><?php echo $employee->EmployeeGrade ?></td>
		      <td><?php echo $employee->EmployeeBirthPlace ?></td>
		      <td><?php echo $employee->EmployeeBirthDate ?></td>
		      <td><?php echo $employee->MothersMaidenName ?></td>
		      <td><?php echo $employee->IdentityType ?></td>
		      <td><?php echo $employee->IdentityNumber ?></td>
		      <td><?php echo $employee->IdentityFilePath ?></td>
		      <td><?php echo $employee->IdentityFileName ?></td>
		      <td><?php echo $employee->Sex ?></td>
		      <td><?php echo $employee->Religion ?></td>
		      <td><?php echo $employee->NPWP ?></td>
		      <td><?php echo $employee->FixedPhoneNumber ?></td>
		      <td><?php echo $employee->PhoneNumber ?></td>
		      <td><?php echo $employee->PhoneNumber2 ?></td>
		      <td><?php echo $employee->EmergencyName ?></td>
		      <td><?php echo $employee->EmergencyStatus ?></td>
		      <td><?php echo $employee->EmergencyNumber ?></td>
		      <td><?php echo $employee->EmergencyAddress ?></td>
		      <td><?php echo $employee->Province ?></td>
		      <td><?php echo $employee->StreetAddress ?></td>
		      <td><?php echo $employee->PostalCode ?></td>
		      <td><?php echo $employee->EmailAddress ?></td>
		      <td><?php echo $employee->MaritalStatus ?></td>
		      <td><?php echo $employee->Height ?></td>
		      <td><?php echo $employee->Weight ?></td>
		      <td><?php echo $employee->PhotoFilePath ?></td>
		      <td><?php echo $employee->PhotoFileName ?></td>
		      <td><?php echo $employee->AgencyID ?></td>
		      <td><?php echo $employee->SalesCenterID ?></td>
		      <td><?php echo $employee->InterviewApprovalID ?></td>
		      <td><?php echo $employee->InterviewLevel ?></td>
		      <td><?php echo $employee->InterviewStatus ?></td>
		      <td><?php echo $employee->HiringApprovalID ?></td>
		      <td><?php echo $employee->HiringLevel ?></td>
		      <td><?php echo $employee->HiringStatus ?></td>
		      <td><?php echo $employee->ApprovalID ?></td>
		      <td><?php echo $employee->ApprovalLevel ?></td>
		      <td><?php echo $employee->ApprovalStatus ?></td>
		      <td><?php echo $employee->IsDiscontinued ?></td>
		      <td><?php echo $employee->IsDedicated ?></td>
		      <td><?php echo $employee->DedicatedRemark ?></td>
		      <td><?php echo $employee->ActiveDate ?></td>
		      <td><?php echo $employee->EndDate ?></td>
		      <td><?php echo $employee->EndReason ?></td>
		      <td><?php echo $employee->CreatedDate ?></td>
		      <td><?php echo $employee->CreatedBy ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>