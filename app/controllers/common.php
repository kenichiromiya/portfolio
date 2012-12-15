<?php

class CommonController extends Controller
{

        public function __construct() {
                $singleton = Request::singleton();
                $this->req = $singleton->req;
                $classname = ucwords($this->req['controller'])."Model";
                $this->model =& new $classname();
		$this->base = BASE;
		$this->sessionsmodel = new SessionsModel();
		$var = $this->sessionsmodel->get($this->req);
		$this->session = $var['session'];
		if ($this->req['controller'] == 'index'){
			$this->controller = "";
		} else {
			$this->controller = $this->req['controller']."/";
		}
		if (preg_match("/\//",$this->req['id'])){
			$this->dirname = dirname($this->req['id'])."/";
		} else {
			$this->dirname = "";
		}
		$this->validator = new Validator();
		$this->var['req'] = $this->req;
		$this->var['base'] = BASE;
		$this->var['session'] = $this->session;
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
		} elseif ($this->req['start']) {
			$file = 'list'.$mode.'.php';
		} else {
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
                header("Location:".$this->base.$this->controller.$this->req['id']);
                //header("Location:".$this->top.$this->req['controller']."/");
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post($this->req);
                header("Location:".$this->base.$this->controller.$this->dirname);
        }
        public function delete() {
                $this->model->delete($this->req);
                header("Location:".$this->base.$this->controller.$this->dirname);
        }
}
?>
