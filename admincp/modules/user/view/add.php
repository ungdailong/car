<?php if (!defined('DIR_APP'))
    die('Your have not permission'); ?>

<div class="box"> <!-- Box begins here -->
    <h2 style="float:left; width:83%">Add New User</h2> <h2 style="float:right; ">  
	
	<?php 
		if($_SESSION['admin_group_id']==1)
			Admin::button('save, cancel'); 
		else
			Admin::button('save'); 
	?> </h2>
    <div style="clear:both"></div>

    <?php if (@$_SESSION['message']) { ?>
        <div class="warning"><?php echo $_SESSION['message'];
    unset($_SESSION['message']); ?></div>
    <?php } ?>
    <div class="content">	



        <form method="post" enctype="multipart/form-data" name="myform">		
            <div id="tab_general">
                <table class="form">
                    <thead>
                        <tr class="alt"> 

                            <th colspan="2"><strong>Input Information</strong></th>

                        </tr>
                    </thead>
                    <?php if (empty($error)) { ?>
                       <?php if($_SESSION['admin_group_id']==1){?>
                        <tr>
                            <td><?php echo LANG_USER_GROUP; ?>:</td>
                            <td>
                                <select name="group_id" style="width: 150px;" <?php echo $_SESSION['admin_group_id']==1?'':'disabled="disabled"'?> >
                                    <?php
                                    foreach ($group as $val) {
										?>                                       
                                        <option value="<?php echo $val['id']?>" <?php echo $val['id']==$_SESSION['admin_group_id']?"selected='selected'":""?>> <?php echo $val['group_name'] ?></option>
                                        <?php                                        
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>     
                        <?php }else{?>
						<input type="hidden" name="group_id" value="2" />
						<?php }?>              
                        <tr>
                            <td><?php echo LANG_USER_FULLNAME; ?>:</td>
                            <td><input type="text" name="fullname" value="<?php echo @$fullname; ?>" class="w200" /></td>
                        </tr>
                        <tr>
                            <td><?php echo LANG_USER_USENAME; ?>:</td>
                            <td><input type="text" name="username" value="<?php echo @$username; ?>" class="w200" /> <span class="required">*</span> </td>
                        </tr>
                        <tr>
                            <td><?php echo LANG_USER_PASSWORD; ?>:</td>
                            <td><input type="password" name="password" class="w200" /> <span class="required">*</span> </td>
                        </tr>
                        <tr>
                            <td><?php echo LANG_USER_EMAIL; ?>:</td>
                            <td><input type="text" name="email" value="<?php echo @$email; ?>" class="w200" /> <span class="required">*</span> </td>
                        </tr>                    
                        <tr>
                            <td><?php echo LANG_USER_PUBLISH; ?>:</td>
                            <td>
                                <input type="radio" name="publish" value="1" <?php echo @$publish == 1 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                                <input type="radio" name="publish" value="0" <?php echo @$publish == 0 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td><?php echo LANG_USER_GROUP; ?>:</td>
                            <td>
                                <select name="group_id" style="width: 150px;">
                                    <?php
                                    foreach ($group as $val) {
                                        ?>
                                        <option value="<?php echo $val['id'] ?>" <?php if($val['id'] == $group_id) echo  "selected='selected'"?>><?php echo $val['group_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </td>
                        </tr>                   
                        <tr>
                            <td><?php echo LANG_USER_FULLNAME; ?>:</td>
                            <td><input type="text" name="fullname" value="<?php echo @$full_name; ?>" class="w200" /></td>
                        </tr>
                        <tr>
                            <td><?php echo LANG_USER_USENAME; ?>:</td>
                            <td><input type="text" name="username" value="<?php echo @$user_name; ?>" class="w200" /> <span class="required">*</span> </td>
                        </tr>
                        <tr>
                            <td><?php echo LANG_USER_PASSWORD; ?>:</td>
                            <td><input type="password" name="password" class="w200" /> <span class="required">*</span> </td>
                        </tr>
                        <tr>
                            <td><?php echo LANG_USER_EMAIL; ?>:</td>
                            <td><input type="text" name="email" value="<?php echo @$email; ?>" class="w200" /> <span class="required">*</span> </td>
                        </tr>                    
                        <tr>
                            <td><?php echo LANG_USER_PUBLISH; ?>:</td>
                            <td>                                
                                <input type="radio" name="publish" value="1" <?php echo @$publish == 1 ? 'checked' : ''; ?> /> <?php echo LANG_ENABLE; ?>
                                <input type="radio" name="publish" value="0" <?php echo @$publish == 0 ? 'checked' : ''; ?> /> <?php echo LANG_DISABLE; ?>                                
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div id="tab_data">

            </div>

        </form>
    </div>


    <!-- END Table -->


</div> <!-- END Box-->

<script type="text/javascript">
    $.tabs('#tabs a');
</script>