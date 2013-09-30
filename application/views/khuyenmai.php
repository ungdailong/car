<?php $this -> load -> view ('header')?>
<div class="pageAll">

        	<h1 class="titleALl">Khuyến mãi</h1>

           <div class="pageDetail">
			<?php if (isset($khuyenmai -> title)) {?>
           	<h1 class="titleD"><?php echo $khuyenmai -> title ?></h1>
            	<div class="direction"><?php echo $khuyenmai -> intro?></div>
            	<div class="contnet"><?php echo $khuyenmai -> content ?></div>
           </div>
           <?php }else{?>
           <h3>Chưa có thông tin nào</h3>
           <?php }?>
           <div class="clr"></div>

        </div>
<?php $this -> load -> view ('footer')?>