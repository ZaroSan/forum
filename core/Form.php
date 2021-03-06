<?php
class Form{
	public $controller;
	public $errors;
	public function __construct($controller){
		$this->controller=$controller;
	}
	public function input($name,$label,$options=array(),$required=false){
		$error=false;
		$classError='';
		if(isset($this->errors[$name])){
			$error=$this->errors[$name];
		}
		if(!isset($this->controller->request->data->$name)){
			$value='';
		}
		else{
			$value=$this->controller->request->data->$name;
		}
		if($label=='hidden'){
			return '<input  type="hidden" name="'.$name.'" id="input'.$name.'" value="'.$value.'">';
		}
		$html= '<div class="form-group row"><label for="input'.$name.'" class="col-sm-3 col-form-label text-right">'.$label.'</label><div class="col-sm-9">';
		$attr=' ';
		foreach ($options as $key => $v) {
			# code...
			if($key!='type' && $key!='options'){
				$attr .="$key=\"$v\"";
			}

			
		}
		if($required){
			$attr .=" required";
		}
		if(!isset($options['type'])){
			$html.='<input '.$attr.' type="text" name="'.$name.'" id="input'.$name.'" value="'.$value.'">';
		}
		elseif($options['type']=='textarea'){
			$html.='<textarea '.$attr.' name="'.$name.'" id="input'.$name.'" >'.$value.'</textarea>';
		}
		elseif($options['type']=='checkbox'){
			$html.='<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1"'.(empty($value)?'':'checked').'/>';
		}
		elseif($options['type']=='number'){
			$html.='<input '.$attr.' type="number" name="'.$name.'"  id="input'.$name.'" value="'.$value.'">';
		}
		elseif($options['type']=='date'){
			$html.='<input '.$attr.' type="date" name="'.$name.'"  id="input'.$name.'" value="'.$value.'">';
		}
		elseif($options['type']=='password'){
			$html.='<input '.$attr.' type="password" name="'.$name.'"  id="input'.$name.'" value="'.$value.'">';
		}
		elseif ($options['type']=='select') {
			$html.='<select id="input'.$name.'" name="'.$name.'"><option value="" selected disabled hidden>...</option>';
			foreach ($options['options'] as $key=> $v) {
				$html.='<option value="'.$v->name.'"';
				if($v->name==$value){
					$html.='selected="selected"';
				}
				$html.='>'.ucfirst($v->name).'</option>';
			}
			$html.='</select>';
		}
		if($error){
			$html.= '<span class="help-inline">'.$error.'</span>';
		}

		$html.='</div></div>';
		return $html;
						
	}
}
?>