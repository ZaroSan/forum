<?php
class MangaController extends Controller{
	public function admin_index(){
		$perPage=10;
		$this->loadModel('Book');
		$conditions=array(
				'support'=>'manga');
		$d['mangas']=$this->Book->find(array(
			'fields'=>'id,name,online,slug',
			'conditions'=> $conditions,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
		$d['total']=$this->Book->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		$this->set($d);
	}
	public function admin_edit($id=null){
		$this->loadModel('Book');
		$d['id']='';
		if($this->request->data){
			if($this->Book->validates($this->request->data)){

				$this->request->data->support='manga';
				$this->request->data->created=date('Y-m-d h:i:s');
				debug($this->request->data);
				
				$this->Book->save($this->request->data);
				$this->Session->setFlash('le contenu a bien été modifié','success');

				$id=$this->Book->id;
				$this->redirect('admin/manga/index');
			}
			else{
				$this->Session->setFlash('Informations invalides','danger');
			}
			
		}
		else{
			if($id){
				$this->request->data=$this->Book->findFirst(array('conditions'=> array('id'=>$id)));
				$d['id']=$id;
			}
		}
		
		$this->set($d);
	}
	public function admin_delete($id){
		$this->loadModel('Book');
		$this->Book->delete($id);
		
		$this->redirect('admin/manga/index');
	}
	public function admin_toggleOnline($id){
		
		$this->loadModel('Book');
		$d=$this->Book->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		$this->Book->toggleOnline($id,$d->online);
		$this->redirect('admin/manga/index');
	}
}
?>