<?php $this -> load -> view ('header')?>
<script type="text/javascript" src="<?php echo JS_DIR?>home.js"></script>
<div class="mainLeft">
<?php $this -> load -> view ('category')?>
<?php $this -> load -> view ('banner')?>
        </div>
        <!-- en main left -->

        <!-- main right -->
        <div class="mainRight">

            <div class="proDetail">

              	<h1 class="titlePro"><?php echo $car -> name?></h1>

              <div class="colL">
              		<h4>Màu xe</h4>
                  <div class="color"><a href="#"><img src="<?php echo IMG_DIR?>pic/color1.png" /></a> <a href="#"><img src="<?php echo IMG_DIR?>pic/color2.png" /></a> <a href="#"><img src="<?php echo IMG_DIR?>pic/color3.png" /></a> <a href="#"><img src="<?php echo IMG_DIR?>pic/color4.png" /></a></div>
                  <h4>Màu nội thất xe</h4>
                  <div class="color"><a href="#"><img src="<?php echo IMG_DIR?>pic/color1.png" /></a> <a href="#"><img src="<?php echo IMG_DIR?>pic/color2.png" /></a> <a href="#"><img src="<?php echo IMG_DIR?>pic/color3.png" /></a> <a href="#"><img src="<?php echo IMG_DIR?>pic/color4.png" /></a></div>
              </div>

              <div class="colR">
              		<h4 class="price">Giá: <?php echo number_format(intval($car -> price),0,'','.')?> VNĐ</h4>
                  <div class="ptl alr"><a id="various1" href="#dk_laithu" class="bnt">đăng ký</a></div>
              </div>




              <div class="clr pvm"></div>

              <!--  <h1 class="titleALl"><?php echo $car -> intro?></h1>-->
              <div><?php echo $car -> intro?></div>
              <div><?php echo stripslashes($car -> content)?></div>
              <h2>Thông số kĩ thuật</h2>
              <div><?php echo stripslashes($car -> thongso_kithuat)?></div>
              <div class="detailTS"><img src="images/pic/pic_thongso.jpg" /></div>

            </div>

        </div>
        <!-- en main right -->

        <div class="clr"></div>
<script>
	$(function(){
		$('.fromDH .bnt:eq(0)').click(function(){
			$('.fromDH .inpDH').val('');
			$('.fromDH textarea').val('');
		});
		$('.fromDH .bnt:eq(1)').click(function(){
			var name = $('#name').val();
			var email = $('#email').val();
			var mobile = $('#mobile').val();
			var content = $('#content').val();
			var require = $('#require').val();
			if(name == '' || email == '' || mobile == '')
				alert("Vui lòng nhập đầy đủ thông tin");
			else
				$.ajax({
					url: "",
					type : "POST",
					data: {
						name : name,
						email : email,
						mobile : mobile,
						content : content,
						require : require
						},
					success:function(result){
						alert("Đăng kí thành công. Xin cảm ơn bạn");
						window.location.href = '';
					}
				});
		});
	});
</script>
  <?php $this -> load -> view ('footer')?>