<?php

class CommonController extends Controller
{

        public function __construct() {
		parent::__construct();
                $singleton = Request::singleton();
        }

        public function get() {
                $var = $this->model->get($this->req);
		$this->var = $this->var + $var;
                //$file = $this->req['controller'].'.php';
		if (preg_match("#\.(.*?)$#",$this->req['id'],$m)) {
			if(preg_match("/jpeg|jpg/",$m[1])){
				$extention = ".jpg";
			}
		} else {
			$extention = "";
		}
		if ($this->req['mode']) {
			$mode = ".".$this->req['mode'];
		} else {
			$mode = "";
		}
		if (preg_match("#[^/]$#",$this->req['id'])) {
			$file = 'detail'.$extention.$mode.'.php';
		} else {
			$page = isset($this->req['page']) ? $this->req['page'] : 1;
			$this->var['next'] = $page+1;
			$file = 'index'.$mode.'.php';
		}
		if($this->req['controller'] != 'index'){
			$file = $this->req['controller']."/".$file;
		}
                $this->view = new View($file);
                $contents = $this->view->getcontents($this->var);
                echo $contents;
        }

        public function put() {
                $this->model->put($this->req);
                header("Location:".BASE.$this->controller.$this->req['id']);
                //header("Location:".$this->top.$this->req['controller']."/");
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post($this->req);
                header("Location:".BASE.$this->controller.$this->dirname);
        }
        public function delete() {
                $this->model->delete($this->req);
                header("Location:".BASE.$this->controller.$this->dirname);
        }
}
?>
