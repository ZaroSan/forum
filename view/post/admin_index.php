<div class="page-heard">
	<h1><?php echo $total; ?> Articles</h1>
</div>
<table class="table ">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">En ligne</th>
			<th scope="col">Titre</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $key => $value): ?>
			<tr>
				<td><?php echo $value->id; ?></td>
				<td><span class="btn btn-<?php  echo($value->online==1)?'success':'warning'; ?>"><?php  echo($value->online==1)?'En ligne':'Hors-ligne'; ?></span></td>
				<td><?php echo $value->name; ?></td>
				<td>
					<a href="<?php echo Router::url('admin/post/edit/'.$value->id); ?>">Editer</a>
					<a onclick="return confirm('Voulez-vous vraiment supprimer?')" href="<?php echo Router::url('admin/post/delete/'.$value->id); ?>">Supprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<a class="btn btn-primary" href="<?php echo Router::url('admin/post/edit');?>">Ajouter</a>