
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>APPUSER LIST <?php echo anchor('appuser/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('appuser/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('appuser/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('appuser/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
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
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('appuser/read/'.$appuser->UserID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('appuser/update/'.$appuser->UserID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('appuser/delete/'.$appuser->UserID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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