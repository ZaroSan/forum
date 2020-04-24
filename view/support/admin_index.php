<div class="page-heard">
	<h1><?php echo $total; ?> Supports</h1>
</div>
<div class="row">
	<div class="col-sm-1 mt-2 mb-1">
		<a class="btn btn-primary" href="<?php echo Router::url('admin/support/edit');?>">Ajouter</a>
	</div>
</div>
<table class="table table-hover table-sm" id="myTable">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Type</th>
			<th scope="col">Name</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($support as $key => $value): ?>
			<tr>
				<td><?php echo $value->id; ?></td>
				<td><?php echo $value->type; ?></td>
				<td><?php echo $value->name; ?></td>
				<td>
					<div class="btn-group">
						<a class="btn btn-outline-success" href="<?php echo Router::url('admin/support/edit/'.$value->id); ?>">Editer</a>
						<a class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer?')" href="<?php echo Router::url('admin/support/delete/'.$value->id); ?>">Supprimer</a>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>