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
        <h2>Performanceunmatch List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ApplicationSource</th>
		<th>BatchID</th>
		<th>Month</th>
		<th>Year</th>
		<th>EmployeeID</th>
		<th>OldSourceCode</th>
		<th>NewSourceCode</th>
		<th>Remark</th>
		<th>ProposedDate</th>
		<th>ProposedBy</th>
		<th>ApprovalID</th>
		<th>IsGenerateCorrection</th>
		
            </tr><?php
            foreach ($performanceunmatch_data as $performanceunmatch)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $performanceunmatch->ApplicationSource ?></td>
		      <td><?php echo $performanceunmatch->BatchID ?></td>
		      <td><?php echo $performanceunmatch->Month ?></td>
		      <td><?php echo $performanceunmatch->Year ?></td>
		      <td><?php echo $performanceunmatch->EmployeeID ?></td>
		      <td><?php echo $performanceunmatch->OldSourceCode ?></td>
		      <td><?php echo $performanceunmatch->NewSourceCode ?></td>
		      <td><?php echo $performanceunmatch->Remark ?></td>
		      <td><?php echo $performanceunmatch->ProposedDate ?></td>
		      <td><?php echo $performanceunmatch->ProposedBy ?></td>
		      <td><?php echo $performanceunmatch->ApprovalID ?></td>
		      <td><?php echo $performanceunmatch->IsGenerateCorrection ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>