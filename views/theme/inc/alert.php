<?php if ($_SESSION['result']) : ?>
	<div class="alert alert-<?=$_SESSION['result']['class']?> alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
		<?=$_SESSION['result']['msg']?>
	</div>
<?php endif; ?>