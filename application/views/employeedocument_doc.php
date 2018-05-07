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
        <h2>Employeedocument List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EmployeeDocumentID</th>
		<th>Remark</th>
		<th>FileLocation</th>
		<th>FileName</th>
		<th>ContentType</th>
		<th>ContentLength</th>
		
            </tr><?php
            foreach ($employeedocument_data as $employeedocument)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $employeedocument->EmployeeDocumentID ?></td>
		      <td><?php echo $employeedocument->Remark ?></td>
		      <td><?php echo $employeedocument->FileLocation ?></td>
		      <td><?php echo $employeedocument->FileName ?></td>
		      <td><?php echo $employeedocument->ContentType ?></td>
		      <td><?php echo $employeedocument->ContentLength ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>