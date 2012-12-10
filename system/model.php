<?php
class Model
{

	public function __construct() {
                $singleton = DB::singleton();
                $this->dbh = $singleton->dbh;

                $classname = get_class($this);
                preg_match("/(.*)Model/",$classname,$m);
                $this->modelsname = strtolower($m[1]);
                $this->table = TABLE_PREFIX.$this->modelsname;
	}

	public function get($req){
		$var = $req;

		if ($req['id']) {
			$sql = "SELECT * FROM {$this->table} ";
			$values = array();
				$sql .= "WHERE id = ? ";
				array_push($values,$req['id']);
			$var = $this->dbh->getRow($sql,$values);
			$var['id'] = $req['id'];
		} else {
			$sql = "SELECT * FROM {$this->table} ";
			$values = array();
			$sql .= "ORDER BY id ";
			if ($req['limit']) {
				$sql .= "LIMIT {$req['limit']}";
			}
			$var['rows'] = $this->dbh->getAll($sql,$values);
		}
		return $var;
	}


	public function put($req){
		$values = array();
		$sql = "SELECT COUNT(*) FROM {$this->table} WHERE id = ?";
		array_push($values,$req['id']);
		$count = $this->dbh->getOne($sql,$values);
		// TODO ここでbodyとtitle加工
		if ($count) {
			$this->dbh->update($this->table,$req['id'],$req['post']);
		} else {
			$this->dbh->insert($this->table,$param,$req['post']);
		}
	}

	public function post($req){
		$this->dbh->insert($this->table,$param,$req['post']);
	}

        public function delete($req){
                $sql = "DELETE FROM {$this->table} WHERE id = ?";
                $this->dbh->query($sql,array($req['id']));
                //$sth = $this->dbh->prepare($sql);
		//$sth->execute(array($req['id']));
        }


}
?>
