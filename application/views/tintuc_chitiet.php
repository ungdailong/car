<?php $this -> load -> view ('header')?>
        <div class="pageAll">
        	<h1 class="titleALl">Tin Tức & Sự Kiện</h1>
           <div class="pageDetail"></br>
           	<h1 class="titleD"><?php echo $tintuc -> title?></h1></br>
            	<div class="direction"><?php echo $tintuc -> intro?></div>
            	<div class="contnet"><?php echo $tintuc -> content?></div>
           </div>
           <div class="clr"></div>
        </div>
<?php $this -> load -> view ('footer')?>
