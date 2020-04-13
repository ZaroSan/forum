<div class="mt-5 alert alert-dark">
	<h3 class="alert-heading">Les actualités sur les mangas et la japanimation</h3>
</div>
<hr>
<div class="d-flex align-content-start flex-wrap">
	<?php foreach ($posts as $key => $value): ?>
		<div class="col mb-4">
			<div class="card border-dark h-100" style="max-width: 18rem;" title="Created <?php echo $value->created;?>">
				<div class="card-header">
					<h5 class="card-title"><?php echo $value->name;?></h5>
				</div>
				<div class="card-body text-dark">
					<p class="card-text"><?php echo $value->content;?></p>
					
				</div>
				<div class="card-footer">
					<a class="btn btn-outline-dark btn-sm float-right" href="<?php echo Router::url("post/view/id:{$value->id}/slug:{$value->slug}"); ?>">Lire la suite &rarr;</a>
			     
			    </div>
			</div>
		</div>
	<?php endforeach ?>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<?php for($i=1; $i<=$page;$i++): ?>
    <li class="page-item  <?php if($i==$this->request->page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>    
  </ul>
</nav>

