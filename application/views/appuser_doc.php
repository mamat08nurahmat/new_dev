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
        <h2>Appuser List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>UserGroupID</th>
		<th>ParentUserID</th>
		<th>UserLoginID</th>
		<th>UserName</th>
		<th>NPP</th>
		<th>Password</th>
		<th>SRLanguage</th>
		<th>EmailAddress</th>
		<th>PhoneNumber</th>
		<th>ActiveDate</th>
		<th>ExpireDate</th>
		<th>IsActive</th>
		<th>AreaGroupID</th>
		<th>AreaID</th>
		<th>AgencyID</th>
		<th>EmployeeID</th>
		<th>PhotoFilePath</th>
		<th>PhotoFileName</th>
		<th>IconPhotoFilePath</th>
		
            </tr><?php
            foreach ($appuser_data as $appuser)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $appuser->UserGroupID ?></td>
		      <td><?php echo $appuser->ParentUserID ?></td>
		      <td><?php echo $appuser->UserLoginID ?></td>
		      <td><?php echo $appuser->UserName ?></td>
		      <td><?php echo $appuser->NPP ?></td>
		      <td><?php echo $appuser->Password ?></td>
		      <td><?php echo $appuser->SRLanguage ?></td>
		      <td><?php echo $appuser->EmailAddress ?></td>
		      <td><?php echo $appuser->PhoneNumber ?></td>
		      <td><?php echo $appuser->ActiveDate ?></td>
		      <td><?php echo $appuser->ExpireDate ?></td>
		      <td><?php echo $appuser->IsActive ?></td>
		      <td><?php echo $appuser->AreaGroupID ?></td>
		      <td><?php echo $appuser->AreaID ?></td>
		      <td><?php echo $appuser->AgencyID ?></td>
		      <td><?php echo $appuser->EmployeeID ?></td>
		      <td><?php echo $appuser->PhotoFilePath ?></td>
		      <td><?php echo $appuser->PhotoFileName ?></td>
		      <td><?php echo $appuser->IconPhotoFilePath ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>