<div class="container mt-5">

	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<img src="<?php echo BASE . "/assets/images/uploads/image/" . $result['image'] ?>" width="100%">
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="card p-2">
				<table class="mb-3">
					<tr><td>Nama Makanan</td><td>:</td><td><?php echo $result["title"] ?></td></tr>
					<tr><td>Asal</td><td>:</td><td><?php echo $result["tagName"] ?></td></tr>
					<tr><td>Author</td><td>:</td><td><?php echo $result["name"] ?></td></tr>
					<tr><td>Harga</td><td>:</td><td><?php echo $result["price"] ?></td></tr>
					
				</table>
				<div class="mb-3">
					<?php echo $result["description"] ?>
				</div>
				
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $result['tagName'] ?>">Beli Resep</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pembelian Resep</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Masukan Nama:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Masukan No Rekening:</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Beli</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var recipient = button.data('whatever')
		console.log(button.data('whatever'))

		var modal = $(this)
		// modal.find('.modal-title').text('New message to ' + recipient)
		// modal.find('.modal-body input').val(recipient)
	})
</script>