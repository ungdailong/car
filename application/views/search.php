<?php $this -> load -> view ('header')?>
<div class="pageAll">

        	<h1 class="titleALl">Tìm kiếm</h1>

           <div class="listNews">
           	<ul>
            	<?php
            		foreach ($data as $index => $one){
	            		foreach ($one as $index1 => $one1){
							if ($index == 'tuvan')
								$path = 'tu-van';
							elseif($index == 'tintuc')
								$path = 'tin-tuc';
							elseif($index == 'khuyenmai')
								$path = 'khuyen-mai';
							elseif($index == 'cars'){
								$path = $one1['type_car'] == 'Xe mới' ? 'xe-moi' : 'xe-qua-su-dung';
							}
							$url_image = UPLOAD_IMG_DIR.$index.'/small_'.$one1['hinh'];
            	?>
		            		<li>

		                      <img src="<?php echo $url_image?>" />
		                      <h4><?php echo isset($one1['name']) ? $one1['name'] : $one1['title']?></h4>
		                      <p><?php echo $one1['intro']?></p>
		                      <div class="alr"><a href="<?php echo WEB_ROOT?>/<?php echo $path?>/chi-tiet/<?php echo $one1['id']?>" class="bnt">Xem thêm</a></div>
		                  	</li>
            	<?php
            			}

            		}
            	?>

            	</ul>

              <?php if(isset($pagination)) echo $pagination ?>

           </div>

           <div class="clr"></div>

        </div>
<?php $this -> load -> view ('footer')?>