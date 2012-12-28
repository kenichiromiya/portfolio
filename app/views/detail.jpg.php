<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo TITLE; ?> - <?=$row['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/detail.jpg.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>

<div id="container">
<div id="main">
<div id="frame">

<h1>
<?=$row['title']?>
</h1>
<?php
if($row['filename']):
	if (!file_exists("upload/large/".$row['filename'])){
		$image = new Image();
		$image->imageresize("upload/large/".$row['filename'],"upload/".$row['filename'],1000,1000);
	}
?>
<a href="<?=BASE?>upload/<?=$row['filename']?>"><img src="<?=BASE?>upload/large/<?=$row['filename']?>"></a>
<?php
endif;
?>
<div id="twitter">
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div><!--twitter-->
<p>
<?=_('Tags')?>:
<?php
foreach (explode(" ",$row['tags']) as $tag){
?>
<a href="<?=BASE?>?tag=<?=$tag?>"><?=$tag?></a>
<?php
}
?>
</p>
<p>
<?=$row['description']?>
</p>
</div><!--frame-->
</div><!--main-->
<div id="sub">
<?php include("sub.php")?>
</div><!--sub-->
</div><!--container-->
</div><!--wrapper-->

<?php include("footer.php")?>
</body>
</html>
