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
        <h2>System_upload List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BatchID</th>
		<th>UploadDate</th>
		<th>UploadBy</th>
		<th>UploadRemark</th>
		<th>ApplicationSource</th>
		<th>ProcessMonth</th>
		<th>ProcessYear</th>
		<th>FilePath</th>
		<th>VirtualPath</th>
		<th>FileSize</th>
		<th>ReportPath</th>
		<th>RowDataCount</th>
		<th>RowDataSucceed</th>
		<th>RowDataFailed</th>
		<th>ApprovalID</th>
		<th>StatusUpload</th>
		
            </tr><?php
            foreach ($system_upload_data as $system_upload)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $system_upload->BatchID ?></td>
		      <td><?php echo $system_upload->UploadDate ?></td>
		      <td><?php echo $system_upload->UploadBy ?></td>
		      <td><?php echo $system_upload->UploadRemark ?></td>
		      <td><?php echo $system_upload->ApplicationSource ?></td>
		      <td><?php echo $system_upload->ProcessMonth ?></td>
		      <td><?php echo $system_upload->ProcessYear ?></td>
		      <td><?php echo $system_upload->FilePath ?></td>
		      <td><?php echo $system_upload->VirtualPath ?></td>
		      <td><?php echo $system_upload->FileSize ?></td>
		      <td><?php echo $system_upload->ReportPath ?></td>
		      <td><?php echo $system_upload->RowDataCount ?></td>
		      <td><?php echo $system_upload->RowDataSucceed ?></td>
		      <td><?php echo $system_upload->RowDataFailed ?></td>
		      <td><?php echo $system_upload->ApprovalID ?></td>
		      <td><?php echo $system_upload->StatusUpload ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>