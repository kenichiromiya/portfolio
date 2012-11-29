<?php

class Controller
{

        public function __construct() {
                $singleton = Request::singleton();
                $this->req = $singleton->req;
                $classname = ucwords($this->req['controller'])."Model";
                $this->model =& new $classname();
		$this->base = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_NAME"])."/";
		$this->sessionsmodel = new SessionsModel();
		$var = $this->sessionsmodel->get($this->req);
		$this->session = $var['session'];
        }

        public function get() {
                $var = $this->model->get($this->req);
		$var['req'] = $this->req;
		$var['base'] = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_NAME"])."/";
		$var['views'] = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_NAME"])."/app/views/";
		$var['session'] = $this->session;
                $file = $this->req['controller'].'.php';
                $this->view = new View($file);
                $contents = $this->view->getcontents($var);
                echo $contents;
        }

        public function put() {
                $this->model->put(array_merge(array('id'=>$this->req['id']),$this->req['post']));
                header("Location:".$this->base.$this->req['controller']."/".$this->req['id']);
                //header("Location:".$this->top.$this->req['controller']."/");
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post(array_merge(array('id'=>$this->req['id']),$this->req['post']));
                header("Location:".$this->base);
        }
        public function delete() {
                $this->model->delete($this->req);
                header("Location:".$this->base);
        }
}
?>
