<?php

class IndexController extends CommonController
{
	public function __construct() {
		parent::__construct();
	}

        public function put() {
                //$this->model->post($this->req['post']);
                $this->model->put(array_merge(array('account_id'=>$this->session['account_id']),$this->req));
		header("Location:".$this->base.$this->controller.$this->req['id']);
		//print_r($this->req);
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post(array_merge(array('account_id'=>$this->session['account_id']),$this->req));
		header("Location:".$this->base.$this->controller.$this->dirname);
		//print_r($this->req);
        }
}
?>
