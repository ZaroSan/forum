<?php 
class Model{

	public $conf='default';
	static $connections = array();
	public $table= false;
	public $db;
	public $primaryKey ='id';
	public $id;
	public $errors=array();
	public $form;

	function __construct(){
		if($this->table === false){
			$this->table = strtolower(get_class($this)).'s';
		}
		$conf=Conf::$databases[$this->conf];
		if(isset(Model::$connections[$this->conf])){
			$this->db=Model::$connections[$this->conf];
			return true;
		}
		try{
			$pdo = new PDO(
				'mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => ' SET NAMES utf8')
			);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
			Model::$connections[$this->conf] = $pdo;
			$this->db=$pdo;
		}
		catch(PDOException $e){
			if(Conf::$debug >= 1){
				die($e->getMessage());
			}
			else{
				die('Impossible de se connecter à la base de donnée');
			}
		}
		
	}
	public function find($req){
		$sql='SELECT ';
		if(isset($req['fields'])){
			if(is_array($req['fields'])){
				$sql .=implode(',', $req['fields']);
			}
			else{
				$sql .=$req['fields'];
			}
		}
		else{
			$sql .=' * ';
		}
		$sql .=' FROM '.$this->table.' as '.get_class($this).' ';
		if(isset($req['conditions'])){
			$sql .= 'WHERE ';
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions'];
			}
			else{
				$cond= array();
				foreach ($req['conditions'] as $key => $value) {
					if(!is_numeric($value)){
						$value='"'.$value.'"';
					}
					$cond[]="$key = $value";
				}
				$sql .= implode(' AND ', $cond);
			}
		}
		if(isset($req['limit'])){
			$sql .=' LIMIT '.$req['limit'];
		}

		$pre=$this->db->prepare($sql);
		$pre->execute();

		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
	public function findFirst($req){
		return current($this->find($req));
	}
	public function findCount($req){
		$res =$this->findFirst(array(
			'fields' => 'COUNT('.$this->primaryKey.') as count',
			'conditions' =>$req
		));
		return $res->count;
		
	}
	public function delete($id){
		$sql="DELETE FROM {$this->table} WHERE {$this->primaryKey} = {$id}";
		$this->db->query($sql);
	}
	public function save($data){
		$key=$this->primaryKey;
		$fields=array();
		$d=array();
		
		foreach ($data as $k => $value) {
			# code...
			
			if($k!=$this->primaryKey){
				$fields[]= "$k=:$k";
				$d[":$k"]=$value;
			}
			elseif(!empty($value)){
				$d[":$k"]=$value;
			}
		}
		
		if(isset($data->$key) && !empty($data->$key)){
			
			$sql='UPDATE '.$this->table.' SET '.implode(',', $fields).' WHERE '.$key.'=:'.$key;
			$this->id=$data->$key;
			$action='update';
		}
		else{

			$sql='INSERT INTO '.$this->table.' SET '.implode(',', $fields);
			$action='insert';
		}
		
		$pre=$this->db->prepare($sql);
		$pre->execute($d);
		if($action=='insert'){
			$this->id=$this->db->lastInsertId();
		}
		return true;
	}
	public function validates($data){
		$errors=array();
		
		foreach ($this->validate as $key => $value) {
			if(!isset($data->$key)){
				$errors[$key]=$value['message'];
			}
			else{
				if($value['rule']=='notEmpty'){
					if(empty($data->$key)){
						$errors[$key]=$value['message'];
					}
				}
				elseif(!preg_match('/^'.$value['rule'].'$/', $data->$key)){
					$errors[$key]=$value['message'];
				}
			}
		}
		$this->errors=$errors;
		if(isset($this->Form)){
			$this->Form->errors=$errors;
		}
		if(empty($errors)){
			return true;
		}
		return false;
	}
}
?>