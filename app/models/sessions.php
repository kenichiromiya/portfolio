<?php

class SessionsModel extends Model {
        function __construct() {
                parent::__construct();
		$this->accountstable = TABLE_PREFIX."accounts";
        }

	public function get($req) {
		$session_id = $_COOKIE['session_id'];
		if ($session_id){
			$sql = "SELECT s.id,s.account_id,a.role FROM {$this->table} s,{$this->accountstable} a WHERE s.id = ? AND s.account_id = a.id";
			$var['session'] = $this->dbh->getRow($sql,array($session_id));
		}
		return $var;
	}

	public function post($req) {
                $password = md5($req['password']);
                $sql = "SELECT * FROM {$this->accountstable} WHERE id = ? and password = ?";
                $var['account'] = $this->dbh->getRow($sql,array($req['id'],$password));

		//print_r(array($req['id'],$password));
		if ($var['account']){
			$this->delete($req);

			$session_id = md5(uniqid(mt_rand(), true));
			if ($req['persistent']){
				setcookie("session_id",$session_id,time()+60*60*24*7,'/');
			} else {
				setcookie("session_id",$session_id,0,'/');
			}
			$sql = "INSERT INTO {$this->table} (id,account_id) VALUES(?,?)";
			$sth = $this->dbh->prepare($sql);
			$sth->execute(array($session_id,$req['id']));
		}
		return $var;
	}

	function delete($req) {
		//$session_id = $_COOKIE['session_id'];
		$sql = "DELETE FROM {$this->table} WHERE id = ?";
                $sth = $this->dbh->prepare($sql);
                $sth->execute(array($req['id']));
		setcookie("session_id","",time()+60*60*24*7);
	}

}
?>
