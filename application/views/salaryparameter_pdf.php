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
        <h2>Salaryparameter List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>UserGroupID</th>
		<th>EmployeeGrade</th>
		<th>EmployeeStatus</th>
		<th>ComponentID</th>
		<th>StartDate</th>
		<th>EndDate</th>
		<th>TargetTypeID</th>
		<th>Product1</th>
		<th>Product2</th>
		<th>Param1</th>
		<th>Param2</th>
		<th>Nominal</th>
		<th>IsMultiplier</th>
		<th>IsBasicSalary</th>
		
            </tr><?php
            foreach ($salaryparameter_data as $salaryparameter)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $salaryparameter->UserGroupID ?></td>
		      <td><?php echo $salaryparameter->EmployeeGrade ?></td>
		      <td><?php echo $salaryparameter->EmployeeStatus ?></td>
		      <td><?php echo $salaryparameter->ComponentID ?></td>
		      <td><?php echo $salaryparameter->StartDate ?></td>
		      <td><?php echo $salaryparameter->EndDate ?></td>
		      <td><?php echo $salaryparameter->TargetTypeID ?></td>
		      <td><?php echo $salaryparameter->Product1 ?></td>
		      <td><?php echo $salaryparameter->Product2 ?></td>
		      <td><?php echo $salaryparameter->Param1 ?></td>
		      <td><?php echo $salaryparameter->Param2 ?></td>
		      <td><?php echo $salaryparameter->Nominal ?></td>
		      <td><?php echo $salaryparameter->IsMultiplier ?></td>
		      <td><?php echo $salaryparameter->IsBasicSalary ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>