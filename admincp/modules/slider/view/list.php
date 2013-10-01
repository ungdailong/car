<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>
<script src="js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css">
<div class="box">
	<!-- Box begins here -->
	<h2 style="float: left; width: 83%">Slide</h2>
	<h2 style="float: right;">  <?php Admin::button('save,'); ?> </h2>
	<div style="clear: both"></div>

    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
        ?></div>
    <?php } ?>
    <div class="content">
		<div id="tabs" class="htabs">
			<a tab="#tab_general">Content</a>
		</div>

		<form id="form2" method="post" enctype="multipart/form-data"
			name="myform">

			<div id="tab_general">
				<table class="form">
					<thead>
						<tr class="alt">
							<th colspan="2"><strong>Information</strong></th>

						</tr>
					</thead>
					<tr>
						<td>Chọn hình để tải lên</td>
						<td width="300"><input id="file_upload" name="file_upload" type="file" multiple="true"></td>
						<td><p><a class = "button" href="javascript:$('#file_upload').uploadify('upload','*')">Tải lên</a></p></td>
					</tr>

                    <?php
                    		$i = $countrows;
                			foreach ($rows as $index =>$row) {
							$uri_small = $row['hinh'] != "" ? _path_image . 'slider/small_' . $row['hinh'] : "";
							$id = $index + 1;
							$display = $row['hide'];
					?>
                     <tr style="font-weight: bold">
						<td>Hình <?php echo $id?>:</td>
						<input type="hidden" name = 'id_image<?php echo $index?>' value="<?php echo $row['id']?>">
						<td><input type="file" name="image<?php echo $index?>" size="30" /></td>
						<td>
                            <?php if (!empty($uri_small)) { ?><img
							src="<?php echo $uri_small ?>" width="80px" height="80px" /><?php } ?>
                        </td>
						<td>
						<?php if($uri_small != '' || $uri_small != null){?>
						Status

								<?php if($display=='Y') $icon_pub="Unpublish"; else $icon_pub="Publish";  ?>
                                    <a
							href="<?php echo $mod->url('index.php?p='.$_GET['p'])?>/publish/<?=$row['id']?>">
								<img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" />
						</a>
                           <?php }?>

                        </td>
						<td colspan="2"><a class="delete"
							onclick="remove_slide('slider/remove/<?php echo $row['id']?>', 'Are you sure delete ?')"
							style="cursor: pointer"> <span>Delete</span>
						</a></td>
					</tr>
                    <?php }?>


                </table>
			</div>
		</form>
	</div>

</div>
<!-- END Box-->

<script type="text/javascript">
    function remove_slide(href,title)
    { //alert(href);
	    if(confirm(title)) {
	    	document.myform.action = href;
	    	document.myform.submit();
	    	return true;
	    }
	    else {
	    	return false;
	    }
    }
	$(function() {
		$('#file_upload').uploadify({
			'formData'      : {'object' : 'header','recordId' : 0},
			'fileObjName' : 'image',
			'fileTypeExts' : '*.gif; *.jpg; *.png',
			'buttonText' : 'Chọn hình...',
			'auto'     : false,
			'swf'      : 'js/uploadify/uploadify.swf',
			'uploader' : 'uploadify.php',
			'onUploadSuccess' : function(file, data, response) {
				var temp = 0;
				$('#file_upload-queue .uploadify-queue-item .data').each(function(){
					if($(this).html() == ' - Complete')
						temp ++;
				});
				if(temp == $('.uploadify-queue-item').length){
					alert('Upload thành công');
	            	window.location = location.href;
				}

	        }
		});
	});
</script>