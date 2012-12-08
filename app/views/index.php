<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
<script type="text/javascript" src="<?=$base?>js/jquery-1.7.1.min.js"></script>
<!--script type="text/javascript" src="<?=$base?>js/jquery.masonry.min.js""></script-->
<script type="text/javascript" src="<?=$base?>js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=$base?>js/javascript.js"></script>
<script type="text/javascript" src="<?=$base?>js/bottom.js"></script>
</head>
<body id="bottom">

<div id="wrapper">
<?php include("header.php")?>

<div id="container">

<?php
foreach($rows as $row) :
?>
<div class="item">
<div class="image">
<?php if($row['title']){ ?>
<p><?=$row['title']?></p>
<?php } ?>
<?php
if (!file_exists("upload/thumb/".$row['filename'])){
	$image = new Image();
	$image->imageresize("upload/thumb/".$row['filename'],"upload/".$row['filename'],200);
}
?>
<a href="<?=$base?><?=$row['id']?>"><img src="<?=$base?>upload/thumb/<?=$row['filename']?>"></a>
</div>
<?php if($session['account_id'] == $row['account_id']): ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>
<form action="<?=$base?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
<?php endif; ?>
</div>
<?php endforeach; ?>
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
