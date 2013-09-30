<?php $this -> load -> view ('header')?>
<div class="pageAll">

        	<h1 class="titleALl">Tin Tức & Sự Kiện</h1>

           <div class="listNews">
           	<ul>
            	<?php foreach ($tintuc as $index => $one){
					$date = date('d',$one['date_create']);
					$month = date('m',$one['date_create']);
					$url_image = UPLOAD_IMG_DIR.'tintuc/'.$one['hinh'];
            	?>
            		<li>
                  	<b><?php echo $date ?><i><?php echo $month ?></i></b>
                      <img src="<?php echo $url_image?>" />
                      <h4><?php echo $one['title']?></h4>
                      <p><?php echo $one['intro']?></p>
                      <div class="alr"><a href="<?php echo WEB_ROOT?>/tin-tuc/chi-tiet/<?php echo $one['id']?>" class="bnt">Xem thêm</a></div>
                  </li>
            	<?php }?>

            	</ul>

               <?php echo $pagination ?>

           </div>

           <div class="clr"></div>

        </div>
<?php $this -> load -> view ('footer')?>