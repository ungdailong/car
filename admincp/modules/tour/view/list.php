<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>
<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:80%">List Tour</h2> <h2 style="float:right; ">  <?php Admin::button('add, delete'); ?> </h2>
    <div style="clear:both"></div>

    <!--
    Classical Table below, must be used with thead and tbody tags;
    -->
    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
        ?></div>
    <?php } ?>
	<div id="form_search"> 
        <input type="text" value="<?php if($_GET['id'] != "" && $_GET['q'] == "find") echo $_GET['id']; else echo "Tim kiếm tên Tour Du Lịch"; ?>" size="31" onfocus="if(this.value == 'Tim kiếm tên Tour Du Lịch') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Tim kiếm tên Tour Du Lịch';}" id="s" name="s"/>
		<input type="button" value=" " id="btnSearch" style="background: url('images/view.png') no-repeat; background-position: center; width: 26px; height: 30px"/> 

		Lọc theo:
        <select id="typeMerchant" >
            <option value="0">Trong nước / Quốc tế</option>
            <option <?php if($_GET['id'] == 2) echo 'selected="true"' ;?> value="2" >Trong nước</option>
            <option <?php if($_GET['id'] == 3) echo 'selected="true"' ;?> value="3">Nước ngoài</option>
        </select>
    </div>
    <div style="clear:both"></div>
    <form id="form2" name="form2" method="post" action="<?php echo $_GET['p']; ?>/delete">
        <table cellspacing="0" cellpadding="0"><!-- Table -->
            <thead>
                <tr class="alt"> 
                    <th><strong><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);"></strong></th>
                    <th><strong>No</strong></th>
                    <th><strong> <?php echo "Name"; ?></strong></th>                
                    <th><strong> <?php echo "Image"; ?></strong></th>
                    <th><strong> <?php echo "Category"; ?></strong></th>
                    <th><strong> <?php echo "Status"; ?></strong></th>
                    <th colspan="2" width="120px" >Action</th>
                    <th >ID</th>
                </tr>

            </thead>
            <?php if (empty($rows)) { ?>
                <tr >
                    <td class="center" colspan="20"><?php echo LANG_NO_RESULT; ?></td>
                </tr>
                <?php
            } else {

                $i = $countrows;
                foreach ($rows as $row) {
                    $id = $row['id'];
                    $uri_small = $row['image'] != "" ? _path_image . 'tour/small_' . $row['image'] : "";
                    $publish = $row['status'];
                    $name = $row['name'];       
                    $sql = "SELECT name FROM #__category WHERE caid = " . $row['cat_id'];
                    $cat = $this->row($sql);           
                    ?>

                    <tr >
                        <td class="firstCol"><input type="checkbox" name="id[]" value="<?php echo $id; ?>"> </td>
                        <td class="secondCol"> <?php echo $i; ?> </td>
                        <td> <?php echo $name; ?> </td>
                        <td><img src="<?php echo $uri_small; ?>" width="80px" /></td>
                        <td> <?php echo $cat['name']; ?> </td>
                        <td>
                            <?php
                            if ($publish == '1')
                                $icon_pub = "Publish"; else
                                $icon_pub = "Unpublish";
                            ?>
                            <a href="<?php echo $mod->url('index.php?p=' . $_GET['p']) ?>/publish/<?= $id ?>">
                                <img src="images/<?= $icon_pub ?>.png" title="<?= $icon_pub ?>" /></a>
                        </td>
                        <td colspan="2"><?php Admin::edit($id); ?>  <?php Admin::delete($id); ?></td>
                        <td><?php echo $id; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>

        </table>


        <!-- END Table -->
        <br />
        <?php echo $paging; ?>
        <input type="hidden" name="task" value="" />
    </form>
	<script language="javascript" type="text/javascript">
		$(document).ready(function() 
		{             
			$("#btnSearch").click(function(){ 
				var key = $("#s").val();
				if(key == ''){
					alert("Please type key word to find"); 
					return false;
				}else{
					window.location.href= '<?php echo BASE_NAME ."admincp/tour/find/"?>' + key;  
				}            
			})
			
			$("#typeMerchant").change(function(){ 
				var key = $(this).val();
				if(key == ''){
					return false;
				}else{
					window.location.href= '<?php echo BASE_NAME ."admincp/tour/filter/"?>' + key;  
				}            
			})
		})
	</script>
</div> <!-- END Box-->


