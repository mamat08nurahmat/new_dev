
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SYSTEMCCOS LIST <br>
                  	<!-- <?php //echo anchor('systemccos/create/','Create',array('class'=>'btn btn-danger btn-sm'));?> -->
		<?php echo anchor(site_url('systemccos/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('systemccos/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('systemccos/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>BatchID</th>
		    <th>DecisionDate</th>
<!--
		    <th>SourceCode</th>
-->			
		    <th>CustomerName</th>
<!--
		    <th>CustomerBirthDate</th>
		    <th>ORG</th>
		    <th>Logo</th>
		    <th>EmpReffCode</th>
		    <th>Status</th>
		    <th>DeclineCode</th>
		    <th>ApplicationType</th>
		    <th>ProcessMonth</th>
		    <th>ProcessYear</th>
-->						
		    <th>No Identitas</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($systemccos_data as $systemccos)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $systemccos->BatchID ?></td>			
		    <td><?php echo $systemccos->DecisionDate ?></td>
<!--
		    <td><?php echo $systemccos->SourceCode ?></td>
-->						
		    <td><?php echo $systemccos->CustomerName ?></td>
<!--
		    <td><?php echo $systemccos->CustomerBirthDate ?></td>
		    <td><?php echo $systemccos->ORG ?></td>
		    <td><?php echo $systemccos->Logo ?></td>
		    <td><?php echo $systemccos->EmpReffCode ?></td>
		    <td><?php echo $systemccos->Status ?></td>
		    <td><?php echo $systemccos->DeclineCode ?></td>
		    <td><?php echo $systemccos->ApplicationType ?></td>
		    <td><?php echo $systemccos->ProcessMonth ?></td>
		    <td><?php echo $systemccos->ProcessYear ?></td>
-->						
		    <td><?php echo $systemccos->No_Identitas ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('systemccos/read/'.$systemccos->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('systemccos/update/'.$systemccos->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('systemccos/delete/'.$systemccos->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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