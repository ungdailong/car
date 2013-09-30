<?php if (!defined('DIR_APP')) die('Your have not permission'); ?>
<div class="box">
    <h2 style="float:left; width:80%">List Categories</h2> <h2 style="float:right; ">  <?php Admin::button('add, delete'); ?> </h2>
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
                    <th><strong>No</strong></th>
                    <th><strong> <?php echo "Name"; ?></strong></th>
                    <th><strong> <?php echo "Parent"; ?></strong></th>
                    <th><strong> <?php echo "Status"; ?></strong></th>
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
                    $id = $row['caid'];

                    $name = str_replace("\\", "", $row['name']);
                    $publish = $row['status'];
                    $uri_small = _path_image . 'category/small_' . @$row['image'];
                    ?>
                    <tr>
                        <td class="firstCol"><input type="checkbox" name="id[]" value="<?php echo $id; ?>"> </td>
                        <td class="secondCol"> <?php echo $i; ?> </td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo "No parent"; ?></td>
                        <td>
							<?php if($_SESSION['admin_group_id']==1){ ?>
								<?php if($publish=='1') $icon_pub="Publish"; else $icon_pub="Unpublish";  ?>
                                    <a href="<?php echo $mod->url('index.php?p='.$_GET['p'])?>/publish/<?=$id?>">
                                    <img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" /></a>
                            <?php }else{?>
                                    <?php if($publish=='1') $icon_pub="Publish"; else $icon_pub="Unpublish";  ?>
                                    <img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" />
                            <?php }?>
                        </td>
                        <td colspan="2"><?php Admin::edit($id); ?>  <?php Admin::delete($id); ?></td>
                        <td><?php echo $id; ?></td>
                    </tr>
                    <?php
						$rs_sub=mysql_query("Select * From tbl_category Where parent_id=".$id);
						$j=1;
						while($row_sub=mysql_fetch_array($rs_sub)){
							$id_sub = $row_sub['caid'];
							$name_sub = $row_sub['name'];
							$parent_id_sub = $row_sub['parent_id'];
							$publish_sub = $row_sub['status'];

							$sql = "select * from #__category where caid=".$parent_id_sub;
							$data = $this->row($sql);
							$cat_name = @$data['name']==""?"No parent":$data['name'];

						?>
                        	<style>
								.subtr td{ background:#FFC}
							</style>
                            <tr style="background:#FF9" class="subtr">
                                <td class="firstCol"><input type="checkbox" name="id[]" value="<?php echo $id_sub; ?>"> </td>
                                <td class="secondCol"> <?php echo $i.".".$j; ?> </td>
                                <td><?php if($parent_id_sub!=0) echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$name_sub; else echo $name_sub ?></td>
                                <td><?php echo $cat_name; ?></td>
                                <td>
                                    <?php if($_SESSION['admin_group_id']==1){ ?>
										<?php if($publish_sub=='1') $icon_pub="Publish"; else $icon_pub="Unpublish";  ?>
                                            <a href="<?php echo $mod->url('index.php?p='.$_GET['p'])?>/publish/<?=$id_sub?>">
                                            <img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" /></a>
                                    <?php }else{?>
                                            <?php if($publish_sub=='1') $icon_pub="Publish"; else $icon_pub="Unpublish";  ?>
                                            <img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" />
                                    <?php }?>
                                </td>
                                <td colspan="2"><?php Admin::edit($id_sub); ?>  <?php Admin::delete($id_sub); ?></td>
                                <td><?php echo $id_sub; ?></td>
                            </tr>
                    <?php
						$j++;
						}
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



