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
        <h2>Paymentperformancehd List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Month</th>
		<th>Year</th>
		<th>ApprovalID</th>
		<th>ApprovalLevel</th>
		<th>Approvalstatus</th>
		
            </tr><?php
            foreach ($paymentperformancehd_data as $paymentperformancehd)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $paymentperformancehd->Month ?></td>
		      <td><?php echo $paymentperformancehd->Year ?></td>
		      <td><?php echo $paymentperformancehd->ApprovalID ?></td>
		      <td><?php echo $paymentperformancehd->ApprovalLevel ?></td>
		      <td><?php echo $paymentperformancehd->Approvalstatus ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>