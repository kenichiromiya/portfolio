<?php

class AccountsModel extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function post($req) {

	}

	public function put($req) {
		$sql = "SELECT COUNT(*) FROM {$this->table} WHERE id = ?";
		$count = $this->dbh->getOne($sql,array($req['id']));
		$password = md5($req['password']);
		if (count($_FILES)){
			$file = $_FILES['icon'];
			$dirname = "upload/accounts/";
			$filename = $req['id']."/"."icon.jpeg";
			$upload_file = "$dirname/$filename";
			if (!is_dir(dirname($upload_file))){
				mkdir(dirname($upload_file),0777,true);
			}
			$thumb_dirname = "upload/accounts/thumb";
			$upload_thumb_file = "$thumb_dirname/$filename";
			if (!is_dir(dirname($upload_thumb_file))){
				mkdir(dirname($upload_thumb_file),0777,true);
			}
			$large_dirname = "upload/accounts/large";
			$upload_large_file = "$large_dirname/$filename";
			if (!is_dir(dirname($upload_large_file))){
				mkdir(dirname($upload_large_file),0777,true);
			}
			if(move_uploaded_file($file["tmp_name"],$upload_file))
			{
				chmod($upload_file,0644);
			}
			$image = new Image();
			$image->imageresize($upload_thumb_file,$upload_file,50,'','jpeg');
			$image->imageresize($upload_large_file,$upload_file,100,'100','jpeg');
			//$pathinfo = pathinfo($file["name"]);
			//$icon = $req['id']."/".$pathinfo['filename'];
			$icon = $req['id']."/"."icon.jpeg";
		} else {
			$icon = "";
		}
		if ($count) {

/*
			$sets = array("icon = ?");
			$values = array($icon);
			$set = implode(",", $sets);
			$sql = "UPDATE {$this->table} SET $set WHERE id = ?";
			array_push($values,$req['id']);
			$this->dbh->query($sql,$values);
*/
			$sets = array("id = ?","password = ?","email = ?","role = ?","url = ?","about = ?","icon = ?");
			$values = array($req['id'],$password,$req['email'],$req['role'],$req['url'],$req['about'],$icon);
			$set = implode(",", $sets);
			$sql = "UPDATE {$this->table} SET $set WHERE id = ?";
			array_push($values,$req['id']);
			$this->dbh->query($sql,$values);

		} else {
			$sql = "INSERT INTO {$this->table} (id,password,email,role,url,about,icon) VALUES(?,?,?,?,?,?,?)";
			$sth = $this->dbh->prepare($sql);
			$sth->execute(array($req['id'],$password,$req['email'],$req['role'],$req['url'],$req['about'],$icon));
		}
	}
}
?>
