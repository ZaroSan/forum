<?php
class Request{


	public $url;
	public $page =1;
	public $prefix=false;
	public $data=false;
	public $search=false;
	function __construct(){
		$this->url=isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
		if(isset($_GET['page'])){
			if(is_numeric($_GET['page'])){
				if($_GET['page'] >0){
					$this->page=round($_GET['page']);
				}
				
			}
		}
		if(isset($_GET['search'])){
			if($_GET['search'] !== ''){
				$this->search=$_GET['search'];
			}
			else{
				$this->search=false;
			}
		}
		if(!empty($_POST)){
			$this->data=new stdClass();
			foreach ($_POST as $key => $value) {
				# code...
				$this->data->$key=$value;
			}
			debug($this->data);
		}

	}

}
?>