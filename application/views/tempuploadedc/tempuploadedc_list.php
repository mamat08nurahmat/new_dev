<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <!-- FORM -->
        
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>TEMPUPLOADEDC LIST <?php echo anchor('tempuploadedc/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
        <?php echo anchor(site_url('tempuploadedc/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
        <?php echo anchor(site_url('tempuploadedc/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
        <?php echo anchor(site_url('tempuploadedc/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>BatchID</th>
            <th>MID</th>
            <th>MERCHAN DBA NAME</th>
            <th>STATUS EDC</th>
            <th>OPEN DATE</th>
            <th>CITY</th>
            <th>MSO</th>
            <th>SOURCE CODE</th>
            <th>POS1</th>
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($tempuploadedc_data as $tempuploadedc)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $tempuploadedc->BatchID ?></td>
            <td><?php echo $tempuploadedc->MID ?></td>
            <td><?php echo $tempuploadedc->MERCHAN_DBA_NAME ?></td>
            <td><?php echo $tempuploadedc->STATUS_EDC ?></td>
            <td><?php echo $tempuploadedc->OPEN_DATE ?></td>
            <td><?php echo $tempuploadedc->CITY ?></td>
            <td><?php echo $tempuploadedc->MSO ?></td>
            <td><?php echo $tempuploadedc->SOURCE_CODE ?></td>
            <td><?php echo $tempuploadedc->POS1 ?></td>
            <td style="text-align:center" width="140px">
            <?php 
            echo anchor(site_url('tempuploadedc/read/'.$tempuploadedc->RowID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('tempuploadedc/update/'.$tempuploadedc->RowID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('tempuploadedc/delete/'.$tempuploadedc->RowID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        <!-- FORM -->
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>