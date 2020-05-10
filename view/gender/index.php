<div class="page-heard">
	<h1  id='total'><?php echo $total; ?> Genres</h1>
</div>
<div class="d-flex flex-wrap">
  
	<?php foreach ($gender as $key => $value): ?>
		<span class="badge badge-secondary p-2 m-1"><a class="" href="<?php echo Router::url("gender/view/{$value->id}"); ?>" style="color:white"><?php echo $value->name;?></a> </span>
	<?php endforeach ?>
</div>