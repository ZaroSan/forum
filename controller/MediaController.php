<?php
class MediaController extends Controller{
	public function admin_index($id){
		$this->loadModel('Media');
	}
}
?>