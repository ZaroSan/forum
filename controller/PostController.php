 <?php
/**
 * 
 */
class PostController extends Controller{
	
	function index(){
		$this->loadModel('Post');
		$perPage=10;


		$conditions=array(
				'type'=>'post',
				'online'=>1);
		$d['posts']=$this->Post->find(array(
			'conditions'=> $conditions,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
		$d['total']=$this->Post->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		foreach ($d['posts'] as $key) {
			# code...
			$key->content=substr($key->content, 0,250).' ...';
		}
		$this->set($d);


	}

	function view($id,$slug){
		$this->loadModel('Post');
		$conditions=array(
				'id'=>$id,
				'type'=>'post',
				'online'=>1);

		$d['page']=$this->Post->findFirst(array(
				'fields'=> 'id,slug,content,name',
			'conditions'=> $conditions));
		if(empty($d['page'])){
			$this->e404('Page introuvable');
		}
		if($slug != $d['page']->slug){
			$this->redirect("post/view/id:$id/slug:".$d['post']->slug,301);
		}

		$this->set($d);
	}

	function admin_index(){
		$this->loadModel('Post');
		$perPage=10;


		$conditions=array(
				'type'=>'post');
		$d['posts']=$this->Post->find(array(
			'fields'=>'id,name,online',
			'conditions'=> $conditions,
			'limit' => ($perPage*($this->request->page-1)).','.$perPage));
		$d['total']=$this->Post->findCount($conditions);
		$d['page']=ceil($d['total']/$perPage);
		$this->set($d);
	}

	function admin_delete($id){
		$this->loadModel('Post');
		$this->Post->delete($id);
		
		$this->redirect('admin/post/index');
	}
	function admin_edit($id=null){
		$this->loadModel('Post');
		$d['id']='';
		if($this->request->data){
			if($this->Post->validates($this->request->data)){
				$this->request->data->type='post';
				$this->request->data->created=date('Y-m-d h:i:s');
				$this->Post->save($this->request->data);
				$this->Session->setFlash('le contenu a bien été modifié','success');
				$id=$this->Post->id;
				$this->redirect('admin/post/index');
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
		$this->loadModel('Support');
		$conditions=array(
				'type'=>'post');
		$d['select']=$this->Support->find(array(
			'fields'=>'name',
			'conditions'=> $conditions));
		$this->set($d);
		
		
	}
	public function admin_toggleOnline($id){
		
		$this->loadModel('Post');
		$d=$this->Post->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		$this->Post->toggleOnline($id,$d->online);
		$this->redirect('admin/post/index');
	}
	
}