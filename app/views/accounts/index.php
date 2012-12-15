<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$config['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
<?=$head?>
</head>
<body>
<div id="wrapper">
<?php include("header.php")?>

<?php
?>
<div id="subcontainer">
<form id="account" action="<?=$base?>accounts/?mode=signup" method="post">
<input type="hidden" name="_method" value="put">
<label for="id"><?=_('Username')?></label>
<?php if ($id) { ?>
<input type="text" id="id" name="id" size="20" disabled="disabled" value="<?=$id?>"/><br/>
<?php } else { ?>
<input type="text" id="id" name="id" size="20" value=""/><?=$errors['id']?><br/>
<?php }?>
<label for="password"><?=_('Password')?></label>
<input id="password" type="password" name="password" /><?=$errors['password']?><br/>
<label for="email"><?=_('Email')?></label>
<input id="email" type="text" name="email" value="<?=$email?>"/><?=$errors['email']?><br/>
<label for="submit"><?=_('Submit')?></label>
<input id="submit" type="submit" value="<?=_('Submit')?>"/><br/><br/>
</form>

</div><!--subcontainer-->


</div><!--wrapper-->
</body>
</html>
