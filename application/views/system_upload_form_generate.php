<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
             <h3 class='box-title'>SYSTEM_UPLOAD GENERATE</h3>
    <div class='box box-primary'>


<?php
/*
*/
//print_r($no_ktp);
/*
*/
$linksz = array(
//''.base_url("index.php/report/get_generate_id/6303055011870017").'', 
//''.base_url("index.php/report/get_generate_id/6303055011870017").'', 
//''.base_url("index.php/report/get_generate_id/6303055011870017").'', 
//''.base_url("index.php/report/get_generate_id/6303055011870017").'', 
''.base_url().'' ,
''.base_url().'' 
);
//print_r($linksz);die();
$links = $data_link;
$open = '';
foreach ($links as $link) {
$open .= "window.open('{$link}','_blank'); ";
 
//$open .="document.write('Generate...');"; 
//$open .= "window.open('http://www.google.com','_blank'); ";
//$open .="setTimeout('window.location = 'http://www.google.com';,5000');"; 
}
echo "<a href=\"#\" onclick=\"{$open}\" id='target'>
<button  class='btn btn-info'><i class='icon icon-white icon-search'></i> GENERATE</button>
</a>";
/*
*/
?>  


    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->