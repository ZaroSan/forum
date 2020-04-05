<?php
class Form{
	public $controller;
	public $errors;
	public function __construct($controller){
		$this->controller=$controller;
	}
	public function input($name,$label,$options=array()){
		$error=false;
		$classError='';
		if(isset($this->errors[$name])){
			$error=$this->errors[$name];
		}
		//debug($this->errors);
		if(!isset($this->controller->request->data->$name)){
			$value='';
		}
		else{
			$value=$this->controller->request->data->$name;
		}
		if($label=='hidden'){
			return '<input  type="hidden" name="'.$name.'" id="input"'.$name.'" value="'.$value.'">';
		}
		$html= '<div class="form-group row"><label for="input"'.$name.'" class="col-sm-2 col-form-label text-right">'.$label.'</label><div class="col-sm-10">';
		$attr=' ';
		foreach ($options as $key => $v) {
			# code...
			if($key!='type'){
				$attr .="$key=\"$v\"";
			}
			
		}
		if(!isset($options['type'])){
			$html.='<input '.$attr.' type="text" name="'.$name.'" id="input"'.$name.'" value="'.$value.'">';
		}
		elseif($options['type']=='textarea'){
			$html.='<textarea '.$attr.' name="'.$name.'" id="input"'.$name.'" >'.$value.'</textarea>';
		}
		elseif($options['type']=='checkbox'){
			$html.='<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1"'.(empty($value)?'':'checked').'/>';
		}
		if($error){
			$html.= '<span class="help-inline">'.$error.'</span>';
		}

		$html.='</div></div>';
		return $html;
						
	}
}
?>