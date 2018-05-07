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
        <h2>Agency List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>AgencyName</th>
		<th>StreetAddress</th>
		<th>VillageAddress</th>
		<th>SubDistrictAddress</th>
		<th>PostalCode</th>
		<th>CityAddress</th>
		<th>PhoneNumber</th>
		<th>FaxNumber</th>
		<th>EmailAddress</th>
		<th>Status</th>
		<th>ActiveDate</th>
		<th>EndDate</th>
		<th>IsActive</th>
		<th>UserType</th>
		
            </tr><?php
            foreach ($agency_data as $agency)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $agency->AgencyName ?></td>
		      <td><?php echo $agency->StreetAddress ?></td>
		      <td><?php echo $agency->VillageAddress ?></td>
		      <td><?php echo $agency->SubDistrictAddress ?></td>
		      <td><?php echo $agency->PostalCode ?></td>
		      <td><?php echo $agency->CityAddress ?></td>
		      <td><?php echo $agency->PhoneNumber ?></td>
		      <td><?php echo $agency->FaxNumber ?></td>
		      <td><?php echo $agency->EmailAddress ?></td>
		      <td><?php echo $agency->Status ?></td>
		      <td><?php echo $agency->ActiveDate ?></td>
		      <td><?php echo $agency->EndDate ?></td>
		      <td><?php echo $agency->IsActive ?></td>
		      <td><?php echo $agency->UserType ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>