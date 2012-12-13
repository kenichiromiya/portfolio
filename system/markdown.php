<?php
class Markdown {

        public function __construct() {
        }

	public function parse($text) {
		echo "#".$text."#";
		$text = preg_replace("/^-+/m","<hr/>",$text);
		$text = preg_replace("/^# (.*)/m","<h1>$1</h1>",$text);
		$text = preg_replace("/^## (.*)/m","<h2>$1</h2>",$text);
		$text = preg_replace("/^### (.*)/m","<h3>$1</h3>",$text);
/*
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
		$text = preg_replace("","",$text);
*/
		return $text;
	}
}
?>
