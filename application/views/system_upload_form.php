<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SYSTEM_UPLOAD</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

            <table class='table table-bordered'>
	    <tr><td>BatchID <?php echo form_error('BatchID') ?></td>
            <td><input type="text" class="form-control" name="BatchID" id="BatchID" placeholder="BatchID" value="<?php echo $BatchID; ?>" readonly/>
        </td>
	    <tr><td>UploadDate <?php echo form_error('UploadDate') ?></td>
            <td><input type="text" class="form-control" name="UploadDate" id="UploadDate" placeholder="UploadDate" value="<?php echo $UploadDate; ?>" readonly/>
        </td>
<!-- 	    <tr><td>UploadBy <?php echo form_error('UploadBy') ?></td>
            <td><input type="text" class="form-control" name="UploadBy" id="UploadBy" placeholder="UploadBy" value="<?php echo $UploadBy; ?>" />
        </td>
 -->	    <tr><td>UploadRemark <?php echo form_error('UploadRemark') ?></td>
            <td><textarea class="form-control" name="UploadRemark" id="UploadRemark"><?php echo $UploadRemark; ?></textarea><!-- <input type="text" class="form-control" name="UploadRemark" id="UploadRemark" placeholder="UploadRemark" value="<?php echo $UploadRemark; ?>" /> -->
        </td>
	    <tr><td>ApplicationSource <?php echo form_error('ApplicationSource') ?></td>
            <td>
            <select class="form-control" name="ApplicationSource" id="ApplicationSource">
                <option value="">---</option>
                <option value="CCOS">CCOS</option>
                <option value="CardLink">CardLink</option>
                <option value="CardVendor">CardVendor</option>
            </select>    
                <!-- <input type="text" class="form-control" name="ApplicationSource" id="ApplicationSource" placeholder="ApplicationSource" value="<?php echo $ApplicationSource; ?>" /> -->
        </td>
	    <tr><td>ProcessMonth <?php echo form_error('ProcessMonth') ?></td>
            <td>
                <!-- <input type="text" class="form-control" name="ProcessMonth" id="ProcessMonth" placeholder="ProcessMonth" value="<?php echo $ProcessMonth; ?>" /> -->
                <select class="form-control" name="ProcessMonth" id="ProcessMonth">
                    <option value="1">JANUARI</option>
                    <option value="2">FEBRUARI</option>
                    <option value="3">MARET</option>
                    <option value="4">APRIL</option>
                    <option value="5">MEI</option>
                    <option value="6">JUNI</option>
                    <option value="7">JULI</option>
                    <option value="8">AGUSTUS</option>
                    <option value="9">SEPTEMBER</option>
                    <option value="10">OKTOBER</option>
                    <option value="11">NOVEMBER</option>
                    <option value="12">DESEMBER</option>
                </select>
        </td>
	    <tr><td>ProcessYear <?php echo form_error('ProcessYear') ?></td>
            <td>
                <!-- <input type="text" class="form-control" name="ProcessYear" id="ProcessYear" placeholder="ProcessYear" value="<?php echo $ProcessYear; ?>" />
 -->        
            <select class="form-control" name="ProcessYear" id="ProcessYear">
                <option value="2017">2017</option>
                <option value=" 2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
            </td>
        <tr><td>FilePath <?php echo form_error('FilePath') ?></td>
            <td><input type="file" class="form-control" name="FilePath" id="FilePath" placeholder="FilePath" value="<?php echo $FilePath; ?>" />
        </td>
<!-- 	    
	    <tr><td>VirtualPath <?php echo form_error('VirtualPath') ?></td>
            <td><input type="text" class="form-control" name="VirtualPath" id="VirtualPath" placeholder="VirtualPath" value="<?php echo $VirtualPath; ?>" />
        </td>
	    <tr><td>FileSize <?php echo form_error('FileSize') ?></td>
            <td><input type="text" class="form-control" name="FileSize" id="FileSize" placeholder="FileSize" value="<?php echo $FileSize; ?>" />
        </td>
	    <tr><td>ReportPath <?php echo form_error('ReportPath') ?></td>
            <td><input type="text" class="form-control" name="ReportPath" id="ReportPath" placeholder="ReportPath" value="<?php echo $ReportPath; ?>" />
        </td>
	    <tr><td>RowDataCount <?php echo form_error('RowDataCount') ?></td>
            <td><input type="text" class="form-control" name="RowDataCount" id="RowDataCount" placeholder="RowDataCount" value="<?php echo $RowDataCount; ?>" />
        </td>
	    <tr><td>RowDataSucceed <?php echo form_error('RowDataSucceed') ?></td>
            <td><input type="text" class="form-control" name="RowDataSucceed" id="RowDataSucceed" placeholder="RowDataSucceed" value="<?php echo $RowDataSucceed; ?>" />
        </td>
	    <tr><td>RowDataFailed <?php echo form_error('RowDataFailed') ?></td>
            <td><input type="text" class="form-control" name="RowDataFailed" id="RowDataFailed" placeholder="RowDataFailed" value="<?php echo $RowDataFailed; ?>" />
        </td>
 --><!-- 	    <tr><td>ApprovalID <?php echo form_error('ApprovalID') ?></td>
            <td><input type="text" class="form-control" name="ApprovalID" id="ApprovalID" placeholder="ApprovalID" value="<?php echo $ApprovalID; ?>" />
        </td>
	    <tr><td>StatusUpload <?php echo form_error('StatusUpload') ?></td>
            <td><input type="text" class="form-control" name="StatusUpload" id="StatusUpload" placeholder="StatusUpload" value="<?php echo $StatusUpload; ?>" />
        </td> -->
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('system_upload') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->