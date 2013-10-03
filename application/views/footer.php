</div>
<!-- en bodymain -->
<!-- footer -->
<div class="footer">
	<div class="inFooter fixed">
		<div class="col1">
			<h2>Vietnam Star Automobile</h2>
			Đại lý Mercedes-Benz lớn nhất Việt Nam 
		</div>
		<div class="col2">
			Autohaus 01 : 02 Trường Chinh, P.Tây Thạnh ,Q. Tân Phú, TP.HCM <br />
			Autohaus 02 : 811-813 Nguyễn Văn Linh, P.Tân Phong, Q.7, TP.HCM 
		</div>
		<div class="col3">
			<b>Hotline P.KD : 09 33 93 63 63</b><br />Email :
			sales@mercedeshcm.vn    
		</div>
		<div class="col4">
			<a href="#" class="fb">Facebook</a> <a href="#" class="yu">Youtube</a>
		</div>
	</div>
</div>
<!-- en footer -->
</div>
<div style="display: none;">
	<div class="boxForm" id="dk_laithu">
		<div class="fromDH">

			<h1 class="titleBar">Form Đăng Ký</h1>
			<div class="colLD">
				<label>Họ &amp; Tên <span class="blue">*</span>:
				</label> <input type="text" id = "name"class="inpDH"><br> <label>Địa chỉ email <span class="blue">*</span>:</label>
				<input type="text" class="inpDH" id="email"><br> <label>Số điện thoại: <span
					class="blue">*</span>:
				</label> <input type="text" class="inpDH" id="mobile"><br>

			</div>
			<div class="colRD">
				<label>Yêu cầu :</label>
				<select class="inpDH2" id="require">
					<option value="1">Đăng ký lái thử</option>
					<option value="2">Bảng giá</option>
					<option value="3">Yêu cầu Catalogue</option>
				</select><br>
				<label>Nội dung: <span class="blue"></span>:
				</label>
				<textarea class="areaDH" id="content"></textarea>
				<br>


				<div class="ptl alr">
					<input type="button" class="bnt" value="Xoá"> <input type="submit"
						class="bnt" value="Gửi">
				</div>
			</div>
			<div class="clr"></div>

		</div>

	</div>
</div>
<script>
	$(function(){
		$('.fromDH .bnt:eq(0)').click(function(){
			$('.fromDH .inpDH').val('');
			$('.fromDH textarea').val('');
		})
		$('.fromDH .bnt:eq(1)').click(function(){
			var name = $('#name').val();
			var email = $('#email').val();
			var mobile = $('#mobile').val();
			var content = $('#content').val();
			var require = $('#require').val();
			if(name == '' || email == '' || mobile == ''){
				alert("Vui lòng nhập đủ thông tin");
				return false;
			}
			else{
				$.ajax({
					url : "",
					type : "POST",
					data :{
						name : name,
						email : email,
						mobile : mobile,
						content : content,
						require : require
						},
					success : function(){
						alert("Đăng kí thành công. Cảm ơn bạn");
						window.location.href = '';
					}
				})
			}
		})
	});
</script>
</body>
</html>