<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>
<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Thêm"; elseif ($_GET['q'] == 'edit') echo "Sửa"; ?> Tin tức</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
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
                        <td>Nội dung:</td>
                        <td><textarea name="content_" id="content_"><?php echo str_replace("\\", "", @$content); ?></textarea></td>
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