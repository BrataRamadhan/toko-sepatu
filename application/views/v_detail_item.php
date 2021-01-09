<!-- Default box -->
<div class="card card-solid">
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-6">
				<h3 class="d-inline-block d-sm-none"><?php echo $item->item ?></h3>
				<div class="col-12">
					<img src="<?php echo base_url('assets/image/' . $item->photo) ?>" class="product-image" alt="Product Image">
				</div>
				<!-- <div class="col-12 product-image-thumbs">
					<div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
					<div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
					<div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
					<div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
					<div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
				</div> -->
			</div>
			<div class="col-12 col-sm-6">
				<h3 class="my-3"><?php echo $item->item ?></h3>
				<h4>Kategori : <?php echo $item->nama_kategori ?></h4>


				<div class="bg-gray py-2 px-3 mt-4">
					<h2 class="mb-0">
						Rp.<?php echo number_format($item->price, 0) ?>
					</h2>
				</div>

				<div class="mt-4">
					<div class="btn btn-primary btn-lg btn-flat">
						<i class="fas fa-cart-plus fa-lg mr-2"></i>
						Add to Cart
					</div>
				</div>


			</div>
		</div>
		<div class="row mt-4">
			<nav class="w-100">
				<div class="nav nav-tabs" id="product-tab" role="tablist">
					<a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
				</div>
			</nav>
			<div class="tab-content p-3" id="nav-tabContent">
				<div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> <?php echo $item->description ?></div>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
</div>