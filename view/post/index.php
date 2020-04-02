<?php foreach ($posts as $key => $value): ?>
	<div class="header">
		<h1><?php echo $value->name;?></h1>
	</div>
	<p><?php echo $value->content;?></p>
	<a class="btn btn-primary " href="<?php echo Router::url("post/view/id:{$value->id}/slug:{$value->slug}"); ?>">Lire la suite &rarr;</a>
<?php endforeach ?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<?php for($i=1; $i<=$page;$i++): ?>
    <li class="page-item <?php if($i==$this->request->page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>    
  </ul>
</nav>

