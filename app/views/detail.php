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
<?=$id?>

<?php include("header.php")?>

<div id="container">
<?php
if($row){
?>
<img src="<?=$base?>upload/large/<?=$row['filename']?>">
<h1>
<?=$row['title']?>
</h1>
<p>
<?=$row['description']?>
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
}
?>

<?php if($session['account_id'] == $row['account_id']){ ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>

<div id="forms">
<form action="<?=$base?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="put">
<label class="label" for="title"><?=_('Title')?></label>
<input class="forms" id="title" type="text" name="title" size="20" value="<?=$row['title']?>"/>
<label class="label" for="description"><?=_('Description')?></label>
<textarea class="forms" id="description" name="description">
<?=$row['description']?>
</textarea>
<label class="label" for="submit"></label>
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
