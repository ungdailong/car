<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>

<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%">Giới Thiệu</h2> <h2 style="float:right; ">  <?php Admin::button('save'); ?> </h2>
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
                        <td>Tiêu đề:</td>
                        <td><input type="text" size="100" value="<?php echo @$title ?>" name="title"></td>
                    </tr> 
					<tr>
                        <td>Giới thiệu(ngoài trang chủ) :</td>
                        <td><textarea name="intro" id="intro"><?php echo str_replace("\\", "", @$intro); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Nội dung :</td>
                        <td><textarea name="content_" id="content_"><?php echo str_replace("\\", "", @$content); ?></textarea></td>
                    </tr>
                    
					<tr>
                        <td>Display :</td>
                        <td>
                            <input type="radio" name="display" value="1" <?php echo @$hide == 1 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>
                            <input type="radio" name="display" value="0" <?php echo @$hide == 0 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                        </td>
                    </tr>
                    
                </table>
            </div>            
        </form>
    </div>
</div> <!-- END Box-->
<script type="text/javascript">
    
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
    CKEDITOR.replace( 'intro',
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
