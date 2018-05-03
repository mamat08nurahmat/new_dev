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
        <h2>Systemccos List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BatchID</th>
		<th>DecisionDate</th>
		<th>SourceCode</th>
		<th>CustomerName</th>
		<th>CustomerBirthDate</th>
		<th>ORG</th>
		<th>Logo</th>
		<th>EmpReffCode</th>
		<th>Status</th>
		<th>DeclineCode</th>
		<th>ApplicationType</th>
		<th>ProcessMonth</th>
		<th>ProcessYear</th>
		<th>No Identitas</th>
		
            </tr><?php
            foreach ($systemccos_data as $systemccos)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $systemccos->BatchID ?></td>
		      <td><?php echo $systemccos->DecisionDate ?></td>
		      <td><?php echo $systemccos->SourceCode ?></td>
		      <td><?php echo $systemccos->CustomerName ?></td>
		      <td><?php echo $systemccos->CustomerBirthDate ?></td>
		      <td><?php echo $systemccos->ORG ?></td>
		      <td><?php echo $systemccos->Logo ?></td>
		      <td><?php echo $systemccos->EmpReffCode ?></td>
		      <td><?php echo $systemccos->Status ?></td>
		      <td><?php echo $systemccos->DeclineCode ?></td>
		      <td><?php echo $systemccos->ApplicationType ?></td>
		      <td><?php echo $systemccos->ProcessMonth ?></td>
		      <td><?php echo $systemccos->ProcessYear ?></td>
		      <td><?php echo $systemccos->No_Identitas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>