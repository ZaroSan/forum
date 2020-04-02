<?php 
class Model{

	public $conf='default';
	static $connections = array();
	public $table= false;
	public $db;
	public $primaryKey ='id';

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
}
?>