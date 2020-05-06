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
	<div class="actions">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>