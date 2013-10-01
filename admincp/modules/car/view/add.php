<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>

<script src="js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css">
<style>
.mainCat {
  color : black;
  font-weight: bold;
   }
.subCat {
	margin-left : 20px;
}
</style>
<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Thêm"; elseif ($_GET['q'] == 'edit') echo "Sửa"; ?> Xe</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
    <div style="clear:both"></div>

    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
        ?></div>
    <?php } ?>
    <div class="content">
        <div id="tabs" class="htabs"><a tab="#tab_general">Content</a></div>

        <form method="post" enctype="multipart/form-data" name="myform">
            <div id="tab_general">
                <table class="form">
                    <thead>
                        <tr class="alt">
                            <th colspan="2"><strong>Information</strong></th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Tên xe:</td>
                        <td><input type="text" size="100" value="<?php echo @$name ?>" name="name"></td>
                    </tr>

                     <tr style="font-weight:bold">
                        <td>Danh mục:</td>
                        <td class="styled-select">
                        	<select name="category_id" id="category_id">
                            	<?php
									foreach ($category[0] as $index => $one){ ?>
										<option class = "mainCat" <?php echo $one['caid'] == $category_id ? 'selected' : ''?>  value="<?php echo $one['caid']?>"><?php echo $one['name']?></option>
										<?php foreach ($category[$one['caid']] as $index1 => $one1) {?>
											<option class = "subCat" <?php echo $one1['caid'] == $category_id ? 'selected' : ''?>  value="<?php echo $one1['caid']?>"><?php echo $one1['name']?></option>
										<?php }?>

								<?php	} ?>
							</select>
                        </td>
                    </tr>
                    <tr style="font-weight:bold">
                        <td>Loại xe:</td>
                        <td>
                        	<select name="type_car" id="type_car">
                            	<option <?php echo $type_car == 'Xe mới' ? 'selected' : ''?> value="Xe mới">Xe mới</option>
                            	<option <?php echo $type_car == 'Xe đã sử dụng' ? 'selected' : ''?> value="Xe đã sử dụng">Xe đã sử dụng</option>
							</select>
                        </td>
                    </tr>
                    <tr style="font-weight:bold">
                        <td>Hình đại diện:</td>
                        <td>
                            <input type="file" name="image" size="30"  />
                            <?php if (!empty($uri)) { ?><img src="<?php echo @$uri ?>" name="<?php echo @$image_name ?>" width="80px" height="80px"/><?php } ?>
                        </td>
                    </tr>
                    <tr>
                    	<td>Giá</td>
                    	<td><input type="text" size="100" value="<?php echo @$price ?>" name="price"></td>
                    </tr>
                    <tr>
                        <td>Giới thiệu (ngoài trang chủ):</td>
                        <td><textarea rows = "10"name="intro" id="intro"><?php echo str_replace("\\", "", @$intro); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Nội dung:</td>
                        <td><textarea name="content_" id="content_"><?php echo str_replace("\\", "", @$content); ?></textarea></td>
                    </tr>
					<tr>
                        <td>Thông số kĩ thuật:</td>
                        	<td><textarea name="thongso_kithuat" id="thongso_kithuat"><?php echo str_replace("\\", "", @$thongso_kithuat); ?></textarea></td>
                    </tr>
                   <tr>
                        <td>Publish:</td>
                        <td>

                            <input type="radio" name="hide" value="0" <?php echo @$hide=='N' ? 'checked' : ''; ?> /> <?php echo "Yes"; ?>
                        	<input type="radio" name="hide" value="1" <?php echo @$hide=='Y' ? 'checked' : ''; ?> /> <?php echo "No"; ?>
                        </td>
                    </tr>
					<tr>
						<td>Slides</td>
						<td width="200"><input id="file_upload" name="file_upload" type="file" multiple="true">
							<p id = 'p-button-image'style='display : none;float:right;margin-right : 200px;margin-top : -36px'><a class = "button" href="javascript:$('#file_upload').uploadify('upload','*')">Tải lên</a></p>
							<input type="hidden" id = "id_slide_delete" name="id_slide_delete" value="">
							<ul>
								<?php foreach ($slide as $key => $value){?>
								<li id="slide_<?php echo $value['id']?>" style="list-style: none">
									<img width="80px" height="80px" src = "<?php echo _path_image.'slider/small_'.$value['hinh']?>">
									<input type="hidden" name = "id_image<?php echo $key?>" value="<?php echo $value['id']?>">
									<input type="file" name="image<?php echo $key?>" size="30" />
									<a class="delete" onclick="remove_slide('<?php echo $value['id']?>', 'Are you sure delete ?')"style="cursor: pointer;float:right;margin-top : 27px;margin-right : 200px"> <span>Delete</span>
						</a>
								</li>
								<?php }?>
							</ul>
						</td>
					</tr>
                </table>
            </div>
        </form>
    </div>

</div> <!-- END Box-->

<script type="text/javascript">
    $.tabs('#tabs a');
    function remove_slide(slideid,title)
    {
        if(confirm(title)) {
    		$('#slide_' + slideid).hide();
    		var idOld = $('#id_slide_delete').val();
    		var idNew = idOld + ',' + slideid;
    		$('#id_slide_delete').val(idNew);
        	return true;
        }
        else {
        	return false;
        }
    }
    CKEDITOR.replace( 'content_',
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
    CKEDITOR.replace( 'thongso_kithuat',
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
<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'      : {'object' : 'car','recordId' : <?php echo $_GET['id']?>},
				'fileObjName' : 'image',
				'fileTypeExts' : '*.gif; *.jpg; *.png',
				'buttonText' : 'Chọn hình...',
				'auto'     : false,
				'swf'      : 'js/uploadify/uploadify.swf',
				'uploader' : '<?php echo BASE_NAME?>admincp/uploadify.php',
				'onSelect' : function() {
					$('#p-button-image').show();
					$('.uploadify-queue-item .cancel a').click(function(){
						if($('.uploadify-queue-item').length == 1)
							$('#p-button-image').hide();
					})
		        },
				'onUploadSuccess' : function(file, data, response) {
					var temp = 0;
					$('#file_upload-queue .uploadify-queue-item .data').each(function(){
						if($(this).html() == ' - Complete')
							temp ++;
					});
					$('#p-button-image').hide();
					if(temp == $('.uploadify-queue-item').length){
						alert('Upload thành công,hãy Save lại để thấy thay đổi');
					}
		        }
			});
		});
	</script>