<!-- Default box -->
<div class="card card-solid">
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-6">
				<h3 class="d-inline-block d-sm-none"><?php echo $item->item ?></h3>
				<div class="col-12">
					<img src="<?php echo base_url('assets/image/' . $item->photo) ?>" class="product-image" alt="Product Image">
				</div>
			</div>
			<div class="col-12 col-sm-6">
				<h3 class="my-3"><?php echo $item->item ?></h3>
				<h4>Kategori : <?php echo $item->nama_kategori ?></h4>
				<h4><?php echo $item->description ?></h4>
				<div class="bg-gray py-2 px-3 mt-4">
					<h2 class="mb-0">
						Rp.<?php echo number_format($item->price, 0) ?>
					</h2>
				</div>
				<hr>

				<form action="<?php echo base_url('shooping/add') ?> " method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?php echo $item->id_item ?>">
					<input type="hidden" name="price" value="<?php echo $item->price ?>">
					<input type="hidden" name="name" value="<?php echo $item->item  ?>">
					<input type="hidden" name="redirect_page" value="<?php echo str_replace('index.php/', '', current_url()); ?>">

					<div class="mt-4">
						<div class="row">
							<div class="col-sm-2">
								<input type="number" name="qty" class="form-control" min="1" value="1">
							</div>
							<div class="col-sm-8">
								<button type="submit" class="btn btn-primary swalDefaultSuccess">
									<i class="fas fa-cart-plus fa-lg mr-2"></i>
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
</div>
<script src="<?php echo base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>template/dist/js/demo.js"></script>
<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Pesanan Berhasil Masuk di Keranjang.'
			})
		});
	});
</script>
