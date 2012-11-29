<?php

class SessionsController extends CommonController
{
        public function __construct() {
		parent::__construct();
        }

	public function post() {
		$var = $this->model->post($this->req);
		if ($var['account']){
			if ($this->req['done']) {
				header("Location:".urldecode($this->req['done']));
			} else {
				header("Location:".$this->base);
			}
		} else {
			$var = array_merge($var,$this->req);
			$var['error'] = true;
			$file = $this->req['controller'].'.php';
			$this->view = new View($file);
			$contents = $this->view->getcontents($var);
			echo $contents;
		}
		header("Location:".$this->base);
	}

	public function delete() {
		$this->model->delete($this->req);
		header("Location:".$this->base);
	}

}
?>
