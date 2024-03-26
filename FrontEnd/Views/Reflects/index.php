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
				<a class="nav-link collapsed" href="category">
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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Danh sách phản ánh</h5>
							<!-- Table with stripped rows -->

							<table class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã phản ánh</th>
										<th scope="col">Tác giả</th>
										<th scope="col">Tiêu đề</th>
										<th scope="col">Loại</th>
										<th scope="col">Địa chỉ</th>
										<th scope="col">Ngày phản ánh</th>
										<th scope="col">Handle</th>
										<th scope="col">Duyệt</th>
										<th scope="col">Chi tiết</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($allReflects as $reflectId => $reflectData) {
										$timestamp = $reflectData['createdAt'];
										$date = date('d-m-Y H:i:s', $timestamp / 1000);
									?>
										<tr style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $reflectId ?></td>
											<td style="text-align: center;"><?= $reflectData['email']; ?></td>
											<td style="text-align: center;"><?= $reflectData['title']; ?></td>
											<!-- == 1: Đã xử lý
												== 0: Đang xử lý
											-->
											<td style="text-align: center;"><?= $reflectData['category_name']; ?></td>
											<td style="text-align: center;"><?= $reflectData['address']; ?></td>
											<td style="text-align: center;"><?= $date; ?></td>
											<?php if ($reflectData['handle'] == 1) {?>
												<td style="text-align: center;">Đã xử lý</td>
											<?php } else { ?>
												<td style="text-align: center;">Đang xử lý</td>
											<?php } ?>

											<?php if ($reflectData['accept']) {?>
												<td style="text-align: center;">
													<i class="bi bi-check"></i>
												</td>
											<?php } else {?>
											<td style="text-align: center;">
											<button type="button" class="btn btn-danger">Duyệt</button>
											</td>
											<?php } ?>
											<td style="text-align: center;"><a href="">Xem</a></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
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

	</body>

	</html>