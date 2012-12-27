<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo TITLE; ?> - <?=$row['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/detail.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<!--
<script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.bottom-1.0.js"></script>
-->
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>

<div id="container">
<div id="main">
<?php
if($session['role'] == "admin" or preg_match("/^".$session['account_id']."/",$req['id'])){ ?>
<?php //if($session['account_id'] and preg_match("/".$session['account_id']."/",$req['id'])){ ?>

<form action="<?=BASE?><?=$id?>" method="post">
<input type="hidden" name="_method" value="put">
<input type="hidden" name="type" value="page">
<input type="hidden" name="account_id" value="<?=$session['account_id']?>">
<!--
<label for="type"><?=_('Type')?></label>
<select id="type" name="type">
<option value="image"><?=_('Image')?></option>
<option value="text"><?=_('Text')?></option>
</select><br/>
-->
<label for="title"><?=_('Title')?></label>
<input id="title" type="text" name="title" value="<?=$row['title']?>"/><br/>
<!--
<label for="description"><?=_('Description')?></label>
<textarea id="description" name="description" rows="10" cols="20">
<?=$row['description']?>
</textarea><br/>
-->
<label for="text"><?=_('Text')?></label>
<textarea id="text" name="text">
<?=$row['text']?>
</textarea><br/>
<label for="submit"><?=_('Submit')?></label>
<input id="submit" type="submit" value="<?=_('Submit')?>"/><br/>

</form>
<?php } ?>
<!--
<form action="<?=BASE?><?=$row['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Delete')?>">
</form>
-->
</div><!--main-->
</div><!--container-->
</div><!--wrapper-->
<?php include("footer.php")?>
</body>
</html>
