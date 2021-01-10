<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol> -->
<div class="carousel-inner">

	<!-- <div class="carousel-item active">
				  <img class="d-block w-100" src="<?php base_url() ?>assets/sneakers.png" alt="First slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block w-100" src="<?php base_url() ?>assets/shoes1.png" alt="Second slide">
				</div>
				<div class="carousel-item">
				  <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
				</div> -->
	<div>
		<img class="d-block w-100" src="<?php echo base_url() ?>assets/sneakers.png">
	</div>
</div>
<br>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
</a>
</div>

<div class="card card-solid">
	<div class="card-body pb-0">
		<div class="row d-flex align-items-stretch">
			<?php foreach ($item as $key => $value) { ?>


				<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
					<div class="card bg-light">
						<div class="card-header text-muted border-bottom-0">
							<h2 class="lead"><b><?php echo $value->item ?></b></h2>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-7">
									<p class="text-muted text-sm"><b>Kategori: </b><?php echo $value->nama_kategori ?></p>
								</div>
								<div class="col-5 text-center">
									<img src="<?php echo base_url('assets/image/' . $value->photo) ?>" alt="" class="img-fluid" width="200px">
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="text-left">
										<h4><span class="badge bg-primary">Rp:<?php echo number_format($value->price, 0) ?></span></h4>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="text-right">
										<a href="#" class="btn btn-sm btn-success">
											<i class="fas fa-eye"></i>
										</a>
										<a href="<?php echo base_url('shooping/add') ?>" class="btn  btn-primary">
											<i class="fas fa-shopping-cart">Add</i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
