<?php if(!defined('DIR_APP')) die('Your have not permission'); ?>
		 
<form id="form2" name="form2" method="post" action="<?php echo $_GET['p'] ;?>/delete">
<div class="box"> <!-- Box begins here -->
      <h2 style="float:left; width:83%">Các bài viết của website</h2> <h2 style="float:right; ">  <?php Admin::button('add, delete'); ?> </h2>
      <div style="clear:both"></div>
      <p>Đây là module quản lý tất cả user login vào phần quản trị của website.</p>
      <!--
      Classical Table below, must be used with thead and tbody tags;
      -->
      <?php if(@$_SESSION['message']) { ?>
    <div class="warning"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php } ?>

      <table cellspacing="0" cellpadding="0"><!-- Table -->
          <thead>
                    <tr>
                        <th class="center" width="1"><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);"></th>
                        <th><?php echo "No" ?></th>
						<th align="left"><img src="images/flags/vn.png" /> <?php echo "Type"; ?></th>
                        <th>Description</td>
                        <th><?php echo LANG_ACTOR_DATE; ?></th>
                        <th><?php echo LANG_ACTOR_PUBLISH; ?></th>
                        <th class="right"><?php echo LANG_ACTION; ?></th>
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
							$type = $row['type'];
							$nametype='';
							switch($type){
								case '2':	
									$nametype='Introductions about Us';
									break;
								case 3:	
									$nametype='Director Information';
									break;
								case 1:	
									$nametype='Contact Information';
									break;
								default:
									$nametype='None';
									break;
							}
							$ndung = $mod->cutstring($row['description_'.$_SESSION['dirlang']],260);
							$date = $row['dateadd'];
							$publish = $row['publish'];
                ?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $id; ?>"></td>
                        <td><?php echo $i; ?></td>
						<td align="left"><?php echo $nametype; ?></td>
                        <td><?php echo $ndung; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php if($publish=='1') $icon_pub="Publish"; else $icon_pub="Unpublish";  ?>
							<a href="<?php echo $mod->url('index.php?p='.$_GET['p'])?>/publish/<?=$id?>"><img src="images/<?=$icon_pub?>.png" title="<?=$icon_pub?>" /></a></td>
                        <td class="right" width="130px"><?php Admin::edit($id); ?> <?php Admin::delete($id); ?></td>
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
  
  
