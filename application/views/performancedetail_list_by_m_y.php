
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PERFORMANCEDETAIL LIST <?php echo anchor('performancedetail/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url($link_excel), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('performancedetail/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('performancedetail/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
		    <th>Open Date</th>
		    <th>Ch</th>
		    <th>Kd Agc</th>
		    <th>Kd DSR</th>
		    <th>Nama DSR</th>
		    <th>Status</th>
		    <th>Grade</th>
		    <th>Nama SPV</th>
		    <th>Nama Agency</th>
<!--
		    <th>Nama Nasabah</th>
		    <th>DOB</th>
-->						
		    <th>Jenis Kartu</th>
		    <th>St</th>
		    <th>Block/DC</th>
<!--
		    <th>Promo</th>
-->			
		    <th>Kartu 1	</th>
		    <th>Kartu 2</th>
		    <th>Program</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($performancedetail_data as $performancedetail)
            {
                ?>
                <tr>
		    <td>
<?php
$date=date_create($performancedetail->AsOfDate);
echo date_format($date,"Y/m/d ");
?>				
			</td>
			<!---CHANNEL-->
			<td><?php echo $performancedetail->Parameter3 ?></td>
			<!--Kode SalesCenterCode-->
		    <td><?php echo $performancedetail->Parameter5 ?></td>
			<!--Kd DSR/Kode Sales-->
		    <td><?php echo $performancedetail->Parameter6 ?></td>
<!--b.*,  LEFT JOIN Employee b ON a.Parameter6=b.EmployeeNewCode -->			
			<!--Nama DSR/Nama Sales-->
		    <td><?php echo $performancedetail->EmployeeName ?></td>
			<!--Status -exp:PKWT/NONPKWT-->
		    <td><?php echo $performancedetail->EmployeeStatus ?></td>			
			<!--Grade-->
		    <td><?php echo substr($performancedetail->EmployeeGrade,14)  ?></td>			
<!--c.EmployeeName as SPV_name  LEFT JOIN Employee c ON b.EmployeeID=c.ParentEmployeeID-->						
			<!--Nama Spv-->
		    <td><?php echo $performancedetail->SPV ?></td>
<!---d.*  LEFT JOIN AgencySalesCenter d ON a.Parameter5=d.SalesCentercode-->			
			<!--Nama Agency-->
		    <td><?php echo $performancedetail->AgencyName ?></td>
			
			<!--Nama Nasabah-->	 			
			<!--DOB-->	 
				
			<!--Jenis Kartu-->	 
		    <td><?php echo $performancedetail->Parameter15 ?></td>				
			<!--St-->	 
		    <td><?php echo $performancedetail->Parameter11 ?></td>								
			<!--Block / DC-->	 
		    <td><?php echo $performancedetail->Parameter12 ?></td>								

			<!--Promo-->	 
				
			<!--Kartu 1-->	 
		    <td><?php echo substr($performancedetail->Parameter8,5)  ?></td>												
			<!--Kartu 2-->	 
		    <td><?php echo substr($performancedetail->Parameter9,5) ?></td>								
			<!--Program-->  
		    <td><?php echo $performancedetail->Parameter10 ?></td>								


		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('performancedetail/read/'.$performancedetail->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('performancedetail/update/'.$performancedetail->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('performancedetail/delete/'.$performancedetail->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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