<?php

class AccountsModel extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function put($req) {
                $password = md5($req['password']);
                $sql = "INSERT INTO {$this->table} (id,password,email,role) VALUES(?,?,?,?)";
                $sth = $this->dbh->prepare($sql);
                $sth->execute(array($req['id'],$password,$req['email'],$req['role']));
	}
}
?>
