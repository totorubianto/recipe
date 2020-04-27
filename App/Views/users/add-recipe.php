

<div class="container mt-5">
	<form action="<?php echo BASE . 'index/action_save_recipe'?>" method="post">
		<div>
			<label for="basic-url">Masukan cover gambar</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile02">
					<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
				</div>
			</div>
		</div>
		<label for="basic-url">Masukan langkah langkah</label>
		<textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
		<div class="mt-3">
			<input type="submit" class="btn btn-primary" value="Simpan">
		</div>	
	</form>
</div>

<script>
	CKEDITOR.replace( 'editor1' )
</script>
<script>
	$('#inputGroupFile02').on('change',function(){
		var fileName = $(this).val();
		$(this).next('.custom-file-label').html(fileName);
	})
</script>