<?php
class GenderController extends Controller{
	public function admin_edit($id=null){
		$this->loadModel('Gender');
		
		$this->Gender->save($this->request->data);
	}
	public function admin_index(){
		$this->loadModel('Gender');

		$d['gender']=$this->Gender->find(array());
		$d['total']=sizeof($d['gender']);
		$this->set($d);
	}
	public function admin_indexAjax(){
		$this->loadModel('Gender');
		
		$d['gender']=$this->Gender->find(array());
		$d['total']=sizeof($d['gender']);
		echo json_encode($d);

	}
	public function admin_deleteAjax(){
		$this->loadModel('Gender');
		$this->Gender->delete($this->request->data->id);
	}
	public function index(){
		$this->loadModel('Gender');

		$d['gender']=$this->Gender->find(array());
		$d['total']=sizeof($d['gender']);
		$this->set($d);
	}
	public function view($id){
		$this->loadModel('Gender');
		$d['genre']=$this->Gender->findFirst(array(
			'conditions'=> array(
				'id'=>$id)));
		$this->set($d);
	}
}
?>