
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>AGENCYSALESCENTER LIST <?php echo anchor('agencysalescenter/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('agencysalescenter/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('agencysalescenter/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('agencysalescenter/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
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
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('agencysalescenter/read/'.$agencysalescenter->SalesCenterID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('agencysalescenter/update/'.$agencysalescenter->SalesCenterID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('agencysalescenter/delete/'.$agencysalescenter->SalesCenterID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->