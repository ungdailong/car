<?php if (!defined('DIR_APP')) die('Your have not permission'); ?>
<div class="box">
    <h2 style="float:left; width:80%">Danh sách xe</h2> <h2 style="float:right; ">  <?php Admin::button('add, delete'); ?> </h2>
    <div style="clear:both"></div>
    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
        ?></div>
    <?php } ?>
    <form id="form2" name="form2" method="post" action="<?php echo $_GET['p']; ?>/delete">
        <table cellspacing="0" cellpadding="0"><!-- Table -->
            <thead>
                <tr class="alt">
                    <th><strong><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);"></strong></th>
                    <th><strong>STT</strong></th>
                    <th><strong>Tên xe</strong></th>
                    <th><strong>Danh mục</strong></th>
                    <th><strong>Loại xe</strong></th>
          			<th><strong>Hình</strong></th>
                    <th><strong>Ngày tạo</strong></th>

                    <th><strong>Publish</strong></th>
                    <th colspan="2" width="120px" >Action</th>
                    <th>ID</th>
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

                    $uri_small = $row['hinh'] != "" ? _path_image . 'cars/small_' . $row['hinh'] : "";
                    //$name = $row['name'];
                    $create_date = date('d-m-Y',$row['date_create']);
                    $display = $row['hide'];


                    ?>
                    <tr>
                        <td class="firstCol"><input type="checkbox" name="id[]" value="<?php echo $id; ?>"> </td>
                        <td class="secondCol"> <?php echo $i; ?> </td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $category[$row['category_id']]['name']?></td>
                        <td><?php echo $row['type_car']?></td>
                        <td><img src="<?php echo $uri_small; ?>" width="80px" /></td>
                        <td><?php echo $create_date; ?></td>

                        <td>
							<?php if($_SESSION['admin_group_id']==1){ ?>
								<?php if($display=='Y') $icon_pub="Unpublish"; else $icon_pub="Publish";  ?>
                                    <a href="<?php echo $mod->url('index.php?p='.$_GET['p'])?>/publish/<?=$id?>">
                                    <img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" /></a>
                            <?php }else{?>
                                    <?php if($display=='N') $icon_pub="Unpublish"; else $icon_pub="Publish";  ?>
                                    <img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" />
                            <?php }?>
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

</div> <!-- END Box-->



