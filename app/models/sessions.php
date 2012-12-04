<?php

class SessionsModel extends Model {
        function __construct() {
                parent::__construct();
		$this->accountstable = TABLE_PREFIX."accounts";
        }

	public function get($req) {
		try {
			$session_id = $_COOKIE['session_id'];
			$var = array();
			if ($session_id){
				$sql = "SELECT s.id,s.account_id,a.role FROM {$this->table} s,{$this->accountstable} a WHERE s.id = ? AND s.account_id = a.id";
				$var['session'] = $this->dbh->getRow($sql,array($session_id));
			}
			return $var;
		} catch (PDOException $e) {
			return FALSE;
		}
	}

	public function post($req) {
		try {
			$password = md5($req['password']);
			$sql = "SELECT * FROM {$this->accountstable} WHERE id = ? and password = ?";
			$var['account'] = $this->dbh->getRow($sql,array($req['id'],$password));

			//print_r(array($req['id'],$password));
			if ($var['account']){
				$this->delete($req);

				$session_id = md5(uniqid(mt_rand(), true));
				$var['session_id'] = $session_id;
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
		} catch (PDOException $e) {
			return FALSE;
		}
	}

	function delete($req) {
		//$session_id = $_COOKIE['session_id'];
		try {
			$sql = "DELETE FROM {$this->table} WHERE id = ?";
			$sth = $this->dbh->prepare($sql);
			$sth->execute(array($req['id']));
			setcookie("session_id","",time()+60*60*24*7,'/');
			return TRUE;
		} catch (PDOException $e) {
			return FALSE;
		}
	}

}
?>
