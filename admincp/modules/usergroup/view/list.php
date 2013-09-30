<?php if(!defined('DIR_APP')) die('Your have not permission'); ?>

<div class="breadcrumb">
    <a href="."><?php echo LANG_INDEX_HOME; ?></a> :: 
    <a href="<?php echo $this->url('index.php?p=usergroup'); ?>"><?php echo LANG_MENU_USER_GROUP; ?></a>
</div>
		 
<?php if(@$_SESSION['message']) { ?>
<div class="warning"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
<?php } ?>
		
<div class="box">
    <div class="left"></div>
    <div class="right"></div>
    <div class="heading">
        <h1 style="background-image: url(images/user_group.png);"><?php echo LANG_USER_MANAGER; ?></h1>
        <?php Admin::button('add, delete'); ?>
    </div>
    <div class="content">
        <form method="post" enctype="multipart/form-data" name="myform">
            <table class="list">
                <thead>
                    <tr>
                        <td class="center" width="1"><input type="checkbox" onclick="$('input[name*=\'id\']').attr('checked', this.checked);"></td>
                        <td><?php echo "No" ?></td>
						<td><?php echo LANG_USER_NAME; ?></td>
                        <td class="right"><?php echo LANG_ACTION; ?></td>
						<td><?php echo "ID" ?></td>
                    </tr>
                </thead>
                <tbody>
                <?php if( empty($rows) ) { ?>
                    <tr>
                        <td class="center" colspan="20"><?php echo LANG_NO_RESULT; ?></td>
                    </tr>
                <?php
                    } else {
                        $i=1;
						foreach($rows as $row) {
							$id = $row['id'];
							$name = $row['group_name'];
                ?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $id; ?>"></td>
                        <td><?php echo $i; ?></td>
						<td><?php echo $name; ?></td>
                        <td class="right"><?php Admin::edit($id); ?> <?php Admin::delete($id); ?></td>
						<td><?php echo $id; ?></td>
                    </tr>
                <?php $i++;} } ?>
                </tbody>
            </table>
            <?php echo $paging; ?>
        </form>
    </div>
</div>