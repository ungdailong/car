<?php
if (!defined('DIR_APP'))
    die('Your have not permission');
?>
<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:80%">Banner</h2> <h2 style="float:right; ">  <?php Admin::button('add, delete'); ?> </h2>
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

    <form id="form2" name="form2" method="post" action="<?php echo $_GET['p']; ?>/delete">
        <table cellspacing="0" cellpadding="0"><!-- Table -->
            <thead>
                <tr class="alt"> 
                    <th><strong><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);"></strong></th>
                    <th><strong>No</strong></th>
                    <th><strong> <?php echo "Title"; ?></strong></th>                
                    <th><strong> <?php echo "Image"; ?></strong></th>
                    <th>Type</th>
                    <th>Status</th>
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
                    if($row['type'] == 1){
						$type =  "Main Banner";
					}else if($row['type'] == 2){
						$type =  "Bottom Banner";
					}else if($row['type'] == 3){
						$type =  "Right Banner" ;	
					}
					
                    $uri_small = _path_image . 'banner/' . $row['image'];
                    $publish = $row['status'];
                    $title = $row['title'];                   
                    ?>

                    <tr >
                        <td class="firstCol"><input type="checkbox" name="id[]" value="<?php echo $id; ?>"> </td>
                        <td class="secondCol"> <?php echo $i; ?> </td>
                        <td> <?php echo $title; ?> </td>
                        <td><img src="<?php echo $uri_small; ?>" width="80px" /></td>
                        <td> <?php echo $type; ?> </td>
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

</div> <!-- END Box-->


