<div class="page-header">
	<h1>Editer un manga</h1>
</div>

<form action="javascript:void(0)" method="post" id="formulaireAjout" onsubmit="ajouter()">
	<?php echo $this->Form->input('id','hidden'); ?>
	<?php echo $this->Form->input('name','Titre',array('class'=>'col-sm-8')); ?>
	<?php echo $this->Form->input('slug','Url',array('class'=>'col-sm-8')); ?>
	<?php echo $this->Form->input('sumary','Résumé',array('type'=>'textarea','class'=>'col-sm-12')); ?>
	
	<?php echo $this->Form->input('edit','Editeur',array('class'=>'col-sm-8')); ?>
	<?php echo $this->Form->input('number','Nombre de tome',array('type'=>'number','class'=>'col-sm-1','min'=>'0','step'=>'1')); ?>
	
	<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	<?php echo $this->Form->input('current','Fini',array('type'=>'checkbox')); ?>
	<div class="actions">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>