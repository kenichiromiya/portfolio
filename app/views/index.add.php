<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
<script type="text/javascript" src="<?=$base?>js/jquery-1.7.1.min.js"></script>
<!--script type="text/javascript" src="<?=$base?>js/jquery.masonry.min.js""></script-->
<script type="text/javascript" src="<?=$base?>js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=$base?>js/jquery.browser.min.js"></script>
<script type="text/javascript" src="<?=$base?>js/javascript.js"></script>
<script type="text/javascript" src="<?=$base?>js/bottom.js"></script>
</head>
<body id="bottom">

<div id="wrapper">
<?php include("header.php")?>

<div id="container">

<form action="<?=$base?>" method="get">
<input type="text" name="id">
<input type="hidden" name="view" value="edit">
<input type="submit" value="<?=_('Add')?>">
</form>
</div>
<?php include("footer.php")?>
</div>

</body>
</html>
