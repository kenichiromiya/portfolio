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
<div id="subcontainer">
<div id="icon">
<img src="<?=$base?>upload/accounts/large/<?=$icon?>">
</div><!--icon-->
<div class="account">
<h1><?=$id?></h1>
<a href="<?=$url?>"><?=$url?></a>
<p>
<?=$about?>
</p>
</div><!--account-->

</div><!--subcontainer-->

<?php if($session['account_id'] == $id){ ?>

<div id="subcontainer">
<form id="account" action="<?=$base?>accounts/<?=$id?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="put">
<label for="id"><?=_('Username')?></label>
<?php if ($id) { ?>
<input type="text" id="id" name="id" size="20" disabled="disabled" value="<?=$id?>"/><br/>
<?php } else { ?>
<input type="text" id="id" name="id" size="20" value=""/><br/>
<?php }?>
<!--
<label for="password"><?=_('Password')?></label>
<input id="password" type="password" name="password" /><br/>
-->
<label for="email"><?=_('Email')?></label>
<input id="email" type="text" name="email" value="<?=$email?>"/><br/>
<label for="role"><?=_('Role')?></label>
<select id="role" name="role">
<option value="admin"<?php if($role == 'admin') { echo 'selected=""'; }?>>admin</option>
<option value="user"<?php if($role == 'user') { echo 'selected=""'; }?>>user</option>
</select><br/>
<label for="url"><?=_('URL')?></label>
<input id="url" type="text" name="url" value="<?=$url?>"/><br/>
<label for="profile"><?=_('Profile')?></label>
<textarea id="profile" name="profile">
<?=$profile?>
</textarea><br/>
<!--img src="<?=$base?>upload/accounts/large/<?=$icon?>"-->
<label for="icon"><?=_('Icon')?></label>
<input id="icon" type="file" name="icon" value=""/><br/>
<label for="submit"><?=_('Submit')?></label>
<input id="submit" type="submit" value="<?=_('Submit')?>"/><br/><br/>
</form>

</div><!--subcontainer-->
<?php } ?>

</div>
</div>

</body>
</html>
