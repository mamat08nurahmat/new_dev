
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>AGENCY LIST <?php echo anchor('agency/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('agency/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('agency/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('agency/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
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
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('agency/read/'.$agency->AgencyID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('agency/update/'.$agency->AgencyID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('agency/delete/'.$agency->AgencyID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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