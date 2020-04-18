<div class="page-heard">
	<h1><?php echo $total; ?> Animés</h1>
</div>
<input type="text" id="myInput" onkeyup="myFunction(2)" placeholder="Rechercher par titre ..." class="col-sm-12">
<table class="table table-hover table-sm" id="myTable">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">En ligne</th>
			<th scope="col">Titre</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($animes as $key => $value): ?>
			<tr>
				<td><?php echo $value->id; ?></td>
				<td><a href="<?php echo Router::url('admin/anime/toggleOnline/'.$value->id); ?>" class="btn btn-<?php  echo($value->online==1)?'success':'warning'; ?>"><?php  echo($value->online==1)?'En ligne':'Hors-ligne'; ?></a></td>
				<td><?php echo $value->name; ?></td>
				<td>
					<div class="btn-group">
						<a class="btn btn-outline-success" href="<?php echo Router::url('admin/anime/edit/'.$value->id); ?>">Editer</a>
						<a class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer?')" href="<?php echo Router::url('admin/anime/delete/'.$value->id); ?>">Supprimer</a>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a class="btn btn-primary" href="<?php echo Router::url('admin/anime/edit');?>">Ajouter</a>