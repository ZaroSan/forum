<?php
class CategoryController extends Controller{
	public function admin_edit($id=null){
		$this->loadModel('Category');
		
		$this->Category->save($this->request->data);
	}
	public function admin_index(){
		$this->loadModel('Category');
		
		$d['category']=$this->Category->find(array());
		$d['total']=sizeof($d['category']);
		$this->set($d);
	}
	public function admin_indexAjax(){
		$this->loadModel('Category');
		
		$d['category']=$this->Category->find(array());
		$d['total']=sizeof($d['category']);
		echo json_encode($d);
	}
	public function admin_deleteAjax(){
		$this->loadModel('Category');
		$this->Category->delete($this->request->data->id);
	}
}

?>