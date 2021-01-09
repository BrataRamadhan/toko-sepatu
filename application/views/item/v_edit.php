<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Update Item</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			echo validation_errors('<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-info"></i>', '</h5> </div>');
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
			}
			echo form_open_multipart('item/edit/' . $item->id_item) ?>
			<div class="form-group">
				<label>Item</label>
				<input class="form-control" name="item" value="<?php echo $item->item ?>"></input>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" name="price" value="<?php echo $item->price ?>"></input>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Kategori</label>
						<select name="id_kategori" class="form-control">
							<option value="<?php echo $item->id_kategori ?>"><?php echo $item->nama_kategori ?></option>
							<?php foreach ($data as $key => $value) { ?>
								<option value="<?php echo $value->id_kategori ?>"><?php echo $value->nama_kategori ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description" rows="10" value=""><?php echo $item->description ?></textarea>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Photo</label>
						<input type="file" name="photo" class="form-control" id="preview_gambar">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<img src="<?php echo base_url('assets/image/' . $item->photo) ?>" id="gambar_load" width="400px">
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
				<a href="<?php echo base_url('item') ?>" class="btn btn-success btn-sm">Kembali</a>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#preview_gambar").change(function() {
		bacaGambar(this)
	})
</script>
