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
        <h2>Performancedetail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BatchID</th>
		<th>ApplicationSource</th>
		<th>AsOfDate</th>
		<th>CustomerName</th>
		<th>CustomerBirthDate</th>
		<th>Parameter1</th>
		<th>Parameter2</th>
		<th>Parameter3</th>
		<th>Parameter4</th>
		<th>Parameter5</th>
		<th>Parameter6</th>
		<th>Parameter7</th>
		<th>Parameter8</th>
		<th>Parameter9</th>
		<th>Parameter10</th>
		<th>Parameter11</th>
		<th>Parameter12</th>
		<th>Parameter13</th>
		<th>Parameter14</th>
		<th>Parameter15</th>
		
            </tr><?php
            foreach ($performancedetail_data as $performancedetail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $performancedetail->BatchID ?></td>
		      <td><?php echo $performancedetail->ApplicationSource ?></td>
		      <td><?php echo $performancedetail->AsOfDate ?></td>
		      <td><?php echo $performancedetail->CustomerName ?></td>
		      <td><?php echo $performancedetail->CustomerBirthDate ?></td>
		      <td><?php echo $performancedetail->Parameter1 ?></td>
		      <td><?php echo $performancedetail->Parameter2 ?></td>
		      <td><?php echo $performancedetail->Parameter3 ?></td>
		      <td><?php echo $performancedetail->Parameter4 ?></td>
		      <td><?php echo $performancedetail->Parameter5 ?></td>
		      <td><?php echo $performancedetail->Parameter6 ?></td>
		      <td><?php echo $performancedetail->Parameter7 ?></td>
		      <td><?php echo $performancedetail->Parameter8 ?></td>
		      <td><?php echo $performancedetail->Parameter9 ?></td>
		      <td><?php echo $performancedetail->Parameter10 ?></td>
		      <td><?php echo $performancedetail->Parameter11 ?></td>
		      <td><?php echo $performancedetail->Parameter12 ?></td>
		      <td><?php echo $performancedetail->Parameter13 ?></td>
		      <td><?php echo $performancedetail->Parameter14 ?></td>
		      <td><?php echo $performancedetail->Parameter15 ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>