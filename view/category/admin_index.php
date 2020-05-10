<div class="page-heard">
	<h1  id='total'><?php echo $total; ?> Catégories</h1>
</div>
<div class="row mb-2 ml-1">
	<form action="javascript:void(0)" onsubmit="postCategory()" method="post" id="formulaireAjout">
		<input class="col-sm-12" placeholder="Ajouter une catégorie" required="" type="text" name="name" id="inputname" value="">
	</form>
</div>
<table class="table table-hover table-sm" id="myTable">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Categorie</th>
			<th scope="col">Actions</th>
			
		</tr>
	</thead>
	<tbody id="liste">

		
	</tbody>
</table>


<script type="text/javascript" src="<?php echo Router::webroot('ajax/categoryAjax.js');?>"></script>
<script type="text/javascript">
	window.onload = function() {
		reloadListAdmin();
	}

</script>