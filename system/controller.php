<?php

class Controller
{

        public function __construct() {
                $singleton = Request::singleton();
                $this->req = $singleton->req;
                $classname = ucwords($this->req['controller'])."Model";
                $this->model =& new $classname();
		$this->sessionsmodel = new SessionsModel();
		$var = $this->sessionsmodel->get($this->req);
		$this->session = $var['session'];
		$this->validator = new Validator();
                $this->var['req'] = $this->req;
                $this->var['base'] = BASE;
                $this->var['session'] = $this->session;
        }

        public function get() {
                $var = $this->model->get($this->req);
                $file = $this->req['controller'].'.php';
                $this->view = new View($file);
                $contents = $this->view->getcontents($this->var);
                echo $contents;
        }

        public function put() {
                $this->model->put($this->req);
                header("Location:".$this->base.$this->req['controller']."/".$this->req['id']);
                //header("Location:".$this->top.$this->req['controller']."/");
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post($this->req);
                header("Location:".$this->base);
        }
        public function delete() {
                $this->model->delete($this->req);
                header("Location:".$this->base);
        }
}
?>
