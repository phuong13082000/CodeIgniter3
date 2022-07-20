<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
	<div class="bg-secondary rounded-top p-4">
		<div class="row">
			<div class="col-12 col-sm-6 text-center text-sm-start">
				&copy; <a href="#">2022</a>, All Right Reserved.
			</div>
			<div class="col-12 col-sm-6 text-center text-sm-end">
				<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
				Designed By : <a href="#">2022</a>
				<br>
				Distributed By: <a href="#">2022</a>
			</div>
		</div>
	</div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

<script src="<?php echo base_url('./backend/lib/chart/chart.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/lib/easing/easing.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/lib/waypoints/waypoints.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/lib/tempusdominus/js/moment.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/lib/tempusdominus/js/moment-timezone.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script src="<?php echo base_url('./backend/js/main.js') ?>"></script>

<script>
	$('.xulydonhang').change(function () {
		const value = $(this).val();
		const order_code = $(this).find(':selected').attr('id');
		if (value == 0) {
			alert('Hãy chọn xử lý đơn hàng!');
		} else {
			$.ajax({
				method: 'POST',
				url: '/order/process',
				data: {value: value, order_code: order_code},
				success: function () {
					alert('Thay đổi thuộc tính đơn hàng thành công!');
				}
			})
		}
	})
</script>

<script>
	CKEDITOR.replace('desc_brand');
	CKEDITOR.replace('desc_category');
	CKEDITOR.replace('desc_product');
</script>

<script type="text/javascript">
	function ChangeToSlug() {
		var slug;

		//Lấy text từ thẻ input title
		slug = document.getElementById("slug").value;
		slug = slug.toLowerCase();
		//Đổi ký tự có dấu thành không dấu
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		//Xóa các ký tự đặt biệt
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		//Đổi khoảng trắng thành ký tự gạch ngang
		slug = slug.replace(/ /gi, "-");
		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		//Xóa các ký tự gạch ngang ở đầu và cuối
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		//In slug ra textbox có id “slug”
		document.getElementById('convert_slug').value = slug;
	}
</script>
</body>

</html>
