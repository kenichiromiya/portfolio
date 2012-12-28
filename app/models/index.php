<?php
class IndexModel extends Model {
	public $error;

	public function __construct(){
		parent::__construct();
	}

        public function get($req){
                $var = $req;

                if ($req['tag']) {
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} ";
			$values = array();
			$sql .= "WHERE tags LIKE ? ";
			$sql .= "ORDER BY createtime DESC ";
			if ($req['page']) {
				$start = ($req['page']-1) * PER_PAGE;
				$sql .= "LIMIT ".$start.",".PER_PAGE;
			} else {
				$sql .= "LIMIT ".PER_PAGE;
			}
			array_push($values,"%".$req['tag']."%");
			$var['rows'] = $this->dbh->getAll($sql,$values);
			$var['count'] = $this->dbh->rowCount();
		} elseif (preg_match("#/$|^$#",$req['id'])) {
			$id = ($req['id']) ? $req['id'] : 'index';
			$sql = "SELECT * FROM {$this->table} ";
			$values = array();
			$sql .= "WHERE id = ? ";
			array_push($values,$id);
			if ($row = $this->dbh->getRow($sql,$values)) {
				$var = $var + $row;
			}

			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} ";
			$values = array();
			$sql .= "WHERE id != ? AND id LIKE ? ";
			$sql .= "ORDER BY createtime DESC ";
			if ($req['page']) {
				$start = ($req['page']-1) * PER_PAGE;
				$sql .= "LIMIT ".$start.",".PER_PAGE;
			} else {
				$sql .= "LIMIT ".PER_PAGE;
			}
			array_push($values,$id,$req['id']."%");
			$var['rows'] = $this->dbh->getAll($sql,$values);
			$var['count'] = $this->dbh->rowCount();
/*

			$sql = "SELECT * FROM {$this->table} ";
			$values = array();
			$sql .= "WHERE id != ? AND id LIKE ? AND type = 'page' ";
			$sql .= "ORDER BY createtime DESC ";
			array_push($values,$id,$req['id']."%");
			$var['page']['rows'] = $this->dbh->getAll($sql,$values);
*/
			$var['documents'] = array();
			$var['folders'] = array();
		} elseif ($req['id']) {
			$sql = "SELECT * FROM {$this->table} ";
			$values = array();
			$sql .= "WHERE id = ? ";
			array_push($values,$req['id']);
			if ($row = $this->dbh->getRow($sql,$values)) {
				$var = $var + $row;
			}
		} else {
			$sql = "SELECT * FROM {$this->table} ";
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
                return $var;
        }

        public function put($req){
		$id = ($req['id']) ? $req['id'] : 'index';
                $values = array();
                $sql = "SELECT COUNT(*) FROM {$this->table} WHERE id = ?";
                array_push($values,$id);
                $count = $this->dbh->getOne($sql,$values);
                $param = $req['post'];
                $param['id'] = $id;
                if ($count) {
			$param['modified'] = date('Y-m-d H:i:s');
                        $this->dbh->update($this->table,$id,$param);
                } else {
			$param['created'] = date('Y-m-d H:i:s');
                        $this->dbh->insert($this->table,$param);
                }
        }

	public function post($req){
		foreach($_FILES as $file) {
			if ($file["name"]) {
                                $dirname = "upload";
                                if (!is_dir($dirname)){
                                        mkdir($dirname,0777,true);
                                }
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
				$id = $req['id'].$file["name"];
				$type = 'image';
				//$sql = "DELETE FROM {$this->table} WHERE id = ?";
				//$this->dbh->query($sql,array($id));
				$size = getimagesize($upload_file);
				$width = $size[0];
				$height = $size[1];
				$this->dbh->delete($this->table,$id);
				$created = date('Y-m-d H:i:s');
				$this->dbh->insert($this->table,array("id"=>$id,"filename"=>$filename,"width"=>$width,"height"=>$height,"type"=>$type,"account_id"=>$req['account_id'],"created"=>$created));
			}
			//$pathinfo = pathinfo($file["name"]);
			//$id = $req['id'].$pathinfo['filename'];
			//$pathinfo = pathinfo($file["name"]);
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
