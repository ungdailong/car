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
                  <div class="color"><a href="#"><img src="images/pic/color1.png" /></a> <a href="#"><img src="images/pic/color2.png" /></a> <a href="#"><img src="images/pic/color3.png" /></a> <a href="#"><img src="images/pic/color4.png" /></a></div>
                  <h4>Màu nội thất xe</h4>
                  <div class="color"><a href="#"><img src="images/pic/color1.png" /></a> <a href="#"><img src="images/pic/color2.png" /></a> <a href="#"><img src="images/pic/color3.png" /></a> <a href="#"><img src="images/pic/color4.png" /></a></div>
              </div>

              <div class="colR">
              		<h4 class="price">Giá: <?php echo number_format(intval($car -> price),0,'','.')?> VNĐ</h4>
                  <div class="ptl alr"><a id="various1" href="#inline1" class="bnt">đăng ký</a></div>
              </div>

               <!-- popup -->
              <div style="display: none;">
                    <div id="inline1" class="boxForm">

                        <div class="fromDH">

                            <h1 class="titleBar">Form Đăng Ký</h1>
                            <div class="colLD">
                                <label>Họ & Tên <span class="blue">*</span>:</label> <input type="text" class="inpDH" /><br />
                                <label>Địa chỉ email:</label> <input type="text" class="inpDH" /><br />
                                <label>Số điện thoại: <span class="blue">*</span>:</label> <input type="text" class="inpDH" /><br />

                            </div>
                            <div class="colRD">
                            		<label>Yêu cầu: <span class="blue">*</span>:</label> <select class="inpDH2"><option></option></select><br />
                                <label>Nội dung:  <span class="blue">*</span>:</label>  <textarea class="areaDH"></textarea><br />


                                <div class="ptl alr"><input type="submit" value="Xoá" class="bnt" /> <input type="submit" value="Đặt hàng" class="bnt" /></div>
                            </div>
                            <div class="clr"></div>

                        </div>

                    </div>
                </div>
              <!-- en popup -->


              <div class="clr pvm"></div>

              <!--  <h1 class="titleALl"><?php echo $car -> intro?></h1>-->
              <div><?php echo $car -> intro?></div>
              <div><?php echo $car -> content?></div>
              <h2>Thông số kĩ thuật</h2>
              <div><?php echo $car -> thongso_kithuat?></div>
              <div class="detailTS"><img src="images/pic/pic_thongso.jpg" /></div>

            </div>

        </div>
        <!-- en main right -->

        <div class="clr"></div>

  <?php $this -> load -> view ('footer')?>
