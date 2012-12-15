<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
<script type="text/javascript" src="<?=$base?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$base?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=$base?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>
<div id="subcontainer">
<?=_("Account confirmation")?>
<form id="account" action="<?=BASE?>accounts/?mode=complete" method="post">
<input type="hidden" name="_method" value="put">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="code" value="<?=$code?>">
<input id="submit" type="submit" value="<?=_('Submit')?>"/>
</form>

</div><!--subcontainer-->

</div><!--wrapper-->

</body>
</html>
