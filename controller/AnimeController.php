<?php
class AnimeController extends Controller{
	public function admin_index(){
		$perPage=10;
		$this->loadModel('Book');
		$conditions=array(
				'support'=>'anime');
		$d['animes']=$this->Book->find(array(
			'fields'=>'id,name,online',
			'conditions'=> $conditions,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
		$d['total']=$this->Book->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		$this->set($d);
	}
	public function admin_edit($id=null){

	}
	public function admin_delete($id){
		
	}
	public function admin_toggleOnline($id){
		
		$this->loadModel('Book');
		$d=$this->Book->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		$this->Book->toggleOnline($id,$d->online);
		$this->redirect('admin/anime/index');
	}
}
?>