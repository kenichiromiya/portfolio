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
        }

        public function get() {
                $var = $this->model->get($this->req);
		$var['req'] = $this->req;
                $var['base'] = BASE;
                $var['views'] = "http://".$_SERVER["HTTP_HOST"].$this->dir."app/views/";
		$var['session'] = $this->session;
                //$file = $this->req['controller'].'.php';
		if(preg_match("#[^/]$#",$this->req['id'])) {
			$file = 'detail.php';
		} elseif ($this->req['start']) {
			$file = 'list.php';
		} else {
			$file = 'index.php';
		}
		if($this->req['controller'] != 'index'){
			$file = $this->req['controller']."/".$file;
		}
                $this->view = new View($file);
                $contents = $this->view->getcontents($var);
                echo $contents;
        }

        public function put() {
                $this->model->put(array_merge(array('id'=>$this->req['id']),$this->req['post'],$this->req));
                header("Location:".$this->base.$this->controller.$this->req['id']);
                //header("Location:".$this->top.$this->req['controller']."/");
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post(array_merge(array('id'=>$this->req['id']),$this->req['post'],$this->req));
                header("Location:".$this->base.$this->controller.$this->dirname);
        }
        public function delete() {
                $this->model->delete($this->req);
                header("Location:".$this->base.$this->controller.$this->dirname);
        }
}
?>
