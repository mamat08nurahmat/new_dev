<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Agency Read</h2>
        <table class="table">
	    <tr><td>AgencyName</td><td><?php echo $AgencyName; ?></td></tr>
	    <tr><td>StreetAddress</td><td><?php echo $StreetAddress; ?></td></tr>
	    <tr><td>VillageAddress</td><td><?php echo $VillageAddress; ?></td></tr>
	    <tr><td>SubDistrictAddress</td><td><?php echo $SubDistrictAddress; ?></td></tr>
	    <tr><td>PostalCode</td><td><?php echo $PostalCode; ?></td></tr>
	    <tr><td>CityAddress</td><td><?php echo $CityAddress; ?></td></tr>
	    <tr><td>PhoneNumber</td><td><?php echo $PhoneNumber; ?></td></tr>
	    <tr><td>FaxNumber</td><td><?php echo $FaxNumber; ?></td></tr>
	    <tr><td>EmailAddress</td><td><?php echo $EmailAddress; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $Status; ?></td></tr>
	    <tr><td>ActiveDate</td><td><?php echo $ActiveDate; ?></td></tr>
	    <tr><td>EndDate</td><td><?php echo $EndDate; ?></td></tr>
	    <tr><td>IsActive</td><td><?php echo $IsActive; ?></td></tr>
	    <tr><td>UserType</td><td><?php echo $UserType; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('agency') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>