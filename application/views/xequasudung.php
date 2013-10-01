<?php $this -> load -> view ('header')?>
<div class="mainLeft">
<?php $this -> load -> view ('category')?>
<?php $this -> load -> view ('banner')?>
<script type="text/javascript" src="<?php echo JS_DIR?>popup.js"></script>
<link rel="stylesheet" href="<?php echo CSS_DIR?>popup.css">
        </div>
        <!-- en main left -->

        <!-- main right -->
        <div class="mainRight">

            <div class="listNews listProduct">
           	<ul>
           		<?php foreach ($cars as $index => $one) {
           			$uri_image = UPLOAD_IMG_DIR.'cars/small_'.$one['hinh'];
           		?>
            	<li>
                  	<h4><?php echo $one['name']?></h4>
                      <a class="popper" data-popbox="pop<?php echo $index?>"><img src="<?php echo $uri_image?>" /></a>
                      <p><?php echo $one['intro']?></p>
                      <div class="alr fixed"><span class="price">Giá: <?php echo number_format(intval($one['price']),0,'','.')?> VNĐ</span> <a href="<?php echo WEB_ROOT?>/xe-qua-su-dung/chi-tiet/<?php echo $one['id']?>" class="bnt">Xem thêm</a></div>
                  </li>
                  <div id="pop<?php echo $index?>" class="popbox">
					<h2>Thông số kĩ thuật</h2>
					<?php if($one['thongso_kithuat'] != '') {?>
						<p><?php echo $one['thongso_kithuat']?></p>
					<?php }else{?>
						<p>Chưa có thông tin</p>
					<?php }?>
				</div>
                <?php }?>

            	</ul>

             <?php if(isset($pagination)) echo $pagination ?>

           </div>

        </div>
        <!-- en main right -->

        <div class="clr"></div>
<?php $this -> load -> view ('footer')?>