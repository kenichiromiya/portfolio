<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/accounts.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>
<div id="container">
<div id="main">
<?=_('Account confirmation')?>
<form action="<?=BASE?>accounts/?mode=complete" method="post">
<input type="hidden" name="_method" value="put">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="code" value="<?=$code?>">
<!--<label for="submit"><?=_('Account confirmation')?></label>-->
<input id="submit" type="submit" value="<?=_('Submit')?>"/>
</form>

</div><!--main-->
</div><!--container-->

</div><!--wrapper-->
<?php include("footer.php")?>

</body>
</html>
