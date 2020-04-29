<div class="container">
	<h1>HOME</h1>
	<?php print_r($result) ?>
	<?php foreach ($result as $key => $r) { 
		echo $r['username'];
	}
	?>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<div class="row">
				<?php foreach ($recipe as $recipeKey => $recipe) { ?>
					<div class="col-md-3">
						<div class="card" style="width: 100%">
							<img class="card-img-top" src="<?php echo BASE . '/assets/images/uploads/image/' . $recipe['image'] ?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?php echo $recipe["title"] ?></h5>
								<p class="card-text">Rp. <?php echo $recipe["price"] . ",00"?></p>
								<a href="#" class="btn btn-primary">Beli</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
