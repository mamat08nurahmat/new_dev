
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SYSTEMCARDVENDOR LIST <?php echo anchor('systemcardvendor/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('systemcardvendor/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('systemcardvendor/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('systemcardvendor/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>BatchID</th>
		    <th>Tanggal Survey</th>
		    <th>Surveyor</th>
		    <th>No Aplikasi</th>
		    <th>Product</th>
		    <th>Source Code</th>
		    <th>Channel Aplikasi</th>
		    <th>Coverage Area</th>
		    <th>Sales Code</th>
		    <th>Nama Aplikan</th>
		    <th>No Identitas</th>
		    <th>DOB</th>
		    <th>Jenis Kelamin</th>
		    <th>No HP</th>
		    <th>Jenis Perusahaan</th>
		    <th>Nama Perusahaan</th>
		    <th>Jabatan</th>
		    <th>Penghasilan</th>
		    <th>Lama Bekerja</th>
		    <th>Status Karyawan</th>
		    <th>Alamat Kantor</th>
		    <th>Kecamatan</th>
		    <th>Kota</th>
		    <th>No Telp Kantor</th>
		    <th>ProcessMonth</th>
		    <th>ProcessYear</th>
		    <th>Status Kartu</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($systemcardvendor_data as $systemcardvendor)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $systemcardvendor->BatchID ?></td>
		    <td><?php echo $systemcardvendor->Tanggal_Survey ?></td>
		    <td><?php echo $systemcardvendor->Surveyor ?></td>
		    <td><?php echo $systemcardvendor->No_Aplikasi ?></td>
		    <td><?php echo $systemcardvendor->Product ?></td>
		    <td><?php echo $systemcardvendor->Source_Code ?></td>
		    <td><?php echo $systemcardvendor->Channel_Aplikasi ?></td>
		    <td><?php echo $systemcardvendor->Coverage_Area ?></td>
		    <td><?php echo $systemcardvendor->Sales_Code ?></td>
		    <td><?php echo $systemcardvendor->Nama_Aplikan ?></td>
		    <td><?php echo $systemcardvendor->No_Identitas ?></td>
		    <td><?php echo $systemcardvendor->DOB ?></td>
		    <td><?php echo $systemcardvendor->Jenis_Kelamin ?></td>
		    <td><?php echo $systemcardvendor->No_HP ?></td>
		    <td><?php echo $systemcardvendor->Jenis_Perusahaan ?></td>
		    <td><?php echo $systemcardvendor->Nama_Perusahaan ?></td>
		    <td><?php echo $systemcardvendor->Jabatan ?></td>
		    <td><?php echo $systemcardvendor->Penghasilan ?></td>
		    <td><?php echo $systemcardvendor->Lama_Bekerja ?></td>
		    <td><?php echo $systemcardvendor->Status_Karyawan ?></td>
		    <td><?php echo $systemcardvendor->Alamat_Kantor ?></td>
		    <td><?php echo $systemcardvendor->Kecamatan ?></td>
		    <td><?php echo $systemcardvendor->Kota ?></td>
		    <td><?php echo $systemcardvendor->No_Telp_Kantor ?></td>
		    <td><?php echo $systemcardvendor->ProcessMonth ?></td>
		    <td><?php echo $systemcardvendor->ProcessYear ?></td>
		    <td><?php echo $systemcardvendor->Status_Kartu ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('systemcardvendor/read/'.$systemcardvendor->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('systemcardvendor/update/'.$systemcardvendor->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('systemcardvendor/delete/'.$systemcardvendor->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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