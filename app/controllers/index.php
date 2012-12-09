<?php

class IndexController extends CommonController
{
	public function __construct() {
		parent::__construct();
	}

        public function put() {
                //$this->model->post($this->req['post']);
                $this->model->put(array_merge(array('id'=>$this->req['id'],'account_id'=>$this->session['account_id']),$this->req['post']));
		//print_r($this->req);
        }
        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post(array_merge(array('id'=>$this->req['id'],'account_id'=>$this->session['account_id']),$this->req['post']));
		//print_r($this->req);
        }
}
?>
