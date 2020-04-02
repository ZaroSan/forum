<?php
/**
 * 
 */
class PageController extends Controller{
	
	function index(){
		
	}

	function view($id){
		$this->loadModel('Post');
		$d['page']=$this->Post->findFirst(array(
			'conditions'=> array(
				'id'=>$id,
				'type'=>'page',
				'online'=>1)));
		if(empty($d['page'])){
			$this->e404('Page introuvable');
		}
		/*$d['pages'] = $this->Post->find(array(
			'conditions' => array('type'=>'page')));*/

		$this->set($d);
	}

	function getMenu(){
		$this->loadModel('Post');
		return $this->Post->find(array(
			'conditions' => array('type'=>'page', 'online'=>1)));
	}
}