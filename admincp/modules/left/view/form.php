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
            $css1 = $css2 = $css3 = $css4 = $css5 = $css6 = $css7 = $css8 = $css9 = $css10 = $css11 = $css12 = "";

            switch (@$_GET['p']) {
                case "category": $css1 = "class='active'";
                    break;
                case "category_tuvan": $css2 = "class='active'";
                    break;
                case "car": $css3 = "class='active'";
                    break;
                case "khuyenmai": $css4 = "class='active'";
                    break;
                case "tintuc": $css5 = "class='active'";
                    break;
                case "tintuc_trangchu": $css6 = "class='active'";
                    break;
				case "slider": $css7 = "class='active'";
                    break;
				case "contact": $css8 = "class='active'";
                    break;
				case "user": $css9 = "class='active'";
                    break;
                case "user/edit": $css10 = "class='active'";
                    break;
                case "tuvan": $css11 = "class='active'";
                    break;
                case "subcribe": $css12 = "class='active'";
                    break;
                default : $css1 = "class='active'";
                    break;
            }
            ?>
            <div class="navhead"><span>Menu</span><span class="navbullet"></span></div><!-- Sidenav Headline -->
            <div class="subnav"><!-- Sidenav Box -->
                <ul class="submenu">
                	<li><a <?php echo $css1; ?> href="<?php echo $mod->url('index.php?p=category'); ?>" title="">Danh mục xe</a></li>
                	<li><a <?php echo $css2; ?> href="<?php echo $mod->url('index.php?p=category_tuvan'); ?>" title="">Danh mục tư vấn</a></li>
                	<li><a <?php echo $css3; ?> href="<?php echo $mod->url('index.php?p=car'); ?>" title="">Danh sách xe</a></li>
                    <li><a <?php echo $css4; ?> href="<?php echo $mod->url('index.php?p=khuyenmai'); ?>" title="">Khuyến mãi</a></li>
                    <li><a <?php echo $css5; ?> href="<?php echo $mod->url('index.php?p=tintuc'); ?>" title="">Tin tức-sự kiện</a></li>
                    <li><a <?php echo $css6; ?> href="<?php echo $mod->url('index.php?p=tintuc_trangchu'); ?>" title="">Tin tức mục trang chủ</a></li>
                    <li><a <?php echo $css11; ?> href="<?php echo $mod->url('index.php?p=tuvan'); ?>" title="">Tư vấn</a></li>
                    <li><a <?php echo $css7; ?> href="<?php echo $mod->url('index.php?p=slider'); ?>" title="">Slide</a></li>
                    <li><a <?php echo $css8; ?> href="<?php echo $mod->url('index.php?p=contact'); ?>" title="">Liên hệ</a></li>
					<li><a <?php echo $css12; ?> href="<?php echo $mod->url('index.php?p=subcribe'); ?>" title="">Đăng ký</a></li>
                </ul>
            </div>
            <div class="navhead"><span>Admin</span><span class="navbullet"></span></div>
            <div class="subnav" style="display:block">
                <ul class="submenu">
                    <?php if($_SESSION['admin_group_id']==1){?>
                    <li><a  <?php echo $css9; ?>href="<?php echo $mod->url('index.php?p=user'); ?>" title="">Users manager</a></li>
					<?php }?>
                    <li><a <?php echo $css10; ?> href="<?php echo $mod->url('index.php?p=user/edit'); ?>" title="">My Account</a></li>

                </ul>
            </div><!-- /Sidenav Box -->
        </div><!-- /Sidenav -->
    </div> <!-- END Navigation -->


</div> <!-- END Sidebar -->