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
        <h1 style="background-image: url('images/user.png');"><?php echo LANG_USER_MANAGER; ?></h1>
        <?php Admin::button('save, cancel'); ?>
    </div>
    
    <div class="content">
        <form method="post" enctype="multipart/form-data" name="myform">
            <table class="form">
                <tr>
                    <td><span class="required">*</span> <?php echo LANG_USER_NAME; ?>:</td>
                    <td><input type="text" name="group_name" value="<?php echo @$group_name; ?>" class="w200" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>