<?php
class Post extends Model{
	/*
	*faisable mais pas pratique, attention au pluriel compliqué
	*/
	public $table ='posts';
	public $validate=array(
		'name'=>array(
			'rule'=>'notEmpty',
			'message'=>'vous devez précisez un titre'
		),
		'slug'=>array(
			'rule'=>'([a-z0-9\-]+)',
			'message'=>"l'url n'est pas valide"
		)
	);


}
?>