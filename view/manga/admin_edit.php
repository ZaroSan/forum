<div class="page-header">
	<h1>Editer un manga</h1>
</div>
<form action="<?php echo Router::url('admin/manga/edit/'.$id); ?>" method="post" id="formulaireAjout">
<!--<form action="javascript:void(0)" onsubmit="post('Manga','admin_edit')" method="post" id="formulaireAjout">-->
	<?php echo $this->Form->input('id','hidden'); ?>
	<?php echo $this->Form->input('name','Titre',array('class'=>'col-sm-8'),true); ?>
	<?php echo $this->Form->input('slug','Url',array('class'=>'col-sm-8'),true); ?>
	<?php echo $this->Form->input('sumary','Résumé',array('type'=>'textarea','class'=>'col-sm-12','placeholder'=>'Entrer un résumé convainquant'),true); ?>
	
	<?php echo $this->Form->input('edit','Editeur',array('class'=>'col-sm-8'),true); ?>
	<?php echo $this->Form->input('number','Nombre de tome',array('type'=>'number','class'=>'col-sm-3','min'=>'0','step'=>'1','placeholder'=>'Nombre d\'ouvrages'),true); ?>
	
	<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	<?php echo $this->Form->input('current','Fini',array('type'=>'checkbox')); ?>
	<div class="form-group row">
		<label for="inputCategory" class="col-sm-3 col-form-label text-right">
			Categorie
		</label>
		<div class="col-sm-9">
			<select id="inputCategory" name="category">
				<option value="" selected disabled hidden>...</option>
				<?php foreach ($categories as  $value) {
					# code...
					echo '<option value="'.$value->id.'"';
					if($value->id == $data->category){
						echo 'selected="selected"';
					}
					echo '>'.$value->name.'</option>';
				}?>
			</select>
		</div>
	</div>
	<div class="actions">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>