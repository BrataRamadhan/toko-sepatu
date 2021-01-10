<div class="card card-solid">
	<div class="card-body pb-0">
		<div class="row">
			<div class="col-sm-12"></div>
			<?php echo form_open('shooping/update'); ?>

			<table class="tbl table-bordered" cellpadding="6" cellspacing="1" style="width:100%">

				<tr>
					<th>QTY</th>
					<th>Nama Barang</th>
					<th style="text-align:right">Harga</th>
					<th style="text-align:right">Total Belanja</th>
				</tr>

				<?php $i = 1; ?>

				<?php foreach ($this->cart->contents() as $items) : ?>

					<tr>
						<td><?php echo form_input(array(
								'name' => $i . '[qty]',
								'value' => $items['qty'],
								'maxlength' => '3',
								'size' => '5',
								'type' => 'number',
								'class' => 'form-control'
							)); ?>
						</td>
						<td><?php echo $items['name']; ?></td>
						<td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
						<td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>

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
					<td colspan="2"> </td>
					<td class="right"><strong>Total</strong></td>
					<td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
				</tr>

			</table>

			<p><?php echo form_submit('', 'Update your Cart'); ?></p>
		</div>
	</div>
</div>
</div>
