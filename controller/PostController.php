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
		//$this->Post->delete($id);
		$this->Session->setFlash('le contenu a bien été supprimer','success');
		$this->redirect('admin/post/index');
	}
	function admin_edit($id=null){
		$this->loadModel('Post');
		$d['id']='';
		if($this->request->data){
			$this->Post->save($this->request->data);
			$id=$this->Post->id;
		}
		if($id){
			$this->request->data=$this->Post->findFirst(array('conditions'=> array('id'=>$id)));
			$d['id']=$id;
		}
		$this->set($d);
		
		
	}
	
}