<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
	<div class="container">
		<a href="<?php echo base_url() ?>" class="navbar-brand">
			<span>kelompok magang</span>
		</a>

		<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse order-3" id="navbarCollapse">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?php echo base_url() ?>" class="nav-link">Home</a>
				</li>
				<?php $kategori = $this->m_home->getDataKategori(); ?>

				<li class="nav-item dropdown">
					<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
					<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
						<?php foreach ($kategori as $key => $value) { ?>
							<li><a href="<?php echo base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?php echo $value->nama_kategori ?> </a></li>
						<?php	} ?>

					</ul>
				</li>
			</ul>

			<!-- Level three dropdown-->


			<!-- SEARCH FORM -->

			<!-- Right navbar links -->
			<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item">
					<?php if ($this->session->userdata('email') == "") { ?>
						<a class="nav-link" href=" <?php echo base_url('pelanggan/login') ?>">Login
							</span>
						</a>
					<?php } else { ?>
						<a class="nav-link" data-toggle="dropdown" href="#">
							<span class="brand-text font-weight-light"><?php echo $this->session->userdata('nama_pelanggan') ?></span>
							<!-- <img src="<?php echo base_url('assets/foto/' . $this->session->userdata('foto')) ?>" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url('pelanggan/akun') ?>" class="dropdown-item">
								<i class="fas fa-user mr-2"></i> Akun Saya
								<!-- <span class="float-right text-muted text-sm">3 mins</span> -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-shopping-cart mr-2"></i> Pesanan Saya
								<!-- <span class="float-right text-muted text-sm">3 mins</span> -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Log out</a>
						</div>
					<?php } ?>
				</li>

				<?php $keranjang = $this->cart->contents();
				$jml_item = 0;
				foreach ($keranjang as $key => $value) {
					$jml_item = $jml_item + $value['qty'];
				}
				?>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fas fa-shopping-cart"></i>
						<span class="badge badge-danger navbar-badge"><?php echo $jml_item ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<?php if (empty($keranjang)) { ?>
							<a href="#" class="dropdown-item">
								<p>Keranjang kosong</p>
							</a>
							<?php } else {
							foreach ($keranjang as $key => $value) {
								$item = $this->m_home->detailItem($value['id']);

							?>
								<a href="#" class="dropdown-item">
									<div class="media">
										<img src="<?php echo base_url('assets/image/' . $item->photo) ?>" alt="User Avatar" class="img-size-50 ">
										<div class="media-body">
											<h3 class="dropdown-item-title">
												<?php echo $value['name'] ?>
											</h3>
											<p class="text-sm"><?php echo $value['qty'] ?> X <?php echo $value['price'] ?></p>
											<p class="text-sm text-muted"><i class="far fa-calculator"></i><?php echo $this->cart->format_number($value['subtotal']) ?></p>
										</div>
									</div>
								</a>
								<div class="dropdown-divider"></div>
							<?php } ?>
							<a href="#" class="dropdown-item">
								<div class="media">
									<div class="media-body">
										<tr>
											<td colspan="2"> </td>
											<td class="right"><strong>Total</strong></td>
											<td class="right">Rp<?php echo $this->cart->format_number($this->cart->total()); ?></td>
										</tr>
									</div>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url('shooping') ?>" class="dropdown-item dropdown-footer">Check Out</a>
							<!-- <a href="<?php echo base_url('shooping/viewCart') ?>" class="dropdown-item dropdown-footer">View Cart</a> -->
						<?php } ?>

					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
			</ul>
		</div>
</nav>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<div class="content">
		<div class="container">
