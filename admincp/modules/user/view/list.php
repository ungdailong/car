<?php if(!defined('DIR_APP')) die('Your have not permission'); ?>
		 
<form id="form2" name="form2" method="post" action="<?php echo $_GET['p'] ;?>/delete">
<div class="box"> <!-- Box begins here -->
      <h2 style="float:left; width:80%">User Manager</h2> <h2 style="float:right; ">  <?php Admin::button('add, delete'); ?> </h2>
      <div style="clear:both"></div>
     
      <?php if(@$_SESSION['message']) { ?>
    <div class="warning"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php } ?>

      <table cellspacing="0" cellpadding="0"><!-- Table -->
        
          <thead>
                    <tr>
                        <th class="center" width="1"><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);"></th>
                        <th><?php echo "No" ?></th>
						<th><?php echo LANG_USER_NAME; ?></th>
                        <th><?php echo LANG_USER_USENAME; ?></th>
                        <th><?php echo LANG_USER_EMAIL; ?></th>
                        <th><?php echo LANG_USER_GROUP; ?></th>                      
                        <th ><?php echo LANG_USER_PUBLISH; ?></th>
                        <th><?php echo LANG_ACTION; ?></th>
						<th><?php echo "ID" ?></th>
                    </tr>
          </thead>
      	<?php if( empty($rows) ) { ?>
            <tr >
                <td class="center" colspan="20"><?php echo LANG_NO_RESULT; ?></td>
            </tr>
        <?php
                    } else {
                        $i=1;
						foreach($rows as $row) {
							$id = $row['id'];
							$name = $row['fullname'];
							$username = $row['username'];
							$email = $row['email'];							
							$group_id = $row['group_id'];
							$publish = $row['publish'];
                ?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $id; ?>"></td>
                        <td><?php echo $i; ?></td>
						<td><?php echo $name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $group_id; ?></td>                       
                        <td class="center">
							<?php if($publish=='1') $icon_pub="Publish"; else $icon_pub="Unpublish";  ?>
							<a href="<?php echo $mod->url('index.php?p='.$_GET['p'])?>/publish/<?=$id?>"><img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" /></a></a>
						</td>
                        <td class="right"><?php Admin::edit($id); ?> <?php Admin::delete($id); ?></td>
						<td><?php echo $id; ?></td>
                    </tr>
                <?php $i++;} } ?>
          
        </table>
      
           
         <!-- END Table -->
      <br />
      <?php echo $paging; ?>
       <input type="hidden" name="task" value="" />
       </form>
      
  </div> <!-- END Box-->