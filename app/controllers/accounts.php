<?php

class AccountsController extends CommonController
{

        public function __construct() {
		parent::__construct();
        }

        public function put() {
                $rule = array("email"=>array("type"=>"email"),
                        "url"=>array("type"=>"url"),
                        "about"=>array("required"=>true)
                );
		$this->validator->rule = $rule;
		if ($this->validator->validate($this->req['post'])) {
			$this->model->put($this->req);
			header("Location:".$this->base.$this->controller.$this->req['id']);
		} else {
			$errors = $this->validator->errors;

/*
			$var = $this->req['post'];
			$var['base'] = BASE;
			$var['session'] = $this->session;
			$var['errors'] = $errors;
			$file = 'accounts/detail.php';
			$this->view = new View($file);
			$contents = $this->view->getcontents($var);
			echo $contents;
*/

		}
                //header("Location:".$this->top.$this->req['controller']."/");
        }

}
?>
