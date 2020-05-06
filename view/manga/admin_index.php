<div class="page-heard">
	<h1><?php echo $total; ?> Mangas</h1>
</div>
<div class="row">
	<div class="col-sm-1 mt-2">
		<a class="btn btn-primary" href="<?php echo Router::url('admin/manga/edit');?>">Ajouter</a>
	</div>
	<div class="col-sm-11">
		<input type="text" id="myInput" onkeyup="myFunction(2)" placeholder="Rechercher par titre ..." class="col-sm-12">
	</div>
</div>

<table class="table table-hover table-sm" id="myTable">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">En ligne</th>
			<th scope="col">Titre</th>
			<th scope="col">Url</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody id="liste">

		
	</tbody>
</table>
<div class="row mb-2">
	<a class="btn btn-primary" href="<?php echo Router::url('admin/manga/edit');?>">Ajouter</a>
</div>
<!--<div class="row">
	<nav aria-label="Page navigation example">
	  <ul class="pagination">
	  	<?php for($i=1; $i<=$page;$i++): ?>
	    <li class="page-item  <?php if($i==$this->request->page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	    <?php endfor; ?>    
	  </ul>
	</nav>
</div>-->
<script type="text/javascript" src="<?php echo Router::webroot('ajax/mangaAjax.js');?>"></script>