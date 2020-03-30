<?php 
class Model{

	public $db='default';


	function __construct(){
		$conf=Conf::$databases[$this->db];
	}
	public function find(){

	}
}
?>