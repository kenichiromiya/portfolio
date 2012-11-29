<?php

class ViewController extends Controller
{
        public function __construct() {
		parent::__construct();
		//$this->param['contents'] = $_POST['contents'];
		$this->req['post']['contents'] = stripslashes($_POST['contents']);
//		$this->req['file'] = "views/".$this->req['file'];
        }

/*
	public function index() {
		if ($this->param['method'] == "GET") {
			$dir_filenames = array();
			$filenames = scandir("views");
			//$tree = getDirectoryTree($this->dirname);
			//print_r($tree);
			//exit;
			foreach ($filenames as $filename) {
				if (preg_match("/php/",$filename,$m)) {
					array_push($dir_filenames,$filename);
				}
			}
			$templates = $this->templatemodel->getall();
			$db_filenames = array();
			foreach ($templates as $template) {
				array_push($db_filenames,$template['filename']);
			}

			$deletefilenames = array_diff($db_filenames,$dir_filenames);
			//print_r($deletefilenames);
			foreach ($deletefilenames as $filename) {
				$this->templatemodel->delete(array("filename"=>$filename));
			}
			$addfilenames = array_diff($dir_filenames,$db_filenames);
			//print_r($addfilename);
			foreach ($addfilenames as $filename) {
				$this->templatemodel->add(array("filename"=>$filename));
			}

			$this->var['_method'] = "put";
			$this->var['templates'] = $this->templatemodel->gettemplates();
			//print_r($templates);
			$this->var['main'] = "template_admin.php";
			$this->view->display($this->var);

		} elseif ($this->param['method'] == "POST") {
			file_put_contents("views/".$this->param['filename'],$this->param['contents']);
			header("Location:".$this->var['base']."template/");
		} elseif ($this->param['method'] == "PUT") {
			file_put_contents("views/".$this->param['filename'],$this->param['contents']);
			header("Location:".$this->var['base']."template/");
		} elseif ($this->param['method'] == "DELETE") {
			unlink("views/".$this->param['filename']);
			//$this->templatemodel->deletetemplate($this->param);
			header("Location:".$this->var['base']."template/");
		}
	}

	public function edit() {
		if ($this->param['id']) {
			$template = $this->templatemodel->get($this->param);
			$template['contents'] = file_get_contents("views/".$template['filename']);
			$this->var['_method'] = "post";
		} elseif($this->param['action'] == "edit") {
			$template = array('filename'=>'','contents'=>'');
			$this->var['_method'] = "put";
		}
		$this->var['template'] = $template;
		$this->var['main'] = "template_edit.php";
		$this->view->display($this->var);
	}
*/
        public function put() {
                $this->model->put($this->req);
                header("Location:".$this->base.$this->req['controller']."/".$this->req['file']."/");
        }
        public function post() {
                $this->model->post($this->req);
                header("Location:".$this->base.$this->req['controller']."/");
        }
        public function delete() {
                $this->model->delete($this->req);
                header("Location:".$this->base.$this->req['controller']."/");
        }
}
?>
