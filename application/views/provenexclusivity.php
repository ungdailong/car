<?php $this -> load -> view ('header')?>
<div class="pageAll">

        	<h1 class="titleALl"><?php echo $data -> title ?></h1>

           <div class="pageDetail">
			<?php if (isset($data -> title)) {?>


            	<div class="contnet"><?php echo stripslashes($data -> content) ?></div>
           </div>
           <?php }else{?>
           <h3>Chưa có thông tin nào</h3>
           <?php }?>
           <div class="clr"></div>

        </div>
<?php $this -> load -> view ('footer')?>