<?php
class SupportController extends Controller{
	public function admin_index(){
		$this->loadModel('Support');
		$d['support']=$this->Support->find(array());
		$d['total']=count($d['support']);
		$this->set($d);
	}
	function admin_delete($id){
		$this->loadModel('Support');
		$this->Support->delete($id);
		
		$this->redirect('admin/support/index');
	}
	function admin_edit($id=null){
		$this->loadModel('Support');
		$d['id']='';
		if($this->request->data){
			if($this->Support->validates($this->request->data)){
				$this->Support->save($this->request->data);
				$this->Session->setFlash('le contenu a bien été modifié','success');
				$id=$this->Support->id;
				$this->redirect('admin/support/index');
			}
			else{
				$this->Session->setFlash('Informations invalides','danger');
			}
			
		}
		else{
			if($id){
				$this->request->data=$this->Support->findFirst(array('conditions'=> array('id'=>$id)));
				$d['id']=$id;
			}
		}
		
		$this->set($d);
		
		
	}
}
?>