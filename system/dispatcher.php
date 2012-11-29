<?php

class Dispatcher {
	public function __construct() {
		//$request = New Request();
		//$this->req = $request->sanitize();
		$singleton = Request::singleton();
		$this->req = $singleton->req;
	}

	public function dispatch() {
		$classname = ucwords($this->req['controller'])."Controller";
		$controller =& new $classname();

                switch ($_SERVER["REQUEST_METHOD"]) {
                        case "POST":
                                $controller->post();
                                break;
                        case "PUT":
                                $controller->put();
                                break;
                        case "DELETE":
                                $controller->delete();
                                break;
                        case "GET";
                                $controller->get();
                                break;
                }

		//print_r($var);
		/*
		$templatename = isset($this->param['controller']) ? $this->param['controller'] : 'index';

		if (!file_exists("views/".$templatename.".php")) {
			$templatename = "index";
		}
		$filename = $templatename.".php";
		$view = new View();
		$view->display($filename,$var);
		*/
	}
}
?>
