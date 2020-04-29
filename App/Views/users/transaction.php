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
				description <?php echo $result["description"] ?>
				<button class="btn btn-primary">Beli</button>	
			</div>
		</div>
	</div>
</div>