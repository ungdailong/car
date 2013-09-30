<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>

<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Add"; elseif ($_GET['q'] == 'Edit') echo "Edit"; ?> Banner</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
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
                        <td>Title:</td>
                        <td><input type="text" size="100" value="<?php echo @$title ?>" name="title"></td>
                    </tr> 
                    <tr style="font-weight:bold">
                        <td>Image:</td>
                        <td>
                            <input type="file" name="image" size="30"  />
                            <?php if (!empty($uri)) { ?><img src="<?php echo @$uri ?>" name="<?php echo @$image_name ?>" width="80px" height="80px"/><?php } ?>
                        </td>
                    </tr> 

                    <tr>
                        <td style="width:10%"><?php echo "Type"; ?></td>
                        <td>
                            <select name="type">
                            	<option value="1" <?php if (@$type == 1) echo "selected"; ?>>Main banner</option>
								<option value="2" <?php if (@$type == 2) echo "selected"; ?>>Bottom banner</option>
                                <option value="3" <?php if (@$type == 3) echo "selected"; ?>>Right banner</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr style="font-weight:bold">
                        <td>Link:</td>
                        <td><input type="text" size="100" value="<?php echo @$link ?>" name="link"></td>
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
</script>
