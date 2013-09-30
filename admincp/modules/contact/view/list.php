<?php if (!defined('DIR_APP')) die('Your have not permission'); ?>
<div class="box">
    <h2 style="float:left; width:80%">Danh sách liên hệ</h2> <h2 style="float:right; ">  <?php Admin::button('delete'); ?> </h2>
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
                    <th><strong>Tên/Email/Phone</strong></th>                   
          			
                    
                    <th><strong>Nội dung</strong></th>
                    <th><strong>Ngày gửi</strong></th>
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
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $content = $row['content'];
                    $create_date = date('d-m-Y',$row['date_create']);                   
                    ?>
                    <tr>
                        <td class="firstCol"><input type="checkbox" name="id[]" value="<?php echo $id; ?>"> </td>
                        <td class="secondCol"> <?php echo $i; ?> </td>
                        <td><?php echo '<b>'.$name.'</b></br><i style="color:red">'.$email.'</i></br><i style="color:blue">'.$phone.'</i>'; ?></td>                        
                        
                        <td><?php echo $content; ?></td> 
                        <td><?php echo $create_date; ?></td>
                        
                        <td colspan="2"><?php Admin::delete($id); ?></td>
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



