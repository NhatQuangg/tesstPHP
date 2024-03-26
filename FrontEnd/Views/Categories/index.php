	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">
		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link collapsed" href="home">
					<i class="bi bi-circle"></i>
					<span>Quản lý phản ánh</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="">
					<i class="bi bi-circle"></i>
					<span>Quản lý danh mục</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="">
					<i class="bi bi-circle"></i>
					<span>Quản lý tài khoản</span>
				</a>
			</li>

		</ul>
	</aside>
	<!-- End Sidebar-->

	<!-- =============== Main ============== -->
	<main id="main" class="main" style="min-height: 625px;">
		<section class="section">
			<div class="row">
				<div class="col-lg-5">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">---</h5>

							<form method="POST" action="category">
								<!-- <div class="row mb-3">
									<label for="" class="col-sm-3 col-form-label">Mã loại</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="" name="txtmaloai" value="">
									</div>
								</div> -->
								<div class="row mb-3">
									<label for="" class="col-sm-3 col-form-label">Tên loại</label>
									<div class="col-sm-9">
										<input type="hidden" id="selectedCategoryId" name="selectedCategoryId">
										<input type="text" class="form-control" id="txtcategory" name="txtcategory" value="">
										<?php
										if (isset($_SESSION['create_success'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['create_success'] . "</em></p>";
											unset($_SESSION['create_success']);
										}
										if (isset($_SESSION['create_fail'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['create_fail'] . "</em></p>";
											unset($_SESSION['create_fail']);
										}
										if (isset($_SESSION['update_success'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['update_success'] . "</em></p>";
											unset($_SESSION['update_success']);
										}
										if (isset($_SESSION['update_fail'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['update_fail'] . "</em></p>";
											unset($_SESSION['update_fail']);
										}
										?>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary" value="create_btn" name="create_btn">Thêm</button>
									<button type="submit" class="btn btn-primary" value="update_btn" name="update_btn">Cập nhật</button>
								</div>
							</form><!-- End Horizontal Form -->

						</div>
					</div>

				</div>

				<div class="col-lg-7">

					<div class="card">
						<div class="card-body" style="max-height: 630px; overflow-y: auto;">
							<div class="row">
								<div class="col">
									<h5 class="card-title">Danh sách</h5>
								</div>
								<div class="col">
									<!-- <h5 class="" style="padding: 20px 0 15px 0;" >haha</h5> -->
									<em class="font-italic text-success" style="padding: 20px 0 15px 0;">
										<?php
										if (isset($_SESSION['delete_success'])) {
											$alert = $_SESSION['delete_success'];
											echo $alert;
											unset($_SESSION['delete_success']);
										}
										?>
									</em>
								</div>
							</div>
							<?php

							if (isset($_SESSION['delete_fail'])) {
								echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['delete_fail'] . "</em></p>";
								unset($_SESSION['delete_fail']);
							}
							?>
							<!-- Table with stripped rows -->
							<table class="table table-bordered table-hover ">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã loại</th>
										<th scope="col">Tên loại</th>
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($allCategory as $categoryId => $categoryData) {
									?>
										<tr style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $categoryId ?></td>
											<td style="text-align: center;"><?= $categoryData['category_name'] ?></td>
											<td style="text-align: center;">
												<a href="javascript:void(0)" class="select-btn" data-id="<?= $categoryId ?>" data-name="<?= $categoryData['category_name'] ?>">Chọn</a>
											</td>
											<td style="text-align: center;">
												<a href="javascript:void(0)" class="delete-btn" data-id="<?= $categoryId ?>">Xóa</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<form id="deleteForm" method="POST" action="category">
								<input type="hidden" name="categoryId" id="categoryIdInput">
								<input type="hidden" name="delete_btn">
							</form>
							<script>
								// Lắng nghe sự kiện click trên nút Xóa
								document.querySelectorAll('.delete-btn').forEach(button => {
									button.addEventListener('click', function() {
										// Lấy id từ thuộc tính data-id
										const categoryId = this.getAttribute('data-id');
										// Hiển thị confirm dialog
										if (confirm("Bạn có muốn xóa loại có mã " + categoryId + " không?")) {
											// Nếu người dùng chọn OK, gán categoryId vào input của form và submit form
											document.getElementById('categoryIdInput').value = categoryId;
											// Đặt giá trị cho nút để xác định hành động là delete_btn
											document.getElementById('deleteForm').submit();
										}
									});
								});
							</script>
							<!-- End Table with stripped rows -->
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

	<!-- ===================== Footer ====================== -->
	<footer id="footer" class="footer">
		<div class="copyright">&copy; Copyright
			<strong><span>QuangNguyen</span></strong>. All Rights Reserved
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Nút lên đầu trang -->
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
		<i class="bi bi-arrow-up-short"></i>
	</a>
	<!-- ======== Script ========  -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<script>
		// Chờ 5 giây trước khi ẩn thẻ
		setTimeout(function() {
			// Ẩn thẻ chứa SESSION
			document.querySelector('.font-italic.text-danger').style.display = 'none';
		}, 5000); // 5000 milliseconds = 5 giây
	</script>
	<script>
		// Lắng nghe sự kiện click trên nút Chọn
		document.querySelectorAll('.select-btn').forEach(button => {
			button.addEventListener('click', function() {
				// Lấy id và tên loại từ thuộc tính data
				const categoryId = this.getAttribute('data-id');
				const categoryName = this.getAttribute('data-name');
				// Cập nhật giá trị cho trường input hidden và trường input text
				document.getElementById('selectedCategoryId').value = categoryId;
				document.getElementById('txtcategory').value = categoryName;
			});
		});
	</script>
	</body>

	</html>