<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>
<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Thêm"; elseif ($_GET['q'] == 'edit') echo "Sửa"; ?> Tin tức - sự kiện</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
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
                        <td>Tiêu đề:</td>
                        <td><input type="text" size="100" value="<?php echo @$title ?>" name="title"></td>
                    </tr>
                     <tr style="font-weight:bold">
                        <td>Hình:</td>
                        <td>
                            <input type="file" name="image" size="30"  />
                            <?php if (!empty($uri)) { ?><img src="<?php echo @$uri ?>" name="<?php echo @$image_name ?>" width="80px" height="80px"/><?php } ?>
                        </td>
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
                        <td>Publish:</td>
                        <td>

                            <input type="radio" name="hide" value="0" <?php echo @$hide==0 ? 'checked' : ''; ?> /> <?php echo "Yes"; ?>
                        	<input type="radio" name="hide" value="1" <?php echo @$hide==1 ? 'checked' : ''; ?> /> <?php echo "No"; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

</div> <!-- END Box-->

<script type="text/javascript">
    $.tabs('#tabs a');




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
</script>