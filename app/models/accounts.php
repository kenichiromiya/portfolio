<?php

class AccountsModel extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function put($req) {
		$sql = "SELECT COUNT(*) FROM {$this->table} WHERE id = ?";
		$count = $this->dbh->getOne($sql,array($req['id']));
		$password = md5($req['password']);
		if ($count) {
			$sets = array("id = ?","password = ?","email = ?","role = ?","url = ?","about = ?");
			$values = array($req['id'],$password,$req['email'],$req['role'],$req['url'],$req['about']);
			$set = implode(",", $sets);
			$sql = "UPDATE {$this->table} SET $set WHERE id = ?";
			array_push($values,$req['id']);
			$this->dbh->query($sql,$values);

		} else {

			$sql = "INSERT INTO {$this->table} (id,password,email,role,url,about) VALUES(?,?,?,?,?,?)";
			$sth = $this->dbh->prepare($sql);
			$sth->execute(array($req['id'],$password,$req['email'],$req['role'],$req['url'],$req['about']));
		}
	}
}
?>
