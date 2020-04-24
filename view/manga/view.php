<?php echo debug($manga); ?>
<div class="mt-5 alert alert-dark">
	<h5><?php echo ucfirst($manga->name); ?></h5>
</div>
<div class="row">
	<div class="col-3">
		<img src="https://dummyimage.com/500x700/fff/000000" class="img-thumbnail rounded float-left">
	</div>
	<div class="col-5">
		<ul class="list-group list-group-flush">
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Type :</strong><?php echo($manga->support);?></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Résumé :</strong><?php echo($manga->sumary);?></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Editeur :</strong><?php echo($manga->edit);?></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Nombre de tomes :</strong><?php echo($manga->number);?></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Catégorie :</strong></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Année :</strong></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Genre :</strong></li>
			<li class="list-group-item list-group-item-dark"><strong class="mr-1">Public :</strong></li>

		</ul>
	</div>
</div>
