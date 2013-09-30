<?php $this -> load -> view ('header')?>
<div class="mainLeft">
<?php $this -> load -> view ('category')?>
<?php $this -> load -> view ('banner')?>
        </div>
        <!-- en main left -->

        <!-- main right -->
        <div class="mainRight">

            <div class="listNews listProduct">
           	<ul>
           		<?php foreach ($cars as $index => $one) {
           			$uri_image = UPLOAD_IMG_DIR.'cars/'.$one['hinh'];
           		?>
            	<li>
                  	<h4><?php echo $one['name']?></h4>
                      <img src="<?php echo $uri_image?>" />
                      <p><?php echo $one['intro']?></p>
                      <div class="alr fixed"><span class="price">Giá: <?php echo number_format(intval($one['price']),0,'','.')?> VNĐ</span> <a href="<?php echo WEB_ROOT?>/xe-qua-su-dung/chi-tiet/<?php echo $one['id']?>" class="bnt">Xem thêm</a></div>
                  </li>
                <?php }?>

            	</ul>

             <?php if(isset($pagination)) echo $pagination ?>

           </div>

        </div>
        <!-- en main right -->

        <div class="clr"></div>
<?php $this -> load -> view ('footer')?>