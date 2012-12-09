<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
<script type="text/javascript" src="<?=$base?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$base?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=$base?>js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=$base?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>

<div id="container">
<?php
if($row['filename']):
	if (!file_exists("upload/large/".$row['filename'])){
		$image = new Image();
		$image->imageresize("upload/large/".$row['filename'],"upload/".$row['filename'],1000,1000);
	}
?>
<img src="<?=$base?>upload/large/<?=$row['filename']?>">
<?php
endif;
?>
<h1>
<?=$row['title']?>
</h1>
<p>
<?=$row['body']?>
</p>
<div class="account">
<div class="icon">
<a href="<?=$base?>accounts/<?=$row['account_id']?>"><img src="<?=$base?>upload/accounts/thumb/<?=$row['account_id']?>/icon.jpeg"></a>
</div>
<div class="account_id">
<a href="<?=$base?>accounts/<?=$row['account_id']?>"><?=$row['account_id']?></a>
</div>
</div>

<?php 
if($session['role'] == "admin" or $session['account_id'] == $row['account_id']){ ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>

<div id="subcontainer">
<form class="multi" action="<?=$base?><?=$id?>" method="post">
<input type="hidden" name="_method" value="put">
<label for="title"><?=_('Title')?></label>
<input id="title" type="text" name="title" size="20" value="<?=$row['title']?>"/><br/>
<label for="body"><?=_('Body')?></label>
<textarea id="body" name="body" rows="20" cols="40">
<?=$row['body']?>
</textarea><br/>
<label for="submit"></label>
<input id="submit" type="submit" value="<?=_('Submit')?>"/><br/>

</form>
</div>

<!--
<form action="<?=$base?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
-->
<?php } ?>
</div>
</div>

</body>
</html>
