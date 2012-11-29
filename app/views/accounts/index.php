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

<div id="accounts">

<form action="./" method="post" >
<input type="hidden" name="_method" value="put">
<label for="id"><?=_('Username')?></label>
<?php if ($id) { ?>
<input type="text" id="id" name="id" size="20" disabled="disabled" value="<?=$id?>"/>
<?php } else { ?>
<input type="text" id="id" name="id" size="20" value=""/>
<?php }?>
<label for="password"><?=_('Password')?></label>
<input id="password" type="password" name="password" />
<label for="email"><?=_('Email')?></label>
<input id="email" type="text" name="email" value="<?=$email?>"/>
<label for="role"><?=_('Role')?></label>
<select id="role" name="role">
<option value="admin"<?php if($role == 'admin') { echo 'selected=""'; }?>>admin</option>
<option value="user"<?php if($role == 'user') { echo 'selected=""'; }?>>user</option>
</select><br/>
<label for="submit"><?=_('Submit')?></label>
<input id="submit" type="submit" value="<?=_('Submit')?>"/><br/>
</form>
</div>


</div>
</body>
</html>
