<?php if (!defined('DIR_APP'))
    die('Your have not permission'); ?>

<div id="sidebar"> <!-- Sidebar begins here -->

    <div class="header logo" style="margin-bottom:30px">
        <a href="." title="VTravel">
            <span style="font-size:30px; font-weight:bold;  color:#FFF">
                Admin
            </span>
        </a>
    </div> <!-- END Logo -->

    <div id="navigation"> <!-- Navigation begins here -->
        <div class="sidenav"><!-- Sidenav -->

            <?php
            $css1 = $css2 = $css3 = $css4 = $css5 = $css6 = $css7 = $css8 = $css9 = $css10= $css11= $css12 = $css13 =$css14=$css15=$css16 ="";

            switch (@$_GET['p']) {
                case "about": $css1 = "class='active'";
                    break;
                case "dinhcu": $css2 = "class='active'";
                    break;
                case "user": $css4 = "class='active'";
                    break;
                case "user/edit": $css5 = "class='active'";
                    break;
                case "tintuc": $css8 = "class='active'";
                    break;
                case "thongtincanluuy": $css9 = "class='active'";
                    break;
				case "slider": $css16 = "class='active'";
                    break;
				case "contact": $css15 = "class='active'";
                    break;

                default : $css1 = "class='active'";
                    break;
            }
            ?>
            <div class="navhead"><span>Menu</span><span class="navbullet"></span></div><!-- Sidenav Headline -->
            <div class="subnav"><!-- Sidenav Box -->
                <ul class="submenu">
                	<li><a <?php echo $css1; ?> href="<?php echo $mod->url('index.php?p=category'); ?>" title="">Categories</a></li>
                	<li><a <?php echo $css1; ?> href="<?php echo $mod->url('index.php?p=car'); ?>" title="">Danh sách xe</a></li>
                    <li><a <?php echo $css1; ?> href="<?php echo $mod->url('index.php?p=about'); ?>" title="">Giới thiệu</a></li>
                    <li><a <?php echo $css2; ?> href="<?php echo $mod->url('index.php?p=dinhcu'); ?>" title="">Chương trình định cư</a></li>
                    <li><a <?php echo $css8; ?> href="<?php echo $mod->url('index.php?p=tintuc'); ?>" title="">Tin tức</a></li>
                    <li><a <?php echo $css9; ?> href="<?php echo $mod->url('index.php?p=thongtincanluuy'); ?>" title="">Thông tin cần lưu ý</a></li>
                    <li><a <?php echo $css16; ?> href="<?php echo $mod->url('index.php?p=slider'); ?>" title="">Slide</a></li>
                    <li><a <?php echo $css15; ?> href="<?php echo $mod->url('index.php?p=contact'); ?>" title="">Liên hệ</a></li>

                </ul>
            </div>
            <div class="navhead"><span>Admin</span><span class="navbullet"></span></div>
            <div class="subnav" style="display:block">
                <ul class="submenu">
                    <?php if($_SESSION['admin_group_id']==1){?>
                    <li><a  <?php echo $css4; ?>href="<?php echo $mod->url('index.php?p=user'); ?>" title="">Users manager</a></li>
					<?php }?>
                    <li><a <?php echo $css5; ?> href="<?php echo $mod->url('index.php?p=user/edit'); ?>" title="">My Account</a></li>

                </ul>
            </div><!-- /Sidenav Box -->
        </div><!-- /Sidenav -->
    </div> <!-- END Navigation -->

    <div id="copyrights">
        <p> <a href="../" target="_blank">VTravel <br /></a></p>
    </div>
</div> <!-- END Sidebar -->