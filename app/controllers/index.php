<?php

class IndexController extends CommonController
{
	public function __construct() {
		parent::__construct();
	}

        public function post() {
                //$this->model->post($this->req['post']);
                $this->model->post(array_merge(array('id'=>$this->req['id'],'session'=>$this->session),$this->req['post']));
		//print_r($this->req);
        }
}
?>
