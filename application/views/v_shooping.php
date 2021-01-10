<div class="card card-solid">
	<div class="card-body pb-0">
		<div class="row">
			<div class="col-sm-12">
				<?php echo form_open('shooping/update'); ?>

				<table class="tbl table-bordered" cellpadding="6" cellspacing="1" style="width:100%">

					<tr>
						<th>QTY</th>
						<th>Nama Barang</th>
						<th style="text-align:right">Harga</th>
						<th style="text-align:right">Total Belanja</th>
						<th style="text-align:center;">Action</th>
					</tr>

					<?php $i = 1; ?>

					<?php foreach ($this->cart->contents() as $items) : ?>

						<tr>
							<td><?php echo form_input(array(
									'name' => $i . '[qty]',
									'value' => $items['qty'],
									'maxlength' => '3',
									'min' => '0',
									'size' => '5',
									'type' => 'number',
									'class' => 'form-control'
								)); ?>
							</td>
							<td><?php echo $items['name']; ?></td>
							<td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
							<td style="text-align:right">Rp<?php echo $this->cart->format_number($items['subtotal']); ?></td>
							<td class="text-center">
								<a href="<?php echo base_url('shooping/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
							</td>

							<?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

								<p>
									<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>

										<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

									<?php endforeach; ?>
								</p>

							<?php endif; ?>

							</td>
						</tr>

						<?php $i++; ?>

					<?php endforeach; ?>

					<tr>
						<td colspan="3"> </td>
						<td class="right" style="text-align:center;"><strong>Total</strong></td>
						<td class="" style="text-align:center;">
							<h3>Rp:<?php echo $this->cart->format_number($this->cart->total()); ?></h3>
						</td>
					</tr>
				</table>
				<br>
				<button type="submit" class="btn btn-success">Update Cart</button>
				<a href="#" class="btn btn-success"><i class="fas fa-check"></i> Check Out</a>

				<?php form_close() ?>
			</div>
		</div>
	</div>
</div>
