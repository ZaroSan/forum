<div class="page-header">
	<h1>Editer un support</h1>
</div>

<form action="<?php echo Router::url('admin/support/edit/'.$id); ?>" method="post">
	<?php echo $this->Form->input('id','hidden'); ?>
	<?php echo $this->Form->input('type','Type',array('class'=>'col-sm-8')); ?>
	<?php echo $this->Form->input('name','Name',array('class'=>'col-sm-8')); ?>
	<div class="actions">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>