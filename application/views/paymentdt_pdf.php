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
        <h2>Paymentdt List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Month</th>
		<th>Year</th>
		<th>CardLogo</th>
		<th>CardType</th>
		<th>MonthGenerate</th>
		<th>YearGenerate</th>
		<th>CardCount</th>
		
            </tr><?php
            foreach ($paymentdt_data as $paymentdt)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $paymentdt->Month ?></td>
		      <td><?php echo $paymentdt->Year ?></td>
		      <td><?php echo $paymentdt->CardLogo ?></td>
		      <td><?php echo $paymentdt->CardType ?></td>
		      <td><?php echo $paymentdt->MonthGenerate ?></td>
		      <td><?php echo $paymentdt->YearGenerate ?></td>
		      <td><?php echo $paymentdt->CardCount ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>