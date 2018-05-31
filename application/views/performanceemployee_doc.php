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
        <h2>Performanceemployee List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BatchID</th>
		<th>ApplicationSource</th>
		<th>AsOfDate</th>
		<th>EmployeeID</th>
		
            </tr><?php
            foreach ($performanceemployee_data as $performanceemployee)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $performanceemployee->BatchID ?></td>
		      <td><?php echo $performanceemployee->ApplicationSource ?></td>
		      <td><?php echo $performanceemployee->AsOfDate ?></td>
		      <td><?php echo $performanceemployee->EmployeeID ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>