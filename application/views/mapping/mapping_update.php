<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->


 <!-- DATA TABLES FOR MODAL-->
    <link href="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


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
<?php foreach($query_mapping as $data){
?>

<form action="<?=site_url('mapping/update_save');?>" method="POST">

<!-----ID---->
<input type="hidden"   id="id" name="id" value="<?=$data->id?>" readonly>

<!--
<input type="text"   id="id_employee_atasan" name="id_employee_atasan"  readonly>
-->

  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="Sales_code">Sales Name </label>
      <input type="text" class="form-control"  id="nama" name="nama" value="<?=$data->nama?>" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="Sales_code">No KTP </label>
      <input type="text" class="form-control"  id="no_ktp" name="no_ktp" value="<?=$data->no_ktp?>" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="Sales_code">Sales Code </label>
      <input type="text" class="form-control"  id="sales_code" name="sales_code" value="<?=$sales_code?>" readonly>
    </div>
<!----
    <div class="form-group col-md-3">
      <label for="Sales_code">Atasan </label>
      <input type="text" class="form-control"  id="atasan" name="atasan"  >
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>
    </div>
    ---->


</div>




  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="Sales_code">Posisi</label>
      <input type="text" class="form-control"  id="posisi" name="posisi" value="<?=$data->posisi?>" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="Sales_code">Agency</label>
      <input type="text" class="form-control"  id="agency" name="agency" value="<?=$data->agency?>" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="Sales_code">Sales Center</label>
      <input type="text" class="form-control"  id="sales_center" name="sales_center" value="<?=$data->sales_center?>" readonly>
    </div>



    </div>



  

  <button type="submit" class="btn btn-primary">Update</button>

</form>

<?php
}
?>

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

        <script type="text/javascript">


  $(function () {
    $('#lookup').DataTable()
/*
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
*/  
  })
//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                //alert("tessssssss");
                document.getElementById("atasan").value = $(this).attr('data-kode');

                                document.getElementById("id_employee_atasan").value = $(this).attr('data-id');
                // document.getElementById("nama").value = $(this).attr('data-nama');
                // document.getElementById("email").value = $(this).attr('data-email');
                $('#myModal').modal('hide');
            });

//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

            function dummy() {
                var kode_obat = document.getElementById("kode_obat").value;
                alert('kode obat ' + kode_obat + ' berhasil tersimpan');
            }
        </script>


<!-- DATA TABES SCRIPT -->
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=$this->config->item('base_url')?>assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>





<?php
$this->load->view('template/foot');
?>




        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lookup Kode </h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Agency</th>
                                    <th>Sales Center</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
foreach ($query_all_employee as $r){
                                    ?>
                                    <tr class="pilih" data-kode="<?php echo $r->sales_code; ?>" 
                                    data-id="<?php echo $r->id; ?>" >
                                        <td><?php echo $r->sales_code; ?></td>
                                        <td><?php echo $r->nama; ?></td>
                                        <td><?php echo $r->agency; ?></td>
                                        <td><?php echo $r->sales_center; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        
