<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Item</h3>

			<div class="card-tools">
				<a href="<?php echo base_url('item/add') ?>" type="button" class="btn btn-primary"><i class="fas fa-plus"></i>
				</a>
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
						<th>Nama Barang</th>
						<th>Harga</th>
						<!-- <th>Description</th> -->
						<th>Kategori</th>
						<th>photo</th>
						<th>Lain-Lain</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					foreach ($data as $user => $value) { ?>
						<tr class="text-center">
							<td><?php echo $no++ ?></td>
							<td><?php echo $value->item ?></td>
							<td>Rp.<?php echo number_format($value->price, 0) ?></td>
							<!-- <td><?php echo $value->description ?></td> -->
							<td><?php echo $value->nama_kategori ?></td>
							<td>
								<img src="<?php echo base_url('assets/image/' . $value->photo) ?>" width="100px" alt="">
							</td>
							<td>
								<a href="<?php echo base_url('item/edit/' . $value->id_item) ?>" class="btn btn-primary">
									<i class="fas fa-edit"></i>
								</a>
								<a href="<?php echo base_url(); ?>Item/delete/<?= $value->id_item ?>" onclick="return confirm('yakin?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
				<h4 class="modal-title">Add User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
				echo form_open('user/add');
				?>
				<div class="form-group">
					<label for="">Nama User</label>
					<input type="text" class="form-control" id="" name="nama_user" required>
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" id="" name="username" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="text" class="form-control" id="" name="password" required>
				</div>
				<div class="form-group">
					<label for="">Level User</label>
					<select name="level_user" id="" class="form-control">
						<option value="1" selected>Admin</option>
						<option value="2">User</option>
					</select>
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
