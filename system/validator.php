<?php
class Validator {

	public $rule;
        public function __construct($rule) {
		$this->rule = $rule;
        }

	public function validate($param) {
		foreach ($param as $key => $value) {
			if ($this->rule[$key]) {
				switch($this->rule[$key]['type'])
				{
				case "url":
					error_log("url!");
					break;
				case "email":
					error_log("email!");
					break;
				default:
				}
			}
		}
		//return true;
		return false;
	}
}
?>
