<?php
/**
 * 
 */
class PageController extends Controller{
	
	function index(){
		
	}

	function view($id){
		$this->loadModel('Post');
		$post=$this->Post->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		if(empty($post)){
			$this->e404('Page introuvable');
		}
		$this->set('post',$post);
	}
}