<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Kategori</h3>

			<div class="card-tools">
				<button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary"><i class="fas fa-plus"></i>
				</button>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">

			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-info"></i> Success!</h5>';
				echo $this->session->flashdata('pesan');
				echo '</div>';
			}
			?>

			<table class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					foreach ($data as $user => $value) { ?>
						<tr class="text-center">
							<td><?php echo $no++ ?></td>
							<td><?php echo $value->nama_kategori ?></td>
							<td>
								<button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $value->id_kategori ?>">
									<i class="fas fa-edit"></i>
								</button>
								<a href="<?= base_url(); ?>Kategori/delete/<?= $value->id_kategori ?>" onclick="return confirm('yakin?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>

<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Kategori</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
				echo form_open('kategori/add');
				?>
				<div class="form-group">
					<label for="">Nama Kategori</label>
					<input type="text" class="form-control" id="" name="nama_kategori" required>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			<?php
			echo form_close();
			?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<?php foreach ($data as $user => $value) { ?>
	<div class="modal fade" id="edit<?php echo $value->id_kategori ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
					echo form_open('kategori/edit', array('method' => 'post'));

					?>
					<input type="hidden" class="form-control" name="id_kategori" value="<?= $value->id_kategori ?>">
					<div class="form-group">
						<label for="">Nama User</label>
						<input type="text" class="form-control" id="" name="nama_kategori" required>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				<?php
				echo form_close();
				?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>
