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
			$sql .= "AND filename != '' ";
			$sql .= "ORDER BY createtime DESC ";
			if ($req['start']) {
				$sql .= "LIMIT {$req['start']},12";
			} else {
				$sql .= "LIMIT 12";
			}
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
			$sql .= "WHERE filename != '' ";
			$sql .= "ORDER BY createtime DESC ";
			$values = array();
			// $sql .= "ORDER BY id ";
			if ($req['start']) {
				$sql .= "LIMIT {$req['start']},12";
			} else {
				$sql .= "LIMIT 12";
			}
			$var['rows'] = $this->dbh->getAll($sql,$values);
		}
				error_log($sql);
                return $var;
        }

	public function post($req){
		foreach($_FILES as $file) {
			if ($file["name"]) {
                                $dirname = "upload";
                                $filename = $req['id'].$file["name"];
                                $upload_file = "$dirname/$filename";
                                if (!is_dir(dirname($upload_file))){
                                        mkdir(dirname($upload_file),0777,true);
                                }
                                $thumb_dirname = "upload/thumb";
                                $upload_thumb_file = "$thumb_dirname/$filename";
                                if (!is_dir(dirname($upload_thumb_file))){
                                        mkdir(dirname($upload_thumb_file),0777,true);
                                }
                                $large_dirname = "upload/large";
                                $upload_large_file = "$large_dirname/$filename";
                                if (!is_dir(dirname($upload_large_file))){
                                        mkdir(dirname($upload_large_file),0777,true);
                                }
				if(move_uploaded_file($file["tmp_name"],$upload_file))
				{
					chmod($upload_file,0644);
				}
				$image = new Image();
				$image->imageresize($upload_thumb_file,$upload_file,200);
				$image->imageresize($upload_large_file,$upload_file,1000,1000);
			}
			$pathinfo = pathinfo($file["name"]);
			$id = $req['id'].$pathinfo['filename'];
			//$sql = "DELETE FROM {$this->table} WHERE id = ?";
			//$this->dbh->query($sql,array($id));
                	$this->dbh->delete($this->table,$id);
                	$this->dbh->insert($this->table,array("id"=>$id,"filename"=>$filename,"account_id"=>$req['account_id']));
			//$sql = "INSERT INTO {$this->table} (id,filename,account_id) VALUES(?,?,?)";
			//$this->dbh->query($sql,array($id,$filename,$req['account_id']));
		}
	}

        public function delete($req) {
                $sql = "SELECT * FROM {$this->table} WHERE id = ?";
                $row = $this->dbh->getRow($sql,array($req['id']));
                unlink("upload/{$row['filename']}");
                unlink("upload/thumb/{$row['filename']}");
                $this->dbh->delete($this->table,$req['id']);
                //$sql = "DELETE FROM {$this->table} WHERE id = ?";
                //$this->dbh->query($sql,array($req['id']));

                //$this->templatemodel->deletetemplate($this->param);
        }
}
?>
