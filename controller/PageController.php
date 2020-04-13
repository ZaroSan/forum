<?php
/**
 * 
 */
class PageController extends Controller{
	

	function view($id){
		$perPage=25;
		$this->loadModel('Post');
		$d['page']=$this->Post->findFirst(array(
			'conditions'=> array(
				'id'=>$id,
				'type'=>'page',
				'online'=>1)));
		if(empty($d['page'])){
			$this->e404('Page introuvable');
		}
		else{

			$conditions=array(
				'type'=>'post',
				'support'=>$d['page']->support,
				'online'=>1);
			
			$d['posts']=$this->Post->find(array(
				'conditions'=> $conditions,
				'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			$d['total']=$this->Post->findCount($conditions);
			$d['pages']=ceil($d['total']/$perPage);
		}
		
		$this->set($d);
	}

	function getMenu(){
		$this->loadModel('Post');
		return $this->Post->find(array(
			'conditions' => array('type'=>'page', 'online'=>1)));
	}
	function admin_index(){
		$this->loadModel('Post');
		$perPage=10;


		$conditions=array(
				'type'=>'page');
		$d['posts']=$this->Post->find(array(
			'fields'=>'id,name,online',
			'conditions'=> $conditions,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
		$d['total']=$this->Post->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		$this->set($d);
	}
	function admin_edit($id=null){
		$this->loadModel('Post');
		$d['id']='';
		if($this->request->data){
			if($this->Post->validates($this->request->data)){
				$this->request->data->type='page';
				$this->request->data->created=date('Y-m-d h:i:s');
				$this->Post->save($this->request->data);
				$this->Session->setFlash('le contenu a bien été modifié','success');
				$id=$this->Post->id;
				$this->redirect('admin/page/index');
			}
			else{
				$this->Session->setFlash('Informations invalides','danger');
			}
			
		}
		else{
			if($id){
				$this->request->data=$this->Post->findFirst(array('conditions'=> array('id'=>$id)));
				$d['id']=$id;
			}
		}
		
		$this->set($d);
	}
	function admin_delete($id){
		$this->loadModel('Post');
		$this->Post->delete($id);
		
		$this->redirect('admin/page/index');
	}
	public function admin_toggleOnline($id){
		
		$this->loadModel('Post');
		$d=$this->Post->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		$this->Post->toggleOnline($id,$d->online);
		$this->redirect('admin/page/index');
	}
}