<?php
class MangaController extends Controller{
	public function admin_index(){
		$perPage=50;
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
	public function admin_editAjax($id=null){
		
		$this->loadModel('Book');
		
		$this->request->data->support='manga';
		$this->request->data->created=date('Y-m-d h:i:s');
		$this->Book->save($this->request->data);
	}
	public function admin_edit($id=null){
		$this->loadModel('Book');
		$d['id']='';
		if($this->request->data){
			if($this->Book->validates($this->request->data)){

				$this->request->data->support='manga';
				$this->request->data->created=date('Y-m-d h:i:s');
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
	public function admin_deleteAjax(){
		$this->loadModel('Book');
		$this->Book->delete($this->request->data->id);
	}

	public function admin_indexAjax(){
		$perPage=50;
		$this->loadModel('Book');
		$conditions=array(
				'support'=>'manga',
				'online'=> 1);
		if($this->request->search){
			$like=array(
				'name'=>$this->request->search);
			$d['list']=$this->Book->find(array(
				'fields'=>'id,name,online,slug,sumary',
				'conditions'=> $conditions,
				'like'=>$like,
				'sort'=>'id asc',
				'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			
		}
		else{
			$d['list']=$this->Book->find(array(
			'fields'=>'id,name,online,slug,sumary',
			'conditions'=> $conditions,
			'sort'=>'id asc',
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			
		}
		$d['total']=$this->Book->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		$d['activePage']=$this->request->page;
		echo json_encode($d);
	}

	public function admin_toggleOnline($id){
		
		$this->loadModel('Book');
		$d=$this->Book->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		$this->Book->toggleOnline($id,$d->online);
	}
	public function admin_toggleOnlineAjax(){
		
		$this->loadModel('Book');
		$d=$this->Book->findFirst(array(
			'conditions'=> array(
				'id'=>$this->request->data->id)));
		$this->Book->toggleOnline($this->request->data->id,$d->online);
		$this->redirect('admin/manga/index');
	}
	public function view($id){

		$this->loadModel('Book');
		$d['manga']=$this->Book->findFirst(array(
			'conditions'=> array(
				'id'=>$id,
				'online'=>1)));
		
		if(!isset($d['manga']->id)){
			$this->ePrivate($this->request->params);
		}
		$this->set($d);
	}

	public function index(){
		$perPage=50;
		$this->loadModel('Book');

		$conditions=array(
				'support'=>'manga',
				'online'=> 1);
		if($this->request->search){
			$like=array(
				'name'=>$this->request->search);
			$d['mangas']=$this->Book->find(array(
				'fields'=>'id,name,online,slug,sumary',
				'conditions'=> $conditions,
				'like'=>$like,
				'sort'=>'name asc',
				'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			$d['total']=$this->Book->findCount($conditions,$like);
		}
		else{
			$d['mangas']=$this->Book->find(array(
			'fields'=>'id,name,online,slug,sumary',
			'conditions'=> $conditions,
			'sort'=>'name asc',
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			$d['total']=$this->Book->findCount($conditions);
		}
		
		$d['page']=ceil($d['total']/$perPage);
		$d['activePage']=$this->request->page;
		$this->set($d);
	}
	public function indexAjax(){
		$perPage=5;
		$this->loadModel('Book');

		$conditions=array(
				'support'=>'manga',
				'online'=> 1);
		if($this->request->search){
			$like=array(
				'name'=>$this->request->search);
			$d['mangas']=$this->Book->find(array(
				'fields'=>'id,name,online,slug,sumary',
				'conditions'=> $conditions,
				'like'=>$like,
				'sort'=>'name asc',
				'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			$d['total']=$this->Book->findCount($conditions,$like);
		}
		else{
			$d['mangas']=$this->Book->find(array(
			'fields'=>'id,name,online,slug,sumary',
			'conditions'=> $conditions,
			'sort'=>'name asc',
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
			$d['total']=$this->Book->findCount($conditions);
		}
		$d['search']=$this->request->search;
		$d['page']=ceil($d['total']/$perPage);
		$d['activePage']=$this->request->page;
		echo json_encode($d);
	}
}
?>