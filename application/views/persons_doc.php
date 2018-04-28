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
        <h2>Persons List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>LastName</th>
		<th>FirstName</th>
		<th>Age</th>
		
            </tr><?php
            foreach ($persons_data as $persons)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $persons->LastName ?></td>
		      <td><?php echo $persons->FirstName ?></td>
		      <td><?php echo $persons->Age ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>