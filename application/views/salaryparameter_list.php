
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SALARYPARAMETER LIST <?php echo anchor('salaryparameter/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('salaryparameter/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('salaryparameter/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('salaryparameter/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>UserGroupID</th>
		    <th>EmployeeGrade</th>
		    <th>EmployeeStatus</th>
		    <th>ComponentID</th>
		    <th>StartDate</th>
		    <th>EndDate</th>
		    <th>TargetTypeID</th>
		    <th>Product1</th>
		    <th>Product2</th>
		    <th>Param1</th>
		    <th>Param2</th>
		    <th>Nominal</th>
		    <th>IsMultiplier</th>
		    <th>IsBasicSalary</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($salaryparameter_data as $salaryparameter)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $salaryparameter->UserGroupID ?></td>
		    <td><?php echo $salaryparameter->EmployeeGrade ?></td>
		    <td><?php echo $salaryparameter->EmployeeStatus ?></td>
		    <td><?php echo $salaryparameter->ComponentID ?></td>
		    <td><?php echo $salaryparameter->StartDate ?></td>
		    <td><?php echo $salaryparameter->EndDate ?></td>
		    <td><?php echo $salaryparameter->TargetTypeID ?></td>
		    <td><?php echo $salaryparameter->Product1 ?></td>
		    <td><?php echo $salaryparameter->Product2 ?></td>
		    <td><?php echo $salaryparameter->Param1 ?></td>
		    <td><?php echo $salaryparameter->Param2 ?></td>
		    <td><?php echo $salaryparameter->Nominal ?></td>
		    <td><?php echo $salaryparameter->IsMultiplier ?></td>
		    <td><?php echo $salaryparameter->IsBasicSalary ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('salaryparameter/read/'.$salaryparameter->ParameterID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('salaryparameter/update/'.$salaryparameter->ParameterID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('salaryparameter/delete/'.$salaryparameter->ParameterID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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