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
			$sets = array();
			$values = array();
			foreach ($req as $key => $value) {
				if(!is_array($value)) {
					array_push($sets,"$key = ?");
					array_push($values,$value);
				}
			}

			$set = implode(",", $sets);
			$sql = "UPDATE {$this->table} SET $set WHERE id = ?";
			array_push($values,$req['id']);
			//print_r($values);
			$this->dbh->query($sql,$values);
			//echo $sql;
			//print_r($values);
			//$sth = $this->dbh->prepare($sql);
			//$sth->execute($values);
		} else {
			$colnames = array();
			$places = array();
			$values = array();
			foreach ($req as $key => $value) {
				if(!is_array($value)) {
					array_push($colnames,$key);
					array_push($places,"?");
					array_push($values,$value);
				}
			}
			$colname = implode(",", $colnames);
			$place = implode(",", $places);
			//print_r($values);
			//exit;
			$sql = "INSERT INTO {$this->table} ($colname) VALUES($place)";
			$this->dbh->query($sql,$values);
		}
	}

	public function post($req){
		$colnames = array();
		$places = array();
		$values = array();
		foreach ($req as $key => $value) {
			array_push($colnames,$key);
			array_push($places,"?");
			array_push($values,$value);
		}
		$colname = implode(",", $colnames);
		$place = implode(",", $places);
		$sql = "INSERT INTO {$this->table} ($colname) VALUES($place)";
                $this->dbh->query($sql,$values);
		//$sth = $this->dbh->prepare($sql);
		//$sth->execute($values);
	}

        public function delete($req){
                $sql = "DELETE FROM {$this->table} WHERE id = ?";
                $this->dbh->query($sql,array($req['id']));
                //$sth = $this->dbh->prepare($sql);
		//$sth->execute(array($req['id']));
        }


}
?>
