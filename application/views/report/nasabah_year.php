<?php $this->load->view('default/header') ?>	
<td  valign="top" align="left">

<script type="text/javascript">
	$(function() {
	
		//-------------------------------------
		//	Set active tabbed window
		//-------------------------------------		
		$(function() { $("#tabs").tabs(); });
				
		//-------------------------------------
		//	Set action if submit 
		//-------------------------------------
		$('#submit').click(function(){
			getReport(0);	
		})
		
		$('#WILAYAH').change(function(){
			var wil = $('#WILAYAH').val(); 
			var urls = 	'<?php echo site_url() ?>/report/get_cabang/'+wil;
			$("#box_cab").html("<img src='<?php echo LOAD ?>'> <span style='color:#080'>loading</span>");
			$("#box_cab").load(urls)
		})
		
		//-------------------------------------
		//	Set action if export 
		//-------------------------------------
		$('#export').click(function(){
			getReport(1);			
		})
		
		//--------------------------------------------
		//	Function to get ajax content of report
		//--------------------------------------------
		function getReport(ex){
			var year 	= $('#YEAR').val(); 
			var month 	= $('#MONTH').val(); 
			var id = $('#ID').val(); 
			var cab = $('#CABANG').val();
			var wil = $('#WILAYAH').val();
			var msg = '';
			if(ex == 0){
				var urls = '<?php echo $url_data2 ?>/'+wil+'/'+cab+'/'+year;
				$("#report").html("<img src='<?php echo LOAD ?>'> <span style='color:#080'>loading</span>");
				$("#report").load(urls)
			} else {
				var urls = '<?php echo $url_data ?>/'+wil+'/'+cab+'/'+year; 
				//alert(urls);
				window.location = urls;
			}
		}
		
	
	//------------------------------------------------
	//	Choose SALES ID from dialog box if clicked
	//------------------------------------------------
	<?php if(! isset($data)){ ?>
		$('#ID').click(function(){			
			$('#search').dialog('open');
			//$('select').hide();
		});	
		$('#USER_NAME').click(function(){			
			$('#search').dialog('open');
			//$('select').hide();
		});			
	<?php } ?>
	
	//------------------------------
	//	Search jQuery Dialog Box
	//------------------------------
	$("#search").dialog({
		width		: 500,
		height		: 530,
		modal		: true,
		autoOpen	: false,
		buttons		: {'Close'	: function(){$(this).dialog('close'); $('select').show();} }
	});

	//------------------------------------
	//	Show all select if dialog close
	//------------------------------------
	$( "#search" ).dialog({
  	 	close: function(event, ui) { $('select').show(); }
	});

	
});


//-------------------------------------
//	Choose SALES ID from dialog box
//-------------------------------------
function pilih_data(com,grid)
	{
		if (com=='Pilih')
			{
			   if($('.trSelected',grid).length>0 && $('.trSelected',grid).length<2) {
					// to provide value in ie 6 suck
					var arrData = getSelectedRow();
					var nama = arrData[0][1].toUpperCase();
					$('#ID').val(arrData[0][0]);
					$('#USER_NAME').val(nama);
					$('#SALES_TYPE').val(arrData[0][2]);
					$('#search').dialog('close');
				}  else { alert('Pilih satu data saja !'); }	
			}          
	}
				
function getSelectedRow() {
	var arrReturn   = [];
	$('.trSelected').each(function() {
			var arrRow              = [];
			$(this).find('div').each(function() {
					arrRow.push( $(this).html() );
			});
			arrReturn.push(arrRow);
	});
	return arrReturn;
}

	
</script>


<div id='content_x'>
	<div id="tabs">
        <ul>
            <li><a href="#tabs-1">REPORT <?php echo strtoupper($rpt_name); ?></a></li>
        </ul>
        <div id="tabs-1">
            <form action="" method="post" enctype="application/x-www-form-urlencoded" name="frmReport" id="frmReport">
            <table width="" border="0" cellspacing="5" cellpadding="0">
              <tr>
                    <td align="left">WILAYAH</td>
                    <td>:</td>
                    <td align="left">
                    	<?php
							$lvl = array('SLN', 'DIVISI', 'TIM');
							if( in_array($this->session->userdata('USER_LEVEL'),$lvl) )
								echo form_dropdown('WILAYAH',$this->_report->get_wilayah(), '', 'id="WILAYAH"'); 
							else { 
								echo "<input name='WILAYAH' id='WILAYAH' type='hidden' value='".$this->session->userdata('REGION')."' />"; 
								echo $this->session->userdata('REGION');
								}
						?>
                    </td>
              </tr>
              
              <tr>
                    <td align="left">CABANG</td>
                    <td>:</td>
                    <td align="left">
                    	<div id='box_cab'>
						<?php
							$lvl = array('SLN', 'DIVISI', 'TIM', 'WILAYAH');
							if( in_array($this->session->userdata('USER_LEVEL'),$lvl) )
							{
								$wil_id = ($this->session->userdata('USER_LEVEL') == 'WILAYAH')?$this->session->userdata('REGION'):1;
								echo form_dropdown('CABANG',$this->_report->get_cabang_wil($wil_id), '', 'id="CABANG"'); 
							}
							else { 
								echo "<input name='CABANG' id='CABANG' type='hidden' value='".$this->session->userdata('BRANCH_ID')."' />"; 
								echo $this->session->userdata('BRANCH_NAME');
								}
						?>
                        </div>
                    </td>
                </tr>    
              
			<!--
               <tr>
                    <td align="left">Tahun</td>
                    <td>:</td>
                    <td align="left">
                    	<select name="YEAR" id="YEAR">
                    	<?php 
							$date = getdate(strtotime(NOW));
							$year = $date['year'];
							for($i=($year);$i<=$year;$i++)
							{
								$selected = ($i == $year)?'selected':'';
								echo "<option value='$i' $selected>$i</option>\n";
							}
						?>
                        </select>
                    </td>
                </tr>
			-->
                
                 <tr>
                	<td colspan='2'>&nbsp;</td>
                	<td><!-- <input name="submit" id="submit" type="button" value="Generate"> --> <input name="export" id="export" type="button" value="Export to XLS"></td>
                </tr>
            </table>
            </form>
            <br />
            <div id='report'>Silahkan klik Export to XLS untuk mengenerate report</div>
         </div>
	</div>
    
    <div id="search" title="SALES DATA">
		<?php #echo $js_grid; ?><table id="search_list" style="display:none"></table>
    </div>

</div><!-- close div content -->

</td>
</tr>
</table>
<script type="text/javascript">
<?php 
	$level 	= $_SESSION['USER_LEVEL'];
	$i		= 1;
	$html 	= "\$(function(){\$( '#accordion' ).accordion({ active:$i});});";
	echo $html;
?>
</script>
<?php $this->load->view('default/footer') ?>