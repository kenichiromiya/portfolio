<?php
class IndexModel extends Model {
	public $error;

	public function __construct(){
		parent::__construct();
	}

        public function get($req){
                $var = $req;

                if (preg_match("#/$#",$req['id'])) {
                        $sql = "SELECT * FROM {$this->table} ";
                        $values = array();
                                $sql .= "WHERE id LIKE ? ";
                                $sql .= "ORDER BY createtime DESC";
                                array_push($values,$req['id']."%");
                        $var['rows'] = $this->dbh->getAll($sql,$values);
		} elseif ($req['id']) {
                        $sql = "SELECT * FROM {$this->table} ";
                        $values = array();
                                $sql .= "WHERE id = ? ";
                                array_push($values,$req['id']);
                        $var['row'] = $this->dbh->getRow($sql,$values);
                } else {
                        $sql = "SELECT * FROM {$this->table} ";
                        $sql .= "ORDER BY createtime DESC";
                        $values = array();
                       // $sql .= "ORDER BY id ";
                        if ($req['limit']) {
                                $sql .= "LIMIT {$req['limit']}";
                        }
                        $var['rows'] = $this->dbh->getAll($sql,$values);
                }
                return $var;
        }

	public function post($req){
		foreach($_FILES as $file) {
			if ($file["name"]) {
                                $dirname = "../upload";
                                $filename = $req['id'].$file["name"];
                                $upload_file = "$dirname/$filename";
                                if (!is_dir(dirname($upload_file))){
                                        mkdir(dirname($upload_file),0777,true);
                                }
                                $thumb_dirname = "../upload/thumb";
                                $upload_thumb_file = "$thumb_dirname/$filename";
                                if (!is_dir(dirname($upload_thumb_file))){
                                        mkdir(dirname($upload_thumb_file),0777,true);
                                }
				if(move_uploaded_file($file["tmp_name"],$upload_file))
				{
					chmod($upload_file,0644);
				}
				$image = new Image();
				$image->imageresize($upload_thumb_file,$upload_file,190,'');
			}
			$pathinfo = pathinfo($file["name"]);
			$id = $req['id'].$pathinfo['filename'];
			$sql = "DELETE FROM {$this->table} WHERE id = ?";
			$this->dbh->query($sql,array($id));
			$sql = "INSERT INTO {$this->table} (id,filename,account_id) VALUES(?,?,?)";
			$this->dbh->query($sql,array($id,$filename,$req['session']['account_id']));
		}
	}

        public function delete($req) {
                $sql = "SELECT * FROM {$this->table} WHERE id = ?";
                $row = $this->dbh->getRow($sql,array($req['id']));
                unlink("../upload/{$row['filename']}");
                unlink("../upload/thumb/{$row['filename']}");
                $sql = "DELETE FROM {$this->table} WHERE id = ?";
                $this->dbh->query($sql,array($req['id']));

                //$this->templatemodel->deletetemplate($this->param);
        }
}
?>
