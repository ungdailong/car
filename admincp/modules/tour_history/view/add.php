<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>

<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%"><?php if ($_GET['q'] == 'add') echo "Add"; elseif ($_GET['q'] == 'Edit') echo "Edit"; ?> Tour History</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
    <div style="clear:both"></div>

    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
        ?></div>
    <?php } ?>
    <div class="content">
        <div id="tabs" class="htabs"><a tab="#tab_general">Content</a><a tab="#tab_data">Photo</a></div>

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
                    
                    <tr>
                        <td><?php echo "Status"; ?>:</td>
                        <td>
                            <input type="radio" name="publish" value="1" <?php echo @$publish == 1 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                            <input type="radio" name="publish" value="0" <?php echo @$publish == 0 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>
                        </td>
                    </tr>
                </table>
            </div>   
            
            <div id="tab_data">
                <table class="form">
                    <tr>
                        <td style="width:40px">:</td>
                        <td> </td>
                    </tr>				
                    <tr>

                </table>

                <table class="list">
                    <thead>
                        <tr>
                            <td class="center">Image</td>
                            <td>Order</td>
                            <td>Status</td>                        
                            <td width="30px"></td>
                        </tr>
                    </thead>
                    <tbody>   

                        <?php
                        if (@$photos) {
                            $i = 1;
                            //print_r($photos);
                            foreach ($photos as $key => $value) {
                                ?>          	                  
                                <tr class="doc_item_<?php echo $i; ?>">
                                    <td class="center"><?php if (@$value['image'] != "") { ?><img src="../upload/tour_history/small_<?php echo $value['image']; ?>" width="50" height="50" /> <br><?php } ?>
                                        <input type="hidden" name="file_id_old_<?php echo $i; ?>" value="<?php echo $value['id'] ?>">
                                        <input type="file" name="photo_item_<?php echo $i; ?>"></td>
                                    <td><input type="text" name="order_<?php echo $i; ?>" value="<?php echo $value['order']; ?>" style="width: 25px;"></td>
                                    <td><input type="text" name="publish_<?php echo $i; ?>" value="<?php echo $value['publish']; ?>" style="width: 10px;"></td>                       
                                    <td>
                                       	<a class="button" onclick="$('.doc_item_<?php echo $i; ?>').remove()"><span>Xóa</span></a>
                                    </td>
                                </tr>
                            <input type="hidden" name="file_id_old_tmp_<?php echo $i; ?>" value="<?php echo $value['id'] ?>">
                            <?php
                            $i++;
                        }
                    }
                    ?>
                    <tr class="addrow">
                        <td colspan="5" class="right">
                        	<a onclick="addrow()" class="button">
                        		<span>Add photo</span>
                        	</a>
                        </td>
                    </tr>
                    </tbody>
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

<script>

    var i = <?php echo @$photos ? count($photos) : 0; ?> + 1;
    function addrow() {
        var html  = '<tr class="doc_item_'+ i +'">';
        	html += '	<td class="center">';
        	html += '		<input type="file" name="photo_item_'+ i +'" />';
        	html += '	</td>';
        	html += '	<td>';
        	html += '		<input type="text" style="width:25px" name="order_'+ i +'" value="'+ i +'" />';
        	html += '	</td>';
        	html += '	<td>';
        	html += '		<input type="text" style="width:10px" name="publish_'+ i +'" value="1" />';
        	html += '	</td>';
        	html += '	<td>';
        	html += '		<a onclick="$(\'.doc_item_'+ i +'\').remove()" class="button">';
        	html += '				<span>Xóa</span>';
        	html += '		</a>';
        	html += '	</td>';
        	html += '</tr>';
        $('.addrow').before(html);	
        i++;
    }


</script>
