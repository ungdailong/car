<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:::: MERCEDES Ho Chi Minh ::::</title>
<link href="<?php echo CSS_DIR?>setup.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_DIR?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_DIR?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR?>curvycorners.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR?>library.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_DIR?>ddsmoothmenu.css">
<script type="text/javascript" src="<?php echo JS_DIR?>ddsmoothmenu.js"></script>
<link rel="stylesheet" href="<?php echo CSS_DIR?>global.css">
<script type="text/javascript" src="<?php echo JS_DIR?>slides.min.jquery.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "smoothmenu1",
	orientation: 'h',
	classname: 'ddsmoothmenu',
	contentsource: "markup"
})
$(function(){
			$('#slides').slides({
				effect: 'fade',
				play: 3000,
				pause: 5500,
				hoverPause: true,
				generateNextPrev: true
			});

		});
</script>
<script type="text/javascript" src="<?php echo JS_DIR?>fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="<?php echo JS_DIR?>fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_DIR?>fancybox/jquery.fancybox-1.3.1.css" media="screen" />
</head>
<body>
<div class="site">
	<!-- header -->
	<div class="header"><div class="inHeader">
    	 <a href="<?php echo WEB_ROOT?>" class="logo"><img src="<?php echo IMG_DIR?>logo.png" /></a>
        <div id="smoothmenu1" class="ddsmoothmenu">
            <ul>
                <li><a href="<?php echo WEB_ROOT?>/xe-moi"><span>Xe Mới</span></a></li>
                <li><a href="<?php echo WEB_ROOT?>/khuyen-mai"><span>Khuyến Mãi</span></a></li>
                <li><a href="<?php echo WEB_ROOT?>/tin-tuc"><span>Tin Tức & Sự Kiện</span></a></li>
                <li><a href="<?php echo WEB_ROOT?>/xe-qua-su-dung"><span>Xe Đã Qua Sử Dụng</span></a></li>
                <li><a href="<?php echo WEB_ROOT?>/tu-van"><span>Tư Vấn</span></a>
                	<ul>
                		<?php foreach ($GLOBALS['category_tuvan'] as $index => $one){?>
                      	<li><a href="<?php echo WEB_ROOT.'/tu-van/'.$one['uri']?>"><?php echo $one['name']?></a></li>
                      	<?php }?>

                      </ul>
                </li>
                <li><a href="<?php echo WEB_ROOT?>/lien-he"><span>Liên Hệ</span></a></li>
                <li class="search"><i href="#" class="icoSe"></i>
                		<ul><li><input type="text" placeholder="Tìm nhanh" /> <input type="submit" value="Tìm" /></li></ul>
                </li>
            </ul>
        </div>
        <div class="lang">
        	 <a href="#"><img src="<?php echo IMG_DIR?>ico_vn.png" /></a>
            <a href="#"><img src="<?php echo IMG_DIR?>ico_en.png" /></a>
        </div>
        <div class="clr"></div>
    </div></div>
	<!-- en header -->
    <!-- slide banner top -->
	<div class="bannerTop bannerSlidePro">
    	<div id="slides">
      		<div class="slides_container">
      			<?php foreach ($GLOBALS['slide'] as $key => $value){?>
                <div class="slide">
                    <a href="#" title="title" target="_blank"><img src="<?php echo UPLOAD_IMG_DIR?>slider/<?php echo $value['hinh'] ?> "/></a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- en slide banner top -->
    <!-- bodymain -->
	<div class="bodyMain">