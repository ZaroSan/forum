<div class="page-heard">
	<h1><?php echo $total; ?> Mangas</h1>
</div>
<table class="table ">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">En ligne</th>
			<th scope="col">Titre</th>
			<th scope="col">Url</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($mangas as $key => $value): ?>
			<tr>
				<td><?php echo $value->id; ?></td>
				<td><a href="<?php echo Router::url('admin/manga/toggleOnline/'.$value->id); ?>" class="btn btn-<?php  echo($value->online==1)?'success':'warning'; ?>"><?php  echo($value->online==1)?'En ligne':'Hors-ligne'; ?></a></td>
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->slug; ?></td>
				<td>
					<div class="btn-group">
						<a class="btn btn-outline-success" href="<?php echo Router::url('admin/manga/edit/'.$value->id); ?>">Editer</a>
						<a class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer?')" href="<?php echo Router::url('admin/manga/delete/'.$value->id); ?>">Supprimer</a>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a class="btn btn-primary" href="<?php echo Router::url('admin/manga/edit');?>">Ajouter</a>