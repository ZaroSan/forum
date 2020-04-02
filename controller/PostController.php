<?php
/**
 * 
 */
class PostController extends Controller{
	
	function index(){
		$this->loadModel('Post');
		$perPage=3;


		$conditions=array(
				'type'=>'post',
				'online'=>1);
		$d['posts']=$this->Post->find(array(
			'conditions'=> $conditions,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
		$d['total']=$this->Post->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		$this->set($d);


	}

	function view($id){
		$this->loadModel('Post');
		$conditions=array(
				'id'=>$id,
				'type'=>'post',
				'online'=>1);

		$d['page']=$this->Post->findFirst(array(
			'conditions'=> $conditions));
		if(empty($d['page'])){
			$this->e404('Page introuvable');
		}
		/*$d['pages'] = $this->Post->find(array(
			'conditions' => array('type'=>'page')));*/

		$this->set($d);
	}

	
}