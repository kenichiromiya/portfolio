<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/index.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<!--script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js"></script-->
<!--<script type="text/javascript" src="<?=BASE?>js/jquery.infinitescroll.min.js"></script>-->
<!--script type="text/javascript" src="<?=BASE?>js/jquery.bottom-1.0.js"></script-->
<!--script type="text/javascript" src="<?=BASE?>js/jquery.browser.min.js"></script-->
<!--<script type="text/javascript" src="<?=BASE?>js/jstorage.js"></script>-->
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
<!--script type="text/javascript" src="<?=BASE?>js/bottom.js"></script-->
</head>
<body>

<div id="wrapper">
<?php include("header.php")?>

<div id="container">
<div id="main">
<div class="page">
<?php
$markdown = new Markdown();
echo $markdown->parse($text);
?>
</div><!--page-->
<?php if($editable){?>
<input id="location" type="text" size="15">
<button onclick='location.href="<?=BASE?><?=$id?>"+$("#location").val()+"?view=edit"'><?=_('Add')?></button>
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
<!--
<form action="<?=BASE?>" method="post">
-->
<?php
foreach($rows as $row) :
?>
<div class="item">
<?php if($row['title']){ ?>
<p><?=$row['title']?></p>
<?php } ?>
<?php if($row['filename']) :?>
<?php
if (!file_exists("upload/large/".$row['filename'])){
	$image = new Image();
	$image->resize("upload/large/".$row['filename'],"upload/".$row['filename'],1000,1000);
}
$ratio = $row['width']/$row['height'];

$width = 600;
$height = round(600/$ratio);

?>
<a href="<?=BASE?><?=$row['id']?>"><img src="<?=BASE?>upload/large/<?=$row['filename']?>" width="<?=$width?>" height="<?=$height?>"></a>
<?php elseif(preg_match("#/$#",$row['id'])) :?>
<?php 
$images = array_diff( scandir("upload/large/".$row['id']), array(".", "..") );
$image = array_pop($images);
if ($image){
?>
<a href="<?=BASE?><?=$row['id']?>"><img src="<?=BASE?>upload/large/<?=$image?>"></a>
<?php
} else {
?>
<a href="<?=BASE?><?=$row['id']?>"><img src="<?=BASE?>images/folder_org_t256.png" width="200" height="200"></a>
<?php
}
?>
<?php else: ?>
<a href="<?=BASE?><?=$row['id']?>"><img src="<?=BASE?>images/docu_txt.png" width="200" height="200"></a>
<?php endif; ?>
<?php if($editable): ?>
<!--
<input type="checkbox" name="id[]" value="<?=$row['id']?>">
-->
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>
<form action="<?=BASE?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
<?php endif; ?>
</div><!--item-->
<?php endforeach; ?>
<!--
<input type="submit" name="_method" value="delete">
<input type="submit" name="_method" value="put">
</form>
-->
</div><!--items-->
<!--
<div id="page-nav">
	<a href="?page=<?=$next?>"><?=_('Next')?></a>
</div>
-->
<?php include("pagination.php")?>
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
<div id="sub">
<?php include("meta.php")?>
</div><!--sub-->
</div><!--container-->
</div><!--wrapper-->
<?php include("footer.php")?>

</body>
</html>
