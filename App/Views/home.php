<div class="container">
	<h1>HOME</h1>
	<?php print_r($result) ?>
	<?php foreach ($result as $key => $r) { 
		echo $r['username'];
	}
	?>
</div>
