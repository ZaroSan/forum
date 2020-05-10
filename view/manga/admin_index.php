<div class="page-heard">
	<h1 id='total'><?php echo $total; ?> Mangas</h1>
</div>
<div class="row">
	<div class="col-sm-1 mt-2">
		<a class="btn btn-primary" href="<?php echo Router::url('admin/manga/edit');?>">Ajouter</a>
	</div>
	<div class="col-sm-11">
		<input type="text" id="myInput" onkeyup="reloadListAdmin()" placeholder="Rechercher par titre ..." class="col-sm-12">
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
<div class="row" >
	<nav aria-label="Page navigation example">
	<div id="pagination">
	</div>
	</nav>
</div>
<script type="text/javascript" src="<?php echo Router::webroot('ajax/mangaAjax.js');?>"></script>
<script type="text/javascript">
	window.onload = function() {
		reloadListAdmin();
	}
</script>