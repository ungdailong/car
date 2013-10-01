<?php $this -> load -> view ('header')?>
<script type="text/javascript" src="<?php echo JS_DIR?>home.js"></script>
<div class="homePage">

	<div class="col linkH index_category">
		<a class="dialog" href="#dk_laithu">Đăng ký lái thử</a>
		<a class="dialog" href="#banggia">Bảng giá</a>
		<a class="dialog" href="#yeucau_catalogue">Yêu cầu catalogue</a>
		<a class="dialog" href="#hotro_taichinh">Hỗ trợ tài chính</a>
	</div>

	<div class="col colPro">
		<a href="<?php echo WEB_ROOT?>/xe-moi"><img src="<?php echo IMG_DIR?>pic/pic_h1.jpg" /></a>
		<h2>
			<a href="<?php echo WEB_ROOT?>/xe-moi">Các dòng xe mới nhất</a>
		</h2>
	</div>

	<div class="col colPro">
		<a href="<?php echo WEB_ROOT?>/xe-qua-su-dung"><img src="<?php echo IMG_DIR?>pic/pic_h2.jpg" /></a>
		<h2>
			<a href="<?php echo WEB_ROOT?>/xe-qua-su-dung">Xe đã qua sử dụng</a>
		</h2>
	</div>

	<div class="col colNews">
		<ul class="boxNewsH">
			<?php foreach ($tintuc as $index => $one){?>
			<li>
				<h4>
					<a href="<?php echo WEB_ROOT?>/tin-tuc/chi-tiet/<?php echo $one['id']?>"><?php echo $one['title']?></a>
				</h4>
				<p><?php echo $one['intro']?></p>
			</li>
			<?php }?>
		</ul>
		<h2>
			<a href="#">Tin tức & Sự kiện</a>
		</h2>
	</div>

	<div class="clr"></div>

</div>
<div style="display: none;">
	<div class="boxForm" id="dk_laithu">
		<div class="fromDH">
			<form>
			<h1 class="titleBar">Form Đăng Ký</h1>
			<div class="colLD">
				<label>Họ &amp; Tên <span class="blue">*</span>:
				</label> <input type="text" class="inpDH"><br> <label>Địa chỉ email:</label>
				<input type="text" class="inpDH"><br> <label>Số điện thoại: <span
					class="blue">*</span>:
				</label> <input type="text" class="inpDH"><br>

			</div>
			<div class="colRD">
				<label>Yêu cầu: <span class="blue">*</span>:</label>
				<select class="inpDH2">
					<option value="1">Đăng ký lái thử</option>
					<option value="2">Bảng giá</option>
					<option value="3">Yêu cầu Catalogue</option>
				</select><br>
				<label>Nội dung: <span class="blue">*</span>:
				</label>
				<textarea class="areaDH"></textarea>
				<br>


				<div class="ptl alr">
					<input type="button" class="bnt" value="Xoá"> <input type="submit"
						class="bnt" value="Đặt hàng">
				</div>
			</div>
			<div class="clr"></div>
			</form>
		</div>

	</div>
</div>
<div style="display: none;">
	<div class="boxForm" id="banggia">
		<div class="fromDH">
			<h1 class="titleBar">Bảng Giá</h1>
			<div><?php echo $tintuc_trangchu[2]['content']?></div>
			<div class="clr"></div>
		</div>
	</div>
</div>
<div style="display: none;">
	<div class="boxForm" id="yeucau_catalogue">
		<div class="fromDH">
			<h1 class="titleBar">Yêu cầu Catalogue</h1>
			<div><?php echo $tintuc_trangchu[1]['content']?></div>
			<div class="clr"></div>
		</div>
	</div>
</div>
<div style="display: none;">
	<div class="boxForm" id="hotro_taichinh">
		<div class="fromDH">
			<h1 class="titleBar">Hỗ trợ tài chính</h1>
			<div><?php echo $tintuc_trangchu[0]['content']?></div>
			<div class="clr"></div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('.fromDH .bnt:eq(0)').click(function(){
			$('.fromDH .inpDH').val('');
			$('.fromDH textarea').val('');
		});
	});
</script>
<?php $this -> load -> view ('footer')?>