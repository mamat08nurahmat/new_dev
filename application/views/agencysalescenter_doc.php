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
        <h2>Agencysalescenter List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>AgencyID</th>
		<th>AreaID</th>
		<th>CityID</th>
		<th>AsuradurID</th>
		<th>SourceData</th>
		<th>SalesCenterCode</th>
		<th>SalesCenterName</th>
		<th>StreetAddress</th>
		<th>VillageAddress</th>
		<th>SubDistrictAddress</th>
		<th>CityAddress</th>
		<th>PostalCode</th>
		<th>PhoneNumber</th>
		<th>FaxNumber</th>
		<th>EmailAddress</th>
		<th>IsActive</th>
		<th>ActiveDate</th>
		<th>Enddate</th>
		<th>ReasonEnd</th>
		
            </tr><?php
            foreach ($agencysalescenter_data as $agencysalescenter)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $agencysalescenter->AgencyID ?></td>
		      <td><?php echo $agencysalescenter->AreaID ?></td>
		      <td><?php echo $agencysalescenter->CityID ?></td>
		      <td><?php echo $agencysalescenter->AsuradurID ?></td>
		      <td><?php echo $agencysalescenter->SourceData ?></td>
		      <td><?php echo $agencysalescenter->SalesCenterCode ?></td>
		      <td><?php echo $agencysalescenter->SalesCenterName ?></td>
		      <td><?php echo $agencysalescenter->StreetAddress ?></td>
		      <td><?php echo $agencysalescenter->VillageAddress ?></td>
		      <td><?php echo $agencysalescenter->SubDistrictAddress ?></td>
		      <td><?php echo $agencysalescenter->CityAddress ?></td>
		      <td><?php echo $agencysalescenter->PostalCode ?></td>
		      <td><?php echo $agencysalescenter->PhoneNumber ?></td>
		      <td><?php echo $agencysalescenter->FaxNumber ?></td>
		      <td><?php echo $agencysalescenter->EmailAddress ?></td>
		      <td><?php echo $agencysalescenter->IsActive ?></td>
		      <td><?php echo $agencysalescenter->ActiveDate ?></td>
		      <td><?php echo $agencysalescenter->Enddate ?></td>
		      <td><?php echo $agencysalescenter->ReasonEnd ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>