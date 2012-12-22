<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/index.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js"></script>
<!--<script type="text/javascript" src="<?=BASE?>js/jquery.infinitescroll.min.js"></script>-->
<!--script type="text/javascript" src="<?=BASE?>js/jquery.bottom-1.0.js"></script-->
<script type="text/javascript" src="<?=BASE?>js/jquery.browser.min.js"></script>
<!--<script type="text/javascript" src="<?=BASE?>js/jstorage.js"></script>-->
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
<!--script type="text/javascript" src="<?=BASE?>js/bottom.js"></script-->
</head>
<body>

<div id="wrapper">
<?php include("header.php")?>

<div id="container">
<div id="main">
<div id="page">
<?php
$markdown = new Markdown();
echo $markdown->parse($row['text']);
?>
</div><!--page-->
<?php if($session['role'] == "admin" or preg_match("#^".$session['account_id']."/$#",$req['id'])){?>
<div id="drag" draggable="true">
<?=_('Drag to add a photo')?>
</div><!--drag-->
<?php } ?>
<div id="items" >
<?php
/*
foreach($page['rows'] as $row) :
?>
<?php endforeach; */?>
<?php
foreach($image['rows'] as $row) :
?>
<div class="item">
<div class="thumb">
<?php if($row['title']){ ?>
<p><?=$row['title']?></p>
<?php } ?>
<?php
if (!file_exists("upload/thumb/".$row['filename'])){
	$image = new Image();
	$image->imageresize("upload/thumb/".$row['filename'],"upload".$row['filename'],200);
}
$ratio = $row['width']/$row['height'];

$width = 200;
$height = round(200/$ratio);

?>
<a href="<?=BASE?><?=$row['id']?>"><img src="<?=BASE?>upload/thumb/<?=$row['filename']?>""></a>
</div><!--thumb-->
<?php if($session['account_id'] == $row['account_id']): ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>
<form action="<?=BASE?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
<?php endif; ?>
</div><!--item-->
<?php endforeach; ?>
</div><!--items-->
<div id="page-nav">
	<a href="?page=<?=$next?>"><?=_('Next')?></a>
</div>
</div><!--main-->
<div id="sub">
<div id="pages">
<?php if($session['role'] == "admin" or preg_match("#^".$session['account_id']."/$#",$req['id'])){?>
<input id="location" type="text" size="15">
<button onclick='location.href="<?=BASE?><?=$id?>"+$("#location").val()+"?mode=edit"'><?=_('Add')?></button>
<?php } ?>
<ul>
<?php
foreach($page['rows'] as $row) :
?>
<li><a href="<?=BASE?><?=$row['id']?>"><?=$row['title']?></a></li>
<?php endforeach; ?>
</ul>
</div><!--pages-->
</div><!--sub-->
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
