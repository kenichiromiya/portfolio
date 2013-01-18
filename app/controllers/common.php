<?php

class CommonController extends Controller
{

        public function __construct() {
		parent::__construct();
                $singleton = Request::singleton();
		if ($this->session['role'] == "admin" or preg_match("#^".$this->session['account_id']."/#",$this->req['id'])) {
			$this->var['editable'] = TRUE;
		}
        }

        public function get() {
                $var = $this->model->get($this->req);
		$this->var = $this->var + $var;
                //$file = $this->req['controller'].'.php';
		/*
		if (preg_match("#\.(.*?)$#",$this->req['id'],$m)) {
			if(preg_match("/jpeg|jpg/",$m[1])){
				$extention = ".jpg";
			}
		} else {
			$extention = "";
		}
		*/
		if ($this->req['view']) {
			$view = ".".$this->req['view'];
		} elseif ($var['view']) {
                        $view = ".".$var['view'];
                } else  {
			$view = "";
		}
		if (preg_match("#[^/]$#",$this->req['id'])) {
			$template = 'detail';
		} else {
			$template = 'index';
		}
		if (preg_match("#[^/]$#",$this->req['id'])) {
			$file = $template.$view.'.php';
		} else {
			$page = isset($this->req['page']) ? $this->req['page'] : 1;
			$this->var['next'] = $page+1;
			$file = $template.$view.'.php';
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
