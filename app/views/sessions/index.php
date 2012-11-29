<html>
<head>
<title>Session</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<base href="<?=$base?>"/>
<link rel="stylesheet" type="text/css" href="<?=$views?>css/style.css"/>
</head>

<body>
<div id="wrapper">
<?php include("header.php")?>
<?=_('Login')?>
<div id="sessions">

<?php if($error){?>
<?=_('Wrong Username/Email and password combination.')?>
<?php } ?>
<form method="post" action="<?=$base?>sessions/">
<input type="hidden" name="_method" value="post">
<input type="hidden" name="done" value="<?=$done?>">
<label for="id"><?=_('Id')?></label>
<input class="sessions" id="id" type="text" name="id" value="<?=$id?>"/><br/>
<label for="password"><?=_('Password')?></label>
<input class="sessions" id="password" type="password" name="password" /><br/>
<label for="persistent"><?=_('Persistent')?></label>
<input id="persistent" type="checkbox" name="persistent" /><br/>
<label for="submit"></label>
<input id="submit" type="submit" name="submit" value="<?=_('Submit')?>"/><br/>
</form>
</div>
</div>
</body>
</html>
