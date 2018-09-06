<div>
	<?php if (isset($_SESSION['is_logged_in'])): ?> 
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
	<?php endif; ?>
		<br><br>
	<?php foreach ($viewmodel as $item): ?>
		<div class="card card-body bg-light">
			<?php echo $item['title']; ?>
			<small><?php echo $item['create_date']; ?></small>
				<hr>
			<p><?php echo $item['body']; ?></p>
				<br>
				<div>
			<a type="button" class="btn btn-light" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>	
				</div>
		</div><br>
	<?php endforeach; ?>
</div>