<?php
class MyPDO extends PDO
{
	public function query($query,$params = array()){
		$sth = $this->prepare($query);
		$sth->execute($params);
		return $sth;
	}
	public function getAll($query,$params = array()){
		$sth = $this->prepare($query);
		$sth->execute($params);
		return $sth->fetchAll();
	}

	public function getRow($query,$params = array()){
		$sth = $this->prepare($query);
		$sth->execute($params);
		return $sth->fetch();
	}
	public function getOne($query,$params = array()){
		$sth = $this->prepare($query);
		$sth->execute($params);
		$row = $sth->fetch();
		return $row[0];
	}
}
?>
