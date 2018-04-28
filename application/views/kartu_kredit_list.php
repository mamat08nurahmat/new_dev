
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>KARTU_KREDIT LIST <?php echo anchor('kartu_kredit/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('kartu_kredit/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('kartu_kredit/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('kartu_kredit/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>RowID</th>
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
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($kartu_kredit_data as $kartu_kredit)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $kartu_kredit->RowID ?></td>
		    <td><?php echo $kartu_kredit->BatchID ?></td>
		    <td><?php echo $kartu_kredit->Tanggal_Survey ?></td>
		    <td><?php echo $kartu_kredit->Surveyor ?></td>
		    <td><?php echo $kartu_kredit->No_Aplikasi ?></td>
		    <td><?php echo $kartu_kredit->Product ?></td>
		    <td><?php echo $kartu_kredit->Source_Code ?></td>
		    <td><?php echo $kartu_kredit->Channel_Aplikasi ?></td>
		    <td><?php echo $kartu_kredit->Coverage_Area ?></td>
		    <td><?php echo $kartu_kredit->Sales_Code ?></td>
		    <td><?php echo $kartu_kredit->Nama_Aplikan ?></td>
		    <td><?php echo $kartu_kredit->No_Identitas ?></td>
		    <td><?php echo $kartu_kredit->DOB ?></td>
		    <td><?php echo $kartu_kredit->Jenis_Kelamin ?></td>
		    <td><?php echo $kartu_kredit->No_HP ?></td>
		    <td><?php echo $kartu_kredit->Jenis_Perusahaan ?></td>
		    <td><?php echo $kartu_kredit->Nama_Perusahaan ?></td>
		    <td><?php echo $kartu_kredit->Jabatan ?></td>
		    <td><?php echo $kartu_kredit->Penghasilan ?></td>
		    <td><?php echo $kartu_kredit->Lama_Bekerja ?></td>
		    <td><?php echo $kartu_kredit->Status_Karyawan ?></td>
		    <td><?php echo $kartu_kredit->Alamat_Kantor ?></td>
		    <td><?php echo $kartu_kredit->Kecamatan ?></td>
		    <td><?php echo $kartu_kredit->Kota ?></td>
		    <td><?php echo $kartu_kredit->No_Telp_Kantor ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('kartu_kredit/read/'.$kartu_kredit->),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('kartu_kredit/update/'.$kartu_kredit->),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('kartu_kredit/delete/'.$kartu_kredit->),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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