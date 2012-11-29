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

<div id="container">

<?php
if($rows){
$column_a = array();
foreach($rows as $row) {
?>
<div class="item">
<a href="<?=$base?><?=$row['id']?>"><img src="<?=$base?>upload/thumb/<?=$row['filename']?>"></a>
<?php if($session['account_id'] == $row['account_id']){ ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>
<form action="<?=$base?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
<?php } ?>
</div>
<?php
}
} else {
?>
<?php
}
?>
</div>
<?php if($session['account_id'] and preg_match("/\/$/",$req['id'])){ ?>
<div id="drag" draggable="true">
<?=_('Drag to add a photo')?>
</div>
<?php } ?>

<!--
<div id="contents">
<?php if($session['account_id']){ ?>
<input id="multiple" type="file" multiple="multiple" />
<br />

<?php } ?>
</div>
-->
<?php include("footer.php")?>
</div>

</body>
</html>
