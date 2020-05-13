<div class="mt-5 alert alert-dark">
	<h3 class="alert-heading">Les actualités sur les mangas et la japanimation</h3>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<?php foreach ($posts as $key => $value): ?>
			<div class="row row-hover">
				<div class="col col-sm-2">
					<img src="https://dummyimage.com/60x60/fff/000000" class="img-thumbnail rounded float-right">
				</div>
				<div class="col col-sm-10">
					<h5 class="header"><a class="" style="color:black" href="<?php echo Router::url("post/view/id:{$value->id}/slug:{$value->slug}"); ?>"><?php echo $value->name;?></a></h5>
					<p><?php echo $value->content;?></p>
				</div>
				
			</div>
			<hr>
		<?php endforeach ?>
	</div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<?php for($i=1; $i<=$page;$i++): ?>
    <li class="page-item  <?php if($i==$this->request->page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>    
  </ul>
</nav>

