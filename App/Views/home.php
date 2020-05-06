<div class="container">
	<h1>HOME</h1>
	
	<div class="row">
		<div class="col-md-3">
			<form method="get" action="<?php BASE."/index/index" ?>">
				<?php foreach ($tag as $ktag => $tag) { ?>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" value="<?php echo $tag['id'] ?>" name="category[]" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1"><?php echo $tag['tagName'] ?></label>
					</div>
				<?php } ?>
				
				<input class="btn btn-primary w-100" type="submit" name="" value="filter">
			</form>
		</div>
		<div class="col-md-9">
			<div class="row">
				<?php foreach ($recipe as $recipeKey => $recipe) { ?>
					<div class="col-md-4">
						<div class="card" style="width: 100%">
							<img class="card-img-top" src="<?php echo BASE . '/assets/images/uploads/image/' . $recipe['image'] ?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?php echo $recipe["title"] ?></h5>
								<p class="card-text">
									<b>Rp. <?php echo $recipe["price"] . ",00"?> </b><br>
									<?php echo $recipe["description"]?>
								</p>
								
								<a href="<?php echo BASE . "/recipe/transaction?id=" . $recipe['id'] ?>" class="btn btn-primary">Beli</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
