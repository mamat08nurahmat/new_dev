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
        <h2>Systemcardlink List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BatchID</th>
		<th>OpenDate</th>
		<th>SourceCode</th>
		<th>CustomerNumber</th>
		<th>CustomerName</th>
		<th>CustomerBirthDate</th>
		<th>ORG</th>
		<th>Logo</th>
		<th>EmpReffCode</th>
		<th>BlockCard</th>
		<th>ApplicationType</th>
		
            </tr><?php
            foreach ($systemcardlink_data as $systemcardlink)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $systemcardlink->BatchID ?></td>
		      <td><?php echo $systemcardlink->OpenDate ?></td>
		      <td><?php echo $systemcardlink->SourceCode ?></td>
		      <td><?php echo $systemcardlink->CustomerNumber ?></td>
		      <td><?php echo $systemcardlink->CustomerName ?></td>
		      <td><?php echo $systemcardlink->CustomerBirthDate ?></td>
		      <td><?php echo $systemcardlink->ORG ?></td>
		      <td><?php echo $systemcardlink->Logo ?></td>
		      <td><?php echo $systemcardlink->EmpReffCode ?></td>
		      <td><?php echo $systemcardlink->BlockCard ?></td>
		      <td><?php echo $systemcardlink->ApplicationType ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>