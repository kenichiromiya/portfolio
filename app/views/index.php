<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>/css/index.css"/>
<script type="text/javascript" src="<?=BASE?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=BASE?>/js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=BASE?>/js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=BASE?>/js/jquery.browser.min.js"></script>
<script type="text/javascript" src="<?=BASE?>/js/javascript.js"></script>
<script type="text/javascript" src="<?=BASE?>/js/bottom.js"></script>
</head>
<body id="bottom">

<div id="wrapper">
<?php include("header.php")?>

<div id="container">
<div id="sub">
<div id="pages">
<input id="location" type="text">
<button onclick='location.href="<?=BASE?><?=$id?>"+$("#location").val()+"?mode=edit"'><?=_('Add')?></button>
<!--
<form action="<?=$base?><?=$id?>" method="get">
<input type="text" name="basename">
<input type="hidden" name="mode" value="edit">
<input type="submit" value="<?=_('Add')?>">
</form>
-->
<ul>
<?php
foreach($page['rows'] as $row) :
?>
<li><a href="<?=BASE?><?=$row['id']?>"><?=$row['title']?></a></li>
<?php endforeach; ?>
</ul>
</div>
</div><!--sub-->
<div id="main">

<?php if(preg_match("#^/".$session['account_id']."/(.*/)?$#",$req['id'])){?>
<div id="drag" draggable="true">
<?=_('Drag to add a photo')?>
</div><!--drag-->
<?php } ?>
<div class="images">
<?php
/*
foreach($page['rows'] as $row) :
?>
<div class="image"><a href="<?=BASE?><?=$row['id']?>"><?=$row['title']?></a></div>
<?php endforeach; */?>
<?php
foreach($image['rows'] as $row) :
?>
<div class="image">
<div class="thumb">
<?php if($row['title']){ ?>
<p><?=$row['title']?></p>
<?php } ?>
<?php
if (!file_exists("upload/thumb".$row['filename'])){
	$image = new Image();
	$image->imageresize("upload/thumb".$row['filename'],"upload".$row['filename'],200);
}
?>
<a href="<?=BASE?><?=$row['id']?>"><img src="<?=BASE?>/upload/thumb<?=$row['filename']?>"></a>
</div><!--thumb-->
<?php if($session['account_id'] == $row['account_id']): ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>
<form action="<?=BASE?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
<?php endif; ?>
</div><!--image-->
<?php endforeach; ?>
</div><!--images-->
</div><!--main-->
<?php //if($session['account_id'] and preg_match("/\/$/",$req['id'])){ ?>

<!--
<div id="contents">
<?php if($session['account_id']){ ?>
<input id="multiple" type="file" multiple="multiple" />
<br />

<?php } ?>
</div>
-->
</div><!--container-->
</div><!--wrapper-->
<?php include("footer.php")?>

</body>
</html>
