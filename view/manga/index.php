<div class="row mt-2	">
	<div class="col-sm-12">
		<?php foreach ($mangas as $key => $value): ?>
			<div class="row row-hover">
				<div class="col col-sm-2">
					<img src="https://dummyimage.com/60x60/fff/000000" class="img-thumbnail rounded float-right">
				</div>
				<div class="col col-sm-10">
					<h5 class="header"><a class="" href="<?php echo Router::url("manga/view/id:{$value->id}/slug:{$value->slug}"); ?>"><?php echo $value->name;?></a></h5>
					<p><?php echo $value->sumary;?></p>
				</div>
				
			</div>
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
