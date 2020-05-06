<div class="page-header">
	<h1>Editer un article</h1>
</div>
<form action="<?php echo Router::url('admin/post/edit/'.$id); ?>" method="post">
	<?php echo $this->Form->input('id','hidden'); ?>
	<?php echo $this->Form->input('support','Support',array('type'=>'select','class'=>'col-sm-8','options'=>($select))); ?>
	<?php echo $this->Form->input('name','Titre',array('class'=>'col-sm-8')); ?>
	<?php echo $this->Form->input('slug','Url',array('class'=>'col-sm-8')); ?>
	<?php echo $this->Form->input('content','Contenu',array('type'=>'textarea','class'=>'col-sm-12')); ?>
	<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	<div class="actions">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>