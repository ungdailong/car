<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>
<script src="js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css">
<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Add"; elseif ($_GET['q'] == 'edit') echo "Edit"; ?> Category</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
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
                        <td>Name:</td>
                        <td><input type="text" size="100" value="<?php echo @$name ?>" name="name"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="description" id="description"><?php echo str_replace("\\", "", @$description); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Category Parent:</td>
                        <td>
                            <select name="parent_id" class="parenMenu">
                                <option value="0">-------</option>

                                <?php
                                foreach ($rows as $row) {
                                    $selected = ($row['caid'] == @$parent_id) ? "selected='true'" : "";
                                    ?>
                                    <option <?php echo $selected; ?> value="<?php echo $row['caid'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
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
                    <tr>
                        <td>Publish:</td>
                        <td>
                            <input type="radio" name="publish" value="1" <?php echo @$publish==1 ? 'checked' : ''; ?> /> <?php echo "Yes"; ?>
                            <input type="radio" name="publish" value="0" <?php echo @$publish==0 ? 'checked' : ''; ?> /> <?php echo "No"; ?>
                        </td>
                    </tr>

                </table>
            </div>
        </form>
    </div>

</div> <!-- END Box-->

<script type="text/javascript">
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
    $(function() {
		$('#file_upload').uploadify({
			'formData'      : {'object' : 'category','recordId' : <?php echo $_GET['id']?>},
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