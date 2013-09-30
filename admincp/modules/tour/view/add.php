<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>

<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Add"; elseif ($_GET['q'] == 'Edit') echo "Edit"; ?> Tour</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
    <div style="clear:both"></div>

    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
        ?></div>
    <?php } ?>
    <div class="content">
        <div id="tabs" class="htabs"><a tab="#tab_general">Information</a></div>

        <form method="post" enctype="multipart/form-data" name="myform">		
            <div id="tab_general">
                <table class="form">
                    <tr style="font-weight:bold">
                        <td>Name:</td>
                        <td><input type="text" size="100" value="<?php echo @$name ?>" name="name"></td>
                    </tr> 
					<tr>
                        <td>Intro description :</td>
                        <td><textarea name="short_desc" id="short_desc"><?php echo str_replace("\\", "", @$short_desc); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Description :</td>
                        <td><textarea name="description" id="description"><?php echo str_replace("\\", "", @$description); ?></textarea></td>
                    </tr>
                    <tr style="font-weight:bold">
                        <td>Image:</td>
                        <td>
                            <input type="file" name="image" size="30"  />
                            <?php if (!empty($uri)) { ?><img src="<?php echo @$uri ?>" name="<?php echo @$image_name ?>" width="80px" height="80px"/><?php } ?>
                        </td>
                    </tr> 

                    <tr style="font-weight:bold">
                        <td>Date start:</td>
                        <td><input id="date_start" type="text" size="100" value="<?php echo @$date_start ?>" name="date_start"></td>
                    </tr> 
                    
                    <tr style="font-weight:bold">
                        <td>Date end:</td>
                        <td><input id="date_end" type="text" size="100" value="<?php echo @$date_end ?>" name="date_end"></td>
                    </tr> 
                    <tr style="font-weight:bold">
                        <td>Khởi Hành:</td>
                        <td><input id="khoihanh_tour" type="text" size="100" value="<?php echo @$khoihanh_tour ?>" name="khoihanh_tour"></td>
                    </tr>
                    <tr style="font-weight:bold">
                        <td>Vehicle:</td>
                        <td><input id="vehicle" type="text" size="100" value="<?php echo @$vehicle ?>" name="vehicle"></td>
                    </tr> 
                    
                    <tr style="font-weight:bold">
                        <td>Price:</td>
                        <td><input id="price" type="text" size="100" value="<?php echo @$price ?>" name="price"></td>
                    </tr> 
                    
                    <tr style="font-weight:bold">
                        <td>Tax:</td>
                        <td>
							<input id="tax" type="text" size="100" value="<?php echo @$tax ?>" name="tax">
                        </td>
                    </tr> 
                    
                    <tr style="font-weight:bold">
                        <td>Type:</td>
                        <td>
                        	<select name="type" id="type">
                        		<?php 
                        		$sql="SELECT caid, name FROM #__category WHERE parent_id=0";
                        		$types = $this->rows($sql);
                        		?>
                        		<?php foreach ($types as $t) {?>
                        			<?php $sl = $t['caid']==@$type ? 'selected="selected"' : ""; ?>
                        			<option value="<?php echo $t['caid'];?>" <?php echo $sl; ?>><?php echo $t['name'];?></option>
                        		<?php }?>
                        	</select>
                        </td>
                    </tr> 
                    
                    <tr style="font-weight:bold">
                        <td>Category:</td>
                        <td>
                        	<select name="cat_id" id="cat_id">
                            	<?php 
								if($_GET['q'] == 'add'){
									$cats = $this->rows("select caid, name from #__category where status = 1 and parent_id = 2");
									if(!empty($cats)){
										foreach ($cats as $cat){
									?>
											<option value="<?php echo $cat['caid'];?>"><?php echo $cat['name'];?></option>
									<?php }
									}
								}elseif($_GET['q'] == 'edit'){
									$sql_cat = "select caid, name from #__category where parent_id='" . @$type . "' and status=1";
// 									echo $sql_cat;
									$cat_rows = $this->rows($sql_cat);
									if(isset($cat_rows)){
										foreach ($cat_rows as $cat_row){
										$selected = (@$cat_id==$cat_row['caid']) ? "selected='selected'" : "";
									?>
										<option value="<?php echo $cat_row['caid'];?>" <?php echo $selected; ?>><?php echo $cat_row['name'];?></option>
									<?php }
									}
								 }?>
							</select>
                        </td>
                    </tr> 
                    
                    <tr style="font-weight:bold">
                        <td>Starting point:</td>
                        <td>
                        	<select name="point_start">
                        		<option value="0" <?php if(@$point_start == 0){ ?>selected="selected"<?php } ?>>TẤT CẢ</option>                       		
                        		<option value="4" <?php if(@$point_start == 4){ ?>selected="selected"<?php } ?>>CẦN THƠ</option>
                        		<option value="2" <?php if(@$point_start == 2){ ?>selected="selected"<?php } ?>>HÀ NỘI</option>
                        		<option value="5" <?php if(@$point_start == 5){ ?>selected="selected"<?php } ?>>NHA TRANG</option>
                        		<option value="1" <?php if(@$point_start == 1){ ?>selected="selected"<?php } ?>>TP HỒ CHÍ MINH</option>
                        		<option value="3" <?php if(@$point_start == 3){ ?>selected="selected"<?php } ?>>ĐÀ NẴNG</option>
                        	</select>
						</td>
                    </tr> 
                    <?php if($_GET['q'] == "add"){?>
	                    <tr>
	                        <td>Point to:</td>
	                        <td>
	                        	<select id="quocnoi" name="point_to">
	                            	<option value="0" <?php if(@$point_to == 0){ ?>selected="selected"<?php } ?>>TẤT CẢ</option> 
	                            	<option value="34" <?php if(@$point_to == 34){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;AN GIANG</option>
	                        		<option value="38" <?php if(@$point_to == 38){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BẠC LIÊU</option>
	                        		<option value="23" <?php if(@$point_to == 23){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BẮC NINH</option>
	                        		<option value="13" <?php if(@$point_to == 13){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BẾN TRE</option>
	                        		<option value="27" <?php if(@$point_to == 27){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BUÔN MÊ THUỘT</option>
	                        		<option value="37" <?php if(@$point_to == 37){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CÀ MAU</option>
	                        		<option value="29" <?php if(@$point_to == 29){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CẦN THƠ</option>
	                        		<option value="54" <?php if(@$point_to == 54){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CÔN ĐẢO</option>
	                        		<option value="17" <?php if(@$point_to == 17){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CÙ LAO CHÀM</option>
	                        		<option value="30" <?php if(@$point_to == 30){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ GIANG</option>
	                        		<option value="22" <?php if(@$point_to == 22){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HẠ LONG</option>
	                        		<option value="5" <?php if(@$point_to == 5){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ NỘI</option>
	                        		<option value="24" <?php if(@$point_to == 24){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ TIÊN</option>
	                        		<option value="40" <?php if(@$point_to == 40){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HẬU GIANG</option>
	                        		<option value="32" <?php if(@$point_to == 32){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HỘI AN</option>
	                        		<option value="7" <?php if(@$point_to == 7){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HUẾ</option>
	                        		<option value="26" <?php if(@$point_to == 26){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;KON TUM</option>
									<option value="20" <?php if(@$point_to == 20){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;LONG AN</option>
									<option value="25" <?php if(@$point_to == 25){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;LONG XUYÊN</option>
									<option value="6" <?php if(@$point_to == 6){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;MỸ THO</option>
									<option value="21" <?php if(@$point_to == 21){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NHA TRANG</option>
									<option value="16" <?php if(@$point_to == 16){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NINH BÌNH</option>
									<option value="31" <?php if(@$point_to == 31){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHAN RANG</option>
									<option value="28" <?php if(@$point_to == 28){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHAN THIẾT</option>
									<option value="56" <?php if(@$point_to == 56){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHAN THIẾT - NHA TRANG - QUY NHƠN - HUẾ</option>
									<option value="36" <?php if(@$point_to == 36){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHONG NHA</option>
									<option value="18" <?php if(@$point_to == 18){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHÚ QUỐC</option>
									<option value="14" <?php if(@$point_to == 14){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SAPA</option>
									<option value="39" <?php if(@$point_to == 39){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SÓC TRĂNG</option>
									<option value="12" <?php if(@$point_to == 12){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;TIỀN GIANG</option>
									<option value="41" <?php if(@$point_to == 41){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;VĨNH LONG</option>
									<option value="8" <?php if(@$point_to == 8){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐÀ  NẴNG</option>
									<option value="19" <?php if(@$point_to == 19){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐÀ LẠT</option>
									<option value="35" <?php if(@$point_to == 35){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐỒNG THÁP</option>
									<option value="100" <?php if(@$point_to == 100){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;Bà Rịa Vũng Tàu</option>
								</select>                        			
								
								<select style="display:none" id="quocte" name="point_to">
								    <option value="0" <?php if(@$point_to == 0){ ?>selected="selected"<?php } ?>>TẤT CẢ</option>  
								    <option value="9" <?php if(@$point_to == 9){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ẤN ĐỘ</option>
								    <option value="48" <?php if(@$point_to == 48){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BỈ</option>
								    <option value="3" <?php if(@$point_to == 3){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CAMPUCHIA</option>
								    <option value="49" <?php if(@$point_to == 49){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ LAN</option>
								    <option value="43" <?php if(@$point_to == 43){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀN QUỐC</option>
									<option value="52" <?php if(@$point_to == 52){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HỒNG KÔNG</option>
									<option value="44" <?php if(@$point_to == 44){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ISRAEL</option>
									<option value="2" <?php if(@$point_to == 2){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;LÀO</option>
									<option value="45" <?php if(@$point_to == 45){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;MALAYSIA</option>
									<option value="4" <?php if(@$point_to == 4){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;MỸ</option>
									<option value="10" <?php if(@$point_to == 10){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NEPAL</option>
									<option value="46" <?php if(@$point_to == 46){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NHẬT BẢN</option>
									<option value="47" <?php if(@$point_to == 47){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHÁP</option>
									<option value="53" <?php if(@$point_to == 53){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SINGAPORE</option>
									<option value="55" <?php if(@$point_to == 55){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SINGAPORE - MALAYSIA</option>
									<option value="1" <?php if(@$point_to == 1){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;THÁI LAN</option>
									<option value="51" <?php if(@$point_to == 51){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;THỤY SỸ</option>
									<option value="11" <?php if(@$point_to == 11){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;TRUNG QUỐC</option>
									<option value="42" <?php if(@$point_to == 42){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ÚC</option>
									<option value="50" <?php if(@$point_to == 50){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐỨC</option>
								</select>
							</td>
	                    </tr>
                    <?php }elseif($_GET['q'] == "edit"){ ?>
                    	<?php $display_quocte = @$type == 2 ? "display:none" : "";?>
                    	<?php $display_quocnoi = @$type == 3 ? "display:none" : "";?>
                    	<tr>
	                        <td>Point to:</td>
	                        <td>
	                        	<select id="quocnoi" name="point_to" style="<?php echo $display_quocnoi; ?>">
	                            	<option value="0" <?php if(@$point_to == 0){ ?>selected="selected"<?php } ?>>TẤT CẢ</option> 
	                            	<option value="34" <?php if(@$point_to == 34){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;AN GIANG</option>
	                        		<option value="38" <?php if(@$point_to == 38){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BẠC LIÊU</option>
	                        		<option value="23" <?php if(@$point_to == 23){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BẮC NINH</option>
	                        		<option value="13" <?php if(@$point_to == 13){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BẾN TRE</option>
	                        		<option value="27" <?php if(@$point_to == 27){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BUÔN MÊ THUỘT</option>
	                        		<option value="37" <?php if(@$point_to == 37){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CÀ MAU</option>
	                        		<option value="29" <?php if(@$point_to == 29){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CẦN THƠ</option>
	                        		<option value="54" <?php if(@$point_to == 54){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CÔN ĐẢO</option>
	                        		<option value="17" <?php if(@$point_to == 17){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CÙ LAO CHÀM</option>
	                        		<option value="30" <?php if(@$point_to == 30){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ GIANG</option>
	                        		<option value="22" <?php if(@$point_to == 22){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HẠ LONG</option>
	                        		<option value="5" <?php if(@$point_to == 5){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ NỘI</option>
	                        		<option value="24" <?php if(@$point_to == 24){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ TIÊN</option>
	                        		<option value="40" <?php if(@$point_to == 40){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HẬU GIANG</option>
	                        		<option value="32" <?php if(@$point_to == 32){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HỘI AN</option>
	                        		<option value="7" <?php if(@$point_to == 7){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HUẾ</option>
	                        		<option value="26" <?php if(@$point_to == 26){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;KON TUM</option>
									<option value="20" <?php if(@$point_to == 20){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;LONG AN</option>
									<option value="25" <?php if(@$point_to == 25){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;LONG XUYÊN</option>
									<option value="6" <?php if(@$point_to == 6){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;MỸ THO</option>
									<option value="21" <?php if(@$point_to == 21){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NHA TRANG</option>
									<option value="16" <?php if(@$point_to == 16){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NINH BÌNH</option>
									<option value="31" <?php if(@$point_to == 31){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHAN RANG</option>
									<option value="28" <?php if(@$point_to == 28){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHAN THIẾT</option>
									<option value="56" <?php if(@$point_to == 56){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHAN THIẾT - NHA TRANG - QUY NHƠN - HUẾ</option>
									<option value="36" <?php if(@$point_to == 36){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHONG NHA</option>
									<option value="18" <?php if(@$point_to == 18){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHÚ QUỐC</option>
									<option value="14" <?php if(@$point_to == 14){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SAPA</option>
									<option value="39" <?php if(@$point_to == 39){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SÓC TRĂNG</option>
									<option value="12" <?php if(@$point_to == 12){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;TIỀN GIANG</option>
									<option value="41" <?php if(@$point_to == 41){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;VĨNH LONG</option>
									<option value="8" <?php if(@$point_to == 8){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐÀ  NẴNG</option>
									<option value="19" <?php if(@$point_to == 19){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐÀ LẠT</option>
									<option value="35" <?php if(@$point_to == 35){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐỒNG THÁP</option>
									<option value="100" <?php if(@$point_to == 100){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;Bà Rịa Vũng Tàu</option>
								</select>                        			
								
								<select style="<?php echo $display_quocte; ?>" id="quocte" name="point_to" >
								    <option value="0" <?php if(@$point_to == 0){ ?>selected="selected"<?php } ?>>TẤT CẢ</option>  
								    <option value="9" <?php if(@$point_to == 9){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ẤN ĐỘ</option>
								    <option value="48" <?php if(@$point_to == 48){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;BỈ</option>
								    <option value="3" <?php if(@$point_to == 3){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;CAMPUCHIA</option>
								    <option value="49" <?php if(@$point_to == 49){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀ LAN</option>
								    <option value="43" <?php if(@$point_to == 43){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HÀN QUỐC</option>
									<option value="52" <?php if(@$point_to == 52){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;HỒNG KÔNG</option>
									<option value="44" <?php if(@$point_to == 44){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ISRAEL</option>
									<option value="2" <?php if(@$point_to == 2){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;LÀO</option>
									<option value="45" <?php if(@$point_to == 45){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;MALAYSIA</option>
									<option value="4" <?php if(@$point_to == 4){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;MỸ</option>
									<option value="10" <?php if(@$point_to == 10){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NEPAL</option>
									<option value="46" <?php if(@$point_to == 46){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;NHẬT BẢN</option>
									<option value="47" <?php if(@$point_to == 47){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;PHÁP</option>
									<option value="53" <?php if(@$point_to == 53){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SINGAPORE</option>
									<option value="55" <?php if(@$point_to == 55){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;SINGAPORE - MALAYSIA</option>
									<option value="1" <?php if(@$point_to == 1){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;THÁI LAN</option>
									<option value="51" <?php if(@$point_to == 51){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;THỤY SỸ</option>
									<option value="11" <?php if(@$point_to == 11){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;TRUNG QUỐC</option>
									<option value="42" <?php if(@$point_to == 42){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ÚC</option>
									<option value="50" <?php if(@$point_to == 50){ ?>selected="selected"<?php } ?>>&nbsp;&nbsp;ĐỨC</option>
								</select>
							</td>
	                    </tr>
                    <?php } ?>
					<tr>
                        <td><?php echo "Lịch khởi hành?"; ?>:</td>
                        <td>
                            <input type="radio" name="khoikhanh" value="1" <?php echo @$khoikhanh == 1 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                            <input type="radio" name="khoikhanh" value="0" <?php echo @$khoikhanh == 0 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>
                        </td>
                    </tr>
					<tr>
                        <td><?php echo "Homepage?"; ?>:</td>
                        <td>
                            <input type="radio" name="homepage" value="1" <?php echo @$homepage == 1 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                            <input type="radio" name="homepage" value="0" <?php echo @$homepage == 0 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo "Status"; ?>:</td>
                        <td>
                            <input type="radio" name="publish" value="1" <?php echo @$publish == 1 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                            <input type="radio" name="publish" value="0" <?php echo @$publish == 0 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>
                        </td>
                    </tr>
                </table>
            </div>            
        </form>
    </div>
</div> <!-- END Box-->
<script type="text/javascript">
    $.tabs('#tabs a');
    $(function() {
		var today=new Date();
		$("#date_start, #date_end").datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: "hh:mm",
			ampm: false,
			hourMin: 1,
			hourMax: 24,
			stepMinute: 15,
			/*minDate: today*/
		});
	}); 

    $(document).ready(function(){
		$("#type").change(function(){
			var _datas = {
				p: "getCat",
				parent_id : $(this).val()
			};
			$.ajax({
				url: BASE_NAME + 'admincp/ajax.php',
				data: $.param(_datas),
				dataType: 'json',
				type: 'get',
			  	success: function(data) {
			    	$('#cat_id').html(data.cat);
			    	if(data.type == 2){
						$("#quocnoi").show().attr("name", "provinces");
						$("#quocte").hide().removeAttr("name", "provinces");
				    }else if(data.type == 3){
				    	$("#quocte").show().attr("name", "provinces");
						$("#quocnoi").hide().removeAttr("name", "provinces");
				    }
			  }
			});
		});
    });                  
    CKEDITOR.replace( 'description',
    {
        fullPage : false,
        extraPlugins : 'docprops',
                				
        filebrowserBrowseUrl : 'js/ckfinder/ckfinder.html?type=Images',
        filebrowserImageBrowseUrl : 'js/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : 'js/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : 'js/ckfinder/ckfinder.html?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'js/ckfinder/ckfinder.html?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'js/ckfinder/ckfinder.html?command=QuickUpload&type=Flash'
    });
</script>
