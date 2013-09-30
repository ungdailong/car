<?php if (!defined('DIR_APP')) die('Your have not permission'); ?>
<div class="box">
    <h2 style="float:left; width:80%">Danh sách tin tức</h2> <h2 style="float:right; ">   </h2>
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



					<th><strong>Danh mục</strong></th>
                    <th><strong>Cập nhật lần cuối</strong></th>


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


                foreach ($rows as $row) {
                    $id = $row['id'];



                    $create_date = date('d-m-Y',$row['date_update']);


                    ?>
                    <tr>



						<td><?php echo $row['type']; ?></td>

                        <td><?php echo $create_date; ?></td>

                        <td colspan="2"><?php Admin::edit($id); ?>  </td>
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

        <input type="hidden" name="task" value="" />
    </form>

</div> <!-- END Box-->



