<?php $this -> load -> view ('header')?>
        <div class="pageAll">
        	<h1 class="titleALl">Tư vấn</h1>
           <div class="pageDetail"></br>
           	<h1 class="titleD"><?php echo $tuvan -> title?></h1></br>
            	<div class="direction"><?php echo $tuvan -> intro?></div>
            	<div class="contnet"><?php echo stripslashes($tuvan -> content)?></div>
           </div>
           <div class="clr"></div>
        </div>
<?php $this -> load -> view ('footer')?>
