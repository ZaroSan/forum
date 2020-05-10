<div class="page-header mt-3">
	<h1>Vous devez être connecter</h1>
	<form action="<?php echo(Router::url('user/login'))?>" method="post">
		<?php echo $this->Form->input('login','Identifiant',array('class'=>'col-sm-8'),true); ?>
		<?php echo $this->Form->input('password','Mot de passe',array('type'=>'password','class'=>'col-sm-8')); ?>
		<div class="action col-sm-3 offset-sm-2">
			<input type="submit" class="btn btn-success" value="Se connecter">
		</div>
	</form>
</div>